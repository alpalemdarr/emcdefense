<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Message;
use App\Models\Page;
use App\Models\Product;
use App\Models\Reference;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        Admin::updateOrCreate(
            ['email' => 'admin@emcdefence.com'],
            [
                'name' => 'EMC Defense Administrator',
                'password' => 'admin123',
            ]
        );

        // 2. Seed Settings, Pages, Categories, Products, References, Certificates only if empty
        if (Setting::count() === 0) {
            $this->call(SettingSeeder::class);
        }
        if (Page::count() === 0) {
            $this->call(PageSeeder::class);
        }
        if (Category::count() === 0) {
            $this->call(CategorySeeder::class);
        }
        if (Product::count() === 0) {
            $this->call(ProductSeeder::class);
        }
        if (Reference::count() === 0) {
            $this->call(ReferenceSeeder::class);
        }
        if (Certificate::count() === 0) {
            $this->call(CertificateSeeder::class);
        }

        // 3. Seed Sample Contact Messages / Inquiries
        if (Message::count() === 0) {
            Message::create([
                'name' => 'Murat Kaya',
                'company' => 'Savunma Sistemleri A.Ş.',
                'email' => 'm.kaya@savunmasistemleri.com.tr',
                'phone' => '+90 532 555 12 34',
                'subject' => 'Marx Generator MG-RS105 Quote & Datasheet Request',
                'message' => "Hello EMC Defense Team,\r\n\r\nWe are looking to upgrade our EMP testing setup for our airborne radar enclosure project compliant with MIL-STD-461 RS105. Could you please provide quotation and delivery timeline for the MG-RS105-50K Marx Generator?\r\n\r\nBest regards,\r\nMurat Kaya",
                'is_read' => false,
                'created_at' => now()->subHours(2),
            ]);

            Message::create([
                'name' => 'Dr. David Reynolds',
                'company' => 'AeroShield Technologies',
                'email' => 'dreynolds@aeroshield-tech.com',
                'phone' => '+44 20 7946 0912',
                'subject' => 'Inquiry regarding TEMPEST Power Line Filters TGH-16',
                'message' => "Good day,\r\n\r\nWe require approximately 24 units of TGH-16 Power Line Filters for our modular server shelters meeting SDIP-27 Level A standards. Please let us know the pricing and export documentation requirements.\r\n\r\nThank you,\r\nDr. David Reynolds",
                'is_read' => true,
                'created_at' => now()->subDay(),
            ]);
        }
    }
}
