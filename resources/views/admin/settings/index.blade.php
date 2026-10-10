@extends('admin.layout')

@section('title', 'Site İçerikleri & Sistem Ayarları – Admin')
@section('page_title', 'Site İçerikleri & Dinamik Yönetim Merkezi')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-custom">
            {{-- HEADER BAR --}}
            <div class="card-header-custom d-flex flex-wrap align-items-center justify-content-between gap-3 pb-3 mb-4" style="border-bottom: 1px solid #E2E8F0;">
                <div>
                    <h5 class="fw-bold text-dark m-0 d-flex align-items-center gap-2">
                        <i class="bi bi-sliders text-primary"></i>
                        <span>Dinamik Site İçerikleri & Genel Ayarlar</span>
                    </h5>
                    <p class="text-muted small m-0 mt-1">
                        Sitedeki tüm metinleri, başlıkları, butonları, form parametrelerini ve kurumsal bilgileri hem Türkçe hem İngilizce olarak tek merkezden yönetin.
                    </p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('home') }}" target="_blank" class="btn-outline-emc py-2 px-3" style="font-size: 0.85rem;">
                        <i class="bi bi-box-arrow-up-right"></i>
                        <span>Canlı Siteyi Gör</span>
                    </a>
                    <button type="button" onclick="document.getElementById('settingsMainForm').submit();" class="btn-emc py-2 px-3" style="font-size: 0.85rem;">
                        <i class="bi bi-check2-circle"></i>
                        <span>Hızlı Kaydet</span>
                    </button>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert" style="background: #DCFCE7; border: 1px solid #86EFAC; color: #166534; border-radius: 10px;">
                    <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Kapat"></button>
                </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST" id="settingsMainForm">
                @csrf
                <input type="hidden" name="active_tab" id="activeTabInput" value="tab-hero">

                {{-- NAV TABS --}}
                <ul class="nav nav-pills mb-4 gap-2 flex-wrap" id="settingsTabs" role="tablist" style="border-bottom: 1px solid #E2E8F0; padding-bottom: 1rem;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="hero-tab" data-bs-toggle="pill" data-bs-target="#tab-hero" type="button" role="tab">
                            <i class="bi bi-shield-shaded me-1"></i> 1. Hero & Giriş
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="navbar-tab" data-bs-toggle="pill" data-bs-target="#tab-navbar" type="button" role="tab">
                            <i class="bi bi-window-stack me-1"></i> 2. Navbar & Tepe Bar
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="stats-tab" data-bs-toggle="pill" data-bs-target="#tab-stats" type="button" role="tab">
                            <i class="bi bi-speedometer2 me-1"></i> 3. Canlı Sayaçlar
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="capabilities-tab" data-bs-toggle="pill" data-bs-target="#tab-capabilities" type="button" role="tab">
                            <i class="bi bi-cpu me-1"></i> 4. 4 Ana Disiplin
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="catalog-tab" data-bs-toggle="pill" data-bs-target="#tab-catalog" type="button" role="tab">
                            <i class="bi bi-grid-3x3-gap-fill me-1"></i> 5. Katalog & RFQ Banner
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="test-form-tab" data-bs-toggle="pill" data-bs-target="#tab-test-form" type="button" role="tab">
                            <i class="bi bi-file-earmark-medical me-1"></i> 6. Deney Talep Formu (FR 7.1.4)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="facility-tab" data-bs-toggle="pill" data-bs-target="#tab-facility" type="button" role="tab">
                            <i class="bi bi-building-gear me-1"></i> 7. Tesis & Kalite
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="pill" data-bs-target="#tab-contact" type="button" role="tab">
                            <i class="bi bi-telephone-inbound me-1"></i> 8. İletişim & Lokasyon
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="footer-tab" data-bs-toggle="pill" data-bs-target="#tab-footer" type="button" role="tab">
                            <i class="bi bi-layout-text-window-reverse me-1"></i> 9. Footer & Sosyal Medya
                        </button>
                    </li>
                </ul>

                {{-- TAB CONTENT PANES --}}
                <div class="tab-content" id="settingsTabContent">
                    
                    {{-- ══════════════════════════════════════════════════════════ --}}
                    <div class="tab-pane fade show active" id="tab-hero" role="tabpanel">
                        <div class="p-3 mb-4 rounded" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <h6 class="fw-bold mb-1" style="color: #1E2D7D;"><i class="bi bi-shield-shaded me-1"></i> Hero Giriş Ekranı Metin ve Butonları</h6>
                            <small style="color: #475569;">Ana sayfanın en üstünde yer alan karşılama rozeti, 2 satırlı ana başlık, vurgulu kelimeler ve buton metinleri.</small>
                        </div>

                        <div class="row g-4">
                            <!-- Türkçe Hero -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-primary me-2">TR</span> Türkçe Hero İçerikleri</h6>
                                    
                                    <div class="mb-3">
                                        <label class="form-label-custom">Üst Rozet Metni (TR)</label>
                                        <input type="text" name="hero_badge_tr" class="form-control-custom" value="{{ $settings['hero_badge_tr']->value ?? '' }}">
                                        <div class="small text-muted mt-1">Örn: AKREDİTE EMC TEST LABORATUVARI VE MÜHENDİSLİK MERKEZİ</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Ana Başlık 1. Satır (TR)</label>
                                        <input type="text" name="hero_title_line1_tr" class="form-control-custom" value="{{ $settings['hero_title_line1_tr']->value ?? '' }}">
                                        <div class="small text-muted mt-1">Örn: Kritik Sistemler İçin</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Ana Başlık Mavi Vurgulu Kelimeler (TR)</label>
                                        <input type="text" name="hero_title_highlight_tr" class="form-control-custom" value="{{ $settings['hero_title_highlight_tr']->value ?? '' }}">
                                        <div class="small text-muted mt-1">Örn: İleri Elektromanyetik Kalkanlama</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Ana Başlık 2. Satır / Devamı (TR)</label>
                                        <input type="text" name="hero_title_line2_tr" class="form-control-custom" value="{{ $settings['hero_title_line2_tr']->value ?? '' }}">
                                        <div class="small text-muted mt-1">Örn: ve EMC Test Çözümleri</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Hero Açıklama Paragrafı (TR)</label>
                                        <textarea name="hero_desc_tr" rows="4" class="form-control-custom">{{ $settings['hero_desc_tr']->value ?? '' }}</textarea>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">1. Buton Metni (TR)</label>
                                            <input type="text" name="hero_catalog_btn_tr" class="form-control-custom" value="{{ $settings['hero_catalog_btn_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">2. Buton Metni (TR)</label>
                                            <input type="text" name="hero_rfq_btn_tr" class="form-control-custom" value="{{ $settings['hero_rfq_btn_tr']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- English Hero -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-secondary me-2">EN</span> English Hero Content</h6>
                                    
                                    <div class="mb-3">
                                        <label class="form-label-custom">Top Badge Text (EN)</label>
                                        <input type="text" name="hero_badge_en" class="form-control-custom" value="{{ $settings['hero_badge_en']->value ?? '' }}">
                                        <div class="small text-muted mt-1">e.g., ACCREDITED EMC TESTING LABORATORY & ENGINEERING CENTER</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Main Headline Line 1 (EN)</label>
                                        <input type="text" name="hero_title_line1_en" class="form-control-custom" value="{{ $settings['hero_title_line1_en']->value ?? '' }}">
                                        <div class="small text-muted mt-1">e.g., Advanced Electromagnetic</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Headline Gradient Highlight (EN)</label>
                                        <input type="text" name="hero_title_highlight_en" class="form-control-custom" value="{{ $settings['hero_title_highlight_en']->value ?? '' }}">
                                        <div class="small text-muted mt-1">e.g., Shielding Solutions</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Headline Line 2 (EN)</label>
                                        <input type="text" name="hero_title_line2_en" class="form-control-custom" value="{{ $settings['hero_title_line2_en']->value ?? '' }}">
                                        <div class="small text-muted mt-1">e.g., and Accredited EMC Testing</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Hero Narrative Description (EN)</label>
                                        <textarea name="hero_desc_en" rows="4" class="form-control-custom">{{ $settings['hero_desc_en']->value ?? '' }}</textarea>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Button 1 Text (EN)</label>
                                            <input type="text" name="hero_catalog_btn_en" class="form-control-custom" value="{{ $settings['hero_catalog_btn_en']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Button 2 Text (EN)</label>
                                            <input type="text" name="hero_rfq_btn_en" class="form-control-custom" value="{{ $settings['hero_rfq_btn_en']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════════════════════ --}}
                    {{-- TAB 2: NAVBAR & HEADER                                     --}}
                    {{-- ══════════════════════════════════════════════════════════ --}}
                    <div class="tab-pane fade" id="tab-navbar" role="tabpanel">
                        <div class="p-3 mb-4 rounded" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <h6 class="fw-bold mb-1" style="color: #1E2D7D;"><i class="bi bi-window-stack me-1"></i> Üst Menü (Navbar) & Başlık Çubuğu Yönetimi</h6>
                            <small style="color: #475569;">Tepe güvenlik rozetleri, ISO metinleri, logo yanındaki marka başlığı, menü linkleri ve Deney Talep Formu butonunu Türkçe ve İngilizce olarak özelleştirin.</small>
                        </div>

                        <div class="row g-4 mb-4">
                            <!-- Türkçe Navbar -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-primary me-2">TR</span> Türkçe Başlık & Menü Metinleri</h6>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Tepe Bar Güvenlik / Akreditasyon Metni (TR)</label>
                                        <input type="text" name="nav_clearance_tr" class="form-control-custom" value="{{ $settings['nav_clearance_tr']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Tepe Bar ISO Standartları Rozeti (TR)</label>
                                        <input type="text" name="nav_iso_tr" class="form-control-custom" value="{{ $settings['nav_iso_tr']->value ?? '' }}">
                                    </div>

                                    <hr class="my-3" style="border-color: #E2E8F0;">
                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">Logo Yanı Marka Metinleri (TR)</h6>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Marka Ana Başlığı (TR)</label>
                                        <input type="text" name="nav_brand_title_tr" class="form-control-custom" value="{{ $settings['nav_brand_title_tr']->value ?? 'EMC DEFENSE' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Marka Alt Başlığı (TR)</label>
                                        <input type="text" name="nav_brand_subtitle_tr" class="form-control-custom" value="{{ $settings['nav_brand_subtitle_tr']->value ?? 'EMI/EMC SOLUTIONS' }}">
                                    </div>

                                    <hr class="my-3" style="border-color: #E2E8F0;">
                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">Navigasyon Menü İsimleri (TR)</h6>

                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Ana Sayfa</label>
                                            <input type="text" name="nav_menu_home_tr" class="form-control-custom" value="{{ $settings['nav_menu_home_tr']->value ?? 'Ana Sayfa' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Ürünler</label>
                                            <input type="text" name="nav_menu_products_tr" class="form-control-custom" value="{{ $settings['nav_menu_products_tr']->value ?? 'Ürünler & Sistemler' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Yetkinlikler</label>
                                            <input type="text" name="nav_menu_capabilities_tr" class="form-control-custom" value="{{ $settings['nav_menu_capabilities_tr']->value ?? 'Yetkinlikler' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Referanslar</label>
                                            <input type="text" name="nav_menu_references_tr" class="form-control-custom" value="{{ $settings['nav_menu_references_tr']->value ?? 'Referanslar' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label-custom">Sertifikalar</label>
                                            <input type="text" name="nav_menu_certificates_tr" class="form-control-custom" value="{{ $settings['nav_menu_certificates_tr']->value ?? 'Sertifikalar' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">İletişim</label>
                                            <input type="text" name="nav_menu_contact_tr" class="form-control-custom" value="{{ $settings['nav_menu_contact_tr']->value ?? 'İletişim' }}">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Navbar Sağ Buton Metni (TR)</label>
                                        <input type="text" name="nav_rfq_btn_tr" class="form-control-custom" value="{{ $settings['nav_rfq_btn_tr']->value ?? 'Deney Talep Formu (FR 7.1.4)' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- English Navbar -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-secondary me-2">EN</span> English Header & Menu Content</h6>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Utility Bar Clearance Notice (EN)</label>
                                        <input type="text" name="nav_clearance_en" class="form-control-custom" value="{{ $settings['nav_clearance_en']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Utility Bar ISO Badge (EN)</label>
                                        <input type="text" name="nav_iso_en" class="form-control-custom" value="{{ $settings['nav_iso_en']->value ?? '' }}">
                                    </div>

                                    <hr class="my-3" style="border-color: #E2E8F0;">
                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">Brand Identity Next to Logo (EN)</h6>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Brand Main Title (EN)</label>
                                        <input type="text" name="nav_brand_title_en" class="form-control-custom" value="{{ $settings['nav_brand_title_en']->value ?? 'EMC DEFENSE' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Brand Subtitle (EN)</label>
                                        <input type="text" name="nav_brand_subtitle_en" class="form-control-custom" value="{{ $settings['nav_brand_subtitle_en']->value ?? 'EMI/EMC SOLUTIONS' }}">
                                    </div>

                                    <hr class="my-3" style="border-color: #E2E8F0;">
                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">Navigation Menu Labels (EN)</h6>

                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Home</label>
                                            <input type="text" name="nav_menu_home_en" class="form-control-custom" value="{{ $settings['nav_menu_home_en']->value ?? 'Home' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Products</label>
                                            <input type="text" name="nav_menu_products_en" class="form-control-custom" value="{{ $settings['nav_menu_products_en']->value ?? 'Products & Systems' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Capabilities</label>
                                            <input type="text" name="nav_menu_capabilities_en" class="form-control-custom" value="{{ $settings['nav_menu_capabilities_en']->value ?? 'Capabilities' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">References</label>
                                            <input type="text" name="nav_menu_references_en" class="form-control-custom" value="{{ $settings['nav_menu_references_en']->value ?? 'References' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label-custom">Certificates</label>
                                            <input type="text" name="nav_menu_certificates_en" class="form-control-custom" value="{{ $settings['nav_menu_certificates_en']->value ?? 'Certificates' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Contact</label>
                                            <input type="text" name="nav_menu_contact_en" class="form-control-custom" value="{{ $settings['nav_menu_contact_en']->value ?? 'Contact' }}">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Navbar CTA Button (EN)</label>
                                        <input type="text" name="nav_rfq_btn_en" class="form-control-custom" value="{{ $settings['nav_rfq_btn_en']->value ?? 'Test Request Form (FR 7.1.4)' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════════════════════ --}}
                    {{-- TAB 3: LIVE STATS SAYAÇLARI                               --}}
                    {{-- ══════════════════════════════════════════════════════════ --}}
                    <div class="tab-pane fade" id="tab-stats" role="tabpanel">
                        <div class="p-3 mb-4 rounded" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <h6 class="fw-bold mb-1" style="color: #1E2D7D;"><i class="bi bi-speedometer2 me-1"></i> Hero Altı Canlı Sayaç Metrikleri</h6>
                            <small style="color: #475569;">Ana sayfada Hero'nun hemen altında animasyonla sayılan 4 adet istatistik kutusu. Rakam, ön ek, son ek ve etiketleri özelleştirin.</small>
                        </div>

                        <div class="row g-4">
                            <!-- Stat 1 -->
                            <div class="col-md-6 col-xl-3">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="badge bg-primary">Metrik 01</span>
                                        <i class="bi bi-shield-check text-primary fs-5"></i>
                                    </div>
                                    <div class="row g-1 mb-2">
                                        <div class="col-4">
                                            <label class="form-label-custom">Ön Ek</label>
                                            <input type="text" name="stat_1_prefix" class="form-control-custom text-center" value="{{ $settings['stat_1_prefix']->value ?? '' }}" placeholder="">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label-custom">Değer</label>
                                            <input type="text" name="stat_1_val" class="form-control-custom text-center fw-bold" value="{{ $settings['stat_1_val']->value ?? '54' }}">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label-custom">Son Ek</label>
                                            <input type="text" name="stat_1_suffix" class="form-control-custom text-center" value="{{ $settings['stat_1_suffix']->value ?? '+' }}">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Etiket (TR)</label>
                                        <input type="text" name="stat_1_label_tr" class="form-control-custom" value="{{ $settings['stat_1_label_tr']->value ?? '' }}">
                                    </div>
                                    <div>
                                        <label class="form-label-custom">Label (EN)</label>
                                        <input type="text" name="stat_1_label_en" class="form-control-custom" value="{{ $settings['stat_1_label_en']->value ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Stat 2 -->
                            <div class="col-md-6 col-xl-3">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="badge bg-primary">Metrik 02</span>
                                        <i class="bi bi-people text-primary fs-5"></i>
                                    </div>
                                    <div class="row g-1 mb-2">
                                        <div class="col-4">
                                            <label class="form-label-custom">Ön Ek</label>
                                            <input type="text" name="stat_2_prefix" class="form-control-custom text-center" value="{{ $settings['stat_2_prefix']->value ?? '' }}" placeholder="">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label-custom">Değer</label>
                                            <input type="text" name="stat_2_val" class="form-control-custom text-center fw-bold" value="{{ $settings['stat_2_val']->value ?? '146' }}">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label-custom">Son Ek</label>
                                            <input type="text" name="stat_2_suffix" class="form-control-custom text-center" value="{{ $settings['stat_2_suffix']->value ?? '+' }}">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Etiket (TR)</label>
                                        <input type="text" name="stat_2_label_tr" class="form-control-custom" value="{{ $settings['stat_2_label_tr']->value ?? '' }}">
                                    </div>
                                    <div>
                                        <label class="form-label-custom">Label (EN)</label>
                                        <input type="text" name="stat_2_label_en" class="form-control-custom" value="{{ $settings['stat_2_label_en']->value ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Stat 3 -->
                            <div class="col-md-6 col-xl-3">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="badge bg-primary">Metrik 03</span>
                                        <i class="bi bi-globe2 text-primary fs-5"></i>
                                    </div>
                                    <div class="row g-1 mb-2">
                                        <div class="col-4">
                                            <label class="form-label-custom">Ön Ek</label>
                                            <input type="text" name="stat_3_prefix" class="form-control-custom text-center" value="{{ $settings['stat_3_prefix']->value ?? '' }}" placeholder="">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label-custom">Değer</label>
                                            <input type="text" name="stat_3_val" class="form-control-custom text-center fw-bold" value="{{ $settings['stat_3_val']->value ?? '11' }}">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label-custom">Son Ek</label>
                                            <input type="text" name="stat_3_suffix" class="form-control-custom text-center" value="{{ $settings['stat_3_suffix']->value ?? '+' }}">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Etiket (TR)</label>
                                        <input type="text" name="stat_3_label_tr" class="form-control-custom" value="{{ $settings['stat_3_label_tr']->value ?? '' }}">
                                    </div>
                                    <div>
                                        <label class="form-label-custom">Label (EN)</label>
                                        <input type="text" name="stat_3_label_en" class="form-control-custom" value="{{ $settings['stat_3_label_en']->value ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Stat 4 -->
                            <div class="col-md-6 col-xl-3">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="badge bg-primary">Metrik 04</span>
                                        <i class="bi bi-patch-check text-primary fs-5"></i>
                                    </div>
                                    <div class="row g-1 mb-2">
                                        <div class="col-4">
                                            <label class="form-label-custom">Ön Ek</label>
                                            <input type="text" name="stat_4_prefix" class="form-control-custom text-center" value="{{ $settings['stat_4_prefix']->value ?? '%' }}" placeholder="">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label-custom">Değer</label>
                                            <input type="text" name="stat_4_val" class="form-control-custom text-center fw-bold" value="{{ $settings['stat_4_val']->value ?? '73' }}">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label-custom">Son Ek</label>
                                            <input type="text" name="stat_4_suffix" class="form-control-custom text-center" value="{{ $settings['stat_4_suffix']->value ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Etiket (TR)</label>
                                        <input type="text" name="stat_4_label_tr" class="form-control-custom" value="{{ $settings['stat_4_label_tr']->value ?? '' }}">
                                    </div>
                                    <div>
                                        <label class="form-label-custom">Label (EN)</label>
                                        <input type="text" name="stat_4_label_en" class="form-control-custom" value="{{ $settings['stat_4_label_en']->value ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════════════════════ --}}
                    {{-- TAB 4: CORE CAPABILITIES (4 DİSİPLİN)                      --}}
                    {{-- ══════════════════════════════════════════════════════════ --}}
                    <div class="tab-pane fade" id="tab-capabilities" role="tabpanel">
                        <div class="p-3 mb-4 rounded" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <h6 class="fw-bold mb-1" style="color: #1E2D7D;"><i class="bi bi-cpu me-1"></i> 4 Temel Mühendislik Disiplini & Teknik Detayları</h6>
                            <small style="color: #475569;">Bölüm başlığı, açıklaması ve 4 mühendislik kartının (HEMP Simülatörleri, TEMPEST Filtreleme, Yankısız Odalar, LISN/Test Donanımı) başlık ve alt maddeleri.</small>
                        </div>

                        <!-- Header Texts -->
                        <div class="row g-4 mb-4">
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-primary me-2">TR</span> Bölüm Başlıkları (TR)</h6>
                                    <div class="mb-3">
                                        <label class="form-label-custom">Bölüm Üst Rozeti</label>
                                        <input type="text" name="disp_tag_tr" class="form-control-custom" value="{{ $settings['disp_tag_tr']->value ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label-custom">Bölüm Ana Başlığı</label>
                                        <input type="text" name="disp_title_tr" class="form-control-custom" value="{{ $settings['disp_title_tr']->value ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label-custom">Bölüm Açıklama Yazısı</label>
                                        <textarea name="disp_lead_tr" rows="2" class="form-control-custom">{{ $settings['disp_lead_tr']->value ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-secondary me-2">EN</span> Section Headings (EN)</h6>
                                    <div class="mb-3">
                                        <label class="form-label-custom">Section Tag</label>
                                        <input type="text" name="disp_tag_en" class="form-control-custom" value="{{ $settings['disp_tag_en']->value ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label-custom">Section Main Title</label>
                                        <input type="text" name="disp_title_en" class="form-control-custom" value="{{ $settings['disp_title_en']->value ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label-custom">Section Lead Text</label>
                                        <textarea name="disp_lead_en" rows="2" class="form-control-custom">{{ $settings['disp_lead_en']->value ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 4 Disciplines -->
                        <div class="row g-4">
                            <!-- Discipline 1 -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #1E2D7D;"><i class="bi bi-lightning-charge-fill me-1"></i> Disiplin 01: HEMP / HPEM Darbe Simülatörleri</h6>
                                    
                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Başlık (TR)</label>
                                            <input type="text" name="disp_1_title_tr" class="form-control-custom" value="{{ $settings['disp_1_title_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Title (EN)</label>
                                            <input type="text" name="disp_1_title_en" class="form-control-custom" value="{{ $settings['disp_1_title_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label-custom">Açıklama (TR)</label>
                                            <textarea name="disp_1_desc_tr" rows="3" class="form-control-custom">{{ $settings['disp_1_desc_tr']->value ?? '' }}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Description (EN)</label>
                                            <textarea name="disp_1_desc_en" rows="3" class="form-control-custom">{{ $settings['disp_1_desc_en']->value ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">3 Alt Teknik Özellik Maddesi</h6>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Madde 1 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_1_spec_1_tr" class="form-control-custom" value="{{ $settings['disp_1_spec_1_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_1_spec_1_en" class="form-control-custom" value="{{ $settings['disp_1_spec_1_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Madde 2 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_1_spec_2_tr" class="form-control-custom" value="{{ $settings['disp_1_spec_2_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_1_spec_2_en" class="form-control-custom" value="{{ $settings['disp_1_spec_2_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label-custom">Madde 3 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_1_spec_3_tr" class="form-control-custom" value="{{ $settings['disp_1_spec_3_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_1_spec_3_en" class="form-control-custom" value="{{ $settings['disp_1_spec_3_en']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Discipline 2 -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #1E2D7D;"><i class="bi bi-shield-shaded me-1"></i> Disiplin 02: TEMPEST SDIP-27 Level A Filtreleme</h6>
                                    
                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Başlık (TR)</label>
                                            <input type="text" name="disp_2_title_tr" class="form-control-custom" value="{{ $settings['disp_2_title_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Title (EN)</label>
                                            <input type="text" name="disp_2_title_en" class="form-control-custom" value="{{ $settings['disp_2_title_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label-custom">Açıklama (TR)</label>
                                            <textarea name="disp_2_desc_tr" rows="3" class="form-control-custom">{{ $settings['disp_2_desc_tr']->value ?? '' }}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Description (EN)</label>
                                            <textarea name="disp_2_desc_en" rows="3" class="form-control-custom">{{ $settings['disp_2_desc_en']->value ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">3 Alt Teknik Özellik Maddesi</h6>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Madde 1 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_2_spec_1_tr" class="form-control-custom" value="{{ $settings['disp_2_spec_1_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_2_spec_1_en" class="form-control-custom" value="{{ $settings['disp_2_spec_1_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Madde 2 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_2_spec_2_tr" class="form-control-custom" value="{{ $settings['disp_2_spec_2_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_2_spec_2_en" class="form-control-custom" value="{{ $settings['disp_2_spec_2_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label-custom">Madde 3 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_2_spec_3_tr" class="form-control-custom" value="{{ $settings['disp_2_spec_3_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_2_spec_3_en" class="form-control-custom" value="{{ $settings['disp_2_spec_3_en']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Discipline 3 -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #1E2D7D;"><i class="bi bi-box me-1"></i> Disiplin 03: Anahtar Teslim Yankısız Test Odaları</h6>
                                    
                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Başlık (TR)</label>
                                            <input type="text" name="disp_3_title_tr" class="form-control-custom" value="{{ $settings['disp_3_title_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Title (EN)</label>
                                            <input type="text" name="disp_3_title_en" class="form-control-custom" value="{{ $settings['disp_3_title_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label-custom">Açıklama (TR)</label>
                                            <textarea name="disp_3_desc_tr" rows="3" class="form-control-custom">{{ $settings['disp_3_desc_tr']->value ?? '' }}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Description (EN)</label>
                                            <textarea name="disp_3_desc_en" rows="3" class="form-control-custom">{{ $settings['disp_3_desc_en']->value ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">3 Alt Teknik Özellik Maddesi</h6>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Madde 1 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_3_spec_1_tr" class="form-control-custom" value="{{ $settings['disp_3_spec_1_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_3_spec_1_en" class="form-control-custom" value="{{ $settings['disp_3_spec_1_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Madde 2 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_3_spec_2_tr" class="form-control-custom" value="{{ $settings['disp_3_spec_2_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_3_spec_2_en" class="form-control-custom" value="{{ $settings['disp_3_spec_2_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label-custom">Madde 3 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_3_spec_3_tr" class="form-control-custom" value="{{ $settings['disp_3_spec_3_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_3_spec_3_en" class="form-control-custom" value="{{ $settings['disp_3_spec_3_en']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Discipline 4 -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #1E2D7D;"><i class="bi bi-tools me-1"></i> Disiplin 04: Hassas EMI/EMC Test Cihazları & LISN</h6>
                                    
                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Başlık (TR)</label>
                                            <input type="text" name="disp_4_title_tr" class="form-control-custom" value="{{ $settings['disp_4_title_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Title (EN)</label>
                                            <input type="text" name="disp_4_title_en" class="form-control-custom" value="{{ $settings['disp_4_title_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="form-label-custom">Açıklama (TR)</label>
                                            <textarea name="disp_4_desc_tr" rows="3" class="form-control-custom">{{ $settings['disp_4_desc_tr']->value ?? '' }}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Description (EN)</label>
                                            <textarea name="disp_4_desc_en" rows="3" class="form-control-custom">{{ $settings['disp_4_desc_en']->value ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">3 Alt Teknik Özellik Maddesi</h6>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Madde 1 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_4_spec_1_tr" class="form-control-custom" value="{{ $settings['disp_4_spec_1_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_4_spec_1_en" class="form-control-custom" value="{{ $settings['disp_4_spec_1_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Madde 2 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_4_spec_2_tr" class="form-control-custom" value="{{ $settings['disp_4_spec_2_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_4_spec_2_en" class="form-control-custom" value="{{ $settings['disp_4_spec_2_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label-custom">Madde 3 (TR / EN)</label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text bg-light text-primary fw-bold" style="font-size: 0.75rem;">TR</span>
                                            <input type="text" name="disp_4_spec_3_tr" class="form-control-custom" value="{{ $settings['disp_4_spec_3_tr']->value ?? '' }}">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light text-secondary fw-bold" style="font-size: 0.75rem;">EN</span>
                                            <input type="text" name="disp_4_spec_3_en" class="form-control-custom" value="{{ $settings['disp_4_spec_3_en']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════════════════════ --}}
                    {{-- TAB 5: KATALOG & RFQ BANNER                               --}}
                    {{-- ══════════════════════════════════════════════════════════ --}}
                    <div class="tab-pane fade" id="tab-catalog" role="tabpanel">
                        <div class="p-3 mb-4 rounded" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <h6 class="fw-bold mb-1" style="color: #1E2D7D;"><i class="bi bi-grid-3x3-gap-fill me-1"></i> Ürün Kataloğu & RFQ Banner Metinleri</h6>
                            <small style="color: #475569;">Ürün kataloğu ana başlıkları, arama kutusu ipuçları ve RFQ teklif bannerı alanları.</small>
                        </div>

                        <div class="row g-4 mb-4">
                            <!-- Katalog Başlıkları TR & EN -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-primary me-2">TR</span> Ürün Kataloğu Başlıkları (TR)</h6>
                                    
                                    <div class="mb-3">
                                        <label class="form-label-custom">Katalog Üst Rozeti</label>
                                        <input type="text" name="catalog_tag_tr" class="form-control-custom" value="{{ $settings['catalog_tag_tr']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Katalog Ana Başlığı</label>
                                        <input type="text" name="catalog_title_tr" class="form-control-custom" value="{{ $settings['catalog_title_tr']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Katalog Açıklama Metni</label>
                                        <textarea name="catalog_lead_tr" rows="3" class="form-control-custom">{{ $settings['catalog_lead_tr']->value ?? '' }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Arama Kutusu İpucu (Placeholder)</label>
                                        <input type="text" name="catalog_search_placeholder_tr" class="form-control-custom" value="{{ $settings['catalog_search_placeholder_tr']->value ?? '' }}">
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Çözüm Ortakları Bandı Rozeti (TR)</label>
                                        <input type="text" name="partner_marquee_tag_tr" class="form-control-custom" value="{{ $settings['partner_marquee_tag_tr']->value ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-secondary me-2">EN</span> Catalog Headings & Search (EN)</h6>
                                    
                                    <div class="mb-3">
                                        <label class="form-label-custom">Catalog Tag</label>
                                        <input type="text" name="catalog_tag_en" class="form-control-custom" value="{{ $settings['catalog_tag_en']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Catalog Main Title</label>
                                        <input type="text" name="catalog_title_en" class="form-control-custom" value="{{ $settings['catalog_title_en']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Catalog Narrative Lead</label>
                                        <textarea name="catalog_lead_en" rows="3" class="form-control-custom">{{ $settings['catalog_lead_en']->value ?? '' }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Search Box Placeholder</label>
                                        <input type="text" name="catalog_search_placeholder_en" class="form-control-custom" value="{{ $settings['catalog_search_placeholder_en']->value ?? '' }}">
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Partner Marquee Tag (EN)</label>
                                        <input type="text" name="partner_marquee_tag_en" class="form-control-custom" value="{{ $settings['partner_marquee_tag_en']->value ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- RFQ Banner & Product RFQ Box -->
                        <div class="row g-4">
                            <!-- Ana Sayfa Alt RFQ Banner -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #1E2D7D;"><i class="bi bi-megaphone-fill me-1"></i> Ana Sayfa Alt RFQ CTA Bannerı</h6>
                                    
                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Üst Rozet (TR)</label>
                                            <input type="text" name="banner_rfq_badge_tr" class="form-control-custom" value="{{ $settings['banner_rfq_badge_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Badge (EN)</label>
                                            <input type="text" name="banner_rfq_badge_en" class="form-control-custom" value="{{ $settings['banner_rfq_badge_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Ana Başlık (TR)</label>
                                            <input type="text" name="banner_rfq_title_tr" class="form-control-custom" value="{{ $settings['banner_rfq_title_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Title (EN)</label>
                                            <input type="text" name="banner_rfq_title_en" class="form-control-custom" value="{{ $settings['banner_rfq_title_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Açıklama (TR)</label>
                                            <textarea name="banner_rfq_desc_tr" rows="3" class="form-control-custom">{{ $settings['banner_rfq_desc_tr']->value ?? '' }}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Description (EN)</label>
                                            <textarea name="banner_rfq_desc_en" rows="3" class="form-control-custom">{{ $settings['banner_rfq_desc_en']->value ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Buton Metni (TR)</label>
                                            <input type="text" name="banner_rfq_btn_tr" class="form-control-custom" value="{{ $settings['banner_rfq_btn_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Button Text (EN)</label>
                                            <input type="text" name="banner_rfq_btn_en" class="form-control-custom" value="{{ $settings['banner_rfq_btn_en']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ürün Detay RFQ Kartı -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #1E2D7D;"><i class="bi bi-card-checklist me-1"></i> Ürün Detay Sayfası RFQ Teklif Kartı</h6>
                                    
                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Kart Başlığı (TR)</label>
                                            <input type="text" name="product_rfq_title_tr" class="form-control-custom" value="{{ $settings['product_rfq_title_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Card Title (EN)</label>
                                            <input type="text" name="product_rfq_title_en" class="form-control-custom" value="{{ $settings['product_rfq_title_en']->value ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Açıklama Metni (TR)</label>
                                            <textarea name="product_rfq_desc_tr" rows="3" class="form-control-custom">{{ $settings['product_rfq_desc_tr']->value ?? '' }}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Description (EN)</label>
                                            <textarea name="product_rfq_desc_en" rows="3" class="form-control-custom">{{ $settings['product_rfq_desc_en']->value ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Buton Metni (TR)</label>
                                            <input type="text" name="product_rfq_btn_tr" class="form-control-custom" value="{{ $settings['product_rfq_btn_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Button Text (EN)</label>
                                            <input type="text" name="product_rfq_btn_en" class="form-control-custom" value="{{ $settings['product_rfq_btn_en']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════════════════════ --}}
                    {{-- TAB 6: DENEY TALEP FORMU (FR 7.1.4)                       --}}
                    {{-- ══════════════════════════════════════════════════════════ --}}
                    <div class="tab-pane fade" id="tab-test-form" role="tabpanel">
                        <div class="p-3 mb-4 rounded" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <h6 class="fw-bold mb-1" style="color: #1E2D7D;"><i class="bi bi-file-earmark-medical me-1"></i> Deney Talep Formu (FR 7.1.4) Parametreleri</h6>
                            <small style="color: #475569;">Resmi Deney Talep Formunun kurumsal başlıkları, doküman/revizyon numaraları ve gönder buton metinleri. (Tarih her gün otomatik güncellenir).</small>
                        </div>

                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-primary me-2">TR</span> Form Başlık ve Metinleri</h6>
                                    
                                    <div class="mb-3">
                                        <label class="form-label-custom">Form Ana Başlığı (TR)</label>
                                        <input type="text" name="test_form_title_tr" class="form-control-custom" value="{{ $settings['test_form_title_tr']->value ?? 'Deney Talep Formu' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Form Gönder Butonu Metni (TR)</label>
                                        <input type="text" name="test_form_submit_btn_tr" class="form-control-custom" value="{{ $settings['test_form_submit_btn_tr']->value ?? 'Deney Talebini Gönder' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-secondary me-2">EN</span> Form Headings & Labels</h6>
                                    
                                    <div class="mb-3">
                                        <label class="form-label-custom">Form Main Title (EN)</label>
                                        <input type="text" name="test_form_title_en" class="form-control-custom" value="{{ $settings['test_form_title_en']->value ?? 'Test Request Form' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Submit Button Text (EN)</label>
                                        <input type="text" name="test_form_submit_btn_en" class="form-control-custom" value="{{ $settings['test_form_submit_btn_en']->value ?? 'Submit Test Request' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Kurumsal Doküman Bilgileri -->
                            <div class="col-12">
                                <div class="p-3 rounded" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #1E2D7D;"><i class="bi bi-file-earmark-check me-1"></i> Kurumsal Doküman Numaraları (Tüm Diller)</h6>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label-custom">Doküman Numarası</label>
                                            <input type="text" name="test_form_doc_no" class="form-control-custom font-monospace" value="{{ $settings['test_form_doc_no']->value ?? 'FR 7.1.4' }}">
                                            <div class="small text-muted mt-1">Örn: FR 7.1.4 (Resmi kalite yönetim standardı)</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label-custom">Revizyon Numarası</label>
                                            <input type="text" name="test_form_rev_no" class="form-control-custom font-monospace" value="{{ $settings['test_form_rev_no']->value ?? '00' }}">
                                            <div class="small text-muted mt-1">Örn: 00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════════════════════ --}}
                    {{-- TAB 7: FACILITY & QUALITY (TESİS)                         --}}
                    {{-- ══════════════════════════════════════════════════════════ --}}
                    <div class="tab-pane fade" id="tab-facility" role="tabpanel">
                        <div class="p-3 mb-4 rounded" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <h6 class="fw-bold mb-1" style="color: #1E2D7D;"><i class="bi bi-building-gear me-1"></i> Üretim & Entegrasyon Tesisi Bölümü</h6>
                            <small style="color: #475569;">Kartepe / Kocaeli üretim ve kalibrasyon tesisine dair başlıklar ve 3 temel altyapı vurgusu.</small>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-primary me-2">TR</span> Tesis Başlık ve Açıklamaları</h6>
                                    
                                    <div class="mb-3">
                                        <label class="form-label-custom">Bölüm Üst Etiketi (TR)</label>
                                        <input type="text" name="facility_tag_tr" class="form-control-custom" value="{{ $settings['facility_tag_tr']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Tesis Başlığı (TR)</label>
                                        <input type="text" name="facility_title_tr" class="form-control-custom" value="{{ $settings['facility_title_tr']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Tesis Açıklaması (TR)</label>
                                        <textarea name="facility_desc_tr" rows="3" class="form-control-custom">{{ $settings['facility_desc_tr']->value ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-secondary me-2">EN</span> Facility Content</h6>
                                    
                                    <div class="mb-3">
                                        <label class="form-label-custom">Section Tag (EN)</label>
                                        <input type="text" name="facility_tag_en" class="form-control-custom" value="{{ $settings['facility_tag_en']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Facility Title (EN)</label>
                                        <input type="text" name="facility_title_en" class="form-control-custom" value="{{ $settings['facility_title_en']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Facility Description (EN)</label>
                                        <textarea name="facility_desc_en" rows="3" class="form-control-custom">{{ $settings['facility_desc_en']->value ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3 Facility Points -->
                        <div class="p-3 rounded" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <h6 class="fw-bold mb-3" style="color: #0F172A;"><i class="bi bi-list-check me-2 text-primary"></i> 3 Tesis Vurgu Maddesi (Güvenlik, Kalibrasyon, Stratejik Konum)</h6>
                            <div class="row g-3">
                                <div class="col-lg-4">
                                    <div class="p-3 rounded bg-white" style="border: 1px solid #E2E8F0;">
                                        <small class="text-primary fw-bold d-block mb-2">Madde 1: Tesis Güvenlik</small>
                                        <input type="text" name="facility_p1_title_tr" class="form-control-custom mb-1" placeholder="Başlık (TR)" value="{{ $settings['facility_p1_title_tr']->value ?? '' }}">
                                        <input type="text" name="facility_p1_title_en" class="form-control-custom mb-2" placeholder="Title (EN)" value="{{ $settings['facility_p1_title_en']->value ?? '' }}">
                                        <textarea name="facility_p1_desc_tr" rows="2" class="form-control-custom mb-1" placeholder="Açıklama (TR)">{{ $settings['facility_p1_desc_tr']->value ?? '' }}</textarea>
                                        <textarea name="facility_p1_desc_en" rows="2" class="form-control-custom" placeholder="Description (EN)">{{ $settings['facility_p1_desc_en']->value ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="p-3 rounded bg-white" style="border: 1px solid #E2E8F0;">
                                        <small class="text-primary fw-bold d-block mb-2">Madde 2: Akredite Kalibrasyon</small>
                                        <input type="text" name="facility_p2_title_tr" class="form-control-custom mb-1" placeholder="Başlık (TR)" value="{{ $settings['facility_p2_title_tr']->value ?? '' }}">
                                        <input type="text" name="facility_p2_title_en" class="form-control-custom mb-2" placeholder="Title (EN)" value="{{ $settings['facility_p2_title_en']->value ?? '' }}">
                                        <textarea name="facility_p2_desc_tr" rows="2" class="form-control-custom mb-1" placeholder="Açıklama (TR)">{{ $settings['facility_p2_desc_tr']->value ?? '' }}</textarea>
                                        <textarea name="facility_p2_desc_en" rows="2" class="form-control-custom" placeholder="Description (EN)">{{ $settings['facility_p2_desc_en']->value ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="p-3 rounded bg-white" style="border: 1px solid #E2E8F0;">
                                        <small class="text-primary fw-bold d-block mb-2">Madde 3: Konum & Test Sahası</small>
                                        <input type="text" name="facility_p3_title_tr" class="form-control-custom mb-1" placeholder="Başlık (TR)" value="{{ $settings['facility_p3_title_tr']->value ?? '' }}">
                                        <input type="text" name="facility_p3_title_en" class="form-control-custom mb-2" placeholder="Title (EN)" value="{{ $settings['facility_p3_title_en']->value ?? '' }}">
                                        <textarea name="facility_p3_desc_tr" rows="2" class="form-control-custom mb-1" placeholder="Açıklama (TR)">{{ $settings['facility_p3_desc_tr']->value ?? '' }}</textarea>
                                        <textarea name="facility_p3_desc_en" rows="2" class="form-control-custom" placeholder="Description (EN)">{{ $settings['facility_p3_desc_en']->value ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════════════════════ --}}
                    {{-- TAB 8: CONTACT & LOCATION (İLETİŞİM)                      --}}
                    {{-- ══════════════════════════════════════════════════════════ --}}
                    <div class="tab-pane fade" id="tab-contact" role="tabpanel">
                        <div class="p-3 mb-4 rounded" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <h6 class="fw-bold mb-1" style="color: #1E2D7D;"><i class="bi bi-telephone-inbound me-1"></i> İletişim, Harita & Lokasyon Bilgileri</h6>
                            <small style="color: #475569;">Kurumsal adres, telefon, e-posta, çalışma saatleri ve Google Maps koordinat linki.</small>
                        </div>

                        <!-- İletişim Sayfası Üst Bannerı -->
                        <div class="p-3 rounded mb-4" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <h6 class="fw-bold mb-3" style="color: #1E2D7D;"><i class="bi bi-card-heading me-1"></i> İletişim Sayfası Üst Tanıtım Bannerı (FR 7.1.4 Yönlendirmesi)</h6>
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label-custom">Banner Başlığı (TR)</label>
                                        <input type="text" name="contact_banner_title_tr" class="form-control-custom" value="{{ $settings['contact_banner_title_tr']->value ?? '' }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Banner Açıklaması (TR)</label>
                                        <textarea name="contact_banner_desc_tr" rows="2" class="form-control-custom">{{ $settings['contact_banner_desc_tr']->value ?? '' }}</textarea>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">1. Buton (TR)</label>
                                            <input type="text" name="contact_banner_btn_tr" class="form-control-custom" value="{{ $settings['contact_banner_btn_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">2. Buton (TR)</label>
                                            <input type="text" name="contact_banner_modal_btn_tr" class="form-control-custom" value="{{ $settings['contact_banner_modal_btn_tr']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label-custom">Banner Title (EN)</label>
                                        <input type="text" name="contact_banner_title_en" class="form-control-custom" value="{{ $settings['contact_banner_title_en']->value ?? '' }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Banner Description (EN)</label>
                                        <textarea name="contact_banner_desc_en" rows="2" class="form-control-custom">{{ $settings['contact_banner_desc_en']->value ?? '' }}</textarea>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Button 1 (EN)</label>
                                            <input type="text" name="contact_banner_btn_en" class="form-control-custom" value="{{ $settings['contact_banner_btn_en']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Button 2 (EN)</label>
                                            <input type="text" name="contact_banner_modal_btn_en" class="form-control-custom" value="{{ $settings['contact_banner_modal_btn_en']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Temel İletişim Bilgileri -->
                        <div class="row g-4 mb-4">
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><i class="bi bi-headset me-2 text-primary"></i> Kurumsal İletişim Koordinatları</h6>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Resmi Telefon Numarası</label>
                                        <input type="text" name="contact_phone" class="form-control-custom" value="{{ $settings['contact_phone']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Resmi E-Posta Adresi</label>
                                        <input type="email" name="contact_email" class="form-control-custom" value="{{ $settings['contact_email']->value ?? '' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">CAGE Sicil Kodu</label>
                                        <input type="text" name="contact_nato_cage" class="form-control-custom font-monospace" value="{{ $settings['contact_nato_cage']->value ?? 'TR-EMC01' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Tesis GPS Koordinatları</label>
                                        <input type="text" name="contact_coordinates" class="form-control-custom font-monospace" value="{{ $settings['contact_coordinates']->value ?? '40.758° N, 30.015° E' }}">
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Çalışma Saatleri (TR)</label>
                                            <input type="text" name="contact_working_hours_tr" class="form-control-custom" value="{{ $settings['contact_working_hours_tr']->value ?? '' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Working Hours (EN)</label>
                                            <input type="text" name="contact_working_hours_en" class="form-control-custom" value="{{ $settings['contact_working_hours_en']->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><i class="bi bi-geo-alt me-2 text-primary"></i> Açık Adres & Harita</h6>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Açık Adres (TR)</label>
                                        <textarea name="contact_address_tr" rows="2" class="form-control-custom">{{ $settings['contact_address_tr']->value ?? '' }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Postal Address (EN)</label>
                                        <textarea name="contact_address_en" rows="2" class="form-control-custom">{{ $settings['contact_address_en']->value ?? '' }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Google Haritalar URL Bağlantısı</label>
                                        <input type="url" name="contact_map_url" class="form-control-custom font-monospace" value="{{ $settings['contact_map_url']->value ?? 'https://maps.google.com/?q=40.758,30.015' }}">
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-6">
                                            <label class="form-label-custom">Harita Buton Metni (TR)</label>
                                            <input type="text" name="contact_map_btn_text_tr" class="form-control-custom" value="{{ $settings['contact_map_btn_text_tr']->value ?? 'Google Haritalar\'da Aç' }}">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label-custom">Map Button (EN)</label>
                                            <input type="text" name="contact_map_btn_text_en" class="form-control-custom" value="{{ $settings['contact_map_btn_text_en']->value ?? 'View on Google Maps' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- İletişim Formu Başlıkları -->
                        <div class="p-3 rounded" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <h6 class="fw-bold mb-3" style="color: #1E2D7D;"><i class="bi bi-envelope-paper me-1"></i> Genel İletişim Formu Metinleri</h6>
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label-custom">Form Başlığı (TR)</label>
                                        <input type="text" name="contact_form_title_tr" class="form-control-custom" value="{{ $settings['contact_form_title_tr']->value ?? '' }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Form Alt Başlığı (TR)</label>
                                        <input type="text" name="contact_form_subtitle_tr" class="form-control-custom" value="{{ $settings['contact_form_subtitle_tr']->value ?? '' }}">
                                    </div>
                                    <div>
                                        <label class="form-label-custom">Gönder Butonu (TR)</label>
                                        <input type="text" name="contact_form_btn_tr" class="form-control-custom" value="{{ $settings['contact_form_btn_tr']->value ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label-custom">Form Title (EN)</label>
                                        <input type="text" name="contact_form_title_en" class="form-control-custom" value="{{ $settings['contact_form_title_en']->value ?? '' }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label-custom">Form Subtitle (EN)</label>
                                        <input type="text" name="contact_form_subtitle_en" class="form-control-custom" value="{{ $settings['contact_form_subtitle_en']->value ?? '' }}">
                                    </div>
                                    <div>
                                        <label class="form-label-custom">Submit Button (EN)</label>
                                        <input type="text" name="contact_form_btn_en" class="form-control-custom" value="{{ $settings['contact_form_btn_en']->value ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════════════════════════ --}}
                    {{-- TAB 9: FOOTER & SOSYAL MEDYA                              --}}
                    {{-- ══════════════════════════════════════════════════════════ --}}
                    <div class="tab-pane fade" id="tab-footer" role="tabpanel">
                        <div class="p-3 mb-4 rounded" style="background: #EFF6FF; border: 1px solid #BFDBFE;">
                            <h6 class="fw-bold mb-1" style="color: #1E2D7D;"><i class="bi bi-layout-text-window-reverse me-1"></i> Footer (Alt Bilgi) & Sosyal Medya Bağlantıları</h6>
                            <small style="color: #475569;">Sitenin en altındaki kurumsal marka tanıtımı, CAGE kodu kutusu, 3 sütun başlıkları, telif hakkı ve sosyal medya bağlantıları.</small>
                        </div>

                        <div class="row g-4 mb-4">
                            <!-- Türkçe Footer -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-primary me-2">TR</span> Türkçe Footer İçerikleri</h6>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Footer Marka Başlığı (TR)</label>
                                        <input type="text" name="footer_brand_title_tr" class="form-control-custom" value="{{ $settings['footer_brand_title_tr']->value ?? 'EMC SAVUNMA SİSTEMLERİ' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Footer Kurumsal Tanıtım / Misyon Metni (TR)</label>
                                        <textarea name="footer_desc_tr" rows="4" class="form-control-custom">{{ $settings['footer_desc_tr']->value ?? '' }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Savunma Sicil Kutusu Etiketi (TR)</label>
                                        <input type="text" name="footer_cage_label_tr" class="form-control-custom" value="{{ $settings['footer_cage_label_tr']->value ?? 'Savunma Sanayii Sicil & CAGE Kodu' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Savunma Sicil & CAGE Değeri (TR)</label>
                                        <input type="text" name="footer_cage_value_tr" class="form-control-custom font-monospace" value="{{ $settings['footer_cage_value_tr']->value ?? 'CAGE SİCİL: TR-EMC01 // AKREDİTE TEST LABORATUVARI' }}">
                                    </div>

                                    <hr class="my-3" style="border-color: #E2E8F0;">
                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">Sütun Başlıkları & Buton (TR)</h6>

                                    <div class="mb-2">
                                        <label class="form-label-custom">1. Sütun Başlığı (TR)</label>
                                        <input type="text" name="footer_col1_title_tr" class="form-control-custom" value="{{ $settings['footer_col1_title_tr']->value ?? 'Mühendislik Çözümleri' }}">
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">2. Sütun Başlığı (TR)</label>
                                        <input type="text" name="footer_col2_title_tr" class="form-control-custom" value="{{ $settings['footer_col2_title_tr']->value ?? 'Sertifikalar & Standartlar' }}">
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">3. Sütun Başlığı (TR)</label>
                                        <input type="text" name="footer_col3_title_tr" class="form-control-custom" value="{{ $settings['footer_col3_title_tr']->value ?? 'Üretim & Test Tesisi' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Footer Buton Metni (TR)</label>
                                        <input type="text" name="footer_rfq_btn_tr" class="form-control-custom" value="{{ $settings['footer_rfq_btn_tr']->value ?? 'Deney Talep Formu (FR 7.1.4)' }}">
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Telif Hakkı (Copyright) Metni (TR)</label>
                                        <input type="text" name="footer_copyright_tr" class="form-control-custom" value="{{ $settings['footer_copyright_tr']->value ?? 'EMC Savunma ve Elektronik Sistemleri San. Tic. Ltd. Şti. Tüm hakları saklıdır.' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- English Footer -->
                            <div class="col-lg-6">
                                <div class="p-3 rounded h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><span class="badge bg-secondary me-2">EN</span> English Footer Content</h6>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Footer Brand Title (EN)</label>
                                        <input type="text" name="footer_brand_title_en" class="form-control-custom" value="{{ $settings['footer_brand_title_en']->value ?? 'EMC DEFENSE SYSTEMS' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Footer Description (EN)</label>
                                        <textarea name="footer_desc_en" rows="4" class="form-control-custom">{{ $settings['footer_desc_en']->value ?? '' }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Defense Registry Box Label (EN)</label>
                                        <input type="text" name="footer_cage_label_en" class="form-control-custom" value="{{ $settings['footer_cage_label_en']->value ?? 'Registry & CAGE Code' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Defense Registry & CAGE Value (EN)</label>
                                        <input type="text" name="footer_cage_value_en" class="form-control-custom font-monospace" value="{{ $settings['footer_cage_value_en']->value ?? 'CAGE CODE: TR-EMC01 // ACCREDITED TESTING LABORATORY' }}">
                                    </div>

                                    <hr class="my-3" style="border-color: #E2E8F0;">
                                    <h6 class="fw-bold small text-muted text-uppercase mb-2">Column Titles & Actions (EN)</h6>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Column 1 Title (EN)</label>
                                        <input type="text" name="footer_col1_title_en" class="form-control-custom" value="{{ $settings['footer_col1_title_en']->value ?? 'Engineering Solutions' }}">
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Column 2 Title (EN)</label>
                                        <input type="text" name="footer_col2_title_en" class="form-control-custom" value="{{ $settings['footer_col2_title_en']->value ?? 'Certificates & Accreditations' }}">
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Column 3 Title (EN)</label>
                                        <input type="text" name="footer_col3_title_en" class="form-control-custom" value="{{ $settings['footer_col3_title_en']->value ?? 'Manufacturing & Lab Facility' }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label-custom">Footer Button Text (EN)</label>
                                        <input type="text" name="footer_rfq_btn_en" class="form-control-custom" value="{{ $settings['footer_rfq_btn_en']->value ?? 'Test Request Form (FR 7.1.4)' }}">
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label-custom">Copyright Notice (EN)</label>
                                        <input type="text" name="footer_copyright_en" class="form-control-custom" value="{{ $settings['footer_copyright_en']->value ?? 'EMC Defense & Electronic Systems Ltd. All rights reserved.' }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media Links (Global) -->
                            <div class="col-12">
                                <div class="p-3 rounded" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <h6 class="fw-bold mb-3" style="color: #0F172A;"><i class="bi bi-share me-2 text-primary"></i> Sosyal Medya Bağlantıları (Tüm Diller)</h6>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label-custom">LinkedIn Sayfa URL</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-linkedin text-primary"></i></span>
                                                <input type="url" name="footer_linkedin_url" class="form-control-custom border-start-0" value="{{ $settings['footer_linkedin_url']->value ?? 'https://linkedin.com/company/emcturkey' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label-custom">YouTube Kanal URL</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-youtube text-danger"></i></span>
                                                <input type="url" name="footer_youtube_url" class="form-control-custom border-start-0" value="{{ $settings['footer_youtube_url']->value ?? 'https://youtube.com/@emctestvekontrolhizmetleri7839' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- STICKY SAVE BAR AT BOTTOM --}}
                <div class="d-flex justify-content-between align-items-center gap-3 mt-4 pt-3" style="border-top: 1px solid #E2E8F0; position: sticky; bottom: 0; background: rgba(255,255,255,0.95); backdrop-filter: blur(8px); padding: 1rem 0; z-index: 100;">
                    <div class="text-muted small">
                        <i class="bi bi-info-circle me-1"></i> Değişiklik yaptığınızda önbellek (cache) otomatik olarak sıfırlanır ve tüm sitede anında yayına girer.
                    </div>
                    <button type="submit" class="btn-emc py-2 px-4 shadow-sm" style="font-size: 0.95rem;">
                        <i class="bi bi-check2-circle me-2"></i> Tüm Değişiklikleri Kaydet
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabInput = document.getElementById('activeTabInput');
        const tabs = document.querySelectorAll('#settingsTabs button[data-bs-toggle="pill"]');

        // Restore tab from hash
        let hash = window.location.hash;
        if (hash) {
            let targetTabBtn = document.querySelector(`button[data-bs-target="${hash}"]`);
            if (targetTabBtn) {
                let tabInstance = new bootstrap.Tab(targetTabBtn);
                tabInstance.show();
                if (tabInput) tabInput.value = hash.replace('#', '');
            }
        }

        // Listen for tab switch
        tabs.forEach(tab => {
            tab.addEventListener('shown.bs.tab', function(e) {
                let targetId = e.target.getAttribute('data-bs-target');
                if (targetId) {
                    let cleanId = targetId.replace('#', '');
                    if (tabInput) tabInput.value = cleanId;
                    history.replaceState(null, null, targetId);
                }
            });
        });
    });
</script>
@endpush
@endsection
