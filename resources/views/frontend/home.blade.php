@php
    $isEn = app()->getLocale() === 'en';
    $flagship = $categories->flatMap->activeProducts->firstWhere('id', 2) 
             ?: $categories->flatMap->activeProducts->firstWhere('video_path', '!=', null) 
             ?: $categories->flatMap->activeProducts->first();
@endphp
@extends('frontend.layout')
@section('title', $isEn ? 'EMC Defense – Advanced Military Shielding & Systems' : 'EMC Defense – Askeri Standartlarda Elektromanyetik Kalkanlama & Savunma Sistemleri')

@push('styles')
<style>
    /* ── CORPORATE WHITE & LOGO BLUE PALETTE ── */
    :root {
        --hero-bg: #FFFFFF;
        --card-bg: #FFFFFF;
        --card-border: #E2E8F0;
        --card-hover-border: var(--brand-primary);
    }

    body {
        background-color: var(--bg-body) !important;
        color: var(--text-body) !important;
    }

    /* ── 1. CORPORATE DEFENSE HERO ── */
    .corporate-hero-clean {
        position: relative;
        background: radial-gradient(circle at 65% 25%, rgba(30, 45, 125, 0.04) 0%, transparent 60%),
                    linear-gradient(180deg, var(--bg-alt) 0%, var(--bg-body) 100%);
        padding: 4.5rem 0 3.5rem;
        overflow: hidden;
        border-bottom: 1px solid var(--border-light);
    }
    .corporate-hero-clean::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(rgba(30, 45, 125, 0.035) 1px, transparent 1px),
            linear-gradient(90deg, rgba(30, 45, 125, 0.035) 1px, transparent 1px);
        background-size: 44px 44px;
        mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, black 20%, transparent 80%);
        -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, black 20%, transparent 80%);
        pointer-events: none;
        z-index: 1;
    }

    .hero-center-content {
        max-width: 1040px;
        margin: 0 auto;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 3;
    }


    .hero-telemetry-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
        font-family: var(--font-mono);
        font-size: 0.68rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #1E2D7D;
        background: rgba(239, 246, 255, 0.85);
        border: 1px solid rgba(191, 219, 254, 0.85);
        padding: 0.3rem 0.85rem;
        border-radius: var(--r-xs);
        margin-bottom: 0.85rem;
        box-shadow: 0 1px 4px rgba(30, 45, 125, 0.04);
    }

    .hero-badge-clean {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: var(--font-head);
        font-size: 0.76rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: var(--brand-primary);
        background: #EFF6FF;
        border: 1px solid #BFDBFE;
        padding: 0.45rem 1rem;
        border-radius: 50px;
        margin-bottom: 1.25rem;
        box-shadow: 0 2px 8px rgba(30, 45, 125, 0.08);
    }

    .hero-headline-clean {
        font-family: var(--font-head);
        font-size: clamp(1.85rem, 4.5vw, 3.85rem);
        font-weight: 800;
        line-height: 1.18;
        letter-spacing: -0.028em;
        color: #0F172A;
        margin-bottom: 1.5rem;
        max-width: 960px;
        margin-left: auto;
        margin-right: auto;
    }
    .hero-headline-clean .gradient-accent {
        background: linear-gradient(135deg, var(--brand-primary) 0%, #2563EB 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-desc-clean {
        font-size: 1.12rem;
        color: #475569;
        line-height: 1.8;
        max-width: 780px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 2.25rem;
    }

    .hero-actions-clean {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2.25rem;
    }
    .btn-hero-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.85rem 1.85rem;
        font-family: var(--font-head);
        font-size: 0.95rem;
        font-weight: 700;
        color: #FFFFFF;
        background: var(--brand-primary);
        border: 1px solid var(--brand-primary);
        border-radius: var(--r-sm);
        box-shadow: 0 4px 16px rgba(30, 45, 125, 0.25);
        transition: all var(--tr);
        text-decoration: none;
    }
    .btn-hero-primary:hover {
        background: var(--brand-hover);
        border-color: var(--brand-hover);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(30, 45, 125, 0.35);
        color: #FFFFFF;
    }
    .btn-hero-outline {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.85rem 1.75rem;
        font-family: var(--font-head);
        font-size: 0.95rem;
        font-weight: 600;
        color: #0F172A;
        background: #FFFFFF;
        border: 1.5px solid var(--border-med);
        border-radius: var(--r-sm);
        transition: all var(--tr);
        text-decoration: none;
        cursor: pointer;
    }
    .btn-hero-outline:hover {
        border-color: var(--brand-primary);
        color: var(--brand-primary);
        background: #F8FAFC;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
    }
    .btn-hero-dashed {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.85rem 1.75rem;
        font-family: var(--font-head);
        font-size: 0.95rem;
        font-weight: 600;
        color: #334155;
        background: #F8FAFC;
        border: 1px dashed var(--border-med);
        border-radius: var(--r-sm);
        transition: all var(--tr);
        text-decoration: none;
    }
    .btn-hero-dashed:hover {
        border-color: var(--brand-primary);
        color: var(--brand-primary);
        background: #FFFFFF;
    }


    .btn-act-inspect {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.45rem;
        padding: 0.65rem 1rem;
        font-family: var(--font-head);
        font-size: 0.85rem;
        font-weight: 600;
        color: #0F172A;
        background: #F1F5F9;
        border: 1px solid var(--border-light);
        border-radius: var(--r-sm);
        transition: all var(--tr);
        text-decoration: none;
    }
    .btn-act-inspect:hover {
        background: #E2E8F0;
        color: var(--brand-primary);
    }
    .btn-act-rfq {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.45rem;
        padding: 0.65rem 1rem;
        font-family: var(--font-head);
        font-size: 0.85rem;
        font-weight: 700;
        color: #FFFFFF;
        background: var(--brand-primary);
        border: 1px solid var(--brand-primary);
        border-radius: var(--r-sm);
        transition: all var(--tr);
        cursor: pointer;
    }
    .btn-act-rfq:hover {
        background: var(--brand-hover);
        color: #FFFFFF;
    }

    /* ── 2. STATS & PARTNERS CONSOLE ── */
    .console-wrap {
        position: relative;
        margin-top: -2.5rem;
        z-index: 10;
        padding: 0 1.5rem;
        max-width: 1380px;
        margin-left: auto;
        margin-right: auto;
    }
    .console-clean-card {
        background: #FFFFFF;
        border: 1px solid var(--border-light);
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        padding: 1.5rem 2rem;
        display: grid;
        grid-template-columns: 1.35fr 1px 1.15fr;
        gap: 2rem;
        align-items: center;
    }
    @media (max-width: 1080px) {
        .console-clean-card {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            padding: 1.5rem;
        }
        .console-divider { display: none; }
    }
    .console-stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
    }
    @media (max-width: 680px) {
        .console-stats-grid { grid-template-columns: repeat(2, 1fr); gap: 1rem; }
    }
    .c-stat-box {
        display: flex;
        align-items: center;
        gap: 0.85rem;
    }
    .c-stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #EFF6FF;
        color: var(--brand-primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
        border: 1px solid #DBEAFE;
    }
    .c-stat-text {
        display: flex;
        flex-direction: column;
    }
    .c-stat-val {
        font-family: var(--font-head);
        font-size: 1.55rem;
        font-weight: 800;
        color: var(--brand-primary);
        line-height: 1.1;
    }
    .c-stat-lbl {
        font-size: 0.72rem;
        color: var(--text-muted);
        font-weight: 600;
        margin-top: 0.15rem;
    }
    .console-divider {
        background: var(--border-light);
        height: 100%;
        min-height: 50px;
    }
    .console-logos-track {
        overflow: hidden;
        position: relative;
        width: 100%;
        max-width: 100%;
        contain: paint;
    }
    .console-logos-track::before,
    .console-logos-track::after {
        content: '';
        position: absolute;
        top: 0; bottom: 0;
        width: 40px;
        z-index: 2;
        pointer-events: none;
    }
    .console-logos-track::before {
        left: 0;
        background: linear-gradient(90deg, #FFFFFF, transparent);
    }
    .console-logos-track::after {
        right: 0;
        background: linear-gradient(-90deg, #FFFFFF, transparent);
    }
    .console-slider-inner {
        display: flex;
        align-items: center;
        gap: 2rem;
        animation: marquee-scroll 28s linear infinite;
        width: max-content;
    }
    .console-slider-inner:hover {
        animation-play-state: paused;
    }
    .console-logo-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 48px;
        padding: 0.4rem 1rem;
        background: #F8FAFC;
        border: 1px solid var(--border-light);
        border-radius: var(--r-sm);
        transition: all var(--tr);
        text-decoration: none;
    }
    .console-logo-link:hover {
        background: #FFFFFF;
        border-color: var(--brand-primary);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 45, 125, 0.08);
    }
    .console-logo-link img {
        max-height: 32px;
        width: auto;
        max-width: 120px;
        object-fit: contain;
    }
    .console-logo-link span {
        font-family: var(--font-head);
        font-size: 0.8rem;
        font-weight: 700;
        color: #0F172A;
    }

    /* ── 3. SHARED CORPORATE SECTION STYLES ── */
    .section-clean {
        padding: 5.5rem 0;
        position: relative;
    }
    .section-tag-clean {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: var(--font-head);
        font-size: 0.74rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.14em;
        color: var(--brand-primary);
        background: #EFF6FF;
        border: 1px solid #DBEAFE;
        padding: 0.35rem 0.9rem;
        border-radius: 50px;
        margin-bottom: 0.85rem;
    }
    .section-title-clean {
        font-family: var(--font-head);
        font-size: clamp(1.9rem, 2.8vw + 0.3rem, 2.7rem);
        font-weight: 800;
        color: #0F172A;
        letter-spacing: -0.025em;
        line-height: 1.2;
        margin-bottom: 0.85rem;
    }
    .section-lead-clean {
        font-size: 1.05rem;
        color: #64748B;
        max-width: 68ch;
        line-height: 1.7;
        margin-bottom: 3rem;
    }

    /* ── 4. CORE CAPABILITIES (4 Disciplines) ── */
    .capabilities-grid-clean {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
    @media (max-width: 900px) {
        .capabilities-grid-clean { grid-template-columns: 1fr; }
    }
    .capability-card-clean {
        background: #FFFFFF;
        border: 1px solid var(--border-light);
        border-radius: 14px;
        padding: 2.25rem;
        transition: all var(--tr);
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        position: relative;
    }
    .capability-card-clean:hover {
        border-color: var(--brand-primary);
        box-shadow: 0 16px 36px rgba(30, 45, 125, 0.09);
        transform: translateY(-4px);
    }
    .capability-num-clean {
        font-family: var(--font-mono);
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        color: var(--brand-primary);
        display: block;
        margin-bottom: 0.65rem;
    }
    .capability-title-clean {
        font-family: var(--font-head);
        font-size: 1.3rem;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 0.85rem;
    }
    .capability-desc-clean {
        font-size: 0.92rem;
        color: #475569;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }
    .capability-specs-list-clean {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 0.65rem;
    }
    .capability-specs-list-clean li {
        display: flex;
        align-items: flex-start;
        gap: 0.65rem;
        font-size: 0.86rem;
        color: #334155;
        font-weight: 500;
        line-height: 1.5;
        padding: 0.4rem 0.6rem;
        margin: 0 -0.6rem;
        border-radius: 6px;
        transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .capability-specs-list-clean li:hover {
        background: #F1F5F9;
        transform: translateX(4px);
        color: #0F172A;
    }
    .capability-specs-list-clean li i {
        color: var(--brand-primary);
        font-size: 1rem;
        margin-top: 0.1rem;
        flex-shrink: 0;
        transition: transform 0.22s ease, color 0.22s ease;
    }
    .capability-specs-list-clean li:hover i {
        color: #2563EB;
        transform: scale(1.15);
    }

    /* ── 5. CORPORATE PRODUCTS CATALOG ── */
    .catalog-header-clean {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 2rem;
        gap: 2rem;
        flex-wrap: wrap;
    }
    .catalog-search-clean {
        position: relative;
        min-width: 340px;
    }
    @media (max-width: 600px) {
        .catalog-search-clean { width: 100%; min-width: auto; }
    }
    .catalog-search-clean i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        font-size: 0.95rem;
    }
    .catalog-search-clean input {
        width: 100%;
        padding: 0.8rem 3.4rem 0.8rem 2.6rem;
        background: #FFFFFF;
        border: 1.5px solid var(--border-med);
        border-radius: var(--r-sm);
        font-family: var(--font-body);
        font-size: 0.9rem;
        color: #0F172A;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .catalog-search-clean input:focus {
        outline: none;
        border-color: #2563EB;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12), 0 4px 12px rgba(30, 45, 125, 0.06);
    }
    .search-kbd-hint {
        position: absolute;
        right: 0.85rem;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }
    .search-kbd-hint kbd {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 2px 7px;
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 700;
        color: #64748B;
        background: #F1F5F9;
        border: 1px solid #CBD5E1;
        border-radius: 4px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }

    /* Category Filter Pills */
    .cat-pills-row-clean {
        display: flex;
        flex-wrap: wrap;
        gap: 0.65rem;
        margin-bottom: 2.5rem;
    }
    .cat-pill-clean {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.55rem 1.15rem;
        background: #F8FAFC;
        border: 1px solid var(--border-light);
        border-radius: 50px;
        font-family: var(--font-head);
        font-size: 0.85rem;
        font-weight: 600;
        color: #475569;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .cat-pill-clean:hover {
        background: #EFF6FF;
        color: var(--brand-primary);
        border-color: #93C5FD;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 45, 125, 0.08);
    }
    .cat-pill-clean.active {
        background: var(--brand-primary);
        color: #FFFFFF;
        border-color: var(--brand-primary);
        box-shadow: 0 4px 14px rgba(30, 45, 125, 0.3);
        transform: translateY(-1px);
    }
    .cat-pill-count-clean {
        font-family: var(--font-mono);
        font-size: 0.72rem;
        font-variant-numeric: tabular-nums;
        padding: 1px 7px;
        background: #E2E8F0;
        border-radius: 50px;
        color: #475569;
        font-weight: 700;
        transition: all 0.2s ease;
    }
    .cat-pill-clean.active .cat-pill-count-clean {
        background: rgba(255, 255, 255, 0.25);
        color: #FFFFFF;
    }

    /* Products Grid */
    .products-grid-clean {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(min(100%, 280px), 1fr));
        gap: 1.75rem;
    }
    .product-card-clean {
        background: #FFFFFF;
        border: 1px solid var(--border-light);
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1),
                    border-color 0.25s ease,
                    box-shadow 0.28s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        position: relative;
    }
    .product-card-clean:hover {
        border-color: #2563EB;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.06), 0 16px 36px -4px rgba(30, 45, 125, 0.12);
        transform: translateY(-5px);
    }
    .product-card-media-clean {
        height: 210px;
        background: #F8FAFC;
        border-bottom: 1px solid var(--border-light);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-card-media-clean img,
    .product-card-media-clean video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: transform;
    }
    .product-card-clean:hover .product-card-media-clean img,
    .product-card-clean:hover .product-card-media-clean video {
        transform: scale(1.04);
    }
    .product-3d-badge-clean {
        position: absolute;
        top: 0.75rem;
        right: 0.75rem;
        background: rgba(30, 45, 125, 0.95);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        color: #FFFFFF;
        font-family: var(--font-mono);
        font-size: 0.65rem;
        font-weight: 800;
        padding: 3px 8px;
        border-radius: 4px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.18);
        display: inline-flex;
        align-items: center;
        gap: 4px;
        z-index: 6;
    }
    .product-body-clean {
        padding: 1.35rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .product-cat-tag-clean {
        font-family: var(--font-head);
        font-size: 0.72rem;
        font-weight: 700;
        color: var(--brand-primary);
        text-transform: uppercase;
        letter-spacing: 0.06em;
        margin-bottom: 0.4rem;
    }
    .product-title-clean {
        font-family: var(--font-head);
        font-size: 1.05rem;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 0.35rem;
        line-height: 1.35;
    }
    .product-title-clean a {
        color: inherit;
        text-decoration: none;
        transition: color var(--tr);
    }
    .product-title-clean a:hover {
        color: #2563EB;
    }
    .product-model-clean {
        font-family: var(--font-mono);
        font-size: 0.75rem;
        color: var(--text-muted);
        margin-bottom: 1rem;
    }
    .product-specs-clean {
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 8px;
        padding: 0.75rem 0.9rem;
        margin-bottom: 1.25rem;
        display: flex;
        flex-direction: column;
        gap: 0.45rem;
    }
    .spec-line-clean {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        font-size: 0.75rem;
        position: relative;
    }
    .spec-line-clean::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 3px;
        border-bottom: 1px dotted #CBD5E1;
        z-index: 1;
    }
    .spec-line-clean .k {
        background: #F8FAFC;
        padding-right: 6px;
        position: relative;
        z-index: 2;
        color: #64748B;
        font-family: var(--font-head);
        font-size: 0.71rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }
    .spec-line-clean .v {
        background: #F8FAFC;
        padding-left: 6px;
        position: relative;
        z-index: 2;
        color: #0F172A;
        font-weight: 700;
        font-family: var(--font-mono);
        font-variant-numeric: tabular-nums;
        text-align: right;
    }
    .product-actions-clean {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.65rem;
        margin-top: auto;
    }



    /* ── 7. MANUFACTURING FACILITY ── */
    .facility-clean-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3.5rem;
        align-items: center;
    }
    @media (max-width: 992px) {
        .facility-clean-grid { grid-template-columns: 1fr; gap: 2.5rem; }
    }
    .facility-media-clean {
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid var(--border-light);
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
    }
    .facility-media-clean img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .facility-points-clean {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }
    .facility-pt-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }
    .facility-pt-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #EFF6FF;
        color: var(--brand-primary);
        border: 1px solid #DBEAFE;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }
    .facility-pt-title {
        font-family: var(--font-head);
        font-size: 1.05rem;
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 0.25rem;
    }
    .facility-pt-desc {
        font-size: 0.88rem;
        color: #64748B;
        line-height: 1.6;
    }

    /* ── 8. CLASSIFIED RFQ CTA BANNER ── */
    .rfq-cta-clean {
        background: linear-gradient(135deg, var(--brand-primary) 0%, #15225E 100%);
        border-radius: 16px;
        padding: 3.5rem 3rem;
        color: #FFFFFF;
        box-shadow: 0 16px 40px rgba(30, 45, 125, 0.2);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2.5rem;
        margin-bottom: 5.5rem;
        position: relative;
        overflow: hidden;
    }
    .rfq-cta-clean::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
        background-size: 24px 24px;
        pointer-events: none;
        opacity: 0.7;
    }
    @media (max-width: 900px) {
        .rfq-cta-clean {
            flex-direction: column;
            align-items: flex-start;
            padding: 2.5rem 2rem;
        }
    }
    .rfq-cta-title-clean {
        font-family: var(--font-head);
        font-size: clamp(1.8rem, 2.5vw, 2.3rem);
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 0.85rem;
        color: #FFFFFF;
    }
    .rfq-cta-desc-clean {
        font-size: 1.02rem;
        color: #E2E8F0;
        line-height: 1.65;
        max-width: 65ch;
    }
    .btn-rfq-banner {
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        padding: 1rem 2.2rem;
        background: #FFFFFF;
        color: var(--brand-primary);
        font-family: var(--font-head);
        font-size: 1rem;
        font-weight: 800;
        border-radius: var(--r-sm);
        border: none;
        cursor: pointer;
        transition: all var(--tr);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
        white-space: nowrap;
    }
    .btn-rfq-banner:hover {
        background: #F8FAFC;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
    }

    /* ── HOME SPECIFIC DARK THEME OVERRIDES ── */
    [data-theme="dark"] .corporate-hero-clean {
        background: radial-gradient(circle at 65% 25%, rgba(37, 99, 235, 0.12) 0%, transparent 60%),
                    linear-gradient(180deg, #070B14 0%, #0F172A 100%) !important;
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .corporate-hero-clean::before {
        background-image: 
            linear-gradient(rgba(59, 130, 246, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(59, 130, 246, 0.05) 1px, transparent 1px);
    }
    [data-theme="dark"] .hero-headline-clean {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .hero-desc-clean {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .hero-badge-clean {
        background: #0F172A !important;
        border-color: #1E293B !important;
        color: #93C5FD !important;
    }
    [data-theme="dark"] .hero-telemetry-tag {
        background: #0F172A !important;
        border-color: #1E293B !important;
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .btn-hero-outline {
        background: #0F172A !important;
        border-color: #334155 !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .btn-hero-outline:hover {
        background: #131C31 !important;
        border-color: #3B82F6 !important;
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .btn-hero-dashed {
        background: #0F172A !important;
        border-color: #334155 !important;
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .btn-hero-dashed:hover {
        background: #131C31 !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .console-clean-card,
    [data-theme="dark"] .domain-stats-clean {
        background: #0F172A !important;
        border-color: #1E293B !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6) !important;
    }
    [data-theme="dark"] .console-divider {
        background: #1E293B !important;
    }
    [data-theme="dark"] .console-logos-track::before {
        background: linear-gradient(90deg, #0F172A, transparent) !important;
    }
    [data-theme="dark"] .console-logos-track::after {
        background: linear-gradient(-90deg, #0F172A, transparent) !important;
    }
    [data-theme="dark"] .console-logo-link {
        background: #FFFFFF !important;
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .console-logo-link:hover {
        background: #FFFFFF !important;
        border-color: #3B82F6 !important;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25) !important;
    }
    [data-theme="dark"] .console-logo-link span {
        color: #0F172A !important;
    }
    [data-theme="dark"] .c-stat-icon {
        background: rgba(59, 130, 246, 0.15) !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
        color: #60A5FA !important;
    }
    [data-theme="dark"] .c-stat-val {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .c-stat-lbl {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .stat-clean-item:not(:last-child) {
        border-right-color: #1E293B !important;
    }
    [data-theme="dark"] .stat-clean-num {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .stat-clean-lbl {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .capability-card-clean {
        background: #0F172A !important;
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .capability-card-clean:hover {
        border-color: #3B82F6 !important;
        box-shadow: 0 16px 36px rgba(59, 130, 246, 0.15) !important;
    }
    [data-theme="dark"] .capability-num-clean {
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .capability-title-clean {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .capability-desc-clean {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .capability-specs-list-clean li {
        color: #CBD5E1 !important;
        background: transparent !important;
    }
    [data-theme="dark"] .capability-specs-list-clean li i {
        color: #3B82F6 !important;
    }
    [data-theme="dark"] .capability-specs-list-clean li:hover {
        background: #1E293B !important;
        color: #FFFFFF !important;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.45) !important;
    }
    [data-theme="dark"] .capability-specs-list-clean li:hover i {
        color: #38BDF8 !important;
        transform: scale(1.15);
    }
    [data-theme="dark"] .cat-pill-clean {
        background: #0F172A !important;
        border-color: #1E293B !important;
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .cat-pill-clean:hover {
        background: #131C31 !important;
        color: #38BDF8 !important;
        border-color: #3B82F6 !important;
    }
    [data-theme="dark"] .cat-pill-clean.active {
        background: #2563EB !important;
        color: #FFFFFF !important;
        border-color: #2563EB !important;
    }
    [data-theme="dark"] .cat-pill-count-clean {
        background: #1E293B !important;
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .catalog-search-clean input {
        background: #11192E !important;
        border: 1.5px solid #334155 !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .catalog-search-clean input::placeholder {
        color: #64748B !important;
    }
    [data-theme="dark"] .catalog-search-clean input:focus {
        border-color: #38BDF8 !important;
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2) !important;
    }
    [data-theme="dark"] .catalog-search-clean i {
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .search-kbd-hint kbd {
        background: #1E293B !important;
        border-color: #334155 !important;
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .product-card-clean {
        background: #0F172A !important;
        border-color: #1E293B !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important;
    }
    [data-theme="dark"] .product-card-clean:hover {
        border-color: #3B82F6 !important;
        box-shadow: 0 16px 36px rgba(59, 130, 246, 0.22) !important;
    }
    [data-theme="dark"] .product-card-media-clean {
        background: #131C31 !important;
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .product-title-clean {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .product-model-clean {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .product-specs-clean {
        background: #11192E !important;
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .spec-line-clean::before {
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .spec-line-clean .k {
        background: #11192E !important;
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .spec-line-clean .v {
        background: #11192E !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .product-desc-clean {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .spec-chip {
        background: #1E293B !important;
        border-color: #334155 !important;
        color: #93C5FD !important;
    }
    [data-theme="dark"] .btn-act-inspect {
        background: #1E293B !important;
        border: 1px solid #334155 !important;
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .btn-act-inspect:hover {
        background: #334155 !important;
        border-color: #38BDF8 !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .cat-tab-btn {
        background: #0F172A !important;
        border-color: #1E293B !important;
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .cat-tab-btn:hover {
        background: #1E293B !important;
        color: #38BDF8 !important;
    }
    [data-theme="dark"] .cat-tab-btn.active {
        background: #2563EB !important;
        color: #FFFFFF !important;
        border-color: #2563EB !important;
    }
    [data-theme="dark"] .search-input-clean,
    [data-theme="dark"] .search-select-clean {
        background: #0F172A !important;
        border-color: #334155 !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .section-title-clean {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .section-lead-clean {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .section-tag-clean {
        background: #0F172A !important;
        border-color: #1E293B !important;
        color: #93C5FD !important;
    }
    [data-theme="dark"] .facility-clean-grid {
        background: transparent !important;
    }
    [data-theme="dark"] .facility-media-clean {
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .facility-pt-icon {
        background: rgba(59, 130, 246, 0.15) !important;
        border-color: rgba(59, 130, 246, 0.35) !important;
        color: #60A5FA !important;
    }
    [data-theme="dark"] .facility-pt-title {
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .facility-pt-desc {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .facility-spec-item {
        background: #131C31 !important;
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .facility-spec-val {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .facility-spec-lbl {
        color: #94A3B8 !important;
    }
    [data-theme="dark"] .marquee-outer::before {
        background: linear-gradient(to right, #0F172A, transparent) !important;
    }
    [data-theme="dark"] .marquee-outer::after {
        background: linear-gradient(to left, #0F172A, transparent) !important;
    }
    [data-theme="dark"] .ref-logo-card {
        background: #0F172A !important;
        border-color: #1E293B !important;
    }
    [data-theme="dark"] .rfq-cta-clean {
        background: linear-gradient(135deg, #0B1226 0%, #080D1C 100%) !important;
        border: 1px solid #1E293B !important;
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.7) !important;
    }
    [data-theme="dark"] .rfq-cta-title-clean {
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .rfq-cta-desc-clean {
        color: #CBD5E1 !important;
    }
    [data-theme="dark"] .btn-rfq-banner {
        background: #2563EB !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .btn-rfq-banner:hover {
        background: #1D4ED8 !important;
        color: #FFFFFF !important;
    }
    [data-theme="dark"] .modal-content-clean {
        background: #0F172A !important;
        border-color: #334155 !important;
        color: #F8FAFC !important;
    }
    [data-theme="dark"] .modal-header-clean {
        background: #131C31 !important;
        border-bottom-color: #1E293B !important;
    }
    [data-theme="dark"] .modal-body-clean {
        background: #0F172A !important;
    }
    [data-theme="dark"] .form-control-clean {
        background: #131C31 !important;
        border-color: #334155 !important;
        color: #FFFFFF !important;
    }
</style>
@endpush

@section('content')

{{-- 1. CORPORATE DEFENSE HERO --}}
<section class="corporate-hero-clean">
    {{-- Particle Mesh Canvas --}}
    <canvas id="hero-canvas"></canvas>

    <div class="container" style="position:relative; z-index:3;">
        <div class="hero-center-content" data-reveal="fade">
            <div class="hero-telemetry-tag" data-reveal="fade">
                <span class="pulse-radar-wrap">
                    <span class="pulse-radar-dot"></span>
                    <span class="pulse-radar-ring"></span>
                </span>
                <span>{{ $isEn ? 'REAL-TIME RF PROPAGATION // 10 kHz – 40 GHz FARADAY LATTICE' : 'GERÇEK ZAMANLI RF ALANI // 10 kHz – 40 GHz FARADAY ÖRGÜSÜ' }}</span>
            </div>
            <div class="hero-badge-clean">
                <i class="bi bi-shield-check"></i>
                {{ $isEn ? \App\Models\Setting::get('hero_badge_en', 'ENGINEERED TO DEFENSE & MILITARY STANDARDS') : \App\Models\Setting::get('hero_badge_tr', 'SAVUNMA SANAYİİ VE ASKERİ STANDARTLARDA MÜHENDİSLİK') }}
            </div>
            <h1 class="hero-headline-clean">
                {{ $isEn ? \App\Models\Setting::get('hero_title_line1_en', 'Advanced Electromagnetic') : \App\Models\Setting::get('hero_title_line1_tr', 'Kritik Savunma Sistemleri İçin') }}<br>
                <span class="gradient-accent">{{ $isEn ? \App\Models\Setting::get('hero_title_highlight_en', 'Shielding Solutions') : \App\Models\Setting::get('hero_title_highlight_tr', 'İleri Elektromanyetik Kalkanlama') }}</span> 
                {{ $isEn ? \App\Models\Setting::get('hero_title_line2_en', 'for Critical Defense Platforms') : \App\Models\Setting::get('hero_title_line2_tr', 'Çözümleri') }}
            </h1>
            <p class="hero-desc-clean">
                {{ $isEn 
                    ? \App\Models\Setting::get('hero_desc_en', 'MIL-STD-461G, MIL-STD-188-125-1, and SDIP-27 Level A compliant high-voltage HEMP simulators, military power/signal line filters, turnkey shielded anechoic chambers, and precision EMI/EMC test hardware.')
                    : \App\Models\Setting::get('hero_desc_tr', 'MIL-STD-461G, MIL-STD-188-125-1 ve SDIP-27 standartlarına tam uyumlu; HEMP simülatörleri, askeri güç ve sinyal filtreleri, anahtar teslim yankısız odalar ve hassas EMI/EMC test enstrümantasyonu.')
                }}
            </p>
            <div class="hero-actions-clean">
                <a href="#catalog" class="btn-hero-primary">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                    <span>{{ $isEn ? \App\Models\Setting::get('hero_catalog_btn_en', 'Product Catalog (74 Systems)') : \App\Models\Setting::get('hero_catalog_btn_tr', 'Ürün Kataloğu (74 Sistem)') }}</span>
                </a>
                <button onclick="openRfqModal()" class="btn-hero-outline">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>{{ $isEn ? \App\Models\Setting::get('hero_rfq_btn_en', 'Defense RFQ Request') : \App\Models\Setting::get('hero_rfq_btn_tr', 'Savunma RFQ / Teklif Talebi') }}</span>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- 2. FLOATING STATS & PARTNERS CONSOLE --}}
<div class="console-wrap" data-reveal="fade">
    <div class="console-clean-card cad-bracket-box spotlight-card" data-tilt-3d>
        {{-- 4 Live Stat Metrics --}}
        <div class="console-stats-grid">
            <div class="c-stat-box">
                <div class="c-stat-icon"><i class="bi bi-shield-check"></i></div>
                <div class="c-stat-text">
                    <span class="c-stat-val" data-counter data-target="{{ \App\Models\Setting::get('stat_1_val', '54') }}" data-prefix="{{ \App\Models\Setting::get('stat_1_prefix', '') }}" data-suffix="{{ \App\Models\Setting::get('stat_1_suffix', '+') }}">{{ \App\Models\Setting::get('stat_1_prefix', '') }}{{ \App\Models\Setting::get('stat_1_val', '54') }}{{ \App\Models\Setting::get('stat_1_suffix', '+') }}</span>
                    <span class="c-stat-lbl">{{ $isEn ? \App\Models\Setting::get('stat_1_label_en', 'Defense Systems') : \App\Models\Setting::get('stat_1_label_tr', 'Savunma Portföyü') }}</span>
                </div>
            </div>
            <div class="c-stat-box">
                <div class="c-stat-icon"><i class="bi bi-people"></i></div>
                <div class="c-stat-text">
                    <span class="c-stat-val" data-counter data-target="{{ \App\Models\Setting::get('stat_2_val', '146') }}" data-prefix="{{ \App\Models\Setting::get('stat_2_prefix', '') }}" data-suffix="{{ \App\Models\Setting::get('stat_2_suffix', '+') }}">{{ \App\Models\Setting::get('stat_2_prefix', '') }}{{ \App\Models\Setting::get('stat_2_val', '146') }}{{ \App\Models\Setting::get('stat_2_suffix', '+') }}</span>
                    <span class="c-stat-lbl">{{ $isEn ? \App\Models\Setting::get('stat_2_label_en', 'Solution Partners') : \App\Models\Setting::get('stat_2_label_tr', 'Çözüm Ortağı') }}</span>
                </div>
            </div>
            <div class="c-stat-box">
                <div class="c-stat-icon"><i class="bi bi-globe2"></i></div>
                <div class="c-stat-text">
                    <span class="c-stat-val" data-counter data-target="{{ \App\Models\Setting::get('stat_3_val', '11') }}" data-prefix="{{ \App\Models\Setting::get('stat_3_prefix', '') }}" data-suffix="{{ \App\Models\Setting::get('stat_3_suffix', '+') }}">{{ \App\Models\Setting::get('stat_3_prefix', '') }}{{ \App\Models\Setting::get('stat_3_val', '11') }}{{ \App\Models\Setting::get('stat_3_suffix', '+') }}</span>
                    <span class="c-stat-lbl">{{ $isEn ? \App\Models\Setting::get('stat_3_label_en', 'Years Experience') : \App\Models\Setting::get('stat_3_label_tr', 'Yıllık Deneyim') }}</span>
                </div>
            </div>
            <div class="c-stat-box">
                <div class="c-stat-icon"><i class="bi bi-patch-check"></i></div>
                <div class="c-stat-text">
                    <span class="c-stat-val" data-counter data-target="{{ \App\Models\Setting::get('stat_4_val', '73') }}" data-prefix="{{ \App\Models\Setting::get('stat_4_prefix', '%') }}" data-suffix="{{ \App\Models\Setting::get('stat_4_suffix', '') }}">{{ \App\Models\Setting::get('stat_4_prefix', '%') }}{{ \App\Models\Setting::get('stat_4_val', '73') }}{{ \App\Models\Setting::get('stat_4_suffix', '') }}</span>
                    <span class="c-stat-lbl">{{ $isEn ? \App\Models\Setting::get('stat_4_label_en', 'Facility Compliance') : \App\Models\Setting::get('stat_4_label_tr', 'Stratejik Tesis Kalkanı') }}</span>
                </div>
            </div>
        </div>

        {{-- Divider --}}
        <div class="console-divider"></div>

        {{-- Partner Logos Marquee --}}
        <div class="console-logos-track">
            <div class="console-slider-inner">
                @for($pass = 0; $pass < 2; $pass++)
                    @foreach($references->take(12) as $ref)
                        <a href="{{ route('references') }}" class="console-logo-link" title="{{ $ref->name }}">
                            @if($ref->logo_path)
                                <img src="{{ asset('storage/' . $ref->logo_path) }}" alt="{{ $ref->name }}">
                            @else
                                <span>{{ $ref->name }}</span>
                            @endif
                        </a>
                    @endforeach
                @endfor
            </div>
        </div>
    </div>
</div>

{{-- 3. CORE CAPABILITIES (4 Disciplines) --}}
<section class="section-clean" id="capabilities" style="background:var(--bg-alt); border-top:1px solid var(--border-light); border-bottom:1px solid var(--border-light); margin-top:2.5rem;">
    <div class="container">
        <div class="section-tag-clean" data-reveal="fade">{{ $isEn ? \App\Models\Setting::get('disp_tag_en', 'Core Engineering Disciplines') : \App\Models\Setting::get('disp_tag_tr', 'Mühendislik Yetkinlikleri & Çözümler') }}</div>
        <h2 class="section-title-clean" data-reveal>{{ $isEn ? \App\Models\Setting::get('disp_title_en', 'Advanced Electromagnetic Defense Infrastructure') : \App\Models\Setting::get('disp_title_tr', 'İleri Seviye Elektromanyetik Savunma Altyapısı') }}</h2>
        <p class="section-lead-clean">
            {{ $isEn
                ? \App\Models\Setting::get('disp_lead_en', 'From concept engineering to turnkey accredited facilities: military qualified manufacturing, high-voltage simulation, and precision testing services.')
                : \App\Models\Setting::get('disp_lead_tr', 'Konsept tasarımdan anahtar teslim tesislere kadar askeri standartlarda yerli mühendislik, imalat ve akredite test hizmetleri.')
            }}
        </p>

        <div class="capabilities-grid-clean" data-stagger>
            <div class="capability-card-clean shine-hover spotlight-card cad-bracket-box">
                <span class="capability-num-clean">{{ $isEn ? 'DISCIPLINE 01' : 'DİSİPLİN 01' }}</span>
                <h3 class="capability-title-clean">{{ $isEn ? \App\Models\Setting::get('disp_1_title_en', 'HEMP / HPEM Pulse Simulators') : \App\Models\Setting::get('disp_1_title_tr', 'HEMP / HPEM Darbe Simülatörleri') }}</h3>
                <p class="capability-desc-clean">
                    {{ $isEn
                        ? \App\Models\Setting::get('disp_1_desc_en', 'Simulating E1, E2, and E3 electromagnetic pulses generated by high-altitude nuclear detonations: 300 kV/m electric field generators and Marx high-voltage pulsers.')
                        : \App\Models\Setting::get('disp_1_desc_tr', 'Yüksek irtifa nükleer patlamaların oluşturduğu E1, E2 ve E3 elektromanyetik darbelerini laboratuvar ortamında simüle eden 300 kV/m elektrik alan jeneratörleri ve Marx darbe üreteçleri.')
                    }}
                </p>
                <ul class="capability-specs-list-clean">
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_1_spec_1_en', 'MIL-STD-461G RS105 Threat Simulation') : \App\Models\Setting::get('disp_1_spec_1_tr', 'MIL-STD-461G RS105 Tehdit Alanı Simülasyonu') }}</li>
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_1_spec_2_en', 'MIL-STD-188-125-1 Pulsed Current Injection (PCI)') : \App\Models\Setting::get('disp_1_spec_2_tr', 'MIL-STD-188-125-1 Doğrudan Darbe Enjeksiyon (PCI) Testleri') }}</li>
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_1_spec_3_en', '< 2 ns Sub-nanosecond Rise-Time Control') : \App\Models\Setting::get('disp_1_spec_3_tr', '< 2 ns Pikosaniye Seviyesinde Yükselme Zamanı Kontrolü') }}</li>
                </ul>
            </div>

            <div class="capability-card-clean shine-hover spotlight-card cad-bracket-box">
                <span class="capability-num-clean">{{ $isEn ? 'DISCIPLINE 02' : 'DİSİPLİN 02' }}</span>
                <h3 class="capability-title-clean">{{ $isEn ? \App\Models\Setting::get('disp_2_title_en', 'TEMPEST SDIP-27 Level A Filtering') : \App\Models\Setting::get('disp_2_title_tr', 'TEMPEST SDIP-27 Level A Filtreleme') }}</h3>
                <p class="capability-desc-clean">
                    {{ $isEn
                        ? \App\Models\Setting::get('disp_2_desc_en', 'Preventing compromising electromagnetic emanations in secure communication and data processing facilities: >100 dB insertion loss from 100 kHz to 40 GHz.')
                        : \App\Models\Setting::get('disp_2_desc_tr', 'Kritik askeri iletişim ve veri işleme tesislerinde sinyal sızıntılarını engelleyen, 100 kHz - 40 GHz frekans bandında 100 dB ve üzeri zayıflatma sağlayan askeri güç ve veri hattı filtreleri.')
                    }}
                </p>
                <ul class="capability-specs-list-clean">
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_2_spec_1_en', 'SDIP-27 / SDIP-29 Level A Protection') : \App\Models\Setting::get('disp_2_spec_1_tr', 'SDIP-27 / SDIP-29 Seviye A Koruması') }}</li>
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_2_spec_2_en', 'Current Ratings from 16A up to 1600A') : \App\Models\Setting::get('disp_2_spec_2_tr', '16A\'den 1600A\'e Kadar Yüksek Akımlı Güç Filtreleri') }}</li>
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_2_spec_3_en', 'Integrated Varistors for HEMP Surge Suppression') : \App\Models\Setting::get('disp_2_spec_3_tr', 'HEMP Akım Darbelerine Karşı Entegre Varistör Koruması') }}</li>
                </ul>
            </div>

            <div class="capability-card-clean shine-hover spotlight-card cad-bracket-box">
                <span class="capability-num-clean">{{ $isEn ? 'DISCIPLINE 03' : 'DİSİPLİN 03' }}</span>
                <h3 class="capability-title-clean">{{ $isEn ? \App\Models\Setting::get('disp_3_title_en', 'Turnkey Shielded Anechoic Chambers') : \App\Models\Setting::get('disp_3_title_tr', 'Anahtar Teslim Yankısız Test Odaları') }}</h3>
                <p class="capability-desc-clean">
                    {{ $isEn
                        ? \App\Models\Setting::get('disp_3_desc_en', 'Design, acoustic/RF simulation, and construction of semi and fully anechoic testing chambers lined with ferrite tiles and hybrid pyramidal absorbers for defense EMC qualification.')
                        : \App\Models\Setting::get('disp_3_desc_tr', 'Savunma ve havacılık platformlarının EMI/EMC sertifikasyon testleri için ferrit karo ve piramit soğurucu kaplamalı, tam ve yarı yankısız akredite test odaları tasarımı ve kurulumu.')
                    }}
                </p>
                <ul class="capability-specs-list-clean">
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_3_spec_1_en', '> 100 dB Shielding Effectiveness (10 kHz - 40 GHz)') : \App\Models\Setting::get('disp_3_spec_1_tr', '10 kHz - 40 GHz Aralığında > 100 dB Kalkanlama Etkinliği') }}</li>
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_3_spec_2_en', 'MIL-STD-461 & CISPR 16-1-4 Compliant Quiet Zones') : \App\Models\Setting::get('disp_3_spec_2_tr', 'MIL-STD-461 ve CISPR 16-1-4 Uyumlu Test Hacimleri') }}</li>
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_3_spec_3_en', 'RF Shielded Doors, Honeycomb Vents, and Fiber Penetrations') : \App\Models\Setting::get('disp_3_spec_3_tr', 'RF Korumalı Kapılar, Balpeteği Havalandırmalar ve Fiber Geçişleri') }}</li>
                </ul>
            </div>

            <div class="capability-card-clean shine-hover spotlight-card cad-bracket-box">
                <span class="capability-num-clean">{{ $isEn ? 'DISCIPLINE 04' : 'DİSİPLİN 04' }}</span>
                <h3 class="capability-title-clean">{{ $isEn ? \App\Models\Setting::get('disp_4_title_en', 'Precision EMI/EMC Test Hardware & LISN') : \App\Models\Setting::get('disp_4_title_tr', 'Hassas EMI/EMC Test Cihazları & LISN') }}</h3>
                <p class="capability-desc-clean">
                    {{ $isEn
                        ? \App\Models\Setting::get('disp_4_desc_en', 'Line Impedance Stabilization Networks (LISN), Coupling/Decoupling Networks (CDN), transient limiters, ESD simulators, and certified pre-owned test instrumentation.')
                        : \App\Models\Setting::get('disp_4_desc_tr', 'İletilen emisyon ve bağışıklık testlerinde kullanılan askeri ve ticari standartlarda LISN, CDN, darbe sınırlayıcılar, ESD tabancaları ve sertifikalı ikinci el test enstrümanları.')
                    }}
                </p>
                <ul class="capability-specs-list-clean">
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_4_spec_1_en', 'MIL-STD-461G Compliant 50 μH LISN Networks') : \App\Models\Setting::get('disp_4_spec_1_tr', 'MIL-STD-461G Uyumlu 50 μH Hat Empedans Şebekeleri (LISN)') }}</li>
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_4_spec_2_en', 'Calibrated Rohde & Schwarz & Keysight Portfolio') : \App\Models\Setting::get('disp_4_spec_2_tr', 'Rohde & Schwarz ve Keysight Kalibre Edilmiş Cihaz Portföyü') }}</li>
                    <li><i class="bi bi-check-circle-fill"></i> {{ $isEn ? \App\Models\Setting::get('disp_4_spec_3_en', 'ISO 17025 Traceable Calibration Certificates') : \App\Models\Setting::get('disp_4_spec_3_tr', 'ISO 17025 İzlenebilir Kalibrasyon Sertifikaları') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- 4. CORPORATE PRODUCTS CATALOG --}}
<section class="section-clean" id="catalog" style="background:var(--bg-body);">
    <div class="container">
        <div class="catalog-header-clean">
            <div>
                <div class="section-tag-clean">{{ $isEn ? \App\Models\Setting::get('catalog_tag_en', 'Defense Hardware Catalog') : \App\Models\Setting::get('catalog_tag_tr', 'Savunma Sanayii Ürün Kataloğu') }}</div>
                <h2 class="section-title-clean" data-reveal>{{ $isEn ? \App\Models\Setting::get('catalog_title_en', 'Certified Systems & Instrumentation Portfolio') : \App\Models\Setting::get('catalog_title_tr', 'Sertifikalı Sistem ve Ekipman Portföyü') }}</h2>
                <p class="section-lead-clean" style="margin-bottom:0;">
                    {{ $isEn
                        ? \App\Models\Setting::get('catalog_lead_en', 'All 74 qualified systems complete with interactive 3D models or high-resolution photography, structured parameters, and official PDF datasheets.')
                        : \App\Models\Setting::get('catalog_lead_tr', 'Tamamı teknik çizim, 3D modelleme veya yüksek çözünürlüklü fotoğraflar ve resmi PDF datasheet dokümanlarıyla desteklenen 74 adet aktif sistem.')
                    }}
                </p>
            </div>

            <div class="catalog-search-clean">
                <i class="bi bi-search"></i>
                <input type="text" id="catalogSearchInput" placeholder="{{ $isEn ? \App\Models\Setting::get('catalog_search_placeholder_en', 'Search by model, standard or equipment name...') : \App\Models\Setting::get('catalog_search_placeholder_tr', 'Model, standart veya cihaz adı ile ara...') }}" onkeyup="searchCatalog()">
                <span class="search-kbd-hint"><kbd>/</kbd></span>
            </div>
        </div>

        {{-- Category Pills --}}
        <div class="cat-pills-row-clean">
            <button class="cat-pill-clean active" onclick="filterCatalog('all', this)">
                {{ $isEn ? 'All' : 'Tümü' }} <span class="cat-pill-count-clean">{{ $categories->sum(fn($c) => $c->activeProducts->count()) }}</span>
            </button>
            @foreach($categories as $cat)
                <button class="cat-pill-clean" onclick="filterCatalog('{{ $cat->id }}', this)">
                    {{ $cat->name }} <span class="cat-pill-count-clean">{{ $cat->activeProducts->count() }}</span>
                </button>
            @endforeach
        </div>

        {{-- Products Grid --}}
        <div class="products-grid-clean" id="productsGrid">
            @foreach($categories as $cat)
                @foreach($cat->activeProducts as $p)
                    <div class="product-card-clean shine-hover spotlight-card" data-category="{{ $cat->id }}" data-name="{{ strtolower($p->name) }}" data-model="{{ strtolower($p->model_number ?: '') }}" data-standard="{{ strtolower($cat->name) }}">
                        <div class="product-card-media-clean hardware-viewfinder">
                            @if($p->video_path)
                                <video src="{{ asset('storage/' . $p->video_path) }}" autoplay loop muted playsinline></video>
                                <span class="product-3d-badge-clean"><i class="bi bi-box-seam"></i> 3D CAD</span>
                            @elseif($p->image_path)
                                <img src="{{ asset('storage/' . $p->image_path) }}" alt="{{ $p->name }}" loading="lazy">
                            @else
                                <div style="display:flex;flex-direction:column;align-items:center;justify-content:center;color:#64748B;">
                                    <i class="bi bi-cpu" style="font-size:2.5rem;margin-bottom:0.4rem;color:var(--brand-primary);"></i>
                                    <span style="font-family:var(--font-mono);font-size:0.7rem;font-weight:700;">{{ $isEn ? 'TECHNICAL SCHEMATIC' : 'TEKNİK ÇİZİM' }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="product-body-clean">
                            <span class="product-cat-tag-clean">{{ $cat->name }}</span>
                            <h3 class="product-title-clean">
                                <a href="{{ route('product.show', $p->id) }}">{{ $p->name }}</a>
                            </h3>
                            <div class="product-model-clean">
                                Model: {{ $p->model_number ?: 'EMC-' . strtoupper(substr(md5($p->id . $p->name), 0, 6)) }}
                            </div>

                            {{-- Structured Specs Table --}}
                            <div class="product-specs-clean">
                                @php
                                    $specs = $p->specifications;
                                @endphp
                                @if($specs && is_array($specs) && count($specs) > 0)
                                    @php $specSlice = array_slice($specs, 0, 2, true); @endphp
                                    @foreach($specSlice as $k => $v)
                                        <div class="spec-line-clean">
                                            <span class="k">{{ $k }}:</span>
                                            <span class="v">{{ is_array($v) ? implode(', ', $v) : $v }}</span>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="spec-line-clean">
                                        <span class="k">{{ $isEn ? 'Standard:' : 'Standart:' }}</span>
                                        <span class="v">MIL-STD-461G</span>
                                    </div>
                                    <div class="spec-line-clean">
                                        <span class="k">{{ $isEn ? 'Attenuation:' : 'Kalkanlama:' }}</span>
                                        <span class="v">&gt; 100 dB Military</span>
                                    </div>
                                @endif
                            </div>

                            <div class="product-actions-clean">
                                @if($p->datasheet_path)
                                    <a href="{{ asset('storage/' . $p->datasheet_path) }}" target="_blank" class="btn-act-inspect">
                                        <i class="bi bi-file-earmark-pdf-fill" style="color:#DC2626;"></i> Datasheet
                                    </a>
                                @else
                                    <a href="{{ route('product.show', $p->id) }}" class="btn-act-inspect">
                                        <i class="bi bi-info-circle"></i> {{ $isEn ? 'Inspect' : 'İncele' }}
                                    </a>
                                @endif

                                <button onclick="openRfqModal('{{ addslashes($p->name) }} ({{ $p->model_number }})')" class="btn-act-rfq">
                                    <i class="bi bi-send-fill"></i> {{ $isEn ? 'Request RFQ' : 'RFQ İste' }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>



{{-- 6. MANUFACTURING FACILITY & QUALITY ASSURANCE --}}
<section class="section-clean" style="background:var(--bg-body);">
    <div class="container facility-clean-grid">
        <div class="facility-media-clean">
            <img src="{{ asset('images/defense_facility.jpg') }}" alt="EMC Defense Manufacturing & Integration Facility">
        </div>

        <div>
            <div class="section-tag-clean">{{ $isEn ? \App\Models\Setting::get('facility_tag_en', 'Manufacturing & Quality Infrastructure') : \App\Models\Setting::get('facility_tag_tr', 'Üretim & Kalite Altyapısı') }}</div>
            <h2 class="section-title-clean">{{ $isEn ? \App\Models\Setting::get('facility_title_en', 'Our Integration & Calibration Facility') : \App\Models\Setting::get('facility_title_tr', 'Entegrasyon & Test Laboratuvarımız') }}</h2>
            <p class="section-lead-clean">
                {{ $isEn
                    ? \App\Models\Setting::get('facility_desc_en', 'At our high-technology facility in Kartepe / Kocaeli, engineering, manufacturing, and calibration operations are performed under ISO 9001:2015 and ISO 17025 standards.')
                    : \App\Models\Setting::get('facility_desc_tr', 'Kocaeli Kartepe\'deki yüksek teknolojili üretim ve entegrasyon merkezimizde, ISO 9001:2015 ve ISO 17025 standartlarında kalibrasyon ve test hizmetleri yürütülmektedir.')
                }}
            </p>

            <div class="facility-points-clean">
                <div class="facility-pt-item">
                    <div class="facility-pt-icon"><i class="bi bi-shield-lock-fill"></i></div>
                    <div>
                        <h3 class="facility-pt-title">{{ $isEn ? \App\Models\Setting::get('facility_p1_title_en', 'Defense Facility Security Clearances') : \App\Models\Setting::get('facility_p1_title_tr', 'Tesis Güvenlik ve Akreditasyon Belgeleri') }}</h3>
                        <p class="facility-pt-desc">{{ $isEn ? \App\Models\Setting::get('facility_p1_desc_en', 'All engineering and manufacturing workflows strictly conform to Defense Industry Agency and facility security protocols.') : \App\Models\Setting::get('facility_p1_desc_tr', 'Tüm mühendislik ve üretim süreçleri Savunma Sanayii Başkanlığı ve tesis güvenlik standartlarına tam uyumludur.') }}</p>
                    </div>
                </div>

                <div class="facility-pt-item">
                    <div class="facility-pt-icon"><i class="bi bi-award-fill"></i></div>
                    <div>
                        <h3 class="facility-pt-title">{{ $isEn ? \App\Models\Setting::get('facility_p2_title_en', 'ISO 17025 Traceable Metrological Calibration') : \App\Models\Setting::get('facility_p2_title_tr', 'ISO 17025 İzlenebilir Kalibrasyon') }}</h3>
                        <p class="facility-pt-desc">{{ $isEn ? \App\Models\Setting::get('facility_p2_desc_en', 'LISNs, CDNs, high-frequency antennas, and high-voltage pulsers are delivered with internationally traceable calibration reports.') : \App\Models\Setting::get('facility_p2_desc_tr', 'LISN, CDN, antenler ve darbe jeneratörleri uluslararası metrolojik izlenebilirlik sertifikalarıyla teslim edilir.') }}</p>
                    </div>
                </div>

                <div class="facility-pt-item">
                    <div class="facility-pt-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    <div>
                        <h3 class="facility-pt-title">{{ $isEn ? \App\Models\Setting::get('facility_p3_title_en', 'Strategic Defense Proving & Open Test Site') : \App\Models\Setting::get('facility_p3_title_tr', 'Stratejik Konum & Test Sahası') }}</h3>
                        <p class="facility-pt-desc">{{ $isEn ? \App\Models\Setting::get('facility_p3_desc_en', 'Conveniently located in the Kocaeli / Kartepe defense technology corridor with extensive anechoic chambers and high-voltage outdoor test pads.') : \App\Models\Setting::get('facility_p3_desc_tr', 'Kartepe/Kocaeli sanayi ve teknoloji koridorunda geniş yankısız oda ve yüksek gerilim açık alan test sahası.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 7. CLASSIFIED DEFENSE PROCUREMENT & RFQ BANNER --}}
<section class="container">
    <div class="rfq-cta-clean cad-bracket-box">
        <div class="rfq-cta-content-clean">
            <div style="font-family:var(--font-mono);font-size:0.75rem;color:#BFDBFE;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;margin-bottom:0.75rem;">
                <i class="bi bi-shield-check"></i> {{ $isEn ? \App\Models\Setting::get('banner_rfq_badge_en', 'PROCUREMENT UNDER CONFIDENTIALITY PROTOCOLS') : \App\Models\Setting::get('banner_rfq_badge_tr', 'GİZLİLİK VE PROTOKOL DÂHİLİNDE TEDARİK') }}
            </div>
            <h2 class="rfq-cta-title-clean">{{ $isEn ? \App\Models\Setting::get('banner_rfq_title_en', 'Initiate a Technical Defense RFQ for Your Program') : \App\Models\Setting::get('banner_rfq_title_tr', 'Savunma Sanayii Projeniz İçin Teknik RFQ Başlatın') }}</h2>
            <p class="rfq-cta-desc-clean">
                {{ $isEn
                    ? \App\Models\Setting::get('banner_rfq_desc_en', 'Submit technical specifications or requirement inquiries for your programs across the Defense Industry Agency, Aselsan, Roketsan, TAI, or Armed Forces to consult directly with our defense engineers.')
                    : \App\Models\Setting::get('banner_rfq_desc_tr', 'Savunma Sanayii Başkanlığı, Aselsan, Roketsan, TUSAŞ veya TSK projeleriniz için teknik şartname veya ihtiyaç bildirimlerinizi iletebilir; uzman savunma mühendislerimizle görüşebilirsiniz.')
                }}
            </p>
        </div>

        <div>
            <button onclick="openRfqModal()" class="btn-rfq-banner">
                <i class="bi bi-send-fill"></i> {{ $isEn ? \App\Models\Setting::get('banner_rfq_btn_en', 'Open Defense RFQ Portal') : \App\Models\Setting::get('banner_rfq_btn_tr', 'Resmi Savunma RFQ Formunu Aç') }}
            </button>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // Real-time Category Filtering
    function filterCatalog(catId, button) {
        document.querySelectorAll('.cat-pill-clean').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');

        const cards = document.querySelectorAll('.product-card-clean');
        cards.forEach(card => {
            if (catId === 'all' || card.dataset.category === catId) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Real-time Search Filtering
    function searchCatalog() {
        const query = document.getElementById('catalogSearchInput').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.product-card-clean');

        cards.forEach(card => {
            const name = card.dataset.name || '';
            const model = card.dataset.model || '';
            const standard = card.dataset.standard || '';

            if (!query || name.includes(query) || model.includes(query) || standard.includes(query)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endpush
