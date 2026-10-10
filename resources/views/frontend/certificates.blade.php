@php
    $isEn = app()->getLocale() === 'en';
    $page = \App\Models\Page::getBySlug('certificates');
    $pageTitle = $page?->meta_title ?: ($page?->title ?: ($isEn ? 'Quality & Security Accreditations – EMC Defense' : 'Kalite & Güvenlik Sertifikalarımız – EMC Savunma'));
@endphp
@extends('frontend.layout')
@section('title', $pageTitle)

@push('styles')
<style>
    .cert-page-header {
        background: linear-gradient(180deg, #F8FAFC 0%, #FFFFFF 100%);
        color: #0F172A;
        padding: 4.5rem 0 4rem;
        border-bottom: 1px solid var(--border-light);
        position: relative;
    }
    .cert-header-badge {
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
    .cert-header-title {
        font-family: var(--font-head);
        font-size: clamp(2rem, 3.2vw, 3rem);
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 1rem;
        line-height: 1.15;
    }
    .cert-header-lead {
        font-size: 1.05rem;
        color: #64748B;
        max-width: 68ch;
        line-height: 1.7;
    }

    .certificates-body {
        padding: 4.5rem 0 6rem;
        background: #F8FAFC;
    }
    .cert-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(min(100%, 280px), 1fr));
        gap: 2rem;
    }
    @media (max-width: 768px) {
        .cert-page-header { padding: 3rem 0 2.5rem; }
        .cert-body { padding: 2.5rem 0 4rem; }
        .cert-preview-box { height: 240px; padding: 1rem; }
    }
    .cert-corporate-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: var(--r-md);
        overflow: hidden;
        transition: all 0.25s ease;
        box-shadow: 0 2px 10px rgba(15, 23, 42, 0.04);
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .cert-corporate-card:hover {
        border-color: var(--brand-primary);
        box-shadow: 0 15px 35px rgba(30, 45, 125, 0.1);
        transform: translateY(-4px);
    }

    .cert-preview-box {
        background: #F8FAFC;
        border-bottom: 1px solid #E2E8F0;
        padding: 1.5rem;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        cursor: pointer;
        overflow: hidden;
    }
    .cert-preview-box img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.1);
        border-radius: 4px;
        transition: transform 0.3s ease;
    }
    .cert-preview-box:hover img {
        transform: scale(1.04);
    }
    .cert-zoom-overlay {
        position: absolute;
        inset: 0;
        background: rgba(7, 19, 36, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        color: #FFFFFF;
        font-family: var(--font-head);
        font-size: 0.85rem;
        font-weight: 700;
        opacity: 0;
        transition: opacity 0.2s ease;
    }
    .cert-preview-box:hover .cert-zoom-overlay {
        opacity: 1;
    }

    .cert-card-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .cert-type-tag {
        font-family: var(--font-mono);
        font-size: 0.72rem;
        font-weight: 700;
        color: #2563EB;
        text-transform: uppercase;
        margin-bottom: 0.45rem;
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }
    .cert-title {
        font-family: var(--font-head);
        font-size: 1.15rem;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 0.6rem;
        line-height: 1.35;
    }
    .cert-desc {
        font-size: 0.86rem;
        color: #64748B;
        line-height: 1.55;
        margin-bottom: 1.25rem;
        flex-grow: 1;
    }
    .cert-card-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.65rem;
        padding-top: 1.1rem;
        border-top: 1px solid #F1F5F9;
    }
    .btn-cert-primary {
        background: #EFF6FF;
        color: #1D4ED8;
        border: 1px solid #BFDBFE;
        border-radius: var(--r-sm);
        padding: 0.6rem 0.85rem;
        font-size: 0.78rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.35rem;
        transition: all 0.2s ease;
    }
    .btn-cert-primary:hover {
        background: #2563EB;
        color: #FFFFFF;
        border-color: #2563EB;
    }
    .btn-cert-secondary {
        background: #F8FAFC;
        color: #475569;
        border: 1px solid #CBD5E1;
        border-radius: var(--r-sm);
        padding: 0.6rem 0.85rem;
        font-size: 0.78rem;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.35rem;
        transition: all 0.2s ease;
    }
    .btn-cert-secondary:hover {
        background: #E2E8F0;
        color: #0F172A;
    }

    /* Lightbox Modal */
    .cert-modal {
        display: none;
        position: fixed;
        z-index: 99999;
        inset: 0;
        background: rgba(0, 0, 0, 0.9);
        backdrop-filter: blur(8px);
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }
    .cert-modal.active {
        display: flex;
    }
    .cert-modal-content {
        max-width: 90vw;
        max-height: 90vh;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.7);
    }
    .cert-modal-close {
        position: absolute;
        top: 1.5rem;
        right: 2rem;
        color: #FFFFFF;
        font-size: 2.2rem;
        cursor: pointer;
        transition: color 0.2s ease;
    }
    .cert-modal-close:hover {
        color: #EF4444;
    }
    .cert-modal-caption {
        position: absolute;
        bottom: 1.5rem;
        left: 50%;
        transform: translateX(-50%);
        color: #F1F5F9;
        font-family: var(--font-head);
        font-size: 0.95rem;
        font-weight: 700;
        background: rgba(15, 23, 42, 0.85);
        padding: 6px 18px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* ── SENIOR CRAFTSMANSHIP: CERTIFICATES DARK THEME OVERRIDES ── */
    [data-theme="dark"] .cert-page-header {
        background: radial-gradient(circle at 65% 25%, rgba(37, 99, 235, 0.14) 0%, transparent 60%),
                    linear-gradient(180deg, #070B14 0%, #0F172A 100%) !important;
        border-bottom-color: #1E293B !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .cert-header-badge {
        background: rgba(59, 130, 246, 0.15) !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
        color: #60A5FA !important;
    }
    [data-theme="dark"] .cert-header-title {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .cert-header-lead {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .certificates-body {
        background: var(--bg-body, #0A0F1D) !important;
    }
    [data-theme="dark"] .cert-corporate-card {
        background: #0F172A !important;
        border-color: #1E293B !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
    }
    [data-theme="dark"] .cert-corporate-card:hover {
        border-color: #3B82F6 !important;
        box-shadow: 0 16px 36px rgba(59, 130, 246, 0.22) !important;
    }
    [data-theme="dark"] .cert-preview-box {
        background: #11192E !important;
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .cert-type-tag {
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .cert-title {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .cert-desc {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .cert-card-actions {
        border-top-color: #1E293B !important;
    }
    [data-theme="dark"] .btn-cert-primary {
        background: rgba(59, 130, 246, 0.15) !important;
        color: #60A5FA !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
    }
    [data-theme="dark"] .btn-cert-primary:hover {
        background: #2563EB !important;
        color: #FFFFFF !important;
        border-color: #2563EB !important;
    }
    [data-theme="dark"] .btn-cert-secondary {
        background: #1E293B !important;
        color: #CBD5E1 !important;
        border-color: #334155 !important;
    }
    [data-theme="dark"] .btn-cert-secondary:hover {
        background: #334155 !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .cert-modal {
        background: rgba(3, 7, 18, 0.94) !important;
    }
    [data-theme="dark"] .cert-modal-caption {
        background: rgba(15, 23, 42, 0.95) !important;
        color: #F8FAFC !important;
        border-color: #334155 !important;
    }
</style>
@endpush

@section('content')
<div class="cert-page-header">
    <canvas id="hero-canvas" class="hero-3d-canvas"></canvas>
    <div class="container">
        <div class="cert-header-badge" data-reveal="fade">
            <i class="bi bi-patch-check-fill"></i> {{ $page?->badge ?: ($isEn ? 'OFFICIAL ACCREDITATION & CERTIFICATION' : 'RESMİ AKREDİTASYON & BELGELENDİRME') }}
        </div>
        <h1 class="cert-header-title" data-reveal>{{ $page?->title ?: ($isEn ? 'Quality & Security Accreditations' : 'Kalite ve Güvenlik Sertifikalarımız') }}</h1>
        <p class="cert-header-lead" data-reveal>
            {{ $page?->lead ?: ($isEn
                ? 'EMC Defense maintains national and international certification requirements for quality management, accreditation, and customer confidence: ISO 9001:2015 Quality Management System, ISO 17025 Test & Calibration Competence, and Defense Facility Security Clearances.'
                : 'Savunma ve havacılık standartlarında tavizsiz kalite güvencesi: ISO 9001:2015 Kalite Yönetim Sistemi, ISO 17025 Test ve Kalibrasyon Akreditasyonu ve Savunma Sanayii Tesis Güvenlik Belgesi uyumluluğu.'
            ) }}
        </p>
        @if($page?->content)
            <div class="cert-header-rich-content mt-3 pt-3" data-reveal style="border-top: 1px dashed #CBD5E1; color: #475569; font-size: 0.95rem; line-height: 1.7; max-width: 75ch;">
                {!! $page->content !!}
            </div>
        @endif
    </div>
</div>

<div class="certificates-body">
    <div class="container">
        <div class="cert-grid" data-stagger>
            @if(isset($certificates) && $certificates->count() > 0)
                @foreach($certificates as $cert)
                    <div class="cert-corporate-card shine-hover spotlight-card cad-bracket-box">
                        <div class="cert-preview-box hardware-viewfinder" onclick="openCertModal('{{ $cert->image_url }}', '{{ addslashes($cert->title) }}')">
                            @if($cert->image_path)
                                <img src="{{ $cert->image_url }}" alt="{{ $cert->title }}" loading="lazy">
                                <div class="cert-zoom-overlay">
                                    <i class="bi bi-zoom-in"></i> {{ $isEn ? 'Click to Enlarge Scan' : 'Tam Boyut İncele' }}
                                </div>
                            @else
                                <div style="text-align:center;color:#60A5FA;">
                                    <i class="bi bi-shield-check" style="font-size:3.5rem;"></i>
                                    <div style="font-family:var(--font-head);font-size:0.85rem;font-weight:700;margin-top:0.5rem;color:#F1F5F9;">{{ $isEn ? 'OFFICIAL CERTIFICATE' : 'RESMİ SERTİFİKA' }}</div>
                                </div>
                            @endif
                        </div>
                        <div class="cert-card-body">
                            <span class="cert-type-tag">
                                <i class="bi bi-patch-check"></i> {{ $isEn ? 'ACCREDITED QUALITY CERTIFICATE' : 'AKREDİTE KALİTE BELGESİ' }}
                            </span>
                            <h2 class="cert-title">{{ $cert->title }}</h2>
                            <p class="cert-desc">
                                {{ $isEn 
                                    ? 'Official accreditation verifying corporate quality management, manufacturing precision, and calibration traceability for EMC Defense.'
                                    : 'EMC Savunma ve Test Sistemleri kurumsal kalite yönetimi, üretim hassasiyeti ve metrolojik kalibrasyon güvencesini teyit eden resmi akreditasyon belgesi.'
                                }}
                            </p>

                            <div class="cert-card-actions">
                                <button onclick="openCertModal('{{ $cert->image_url }}', '{{ addslashes($cert->title) }}')" class="btn-cert-primary">
                                    <i class="bi bi-file-earmark-image"></i> {{ $isEn ? 'View Scan' : 'Belgeyi İncele' }}
                                </button>
                                <button onclick="openRfqModal('{{ $isEn ? 'Certificate Verification Request: ' : 'Sertifika Doğrulama & Suret Talebi: ' }}{{ addslashes($cert->title) }}')" class="btn-cert-secondary">
                                    <i class="bi bi-shield-check"></i> {{ $isEn ? 'Request Copy' : 'Suret Talep Et' }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

{{-- Lightbox Modal --}}
<div class="cert-modal" id="certModal" onclick="closeCertModal(event)">
    <span class="cert-modal-close" onclick="closeCertModal(event)">&times;</span>
    <img src="" alt="" class="cert-modal-content" id="certModalImg">
    <div class="cert-modal-caption" id="certModalCaption"></div>
</div>

@push('scripts')
<script>
    function openCertModal(imgSrc, title) {
        if (!imgSrc) return;
        document.getElementById('certModalImg').src = imgSrc;
        document.getElementById('certModalCaption').textContent = title;
        document.getElementById('certModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeCertModal(e) {
        if (e.target.id === 'certModal' || e.target.classList.contains('cert-modal-close')) {
            document.getElementById('certModal').classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.getElementById('certModal').classList.remove('active');
            document.body.style.overflow = '';
        }
    });
</script>
@endpush
@endsection
