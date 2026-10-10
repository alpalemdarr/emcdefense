<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'certificates',
                'title_tr' => 'Kalite ve Güvenlik Sertifikalarımız',
                'title_en' => 'Quality & Security Accreditations',
                'badge_tr' => 'RESMİ AKREDİTASYON & BELGELENDİRME',
                'badge_en' => 'OFFICIAL ACCREDITATION & CERTIFICATION',
                'lead_tr' => 'Savunma ve havacılık standartlarında tavizsiz kalite güvencesi: ISO 9001:2015 Kalite Yönetim Sistemi, ISO 17025 Test ve Kalibrasyon Akreditasyonu ve Tesis Güvenlik Belgesi uyumluluğu.',
                'lead_en' => 'EMC Defense maintains national and international certification requirements for quality management, accreditation, and customer confidence: ISO 9001:2015 Quality Management System, ISO 17025 Test & Calibration Competence, and Defense Facility Security Clearances.',
                'content_tr' => '<p>EMC Savunma ve Test Sistemleri; askeri standartlarda EMI/EMC kalkanlama, yüksek gerilim HEMP darbe simülatörleri ve savunma standardında filtre üretiminde en yüksek metrolojik hassasiyet ve kalite kontrol standartlarını uygulamaktadır.</p>',
                'content_en' => '<p>EMC Defense & Testing Systems enforces the highest metrological precision and rigorous quality control protocols across military-grade EMI/EMC shielding, high-voltage HEMP pulse simulators, and defense-compliant filtration systems.</p>',
                'meta_title_tr' => 'Kalite ve Güvenlik Sertifikalarımız – EMC Savunma',
                'meta_title_en' => 'Quality & Security Accreditations – EMC Defense',
                'meta_description_tr' => 'ISO 9001:2015, ISO 17025 ve Savunma Sanayii akreditasyon belgelerimiz.',
                'meta_description_en' => 'Official ISO 9001:2015, ISO 17025, and Defense Industry accreditation documents of EMC Defense.',
                'is_active' => true,
                'is_system' => true,
                'show_in_navbar' => true,
                'show_in_footer' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'references',
                'title_tr' => 'Savunma Sanayii Referanslarımız',
                'title_en' => 'Defense Industry References',
                'badge_tr' => 'SAVUNMA & HAVACILIK PAYDAŞLARI',
                'badge_en' => 'DEFENSE & AEROSPACE PARTNERS',
                'lead_tr' => 'Milli Savunma Bakanlığı, Savunma Sanayii Başkanlığı, Aselsan, Roketsan, TUSAŞ ve üniversite araştırma merkezlerinde başarıyla teslim edilen kritik elektromanyetik altyapı projelerimiz.',
                'lead_en' => 'Turnkey electromagnetic infrastructures and mission-critical hardware delivered for the Ministry of National Defense, Defense Industry Agency, Aselsan, Roketsan, TAI, and leading defense contractors.',
                'content_tr' => '<p>Türkiye\'nin önde gelen savunma sanayii kuruluşları, askeri üsleri ve akredite test laboratuvarları kalkanlama ve test ihtiyaçlarında EMC Savunma mühendisliğine güvenmektedir.</p>',
                'content_en' => '<p>Leading defense primes, military installations, and accredited test facilities rely on EMC Defense engineering for critical shielding and pulse survivability solutions.</p>',
                'meta_title_tr' => 'Savunma Sanayii Referanslarımız – EMC Savunma',
                'meta_title_en' => 'Defense Industry References – EMC Defense',
                'meta_description_tr' => 'Aselsan, Roketsan, TÜBİTAK ve TSK tesislerinde yer alan referanslarımız.',
                'meta_description_en' => 'Institutional and defense contractor references across Aselsan, Roketsan, TUBITAK, and Armed Forces.',
                'is_active' => true,
                'is_system' => true,
                'show_in_navbar' => true,
                'show_in_footer' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'contact',
                'title_tr' => 'İletişim & Resmi RFQ Portalı',
                'title_en' => 'Contact & Official Defense RFQ Portal',
                'badge_tr' => 'SAVUNMA SANAYİİ VE RESMİ TEDARİK BİRİMİ',
                'badge_en' => 'DEFENSE INDUSTRY PROCUREMENT DIVISION',
                'lead_tr' => 'Projeleriniz için teknik şartname veya teklif taleplerinizi iletebilir; Kartepe / Kocaeli üretim ve test tesisimiz için ziyaret talebinde bulunabilirsiniz.',
                'lead_en' => 'Submit technical RFQ specifications for your defense programs or schedule a technical site visit to our manufacturing and calibration facility in Kartepe / Kocaeli.',
                'content_tr' => '<p>Savunma Sanayii Başkanlığı, Aselsan, Roketsan, TUSAŞ veya TSK projeleriniz için doğrudan mühendislik ekibimizle NDA protokolü altında görüşebilirsiniz.</p>',
                'content_en' => '<p>Consult directly with our defense engineers under Non-Disclosure Agreements for programs across the Defense Industry Agency and Armed Forces.</p>',
                'meta_title_tr' => 'İletişim & Teklif Talebi – EMC Savunma',
                'meta_title_en' => 'Contact & Defense RFQ Portal – EMC Defense',
                'meta_description_tr' => 'EMC Savunma iletişim bilgileri, adres, telefon ve resmi savunma RFQ formu.',
                'meta_description_en' => 'EMC Defense contact information, address, phone, and official defense RFQ inquiry form.',
                'is_active' => true,
                'is_system' => true,
                'show_in_navbar' => true,
                'show_in_footer' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'about',
                'title_tr' => 'Hakkımızda & Savunma Vizyonumuz',
                'title_en' => 'About EMC Defense & Military Mission',
                'badge_tr' => '2002\'DEN GÜNÜMÜZE SAVUNMA MÜHENDİSLİĞİ',
                'badge_en' => 'ENGINEERING EXCELLENCE SINCE 2002',
                'lead_tr' => 'Kritik askeri platformların ve stratejik tesislerin elektromanyetik tehditlere karşı korunmasında Türkiye\'nin öncü yerli mühendislik ve üretim gücü.',
                'lead_en' => 'A premier domestic engineering and manufacturing powerhouse dedicated to safeguarding critical military platforms and strategic infrastructures against electromagnetic warfare threats.',
                'content_tr' => '<h3>Savunma Sanayiinde 20+ Yıllık Tecrübe</h3>
