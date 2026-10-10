<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Product;
use DOMDocument;
use DOMXPath;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

#[Signature('emc:import-products {--wipe : Wipe existing products before import} {--force-download : Overwrite existing downloaded files}')]
#[Description('Import all products, images, videos, and datasheets from emcelectronic.com into the local site')]
class ImportEmcProducts extends Command
{
    private string $baseUrl = 'https://emcelectronic.com';

    public function handle(): int
    {
        $this->info('Starting EMC Electronic products import...');

        $htmlPath = storage_path('emcelectronic.html');
        if (File::exists($htmlPath)) {
            $html = File::get($htmlPath);
            $this->info('Loaded cached HTML from storage/emcelectronic.html');
        } else {
            $this->info('Fetching HTML from '.$this->baseUrl.'...');
            $html = @file_get_contents($this->baseUrl);
            if (! $html) {
                $this->error('Failed to fetch emcelectronic.com');

                return self::FAILURE;
            }
            File::put($htmlPath, $html);
        }

        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="UTF-8">'.$html);
        $xpath = new DOMXPath($dom);

        // Ensure directories exist in storage/app/public
        $publicStorage = storage_path('app/public');
        File::ensureDirectoryExists($publicStorage.'/products');
        File::ensureDirectoryExists($publicStorage.'/videos');
        File::ensureDirectoryExists($publicStorage.'/datasheets');

        // Check categories mapping
        $tabButtons = $xpath->query('//ul[@id="emcTab"]//button');
        $tabMap = [];
        foreach ($tabButtons as $tb) {
            $target = ltrim($tb->getAttribute('data-bs-target'), '#');
            $tabMap[$target] = trim($tb->textContent);
        }

        if (empty($tabMap)) {
            $this->error('No category tabs found in HTML.');

            return self::FAILURE;
        }

        $this->info(sprintf('Found %d categories in tabs.', count($tabMap)));

        if ($this->option('wipe')) {
            $this->warn('Wiping existing products from database...');
            Product::truncate();
            $this->info('Products table cleared.');
        }

        $categoryOrder = [
            'MARX GENERATOR' => ['slug' => 'marx-generator', 'icon' => 'lightning-charge', 'order' => 1],
            'Filters' => ['slug' => 'filters', 'icon' => 'funnel', 'order' => 2],
            'Chambers' => ['slug' => 'chambers', 'icon' => 'shield-check', 'order' => 3],
            'RF Absorbers' => ['slug' => 'rf-absorbers', 'icon' => 'layers', 'order' => 4],
            'Antennas' => ['slug' => 'antennas', 'icon' => 'broadcast', 'order' => 5],
            'LISN' => ['slug' => 'lisn', 'icon' => 'cpu', 'order' => 6],
            'CDN' => ['slug' => 'cdn', 'icon' => 'hdd-network', 'order' => 7],
            'Test Equipment' => ['slug' => 'test-equipment', 'icon' => 'tools', 'order' => 8],
            'Used Equipment' => ['slug' => 'used-equipment', 'icon' => 'archive', 'order' => 9],
        ];

        $totalImported = 0;
        $totalDownloadedImages = 0;
        $totalDownloadedVideos = 0;
        $totalDownloadedDatasheets = 0;

        foreach ($tabMap as $tabId => $catName) {
            $catMeta = $categoryOrder[$catName] ?? [
                'slug' => Str::slug($catName),
                'icon' => 'box',
                'order' => 99,
            ];

            $category = Category::updateOrCreate(
                ['slug' => $catMeta['slug']],
                [
                    'name' => $catName,
                    'icon' => $catMeta['icon'],
                    'sort_order' => $catMeta['order'],
                    'is_active' => true,
                ]
            );

            $pane = $xpath->query('//div[@id="'.$tabId.'"]')->item(0);
            if (! $pane) {
                $this->warn("Pane #{$tabId} not found, skipping.");

                continue;
            }

            $cards = $xpath->query('.//div[contains(@class, "emc-product-card")]', $pane);
            $this->info(sprintf("\nProcessing Category: %s (%d products)", $catName, $cards->length));

            $productSort = 1;
            foreach ($cards as $card) {
                $rawTitle = trim($xpath->query('.//h3[contains(@class, "emc-product-title")]', $card)->item(0)?->textContent ?? '');
                if (! $rawTitle) {
                    continue;
                }

                // Clean title
                $title = html_entity_decode($rawTitle, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $title = trim(preg_replace('/\s+/', ' ', $title));

                // Thumbnail / Image
                $imgSrc = $xpath->query('.//img', $card)->item(0)?->getAttribute('src');
                $imagePath = null;
                if ($imgSrc) {
                    $imagePath = $this->downloadAsset($imgSrc, 'products');
                    if ($imagePath) {
                        $totalDownloadedImages++;
                    }
                }

                // Video
                $vidSrc = $xpath->query('.//video/source', $card)->item(0)?->getAttribute('src');
                $videoPath = null;
                if ($vidSrc) {
                    $videoPath = $this->downloadAsset($vidSrc, 'videos');
                    if ($videoPath) {
                        $totalDownloadedVideos++;
                    }
                }

                // Datasheet / Document
                $linkHref = $xpath->query('.//div[contains(@class, "emc-product-link")]//a', $card)->item(0)?->getAttribute('href');
                $datasheetPath = null;
                if ($linkHref) {
                    $datasheetPath = $this->downloadAsset($linkHref, 'datasheets');
                    if ($datasheetPath) {
                        $totalDownloadedDatasheets++;
                    }
                }

                // Parse Description and Specifications
                $descDiv = $xpath->query('.//div[contains(@class, "emc-product-desc")]', $card)->item(0);
                [$description, $shortDescription, $specifications, $extractedModel] = $this->parseDescriptionAndSpecs($descDiv, $xpath, $title);

                // Determine Model Number
                $modelNumber = $extractedModel ?: $this->extractModelFromTitle($title);

                $isUsedEquipment = ($tabId === 'tab6' || $catName === 'Used Equipment');
                $currentSort = $productSort++;

                // Save or update Product
                Product::updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'sort_order' => $currentSort,
                    ],
                    [
                        'name' => $title,
                        'model_number' => $modelNumber,
                        'short_description' => $shortDescription,
                        'description' => $description,
                        'specifications' => ! empty($specifications) ? $specifications : null,
                        'image_path' => $imagePath,
                        'video_path' => $videoPath,
                        'datasheet_path' => $datasheetPath,
                        'quote_email' => 'teklif@emcelectronic.com',
                        'is_used_equipment' => $isUsedEquipment,
                        'is_active' => true,
                    ]
                );

                $totalImported++;
                $this->line(sprintf('  [✓] %s (Model: %s) [Img: %s, Vid: %s, PDF: %s]',
                    Str::limit($title, 35),
                    $modelNumber ?: '-',
                    $imagePath ? 'Yes' : 'No',
                    $videoPath ? 'Yes' : 'No',
                    $datasheetPath ? 'Yes' : 'No'
                ));
            }
        }

