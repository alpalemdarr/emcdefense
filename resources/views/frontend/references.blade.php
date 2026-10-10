@php
    $isEn = app()->getLocale() === 'en';
    $page = \App\Models\Page::getBySlug('references');
    $pageTitle = $page?->meta_title ?: ($page?->title ?: ($isEn ? 'Defense Industry References – EMC Defense' : 'Savunma Sanayii Referanslarımız – EMC Savunma'));

    $groupMeta = [
        'shielded_rooms' => [
            'title' => $isEn ? '1. Shielded Rooms & Test Cabins' : '1. Ekranlı Odalar & Test Kabinleri',
            'desc' => $isEn ? 'Installation, retrofit, electromagnetic shielding design and consultancy' : 'Kurulum, modernizasyon (retrofit), elektromanyetik tasarım ve danışmanlık',
            'icon' => 'bi-shield-shaded',
        ],
        'tempest_filters' => [
            'title' => $isEn ? '2. TEMPEST Filters & Custom Filters' : '2. TEMPEST Filtreler & Özel Filtre Çözümleri',
            'desc' => $isEn ? 'Defense, aerospace, tactical communications and mission-critical applications' : 'Savunma sanayii, taktik haberleşme, havacılık ve görev kritik sistemler',
            'icon' => 'bi-cpu-fill',
        ],
        'instruments' => [
            'title' => $isEn ? '3. Instruments, Antennas & Accessories' : '3. Cihazlar, Antenler & Aksesuarlar',
            'desc' => $isEn ? 'Accredited EMC & RF test equipment, military antennas and microwave accessories' : 'Akredite EMC & RF test ekipmanları, askeri antenler ve bileşenler',
            'icon' => 'bi-broadcast-pin',
        ],
    ];
@endphp
@extends('frontend.layout')
@section('title', $pageTitle)

