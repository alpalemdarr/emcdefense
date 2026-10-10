@php
    $isEn = app()->getLocale() === 'en';
@endphp
@extends('frontend.layout')
@section('title', ($page->meta_title ?: $page->title) . ' – ' . ($isEn ? 'EMC Defense' : 'EMC Savunma'))

@push('styles')
<style>
    .page-header-corporate {
        background: linear-gradient(180deg, #F8FAFC 0%, #FFFFFF 100%);
        color: #0F172A;
        padding: 4.5rem 0 3.5rem;
        border-bottom: 1px solid var(--border-light);
        position: relative;
    }
    .page-header-badge {
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
    .page-header-title {
        font-family: var(--font-head);
        font-size: clamp(2rem, 3.2vw, 3rem);
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 1rem;
        line-height: 1.15;
    }
    .page-header-lead {
        font-size: 1.1rem;
        color: #64748B;
        max-width: 72ch;
        line-height: 1.7;
    }

    .page-body-container {
        padding: 4.5rem 0 6rem;
        background: #F8FAFC;
    }
    .page-content-card {
        background: #FFFFFF;
        border: 1px solid #E2E8F0;
        border-radius: var(--r-md);
        padding: 3rem;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        color: #334155;
        font-size: 1.02rem;
        line-height: 1.8;
    }
    .page-content-card h2, .page-content-card h3, .page-content-card h4 {
        color: #0F172A;
        font-family: var(--font-head);
        font-weight: 800;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    .page-content-card h2 { font-size: 1.75rem; border-bottom: 1.5px solid #F1F5F9; padding-bottom: 0.5rem; }
    .page-content-card h3 { font-size: 1.35rem; }
    .page-content-card p { margin-bottom: 1.25rem; }
    .page-content-card ul, .page-content-card ol {
        margin-bottom: 1.5rem;
        padding-left: 1.5rem;
    }
    .page-content-card li { margin-bottom: 0.5rem; }

    .page-cta-box {
        margin-top: 3rem;
        padding: 2.25rem;
        background: #EFF6FF;
        border: 1.5px solid #BFDBFE;
        border-radius: var(--r-sm);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1.5rem;
    }
    @media (max-width: 768px) {
        .page-header-corporate { padding: 3rem 0 2.25rem; }
        .page-body-container { padding: 2.5rem 0 3.5rem; }
        .page-content-card { padding: 1.5rem 1.15rem; }
        .page-cta-box { padding: 1.25rem 1rem; flex-direction: column; align-items: stretch; text-align: left; }
        .page-cta-box button { width: 100%; justify-content: center; }
    }

    /* ── SENIOR CRAFTSMANSHIP: INSTITUTIONAL PAGE DARK THEME OVERRIDES ── */
    [data-theme="dark"] .page-header-corporate {
        background: radial-gradient(circle at 65% 25%, rgba(37, 99, 235, 0.14) 0%, transparent 60%),
                    linear-gradient(180deg, #070B14 0%, #0F172A 100%) !important;
        border-bottom-color: #1E293B !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .page-header-badge {
        background: rgba(59, 130, 246, 0.15) !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
        color: #60A5FA !important;
    }
    [data-theme="dark"] .page-header-title {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .page-header-lead {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .page-body-container {
        background: var(--bg-body, #0A0F1D) !important;
    }
    [data-theme="dark"] .page-content-card {
        background: #0F172A !important;
        border-color: #1E293B !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .page-content-card h2,
    [data-theme="dark"] .page-content-card h3,
    [data-theme="dark"] .page-content-card h4 {
        color: #F8FAFC !important;
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .page-content-card strong {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .page-content-card a {
        color: #60A5FA !important;
    }
    [data-theme="dark"] .page-cta-box {
        background: #11192E !important;
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .page-cta-box h5 {
        color: #60A5FA !important;
    }
    [data-theme="dark"] .page-cta-box p {
        color: #94A3B8 !important;
    }
</style>
@endpush

@section('content')
<div class="page-header-corporate">
    <canvas id="hero-canvas" class="hero-3d-canvas"></canvas>
    <div class="container">
        @if($page->badge)
            <div class="page-header-badge" data-reveal="fade">
                <i class="bi bi-shield-check"></i> {{ $page->badge }}
            </div>
        @endif
        <h1 class="page-header-title" data-reveal>{{ $page->title }}</h1>
        @if($page->lead)
            <p class="page-header-lead" data-reveal>{{ $page->lead }}</p>
        @endif
    </div>
</div>

<div class="page-body-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="page-content-card">
                    {!! $page->content !!}

                    <div class="page-cta-box">
                        <div>
                            <h5 class="fw-bold mb-1" style="color: #1E2D7D;">
                                <i class="bi bi-shield-lock-fill me-2"></i>
                                {{ $isEn ? 'Defense & Engineering Consultation' : 'Savunma & Mühendislik Danışmanlığı' }}
                            </h5>
                            <p class="text-muted small mb-0">
                                {{ $isEn 
                                    ? 'Contact our defense engineering division for project scopes under NDA.' 
                                    : 'Proje şartnameleriniz ve teknik talepleriniz için uzman ekibimizle NDA kapsamında görüşebilirsiniz.' 
                                }}
                            </p>
                        </div>
                        <button onclick="openRfqModal('{{ addslashes($page->title) }}')" class="btn-primary" style="padding: 0.75rem 1.4rem;">
                            <i class="bi bi-send-fill me-1"></i>
                            {{ $isEn ? 'Request Technical RFQ' : 'Resmi Savunma RFQ Başlat' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
