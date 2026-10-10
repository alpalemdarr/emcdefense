<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show corporate contact page with facility info, map, and inquiry form.
     */
    public function show()
    {
        return view('frontend.contact');
    }

    /**
     * Show official Test Request Form (Deney Talep Formu FR 7.1.4).
     */
    public function showTestRequest()
    {
        return view('frontend.test-request');
    }

    /**
     * Handle general contact inquiries or route test requests if device fields exist.
     */
    public function send(Request $request): RedirectResponse
    {
        if ($request->has('device_name')) {
            return $this->sendTestRequest($request);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $defaultSubject = app()->getLocale() === 'en' ? 'General Contact Inquiry' : 'Genel İletişim Mesajı';

        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'subject' => ! empty($validated['subject']) ? $validated['subject'] : $defaultSubject,
            'message' => $validated['message'],
            'is_read' => false,
        ]);

        $successMsg = app()->getLocale() === 'en'
            ? 'Your message has been successfully received. Our engineering and technical liaison team will contact you shortly.'
            : 'İletişim mesajınız başarıyla iletilmiştir. Mühendislik ve teknik irtibat ekibimiz en kısa sürede sizinle iletişime geçecektir.';

        return back()->with('success', $successMsg);
    }

    /**
     * Handle official Test Request Form (FR 7.1.4) submissions.
     */
    public function sendTestRequest(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            // Device information (Deney Talep Formu FR 7.1.4)
            'device_name' => 'required|string|max:255',
            'brand_model' => 'required|string|max:255',
            'voltage' => 'nullable|string|max:100',
            'current' => 'nullable|string|max:100',
            'product_standard' => 'nullable|string|max:255',
            'usage_area' => 'required|string|max:100',
            'operation_mode' => 'nullable|string|max:100',
            'electronic_circuit' => 'required|string|max:100',
            'power_type' => 'required|string|max:50',
            'connectors' => 'nullable|string|max:255',
            'dimensions' => 'nullable|string|max:255',
            'device_description' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,webp,zip|max:20480',

            // Requester / Contact information
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
        ]);

        // Handle attachment file upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = time().'_'.preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $destinationPath = public_path('uploads/datasheets');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $fileName);
            $attachmentPath = 'uploads/datasheets/'.$fileName;
        }

        // Build human-readable formatted message body with dynamic daily revision date
        $currentDate = now()->format('d.m.Y');
        $lines = [];
        $lines[] = '📋 DENEY TALEP FORMU (FR 7.1.4)';
        $lines[] = '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━';
        $lines[] = 'Doküman No: FR 7.1.4 | Revizyon: 00 | Tarih: '.$currentDate;
        $lines[] = '';
        $lines[] = 'CİHAZ VE TEST BİLGİLERİ:';
        $lines[] = '• Cihazın Adı: '.$request->input('device_name');
        $lines[] = '• Marka / Model: '.$request->input('brand_model');
        $lines[] = '• Besleme Gerilimi: '.($request->input('voltage') ?: 'Belirtilmedi');
        $lines[] = '• Faz Başına Çektiği Akım: '.($request->input('current') ?: 'Belirtilmedi');
        $lines[] = '• Güç Kaynağı Türü: '.$request->input('power_type');
        $lines[] = '• Ürün Standardı: '.($request->input('product_standard') ?: 'Belirtilmedi');
        $lines[] = '• Kullanım Alanı: '.$request->input('usage_area');
        $lines[] = '• Çalışma Modu: '.($request->input('operation_mode') ?: 'Belirtilmedi');
        $lines[] = '• Elektronik Devre: '.$request->input('electronic_circuit');
        $lines[] = '• Giriş / Çıkış Konnektörleri: '.($request->input('connectors') ?: 'Belirtilmedi');
        $lines[] = '• Cihaz Boyutları: '.($request->input('dimensions') ?: 'Belirtilmedi');
        $lines[] = '';
        $lines[] = 'CİHAZIN TANIMI:';
        $lines[] = $request->input('device_description');
        if ($attachmentPath) {
            $lines[] = '';
            $lines[] = 'EKLİ DOSYA / DATASHEET: '.asset($attachmentPath);
        }
        $lines[] = '';
        $lines[] = '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━';
        $lines[] = 'TALEP EDEN BİLGİLERİ:';
        $lines[] = '• Yetkili: '.$request->input('name');
        $lines[] = '• Firma / Kurum: '.($request->input('company') ?: 'Belirtilmedi');
        $lines[] = '• E-posta: '.$request->input('email');
        $lines[] = '• Telefon: '.($request->input('phone') ?: 'Belirtilmedi');

        $formattedMessage = implode("\n", $lines);

        Message::create([
            'name' => $request->input('name'),
            'company' => $request->input('company'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => 'Deney Talep Formu (FR 7.1.4) - '.$request->input('device_name'),
            'device_name' => $request->input('device_name'),
            'brand_model' => $request->input('brand_model'),
            'voltage' => $request->input('voltage'),
            'current' => $request->input('current'),
            'product_standard' => $request->input('product_standard'),
            'usage_area' => $request->input('usage_area'),
            'operation_mode' => $request->input('operation_mode'),
            'electronic_circuit' => $request->input('electronic_circuit'),
            'power_type' => $request->input('power_type'),
            'connectors' => $request->input('connectors'),
            'dimensions' => $request->input('dimensions'),
            'device_description' => $request->input('device_description'),
            'attachment' => $attachmentPath,
            'message' => $formattedMessage,
            'is_read' => false,
        ]);

        $successMsg = app()->getLocale() === 'en'
            ? 'Your test request (FR 7.1.4) has been successfully submitted. Our laboratory engineers will evaluate your device and contact you shortly.'
            : 'Deney Talep Formunuz (FR 7.1.4) başarıyla iletilmiştir. Laboratuvar mühendislerimiz cihaz parametrelerinizi inceleyerek en kısa sürede sizinle iletişime geçecektir.';

        return back()->with('success', $successMsg);
    }
}