        $this->info("\n==========================================");
        $this->info('IMPORT FINISHED SUCCESSFULLY!');
        $this->info("Total Products Imported : {$totalImported}");
        $this->info("Images Processed        : {$totalDownloadedImages}");
        $this->info("Videos Processed        : {$totalDownloadedVideos}");
        $this->info("Datasheets Processed    : {$totalDownloadedDatasheets}");
        $this->info('==========================================');

        return self::SUCCESS;
    }

    private function downloadAsset(string $url, string $subfolder): ?string
    {
        $url = trim($url);
        if (empty($url) || $url === '#') {
            return null;
        }

        // Build full URL if relative
        $fullUrl = str_starts_with($url, 'http') ? $url : $this->baseUrl.'/'.ltrim($url, '/');

        // Extract clean filename
        $parsedUrl = parse_url($fullUrl, PHP_URL_PATH);
        $basename = basename($parsedUrl);
        if (empty($basename)) {
            return null;
        }

        // Decode URL encoded characters in filename for safe storage
        $decodedBasename = urldecode($basename);
        // Replace spaces or unsafe chars with underscores
        $safeFilename = preg_replace('/[^\w\.\-\+]/u', '_', $decodedBasename);

        $localDir = storage_path('app/public/'.$subfolder);
        $localPath = $localDir.'/'.$safeFilename;
        $relativeStoragePath = $subfolder.'/'.$safeFilename;

        // If file exists and not empty, check if overwrite requested
        if (File::exists($localPath) && File::size($localPath) > 0 && ! $this->option('force-download')) {
            return $relativeStoragePath;
        }

        $encodedRequestUrl = str_replace(' ', '%20', $fullUrl);

        // Try downloading up to 3 times with generous timeout
        for ($attempt = 1; $attempt <= 3; $attempt++) {
            $ch = curl_init($encodedRequestUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7)');

            $data = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);

            if ($httpCode === 200 && $data !== false && strlen($data) > 0) {
                File::put($localPath, $data);

                return $relativeStoragePath;
            }

            if ($attempt < 3) {
                sleep(1);
            }
        }

        $this->warn("Failed downloading asset: {$encodedRequestUrl} (HTTP {$httpCode}, Error: {$curlError})");

        return null;
    }

    private function parseDescriptionAndSpecs(?\DOMNode $descDiv, DOMXPath $xpath, string $productTitle): array
    {
        if (! $descDiv) {
            return [null, null, [], null];
        }

        $cloned = $descDiv->cloneNode(true);

        // Remove <style> tags
        $styles = $cloned->getElementsByTagName('style');
        while ($styles->length > 0) {
            $styles->item(0)->parentNode->removeChild($styles->item(0));
        }

        // Remove <script> tags
        $scripts = $cloned->getElementsByTagName('script');
        while ($scripts->length > 0) {
            $scripts->item(0)->parentNode->removeChild($scripts->item(0));
        }

        // Parse Specs from <table> tags
        $specifications = [];
        $extractedModel = null;
        $tables = $cloned->getElementsByTagName('table');

        foreach ($tables as $table) {
            $rows = $table->getElementsByTagName('tr');
            if ($rows->length === 0) {
                continue;
            }

            // Check if first row has <th>
            $ths = $rows->item(0)->getElementsByTagName('th');
            if ($ths->length > 0) {
                $headers = [];
                foreach ($ths as $th) {
                    $headers[] = trim(preg_replace('/\s+/', ' ', $th->textContent));
                }
                for ($r = 1; $r < $rows->length; $r++) {
                    $tds = $rows->item($r)->getElementsByTagName('td');
                    if ($tds->length === count($headers)) {
                        foreach ($tds as $c => $td) {
                            $h = $headers[$c];
                            $v = trim(preg_replace('/\s+/', ' ', $td->textContent));
                            if ($h && $v && ! isset($specifications[$h])) {
                                $specifications[$h] = $v;
                                if (in_array(strtoupper($h), ['MODEL', 'MODEL NO', 'MODEL NUMBER'])) {
                                    $extractedModel = $v;
                                }
                            }
                        }
                    }
                }
            } else {
                // Key-Value rows (2 columns)
                foreach ($rows as $row) {
                    $tds = $row->getElementsByTagName('td');
                    if ($tds->length === 2) {
                        $k = trim(preg_replace('/\s+/', ' ', $tds->item(0)->textContent));
                        $v = trim(preg_replace('/\s+/', ' ', $tds->item(1)->textContent));
                        if ($k && $v && ! str_contains(strtolower($k), 'teklif') && ! str_contains(strtolower($v), 'teklif')) {
                            $specifications[$k] = $v;
                            if (in_array(strtoupper($k), ['MODEL', 'MODEL NO', 'MODEL NUMBER'])) {
                                $extractedModel = $v;
                            }
                        }
                    }
                }
            }
        }

        // Text content without tables for description
        // Clone again to remove tables for clean text
        $textDom = $cloned->cloneNode(true);
        $tList = $textDom->getElementsByTagName('table');
        while ($tList->length > 0) {
            $tList->item(0)->parentNode->removeChild($tList->item(0));
        }

        $rawText = trim($textDom->textContent);
        $rawText = html_entity_decode($rawText, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // Clean out repeated whitespace and newlines
        $lines = array_filter(array_map('trim', explode("\n", $rawText)));
        $cleanDescription = implode("\n\n", $lines);

        // If description is empty or very short, use a descriptive fallback from title and category
        if (empty($cleanDescription)) {
            $cleanDescription = "{$productTitle} - High performance RF and EMC defense testing solution engineered for precision and reliability.";
        }

        // Short description (first meaningful sentence or first 180 chars)
        $shortDescription = Str::limit(str_replace(["\n", "\r"], ' ', $cleanDescription), 160);

        return [$cleanDescription, $shortDescription, $specifications, $extractedModel];
    }

    private function extractModelFromTitle(string $title): ?string
    {
        // Check for pipes (e.g., Osiloskop | Tektronix | 2225)
        if (str_contains($title, '|')) {
            $parts = array_map('trim', explode('|', $title));
            $last = end($parts);
            if (strlen($last) >= 2 && strlen($last) <= 30) {
                return $last;
            }
        }

        // Check for slashes (e.g., LISN / LS032A2 or RF SHIELDED BOX / EK454545)
        if (str_contains($title, '/')) {
            $parts = array_map('trim', explode('/', $title));
            $last = end($parts);
            if (strlen($last) >= 2 && strlen($last) <= 30) {
                return $last;
            }
        }

        // Check for model code pattern at end of title like TGH-16, PCF-3, FL100E4, etc.
        if (preg_match('/\b([A-Z0-9]{2,10}(?:-[A-Z0-9]+)?)\b$/i', $title, $m)) {
            if (! in_array(strtoupper($m[1]), ['CDN', 'LISN', 'BOX', 'PCI', 'FILTER', 'CHAMBER'])) {
                return $m[1];
            }
        }

        return null;
    }
}