<p>EMC Savunma, 2002 yılından bu yana ileri teknoloji elektromanyetik kalkanlama, yüksek gerilim HEMP (Yüksek İrtifa Elektromanyetik Darbe) simülatörleri, TEMPEST SDIP-27 sızıntı önleme filtreleri ve anahtar teslim yankısız test odaları alanında faaliyet göstermektedir.</p>
<h3>Mühendislik & Kalite Güvencesi</h3>
<p>Kocaeli Kartepe\'de yer alan üretim ve entegrasyon merkezimizde, ISO 9001:2015 ve ISO 17025 standartlarında kalibrasyon ve test altyapımızla hizmet vermekteyiz. Tesisimiz, Tesis Güvenlik Belgesi standartlarına tam uyumlu olarak yönetilmektedir.</p>',
                'content_en' => '<h3>Over 20 Years of Defense Engineering Heritage</h3>
<p>Since 2002, EMC Defense has been at the forefront of developing advanced electromagnetic warfare shielding, high-voltage HEMP (High-Altitude Electromagnetic Pulse) simulators, TEMPEST SDIP-27 data line filters, and turnkey shielded anechoic chambers.</p>
<h3>Engineering & Metrological Traceability</h3>
<p>Operating from our high-tech manufacturing and calibration facility in Kartepe / Kocaeli, our workflows are certified to ISO 9001:2015 and ISO 17025 standards, strictly compliant with defense facility security protocols.</p>',
                'meta_title_tr' => 'Hakkımızda & Kurumsal – EMC Savunma',
                'meta_title_en' => 'About EMC Defense & Corporate Overview',
                'meta_description_tr' => 'EMC Savunma kurumsal yapısı, tarihi, vizyonu ve askeri mühendislik yetkinlikleri.',
                'meta_description_en' => 'EMC Defense history, corporate overview, leadership, and defense engineering capabilities.',
                'is_active' => true,
                'is_system' => false,
                'show_in_navbar' => true,
                'show_in_footer' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}
