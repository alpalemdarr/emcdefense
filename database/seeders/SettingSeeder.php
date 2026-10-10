<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // ── CONTACT & CORPORATE INFO ──
            'contact_phone' => ['value' => '+90 262 373 60 00', 'group' => 'contact'],
            'contact_email' => ['value' => 'defence@emcelectronic.com', 'group' => 'contact'],
            'contact_nato_cage' => ['value' => 'TR-EMC01', 'group' => 'contact'],
            'contact_clearance_tr' => ['value' => 'ISO 9001 & ISO 17025 TEST VE KALİBRASYON AKREDİTASYONU', 'group' => 'contact'],
            'contact_clearance_en' => ['value' => 'ISO 9001 & ISO 17025 TEST AND CALIBRATION ACCREDITATION', 'group' => 'contact'],
            'contact_address_tr' => ['value' => 'İbrikdere Mahallesi 143. Sokak No:17, Kartepe / Kocaeli / Türkiye', 'group' => 'contact'],
            'contact_address_en' => ['value' => 'Ibrikdere Mah. 143. Sok. No:17, Kartepe / Kocaeli / Turkey', 'group' => 'contact'],
            'contact_coordinates' => ['value' => '40.758° N, 30.015° E', 'group' => 'contact'],
            'contact_working_hours_tr' => ['value' => 'Pazartesi – Cuma: 08:30 – 18:00', 'group' => 'contact'],
            'contact_working_hours_en' => ['value' => 'Monday – Friday: 08:30 – 18:00 (UTC+3)', 'group' => 'contact'],
            'contact_map_btn_text_tr' => ['value' => 'Google Haritalar\'da Aç', 'group' => 'contact'],
            'contact_map_btn_text_en' => ['value' => 'View on Google Maps', 'group' => 'contact'],
            'contact_map_url' => ['value' => 'https://maps.google.com/?q=40.758,30.015', 'group' => 'contact'],
            'contact_banner_title_tr' => ['value' => 'Resmi Cihaz Deney ve Test Talebi', 'group' => 'contact'],
            'contact_banner_title_en' => ['value' => 'Official Equipment Test Request Form', 'group' => 'contact'],
            'contact_banner_desc_tr' => ['value' => 'Laboratuvarımızda cihazınız için EMC emisyon, bağışıklık veya elektriksel çalışma parametresi deneyleri yaptırmak istiyorsanız, resmi Deney Talep Formu üzerinden başvurabilirsiniz.', 'group' => 'contact'],
            'contact_banner_desc_en' => ['value' => 'If you require EMC emission, immunity, or electrical parameters testing for your equipment in our laboratory, please submit through our official Test Request Form.', 'group' => 'contact'],
            'contact_banner_btn_tr' => ['value' => 'Deney Talep Formuna Git →', 'group' => 'contact'],
            'contact_banner_btn_en' => ['value' => 'Open Test Request Form →', 'group' => 'contact'],
            'contact_banner_modal_btn_tr' => ['value' => 'Hızlı Form', 'group' => 'contact'],
            'contact_banner_modal_btn_en' => ['value' => 'Quick Modal', 'group' => 'contact'],
            'contact_form_title_tr' => ['value' => 'Doğrudan İletişim & Danışma', 'group' => 'contact'],
            'contact_form_title_en' => ['value' => 'Direct Contact & Consultation', 'group' => 'contact'],
            'contact_form_subtitle_tr' => ['value' => 'Genel sorularınız, kurumsal iş birliği veya teknik danışma için aşağıdaki formu doldurabilirsiniz.', 'group' => 'contact'],
            'contact_form_subtitle_en' => ['value' => 'Fill out the form below for general inquiries, partnership, or technical consultations.', 'group' => 'contact'],
            'contact_form_btn_tr' => ['value' => 'Mesajı Gönder', 'group' => 'contact'],
            'contact_form_btn_en' => ['value' => 'Send Message', 'group' => 'contact'],

            // ── HERO SECTION ──
            'hero_badge_tr' => ['value' => 'AKREDİTE EMC TEST LABORATUVARI VE MÜHENDİSLİK MERKEZİ', 'group' => 'hero'],
            'hero_badge_en' => ['value' => 'ACCREDITED EMC TESTING LABORATORY & ENGINEERING CENTER', 'group' => 'hero'],
            'hero_title_line1_tr' => ['value' => 'Kritik Sistemler İçin', 'group' => 'hero'],
            'hero_title_highlight_tr' => ['value' => 'İleri Elektromanyetik Kalkanlama', 'group' => 'hero'],
            'hero_title_line2_tr' => ['value' => 've EMC Test Çözümleri', 'group' => 'hero'],
            'hero_title_line1_en' => ['value' => 'Advanced Electromagnetic', 'group' => 'hero'],
            'hero_title_highlight_en' => ['value' => 'Shielding Solutions', 'group' => 'hero'],
            'hero_title_line2_en' => ['value' => 'and Accredited EMC Testing', 'group' => 'hero'],
            'hero_desc_tr' => ['value' => 'ISO 17025 ve uluslararası standartlara uygun EMC/EMI testleri, HEMP simülasyonları, güç ve sinyal filtreleri, anahtar teslim yankısız odalar ve hassas test enstrümantasyonu.', 'group' => 'hero'],
            'hero_desc_en' => ['value' => 'ISO 17025 and international standard compliant EMC/EMI testing, HEMP pulse simulators, power and signal filters, turnkey anechoic chambers, and precision test hardware.', 'group' => 'hero'],
            'hero_catalog_btn_tr' => ['value' => 'Ürün Kataloğu (74 Sistem)', 'group' => 'hero'],
            'hero_catalog_btn_en' => ['value' => 'Product Catalog (74 Systems)', 'group' => 'hero'],
            'hero_rfq_btn_tr' => ['value' => 'Deney Talep Formu (FR 7.1.4)', 'group' => 'hero'],
            'hero_rfq_btn_en' => ['value' => 'Test Request Form (FR 7.1.4)', 'group' => 'hero'],

            // ── LIVE STATS ──
            'stat_1_val' => ['value' => '54', 'group' => 'stats'],
            'stat_1_suffix' => ['value' => '+', 'group' => 'stats'],
            'stat_1_prefix' => ['value' => '', 'group' => 'stats'],
            'stat_1_label_tr' => ['value' => 'Savunma Portföyü', 'group' => 'stats'],
            'stat_1_label_en' => ['value' => 'Defense Systems', 'group' => 'stats'],

            'stat_2_val' => ['value' => '146', 'group' => 'stats'],
            'stat_2_suffix' => ['value' => '+', 'group' => 'stats'],
            'stat_2_prefix' => ['value' => '', 'group' => 'stats'],
            'stat_2_label_tr' => ['value' => 'Çözüm Ortağı', 'group' => 'stats'],
            'stat_2_label_en' => ['value' => 'Solution Partners', 'group' => 'stats'],

            'stat_3_val' => ['value' => '11', 'group' => 'stats'],
            'stat_3_suffix' => ['value' => '+', 'group' => 'stats'],
            'stat_3_prefix' => ['value' => '', 'group' => 'stats'],
            'stat_3_label_tr' => ['value' => 'Yıllık Deneyim', 'group' => 'stats'],
            'stat_3_label_en' => ['value' => 'Years Experience', 'group' => 'stats'],

            'stat_4_val' => ['value' => '73', 'group' => 'stats'],
            'stat_4_suffix' => ['value' => '', 'group' => 'stats'],
            'stat_4_prefix' => ['value' => '%', 'group' => 'stats'],
            'stat_4_label_tr' => ['value' => 'Milli Tesis Kalkanı', 'group' => 'stats'],
            'stat_4_label_en' => ['value' => 'Facility Compliance', 'group' => 'stats'],

            // ── PARTNER MARQUEE ──
            'partner_marquee_tag_tr' => ['value' => 'SAVUNMA SANAYİİ VE RESMİ KURUM REFERANSLARI', 'group' => 'partner'],
            'partner_marquee_tag_en' => ['value' => 'DEFENSE INDUSTRY & ACCREDITED PARTNERS', 'group' => 'partner'],

            // ── CORE CAPABILITIES ──
            'disp_tag_tr' => ['value' => 'Mühendislik Yetkinlikleri & Çözümler', 'group' => 'capabilities'],
            'disp_tag_en' => ['value' => 'Core Engineering Disciplines', 'group' => 'capabilities'],
            'disp_title_tr' => ['value' => 'İleri Seviye Elektromanyetik Savunma Altyapısı', 'group' => 'capabilities'],
            'disp_title_en' => ['value' => 'Advanced Electromagnetic Defense Infrastructure', 'group' => 'capabilities'],
            'disp_lead_tr' => ['value' => 'Konsept tasarımdan anahtar teslim tesislere kadar askeri standartlarda yerli mühendislik, imalat ve akredite test hizmetleri.', 'group' => 'capabilities'],
            'disp_lead_en' => ['value' => 'From concept engineering to turnkey accredited facilities: military qualified manufacturing, high-voltage simulation, and precision testing services.', 'group' => 'capabilities'],

            'disp_1_title_tr' => ['value' => 'HEMP / HPEM Darbe Simülatörleri', 'group' => 'capabilities'],
            'disp_1_title_en' => ['value' => 'HEMP / HPEM Pulse Simulators', 'group' => 'capabilities'],
            'disp_1_desc_tr' => ['value' => 'Yüksek irtifa nükleer patlamaların oluşturduğu E1, E2 ve E3 elektromanyetik darbelerini laboratuvar ortamında simüle eden 300 kV/m elektrik alan jeneratörleri ve Marx darbe üreteçleri.', 'group' => 'capabilities'],
            'disp_1_desc_en' => ['value' => 'Simulating E1, E2, and E3 electromagnetic pulses generated by high-altitude nuclear detonations: 300 kV/m electric field generators and Marx high-voltage pulsers.', 'group' => 'capabilities'],
            'disp_1_spec_1_tr' => ['value' => 'MIL-STD-461G RS105 Tehdit Alanı Simülasyonu', 'group' => 'capabilities'],
            'disp_1_spec_1_en' => ['value' => 'MIL-STD-461G RS105 Threat Simulation', 'group' => 'capabilities'],
            'disp_1_spec_2_tr' => ['value' => 'MIL-STD-188-125-1 Doğrudan Darbe Enjeksiyon (PCI) Testleri', 'group' => 'capabilities'],
            'disp_1_spec_2_en' => ['value' => 'MIL-STD-188-125-1 Pulsed Current Injection (PCI)', 'group' => 'capabilities'],
            'disp_1_spec_3_tr' => ['value' => '< 2 ns Pikosaniye Seviyesinde Yükselme Zamanı Kontrolü', 'group' => 'capabilities'],
            'disp_1_spec_3_en' => ['value' => '< 2 ns Sub-nanosecond Rise-Time Control', 'group' => 'capabilities'],

            'disp_2_title_tr' => ['value' => 'TEMPEST SDIP-27 Level A Filtreleme', 'group' => 'capabilities'],
            'disp_2_title_en' => ['value' => 'TEMPEST SDIP-27 Level A Filtering', 'group' => 'capabilities'],
            'disp_2_desc_tr' => ['value' => 'Kritik askeri iletişim ve veri işleme tesislerinde sinyal sızıntılarını engelleyen, 100 kHz - 40 GHz frekans bandında 100 dB ve üzeri zayıflatma sağlayan askeri güç ve veri hattı filtreleri.', 'group' => 'capabilities'],
            'disp_2_desc_en' => ['value' => 'Preventing compromising electromagnetic emanations in secure communication and data processing facilities: >100 dB insertion loss from 100 kHz to 40 GHz.', 'group' => 'capabilities'],
            'disp_2_spec_1_tr' => ['value' => 'SDIP-27 / SDIP-29 Seviye A Koruması', 'group' => 'capabilities'],
            'disp_2_spec_1_en' => ['value' => 'SDIP-27 / SDIP-29 Level A Protection', 'group' => 'capabilities'],
            'disp_2_spec_2_tr' => ['value' => '16A\'den 1600A\'e Kadar Yüksek Akımlı Güç Filtreleri', 'group' => 'capabilities'],
            'disp_2_spec_2_en' => ['value' => 'Current Ratings from 16A up to 1600A', 'group' => 'capabilities'],
            'disp_2_spec_3_tr' => ['value' => 'HEMP Akım Darbelerine Karşı Entegre Varistör Koruması', 'group' => 'capabilities'],
            'disp_2_spec_3_en' => ['value' => 'Integrated Varistors for HEMP Surge Suppression', 'group' => 'capabilities'],

            'disp_3_title_tr' => ['value' => 'Anahtar Teslim Yankısız Test Odaları', 'group' => 'capabilities'],
            'disp_3_title_en' => ['value' => 'Turnkey Shielded Anechoic Chambers', 'group' => 'capabilities'],
            'disp_3_desc_tr' => ['value' => 'Savunma ve havacılık platformlarının EMI/EMC sertifikasyon testleri için ferrit karo ve piramit soğurucu kaplamalı, tam ve yarı yankısız akredite test odaları tasarımı ve kurulumu.', 'group' => 'capabilities'],
            'disp_3_desc_en' => ['value' => 'Design, acoustic/RF simulation, and construction of semi and fully anechoic testing chambers lined with ferrite tiles and hybrid pyramidal absorbers for defense EMC qualification.', 'group' => 'capabilities'],
            'disp_3_spec_1_tr' => ['value' => '10 kHz - 40 GHz Aralığında > 100 dB Kalkanlama Etkinliği', 'group' => 'capabilities'],
            'disp_3_spec_1_en' => ['value' => '> 100 dB Shielding Effectiveness (10 kHz - 40 GHz)', 'group' => 'capabilities'],
            'disp_3_spec_2_tr' => ['value' => 'MIL-STD-461 ve CISPR 16-1-4 Uyumlu Test Hacimleri', 'group' => 'capabilities'],
            'disp_3_spec_2_en' => ['value' => 'MIL-STD-461 & CISPR 16-1-4 Compliant Quiet Zones', 'group' => 'capabilities'],
            'disp_3_spec_3_tr' => ['value' => 'RF Korumalı Kapılar, Balpeteği Havalandırmalar ve Fiber Geçişleri', 'group' => 'capabilities'],
            'disp_3_spec_3_en' => ['value' => 'RF Shielded Doors, Honeycomb Vents, and Fiber Penetrations', 'group' => 'capabilities'],

            'disp_4_title_tr' => ['value' => 'Hassas EMI/EMC Test Cihazları & LISN', 'group' => 'capabilities'],
            'disp_4_title_en' => ['value' => 'Precision EMI/EMC Test Hardware & LISN', 'group' => 'capabilities'],
            'disp_4_desc_tr' => ['value' => 'İletilen emisyon ve bağışıklık testlerinde kullanılan askeri ve ticari standartlarda LISN, CDN, darbe sınırlayıcılar, ESD tabancaları ve sertifikalı ikinci el test enstrümanları.', 'group' => 'capabilities'],
            'disp_4_desc_en' => ['value' => 'Line Impedance Stabilization Networks (LISN), Coupling/Decoupling Networks (CDN), transient limiters, ESD simulators, and certified pre-owned test instrumentation.', 'group' => 'capabilities'],
            'disp_4_spec_1_tr' => ['value' => 'MIL-STD-461G Uyumlu 50 μH Hat Empedans Şebekeleri (LISN)', 'group' => 'capabilities'],
            'disp_4_spec_1_en' => ['value' => 'MIL-STD-461G Compliant 50 μH LISN Networks', 'group' => 'capabilities'],
            'disp_4_spec_2_tr' => ['value' => 'Rohde & Schwarz ve Keysight Kalibre Edilmiş Cihaz Portföyü', 'group' => 'capabilities'],
            'disp_4_spec_2_en' => ['value' => 'Calibrated Rohde & Schwarz & Keysight Portfolio', 'group' => 'capabilities'],
            'disp_4_spec_3_tr' => ['value' => 'ISO 17025 İzlenebilir Kalibrasyon Sertifikaları', 'group' => 'capabilities'],
            'disp_4_spec_3_en' => ['value' => 'ISO 17025 Traceable Calibration Certificates', 'group' => 'capabilities'],

            // ── CATALOG SECTION ──
            'catalog_tag_tr' => ['value' => 'Savunma Sanayii Ürün Kataloğu', 'group' => 'catalog'],
            'catalog_tag_en' => ['value' => 'Defense Hardware Catalog', 'group' => 'catalog'],
            'catalog_title_tr' => ['value' => 'Sertifikalı Sistem ve Ekipman Portföyü', 'group' => 'catalog'],
            'catalog_title_en' => ['value' => 'Certified Systems & Instrumentation Portfolio', 'group' => 'catalog'],
            'catalog_lead_tr' => ['value' => 'Tamamı teknik çizim, 3D modelleme veya yüksek çözünürlüklü fotoğraflar ve resmi PDF datasheet dokümanlarıyla desteklenen 74 adet aktif sistem.', 'group' => 'catalog'],
            'catalog_lead_en' => ['value' => 'All 74 qualified systems complete with interactive 3D models or high-resolution photography, structured parameters, and official PDF datasheets.', 'group' => 'catalog'],
            'catalog_search_placeholder_tr' => ['value' => 'Model, standart veya cihaz adı ile ara...', 'group' => 'catalog'],
            'catalog_search_placeholder_en' => ['value' => 'Search by model, standard or equipment name...', 'group' => 'catalog'],

            // ── FACILITY SECTION ──
            'facility_tag_tr' => ['value' => 'Üretim & Kalite Altyapısı', 'group' => 'facility'],
            'facility_tag_en' => ['value' => 'Manufacturing & Quality Infrastructure', 'group' => 'facility'],
            'facility_title_tr' => ['value' => 'Entegrasyon & Test Laboratuvarımız', 'group' => 'facility'],
            'facility_title_en' => ['value' => 'Our Integration & Calibration Facility', 'group' => 'facility'],
            'facility_desc_tr' => ['value' => 'Kocaeli Kartepe\'deki yüksek teknolojili üretim ve entegrasyon merkezimizde, ISO 9001:2015 ve ISO 17025 standartlarında kalibrasyon ve test hizmetleri yürütülmektedir.', 'group' => 'facility'],
            'facility_desc_en' => ['value' => 'At our high-technology facility in Kartepe / Kocaeli, engineering, manufacturing, and calibration operations are performed under ISO 9001:2015 and ISO 17025 standards.', 'group' => 'facility'],
            'facility_p1_title_tr' => ['value' => 'Tesis Güvenlik ve Akreditasyon Belgeleri', 'group' => 'facility'],
            'facility_p1_title_en' => ['value' => 'Defense Facility Security Clearances', 'group' => 'facility'],
            'facility_p1_desc_tr' => ['value' => 'Tüm mühendislik ve üretim süreçleri Savunma Sanayii Başkanlığı ve MSB güvenlik standartlarına tam uyumludur.', 'group' => 'facility'],
            'facility_p1_desc_en' => ['value' => 'All engineering and manufacturing workflows strictly conform to Defense Industry Agency and Ministry of National Defense protocols.', 'group' => 'facility'],
            'facility_p2_title_tr' => ['value' => 'ISO 17025 İzlenebilir Kalibrasyon', 'group' => 'facility'],
            'facility_p2_title_en' => ['value' => 'ISO 17025 Traceable Metrological Calibration', 'group' => 'facility'],
            'facility_p2_desc_tr' => ['value' => 'LISN, CDN, antenler ve darbe jeneratörleri uluslararası metrolojik izlenebilirlik sertifikalarıyla teslim edilir.', 'group' => 'facility'],
            'facility_p2_desc_en' => ['value' => 'LISNs, CDNs, high-frequency antennas, and high-voltage pulsers are delivered with internationally traceable calibration reports.', 'group' => 'facility'],
            'facility_p3_title_tr' => ['value' => 'Stratejik Konum & Test Sahası', 'group' => 'facility'],
            'facility_p3_title_en' => ['value' => 'Strategic Defense Proving & Open Test Site', 'group' => 'facility'],
            'facility_p3_desc_tr' => ['value' => 'Kartepe/Kocaeli sanayi ve teknoloji koridorunda geniş yankısız oda ve yüksek gerilim açık alan test sahası.', 'group' => 'facility'],
            'facility_p3_desc_en' => ['value' => 'Conveniently located in the Kocaeli / Kartepe defense technology corridor with extensive anechoic chambers and high-voltage outdoor test pads.', 'group' => 'facility'],

            // ── PROCUREMENT / RFQ BANNER ──
            'banner_rfq_badge_tr' => ['value' => 'GİZLİLİK VE PROTOKOL DÂHİLİNDE TEDARİK', 'group' => 'banner'],
            'banner_rfq_badge_en' => ['value' => 'PROCUREMENT UNDER CONFIDENTIALITY PROTOCOLS', 'group' => 'banner'],
            'banner_rfq_title_tr' => ['value' => 'Savunma Sanayii Projeniz İçin Teknik RFQ Başlatın', 'group' => 'banner'],
            'banner_rfq_title_en' => ['value' => 'Initiate a Technical Defense RFQ for Your Program', 'group' => 'banner'],
            'banner_rfq_desc_tr' => ['value' => 'Savunma Sanayii Başkanlığı, Aselsan, Roketsan, TUSAŞ veya TSK projeleriniz için teknik şartname veya ihtiyaç bildirimlerinizi iletebilir; uzman savunma mühendislerimizle görüşebilirsiniz.', 'group' => 'banner'],
            'banner_rfq_desc_en' => ['value' => 'Submit technical specifications or requirement inquiries for your programs across the Defense Industry Agency, Aselsan, Roketsan, TAI, or Armed Forces to consult directly with our defense engineers.', 'group' => 'banner'],
            'banner_rfq_btn_tr' => ['value' => 'Resmi Savunma RFQ Formunu Aç', 'group' => 'banner'],
            'banner_rfq_btn_en' => ['value' => 'Open Defense RFQ Portal', 'group' => 'banner'],

            // ── NAVBAR & HEADER ──
            'nav_clearance_tr' => ['value' => 'SAVUNMA SANAYİİ VE TESİS GÜVENLİK AKREDİTASYONU', 'group' => 'navbar'],
            'nav_clearance_en' => ['value' => 'DEFENSE FACILITY SECURITY & QUALITY ACCREDITATION', 'group' => 'navbar'],
            'nav_iso_tr' => ['value' => 'ISO 9001:2015 • ISO 17025', 'group' => 'navbar'],
            'nav_iso_en' => ['value' => 'ISO 9001:2015 • ISO 17025', 'group' => 'navbar'],
            'nav_brand_title_tr' => ['value' => 'EMC SAVUNMA', 'group' => 'navbar'],
            'nav_brand_title_en' => ['value' => 'EMC DEFENSE', 'group' => 'navbar'],
            'nav_brand_subtitle_tr' => ['value' => 'EMI/EMC SOLUTIONS', 'group' => 'navbar'],
            'nav_brand_subtitle_en' => ['value' => 'EMI/EMC SOLUTIONS', 'group' => 'navbar'],
            'nav_menu_home_tr' => ['value' => 'Ana Sayfa', 'group' => 'navbar'],
            'nav_menu_home_en' => ['value' => 'Home', 'group' => 'navbar'],
            'nav_menu_products_tr' => ['value' => 'Ürünler & Sistemler', 'group' => 'navbar'],
            'nav_menu_products_en' => ['value' => 'Products & Systems', 'group' => 'navbar'],
            'nav_menu_capabilities_tr' => ['value' => 'Yetkinlikler', 'group' => 'navbar'],
            'nav_menu_capabilities_en' => ['value' => 'Capabilities', 'group' => 'navbar'],
            'nav_menu_references_tr' => ['value' => 'Referanslar', 'group' => 'navbar'],
            'nav_menu_references_en' => ['value' => 'References', 'group' => 'navbar'],
            'nav_menu_certificates_tr' => ['value' => 'Sertifikalar', 'group' => 'navbar'],
            'nav_menu_certificates_en' => ['value' => 'Certificates', 'group' => 'navbar'],
            'nav_menu_contact_tr' => ['value' => 'İletişim', 'group' => 'navbar'],
            'nav_menu_contact_en' => ['value' => 'Contact', 'group' => 'navbar'],
            'nav_rfq_btn_tr' => ['value' => 'Deney Talep Formu (FR 7.1.4)', 'group' => 'navbar'],
            'nav_rfq_btn_en' => ['value' => 'Test Request Form (FR 7.1.4)', 'group' => 'navbar'],

            // ── DENEY TALEP FORMU (FR 7.1.4) ──
            'test_form_title_tr' => ['value' => 'Deney Talep Formu', 'group' => 'test_form'],
            'test_form_title_en' => ['value' => 'Test Request Form', 'group' => 'test_form'],
            'test_form_doc_no' => ['value' => 'FR 7.1.4', 'group' => 'test_form'],
            'test_form_rev_no' => ['value' => '00', 'group' => 'test_form'],
            'test_form_submit_btn_tr' => ['value' => 'Deney Talebini Gönder', 'group' => 'test_form'],
            'test_form_submit_btn_en' => ['value' => 'Submit Test Request', 'group' => 'test_form'],

            // ── PRODUCT DETAIL RFQ ──
            'product_rfq_title_tr' => ['value' => 'Resmi Tedarik & RFQ', 'group' => 'product'],
            'product_rfq_title_en' => ['value' => 'Official Defense RFQ & Quote', 'group' => 'product'],
            'product_rfq_desc_tr' => ['value' => 'Bu sistem veya özel proje gereksinimleriniz için Savunma Departmanımızdan resmi teknik teklif ve şartname desteği alabilirsiniz.', 'group' => 'product'],
            'product_rfq_desc_en' => ['value' => 'Contact our Defense Procurement Division for official technical specifications, quotation, and engineering integration support.', 'group' => 'product'],
            'product_rfq_btn_tr' => ['value' => 'Bu Ürün İçin RFQ Başlat', 'group' => 'product'],
            'product_rfq_btn_en' => ['value' => 'Request RFQ for This System', 'group' => 'product'],

            // ── FOOTER CONFIGURATION ──
            'footer_brand_title_tr' => ['value' => 'EMC SAVUNMA SİSTEMLERİ', 'group' => 'footer'],
            'footer_brand_title_en' => ['value' => 'EMC DEFENSE SYSTEMS', 'group' => 'footer'],
            'footer_desc_tr' => ['value' => 'Savunma Sanayii, Havacılık ve Stratejik Tesisler için HEMP simülatörleri, TEMPEST filtreleri ve anahtar teslim yankısız test odaları mühendisliği.', 'group' => 'footer'],
            'footer_desc_en' => ['value' => 'Accredited engineering and manufacturing of HEMP pulse simulators, TEMPEST SDIP-27 power line filters, and turnkey shielded testing chambers for military, aerospace, and commercial programs.', 'group' => 'footer'],
            'footer_cage_label_tr' => ['value' => 'Sicil & CAGE Kodu', 'group' => 'footer'],
            'footer_cage_label_en' => ['value' => 'Registry & CAGE Code', 'group' => 'footer'],
            'footer_cage_value_tr' => ['value' => 'CAGE SİCİL: TR-EMC01 // AKREDİTE TEST LABORATUVARI', 'group' => 'footer'],
            'footer_cage_value_en' => ['value' => 'CAGE CODE: TR-EMC01 // ACCREDITED TESTING LABORATORY', 'group' => 'footer'],
            'footer_col1_title_tr' => ['value' => 'Mühendislik Çözümleri', 'group' => 'footer'],
            'footer_col1_title_en' => ['value' => 'Engineering Solutions', 'group' => 'footer'],
            'footer_col2_title_tr' => ['value' => 'Sertifikalar & Akreditasyonlar', 'group' => 'footer'],
            'footer_col2_title_en' => ['value' => 'Certificates & Accreditations', 'group' => 'footer'],
            'footer_col3_title_tr' => ['value' => 'Üretim & Test Tesisi', 'group' => 'footer'],
            'footer_col3_title_en' => ['value' => 'Manufacturing & Lab Facility', 'group' => 'footer'],
            'footer_rfq_btn_tr' => ['value' => 'Deney Talep Formu (FR 7.1.4)', 'group' => 'footer'],
            'footer_rfq_btn_en' => ['value' => 'Test Request Form (FR 7.1.4)', 'group' => 'footer'],
            'footer_copyright_tr' => ['value' => 'EMC Savunma ve Elektronik Sistemleri San. Tic. Ltd. Şti. Tüm hakları saklıdır.', 'group' => 'footer'],
            'footer_copyright_en' => ['value' => 'EMC Defense & Electronic Systems Ltd. All rights reserved.', 'group' => 'footer'],
            'footer_linkedin_url' => ['value' => 'https://linkedin.com/company/emcturkey', 'group' => 'footer'],
            'footer_youtube_url' => ['value' => 'https://youtube.com/@emctestvekontrolhizmetleri7839', 'group' => 'footer'],
        ];

        foreach ($settings as $key => $data) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $data['value'], 'group' => $data['group']]
            );
        }

        Setting::clearCache();
    }
}
