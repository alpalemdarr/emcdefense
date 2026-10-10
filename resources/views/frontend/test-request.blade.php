@php
    $isEn = app()->getLocale() === 'en';
    $pageTitle = $isEn ? 'Official Test Request Form (FR 7.1.4) – EMC Test & Defence' : 'Deney Talep Formu (FR 7.1.4) – EMC Test & Savunma';
@endphp
@extends('frontend.layout')
@section('title', $pageTitle)

@push('styles')
<style>
    /* ── PAGE BACKGROUND: REALISTIC BRUSHED STEEL VERTICAL TEXTURE ── */
    .test-form-wrapper {
        background-color: #8C96A0;
        background-image: 
            repeating-linear-gradient(
                90deg,
                rgba(255, 255, 255, 0.06) 0px,
                rgba(0, 0, 0, 0.08) 1px,
                rgba(255, 255, 255, 0.03) 2px,
                rgba(0, 0, 0, 0.05) 3px,
                transparent 4px,
                transparent 6px
            ),
            linear-gradient(
                90deg,
                #5E6872 0%,
                #7F8A94 10%,
                #9CA7B1 22%,
                #6B757F 36%,
                #8B96A0 50%,
                #5D6771 64%,
                #848F99 76%,
                #9BA6B0 88%,
                #69737D 100%
            );
        background-attachment: fixed;
        padding: 3rem 1rem 6rem;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    /* ── FORM CONTAINER SHEET ── */
    .test-form-container {
        width: 100%;
        max-width: 800px;
        background: #FFFFFF;
        border-radius: 6px;
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.28), 0 1px 3px rgba(0, 0, 0, 0.12);
        padding: 3rem 3.5rem 3.5rem;
        position: relative;
    }

    @media (max-width: 768px) {
        .test-form-wrapper { padding: 1.25rem 0.5rem 3rem; }
        .test-form-container { padding: 1.75rem 1.25rem 2.5rem; border-radius: 4px; }
    }

    /* ── HEADER AREA ── */
    .test-header-area {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .test-form-title {
        text-align: center;
        font-family: var(--font-head, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif);
        font-size: 2.35rem;
        font-weight: 700;
        color: #2F80ED;
        margin: 0 0 1.25rem 0;
        letter-spacing: -0.01em;
    }

    @media (max-width: 600px) {
        .test-form-title { font-size: 1.85rem; }
    }

    .test-title-divider {
        height: 1.5px;
        background: #BFDBFE;
        width: 100%;
        margin-bottom: 1.75rem;
    }

    .test-doc-meta {
        text-align: right;
        font-family: var(--font-mono, "Segoe UI", Roboto, monospace);
        font-size: 0.96rem;
        font-weight: 700;
        color: #2F80ED;
        line-height: 1.55;
        margin-bottom: 2rem;
    }

    .test-doc-meta span {
        font-weight: 700;
        color: #2F80ED;
    }

    /* ── FORM GROUPS & LABELS ── */
    .test-form-group {
        margin-bottom: 1.35rem;
    }

    .test-label {
        display: block;
        font-size: 0.98rem;
        font-weight: 700;
        color: #2F80ED;
        margin-bottom: 0.35rem;
    }

    .test-label .req {
        color: #EF4444;
        font-weight: 800;
        margin-left: 2px;
    }

    .test-sub-label {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: #0284C7;
        margin-top: 0.35rem;
    }

    /* ── INPUTS & SELECTS ── */
    .test-input,
    .test-select,
    .test-textarea {
        width: 100%;
        background: #FFFFFF;
        border: 1px solid #CBD5E1;
        border-radius: 6px;
        padding: 0.55rem 0.85rem;
        font-size: 0.95rem;
        color: #0F172A;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.04);
        box-sizing: border-box;
    }

    .test-input:focus,
    .test-select:focus,
    .test-textarea:focus {
        outline: none;
        border-color: #2F80ED;
        box-shadow: 0 0 0 3px rgba(47, 128, 237, 0.18);
    }

    .test-select {
        cursor: pointer;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%232F80ED' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 11px;
        padding-right: 2rem;
        appearance: none;
        -webkit-appearance: none;
    }

    /* ── DUAL NUMBER INPUTS: Besleme Gerilimi & Faz başına çektiği akım ── */
    .test-dual-inputs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    @media (max-width: 600px) {
        .test-dual-inputs { grid-template-columns: 1fr; gap: 0.75rem; }
    }

    /* ── 3-COLUMN ROW: Ürün Standardı, Kullanım Alanı *, Çalışma Modu ── */
    .test-grid-3 {
        display: grid;
        grid-template-columns: 1fr 1.35fr 1fr;
        gap: 1.15rem;
    }

    @media (max-width: 768px) {
        .test-grid-3 { grid-template-columns: 1fr; gap: 1rem; }
    }

    /* ── ELEKTRONİK DEVRE & AC/DC TOGGLE ROW ── */
    .test-grid-devre {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 1.25rem;
        align-items: start;
    }

    @media (max-width: 600px) {
        .test-grid-devre { grid-template-columns: 1fr; gap: 1rem; }
    }

    /* ── AC / DC SEGMENTED BUTTONS ── */
    .test-power-toggle {
        display: flex;
        border: 1px solid #CBD5E1;
        border-radius: 6px;
        background: #F8FAFC;
        overflow: hidden;
        height: 38px;
        width: 100%;
        max-width: 220px;
        box-sizing: border-box;
    }

    .test-power-toggle input[type="radio"] {
        display: none;
    }

    .test-power-toggle .toggle-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.95rem;
        color: #475569;
        cursor: pointer;
        transition: all 0.15s ease;
        margin: 0;
        border-right: 1px solid #CBD5E1;
        background: #FFFFFF;
        user-select: none;
    }

    .test-power-toggle .toggle-btn:last-child {
        border-right: none;
    }

    .test-power-toggle input[type="radio"]:checked + .toggle-btn {
        background: #2F80ED;
        color: #FFFFFF;
    }

    /* ── CİHAZIN BOYUTLARI ── */
    .test-dim-wrap {
        max-width: 250px;
    }

    @media (max-width: 600px) {
        .test-dim-wrap { max-width: 100%; }
    }

    /* ── RESİM, DATASHEET ROW & BUTTON ── */
    .test-upload-row {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin-top: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .test-file-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
    }

    .test-file-btn {
        background: #2F80ED;
        color: #FFFFFF;
        font-size: 0.95rem;
        font-weight: 700;
        padding: 0.65rem 2.2rem;
        border-radius: 6px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        box-shadow: 0 2px 6px rgba(47, 128, 237, 0.25);
        transition: background 0.15s ease, transform 0.1s ease;
        margin: 0;
    }

    .test-file-btn:hover {
        background: #1E70BF;
        transform: translateY(-1px);
    }

    .test-file-name {
        font-size: 0.88rem;
        color: #64748B;
        font-style: italic;
    }

    /* ── REQUESTER CONTACT INFORMATION ── */
    .test-contact-card {
        background: #F8FAFC;
        border: 1px dashed #CBD5E1;
        border-radius: 8px;
        padding: 1.5rem 1.75rem;
        margin-top: 2rem;
        margin-bottom: 2rem;
    }

    .test-contact-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 1.1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .test-contact-title i {
        color: #2F80ED;
    }

    .test-contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.1rem;
    }

    @media (max-width: 600px) {
        .test-contact-grid { grid-template-columns: 1fr; }
    }

    .test-label-sm {
        display: block;
        font-size: 0.88rem;
        font-weight: 700;
        color: #334155;
        margin-bottom: 0.35rem;
    }

    .test-label-sm .req {
        color: #EF4444;
    }

    /* ── SUBMIT BUTTON ── */
    .test-submit-area {
        text-align: center;
        margin-top: 2.5rem;
    }

    .test-submit-btn {
        background: linear-gradient(135deg, #2F80ED 0%, #1E70BF 100%);
        color: #FFFFFF;
        border: none;
        padding: 0.95rem 3.2rem;
        font-size: 1.05rem;
        font-weight: 700;
        border-radius: 6px;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(47, 128, 237, 0.35);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
    }

    .test-submit-btn:hover {
        background: linear-gradient(135deg, #1E70BF 0%, #155B9F 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(47, 128, 237, 0.45);
    }

    /* ── SENIOR CRAFTSMANSHIP: TEST REQUEST FORM DARK THEME OVERRIDES ── */
    [data-theme="dark"] .test-form-wrapper {
        background-color: #070B14 !important;
        background-image: 
            repeating-linear-gradient(
                90deg,
                rgba(255, 255, 255, 0.02) 0px,
                rgba(0, 0, 0, 0.25) 1px,
                rgba(255, 255, 255, 0.01) 2px,
                rgba(0, 0, 0, 0.15) 3px,
                transparent 4px,
                transparent 6px
            ),
            linear-gradient(
                90deg,
                #050810 0%,
                #0A0F1D 15%,
                #0F172A 30%,
                #0A0F1D 50%,
                #0F172A 70%,
                #0A0F1D 85%,
                #050810 100%
            ) !important;
    }
    [data-theme="dark"] .test-form-container {
        background: #0F172A !important;
        border: 1px solid #1E293B !important;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8) !important;
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .test-form-title {
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .test-title-divider {
        background: #1E293B !important;
    }
    [data-theme="dark"] .test-doc-meta {
        color: #60A5FA !important;
    }
    [data-theme="dark"] .test-doc-meta span {
        color: #93C5FD !important;
    }
    [data-theme="dark"] .test-label {
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .test-sub-label {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .test-input,
    [data-theme="dark"] .test-select,
    [data-theme="dark"] .test-textarea {
        background: #131C31 !important;
        border-color: #334155 !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .test-input:focus,
    [data-theme="dark"] .test-select:focus,
    [data-theme="dark"] .test-textarea:focus {
        border-color: #38BDF8 !important;
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2) !important;
    }
    [data-theme="dark"] .test-power-toggle {
        background: #131C31 !important;
        border-color: #334155 !important;
    }
    [data-theme="dark"] .test-power-toggle .toggle-btn {
        background: #131C31 !important;
        color: #94A3B8 !important;
        border-right-color: #334155 !important;
    }
    [data-theme="dark"] .test-power-toggle input[type="radio"]:checked + .toggle-btn {
        background: #2563EB !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .test-file-btn {
        background: #2563EB !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .test-file-btn:hover {
        background: #1D4ED8 !important;
    }
    [data-theme="dark"] .test-file-name {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .test-contact-card {
        background: #11192E !important;
        border-color: #334155 !important;
    }
    [data-theme="dark"] .test-contact-title {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .test-contact-title i {
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .test-label-sm {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .test-submit-btn {
        background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%) !important;
    }
</style>
@endpush

@section('content')
<div class="test-form-wrapper">
    <div class="test-form-container">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 p-3 rounded-3" role="alert" style="background:#ECFDF5; border:1px solid #A7F3D0; color:#065F46; font-size:0.95rem;">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-check-circle-fill fs-5" style="color:#059669;"></i>
                    <div>
                        <strong>{{ $isEn ? 'Success!' : 'Talebiniz Alındı!' }}</strong>
                        <div>{{ session('success') }}</div>
                    </div>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mb-4 p-3 rounded-3" style="background:#FEF2F2; border:1px solid #FECACA; color:#991B1B; font-size:0.92rem;">
                <strong><i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $isEn ? 'Please correct the errors below:' : 'Lütfen aşağıdaki alanları kontrol ediniz:' }}</strong>
                <ul class="mb-0 mt-2 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM HEADER (MATCHING USER SCREENSHOT) --}}
        <div class="test-header-area">
            <h1 class="test-form-title">{{ $isEn ? \App\Models\Setting::get('test_form_title_en', 'Test Request Form') : \App\Models\Setting::get('test_form_title_tr', 'Deney Talep Formu') }}</h1>
            <div class="test-title-divider"></div>
            <div class="test-doc-meta">
                <div>Doküman No: <span>{{ \App\Models\Setting::get('test_form_doc_no', 'FR 7.1.4') }}</span></div>
                <div>Revizyon No: <span>{{ \App\Models\Setting::get('test_form_rev_no', '00') }}</span></div>
                {{-- DİNAMİK GÜNCEL TARİH: Her gün otomatik olarak bugünün tarihini gösterir --}}
                <div>Revizyon Tarihi: <span>{{ now()->format('d.m.Y') }}</span></div>
            </div>
        </div>

        {{-- THE OFFICIAL TEST REQUEST FORM (FR 7.1.4) --}}
        <form action="{{ route('test-request.send') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- 1. Cihazın Adı * --}}
            <div class="test-form-group">
                <label for="device_name" class="test-label">
                    {{ $isEn ? 'Equipment Name' : 'Cihazın Adı' }} <span class="req">*</span>
                </label>
                <input type="text" name="device_name" id="device_name" class="test-input" required value="{{ old('device_name', request('device', '')) }}">
            </div>

            {{-- 2. Marka / Model * --}}
            <div class="test-form-group">
                <label for="brand_model" class="test-label">
                    {{ $isEn ? 'Make / Model' : 'Marka / Model' }} <span class="req">*</span>
                </label>
                <input type="text" name="brand_model" id="brand_model" class="test-input" required value="{{ old('brand_model') }}">
            </div>

            {{-- 3. Cihazın * (Besleme Gerilimi & Faz başına çektiği akım) --}}
            <div class="test-form-group">
                <label class="test-label">
                    {{ $isEn ? 'Equipment Specifications' : 'Cihazın' }} <span class="req">*</span>
                </label>
                <div class="test-dual-inputs">
                    <div>
                        <input type="number" step="any" name="voltage" id="voltage" class="test-input" value="{{ old('voltage', '0') }}">
                        <span class="test-sub-label">{{ $isEn ? 'Supply Voltage' : 'Besleme Gerilimi' }}</span>
                    </div>
                    <div>
                        <input type="number" step="any" name="current" id="current" class="test-input" value="{{ old('current', '0') }}">
                        <span class="test-sub-label">{{ $isEn ? 'Current Drawn Per Phase' : 'Faz başına çektiği akım' }}</span>
                    </div>
                </div>
            </div>

            {{-- 4. Ürün Standardı, Kullanım Alanı *, Çalışma Modu --}}
            <div class="test-grid-3">
                <div class="test-form-group">
                    <label for="product_standard" class="test-label">
                        {{ $isEn ? 'Product Standard' : 'Ürün Standardı' }}
                    </label>
                    <input type="text" name="product_standard" id="product_standard" class="test-input" value="{{ old('product_standard') }}">
                </div>

                <div class="test-form-group">
                    <label for="usage_area" class="test-label">
                        {{ $isEn ? 'Usage Area' : 'Kullanım Alanı' }} <span class="req">*</span>
                    </label>
                    <select name="usage_area" id="usage_area" class="test-select" required>
                        <option value="" disabled {{ old('usage_area') ? '' : 'selected' }}></option>
                        <option value="EV" {{ old('usage_area') == 'EV' ? 'selected' : '' }}>EV</option>
                        <option value="OFİS" {{ old('usage_area') == 'OFİS' ? 'selected' : '' }}>OFİS</option>
                        <option value="ENDÜSTRİYEL" {{ old('usage_area') == 'ENDÜSTRİYEL' ? 'selected' : '' }}>ENDÜSTRİYEL</option>
                        <option value="TIBBİ" {{ old('usage_area') == 'TIBBİ' ? 'selected' : '' }}>TIBBİ</option>
                        <option value="ASKERİ" {{ old('usage_area') == 'ASKERİ' ? 'selected' : '' }}>ASKERİ</option>
                        <option value="OTOMOTİV" {{ old('usage_area') == 'OTOMOTİV' ? 'selected' : '' }}>OTOMOTİV</option>
                        <option value="DİĞER (Cihaz Tanımında Belirtiniz.)" {{ old('usage_area') == 'DİĞER (Cihaz Tanımında Belirtiniz.)' ? 'selected' : '' }}>DİĞER (Cihaz Tanımında Belirtiniz.)</option>
                    </select>
                </div>

                <div class="test-form-group">
                    <label for="operation_mode" class="test-label">
                        {{ $isEn ? 'Operating Mode' : 'Çalışma Modu' }}
                    </label>
                    <select name="operation_mode" id="operation_mode" class="test-select">
                        <option value="" {{ old('operation_mode') ? '' : 'selected' }}></option>
                        <option value="Sürekli" {{ old('operation_mode') == 'Sürekli' ? 'selected' : '' }}>{{ $isEn ? 'Continuous' : 'Sürekli' }}</option>
                        <option value="Kesintili" {{ old('operation_mode') == 'Kesintili' ? 'selected' : '' }}>{{ $isEn ? 'Intermittent' : 'Kesintili' }}</option>
                        <option value="Standby (Bekleme)" {{ old('operation_mode') == 'Standby (Bekleme)' ? 'selected' : '' }}>{{ $isEn ? 'Standby' : 'Standby (Bekleme)' }}</option>
                        <option value="Döngüsel / Periyodik" {{ old('operation_mode') == 'Döngüsel / Periyodik' ? 'selected' : '' }}>{{ $isEn ? 'Cyclic / Periodic' : 'Döngüsel / Periyodik' }}</option>
                        <option value="Diğer" {{ old('operation_mode') == 'Diğer' ? 'selected' : '' }}>{{ $isEn ? 'Other' : 'Diğer' }}</option>
                    </select>
                </div>
            </div>

            {{-- 5. Elektronik Devre * & AC / DC toggle * --}}
            <div class="test-grid-devre">
                <div class="test-form-group">
                    <label for="electronic_circuit" class="test-label">
                        {{ $isEn ? 'Electronic Circuit' : 'Elektronik Devre' }} <span class="req">*</span>
                    </label>
                    <select name="electronic_circuit" id="electronic_circuit" class="test-select" required>
                        <option value="" disabled {{ old('electronic_circuit') ? '' : 'selected' }}></option>
                        <option value="Var" {{ old('electronic_circuit') == 'Var' ? 'selected' : '' }}>Var</option>
                        <option value="Yok" {{ old('electronic_circuit') == 'Yok' ? 'selected' : '' }}>Yok</option>
                        <option value="Mikroişlemcili" {{ old('electronic_circuit') == 'Mikroişlemcili' ? 'selected' : '' }}>Mikroişlemcili</option>
                        <option value="Analog" {{ old('electronic_circuit') == 'Analog' ? 'selected' : '' }}>Analog</option>
                        <option value="Sayısal" {{ old('electronic_circuit') == 'Sayısal' ? 'selected' : '' }}>Sayısal</option>
                        <option value="Güç Elektroniği" {{ old('electronic_circuit') == 'Güç Elektroniği' ? 'selected' : '' }}>Güç Elektroniği</option>
                    </select>
                </div>

                <div class="test-form-group">
                    <label class="test-label"><span class="req">*</span></label>
                    <div class="test-power-toggle">
                        <input type="radio" name="power_type" id="power_ac" value="AC" {{ old('power_type', 'AC') == 'AC' ? 'checked' : '' }} required>
                        <label for="power_ac" class="toggle-btn">AC</label>

                        <input type="radio" name="power_type" id="power_dc" value="DC" {{ old('power_type') == 'DC' ? 'checked' : '' }}>
                        <label for="power_dc" class="toggle-btn">DC</label>
                    </div>
                </div>
            </div>

            {{-- 6. Giriş/Çıkış konnektörleri --}}
            <div class="test-form-group">
                <label for="connectors" class="test-label">
                    {{ $isEn ? 'Input / Output Connectors' : 'Giriş/Çıkış konnektörleri' }}
                </label>
                <input type="text" name="connectors" id="connectors" class="test-input" value="{{ old('connectors') }}">
            </div>

            {{-- 7. Cihazın Boyutları --}}
            <div class="test-form-group">
                <label for="dimensions" class="test-label">
                    {{ $isEn ? 'Equipment Dimensions' : 'Cihazın Boyutları' }}
                </label>
                <div class="test-dim-wrap">
                    <input type="text" name="dimensions" id="dimensions" class="test-input" value="{{ old('dimensions') }}">
                    <span class="test-sub-label">{{ $isEn ? 'Specify as WIDTH x LENGTH x HEIGHT.' : 'EN x BOY x YÜKSEKLİK şeklinde belirtiniz.' }}</span>
                </div>
            </div>

            {{-- 8. Cihazın Tanımı * --}}
            <div class="test-form-group">
                <label for="device_description" class="test-label">
                    {{ $isEn ? 'Equipment Description' : 'Cihazın Tanımı' }} <span class="req">*</span>
                </label>
                <textarea name="device_description" id="device_description" class="test-textarea" rows="4" required>{{ old('device_description') }}</textarea>
            </div>

            {{-- 9. Resim, Datasheet --}}
            <div class="test-upload-row">
                <label class="test-label mb-0" style="min-width: 140px;">
                    {{ $isEn ? 'Image, Datasheet' : 'Resim, Datasheet' }}
                </label>
                <div>
                    <input type="file" name="attachment" id="attachmentInput" class="test-file-hidden" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.webp,.zip">
                    <label for="attachmentInput" class="test-file-btn">
                        {{ $isEn ? 'Choose File' : 'Dosya Seç' }}
                    </label>
                    <span id="fileNameDisplay" class="test-file-name ms-2">{{ $isEn ? 'No file selected' : 'Dosya seçilmedi' }}</span>
                </div>
            </div>

            {{-- 10. TALEP EDEN İLETİŞİM BİLGİLERİ --}}
            <div class="test-contact-card">
                <div class="test-contact-title">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>{{ $isEn ? 'Requester & Contact Information' : 'Talep Eden İletişim Bilgileri' }}</span>
                </div>
                <div class="test-contact-grid">
                    <div>
                        <label for="name" class="test-label-sm">
                            {{ $isEn ? 'Contact Person Name' : 'Yetkili Adı Soyadı' }} <span class="req">*</span>
                        </label>
                        <input type="text" name="name" id="name" class="test-input" required value="{{ old('name') }}">
                    </div>

                    <div>
                        <label for="company" class="test-label-sm">
                            {{ $isEn ? 'Company / Organization' : 'Kurum / Firma Adı' }}
                        </label>
                        <input type="text" name="company" id="company" class="test-input" value="{{ old('company') }}">
                    </div>

                    <div>
                        <label for="email" class="test-label-sm">
                            {{ $isEn ? 'Official Email' : 'Kurumsal E-posta' }} <span class="req">*</span>
                        </label>
                        <input type="email" name="email" id="email" class="test-input" required value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="phone" class="test-label-sm">
                            {{ $isEn ? 'Phone Number' : 'Telefon Numarası' }} <span class="req">*</span>
                        </label>
                        <input type="text" name="phone" id="phone" class="test-input" required value="{{ old('phone') }}">
                    </div>
                </div>
            </div>

            {{-- 11. SUBMIT BUTTON --}}
            <div class="test-submit-area">
                <button type="submit" class="test-submit-btn">
                    <i class="bi bi-send-fill"></i>
                    <span>{{ $isEn ? \App\Models\Setting::get('test_form_submit_btn_en', 'Submit Test Request') : \App\Models\Setting::get('test_form_submit_btn_tr', 'Deney Talebini Gönder') }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('attachmentInput');
        const fileNameDisplay = document.getElementById('fileNameDisplay');
        if (fileInput && fileNameDisplay) {
            fileInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    fileNameDisplay.textContent = this.files[0].name;
                    fileNameDisplay.style.color = '#2F80ED';
                    fileNameDisplay.style.fontWeight = '600';
                } else {
                    fileNameDisplay.textContent = '{{ $isEn ? "No file selected" : "Dosya seçilmedi" }}';
                    fileNameDisplay.style.color = '#64748B';
                    fileNameDisplay.style.fontWeight = 'normal';
                }
            });
        }
    });
</script>
@endsection
