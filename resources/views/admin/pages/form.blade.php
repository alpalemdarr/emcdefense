@extends('admin.layout')

@php
    $isEdit = !empty($page) && $page->exists;
    $title = $isEdit ? 'Sayfa Düzenle: ' . $page->title_tr : '0\'dan Yeni Sayfa Oluştur';
@endphp

@section('title', $title . ' – Admin')
@section('page_title', $title)

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-11 col-xxl-10">
        <div class="card-custom">
            <div class="card-header-custom">
                <div>
                    <h5 class="fw-bold mb-1" style="color: #0F172A;">
                        <i class="bi bi-{{ $isEdit ? 'pencil-square' : 'plus-circle' }} text-primary me-2"></i>
                        {{ $title }}
                    </h5>
                    <p class="text-muted small mb-0 mt-1">
                        {{ $isEdit 
                            ? 'Sayfanın başlığını, tanıtım metnini, ana içeriğini ve SEO meta etiketlerini düzenleyin.' 
                            : 'Web sitesi için yeni bir dinamik sayfa oluşturun.' 
                        }}
                    </p>
                </div>
                <div class="d-flex gap-2">
                    @if($isEdit)
                        @php
                            $pageUrl = $page->is_system
                                ? ($page->slug === 'certificates' ? route('certificates') : ($page->slug === 'references' ? route('references') : route('contact')))
                                : url('/' . $page->slug);
                        @endphp
                        <a href="{{ $pageUrl }}" target="_blank" class="btn-outline-emc py-1 px-3" style="font-size: 0.82rem;">
                            <i class="bi bi-box-arrow-up-right me-1"></i>
                            <span>Canlı Sayfayı Gör</span>
                        </a>
                    @endif
                    <a href="{{ route('admin.pages.index') }}" class="btn-outline-emc py-1 px-3" style="font-size: 0.82rem;">
                        <i class="bi bi-arrow-left me-1"></i>
                        <span>Sayfalar Listesine Dön</span>
                    </a>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: #FEE2E2; border: 1px solid #FCA5A5; color: #991B1B;">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ $isEdit ? route('admin.pages.update', $page->id) : route('admin.pages.store') }}" method="POST" id="pageForm">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="row g-4">
                    {{-- SECTION 1: URL & IDENTIFIER --}}
                    <div class="col-12">
                        <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label-custom" for="slug">Sayfa URL Adresi (Slug)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0 text-muted font-monospace" style="font-size: 0.85rem;">{{ url('/') }}/</span>
                                        <input type="text" name="slug" id="slug" class="form-control-custom border-start-0 font-monospace" placeholder="sayfa-url-adresi" value="{{ old('slug', $page->slug ?? '') }}">
                                    </div>
                                    <div class="small text-muted mt-1">Örn: <code>hakkimizda</code>, <code>ar-ge-merkezi</code>, <code>kvkk</code> (Boş bırakılırsa başlıktan üretilir)</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom" for="sort_order">Menü Sırası</label>
                                    <input type="number" name="sort_order" id="sort_order" class="form-control-custom" value="{{ old('sort_order', $page->sort_order ?? 0) }}" min="0">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label-custom">Sayfa Türü</label>
                                    <div class="pt-2">
                                        @if($page->is_system)
                                            <span class="badge bg-primary text-white py-2 px-3">Sistem Sayfası (Özel Rotalı)</span>
                                        @else
                                            <span class="badge bg-success text-white py-2 px-3">Özel Oluşturulmuş Sayfa</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 2: BILINGUAL CONTENT (TR & EN TABS) --}}
                    <div class="col-12">
                        <ul class="nav nav-pills gap-2 mb-3" id="langTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="tr-content-tab" data-bs-toggle="pill" data-bs-target="#tab-tr-content" type="button" role="tab">
                                    <i class="bi bi-flag-fill me-1 text-danger"></i> Türkçe İçerik (TR)
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="en-content-tab" data-bs-toggle="pill" data-bs-target="#tab-en-content" type="button" role="tab">
                                    <i class="bi bi-globe me-1 text-primary"></i> English Content (EN)
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="langTabContent">
                            {{-- TURKISH TAB --}}
                            <div class="tab-pane fade show active" id="tab-tr-content" role="tabpanel">
                                <div class="p-4 rounded-3" style="background: #FFFFFF; border: 1.5px solid #E2E8F0;">
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <label class="form-label-custom" for="title_tr">Sayfa Başlığı (TR) <span class="text-danger">*</span></label>
                                            <input type="text" name="title_tr" id="title_tr" class="form-control-custom fw-bold" placeholder="Örn: Kalite ve Güvenlik Sertifikalarımız" value="{{ old('title_tr', $page->title_tr ?? '') }}">
                                            <div class="small text-muted mt-1">Sayfanın en üstünde <code>H1</code> ana başlığı olarak gösterilir</div>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label-custom" for="badge_tr">Üst Rozet Metni (TR)</label>
                                            <input type="text" name="badge_tr" id="badge_tr" class="form-control-custom font-monospace" placeholder="Örn: RESMİ AKREDİTASYON & BELGELENDİRME" value="{{ old('badge_tr', $page->badge_tr ?? '') }}">
                                            <div class="small text-muted mt-1">Başlığın hemen üstündeki küçük etiket rozeti</div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label-custom" for="lead_tr">Sayfa Giriş & Vurgu Paragrafı (TR)</label>
                                            <textarea name="lead_tr" id="lead_tr" rows="3" class="form-control-custom" placeholder="Sayfanın başlığının altında geniş puntolu olarak yer alan tanıtım ve özet metni...">{{ old('lead_tr', $page->lead_tr ?? '') }}</textarea>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label-custom" for="content_tr">Sayfa Ana Gövde İçeriği (TR)</label>
                                            <textarea name="content_tr" id="content_tr" rows="8" class="form-control-custom font-monospace" placeholder="Sayfa gövdesinde gösterilecek detaylı metin, HTML paragraflar, alt başlıklar (h3, p, ul vb.)...">{{ old('content_tr', $page->content_tr ?? '') }}</textarea>
                                            <div class="small text-muted mt-1">
                                                <i class="bi bi-code-slash me-1"></i>HTML etiketleri (<code>&lt;p&gt;</code>, <code>&lt;h3&gt;</code>, <code>&lt;ul&gt;</code>, <code>&lt;li&gt;</code>) desteklenir.
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label class="form-label-custom" for="meta_title_tr">SEO Tarayıcı Başlığı (Title - TR)</label>
                                            <input type="text" name="meta_title_tr" id="meta_title_tr" class="form-control-custom" placeholder="Örn: Kalite & Akreditasyonlarımız – EMC Savunma" value="{{ old('meta_title_tr', $page->meta_title_tr ?? '') }}">
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label class="form-label-custom" for="meta_description_tr">SEO Açıklaması (Meta Description - TR)</label>
                                            <input type="text" name="meta_description_tr" id="meta_description_tr" class="form-control-custom" placeholder="Arama motorlarında çıkacak 1-2 cümlelik özet..." value="{{ old('meta_description_tr', $page->meta_description_tr ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ENGLISH TAB --}}
                            <div class="tab-pane fade" id="tab-en-content" role="tabpanel">
                                <div class="p-4 rounded-3" style="background: #FFFFFF; border: 1.5px solid #E2E8F0;">
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <label class="form-label-custom" for="title_en">Sayfa Başlığı (EN / English) <span class="text-muted fw-normal" style="font-size: 0.8rem;">(Opsiyonel - Boş bırakılırsa Türkçe başlık kopyalanır)</span></label>
                                            <input type="text" name="title_en" id="title_en" class="form-control-custom fw-bold" placeholder="e.g. Quality & Security Accreditations" value="{{ old('title_en', $page->title_en ?? '') }}">
                                            <div class="small text-muted mt-1">Rendered as primary <code>H1</code> headline in English</div>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label-custom" for="badge_en">Top Badge Text (EN)</label>
                                            <input type="text" name="badge_en" id="badge_en" class="form-control-custom font-monospace" placeholder="e.g. OFFICIAL ACCREDITATION & CERTIFICATION" value="{{ old('badge_en', $page->badge_en ?? '') }}">
                                            <div class="small text-muted mt-1">Pill badge shown right above the main title</div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label-custom" for="lead_en">Page Lead & Narrative Summary (EN)</label>
                                            <textarea name="lead_en" id="lead_en" rows="3" class="form-control-custom" placeholder="High-level intro paragraph rendered under the page headline...">{{ old('lead_en', $page->lead_en ?? '') }}</textarea>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label-custom" for="content_en">Page Body Content (EN)</label>
                                            <textarea name="content_en" id="content_en" rows="8" class="form-control-custom font-monospace" placeholder="Full descriptive body text, HTML formatting, subheadings, lists...">{{ old('content_en', $page->content_en ?? '') }}</textarea>
                                            <div class="small text-muted mt-1">
                                                <i class="bi bi-code-slash me-1"></i>Supports clean HTML tags (<code>&lt;p&gt;</code>, <code>&lt;h3&gt;</code>, <code>&lt;ul&gt;</code>).
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label class="form-label-custom" for="meta_title_en">SEO Browser Title (EN)</label>
                                            <input type="text" name="meta_title_en" id="meta_title_en" class="form-control-custom" placeholder="e.g. Quality & Certifications – EMC Defense" value="{{ old('meta_title_en', $page->meta_title_en ?? '') }}">
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label class="form-label-custom" for="meta_description_en">SEO Meta Description (EN)</label>
                                            <input type="text" name="meta_description_en" id="meta_description_en" class="form-control-custom" placeholder="Summary for Google and search engines in English..." value="{{ old('meta_description_en', $page->meta_description_en ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 3: PUBLISHING & MENU INTEGRATION --}}
                    <div class="col-12">
                        <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <h6 class="fw-bold mb-3 text-dark"><i class="bi bi-toggle-on me-1 text-primary"></i> Yayın ve Menü Entegrasyonu</h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active" value="1" {{ old('is_active', $page->is_active ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-dark ms-2" for="is_active">
                                            Sayfa Yayında (Aktif)
                                        </label>
                                        <div class="text-muted small ms-2 mt-1">Kapatıldığında sayfa ziyaretçilere kapatılır.</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" role="switch" name="show_in_navbar" id="show_in_navbar" value="1" {{ old('show_in_navbar', $page->show_in_navbar ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-dark ms-2" for="show_in_navbar">
                                            Üst Menüde (Navbar) Göster
                                        </label>
                                        <div class="text-muted small ms-2 mt-1">Otomatik olarak ana gezinti çubuğuna link ekler.</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" role="switch" name="show_in_footer" id="show_in_footer" value="1" {{ old('show_in_footer', $page->show_in_footer ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-dark ms-2" for="show_in_footer">
                                            Alt Bilgide (Footer) Göster
                                        </label>
                                        <div class="text-muted small ms-2 mt-1">Sitenin en altındaki hızlı linklere dahil edilir.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SUBMIT BAR --}}
                    <div class="col-12 pt-3 border-top d-flex gap-2 justify-content-between align-items-center flex-wrap" style="border-color: #E2E8F0 !important;">
                        <div>
                            @if($isEdit)
                                <button type="button" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1" onclick="if(confirm('\'{{ $page->title_tr }}\' sayfasını kalıcı olarak silmek istediğinize emin misiniz?')) { document.getElementById('deletePageForm').submit(); }">
                                    <i class="bi bi-trash"></i>
                                    <span>Bu Sayfayı Sil</span>
                                </button>
                            @endif
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.pages.index') }}" class="btn-outline-emc">İptal</a>
                            <button type="submit" id="btnSavePage" class="btn-emc">
                                <i class="bi bi-check-lg"></i>
                                <span>{{ $isEdit ? 'Sayfayı Kaydet & Güncelle' : 'Sayfayı Oluştur' }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            @if($isEdit)
                <form id="deletePageForm" action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