@push('styles')
<style>
    .ref-page-header {
        background: linear-gradient(180deg, #F8FAFC 0%, #FFFFFF 100%);
        color: #0F172A;
        padding: 4.5rem 0 4rem;
        border-bottom: 1px solid var(--border-light);
        position: relative;
    }
    .ref-header-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: var(--font-head);
        font-size: 0.72rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: var(--brand-primary);
        background: #EFF6FF;
        border: 1px solid #BFDBFE;
        padding: 0.35rem 0.85rem;
        border-radius: var(--r-xs);
        margin-bottom: 1rem;
    }
    .ref-header-title {
        font-family: var(--font-head);
        font-size: clamp(2rem, 3.2vw, 3rem);
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 1rem;
        line-height: 1.15;
    }
    .ref-header-lead {
        font-size: 1.05rem;
        color: #64748B;
        max-width: 68ch;
        line-height: 1.7;
    }

    .references-body {
        padding: 4.5rem 0 6rem;
        background: #F8FAFC;
    }
    .ref-group-block {
        margin-bottom: 4rem;
    }
    .ref-group-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 1.75rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #E2E8F0;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .ref-group-info {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }
    .ref-group-title {
        font-family: var(--font-head);
        font-size: 1.35rem;
        font-weight: 800;
        color: #0F172A;
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }
    .ref-group-desc {
        font-size: 0.88rem;
        color: #64748B;
        font-weight: 500;
    }
    .ref-group-badge {
        font-family: var(--font-mono);
        font-size: 0.75rem;
        font-weight: 700;
        padding: 4px 12px;
        background: #EFF6FF;
        color: #1D4ED8;
        border: 1px solid #BFDBFE;
        border-radius: 6px;
        white-space: nowrap;
    }

    /* Corporate Logo Grid */
    .ref-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 1.5rem;
    }
    .ref-corporate-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: var(--r-md);
        padding: 1.5rem 1.25rem 1.25rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        transition: all 0.25s ease;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        position: relative;
    }
    .ref-corporate-card:hover {
        border-color: var(--brand-primary);
        box-shadow: 0 12px 28px rgba(30, 45, 125, 0.09);
        transform: translateY(-4px);
    }

    .ref-logo-box {
        width: 100%;
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.1rem;
        padding: 0.5rem;
        background: #FFFFFF;
        border-radius: var(--r-sm);
    }
    .ref-corp-logo {
        max-height: 80px;
        max-width: 190px;
        width: auto;
        height: auto;
        object-fit: contain;
        transition: transform 0.25s ease;
    }
    .ref-corporate-card:hover .ref-corp-logo {
        transform: scale(1.04);
    }

    .ref-card-name {
        font-family: var(--font-head);
        font-size: 0.95rem;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 0.5rem;
        line-height: 1.35;
        min-height: 2.7rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .ref-card-link {
        margin-top: auto;
        font-size: 0.75rem;
        font-weight: 600;
        color: #2563EB;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 4px 10px;
        border-radius: 4px;
        background: #F1F5F9;
        transition: all 0.2s ease;
    }
    .ref-card-link:hover {
        background: #DBEAFE;
        color: #1D4ED8;
    }

    /* Verification Box */
    .ref-nda-box {
        background: #FFFFFF;
        border: 1px solid #CBD5E1;
        border-left: 4px solid #3B82F6;
        border-radius: var(--r-md);
        padding: 2.25rem;
        margin-top: 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
        flex-wrap: wrap;
    }
    @media (max-width: 768px) {
        .ref-page-header { padding: 3rem 0 2.5rem; }
        .ref-nda-box { padding: 1.5rem 1.1rem; flex-direction: column; align-items: stretch; gap: 1.25rem; }
        .ref-nda-box button { width: 100%; justify-content: center; }
    }
    .ref-nda-title {
        font-family: var(--font-head);
        font-size: 1.2rem;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 0.4rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .ref-nda-desc {
        font-size: 0.9rem;
        color: #475569;
        max-width: 62ch;
        line-height: 1.6;
        margin: 0;
    }

    /* ── SENIOR CRAFTSMANSHIP: REFERENCES DARK THEME OVERRIDES ── */
    [data-theme="dark"] .ref-page-header {
        background: radial-gradient(circle at 65% 25%, rgba(37, 99, 235, 0.14) 0%, transparent 60%),
                    linear-gradient(180deg, #070B14 0%, #0F172A 100%) !important;
        border-bottom-color: #1E293B !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .ref-header-badge {
        background: rgba(59, 130, 246, 0.15) !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
        color: #60A5FA !important;
    }
    [data-theme="dark"] .ref-header-title {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .ref-header-lead {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .ref-header-rich-content {
        border-top-color: #334155 !important;
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .references-body {
        background: var(--bg-body, #0A0F1D) !important;
    }
    [data-theme="dark"] .ref-group-head {
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .ref-group-title {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .ref-group-desc {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .ref-group-badge {
        background: rgba(59, 130, 246, 0.15) !important;
        color: #60A5FA !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
    }
    [data-theme="dark"] .ref-corporate-card {
        background: #0F172A !important;
        border-color: #1E293B !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
    }
    [data-theme="dark"] .ref-corporate-card:hover {
        border-color: #3B82F6 !important;
        box-shadow: 0 14px 35px rgba(59, 130, 246, 0.22) !important;
    }
    [data-theme="dark"] .ref-logo-box {
        background: #FFFFFF !important;
        border: 1px solid #1E293B !important;
    }
    [data-theme="dark"] .ref-card-name {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .ref-card-link {
        background: #1E293B !important;
        color: #60A5FA !important;
    }
    [data-theme="dark"] .ref-card-link:hover {
        background: #2563EB !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .ref-nda-box {
        background: #0F172A !important;
        border-color: #1E293B !important;
        border-left: 4px solid #3B82F6 !important;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.6) !important;
    }
    [data-theme="dark"] .ref-nda-title {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .ref-nda-desc {
        color: #CBD5E1 !important;
    }
</style>
@endpush

@section('content')
<div class="ref-page-header">
    <canvas id="hero-canvas" class="hero-3d-canvas"></canvas>
    <div class="container">
        <div class="ref-header-badge" data-reveal="fade">
            <i class="bi bi-shield-check"></i> {{ $page?->badge ?: ($isEn ? 'DEFENSE & AEROSPACE ECOSYSTEM' : 'SAVUNMA VE HAVACILIK EKOSİSTEMİ') }}
        </div>
        <h1 class="ref-header-title" data-reveal>
            {{ $page?->title ?: ($isEn ? 'References & Strategic Defense Partners' : 'Savunma Sanayii & Stratejik Referanslarımız') }}
        </h1>
        <p class="ref-header-lead">
            {{ $page?->lead ?: ($isEn
                ? 'Providing high-power electromagnetic shielding, HEMP simulation systems, TEMPEST filters, and accredited turnkey testing chambers to prime defense contractors, government institutions, and research laboratories including the Defense Industry Agency (SSB), Aselsan, Roketsan, TAI, and the Armed Forces.'
                : 'T.C. Savunma Sanayii Başkanlığı, Aselsan, Roketsan, TUSAŞ, TÜBİTAK ve Türk Silahlı Kuvvetleri başta olmak üzere; savunma ve havacılık sanayimizin öncü ana yüklenicilerine ekranlı odalar, TEMPEST ve özel filtreler, askeri antenler ve anahtar teslim test sistemleri sunuyoruz.'
            ) }}
        </p>
        @if($page?->content)
            <div class="ref-header-rich-content mt-3 pt-3" data-reveal style="border-top: 1px dashed #CBD5E1; color: #475569; font-size: 0.95rem; line-height: 1.7; max-width: 75ch;">
                {!! $page->content !!}
            </div>
        @endif
    </div>
</div>

<div class="references-body">
    <div class="container">
        @if(isset($referenceGroups) && $referenceGroups->count() > 0)
            @foreach($referenceGroups as $groupKey => $refs)
                @php
                    $meta = $groupMeta[$groupKey] ?? [
                        'title' => ucwords(str_replace('_', ' ', $groupKey)),
                        'desc' => $isEn ? 'Strategic references and partner institutions' : 'Stratejik referanslar ve ortak kurumlar',
                        'icon' => 'bi-building'
                    ];
                @endphp
                <div class="ref-group-block" data-reveal>
                    <div class="ref-group-head">
                        <div class="ref-group-info">
                            <h2 class="ref-group-title">
                                <i class="bi {{ $meta['icon'] }}" style="color:#2563EB;"></i>
                                {{ $meta['title'] }}
                            </h2>
                            <p class="ref-group-desc">{{ $meta['desc'] }}</p>
                        </div>
                        <span class="ref-group-badge">
                            {{ $refs->count() }} {{ $isEn ? 'Corporate Partners' : 'Kurum / Kuruluş' }}
                        </span>
                    </div>

                    <div class="ref-cards-grid" data-stagger>
                        @foreach($refs as $ref)
                            <div class="ref-corporate-card shine-hover spotlight-card cad-bracket-box">
                                <div class="ref-logo-box">
                                    @if($ref->logo_path)
                                        <img src="{{ asset('storage/' . $ref->logo_path) }}" 
                                             alt="{{ $ref->name }}" 
                                             class="ref-corp-logo"
                                             loading="lazy">
                                    @else
                                        <i class="bi bi-shield-shaded" style="font-size:2.5rem;color:#3B82F6;"></i>
                                    @endif
                                </div>
                                <h3 class="ref-card-name">{{ $ref->name }}</h3>
                                @if($ref->url)
                                    <a href="{{ $ref->url }}" target="_blank" rel="noopener noreferrer" class="ref-card-link">
                                        <i class="bi bi-box-arrow-up-right"></i> {{ $isEn ? 'Official Website' : 'Resmi Web Sitesi' }}
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif

        {{-- Verification & Security Clearance Banner --}}
        <div class="ref-nda-box">
            <div>
                <h3 class="ref-nda-title">
                    <i class="bi bi-shield-lock-fill" style="color:#2563EB;"></i> 
                    {{ $isEn ? 'Defense Security & NDA Procedures' : 'Savunma Sanayii Güvenlik & Gizlilik (NDA) Prosedürü' }}
                </h3>
                <p class="ref-nda-desc">
                    {{ $isEn
                        ? 'In accordance with Defense Industry Facility Security Clearance regulations, detailed project references, technical acceptance reports, and program data for classified defense programs are shared exclusively following bilateral Non-Disclosure Agreement (NDA) execution.'
                        : 'Savunma Sanayii Tesis Güvenlik Belgesi ve gizlilik mevzuatı uyarınca, gizlilik dereceli savunma projelerine ait teknik kabul tutanakları, referans mektupları ve proje detayları ikili Gizlilik Sözleşmesi (NDA) imzalanması sonrasında paylaşılmaktadır.'
                    }}
                </p>
            </div>
            <div>
                <button onclick="openRfqModal('{{ $isEn ? 'Reference Verification & Project Consultation' : 'Referans Doğrulama & Proje Görüşmesi' }}')" class="btn-primary" style="white-space:nowrap;padding:0.85rem 1.5rem;">
                    <i class="bi bi-file-earmark-lock-fill"></i> {{ $isEn ? 'Request Project Consultation' : 'Proje Görüşmesi Talep Et' }}
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
