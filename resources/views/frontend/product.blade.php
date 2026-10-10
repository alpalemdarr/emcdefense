@php
    $isEn = app()->getLocale() === 'en';
@endphp
@extends('frontend.layout')
@section('title', $product->name . ($isEn ? ' – EMC Defense Technologies' : ' – EMC Savunma Sistemleri'))

@push('styles')
<style>
    .product-detail-page {
        padding: 2.5rem 0 5rem;
        background: var(--bg-body);
        min-height: 100vh;
    }

    /* ── BREADCRUMB ── */
    .breadcrumb-nav {
        margin-bottom: 2rem;
    }
    .breadcrumb-list {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        color: var(--text-muted);
        list-style: none;
        flex-wrap: wrap;
    }
    .breadcrumb-list a {
        color: var(--navy-900);
        font-weight: 600;
        transition: color var(--tr);
    }
    .breadcrumb-list a:hover {
        color: var(--blue-600);
    }
    .breadcrumb-sep {
        color: var(--border-med);
        font-size: 0.75rem;
    }
    .breadcrumb-current {
        color: var(--text-muted);
        font-weight: 500;
    }

    /* ── PRODUCT MAIN LAYOUT ── */
    .product-detail-grid {
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 2.5rem;
        align-items: start;
    }
    @media (max-width: 992px) {
        .product-detail-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .product-detail-page { padding: 1.5rem 0 3.5rem; }
        .product-main-card { padding: 1.5rem 1rem; }
        .product-sidebar-card { padding: 1.5rem 1rem; }
        .product-media-content { padding: 1rem 0.5rem; }
    }
    .product-specs-table-wrap {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-bottom: 2.5rem;
    }

    /* ── MAIN CONTENT CARD ── */
    .product-main-card {
        background: #FFFFFF;
        border: 1px solid var(--border-light);
        border-radius: var(--r-md);
        box-shadow: var(--shadow-sm);
        padding: 2.5rem;
    }

    .product-meta-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 1rem;
    }
    .product-cat-tag {
        font-family: var(--font-head);
        font-size: 0.8rem;
        font-weight: 800;
        color: var(--blue-600);
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }
    .product-std-pill {
        font-family: var(--font-mono);
        font-size: 0.75rem;
        font-weight: 700;
        padding: 3px 10px;
        background: #EFF6FF;
        color: var(--blue-600);
        border: 1px solid #BFDBFE;
        border-radius: 4px;
    }

    .product-detail-title {
        font-family: var(--font-head);
        font-size: clamp(1.8rem, 2.8vw, 2.5rem);
        font-weight: 800;
        color: var(--navy-900);
        line-height: 1.2;
        margin-bottom: 0.5rem;
        letter-spacing: -0.02em;
    }
    .product-detail-model {
        font-family: var(--font-mono);
        font-size: 0.95rem;
        color: var(--text-muted);
        font-weight: 600;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Media Box */
    .product-detail-media {
        background: #F8FAFC;
        border: 1px solid var(--border-light);
        border-radius: var(--r-md);
        overflow: hidden;
        margin-bottom: 2.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    .product-media-label {
        width: 100%;
        background: var(--navy-900);
        color: #FFFFFF;
        padding: 0.6rem 1.25rem;
        font-family: var(--font-head);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .product-media-content {
        padding: 2rem;
        width: 100%;
        max-height: 480px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-media-content video {
        max-height: 420px;
        width: 100%;
        object-fit: contain;
    }
    .product-media-content img {
        max-height: 400px;
        max-width: 100%;
        object-fit: contain;
    }

    .product-desc-box {
        font-size: 0.98rem;
        line-height: 1.8;
        color: var(--text-body);
        margin-bottom: 2.5rem;
    }

    /* Specs Table */
    .product-specs-section-title {
        font-family: var(--font-head);
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--navy-900);
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid var(--blue-600);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .product-detail-specs-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 2.5rem;
        border: 1px solid var(--border-light);
        border-radius: var(--r-sm);
        overflow: hidden;
    }
    .product-detail-specs-table tr {
        border-bottom: 1px solid var(--border-light);
    }
    .product-detail-specs-table tr:nth-child(even) {
        background: var(--slate-50);
    }
    .product-detail-specs-table tr:last-child {
        border-bottom: none;
    }
    .product-detail-specs-table td {
        padding: 0.85rem 1.25rem;
        font-size: 0.9rem;
    }
    .product-detail-specs-table td.spec-name {
        font-family: var(--font-head);
        font-weight: 700;
        color: var(--navy-900);
        width: 38%;
        border-right: 1px solid var(--border-light);
    }
    .product-detail-specs-table td.spec-val {
        font-family: var(--font-mono);
        color: var(--text-body);
        font-weight: 500;
    }

    /* ── COMPLIANCE BADGES BOX ── */
    .product-compliance-box {
        background: var(--slate-50);
        border: 1px solid var(--border-light);
        border-radius: var(--r-sm);
        padding: 1.25rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin-top: 1.5rem;
    }
    .compliance-badge-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--navy-900);
    }
    @media (max-width: 600px) {
        .product-compliance-box {
            padding: 1rem 0.85rem;
            gap: 0.85rem;
            flex-direction: column;
            align-items: flex-start;
        }
    }

    /* ── STICKY SIDEBAR ── */
    .product-sidebar-card {
        background: #FFFFFF;
        border: 1px solid var(--border-light);
        border-radius: var(--r-md);
        box-shadow: var(--shadow-sm);
        padding: 2rem;
        position: sticky;
        top: 100px;
    }
    .sidebar-procure-title {
        font-family: var(--font-head);
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--navy-900);
        margin-bottom: 0.5rem;
    }
    .sidebar-procure-desc {
        font-size: 0.85rem;
        color: var(--text-muted);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }
    .sidebar-actions {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 2rem;
    }
    .sidebar-actions .btn-primary {
        justify-content: center;
        padding: 0.85rem;
    }
    .sidebar-actions .btn-outline {
        justify-content: center;
        padding: 0.85rem;
    }

    .sidebar-cage-reminder {
        background: var(--slate-50);
        border: 1px solid var(--border-light);
        border-radius: var(--r-sm);
        padding: 1rem;
        font-size: 0.8rem;
        color: var(--text-muted);
        line-height: 1.5;
        margin-bottom: 1.75rem;
    }
    .sidebar-cage-reminder strong {
        color: var(--navy-900);
        display: block;
        margin-bottom: 0.25rem;
    }

    .sidebar-other-title {
        font-family: var(--font-head);
        font-size: 0.95rem;
        font-weight: 800;
        color: var(--navy-900);
        margin-bottom: 1rem;
        padding-top: 1.25rem;
        border-top: 1px solid var(--border-light);
    }
    .sidebar-other-item {
        display: flex;
        flex-direction: column;
        padding: 0.75rem 0;
        border-bottom: 1px solid var(--border-light);
        transition: all var(--tr);
    }
    .sidebar-other-item:last-child {
        border-bottom: none;
    }
    .sidebar-other-item:hover .so-name {
        color: var(--blue-600);
    }
    .so-cat {
        font-size: 0.7rem;
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
    }
    .so-name {
        font-size: 0.88rem;
        font-weight: 700;
        color: var(--navy-900);
        transition: color var(--tr);
    }

    /* ── SENIOR CRAFTSMANSHIP: PRODUCT DETAIL DARK THEME OVERRIDES ── */
    [data-theme="dark"] .product-detail-page {
        background: var(--bg-body, #0A0F1D) !important;
    }
    [data-theme="dark"] .breadcrumb-list a {
        color: #93C5FD !important;
    }
    [data-theme="dark"] .breadcrumb-list a:hover {
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .breadcrumb-current {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .product-main-card {
        background: #0F172A !important;
        border-color: #1E293B !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
    }
    [data-theme="dark"] .product-cat-tag {
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .product-std-pill {
        background: rgba(59, 130, 246, 0.15) !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
        color: #60A5FA !important;
    }
    [data-theme="dark"] .product-detail-title {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .product-detail-model {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .product-detail-media {
        background: #11192E !important;
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .product-media-label {
        background: #080E1C !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .product-desc-box {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .product-specs-section-title {
        color: #FFFFFF !important;
        border-bottom-color: #3B82F6 !important;
    }
    [data-theme="dark"] .product-detail-specs-table {
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .product-detail-specs-table tr {
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .product-detail-specs-table tr:nth-child(even) {
        background: #11192E !important;
    }
    [data-theme="dark"] .product-detail-specs-table td.spec-name {
        color: #F8FAFC !important;
        border-right-color: #1E293B !important;
    }
    [data-theme="dark"] .product-detail-specs-table td.spec-val {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .product-sidebar-card {
        background: #0F172A !important;
        border-color: #1E293B !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
    }
    [data-theme="dark"] .sidebar-procure-title {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .sidebar-procure-desc {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .sidebar-cage-reminder {
        background: #11192E !important;
        border-color: #1E293B !important;
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .sidebar-cage-reminder strong {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .sidebar-other-title {
        color: #FFFFFF !important;
        border-top-color: #1E293B !important;
    }
    [data-theme="dark"] .sidebar-other-item {
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .so-cat {
        color: #60A5FA !important;
    }
    [data-theme="dark"] .so-name {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .sidebar-other-item:hover .so-name {
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .btn-outline {
        background: #1E293B !important;
        border-color: #334155 !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .btn-outline:hover {
        background: #334155 !important;
        border-color: #3B82F6 !important;
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .product-compliance-box {
        background: #11192E !important;
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .compliance-badge-item {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .compliance-badge-item i.bi-building-check {
        color: #38BDF8 !important;
    }
</style>
@endpush

@section('content')
<div class="product-detail-page">
    <div class="container">
        {{-- Breadcrumb --}}
        <nav class="breadcrumb-nav">
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i> {{ $isEn ? 'Home' : 'Ana Sayfa' }}</a></li>
                <li class="breadcrumb-sep"><i class="bi bi-chevron-right"></i></li>
                <li><a href="{{ route('home') }}#catalog">{{ $isEn ? 'Product Catalog' : 'Ürün Kataloğu' }}</a></li>
                @if($product->category)
                    <li class="breadcrumb-sep"><i class="bi bi-chevron-right"></i></li>
                    <li><a href="{{ route('home') }}#cat-{{ $product->category->id }}">{{ $product->category->name }}</a></li>
                @endif
                <li class="breadcrumb-sep"><i class="bi bi-chevron-right"></i></li>
                <li class="breadcrumb-current">{{ $product->name }}</li>
            </ul>
        </nav>

        {{-- Product Detail Grid --}}
        <div class="product-detail-grid">
            {{-- Main Content --}}
            <div class="product-main-card cad-bracket-box spotlight-card">
                <div class="product-meta-header">
                    <span class="product-cat-tag">
                        <i class="bi bi-folder2-open"></i> {{ $product->category ? $product->category->name : ($isEn ? 'Defense Hardware' : 'Savunma Donanımı') }}
                    </span>
                    <span class="product-std-pill">
                        <i class="bi bi-shield-check"></i> {{ $product->standard ?: 'MIL-STD-461G / DEFENSE QUALIFIED' }}
                    </span>
                </div>

                <h1 class="product-detail-title">{{ $product->name }}</h1>
                <div class="product-detail-model">
                    <i class="bi bi-tag-fill" style="color:var(--blue-600);"></i> {{ $isEn ? 'Model Code:' : 'Model Kodu:' }} {{ $product->model_number ?: ($product->model_code ?: 'EMC-' . strtoupper(substr(md5($product->id . $product->name), 0, 8))) }}
                </div>

                {{-- Media Showcase (3D Video or Image) --}}
                <div class="product-detail-media hardware-viewfinder">
                    <div class="product-media-label">
                        @if($product->video_path)
                            <i class="bi bi-badge-3d-fill" style="color:#60A5FA;"></i> {{ $isEn ? '3D Rotating Simulation & Operation' : '3D Döner Model & Operasyonel Simülasyon' }}
                        @else
                            <i class="bi bi-camera-fill" style="color:#60A5FA;"></i> {{ $isEn ? 'High-Resolution Hardware Photography' : 'Yüksek Çözünürlüklü Enstrüman Görüntüsü' }}
                        @endif
                    </div>
                    <div class="product-media-content">
                        @if($product->video_path)
                            <video src="{{ asset('storage/' . $product->video_path) }}" controls autoplay loop muted playsinline></video>
                        @elseif($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                        @else
                            <div style="text-align:center;padding:3rem 0;color:var(--text-muted);">
                                <i class="bi bi-cpu" style="font-size:4rem;color:var(--blue-600);"></i>
                                <div style="margin-top:0.75rem;font-weight:600;">{{ $isEn ? 'Technical Schematics & Datasheets Available' : 'Teknik Çizim ve Şartname Mevcuttur' }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Description --}}
                <div class="product-desc-box">
                    <p>
                        @if($product->description)
                            {!! nl2br(e($product->description)) !!}
                        @else
                            {{ $isEn
                                ? $product->name . ' is precision-engineered to meet stringent electromagnetic compatibility (EMC), high-altitude nuclear pulse (HEMP) hardening, and TEMPEST data security requirements for military land, naval, airborne platforms, and strategic command centers.'
                                : $product->name . ' askeri kara, deniz, hava platformları ve stratejik sabit tesislerde elektromanyetik uyumluluk (EMC), nükleer darbe (HEMP) sertleştirme ve TEMPEST veri güvenliği gereksinimlerini eksiksiz karşılamak üzere üretilmektedir.'
                            }}
                        @endif
                    </p>
                </div>

                {{-- Technical Specifications Table --}}
                <div class="product-specs-section-title">
                    <i class="bi bi-sliders"></i> {{ $isEn ? 'Technical Specifications & Parameters' : 'Teknik Özellikler ve Parametreler' }}
                </div>

                <div class="product-specs-table-wrap">
                    <table class="product-detail-specs-table" style="margin-bottom:0;">
                        @php
                            $specs = $product->specifications ?: $product->specs_array;
                        @endphp
                        @if($specs && count($specs) > 0)
                            @foreach($specs as $key => $val)
                                <tr>
                                    <td class="spec-name">{{ $key }}</td>
                                    <td class="spec-val">{{ is_array($val) ? implode(', ', $val) : $val }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="spec-name">{{ $isEn ? 'Compliance Standard' : 'Uyumluluk Standardı' }}</td>
                                <td class="spec-val">MIL-STD-461G (RS105 / CS116), MIL-STD-188-125-1</td>
                            </tr>
                            <tr>
                                <td class="spec-name">{{ $isEn ? 'Shielding Effectiveness' : 'Kalkanlama Etkinliği' }}</td>
                                <td class="spec-val">&gt; 100 dB (100 kHz - 10 GHz)</td>
                            </tr>
                            <tr>
                                <td class="spec-name">{{ $isEn ? 'Operating Temperature' : 'Çalışma Sıcaklığı' }}</td>
                                <td class="spec-val">-40 °C to +85 °C (Military Grade)</td>
                            </tr>
                            <tr>
                                <td class="spec-name">{{ $isEn ? 'Metrological Traceability' : 'İzlenebilirlik' }}</td>
                                <td class="spec-val">ISO 17025 Accredited Calibration Certificate</td>
                            </tr>
                        @endif
                    </table>
                </div>

                {{-- Compliance Badges --}}
                <div class="product-compliance-box">
                    <div class="compliance-badge-item">
                        <i class="bi bi-shield-check" style="color:var(--emerald-600);font-size:1.2rem;"></i>
                        <span>{{ $isEn ? 'MIL-STD-461G Qualified' : 'MIL-STD-461G Onaylı' }}</span>
                    </div>
                    <div class="compliance-badge-item">
                        <i class="bi bi-patch-check-fill" style="color:var(--blue-600);font-size:1.2rem;"></i>
                        <span>ISO 9001:2015 {{ $isEn ? 'Certified' : 'Belgeli' }}</span>
                    </div>
                    <div class="compliance-badge-item">
                        <i class="bi bi-building-check" style="color:var(--brand-primary);font-size:1.2rem;"></i>
                        <span>{{ $isEn ? 'Defense Facility Clearance' : 'Tesis Güvenlik Uyumu' }}</span>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <aside class="product-sidebar">
                <div class="product-sidebar-card cad-bracket-box spotlight-card">
                    <h2 class="sidebar-procure-title">{{ $isEn ? \App\Models\Setting::get('product_rfq_title_en', 'Official Defense RFQ & Quote') : \App\Models\Setting::get('product_rfq_title_tr', 'Resmi Tedarik & RFQ') }}</h2>
                    <p class="sidebar-procure-desc">
                        {{ $isEn
                            ? \App\Models\Setting::get('product_rfq_desc_en', 'Contact our Defense Procurement Division for official technical specifications, quotation, and engineering integration support.')
                            : \App\Models\Setting::get('product_rfq_desc_tr', 'Bu sistem veya özel proje gereksinimleriniz için Savunma Departmanımızdan resmi teknik teklif ve şartname desteği alabilirsiniz.')
                        }}
                    </p>

                    <div class="sidebar-actions">
                        <button onclick="openRfqModal('{{ addslashes($product->name) }} ({{ $product->model_number ?: $product->model_code }})')" class="btn-primary btn-tactical">
                            <i class="bi bi-file-earmark-text"></i> {{ $isEn ? \App\Models\Setting::get('product_rfq_btn_en', 'Request RFQ for This System') : \App\Models\Setting::get('product_rfq_btn_tr', 'Bu Ürün İçin RFQ Başlat') }}
                        </button>

                        @if($product->datasheet_path)
                            <a href="{{ asset('storage/' . $product->datasheet_path) }}" target="_blank" class="btn-outline btn-tactical">
                                <i class="bi bi-file-earmark-pdf-fill" style="color:#DC2626;"></i> {{ $isEn ? 'Download Datasheet (PDF)' : 'Datasheet İndir (PDF)' }}
                            </a>
                        @endif
                    </div>

                    <div class="sidebar-cage-reminder" style="margin-bottom:1.75rem;">
                        <strong><i class="bi bi-shield-check" style="color:var(--emerald-600);"></i> {{ $isEn ? 'Quality & Metrological Standard' : 'Kalite & Metrolojik Güvence' }}</strong>
                        <div style="font-size:0.82rem;color:var(--text-muted);line-height:1.5;margin-top:0.35rem;">
                            {{ $isEn ? 'ISO 9001:2015 & ISO 17025 accredited calibration, high-performance EMI/EMC shielding verification.' : 'ISO 9001:2015 ve ISO 17025 izlenebilir akreditasyon, EMI/EMC kalkanlama doğrulama standartları.' }}
                        </div>
                    </div>

                    {{-- Related Products --}}
                    @if(isset($categories))
                        <div class="sidebar-other-title">{{ $isEn ? 'Other Systems in This Category' : 'Kategorideki Diğer Sistemler' }}</div>
                        @php
                            $related = \App\Models\Product::where('category_id', $product->category_id)
                                        ->where('id', '!=', $product->id)
                                        ->where('is_active', true)
                                        ->take(4)
                                        ->get();
                        @endphp
                        @foreach($related as $rel)
                            <a href="{{ route('product.show', $rel->id) }}" class="sidebar-other-item">
                                <span class="so-cat">{{ $rel->model_number ?: ($rel->model_code ?: 'SYSTEM') }}</span>
                                <span class="so-name">{{ $rel->name }}</span>
                            </a>
                        @endforeach
                    @endif
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
