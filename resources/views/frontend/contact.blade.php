@php
    $isEn = app()->getLocale() === 'en';
    $page = \App\Models\Page::getBySlug('contact');
    $pageTitle = $page?->meta_title ?: ($page?->title ?: ($isEn ? 'Contact & Facility Coordination – EMC Defense' : 'İletişim & Laboratuvar Koordinasyonu – EMC Savunma'));
@endphp
@extends('frontend.layout')
@section('title', $pageTitle)

@push('styles')
<style>
    /* ── PAGE HEADER WITH 3D CANVAS ── */
    .contact-page-header {
        background: linear-gradient(180deg, #F8FAFC 0%, #FFFFFF 100%);
        color: #0F172A;
        padding: 4.5rem 0 4rem;
        border-bottom: 1px solid var(--border-light);
        position: relative;
        overflow: hidden;
    }
    .contact-header-badge {
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
    .contact-header-title {
        font-family: var(--font-head);
        font-size: clamp(2rem, 3.2vw, 3rem);
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 1rem;
        line-height: 1.15;
    }
    .contact-header-lead {
        font-size: 1.05rem;
        color: #64748B;
        max-width: 68ch;
        line-height: 1.7;
    }

    /* ── BODY & GRID ── */
    .contact-body {
        padding: 3.5rem 0 6rem;
        background: #F8FAFC;
    }

    /* ── DENEY TALEP FORMU SPECIAL BANNER CARD ── */
    .test-cta-banner {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        border: 1px solid #334155;
        border-radius: var(--r-md);
        padding: 2.25rem 2.5rem;
        margin-bottom: 3rem;
        color: #FFFFFF;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.12);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
        flex-wrap: wrap;
        position: relative;
        overflow: hidden;
    }
    .test-cta-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(47, 128, 237, 0.25) 0%, transparent 70%);
        pointer-events: none;
    }
    .test-cta-title {
        font-family: var(--font-head);
        font-size: 1.5rem;
        font-weight: 800;
        color: #FFFFFF;
        margin-bottom: 0.5rem;
        letter-spacing: -0.01em;
    }
    .test-cta-desc {
        font-size: 0.95rem;
        color: #94A3B8;
        max-width: 60ch;
        line-height: 1.6;
        margin-bottom: 0;
    }
    .test-cta-actions {
        display: flex;
        gap: 0.85rem;
        flex-wrap: wrap;
    }
    .btn-test-cta {
        background: linear-gradient(135deg, #2F80ED 0%, #1E70BF 100%);
        color: #FFFFFF;
        font-weight: 700;
        font-size: 0.95rem;
        padding: 0.85rem 1.85rem;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 14px rgba(47, 128, 237, 0.35);
        transition: all 0.2s ease;
        border: none;
    }
    .btn-test-cta:hover {
        background: linear-gradient(135deg, #1E70BF 0%, #155B9F 100%);
        color: #FFFFFF;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(47, 128, 237, 0.45);
    }
    .btn-test-modal {
        background: rgba(255, 255, 255, 0.1);
        color: #E2E8F0;
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-weight: 600;
        font-size: 0.95rem;
        padding: 0.85rem 1.5rem;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-test-modal:hover {
        background: rgba(255, 255, 255, 0.2);
        color: #FFFFFF;
    }

    @media (max-width: 768px) {
        .test-cta-banner {
            padding: 1.5rem 1.15rem;
            gap: 1.25rem;
            margin-bottom: 2rem;
        }
        .test-cta-title {
            font-size: 1.25rem;
        }
        .test-cta-actions {
            width: 100%;
            flex-direction: column;
            gap: 0.65rem;
        }
        .btn-test-cta,
        .btn-test-modal {
            width: 100%;
            justify-content: center;
            text-align: center;
        }
    }

    /* ── TWO COLUMN MAIN GRID ── */
    .contact-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 1.5fr);
        gap: 2.5rem;
        align-items: start;
    }
    @media (max-width: 992px) {
        .contact-grid { grid-template-columns: 1fr; gap: 2rem; }
    }

    /* ── LEFT INFO CARD ── */
    .contact-info-card {
        background: #FFFFFF;
        border: 1px solid var(--border-light);
        border-radius: var(--r-md);
        box-shadow: var(--shadow-sm);
        padding: 2.25rem;
    }
    .info-card-title {
        font-family: var(--font-head);
        font-size: 1.25rem;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 1.5rem;
        padding-bottom: 0.85rem;
        border-bottom: 1px solid var(--border-light);
        display: flex;
        align-items: center;
        gap: 0.6rem;
    }
    .info-card-title i {
        color: var(--brand-primary);
    }
    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .info-item:last-child {
        margin-bottom: 0;
    }
    .info-icon {
        width: 42px;
        height: 42px;
        border-radius: 8px;
        background: #EFF6FF;
        color: var(--brand-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        flex-shrink: 0;
    }
    .info-label {
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #64748B;
        margin-bottom: 0.25rem;
    }
    .info-value {
        font-size: 0.95rem;
        color: #0F172A;
        line-height: 1.55;
        font-weight: 500;
    }
    .info-value a {
        color: var(--brand-primary);
        text-decoration: none;
        font-weight: 600;
    }
    .info-value a:hover {
        text-decoration: underline;
    }

    .facility-map-box {
        margin-top: 1.75rem;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid var(--border-light);
        background: #F1F5F9;
        padding: 1.25rem;
    }
    .facility-map-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        padding: 0.75rem 1rem;
        background: #FFFFFF;
        border: 1px solid #CBD5E1;
        border-radius: 6px;
        color: #0F172A;
        font-weight: 700;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    }
    .facility-map-btn:hover {
        background: #EFF6FF;
        border-color: #BFDBFE;
        color: var(--brand-primary);
    }

    /* ── RIGHT CONTACT FORM CARD ── */
    .contact-form-card {
        background: #FFFFFF;
        border: 1px solid var(--border-light);
        border-radius: var(--r-md);
        box-shadow: var(--shadow-sm);
        padding: 2.5rem;
    }
    .form-card-title {
        font-family: var(--font-head);
        font-size: 1.35rem;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 0.35rem;
    }
    .form-card-subtitle {
        font-size: 0.92rem;
        color: #64748B;
        margin-bottom: 2rem;
    }
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
        margin-bottom: 1.25rem;
    }
    @media (max-width: 640px) {
        .form-row { grid-template-columns: 1fr; gap: 1rem; }
    }
    .contact-field-group {
        margin-bottom: 1.25rem;
    }
    .contact-field-label {
        display: block;
        font-size: 0.88rem;
        font-weight: 700;
        color: #334155;
        margin-bottom: 0.4rem;
    }
    .contact-field-label .req {
        color: #EF4444;
    }
    .contact-field-input,
    .contact-field-select,
    .contact-field-textarea {
        width: 100%;
        padding: 0.65rem 0.95rem;
        border: 1px solid #CBD5E1;
        border-radius: 6px;
        font-size: 0.95rem;
        color: #0F172A;
        background: #FFFFFF;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.03);
        box-sizing: border-box;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }
    .contact-field-input:focus,
    .contact-field-select:focus,
    .contact-field-textarea:focus {
        outline: none;
        border-color: var(--brand-primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }
    .btn-contact-submit {
        background: var(--brand-primary);
        color: #FFFFFF;
        border: none;
        padding: 0.85rem 2.5rem;
        font-size: 1rem;
        font-weight: 700;
        border-radius: 6px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        transition: all 0.2s ease;
    }
    .btn-contact-submit:hover {
        background: #1D4ED8;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
    }

    /* ── SENIOR CRAFTSMANSHIP: CONTACT DARK THEME OVERRIDES ── */
    [data-theme="dark"] .contact-page-header {
        background: radial-gradient(circle at 65% 25%, rgba(37, 99, 235, 0.14) 0%, transparent 60%),
                    linear-gradient(180deg, #070B14 0%, #0F172A 100%) !important;
        border-bottom-color: #1E293B !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .contact-header-badge {
        background: rgba(59, 130, 246, 0.15) !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
        color: #60A5FA !important;
    }
    [data-theme="dark"] .contact-header-title {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .contact-header-lead {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .contact-body {
        background: var(--bg-body, #0A0F1D) !important;
    }
    [data-theme="dark"] .test-cta-banner {
        background: linear-gradient(135deg, #0A1124 0%, #0F172A 100%) !important;
        border-color: #1E293B !important;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.6) !important;
    }
    [data-theme="dark"] .test-cta-title {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .test-cta-desc {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .contact-info-card {
        background: #0F172A !important;
        border-color: #1E293B !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
    }
    [data-theme="dark"] .info-card-title {
        color: #F8FAFC !important;
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .info-icon {
        background: rgba(59, 130, 246, 0.15) !important;
        color: #60A5FA !important;
    }
    [data-theme="dark"] .info-label {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .info-value {
        color: #E2E8F0 !important;
    }
    [data-theme="dark"] .info-value a {
        color: #60A5FA !important;
    }
    [data-theme="dark"] .facility-map-box {
        background: #11192E !important;
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .facility-map-btn {
        background: #1E293B !important;
        border-color: #334155 !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .facility-map-btn:hover {
        background: #2563EB !important;
        border-color: #2563EB !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .contact-form-card {
        background: #0F172A !important;
        border-color: #1E293B !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
    }
    [data-theme="dark"] .form-card-title {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .form-card-subtitle {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .contact-field-label {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .contact-field-input,
    [data-theme="dark"] .contact-field-select,
    [data-theme="dark"] .contact-field-textarea {
        background: #131C31 !important;
        border-color: #334155 !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .contact-field-input:focus,
    [data-theme="dark"] .contact-field-select:focus,
    [data-theme="dark"] .contact-field-textarea:focus {
        border-color: #38BDF8 !important;
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2) !important;
    }
</style>
@endpush

@section('content')
{{-- PAGE HEADER WITH 3D CANVAS THEME --}}
<div class="contact-page-header">
    <canvas id="hero-canvas" class="hero-3d-canvas"></canvas>
    <div class="container position-relative" style="z-index: 2;">
        <div class="contact-header-badge">
            <i class="bi bi-geo-alt-fill"></i> {{ $page?->badge ?: ($isEn ? 'HEADQUARTERS & ENGINEERING LAB' : 'GENEL MERKEZ & MÜHENDİSLİK LABORATUVARI') }}
        </div>
        <h1 class="contact-header-title">{{ $page?->title ?: ($isEn ? 'Contact & Facility Coordination' : 'İletişim & Laboratuvar Koordinasyonu') }}</h1>
        <p class="contact-header-lead">
            {{ $page?->lead ?: ($isEn
                ? 'Get in touch with our engineering team in Kartepe / Kocaeli for technical inquiries, facility visits, and general consultations.'
                : 'Kocaeli Kartepe entegrasyon merkezimiz ve uzman mühendislik kadromuzla teknik danışma, tesis ziyareti ve kurumsal iş birliği talepleriniz için iletişime geçebilirsiniz.'
            ) }}
        </p>
    </div>
</div>

<div class="contact-body">
    <div class="container">

        {{-- PROMINENT BANNER FOR THE OFFICIAL DENEY TALEP FORMU (FR 7.1.4) --}}
        <div class="test-cta-banner">
            <div>
                <div class="test-cta-title">
                    {{ $isEn ? \App\Models\Setting::get('contact_banner_title_en', 'Official Equipment Test Request Form') : \App\Models\Setting::get('contact_banner_title_tr', 'Resmi Cihaz Deney ve Test Talebi') }}
                </div>
                <p class="test-cta-desc">
                    {{ $isEn
                        ? \App\Models\Setting::get('contact_banner_desc_en', 'If you require EMC emission, immunity, or electrical parameters testing for your equipment in our laboratory, please submit through our official Test Request Form.')
                        : \App\Models\Setting::get('contact_banner_desc_tr', 'Laboratuvarımızda cihazınız için EMC emisyon, bağışıklık veya elektriksel çalışma parametresi deneyleri yaptırmak istiyorsanız, resmi Deney Talep Formu üzerinden başvurabilirsiniz.')
                    }}
                </p>
            </div>
            <div class="test-cta-actions">
                <a href="{{ route('test-request') }}" class="btn-test-cta">
                    <i class="bi bi-file-earmark-text-fill"></i>
                    <span>{{ $isEn ? \App\Models\Setting::get('contact_banner_btn_en', 'Open Test Request Form →') : \App\Models\Setting::get('contact_banner_btn_tr', 'Deney Talep Formuna Git →') }}</span>
                </a>
                <button type="button" class="btn-test-modal" onclick="openRfqModal()">
                    <i class="bi bi-window-stack"></i>
                    <span>{{ $isEn ? \App\Models\Setting::get('contact_banner_modal_btn_en', 'Quick Modal') : \App\Models\Setting::get('contact_banner_modal_btn_tr', 'Hızlı Form') }}</span>
                </button>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 p-3 rounded-3" role="alert" style="background:#ECFDF5; border:1px solid #A7F3D0; color:#065F46; font-size:0.95rem;">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-check-circle-fill fs-5" style="color:#059669;"></i>
                    <div>
                        <strong>{{ $isEn ? 'Success!' : 'Mesajınız Alındı!' }}</strong>
                        <div>{{ session('success') }}</div>
                    </div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mb-4 p-3 rounded-3" style="background:#FEF2F2; border:1px solid #FECACA; color:#991B1B; font-size:0.92rem;">
                <strong><i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $isEn ? 'Please correct the errors below:' : 'Lütfen aşağıdaki hataları kontrol ediniz:' }}</strong>
                <ul class="mb-0 mt-2 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- TWO-COLUMN CONTACT STRUCTURE --}}
        <div class="contact-grid">

            {{-- LEFT: CORPORATE & FACILITY DETAILS --}}
            <div class="contact-info-card">
                <div class="info-card-title">
                    <i class="bi bi-building"></i>
                    <span>{{ $isEn ? 'Facility & Headquarters' : 'Tesis & İletişim Bilgileri' }}</span>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <div>
                        <div class="info-label">{{ $isEn ? 'Physical Address' : 'Merkez Adres' }}</div>
                        <div class="info-value">
                            {!! nl2br(e($isEn ? \App\Models\Setting::get('contact_address_en', 'Ibrikdere Mah. 143. Sok. No:17, Kartepe / Kocaeli / Turkey') : \App\Models\Setting::get('contact_address_tr', 'İbrikdere Mahallesi 143. Sokak No:17, Kartepe / Kocaeli / Türkiye'))) !!}
                            <div style="font-family: var(--font-mono); font-size: 0.78rem; color: #64748B; margin-top: 0.35rem;">
                                [{{ \App\Models\Setting::get('contact_coordinates', '40.758° N, 30.015° E') }}]
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
                    <div>
                        <div class="info-label">{{ $isEn ? 'Telephone' : 'Telefon' }}</div>
                        <div class="info-value">
                            @php $phone = \App\Models\Setting::get('contact_phone', '+90 262 373 60 00'); @endphp
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone ?: '+90 262 373 60 00' }}</a>
                            <div style="font-size: 0.78rem; color: #64748B; margin-top: 0.15rem;">
                                {{ $isEn ? 'Monday – Friday: 08:30 – 18:00 (UTC+3)' : 'Pazartesi – Cuma: 08:30 – 18:00' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
                    <div>
                        <div class="info-label">{{ $isEn ? 'Official Email' : 'Resmi E-posta' }}</div>
                        <div class="info-value">
                            @php $email = \App\Models\Setting::get('contact_email', 'defence@emcelectronic.com'); @endphp
                            <a href="mailto:{{ $email }}">{{ $email }}</a>
                        </div>
                    </div>
                </div>

                {{-- MAP ACTION BOX --}}
                <div class="facility-map-box">
                    <div style="font-size: 0.85rem; font-weight: 700; color: #334155; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.4rem;">
                        <i class="bi bi-map-fill" style="color: var(--brand-primary);"></i>
                        <span>{{ $isEn ? 'Facility Location & Navigation' : 'Tesis Konumu & Yol Tarifi' }}</span>
                    </div>
                    <p style="font-size: 0.82rem; color: #64748B; margin-bottom: 0.85rem; line-height: 1.5;">
                        {{ $isEn ? 'Located in Kartepe / Kocaeli industrial technology zone.' : 'Kartepe / Kocaeli sanayi ve teknoloji bölgesinde yer almaktadır.' }}
                    </p>
                    <a href="https://maps.google.com/?q=40.758,30.015" target="_blank" rel="noopener noreferrer" class="facility-map-btn">
                        <i class="bi bi-arrow-up-right-circle"></i>
                        <span>{{ $isEn ? 'View on Google Maps' : 'Google Haritalar\'da Aç' }}</span>
                    </a>
                </div>
            </div>

            {{-- RIGHT: GENERAL INQUIRY CONTACT FORM --}}
            <div class="contact-form-card">
                <div class="form-card-title">
                    {{ $isEn ? 'Direct Contact & Consultation' : 'Doğrudan İletişim & Danışma' }}
                </div>
                <div class="form-card-subtitle">
                    {{ $isEn
                        ? 'Fill out the form below for general inquiries, partnership, or technical consultations.'
                        : 'Genel sorularınız, kurumsal iş birliği veya teknik danışma için aşağıdaki formu doldurabilirsiniz.'
                    }}
                </div>

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div>
                            <label for="contact_name" class="contact-field-label">
                                {{ $isEn ? 'Full Name' : 'Yetkili Adı Soyadı' }} <span class="req">*</span>
                            </label>
                            <input type="text" name="name" id="contact_name" class="contact-field-input" required value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="contact_email" class="contact-field-label">
                                {{ $isEn ? 'Official Email' : 'Kurumsal E-posta' }} <span class="req">*</span>
                            </label>
                            <input type="email" name="email" id="contact_email" class="contact-field-input" required value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div>
                            <label for="contact_phone" class="contact-field-label">
                                {{ $isEn ? 'Phone Number' : 'Telefon Numarası' }}
                            </label>
                            <input type="text" name="phone" id="contact_phone" class="contact-field-input" value="{{ old('phone') }}">
                        </div>
                        <div>
                            <label for="contact_company" class="contact-field-label">
                                {{ $isEn ? 'Company / Institution' : 'Kurum / Firma Adı' }}
                            </label>
                            <input type="text" name="company" id="contact_company" class="contact-field-input" value="{{ old('company') }}">
                        </div>
                    </div>

                    <div class="contact-field-group">
                        <label for="contact_subject" class="contact-field-label">
                            {{ $isEn ? 'Subject' : 'Konu' }}
                        </label>
                        <select name="subject" id="contact_subject" class="contact-field-select">
                            <option value="{{ $isEn ? 'General Consultation' : 'Genel Danışma' }}">{{ $isEn ? 'General Consultation' : 'Genel Danışma' }}</option>
                            <option value="{{ $isEn ? 'Technical Support & Systems' : 'Teknik Destek & Sistemler' }}">{{ $isEn ? 'Technical Support & Systems' : 'Teknik Destek & Sistemler' }}</option>
                            <option value="{{ $isEn ? 'Facility Visit & Auditing' : 'Tesis Ziyareti & Denetim' }}">{{ $isEn ? 'Facility Visit & Auditing' : 'Tesis Ziyareti & Denetim' }}</option>
                            <option value="{{ $isEn ? 'Partnership & Procurement' : 'Kurumsal İş Birliği & Tedarik' }}">{{ $isEn ? 'Partnership & Procurement' : 'Kurumsal İş Birliği & Tedarik' }}</option>
                            <option value="{{ $isEn ? 'Other' : 'Diğer' }}">{{ $isEn ? 'Other' : 'Diğer' }}</option>
                        </select>
                    </div>

                    <div class="contact-field-group">
                        <label for="contact_message" class="contact-field-label">
                            {{ $isEn ? 'Your Message' : 'Mesajınız' }} <span class="req">*</span>
                        </label>
                        <textarea name="message" id="contact_message" rows="5" class="contact-field-textarea" required>{{ old('message') }}</textarea>
                    </div>

                    <div style="margin-top: 1.5rem;">
                        <button type="submit" class="btn-contact-submit">
                            <i class="bi bi-send-fill"></i>
                            <span>{{ $isEn ? 'Send Message' : 'Mesajı Gönder' }}</span>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
