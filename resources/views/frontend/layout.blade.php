@php
    $isEn = app()->getLocale() === 'en';
@endphp
<!DOCTYPE html>
<html lang="{{ $isEn ? 'en' : 'tr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $isEn ? 'EMC Defense – Military & Aerospace Electromagnetic Warfare Solutions. MIL-STD-461G, MIL-STD-188-125-1, SDIP-27 Level A HEMP Simulators, TEMPEST Filters & Anechoic Chambers.' : 'EMC Defense – Askeri ve Havacılık Standartlarında İleri Elektromanyetik Savunma Sistemleri. MIL-STD-461G, MIL-STD-188-125-1, SDIP-27 HEMP Simülatörleri, TEMPEST Filtreleri ve Yankısız Odalar.' }}">
    <title>@yield('title', $isEn ? 'EMC Defense – Advanced EMI/EMC Defense Solutions & Military Shielding' : 'EMC Savunma Sistemleri – İleri Elektromanyetik & Kalkanlama Teknolojileri')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo_icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script>
        (function() {
            try {
                const savedTheme = localStorage.getItem('emc_defense_theme');
                if (savedTheme === 'dark') {
                    document.documentElement.setAttribute('data-theme', 'dark');
                } else if (savedTheme === 'light') {
                    document.documentElement.setAttribute('data-theme', 'light');
                } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.setAttribute('data-theme', 'dark');
                } else {
                    document.documentElement.setAttribute('data-theme', 'light');
                }
            } catch(e) {}
        })();
    </script>
    <style>
        :root {
            /* Corporate Brand Colors (Logo #1E2D7D Royal Defense Blue & Precision Accents) */
            --brand-primary:   #1E2D7D; /* Primary Logo Royal Navy */
            --brand-hover:     #16225E; /* Deeper Logo Navy for hover */
            --brand-accent:    #2563EB; /* Precision Cobalt Accent */
            --brand-light:     #EFF6FF; /* Crisp Light Blue Tint */
            --brand-subtle:    #F0F4FF; /* Soft Corporate Blue Tint */

            --navy-950:        #0A1128; /* Executive Deep Navy (Grounding for Footer) */
            --navy-900:        #0F1B3E;
            --navy-800:        #1E2D7D;
            --navy-700:        #293B8C;
            --blue-600:        #1E2D7D;
            --blue-500:        #2563EB;
            --blue-400:        #3B82F6;
            --blue-50:         #EFF6FF;
            --amber-600:       #D97706;
            --amber-500:       #F59E0B;
            --emerald-600:     #059669;
            --emerald-500:     #10B981;

            --bg-body:         #FFFFFF; /* Pure Corporate White */
            --bg-surface:      #FFFFFF;
            --bg-alt:          #F8FAFC; /* Clean Executive Slate Section */
            --bg-muted:        #F1F5F9;
            --border-light:    #E2E8F0;
            --border-med:      #CBD5E1;
            --border-brand:    rgba(30, 45, 125, 0.18);

            --text-heading:    #0F172A; /* Authoritative Slate Headline */
            --text-body:       #334155; /* Crisp Corporate Slate Body */
            --text-muted:      #64748B;
            --text-light:      #94A3B8;
            --text-white:      #FFFFFF;

            --font-head:       'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            --font-body:       'Inter', system-ui, -apple-system, sans-serif;
            --font-mono:       'JetBrains Mono', monospace;

            --shadow-xs:       0 1px 2px rgba(15, 23, 42, 0.04);
            --shadow-sm:       0 2px 6px rgba(15, 23, 42, 0.05);
            --shadow-md:       0 6px 18px rgba(15, 23, 42, 0.06), 0 2px 6px rgba(15, 23, 42, 0.03);
            --shadow-lg:       0 16px 36px rgba(15, 23, 42, 0.08), 0 4px 10px rgba(15, 23, 42, 0.03);
            --shadow-xl:       0 24px 50px rgba(15, 23, 42, 0.12);

            --r-xs: 4px;
            --r-sm: 6px;
            --r-md: 10px;
            --r-lg: 14px;
            --r-xl: 20px;
            --tr: 0.22s cubic-bezier(0.16, 1, 0.3, 1);
            --tr-spring: 0.45s cubic-bezier(0.16, 1, 0.3, 1);
            --tr-fast: 0.15s ease;
        }

        /* ── SENIOR CRAFTSMANSHIP: TACTICAL MILITARY DEFENSE DARK THEME ── */
        [data-theme="dark"] {
            --brand-primary:   #3B82F6; /* Luminous royal blue */
            --brand-hover:     #60A5FA;
            --brand-accent:    #38BDF8; /* Precision cyan / radar accent */
            --brand-light:     rgba(59, 130, 246, 0.15);
            --brand-subtle:    rgba(30, 45, 125, 0.35);

            --navy-950:        #030712;
            --navy-900:        #080E1C;
            --navy-800:        #0F172A;
            --navy-700:        #1E293B;
            --blue-600:        #2563EB;
            --blue-500:        #3B82F6;
            --blue-400:        #60A5FA;
            --blue-50:         rgba(59, 130, 246, 0.12);
            --amber-600:       #F59E0B;
            --amber-500:       #FBBF24;
            --emerald-600:     #10B981;
            --emerald-500:     #34D399;

            --bg-body:         #0A0F1D; /* Deep stealth tactical navy body */
            --bg-surface:      #0F172A; /* Surface cards */
            --bg-alt:          #11192E; /* Alternate tactical section */
            --bg-muted:        #1E293B;
            --border-light:    #1E293B;
            --border-med:      #334155;
            --border-brand:    rgba(59, 130, 246, 0.32);

            --text-heading:    #F8FAFC; /* Crisp bright white/silver headline */
            --text-body:       #CBD5E1; /* High-contrast corporate slate body */
            --text-muted:      #94A3B8;
            --text-light:      #64748B;
            --text-white:      #FFFFFF;

            --shadow-xs:       0 1px 2px rgba(0, 0, 0, 0.6);
            --shadow-sm:       0 2px 8px rgba(0, 0, 0, 0.7);
            --shadow-md:       0 6px 20px rgba(0, 0, 0, 0.75);
            --shadow-lg:       0 16px 40px rgba(0, 0, 0, 0.85);
            --shadow-xl:       0 24px 60px rgba(0, 0, 0, 0.95);
        }

        /* Dark Theme Global Element Rules */
        [data-theme="dark"] body {
            background-color: var(--bg-body) !important;
            color: var(--text-body) !important;
        }

        [data-theme="dark"] .defense-topbar,
        [data-theme="dark"] .defense-top-utility {
            background: #060A14 !important;
            border-bottom: 1px solid #1E293B !important;
        }
        [data-theme="dark"] .defense-status-pill {
            background: #0F172A !important;
            border: 1px solid #1E293B !important;
            color: #E2E8F0 !important;
            border-radius: 4px;
            padding: 3px 8px;
        }
        [data-theme="dark"] .defense-topbar-item {
            color: #94A3B8 !important;
        }
        [data-theme="dark"] .defense-topbar-item strong {
            color: #F8FAFC !important;
        }
        [data-theme="dark"] .defense-topbar-item i {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .defense-topbar-link {
            color: #94A3B8 !important;
        }
        [data-theme="dark"] .defense-topbar-link:hover {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .defense-topbar-link i {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .topbar-sep {
            color: #334155 !important;
        }

        [data-theme="dark"] .defense-lang-toggle,
        [data-theme="dark"] .defense-theme-toggle {
            background: #0F172A !important;
            border: 1px solid #334155 !important;
        }
        [data-theme="dark"] .defense-lang-toggle a,
        [data-theme="dark"] .defense-theme-toggle .theme-toggle-btn {
            color: #94A3B8 !important;
        }
        [data-theme="dark"] .defense-lang-toggle a:hover,
        [data-theme="dark"] .defense-theme-toggle .theme-toggle-btn:hover {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .defense-lang-toggle a.active,
        [data-theme="dark"] .defense-theme-toggle .theme-toggle-btn.active {
            color: #FFFFFF !important;
            background: #2563EB !important;
        }

        [data-theme="dark"] .nav-root {
            background: rgba(10, 15, 29, 0.95) !important;
            border-bottom: 1px solid #1E293B !important;
        }
        [data-theme="dark"] .nav-root.scrolled {
            background: rgba(10, 15, 29, 0.98) !important;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7) !important;
        }
        [data-theme="dark"] .nav-brand-title {
            color: #FFFFFF !important;
        }
        [data-theme="dark"] .nav-brand-subtitle {
            color: #93C5FD !important;
        }
        [data-theme="dark"] .nav-brand-badge {
            border-left-color: #1E293B !important;
        }
        [data-theme="dark"] .nav-link {
            color: #CBD5E1 !important;
        }
        [data-theme="dark"] .nav-link:hover {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .nav-link.active {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .nav-link.active::after {
            background: #38BDF8 !important;
        }

        [data-theme="dark"] .mega-dropdown {
            background: #0A0F1D !important;
            border: 1px solid #1E293B !important;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.95) !important;
        }
        [data-theme="dark"] .mega-dropdown-header {
            background: #11192E !important;
            border-bottom-color: #1E293B !important;
        }
        [data-theme="dark"] .mega-dropdown-item {
            background: #0F172A !important;
            border-color: #1E293B !important;
        }
        [data-theme="dark"] .mega-dropdown-item:hover {
            background: #131C31 !important;
            border-color: #3B82F6 !important;
            box-shadow: 0 8px 24px rgba(59, 130, 246, 0.22) !important;
            transform: translateY(-2px);
        }
        [data-theme="dark"] .mega-dropdown-title {
            color: #F8FAFC !important;
        }
        [data-theme="dark"] .mega-dropdown-item:hover .mega-dropdown-title {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .mega-dropdown-count {
            background: rgba(59, 130, 246, 0.15) !important;
            color: #60A5FA !important;
            border-color: rgba(59, 130, 246, 0.35) !important;
        }
        [data-theme="dark"] .mega-dropdown-desc {
            color: #94A3B8 !important;
        }

        [data-theme="dark"] .nav-mobile {
            background: #0A0F1D !important;
            border-left-color: #1E293B !important;
        }
        [data-theme="dark"] .nav-mobile a {
            color: #CBD5E1 !important;
            border-bottom-color: #1E293B !important;
        }
        [data-theme="dark"] .nav-mobile a:hover {
            background: #131C31 !important;
            color: #38BDF8 !important;
        }

        [data-theme="dark"] .page-header-corporate,
        [data-theme="dark"] .cert-page-header,
        [data-theme="dark"] .ref-page-header,
        [data-theme="dark"] .contact-page-header {
            background: radial-gradient(circle at 65% 25%, rgba(37, 99, 235, 0.14) 0%, transparent 60%),
                        linear-gradient(180deg, #070B14 0%, #0F172A 100%) !important;
            border-bottom-color: #1E293B !important;
            color: #F8FAFC !important;
        }

        [data-theme="dark"] .ref-header-title,
        [data-theme="dark"] .cert-header-title,
        [data-theme="dark"] .contact-header-title,
        [data-theme="dark"] .page-header-title,
        [data-theme="dark"] .section-headline {
            color: #FFFFFF !important;
        }

        [data-theme="dark"] .ref-header-lead,
        [data-theme="dark"] .cert-header-lead,
        [data-theme="dark"] .contact-header-lead,
        [data-theme="dark"] .page-header-lead,
        [data-theme="dark"] .section-lead {
            color: #CBD5E1 !important;
        }

        [data-theme="dark"] .references-body,
        [data-theme="dark"] .certificates-body,
        [data-theme="dark"] .contact-body,
        [data-theme="dark"] .page-body-container {
            background: var(--bg-body, #0A0F1D) !important;
        }

        [data-theme="dark"] .modal-card {
            background: #0F172A !important;
            border-color: #1E293B !important;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.9) !important;
            color: #CBD5E1 !important;
        }
        [data-theme="dark"] .modal-header {
            background: #11192E !important;
            border-bottom: 1px solid #1E293B !important;
        }
        [data-theme="dark"] .modal-title {
            color: #FFFFFF !important;
        }
        [data-theme="dark"] .modal-subtitle {
            color: #94A3B8 !important;
        }
        [data-theme="dark"] .modal-body {
            background: #0F172A !important;
        }
        [data-theme="dark"] .form-group label {
            color: #CBD5E1 !important;
        }
        [data-theme="dark"] .form-control {
            background: #131C31 !important;
            border-color: #334155 !important;
            color: #FFFFFF !important;
        }
        [data-theme="dark"] .form-control:focus {
            border-color: #38BDF8 !important;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2) !important;
        }
        [data-theme="dark"] .flash-msg {
            background: #0F172A !important;
            color: #F8FAFC !important;
            border-color: #1E293B !important;
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

        [data-theme="dark"] .corporate-card,
        [data-theme="dark"] .card-clean,
        [data-theme="dark"] .card-corporate,
        [data-theme="dark"] .content-card-corporate {
            background: #0F172A !important;
            border-color: #1E293B !important;
            color: #CBD5E1 !important;
        }

        [data-theme="dark"] .table-corporate,
        [data-theme="dark"] .table-bordered {
            border-color: #1E293B !important;
        }
        [data-theme="dark"] .table-corporate th,
        [data-theme="dark"] .table-bordered th {
            background: #131C31 !important;
            color: #94A3B8 !important;
            border-color: #1E293B !important;
        }
        [data-theme="dark"] .table-corporate td,
        [data-theme="dark"] .table-bordered td {
            background: #0F172A !important;
            color: #CBD5E1 !important;
            border-color: #1E293B !important;
        }

        [data-theme="dark"] .form-input-clean,
        [data-theme="dark"] .form-select-clean,
        [data-theme="dark"] input.form-control,
        [data-theme="dark"] textarea.form-control,
        [data-theme="dark"] select.form-select {
            background: #131C31 !important;
            border-color: #334155 !important;
            color: #F8FAFC !important;
        }
        [data-theme="dark"] .form-input-clean:focus,
        [data-theme="dark"] .form-select-clean:focus,
        [data-theme="dark"] input.form-control:focus,
        [data-theme="dark"] textarea.form-control:focus,
        [data-theme="dark"] select.form-select:focus {
            background: #131C31 !important;
            border-color: #3B82F6 !important;
            color: #FFFFFF !important;
        }

        [data-theme="dark"] .defense-floating-hud {
            background: rgba(15, 23, 42, 0.94) !important;
            border-color: #1E293B !important;
            box-shadow: 0 10px 32px rgba(0, 0, 0, 0.7) !important;
        }
        [data-theme="dark"] .hud-btn {
            color: #CBD5E1 !important;
        }
        [data-theme="dark"] .hud-btn:hover {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .hud-top-btn {
            background: #1E293B !important;
            color: #CBD5E1 !important;
        }
        [data-theme="dark"] .hud-top-btn:hover {
            background: #334155 !important;
            color: #38BDF8 !important;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; -webkit-font-smoothing: antialiased; overflow-x: hidden; }
        body { overflow-x: hidden; width: 100%; max-width: 100vw; }

        /* ── GLOBAL SCROLL-REVEAL ANIMATIONS ── */
        [data-reveal] {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1), transform 0.65s cubic-bezier(0.16, 1, 0.3, 1);
        }
        [data-reveal='left'] {
            transform: translateX(-40px);
        }
        [data-reveal='right'] {
            transform: translateX(40px);
        }
        [data-reveal='scale'] {
            transform: scale(0.88) translateY(20px);
            transform-origin: center bottom;
        }
        [data-reveal='fade'] {
            transform: none;
        }
        [data-reveal].is-visible {
            opacity: 1;
            transform: none;
        }
        /* Stagger delays for children */
        [data-stagger] > *:nth-child(1) { transition-delay: 0.05s; }
        [data-stagger] > *:nth-child(2) { transition-delay: 0.12s; }
        [data-stagger] > *:nth-child(3) { transition-delay: 0.19s; }
        [data-stagger] > *:nth-child(4) { transition-delay: 0.26s; }
        [data-stagger] > *:nth-child(5) { transition-delay: 0.33s; }
        [data-stagger] > *:nth-child(6) { transition-delay: 0.40s; }
        [data-stagger] > *:nth-child(7) { transition-delay: 0.47s; }
        [data-stagger] > *:nth-child(8) { transition-delay: 0.54s; }
        [data-stagger] > * {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.55s cubic-bezier(0.16, 1, 0.3, 1), transform 0.55s cubic-bezier(0.16, 1, 0.3, 1);
        }
        [data-stagger].is-visible > * {
            opacity: 1;
            transform: none;
        }

        /* ── MARQUEE LOGO STRIP ── */
        .marquee-outer {
            overflow: hidden;
            width: 100%;
            position: relative;
        }
        .marquee-outer::before,
        .marquee-outer::after {
            content: '';
            position: absolute;
            top: 0; bottom: 0;
            width: 80px;
            z-index: 2;
            pointer-events: none;
        }
        .marquee-outer::before {
            left: 0;
            background: linear-gradient(to right, #FFFFFF, transparent);
        }
        .marquee-outer::after {
            right: 0;
            background: linear-gradient(to left, #FFFFFF, transparent);
        }
        .marquee-track {
            display: flex;
            gap: 1.5rem;
            width: max-content;
            animation: marquee-scroll 32s linear infinite;
        }
        .marquee-track:hover { animation-play-state: paused; }
        @keyframes marquee-scroll {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* ── COUNTER ANIMATION ── */
        .counter-num {
            display: inline-block;
            font-variant-numeric: tabular-nums;
        }

        /* ── GLOWING PULSE DOT ── */
        @keyframes pulse-ring {
            0%   { transform: scale(1); opacity: 0.8; }
            70%  { transform: scale(2.2); opacity: 0; }
            100% { transform: scale(2.2); opacity: 0; }
        }
        .pulse-dot {
            position: relative;
            display: inline-flex;
            width: 8px; height: 8px;
        }
        .pulse-dot::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: var(--blue-400);
            animation: pulse-ring 1.8s ease-out infinite;
        }
        .pulse-dot::after {
            content: '';
            position: absolute;
            inset: 1px;
            border-radius: 50%;
            background: var(--blue-400);
        }

        /* ── SHINE HOVER EFFECT (cards) ── */
        .shine-hover {
            position: relative;
            overflow: hidden;
        }
        .shine-hover::after {
            content: '';
            position: absolute;
            top: -60%;
            left: -75%;
            width: 50%;
            height: 220%;
            background: linear-gradient(105deg, transparent 40%, rgba(255,255,255,0.18) 50%, transparent 60%);
            transform: skewX(-20deg);
            transition: left 0.6s ease;
            pointer-events: none;
        }
        .shine-hover:hover::after {
            left: 130%;
        }

        /* ── TYPEWRITER CURSOR ── */
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        .typewriter-cursor {
            display: inline-block;
            width: 2px;
            height: 1em;
            background: currentColor;
            margin-left: 2px;
            vertical-align: text-bottom;
            animation: blink 0.75s step-start infinite;
        }

        /* ── SENIOR DETAIL: VIEWPORT SCROLL PROGRESS INDICATOR ── */
        .scroll-progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 2.5px;
            background: linear-gradient(90deg, #1E2D7D 0%, #2563EB 50%, #60A5FA 100%);
            transform-origin: 0 50%;
            transform: scaleX(0);
            z-index: 999999;
            pointer-events: none;
            transition: transform 0.08s linear;
        }

        /* ── SENIOR DETAIL: TECHNICAL CAD CORNER RETICLES ── */
        .cad-bracket-box {
            position: relative;
        }
        .cad-bracket-box::before,
        .cad-bracket-box::after {
            content: '';
            position: absolute;
            width: 14px;
            height: 14px;
            pointer-events: none;
            z-index: 6;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .cad-bracket-box::before {
            top: -1px;
            left: -1px;
            border-top: 2px solid var(--brand-primary);
            border-left: 2px solid var(--brand-primary);
            border-top-left-radius: inherit;
        }
        .cad-bracket-box::after {
            bottom: -1px;
            right: -1px;
            border-bottom: 2px solid var(--brand-primary);
            border-right: 2px solid var(--brand-primary);
            border-bottom-right-radius: inherit;
        }
        .cad-bracket-box:hover::before,
        .cad-bracket-box:hover::after {
            border-color: #2563EB;
            width: 22px;
            height: 22px;
        }

        /* ── SENIOR DETAIL: SPOTLIGHT CARD SHEEN (LINEAR / APPLE PRO STYLE) ── */
        .spotlight-card {
            position: relative;
            overflow: hidden;
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
        }
        .spotlight-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: radial-gradient(420px circle at var(--mouse-x, -999px) var(--mouse-y, -999px), rgba(30, 45, 125, 0.07), transparent 72%);
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 3;
        }
        .spotlight-card:hover::after {
            opacity: 1;
        }

        /* ── SENIOR DETAIL: LIVE RADAR PULSE INDICATOR ── */
        @keyframes radar-ping {
            0%   { transform: scale(0.9); opacity: 0.9; }
            70%  { transform: scale(2.4); opacity: 0; }
            100% { transform: scale(2.4); opacity: 0; }
        }
        .pulse-radar-wrap {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 9px;
            height: 9px;
            margin-right: 2px;
        }
        .pulse-radar-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10B981;
            position: relative;
            z-index: 2;
            box-shadow: 0 0 6px rgba(16, 185, 129, 0.5);
        }
        .pulse-radar-ring {
            position: absolute;
            inset: -2px;
            border-radius: 50%;
            border: 1.5px solid #10B981;
            animation: radar-ping 2.2s cubic-bezier(0, 0, 0.2, 1) infinite;
            pointer-events: none;
        }

        /* ── SENIOR DETAIL: TACTICAL DEFENSE BUTTON HAPTICS & SHEEN ── */
        .btn-tactical,
        .btn-hero-primary,
        .btn-nav-rfq,
        .btn-act-rfq,
        .btn-rfq-banner,
        .hud-rfq-btn,
        .btn-navy {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.25s cubic-bezier(0.16, 1, 0.3, 1),
                        background-color 0.2s ease,
                        border-color 0.2s ease;
        }
        .btn-tactical::before,
        .btn-hero-primary::before,
        .btn-nav-rfq::before,
        .btn-act-rfq::before,
        .btn-rfq-banner::before,
        .hud-rfq-btn::before,
        .btn-navy::before {
            content: '';
            position: absolute;
            top: 0;
            left: -120%;
            width: 80%;
            height: 100%;
            background: linear-gradient(115deg, transparent 20%, rgba(255, 255, 255, 0.22) 50%, transparent 80%);
            transform: skewX(-22deg);
            transition: left 0.55s ease;
            pointer-events: none;
            z-index: 1;
        }
        .btn-tactical:hover::before,
        .btn-hero-primary:hover::before,
        .btn-nav-rfq:hover::before,
        .btn-act-rfq:hover::before,
        .btn-rfq-banner:hover::before,
        .hud-rfq-btn:hover::before,
        .btn-navy:hover::before {
            left: 140%;
        }
        .btn-tactical:active,
        .btn-hero-primary:active,
        .btn-nav-rfq:active,
        .btn-act-rfq:active,
        .btn-rfq-banner:active,
        .hud-rfq-btn:active,
        .btn-navy:active,
        .btn-hero-outline:active,
        .btn-act-inspect:active {
            transform: scale(0.975) translateY(1px) !important;
            box-shadow: 0 2px 6px rgba(30, 45, 125, 0.2) !important;
        }
        .btn-hero-primary i,
        .btn-nav-rfq i,
        .btn-act-rfq i,
        .btn-rfq-banner i,
        .hud-rfq-btn i {
            transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            display: inline-block;
        }
        .btn-hero-primary:hover i,
        .btn-nav-rfq:hover i,
        .btn-act-rfq:hover i,
        .btn-rfq-banner:hover i,
        .hud-rfq-btn:hover i {
            transform: translateX(3px);
        }

        /* ── SENIOR DETAIL: ACCESSIBILITY & FOCUS-VISIBLE RIGOR ── */
        button:focus-visible,
        a:focus-visible,
        input:focus-visible,
        select:focus-visible {
            outline: 2px solid #2563EB !important;
            outline-offset: 2.5px !important;
        }

        /* ── SENIOR DETAIL: HARDWARE VIEWFINDER CAD CORNERS (Optical Sensor Reticle) ── */
        .hardware-viewfinder {
            position: relative;
        }
        .hardware-viewfinder::before,
        .hardware-viewfinder::after {
            content: '';
            position: absolute;
            width: 8px;
            height: 8px;
            pointer-events: none;
            z-index: 5;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            opacity: 0.35;
        }
        .hardware-viewfinder::before {
            top: 8px;
            left: 8px;
            border-top: 1.5px solid var(--brand-primary);
            border-left: 1.5px solid var(--brand-primary);
        }
        .hardware-viewfinder::after {
            bottom: 8px;
            right: 8px;
            border-bottom: 1.5px solid var(--brand-primary);
            border-right: 1.5px solid var(--brand-primary);
        }
        .hardware-viewfinder:hover::before,
        .hardware-viewfinder:hover::after,
        .product-card-clean:hover .hardware-viewfinder::before,
        .product-card-clean:hover .hardware-viewfinder::after {
            opacity: 1;
            width: 14px;
            height: 14px;
            border-color: #2563EB;
        }

        /* ── SENIOR DETAIL: FLOATING DEFENSE HUD ── */
        .defense-floating-hud {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9990;
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid var(--border-light);
            border-radius: 50px;
            padding: 5px 6px;
            box-shadow: 0 10px 32px rgba(15, 23, 42, 0.12);
            transform: translateY(80px);
            opacity: 0;
            pointer-events: none;
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.35s ease;
        }
        .defense-floating-hud.is-visible {
            transform: translateY(0);
            opacity: 1;
            pointer-events: auto;
        }
        .hud-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: none;
            background: transparent;
            cursor: pointer;
            font-family: var(--font-head);
            font-size: 0.8rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            transition: all 0.2s ease;
            text-decoration: none;
            white-space: nowrap;
        }
        .hud-rfq-btn {
            background: var(--brand-primary);
            color: #FFFFFF;
            box-shadow: 0 2px 8px rgba(30, 45, 125, 0.25);
        }
        .hud-rfq-btn:hover {
            background: var(--brand-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(30, 45, 125, 0.35);
        }
        .hud-top-btn {
            width: 32px;
            height: 32px;
            padding: 0;
            justify-content: center;
            color: var(--text-body);
            background: #F1F5F9;
            border-radius: 50%;
        }
        .hud-top-btn:hover {
            background: #E2E8F0;
            color: var(--brand-primary);
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .defense-floating-hud {
                bottom: calc(14px + env(safe-area-inset-bottom, 0px));
                right: 14px;
                padding: 4px;
                gap: 5px;
            }
            .hud-rfq-btn {
                padding: 6px 11px;
                font-size: 0.76rem;
            }
            .hud-top-btn {
                width: 28px;
                height: 28px;
                font-size: 0.8rem;
            }
        }
        @media (max-width: 480px) {
            .defense-floating-hud {
                bottom: calc(10px + env(safe-area-inset-bottom, 0px));
                right: 10px;
                padding: 3px;
                gap: 4px;
            }
            .hud-rfq-btn {
                padding: 5px 9px;
                font-size: 0.72rem;
            }
        }

        /* Automatically hide floating HUD when mobile menu or modal is open */
        body.drawer-open .defense-floating-hud,
        body.modal-open .defense-floating-hud,
        .nav-mobile.open ~ .defense-floating-hud,
        .modal-overlay.open ~ .defense-floating-hud {
            display: none !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }

        /* ── 3D HERO CANVAS ── */
        #hero-canvas,
        .hero-3d-canvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
        .corporate-hero-clean,
        .ref-page-header,
        .cert-page-header,
        .contact-page-header,
        .page-header-corporate {
            position: relative;
            overflow: hidden;
        }
        .ref-page-header > .container,
        .cert-page-header > .container,
        .contact-page-header > .container,
        .page-header-corporate > .container {
            position: relative;
            z-index: 2;
        }
        body { font-family: var(--font-body); background: var(--bg-body); color: var(--text-body); line-height: 1.6; overflow-x: hidden; }
        img, video { max-width: 100%; display: block; }
        a { color: inherit; text-decoration: none; }
        .container { width: 100%; max-width: 1380px; margin: 0 auto; padding: 0 1.5rem; }

        /* ── DEFENSE TOP UTILITY BAR (Corporate Light, Clean) ── */
        .defense-topbar {
            background: #F8FAFC;
            border-bottom: 1px solid var(--border-light);
            font-size: 0.72rem;
            color: var(--text-muted);
            position: relative;
            z-index: 9002;
            line-height: 1;
        }
        .defense-topbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 40px;
            gap: 1.5rem;
        }
        .defense-topbar-left {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            white-space: nowrap;
        }
        .defense-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            color: var(--text-heading);
            font-weight: 700;
            font-family: var(--font-mono);
            font-size: 0.7rem;
            letter-spacing: 0.04em;
        }
        .defense-status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #10B981;
            box-shadow: 0 0 6px rgba(16, 185, 129, 0.6);
            display: inline-block;
        }
        .topbar-sep {
            color: var(--border-med);
            font-size: 0.72rem;
            user-select: none;
        }
        .defense-topbar-item {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--text-body);
            font-size: 0.71rem;
            white-space: nowrap;
        }
        .defense-topbar-item i {
            color: var(--brand-primary);
            font-size: 0.82rem;
        }
        .defense-topbar-item strong {
            color: var(--text-heading);
            font-weight: 600;
        }
        .defense-topbar-right {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            white-space: nowrap;
        }
        .defense-topbar-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--text-body);
            transition: color var(--tr);
            font-size: 0.72rem;
            white-space: nowrap !important;
            text-decoration: none;
            font-weight: 500;
        }
        .defense-topbar-link:hover {
            color: var(--brand-primary);
        }
        .defense-topbar-link i {
            color: var(--brand-primary);
            font-size: 0.78rem;
        }
        .defense-topbar-link span {
            white-space: nowrap !important;
        }

        /* Segmented Language Switcher */
        .defense-lang-toggle {
            display: inline-flex;
            align-items: center;
            background: #FFFFFF;
            border: 1px solid var(--border-med);
            border-radius: 4px;
            padding: 2px;
            white-space: nowrap;
        }
        .defense-lang-toggle a {
            padding: 2px 8px;
            font-family: var(--font-mono);
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--text-muted);
            border-radius: 3px;
            transition: all var(--tr);
            text-decoration: none;
            line-height: 1.3;
        }
        .defense-lang-toggle a:hover {
            color: var(--brand-primary);
        }
        .defense-lang-toggle a.active {
            color: #FFFFFF;
            background: var(--brand-primary);
        }

        /* Segmented Theme Switcher */
        .defense-theme-toggle {
            display: inline-flex;
            align-items: center;
            background: #FFFFFF;
            border: 1px solid var(--border-med);
            border-radius: 4px;
            padding: 2px;
            white-space: nowrap;
        }
        .defense-theme-toggle .theme-toggle-btn {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 8px;
            font-family: var(--font-mono);
            font-size: 0.68rem;
            font-weight: 700;
            color: var(--text-muted);
            background: transparent;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: all var(--tr);
            line-height: 1.3;
        }
        .defense-theme-toggle .theme-toggle-btn:hover {
            color: var(--brand-primary);
        }
        .defense-theme-toggle .theme-toggle-btn.active {
            color: #FFFFFF;
            background: var(--brand-primary);
        }

        @media (max-width: 1040px) {
            .defense-topbar-left .topbar-extra { display: none; }
        }
        @media (max-width: 768px) {
            .defense-topbar { display: none; }
        }

        /* ── PRIMARY CORPORATE NAVBAR (Clean White, Logo Accent) ── */
        .nav-root {
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9000;
            background: #FFFFFF;
            border-bottom: 1px solid var(--border-light);
            box-shadow: 0 2px 14px rgba(15, 23, 42, 0.05);
            transition: all var(--tr);
        }
        .nav-root.scrolled {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.08);
            border-bottom-color: var(--border-light);
        }
        .nav-container {
            width: 100%;
            max-width: 1440px;
            margin-left: auto;
            margin-right: auto;
            padding-left: clamp(1rem, 2.5vw, 2.5rem);
            padding-right: clamp(1rem, 2.5vw, 2.5rem);
        }
        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 78px;
            gap: 1rem;
        }
        .nav-logo-group {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            text-decoration: none;
            flex-shrink: 0;
            margin-right: 1.25rem;
        }
        .nav-logo-img {
            height: 44px;
            width: auto;
            object-fit: contain;
        }
        .nav-brand-badge {
            display: flex;
            flex-direction: column;
            border-left: 1.5px solid var(--border-light);
            padding-left: 0.85rem;
        }
        .nav-brand-title {
            font-family: var(--font-head);
            font-size: 1.05rem;
            font-weight: 800;
            letter-spacing: 0.03em;
            color: var(--brand-primary);
            text-transform: uppercase;
            line-height: 1.1;
        }
        .nav-brand-subtitle {
            font-family: var(--font-mono);
            font-size: 0.62rem;
            color: var(--text-muted);
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: clamp(0.1rem, 0.3vw, 0.4rem);
            list-style: none;
            margin: 0;
            padding: 0;
            height: 78px;
        }
        .nav-menu > li {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
        }
        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0 clamp(0.35rem, 0.55vw, 0.75rem);
            height: 100%;
            font-family: var(--font-head);
            font-size: clamp(0.78rem, 0.82vw, 0.88rem);
            font-weight: 600;
            color: var(--text-body);
            transition: color var(--tr);
            white-space: nowrap;
            position: relative;
            text-decoration: none;
        }
        .nav-link:hover {
            color: var(--brand-primary);
        }
        .nav-link.active {
            color: var(--brand-primary);
            font-weight: 700;
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 1rem;
            right: 1rem;
            height: 3px;
            background: var(--brand-primary);
            border-radius: 3px 3px 0 0;
            box-shadow: 0 2px 8px rgba(30, 45, 125, 0.4);
        }

        /* ── CORPORATE MEGA DROPDOWN (Clean White) ── */
        .mega-dropdown {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            width: 820px;
            background: #FFFFFF;
            border: 1px solid var(--border-light);
            border-radius: var(--r-md);
            padding: 1.5rem;
            opacity: 0;
            visibility: hidden;
            transition: all var(--tr);
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.1);
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.9rem;
            z-index: 9100;
        }
        .nav-menu > li:hover .mega-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }
        .mega-dropdown-item {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            padding: 0.9rem 1.1rem;
            background: #F8FAFC;
            border: 1px solid var(--border-light);
            border-radius: var(--r-sm);
            transition: all var(--tr);
            text-decoration: none;
        }
        .mega-dropdown-item:hover {
            border-color: var(--brand-primary);
            background: var(--brand-light);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(30, 45, 125, 0.08);
        }
        .mega-dropdown-item-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .mega-dropdown-title {
            font-family: var(--font-head);
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--text-heading);
            transition: color var(--tr);
        }
        .mega-dropdown-item:hover .mega-dropdown-title {
            color: var(--brand-primary);
        }
        .mega-dropdown-count {
            font-family: var(--font-mono);
            font-size: 0.65rem;
            padding: 2px 7px;
            background: #EFF6FF;
            color: var(--brand-primary);
            border-radius: 4px;
            font-weight: 700;
            border: 1px solid #DBEAFE;
        }
        .mega-dropdown-desc {
            font-size: 0.75rem;
            color: var(--text-muted);
            line-height: 1.4;
        }

        /* ── NAV ACTIONS ── */
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-shrink: 0;
        }
        .btn-nav-rfq {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.6rem 1.15rem;
            font-family: var(--font-head);
            font-size: 0.82rem;
            font-weight: 700;
            color: #FFFFFF;
            background: var(--brand-primary);
            border: 1px solid var(--brand-primary);
            border-radius: var(--r-sm);
            box-shadow: 0 4px 14px rgba(30, 45, 125, 0.25);
            transition: all var(--tr);
            cursor: pointer;
            white-space: nowrap;
        }
        .btn-nav-rfq:hover {
            background: var(--brand-hover);
            border-color: var(--brand-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(30, 45, 125, 0.35);
            color: #FFFFFF;
        }

        .nav-hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 0.5rem;
            border: none;
            background: none;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            z-index: 9005;
        }
        .nav-hamburger span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--brand-primary);
            border-radius: 2px;
            transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.2s ease;
            transform-origin: center;
        }
        .nav-hamburger[aria-expanded="true"] span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }
        .nav-hamburger[aria-expanded="true"] span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }
        .nav-hamburger[aria-expanded="true"] span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* ── MOBILE DRAWER ── */
        .nav-mobile {
            display: none;
            position: fixed;
            top: 78px;
            left: 0;
            right: 0;
            bottom: 0;
            height: calc(100vh - 78px);
            height: calc(100dvh - 78px);
            background: #FFFFFF;
            z-index: 8999;
            padding: 1rem 1.25rem calc(2rem + env(safe-area-inset-bottom, 0px));
            flex-direction: column;
            gap: 0.35rem;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            border-top: 1px solid var(--border-light);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        .nav-mobile.open { display: flex; }
        .nav-mobile a {
            display: block;
            padding: 0.85rem 1rem;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-heading);
            border-bottom: 1px solid var(--border-light);
            transition: color var(--tr), background var(--tr);
            text-decoration: none;
            border-radius: var(--r-xs);
        }
        .nav-mobile a:hover,
        .nav-mobile a:active {
            color: var(--brand-primary);
            background: var(--brand-light);
        }
        .nav-mobile-group {
            font-family: var(--font-head);
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--brand-primary);
            padding: 0.75rem 1rem 0.25rem;
            margin-top: 0.5rem;
        }

        @media (max-width: 1240px) {
            .nav-menu { display: none !important; }
            .btn-nav-rfq { display: none !important; }
            .nav-hamburger { display: flex !important; }
        }

        /* ── SHARED CORPORATE ATOMS ── */
        .section-tagline {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: var(--font-head);
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: var(--blue-600);
            margin-bottom: 0.85rem;
        }
        .section-tagline::before {
            content: '';
            display: inline-block;
            width: 16px;
            height: 2px;
            background: var(--blue-600);
        }
        .section-headline {
            font-family: var(--font-head);
            font-size: clamp(2rem, 3.2vw + 0.5rem, 3rem);
            font-weight: 800;
            letter-spacing: -0.025em;
            line-height: 1.15;
            color: var(--navy-900);
            margin-bottom: 1rem;
        }
        .section-lead {
            font-size: 1.05rem;
            color: var(--text-muted);
            line-height: 1.75;
            max-width: 65ch;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.75rem;
            font-family: var(--font-head);
            font-size: 0.92rem;
            font-weight: 700;
            color: #FFFFFF;
            background: var(--blue-600);
            border: 1px solid var(--blue-600);
            border-radius: var(--r-sm);
            cursor: pointer;
            transition: all var(--tr);
            box-shadow: 0 2px 8px rgba(0, 86, 179, 0.25);
            white-space: nowrap;
        }
        .btn-primary:hover {
            background: #004494;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 86, 179, 0.35);
            color: #FFFFFF;
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.75rem;
            font-family: var(--font-head);
            font-size: 0.92rem;
            font-weight: 700;
            color: var(--navy-900);
            background: #FFFFFF;
            border: 1.5px solid var(--border-med);
            border-radius: var(--r-sm);
            cursor: pointer;
            transition: all var(--tr);
            white-space: nowrap;
        }
        .btn-outline:hover {
            border-color: var(--blue-600);
            color: var(--blue-600);
            background: var(--blue-50);
            transform: translateY(-2px);
        }

        /* ── FLASH NOTIFICATIONS ── */
        .flash-wrap {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }
        .flash-msg {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.9rem 1.4rem;
            background: #FFFFFF;
            border-radius: var(--r-sm);
            box-shadow: var(--shadow-lg);
            font-size: 0.9rem;
            font-weight: 600;
            border-left: 4px solid;
            animation: slideInRight 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .flash-success { border-color: var(--emerald-600); color: var(--navy-900); }
        .flash-error   { border-color: #DC2626; color: var(--navy-900); }
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* ── INSTITUTIONAL DEFENSE FOOTER ── */
        .site-footer {
            background: var(--navy-950);
            color: #94A3B8;
            padding: 5rem 0 2.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr 1.2fr;
            gap: 3.5rem;
            margin-bottom: 4rem;
        }
        @media (max-width: 1024px) {
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 2.5rem; }
        }
        @media (max-width: 640px) {
            .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
        }
        .footer-brand {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .footer-brand-title {
            font-family: var(--font-head);
            font-size: 1.15rem;
            font-weight: 800;
            color: #FFFFFF;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }
        .footer-brand-desc {
            font-size: 0.88rem;
            color: #94A3B8;
            line-height: 1.7;
        }
        .footer-cage-box {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--r-sm);
            padding: 0.85rem 1.1rem;
            margin-top: 0.5rem;
        }
        .footer-cage-box .label {
            display: block;
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #64748B;
            margin-bottom: 0.2rem;
            font-family: var(--font-mono);
        }
        .footer-cage-box .value {
            font-family: var(--font-mono);
            font-size: 0.82rem;
            font-weight: 700;
            color: #60A5FA;
        }
        .footer-col-title {
            font-family: var(--font-head);
            font-size: 0.95rem;
            font-weight: 700;
            color: #FFFFFF;
            letter-spacing: 0.02em;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
        }
        .footer-links a {
            font-size: 0.85rem;
            color: #94A3B8;
            transition: color var(--tr);
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            text-decoration: none;
        }
        .footer-links a:hover {
            color: #FFFFFF;
        }
        .footer-links a i {
            font-size: 0.72rem;
            color: #3B82F6;
        }
        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            font-size: 0.85rem;
            color: #94A3B8;
            margin-bottom: 0.85rem;
            line-height: 1.5;
        }
        .footer-contact-item i {
            color: #60A5FA;
            font-size: 1rem;
            margin-top: 0.15rem;
            flex-shrink: 0;
        }
        .footer-contact-item a:hover { color: #FFFFFF; }
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1.5rem;
            font-size: 0.8rem;
            color: #64748B;
        }
        .footer-bottom a { color: #94A3B8; transition: color var(--tr); }
        .footer-bottom a:hover { color: #FFFFFF; }
        .footer-social {
            display: flex;
            gap: 1rem;
        }
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #CBD5E1;
            transition: all var(--tr);
            text-decoration: none;
        }
        .footer-social a:hover {
            background: var(--blue-600);
            color: #FFFFFF;
            border-color: var(--blue-600);
            transform: translateY(-2px);
        }

        /* ── DEFENSE RFQ MODAL ── */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(5, 13, 26, 0.75);
            backdrop-filter: blur(6px);
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            opacity: 0;
            visibility: hidden;
            transition: all var(--tr);
        }
        .modal-overlay.open {
            opacity: 1;
            visibility: visible;
        }
        .modal-card {
            background: #FFFFFF;
            border-radius: var(--r-md);
            max-width: 640px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--border-med);
            transform: translateY(20px);
            transition: transform var(--tr);
        }
        .modal-overlay.open .modal-card {
            transform: translateY(0);
        }
        .modal-header {
            background: var(--brand-primary);
            color: #FFFFFF;
            padding: 1.5rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .modal-title {
            font-family: var(--font-head);
            font-size: 1.15rem;
            font-weight: 800;
        }
        .modal-subtitle {
            font-size: 0.78rem;
            color: #94A3B8;
            margin-top: 0.2rem;
            font-family: var(--font-mono);
        }
        .modal-close {
            background: none;
            border: none;
            color: #94A3B8;
            font-size: 1.4rem;
            cursor: pointer;
            transition: color var(--tr);
        }
        .modal-close:hover { color: #FFFFFF; }
        .modal-body {
            padding: 1.75rem;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        @media (max-width: 600px) {
            .form-row { grid-template-columns: 1fr; }
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            font-family: var(--font-head);
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--navy-900);
            margin-bottom: 0.35rem;
        }
        .form-control {
            width: 100%;
            padding: 0.7rem 0.95rem;
            border: 1.5px solid var(--border-light);
            border-radius: var(--r-sm);
            font-family: var(--font-body);
            font-size: 0.9rem;
            color: var(--text-heading);
            background: #FFFFFF;
            transition: all var(--tr);
        }
        .form-control:focus {
            outline: none;
            border-color: var(--blue-600);
            box-shadow: 0 0 0 3px rgba(0, 86, 179, 0.12);
        }
        textarea.form-control {
            resize: vertical;
            min-height: 90px;
        }

        /* ── RFQ MODAL (DENEY TALEP FORMU) DUAL THEME SYSTEM ── */
        .rfq-modal-header {
            padding: 1.5rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1.5px solid #BFDBFE;
            background: #FFFFFF;
        }
        .rfq-modal-title {
            font-family: var(--font-head);
            font-size: 1.35rem;
            font-weight: 800;
            color: #2F80ED;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .rfq-modal-subtitle {
            font-family: var(--font-mono);
            font-size: 0.8rem;
            font-weight: 700;
            color: #2F80ED;
            letter-spacing: 0.04em;
            margin-top: 0.2rem;
        }
        .rfq-form-label {
            display: block;
            font-family: var(--font-head);
            font-size: 0.92rem;
            font-weight: 700;
            color: #2F80ED;
            margin-bottom: 0.35rem;
        }
        .rfq-form-sublabel {
            font-size: 0.78rem;
            font-weight: 600;
            color: #0284C7;
            display: block;
            margin-top: 0.25rem;
        }
        .rfq-power-toggle {
            display: flex;
            border: 1px solid #CBD5E1;
            border-radius: 6px;
            background: #F8FAFC;
            overflow: hidden;
            height: 38px;
        }
        .rfq-power-toggle input[type="radio"] {
            display: none;
        }
        .rfq-power-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.92rem;
            color: #475569;
            background: #FFFFFF;
            cursor: pointer;
            margin: 0;
            transition: all 0.15s ease;
            user-select: none;
        }
        .rfq-power-btn:first-of-type {
            border-right: 1px solid #CBD5E1;
        }
        .rfq-power-toggle input[type="radio"]:checked + .rfq-power-btn {
            background: #2F80ED;
            color: #FFFFFF;
        }
        .rfq-contact-box {
            background: #F8FAFC;
            border: 1px dashed #CBD5E1;
            border-radius: 6px;
            padding: 1.1rem 1.25rem;
            margin-bottom: 1.5rem;
        }
        .rfq-contact-title {
            font-family: var(--font-head);
            font-size: 0.95rem;
            font-weight: 700;
            color: #0F172A;
            margin-bottom: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        .rfq-contact-label {
            font-size: 0.82rem;
            font-weight: 700;
            color: #334155;
            display: block;
            margin-bottom: 0.2rem;
        }

        /* Responsive Modal Grids & Controls */
        .rfq-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        .rfq-grid-3 {
            display: grid;
            grid-template-columns: 1fr 1.3fr 1fr;
            gap: 0.85rem;
        }
        .rfq-grid-devre {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            align-items: start;
        }
        .rfq-dim-wrap {
            max-width: 280px;
        }
        .rfq-upload-row {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        .rfq-upload-row .rfq-form-label {
            min-width: 130px;
            margin: 0;
        }
        .rfq-upload-controls {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        .rfq-upload-btn {
            background: #2F80ED !important;
            border: none !important;
            padding: 0.5rem 1.4rem !important;
            font-weight: 700 !important;
            border-radius: 6px;
            color: #FFFFFF !important;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }
        .rfq-upload-btn:hover {
            background: #1E70BF !important;
        }
        .rfq-filename {
            font-size: 0.85rem;
            color: #64748B;
            font-style: italic;
        }
        .rfq-contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.85rem;
        }
        .rfq-modal-footer-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 1.25rem;
            padding-top: 1rem;
            border-top: 1px solid var(--border-light);
        }
        .rfq-modal-footer-actions .rfq-btn-group {
            display: flex;
            gap: 0.6rem;
            align-items: center;
        }
        .rfq-btn-fullpage {
            font-size: 0.88rem;
            padding: 0.55rem 1.1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }
        .rfq-btn-submit {
            background: linear-gradient(135deg, #2F80ED 0%, #1E70BF 100%) !important;
            border: none !important;
            font-weight: 700 !important;
            padding: 0.6rem 1.35rem !important;
            color: #FFFFFF !important;
            border-radius: var(--r-sm);
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .rfq-grid-3 {
                grid-template-columns: 1fr;
                gap: 0.85rem;
            }
        }

        @media (max-width: 600px) {
            .rfq-modal-header {
                padding: 1rem 1.15rem;
            }
            .rfq-modal-title {
                font-size: 1.15rem;
            }
            .rfq-modal-subtitle {
                font-size: 0.72rem;
                line-height: 1.4;
            }
            .modal-card {
                margin: 0.5rem auto;
                max-height: 94vh;
                border-radius: 8px;
                width: calc(100% - 1rem);
            }
            .rfq-modal-body {
                padding: 1rem 0.85rem !important;
            }
            .rfq-grid-2 {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }
            .rfq-grid-devre {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }
            .rfq-power-toggle {
                width: 100%;
                max-width: 100%;
                height: 42px;
            }
            .rfq-power-btn {
                font-size: 1rem;
            }
            .rfq-dim-wrap {
                max-width: 100%;
            }
            .rfq-upload-row {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
            }
            .rfq-upload-row .rfq-form-label {
                min-width: 100%;
            }
            .rfq-upload-controls {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
                gap: 0.4rem;
            }
            .rfq-upload-btn {
                width: 100% !important;
                justify-content: center !important;
                padding: 0.75rem 1rem !important;
            }
            .rfq-filename {
                text-align: center;
                display: block;
                word-break: break-all;
            }
            .rfq-contact-box {
                padding: 0.85rem 0.75rem;
            }
            .rfq-contact-grid {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }
            .rfq-modal-footer-actions {
                flex-direction: column-reverse;
                gap: 0.75rem;
                width: 100%;
            }
            .rfq-modal-footer-actions .rfq-btn-group {
                display: flex;
                flex-direction: column;
                width: 100%;
                gap: 0.6rem;
            }
            .rfq-modal-footer-actions button,
            .rfq-modal-footer-actions a {
                width: 100% !important;
                justify-content: center !important;
                text-align: center !important;
                padding: 0.85rem 1rem !important;
                box-sizing: border-box !important;
            }
            #rfqModal .form-control {
                font-size: 16px !important;
            }
        }

        /* Dark Mode for RFQ Modal */
        [data-theme="dark"] .rfq-modal-header {
            border-bottom: 1px solid #1E293B !important;
            background: #11192E !important;
        }
        [data-theme="dark"] .rfq-modal-title {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .rfq-modal-subtitle {
            color: #93C5FD !important;
        }
        [data-theme="dark"] .rfq-form-label {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .rfq-form-sublabel {
            color: #94A3B8 !important;
        }
        [data-theme="dark"] .rfq-power-toggle {
            border-color: #334155 !important;
            background: #131C31 !important;
        }
        [data-theme="dark"] .rfq-power-btn {
            background: #131C31 !important;
            color: #94A3B8 !important;
            border-right-color: #334155 !important;
        }
        [data-theme="dark"] .rfq-power-toggle input[type="radio"]:checked + .rfq-power-btn {
            background: #2563EB !important;
            color: #FFFFFF !important;
        }
        [data-theme="dark"] .rfq-contact-box {
            background: #11192E !important;
            border-color: #334155 !important;
        }
        [data-theme="dark"] .rfq-contact-title {
            color: #F8FAFC !important;
        }
        [data-theme="dark"] .rfq-contact-title i {
            color: #38BDF8 !important;
        }
        [data-theme="dark"] .rfq-contact-label {
            color: #CBD5E1 !important;
        }
        [data-theme="dark"] .rfq-filename {
            color: #94A3B8 !important;
        }
        [data-theme="dark"] .rfq-modal-footer-actions {
            border-top-color: #1E293B !important;
        }
        [data-theme="dark"] #rfqModal .form-control {
            background: #131C31 !important;
            border: 1px solid #334155 !important;
            color: #F8FAFC !important;
        }
        [data-theme="dark"] #rfqModal .form-control:focus {
            border-color: #38BDF8 !important;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2) !important;
        }
        [data-theme="dark"] #rfqModal select.form-control option {
            background: #131C31 !important;
            color: #F8FAFC !important;
        }
    </style>
    @stack('styles')
</head>
<body>
<div id="scrollProgressBar" class="scroll-progress-bar" aria-hidden="true"></div>

{{-- DEFENSE TOP UTILITY BAR (Clean, Single-line, No Wrapping) --}}
<div class="defense-topbar">
    <div class="nav-container defense-topbar-inner">
        <div class="defense-topbar-left">
            <div class="defense-status-pill">
                <span class="pulse-radar-wrap">
                    <span class="pulse-radar-dot"></span>
                    <span class="pulse-radar-ring"></span>
                </span>
                <span>{{ $isEn ? 'CAGE CODE: ' : 'CAGE SİCİL: ' }}{{ \App\Models\Setting::get('contact_nato_cage', 'TR-EMC01') }}</span>
            </div>
            <span class="topbar-sep">|</span>
            <div class="defense-topbar-item">
                <i class="bi bi-shield-check"></i>
                <span>{{ $isEn ? \App\Models\Setting::get('nav_clearance_en', 'DEFENSE FACILITY SECURITY & QUALITY ACCREDITATION') : \App\Models\Setting::get('nav_clearance_tr', 'SAVUNMA SANAYİİ VE TESİS GÜVENLİK AKREDİTASYONU') }}</span>
            </div>
            <span class="topbar-sep topbar-extra">|</span>
            <div class="defense-topbar-item topbar-extra">
                <span>{{ $isEn ? \App\Models\Setting::get('nav_iso_en', 'ISO 9001:2015 • ISO 17025') : \App\Models\Setting::get('nav_iso_tr', 'ISO 9001:2015 • ISO 17025') }}</span>
            </div>
        </div>
        <div class="defense-topbar-right">
            <a href="mailto:{{ \App\Models\Setting::get('contact_email', 'defence@emcelectronic.com') }}" class="defense-topbar-link">
                <i class="bi bi-envelope-fill"></i> <span>{{ \App\Models\Setting::get('contact_email', 'defence@emcelectronic.com') }}</span>
            </a>
            <div class="defense-lang-toggle">
                <a href="{{ route('lang.switch', 'tr') }}" class="{{ !$isEn ? 'active' : '' }}" title="Türkçe">TR</a>
                <a href="{{ route('lang.switch', 'en') }}" class="{{ $isEn ? 'active' : '' }}" title="English">EN</a>
            </div>
            <div class="defense-theme-toggle" id="defenseThemeToggle" role="group" aria-label="Theme Selection">
                <button type="button" class="theme-toggle-btn active" data-theme-val="light" title="{{ $isEn ? 'Light Theme' : 'Açık Tema' }}">
                    <i class="bi bi-sun-fill"></i> <span>{{ $isEn ? 'LIGHT' : 'AÇIK' }}</span>
                </button>
                <button type="button" class="theme-toggle-btn" data-theme-val="dark" title="{{ $isEn ? 'Dark Theme' : 'Koyu Tema' }}">
                    <i class="bi bi-moon-stars-fill"></i> <span>{{ $isEn ? 'DARK' : 'KOYU' }}</span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- PRIMARY CORPORATE NAVBAR (Deep Executive Defense Navy) --}}
<nav class="nav-root" id="mainNav">
    <div class="nav-container nav-inner">
        <a href="{{ route('home') }}" class="nav-logo-group">
            <img src="{{ asset('images/logo_icon.png') }}" alt="EMC Defense" class="nav-logo-img">
            <div class="nav-brand-badge">
                <span class="nav-brand-title">{{ $isEn ? \App\Models\Setting::get('nav_brand_title_en', 'EMC DEFENSE') : \App\Models\Setting::get('nav_brand_title_tr', 'EMC SAVUNMA') }}</span>
                <span class="nav-brand-subtitle">{{ $isEn ? \App\Models\Setting::get('nav_brand_subtitle_en', 'EMI/EMC SOLUTIONS') : \App\Models\Setting::get('nav_brand_subtitle_tr', 'EMI/EMC SOLUTIONS') }}</span>
            </div>
        </a>

        <ul class="nav-menu">
            <li><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ $isEn ? \App\Models\Setting::get('nav_menu_home_en', 'Home') : \App\Models\Setting::get('nav_menu_home_tr', 'Ana Sayfa') }}</a></li>
            <li>
                <a class="nav-link" href="{{ route('home') }}#catalog">
                    {{ $isEn ? \App\Models\Setting::get('nav_menu_products_en', 'Products & Systems') : \App\Models\Setting::get('nav_menu_products_tr', 'Ürünler & Sistemler') }} <i class="bi bi-chevron-down" style="font-size:0.7rem;margin-left:2px;"></i>
                </a>
                <div class="mega-dropdown">
                    @php
                        $catMeta = [
                            'MARX GENERATOR' => [
                                'tr_desc' => 'MIL-STD-461G RS105 & HEMP Darbe Jeneratörleri',
                                'en_desc' => 'MIL-STD-461G RS105 & HEMP Pulse Generators'
                            ],
                            'Filters'        => [
                                'tr_desc' => 'SDIP-27 Level A & HEMP Güç/Sinyal Filtreleri',
                                'en_desc' => 'SDIP-27 Level A & HEMP Power/Data Filters'
                            ],
                            'Chambers'       => [
                                'tr_desc' => 'Yarı ve Tam Yankısız Askeri Test Odaları',
                                'en_desc' => 'Turnkey Semi/Full Anechoic Shielded Chambers'
                            ],
                            'RF Absorbers'   => [
                                'tr_desc' => 'Ferrit Karo & Hibrit Piramit Soğurucular',
                                'en_desc' => 'Ferrite Tile & Hybrid Pyramidal RF Absorbers'
                            ],
                            'Antennas'       => [
                                'tr_desc' => 'Askeri Test & EMI Ölçüm Antenleri',
                                'en_desc' => 'Military & Compliance EMC Test Antennas'
                            ],
                            'LISN'           => [
                                'tr_desc' => 'Hat Empedans Stabilizasyon Şebekeleri',
                                'en_desc' => 'Line Impedance Stabilization Networks (50 μH)'
                            ],
                            'CDN'            => [
                                'tr_desc' => 'Bağlaşım ve Ayrıştırma Şebekeleri',
                                'en_desc' => 'Coupling & Decoupling Networks (IEC/MIL)'
                            ],
                            'Test Equipment' => [
                                'tr_desc' => 'Geçici Darbe Sınırlayıcılar ve Hedefler',
                                'en_desc' => 'Transient Limiters, High-Voltage Probes & Targets'
                            ],
                            'Used Equipment' => [
                                'tr_desc' => 'Sertifikalı Rohde & Schwarz / Keysight Cihazları',
                                'en_desc' => 'Certified Pre-Owned Rohde & Schwarz / Keysight'
                            ],
                        ];
                    @endphp
                    @foreach(\App\Models\Category::where('is_active', true)->orderBy('sort_order')->get() as $cat)
                        <a href="{{ route('home') }}#cat-{{ $cat->id }}" class="mega-dropdown-item">
                            <div class="mega-dropdown-item-top">
                                <span class="mega-dropdown-title">{{ $cat->name }}</span>
                                <span class="mega-dropdown-count">{{ $cat->activeProducts->count() }}</span>
                            </div>
                            <span class="mega-dropdown-desc">
                                {{ $isEn ? ($catMeta[$cat->name]['en_desc'] ?? 'Defense Testing Hardware') : ($catMeta[$cat->name]['tr_desc'] ?? 'Savunma Sanayii Test Donanımları') }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </li>
            @php
                $refPage = \App\Models\Page::where('slug', 'references')->first();
                $certPage = \App\Models\Page::where('slug', 'certificates')->first();
                $contactPage = \App\Models\Page::where('slug', 'contact')->first();
            @endphp
            <li><a class="nav-link" href="{{ route('home') }}#capabilities">{{ $isEn ? \App\Models\Setting::get('nav_menu_capabilities_en', 'Capabilities') : \App\Models\Setting::get('nav_menu_capabilities_tr', 'Yetkinlikler') }}</a></li>
            @if(!$refPage || ($refPage->is_active && $refPage->show_in_navbar))
                <li><a class="nav-link {{ request()->routeIs('references') ? 'active' : '' }}" href="{{ route('references') }}">{{ $isEn ? \App\Models\Setting::get('nav_menu_references_en', 'References') : \App\Models\Setting::get('nav_menu_references_tr', 'Referanslar') }}</a></li>
            @endif
            @if(!$certPage || ($certPage->is_active && $certPage->show_in_navbar))
                <li><a class="nav-link {{ request()->routeIs('certificates') ? 'active' : '' }}" href="{{ route('certificates') }}">{{ $isEn ? \App\Models\Setting::get('nav_menu_certificates_en', 'Certificates') : \App\Models\Setting::get('nav_menu_certificates_tr', 'Sertifikalar') }}</a></li>
            @endif
            @foreach(\App\Models\Page::where('is_active', true)->whereNotIn('slug', ['certificates', 'references', 'contact'])->where('show_in_navbar', true)->orderBy('sort_order')->get() as $customNavPage)
                <li><a class="nav-link {{ request()->is($customNavPage->slug) ? 'active' : '' }}" href="{{ url('/' . $customNavPage->slug) }}">{{ $customNavPage->title }}</a></li>
            @endforeach
            @if(!$contactPage || ($contactPage->is_active && $contactPage->show_in_navbar))
                <li><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">{{ $isEn ? \App\Models\Setting::get('nav_menu_contact_en', 'Contact') : \App\Models\Setting::get('nav_menu_contact_tr', 'İletişim') }}</a></li>
            @endif
        </ul>

        <div class="nav-actions">
            <button class="btn-nav-rfq" onclick="openRfqModal()">
                <i class="bi bi-file-earmark-text"></i> {{ $isEn ? \App\Models\Setting::get('nav_rfq_btn_en', 'Test Request Form (FR 7.1.4)') : \App\Models\Setting::get('nav_rfq_btn_tr', 'Deney Talep Formu (FR 7.1.4)') }}
            </button>

            <button class="nav-hamburger" id="hamburger" aria-label="{{ $isEn ? 'Toggle Menu' : 'Menüyü Aç/Kapat' }}">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>

{{-- MOBILE DRAWER --}}
<div class="nav-mobile" id="mobileDrawer">
    <div style="display:flex;align-items:center;justify-content:space-between;padding:0.25rem 0.25rem 0.75rem;margin-bottom:0.75rem;border-bottom:1px solid rgba(148,163,184,0.2);">
        <span style="font-family:var(--font-head);font-size:0.85rem;font-weight:800;letter-spacing:0.08em;color:var(--text-heading);text-transform:uppercase;">
            <i class="bi bi-shield-shaded text-primary me-1"></i> {{ $isEn ? 'Defense Navigation' : 'Savunma Menüsü' }}
        </span>
        <button type="button" onclick="closeMobileDrawer()" aria-label="Close menu" style="background:rgba(148,163,184,0.15);border:none;border-radius:6px;width:34px;height:34px;display:flex;align-items:center;justify-content:center;color:var(--text-heading);cursor:pointer;font-size:1.1rem;transition:background 0.2s;">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <div style="display:flex;align-items:center;justify-content:space-between;padding:0.75rem 1rem;background:rgba(255,255,255,0.05);border-radius:var(--r-sm);margin-bottom:0.75rem;">
        <span style="font-size:0.82rem;font-weight:700;color:#F1F5F9;">{{ $isEn ? 'Language:' : 'Dil Seçimi:' }}</span>
        <div class="defense-lang-toggle">
            <a href="{{ route('lang.switch', 'tr') }}" class="{{ !$isEn ? 'active' : '' }}">TR</a>
            <a href="{{ route('lang.switch', 'en') }}" class="{{ $isEn ? 'active' : '' }}">EN</a>
        </div>
    </div>
    <div style="display:flex;align-items:center;justify-content:space-between;padding:0.75rem 1rem;background:rgba(255,255,255,0.05);border-radius:var(--r-sm);margin-bottom:0.75rem;">
        <span style="font-size:0.82rem;font-weight:700;color:#F1F5F9;">{{ $isEn ? 'Theme:' : 'Tema Seçimi:' }}</span>
        <div class="defense-theme-toggle">
            <button type="button" class="theme-toggle-btn active" data-theme-val="light">
                <i class="bi bi-sun-fill"></i> <span>{{ $isEn ? 'LIGHT' : 'AÇIK' }}</span>
            </button>
            <button type="button" class="theme-toggle-btn" data-theme-val="dark">
                <i class="bi bi-moon-stars-fill"></i> <span>{{ $isEn ? 'DARK' : 'KOYU' }}</span>
            </button>
        </div>
    </div>

    <a href="{{ route('home') }}">{{ $isEn ? 'Home' : 'Ana Sayfa' }}</a>
    <a href="{{ route('home') }}#catalog">{{ $isEn ? 'Product Catalog (74 Systems)' : 'Ürün Kataloğu (74 Sistem)' }}</a>
    <div class="nav-mobile-group">{{ $isEn ? 'Categories' : 'Kategoriler' }}</div>
    @foreach(\App\Models\Category::where('is_active', true)->orderBy('sort_order')->get() as $cat)
        <a href="{{ route('home') }}#cat-{{ $cat->id }}" style="padding-left:1.75rem;font-size:0.9rem;">
            {{ $cat->name }} <span style="font-family:var(--font-mono);font-size:0.75rem;color:#60A5FA;">({{ $cat->activeProducts->count() }})</span>
        </a>
    @endforeach
    <a href="{{ route('home') }}#capabilities">{{ $isEn ? 'Engineering Capabilities' : 'Mühendislik Yetkinlikleri' }}</a>
    @if(!$refPage || ($refPage->is_active && $refPage->show_in_navbar))
        <a href="{{ route('references') }}">{{ $isEn ? 'Defense References' : 'Savunma Referansları' }}</a>
    @endif
    @if(!$certPage || ($certPage->is_active && $certPage->show_in_navbar))
        <a href="{{ route('certificates') }}">{{ $isEn ? 'Certificates & Accreditation' : 'Sertifikalar & Akreditasyon' }}</a>
    @endif
    @foreach(\App\Models\Page::where('is_active', true)->whereNotIn('slug', ['certificates', 'references', 'contact'])->where('show_in_navbar', true)->orderBy('sort_order')->get() as $customNavPage)
        <a href="{{ url('/' . $customNavPage->slug) }}">{{ $customNavPage->title }}</a>
    @endforeach
    @if(!$contactPage || ($contactPage->is_active && $contactPage->show_in_navbar))
        <a href="{{ route('contact') }}">{{ $isEn ? 'Contact' : 'İletişim' }}</a>
    @endif
    <button onclick="openRfqModal(); closeMobileDrawer();" class="btn-primary w-100" style="margin-top:1.5rem;justify-content:center;padding:1rem;font-weight:700;width:100%;">
        <i class="bi bi-file-earmark-text"></i> {{ $isEn ? 'Test Request Form (FR 7.1.4)' : 'Deney Talep Formu (FR 7.1.4)' }}
    </button>
</div>

{{-- FLASH MESSAGES --}}
<div class="flash-wrap">
    @if(session('success'))
        <div class="flash-msg flash-success">
            <i class="bi bi-check-circle-fill" style="color:var(--emerald-600);font-size:1.2rem;"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="flash-msg flash-error">
            <i class="bi bi-exclamation-circle-fill" style="color:#DC2626;font-size:1.2rem;"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif
</div>

{{-- MAIN CONTENT --}}
@yield('content')

{{-- INSTITUTIONAL DEFENSE FOOTER --}}
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="footer-logo-link" style="display:inline-block;margin-bottom:0.35rem;">
                    <img src="{{ asset('images/logo_dark.png') }}" alt="EMC Defense" style="height:82px;width:auto;display:block;">
                </a>
                <p class="footer-brand-desc">
                    {{ $isEn
                        ? \App\Models\Setting::get('footer_desc_en', 'Accredited engineering and manufacturing of Advanced Electromagnetic Warfare Defense Infrastructures — HEMP simulators, TEMPEST SDIP-27 power line filters, and turnkey shielded testing chambers for military, aerospace, and intelligence programs.')
                        : \App\Models\Setting::get('footer_desc_tr', 'Savunma Sanayii, Havacılık ve Stratejik Tesisler için MIL-STD-461G, MIL-STD-188-125-1 ve SDIP-27 standartlarında HEMP simülatörleri, TEMPEST filtreleri ve anahtar teslim yankısız test odaları mühendisliği.')
                    }}
                </p>
                <div class="footer-cage-box">
                    <span class="label">{{ $isEn ? \App\Models\Setting::get('footer_cage_label_en', 'Defense Registry & CAGE Code') : \App\Models\Setting::get('footer_cage_label_tr', 'Savunma Sanayii Sicil & CAGE Kodu') }}</span>
                    <span class="value">{{ $isEn ? \App\Models\Setting::get('footer_cage_value_en', 'CAGE CODE: TR-EMC01 // DEFENSE FACILITY SECURITY') : \App\Models\Setting::get('footer_cage_value_tr', 'CAGE SİCİL: TR-EMC01 // TESİS GÜVENLİK AKREDİTASYONU') }}</span>
                </div>
            </div>

            <div>
                <p class="footer-col-title"><i class="bi bi-shield-shaded"></i> {{ $isEn ? \App\Models\Setting::get('footer_col1_title_en', 'Engineering Solutions') : \App\Models\Setting::get('footer_col1_title_tr', 'Mühendislik Çözümleri') }}</p>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}#capabilities"><i class="bi bi-chevron-right"></i> {{ $isEn ? 'HEMP & HPEM Pulse Simulation' : 'HEMP & HPEM Darbe Simülasyonu' }}</a></li>
                    <li><a href="{{ route('home') }}#capabilities"><i class="bi bi-chevron-right"></i> {{ $isEn ? 'TEMPEST SDIP-27 Power Filters' : 'TEMPEST SDIP-27 Güç Filtreleme' }}</a></li>
                    <li><a href="{{ route('home') }}#capabilities"><i class="bi bi-chevron-right"></i> {{ $isEn ? 'Turnkey Anechoic Chambers' : 'Anahtar Teslim Yankısız Odalar' }}</a></li>
                    <li><a href="{{ route('home') }}#capabilities"><i class="bi bi-chevron-right"></i> {{ $isEn ? 'LISN & Military Test Antennas' : 'LISN & Askeri Test Antenleri' }}</a></li>
                    @if(!$refPage || ($refPage->is_active && $refPage->show_in_footer))
                        <li><a href="{{ route('references') }}"><i class="bi bi-chevron-right"></i> {{ $isEn ? 'Defense Prime References' : 'Savunma Sanayii Referansları' }}</a></li>
                    @endif
                    @if(!$certPage || ($certPage->is_active && $certPage->show_in_footer))
                        <li><a href="{{ route('certificates') }}"><i class="bi bi-chevron-right"></i> ISO 9001:2015 &amp; ISO 17025</a></li>
                    @endif
                    @foreach(\App\Models\Page::where('is_active', true)->whereNotIn('slug', ['certificates', 'references', 'contact'])->where('show_in_footer', true)->orderBy('sort_order')->get() as $customFootPage)
                        <li><a href="{{ url('/' . $customFootPage->slug) }}"><i class="bi bi-chevron-right"></i> {{ $customFootPage->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            @if(!$certPage || ($certPage->is_active && $certPage->show_in_footer))
            <div>
                <p class="footer-col-title"><i class="bi bi-journal-check"></i> {{ $isEn ? \App\Models\Setting::get('footer_col2_title_en', 'Certificates & Accreditations') : \App\Models\Setting::get('footer_col2_title_tr', 'Sertifikalar & Standartlar') }}</p>
                <ul class="footer-links">
                    <li><a href="{{ route('certificates') }}"><i class="bi bi-check2"></i> MIL-STD-461G (RS105 / CS116)</a></li>
                    <li><a href="{{ route('certificates') }}"><i class="bi bi-check2"></i> MIL-STD-188-125-1 (HEMP PCI)</a></li>
                    <li><a href="{{ route('certificates') }}"><i class="bi bi-check2"></i> SDIP-27 Level A (TEMPEST)</a></li>
                    <li><a href="{{ route('certificates') }}"><i class="bi bi-check2"></i> RTCA DO-160G Section 21/22</a></li>
                    <li><a href="{{ route('certificates') }}"><i class="bi bi-check2"></i> DEF-STAN 59-411 {{ $isEn ? 'Standard' : 'Askeri Standart' }}</a></li>
                    <li><a href="{{ route('certificates') }}"><i class="bi bi-check2"></i> CISPR 16-1-2 {{ $isEn ? 'Compliance' : 'Akreditasyonu' }}</a></li>
                </ul>
            </div>
            @endif

            <div>
                <p class="footer-col-title"><i class="bi bi-geo-alt-fill"></i> {{ $isEn ? \App\Models\Setting::get('footer_col3_title_en', 'Manufacturing & Lab Facility') : \App\Models\Setting::get('footer_col3_title_tr', 'Üretim & Test Tesisi') }}</p>
                <div class="footer-contact-item">
                    <i class="bi bi-building"></i>
                    <span>{!! nl2br(e($isEn ? \App\Models\Setting::get('contact_address_en', 'Ibrikdere Mah. 143. Sok. No:17, Kartepe / Kocaeli / Turkey') : \App\Models\Setting::get('contact_address_tr', 'İbrikdere Mahallesi 143. Sokak No:17, Kartepe / Kocaeli / Türkiye'))) !!}<br><small style="color:#64748B;">[{{ $isEn ? 'Coordinates' : 'Koordinat' }}: {{ \App\Models\Setting::get('contact_coordinates', '40.758° N, 30.015° E') }}]</small></span>
                </div>
                <div class="footer-contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <a href="mailto:{{ \App\Models\Setting::get('contact_email', 'defence@emcelectronic.com') }}">{{ \App\Models\Setting::get('contact_email', 'defence@emcelectronic.com') }}</a>
                </div>
                <div style="margin-top:1.25rem;">
                    <button onclick="openRfqModal()" class="btn-primary" style="padding:0.65rem 1.2rem;font-size:0.85rem;width:100%;justify-content:center;">
                        <i class="bi bi-send-fill"></i> {{ $isEn ? \App\Models\Setting::get('footer_rfq_btn_en', 'Official Defense RFQ Portal') : \App\Models\Setting::get('footer_rfq_btn_tr', 'Resmi Savunma RFQ Portalı') }}
                    </button>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <span>
                © {{ date('Y') }} {{ $isEn ? \App\Models\Setting::get('footer_copyright_en', 'EMC Defense & Electronic Systems Ltd. All rights reserved. Registered Defense Contractor.') : \App\Models\Setting::get('footer_copyright_tr', 'EMC Savunma ve Elektronik Sistemleri San. Tic. Ltd. Şti. Tüm hakları saklıdır. Savunma Sanayii Yüklenicisi.') }}
            </span>
            <div class="footer-social">
                <a href="{{ \App\Models\Setting::get('footer_linkedin_url', 'https://linkedin.com/company/emcturkey') }}" target="_blank" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                <a href="{{ \App\Models\Setting::get('footer_youtube_url', 'https://youtube.com/@emctestvekontrolhizmetleri7839') }}" target="_blank" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>

{{-- DENEY TALEP FORMU (FR 7.1.4) MODAL --}}
<div class="modal-overlay" id="rfqModal" onclick="if(event.target===this) closeRfqModal()">
    <div class="modal-card" style="max-width: 780px; max-height: 90vh; overflow-y: auto;">
        <div class="modal-header rfq-modal-header">
            <div>
                <div class="modal-title rfq-modal-title">
                    <i class="bi bi-file-earmark-text-fill text-primary"></i> {{ $isEn ? \App\Models\Setting::get('test_form_title_en', 'Test Request Form') : \App\Models\Setting::get('test_form_title_tr', 'Deney Talep Formu') }}
                </div>
                <div class="modal-subtitle rfq-modal-subtitle">
                    DOKÜMAN NO: {{ \App\Models\Setting::get('test_form_doc_no', 'FR 7.1.4') }} &bull; REVİZYON NO: {{ \App\Models\Setting::get('test_form_rev_no', '00') }} &bull; TARİH: {{ now()->format('d.m.Y') }}
                </div>
            </div>
            <button class="modal-close" onclick="closeRfqModal()" aria-label="Close">&times;</button>
        </div>
        <form action="{{ route('test-request.send') }}" method="POST" enctype="multipart/form-data" class="modal-body rfq-modal-body">
            @csrf
            <input type="hidden" name="subject" id="rfq_subject" value="">

            {{-- 1. Cihazın Adı * --}}
            <div class="form-group mb-3">
                <label for="modal_device_name" class="rfq-form-label">
                    {{ $isEn ? 'Equipment Name' : 'Cihazın Adı' }} <span style="color:#EF4444;font-weight:bold;">*</span>
                </label>
                <input type="text" name="device_name" id="modal_device_name" class="form-control" required value="{{ old('device_name') }}">
            </div>

            {{-- 2. Marka / Model * --}}
            <div class="form-group mb-3">
                <label for="modal_brand_model" class="rfq-form-label">
                    {{ $isEn ? 'Make / Model' : 'Marka / Model' }} <span style="color:#EF4444;font-weight:bold;">*</span>
                </label>
                <input type="text" name="brand_model" id="modal_brand_model" class="form-control" required value="{{ old('brand_model') }}">
            </div>

            {{-- 3. Cihazın * (Besleme Gerilimi & Faz başına çektiği akım) --}}
            <div class="form-group mb-3">
                <label class="rfq-form-label">
                    {{ $isEn ? 'Equipment Specifications' : 'Cihazın' }} <span style="color:#EF4444;font-weight:bold;">*</span>
                </label>
                <div class="rfq-grid-2">
                    <div>
                        <input type="number" step="any" name="voltage" id="modal_voltage" class="form-control" value="{{ old('voltage', '0') }}">
                        <span class="rfq-form-sublabel">
                            {{ $isEn ? 'Supply Voltage (V)' : 'Besleme Gerilimi (V)' }}
                        </span>
                    </div>
                    <div>
                        <input type="number" step="any" name="current" id="modal_current" class="form-control" value="{{ old('current', '0') }}">
                        <span class="rfq-form-sublabel">
                            {{ $isEn ? 'Current Drawn Per Phase (A)' : 'Faz başına çektiği akım (A)' }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- 4. Ürün Standardı, Kullanım Alanı *, Çalışma Modu --}}
            <div class="rfq-grid-3 mb-3">
                <div>
                    <label for="modal_product_standard" class="rfq-form-label">
                        {{ $isEn ? 'Product Standard' : 'Ürün Standardı' }}
                    </label>
                    <input type="text" name="product_standard" id="modal_product_standard" class="form-control" value="{{ old('product_standard') }}">
                </div>

                <div>
                    <label for="modal_usage_area" class="rfq-form-label">
                        {{ $isEn ? 'Usage Area' : 'Kullanım Alanı' }} <span style="color:#EF4444;font-weight:bold;">*</span>
                    </label>
                    <select name="usage_area" id="modal_usage_area" class="form-control" required>
                        <option value="" disabled selected></option>
                        <option value="EV">EV</option>
                        <option value="OFİS">OFİS</option>
                        <option value="ENDÜSTRİYEL">ENDÜSTRİYEL</option>
                        <option value="TIBBİ">TIBBİ</option>
                        <option value="ASKERİ">ASKERİ</option>
                        <option value="OTOMOTİV">OTOMOTİV</option>
                        <option value="DİĞER (Cihaz Tanımında Belirtiniz.)">DİĞER (Cihaz Tanımında Belirtiniz.)</option>
                    </select>
                </div>

                <div>
                    <label for="modal_operation_mode" class="rfq-form-label">
                        {{ $isEn ? 'Operating Mode' : 'Çalışma Modu' }}
                    </label>
                    <select name="operation_mode" id="modal_operation_mode" class="form-control">
                        <option value=""></option>
                        <option value="Sürekli">Sürekli</option>
                        <option value="Kesintili">Kesintili</option>
                        <option value="Standby (Bekleme)">Standby (Bekleme)</option>
                        <option value="Döngüsel / Periyodik">Döngüsel / Periyodik</option>
                        <option value="Diğer">Diğer</option>
                    </select>
                </div>
            </div>

            {{-- 5. Elektronik Devre * & AC / DC toggle * --}}
            <div class="rfq-grid-devre mb-3">
                <div>
                    <label for="modal_electronic_circuit" class="rfq-form-label">
                        {{ $isEn ? 'Electronic Circuit' : 'Elektronik Devre' }} <span style="color:#EF4444;font-weight:bold;">*</span>
                    </label>
                    <select name="electronic_circuit" id="modal_electronic_circuit" class="form-control" required>
                        <option value="" disabled selected></option>
                        <option value="Var">Var</option>
                        <option value="Yok">Yok</option>
                        <option value="Mikroişlemcili">Mikroişlemcili</option>
                        <option value="Analog">Analog</option>
                        <option value="Sayısal">Sayısal</option>
                        <option value="Güç Elektroniği">Güç Elektroniği</option>
                    </select>
                </div>

                <div>
                    <label class="rfq-form-label">{{ $isEn ? 'Power Supply Type' : 'Besleme Türü' }} <span style="color:#EF4444;font-weight:bold;">*</span></label>
                    <div class="rfq-power-toggle">
                        <input type="radio" name="power_type" id="modal_power_ac" value="AC" checked>
                        <label for="modal_power_ac" class="rfq-power-btn">AC</label>

                        <input type="radio" name="power_type" id="modal_power_dc" value="DC">
                        <label for="modal_power_dc" class="rfq-power-btn">DC</label>
                    </div>
                </div>
            </div>

            {{-- 6. Giriş/Çıkış konnektörleri --}}
            <div class="form-group mb-3">
                <label for="modal_connectors" class="rfq-form-label">
                    {{ $isEn ? 'Input / Output Connectors' : 'Giriş/Çıkış konnektörleri' }}
                </label>
                <input type="text" name="connectors" id="modal_connectors" class="form-control" value="{{ old('connectors') }}">
            </div>

            {{-- 7. Cihazın Boyutları --}}
            <div class="form-group mb-3">
                <label for="modal_dimensions" class="rfq-form-label">
                    {{ $isEn ? 'Equipment Dimensions' : 'Cihazın Boyutları' }}
                </label>
                <div class="rfq-dim-wrap">
                    <input type="text" name="dimensions" id="modal_dimensions" class="form-control" value="{{ old('dimensions') }}">
                    <span class="rfq-form-sublabel">
                        {{ $isEn ? 'Specify as WIDTH x LENGTH x HEIGHT.' : 'EN x BOY x YÜKSEKLİK şeklinde belirtiniz.' }}
                    </span>
                </div>
            </div>

            {{-- 8. Cihazın Tanımı * --}}
            <div class="form-group mb-3">
                <label for="modal_device_description" class="rfq-form-label">
                    {{ $isEn ? 'Equipment Description' : 'Cihazın Tanımı' }} <span style="color:#EF4444;font-weight:bold;">*</span>
                </label>
                <textarea name="device_description" id="modal_device_description" class="form-control" rows="3" required>{{ old('device_description') }}</textarea>
            </div>

            {{-- 9. Resim, Datasheet --}}
            <div class="form-group mb-4 rfq-upload-row">
                <label class="rfq-form-label">
                    {{ $isEn ? 'Image, Datasheet' : 'Resim, Datasheet' }}
                </label>
                <div class="rfq-upload-controls">
                    <input type="file" name="attachment" id="modalAttachmentInput" style="display: none;" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.webp,.zip" onchange="document.getElementById('modalFileName').textContent = this.files[0] ? this.files[0].name : '{{ $isEn ? 'No file selected' : 'Dosya seçilmedi' }}';">
                    <button type="button" class="rfq-upload-btn" onclick="document.getElementById('modalAttachmentInput').click();">
                        <i class="bi bi-cloud-arrow-up"></i> {{ $isEn ? 'Choose File' : 'Dosya Seç' }}
                    </button>
                    <span id="modalFileName" class="rfq-filename">
                        {{ $isEn ? 'No file selected' : 'Dosya seçilmedi' }}
                    </span>
                </div>
            </div>

            {{-- 10. Talep Eden İletişim Bilgileri --}}
            <div class="rfq-contact-box">
                <div class="rfq-contact-title">
                    <i class="bi bi-person-lines-fill" style="color: #2F80ED;"></i>
                    <span>{{ $isEn ? 'Requester Contact Information' : 'Talep Eden İletişim Bilgileri' }}</span>
                </div>
                <div class="rfq-contact-grid">
                    <div>
                        <label for="modal_name" class="rfq-contact-label">
                            {{ $isEn ? 'Contact Person Name' : 'Yetkili Adı Soyadı' }} <span style="color:#EF4444;font-weight:bold;">*</span>
                        </label>
                        <input type="text" name="name" id="modal_name" class="form-control" required value="{{ old('name') }}">
                    </div>
                    <div>
                        <label for="modal_company" class="rfq-contact-label">
                            {{ $isEn ? 'Company / Organization' : 'Kurum / Firma Adı' }}
                        </label>
                        <input type="text" name="company" id="modal_company" class="form-control" value="{{ old('company') }}">
                    </div>
                    <div>
                        <label for="modal_email" class="rfq-contact-label">
                            {{ $isEn ? 'Official Email' : 'Kurumsal E-posta' }} <span style="color:#EF4444;font-weight:bold;">*</span>
                        </label>
                        <input type="email" name="email" id="modal_email" class="form-control" required value="{{ old('email') }}">
                    </div>
                    <div>
                        <label for="modal_phone" class="rfq-contact-label">
                            {{ $isEn ? 'Phone Number' : 'Telefon Numarası' }} <span style="color:#EF4444;font-weight:bold;">*</span>
                        </label>
                        <input type="text" name="phone" id="modal_phone" class="form-control" required value="{{ old('phone') }}">
                    </div>
                </div>
            </div>

            <div class="rfq-modal-footer-actions">
                <a href="{{ route('test-request') }}" class="btn-outline rfq-btn-fullpage">
                    <i class="bi bi-box-arrow-up-right"></i> {{ $isEn ? 'Open Full Page Form' : 'Tam Sayfada Aç' }}
                </a>
                <div class="rfq-btn-group">
                    <button type="button" class="btn-outline" onclick="closeRfqModal()">{{ $isEn ? 'Cancel' : 'İptal' }}</button>
                    <button type="submit" class="rfq-btn-submit">
                        <i class="bi bi-send-fill"></i> {{ $isEn ? \App\Models\Setting::get('test_form_submit_btn_en', 'Submit Test Request') : \App\Models\Setting::get('test_form_submit_btn_tr', 'Deney Talebini Gönder') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- FLOATING HUD: JUMP TO TOP & RAPID TEST FORM TRIGGER --}}
<div class="defense-floating-hud" id="floatingDefenseHud" aria-label="Quick Actions">
    <button onclick="openRfqModal()" class="hud-btn hud-rfq-btn" title="{{ $isEn ? 'Test Request Form (FR 7.1.4)' : 'Deney Talep Formu (FR 7.1.4)' }}">
        <i class="bi bi-file-earmark-text-fill"></i>
        <span>{{ $isEn ? 'Test Form' : 'Deney Formu' }}</span>
    </button>
    <button id="hudBackToTop" class="hud-btn hud-top-btn" title="{{ $isEn ? 'Back to top' : 'Yukarı çık' }}">
        <i class="bi bi-arrow-up"></i>
    </button>
</div>

<script>
    // Header shadow on scroll
    const nav = document.getElementById('mainNav');
    const onScroll = () => nav.classList.toggle('scrolled', window.scrollY > 20);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    // Mobile Hamburger & Drawer Engine
    const hamburger = document.getElementById('hamburger');
    const drawer    = document.getElementById('mobileDrawer');

    function closeMobileDrawer() {
        if (drawer && drawer.classList.contains('open')) {
            drawer.classList.remove('open');
            if (hamburger) hamburger.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
            document.body.classList.remove('drawer-open');
        }
    }

    if (hamburger && drawer) {
        hamburger.addEventListener('click', () => {
            const isOpen = drawer.classList.toggle('open');
            hamburger.setAttribute('aria-expanded', isOpen);
            document.body.style.overflow = isOpen ? 'hidden' : '';
            document.body.classList.toggle('drawer-open', isOpen);
        });

        // Close mobile drawer when ANY link inside it is clicked
        drawer.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                closeMobileDrawer();

                // If link is an anchor on current page, smooth scroll with header offset
                if (href && href.includes('#')) {
                    try {
                        const targetUrl = new URL(link.href, window.location.origin);
                        if (targetUrl.pathname === window.location.pathname && targetUrl.hash) {
                            const targetEl = document.querySelector(targetUrl.hash);
                            if (targetEl) {
                                e.preventDefault();
                                history.pushState(null, null, targetUrl.hash);
                                setTimeout(() => {
                                    const headerOffset = 85;
                                    const elementPosition = targetEl.getBoundingClientRect().top;
                                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                                    window.scrollTo({
                                        top: Math.max(0, offsetPosition),
                                        behavior: 'smooth'
                                    });
                                }, 150);
                            }
                        }
                    } catch (err) {}
                }
            });
        });
    }

    // Defense RFQ Modal triggers
    function openRfqModal(subject = '') {
        closeMobileDrawer();
        const modal = document.getElementById('rfqModal');
        if (subject) {
            const subjEl = document.getElementById('rfq_subject');
            if (subjEl) subjEl.value = subject;
            const devName = document.getElementById('modal_device_name');
            if (devName && !devName.value) devName.value = subject;
        }
        if (modal) {
            modal.classList.add('open');
            document.body.style.overflow = 'hidden';
            document.body.classList.add('modal-open');
        }
    }
    function closeRfqModal() {
        const modal = document.getElementById('rfqModal');
        if (modal) {
            modal.classList.remove('open');
            document.body.style.overflow = '';
            document.body.classList.remove('modal-open');
        }
    }

    // Global Escape Key to close modal or drawer
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeMobileDrawer();
            closeRfqModal();
        }
    });

    // Auto dismiss flash
    document.querySelectorAll('.flash-msg').forEach(msg => {
        setTimeout(() => {
            msg.style.transition = 'opacity 0.4s';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 400);
        }, 5000);
    });
    // ── SCROLL REVEAL ENGINE ──
    (function() {
        const items = document.querySelectorAll('[data-reveal], [data-stagger]');
        if (!items.length) return;
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
        items.forEach(el => io.observe(el));
    })();

    // ── ANIMATED COUNTER ──
    function animateCounter(el) {
        const target = parseFloat(el.dataset.target || el.textContent);
        const prefix = el.dataset.prefix || '';
        const suffix = el.dataset.suffix || '';
        const duration = 1800;
        const start = performance.now();
        function step(now) {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const current = Math.round(eased * target);
            el.textContent = prefix + current + suffix;
            if (progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    }
    // Observe counters
    (function() {
        const counters = document.querySelectorAll('[data-counter]');
        if (!counters.length) return;
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        counters.forEach(el => io.observe(el));
    })();

    // ── SENIOR CRAFTSMANSHIP: 3D ELECTROMAGNETIC WAVE & FARADAY SHIELDING LATTICE ──
    (function() {
        const canvas = document.getElementById('hero-canvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        const heroSec = canvas.parentElement;
        if (!heroSec) return;

        let W, H;
        const dpr = Math.min(window.devicePixelRatio || 1, 2);

        function resize() {
            W = canvas.width = heroSec.offsetWidth * dpr;
            H = canvas.height = heroSec.offsetHeight * dpr;
            canvas.style.width = heroSec.offsetWidth + 'px';
            canvas.style.height = heroSec.offsetHeight + 'px';
            ctx.setTransform(1, 0, 0, 1, 0, 0);
            ctx.scale(dpr, dpr);
        }
        resize();

        // 3D Grid Parameters (Topological RF Shielding Lattice)
        const cols = 32;
        const rows = 22;
        const spacingX = 58;
        const spacingZ = 48;
        const fov = 480;
        const cameraY = 175;
        const cameraZ = 550;

        let rotX = 0.42;
        let rotY = 0.04;
        let targetRotX = 0.42;
        let targetRotY = 0.04;
        let time = 0;
        let isVisible = true;

        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Mouse Parallax & Dynamic RF Wave Ripple
        let mouse = { x: 0, y: 0, targetX: 0, targetY: 0, active: false };
        heroSec.addEventListener('mousemove', e => {
            const rect = heroSec.getBoundingClientRect();
            const nx = (e.clientX - rect.left) / rect.width - 0.5;
            const ny = (e.clientY - rect.top) / rect.height - 0.5;
            targetRotY = nx * 0.24;
            targetRotX = 0.42 + ny * 0.16;
            mouse.targetX = (e.clientX - rect.left);
            mouse.targetY = (e.clientY - rect.top);
            mouse.active = true;
        }, { passive: true });

        heroSec.addEventListener('mouseleave', () => {
            targetRotX = 0.42;
            targetRotY = 0.04;
            mouse.active = false;
        });

        // Pause off-screen for 60fps performance
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(entries => {
                isVisible = entries[0].isIntersecting;
            }, { threshold: 0.05 });
            observer.observe(heroSec);
        }

        function renderFrame() {
            if (!isVisible) {
                if (!prefersReducedMotion) requestAnimationFrame(renderFrame);
                return;
            }

            time += 0.018;
            rotX += (targetRotX - rotX) * 0.05;
            rotY += (targetRotY - rotY) * 0.05;
            mouse.x += (mouse.targetX - mouse.x) * 0.08;
            mouse.y += (mouse.targetY - mouse.y) * 0.08;

            const w = heroSec.offsetWidth;
            const h = heroSec.offsetHeight;
            ctx.clearRect(0, 0, w, h);

            // Adaptive camera & wave scaling for different hero heights
            const isCompact = h < 450;
            const cameraY = isCompact ? Math.max(65, h * 0.3) : 175;
            const cameraZ = isCompact ? 470 : 550;
            const waveAmp = isCompact ? 0.65 : 1.0;

            const points = [];
            const cosY = Math.cos(rotY), sinY = Math.sin(rotY);
            const cosX = Math.cos(rotX), sinX = Math.sin(rotX);

            // Compute 3D Coordinates & Wave Function
            for (let r = 0; r < rows; r++) {
                points[r] = [];
                for (let c = 0; c < cols; c++) {
                    const rawX = (c - cols / 2) * spacingX;
                    const rawZ = (r - rows / 2) * spacingZ;

                    const distCenter = Math.sqrt(rawX * rawX + rawZ * rawZ);
                    let rawY = (Math.sin(distCenter * 0.007 - time * 1.5) * 22
                             + Math.cos(rawX * 0.005 + time * 1.1) * 14
                             + Math.sin(rawZ * 0.008 - time * 0.8) * 10) * waveAmp;

                    if (mouse.active) {
                        const dM = Math.hypot(rawX, rawZ);
                        if (dM < 260) {
                            rawY += Math.sin((dM * 0.03) - time * 4) * (20 * waveAmp * (1 - dM / 260));
                        }
                    }

                    // 3D Euler Transformation
                    const x1 = rawX * cosY - rawZ * sinY;
                    const z1 = rawX * sinY + rawZ * cosY;

                    const y2 = rawY * cosX - z1 * sinX - cameraY;
                    const z2 = rawY * sinX + z1 * cosX + cameraZ;

                    if (z2 > 15) {
                        const scale = fov / z2;
                        const sx = w / 2 + x1 * scale;
                        const sy = h / 2 + y2 * scale;
                        const depth = Math.max(0, Math.min(1, (z2 - 120) / 780));
                        points[r][c] = { sx, sy, z: z2, depth, waveHeight: rawY };
                    } else {
                        points[r][c] = null;
                    }
                }
            }

            // Draw Lattice Connecting Lines (Horizontal & Depth)
            ctx.lineWidth = 1;

            const isDark = document.documentElement.getAttribute('data-theme') === 'dark';

            // 1. Horizontal curves
            for (let r = 0; r < rows; r++) {
                for (let c = 0; c < cols - 1; c++) {
                    const p1 = points[r][c];
                    const p2 = points[r][c + 1];
                    if (p1 && p2) {
                        const avgDepth = (p1.depth + p2.depth) / 2;
                        const alpha = (1 - avgDepth) * 0.22 + 0.025;
                        ctx.strokeStyle = isDark ? `rgba(96, 165, 250, ${(alpha * 1.5).toFixed(3)})` : `rgba(30, 45, 125, ${alpha.toFixed(3)})`;
                        ctx.beginPath();
                        ctx.moveTo(p1.sx, p1.sy);
                        ctx.lineTo(p2.sx, p2.sy);
                        ctx.stroke();
                    }
                }
            }

            // 2. Depth curves (columns)
            for (let c = 0; c < cols; c++) {
                for (let r = 0; r < rows - 1; r++) {
                    const p1 = points[r][c];
                    const p2 = points[r + 1][c];
                    if (p1 && p2) {
                        const avgDepth = (p1.depth + p2.depth) / 2;
                        const alpha = (1 - avgDepth) * 0.18 + 0.02;
                        ctx.strokeStyle = isDark ? `rgba(56, 189, 248, ${(alpha * 1.5).toFixed(3)})` : `rgba(37, 99, 235, ${alpha.toFixed(3)})`;
                        ctx.beginPath();
                        ctx.moveTo(p1.sx, p1.sy);
                        ctx.lineTo(p2.sx, p2.sy);
                        ctx.stroke();
                    }
                }
            }

            // 3. Faraday Shielding Polyhedron Nodes
            for (let r = 0; r < rows; r++) {
                for (let c = 0; c < cols; c++) {
                    if ((r % 2 === 0 && c % 2 === 0) || points[r][c]?.waveHeight > 24) {
                        const p = points[r][c];
                        if (p) {
                            const alpha = (1 - p.depth) * 0.45;
                            const size = (1 - p.depth) * 3 + 1.2;

                            if (p.waveHeight > 20) {
                                const pulse = (Math.sin(time * 3 + r + c) + 1) * 0.5;
                                ctx.beginPath();
                                ctx.arc(p.sx, p.sy, size + pulse * 4, 0, Math.PI * 2);
                                ctx.strokeStyle = isDark ? `rgba(56, 189, 248, ${(alpha * 0.45).toFixed(3)})` : `rgba(37, 99, 235, ${(alpha * 0.35).toFixed(3)})`;
                                ctx.lineWidth = 0.75;
                                ctx.stroke();
                            }

                            ctx.fillStyle = isDark ? `rgba(147, 197, 253, ${alpha.toFixed(3)})` : `rgba(30, 45, 125, ${alpha.toFixed(3)})`;
                            ctx.beginPath();
                            ctx.arc(p.sx, p.sy, size * 0.75, 0, Math.PI * 2);
                            ctx.fill();
                        }
                    }
                }
            }

            // 4. Military CAD HUD Coordinates & Precision Crosshairs
            if (w >= 900 && h >= 220) {
                ctx.font = "600 10px 'JetBrains Mono', monospace";
                ctx.fillStyle = isDark ? "rgba(147, 197, 253, 0.55)" : "rgba(30, 45, 125, 0.32)";

                const textY1 = isCompact ? 28 : 42;
                const textY2 = isCompact ? 42 : 58;

                ctx.fillText("[RF DOMAIN: 10 kHz - 40 GHz]", 32, textY1);
                ctx.fillText("GRID_SEC // 40.758°N 30.015°E", 32, textY2);

                const strRight1 = "FARADAY SHIELDING LATTICE";
                const strRight2 = "ATTENUATION: > 120 dB [MIL-STD-461G]";
                ctx.fillText(strRight1, w - ctx.measureText(strRight1).width - 32, textY1);
                ctx.fillText(strRight2, w - ctx.measureText(strRight2).width - 32, textY2);
            }

            const drawCross = (cx, cy) => {
                ctx.strokeStyle = isDark ? "rgba(96, 165, 250, 0.38)" : "rgba(30, 45, 125, 0.22)";
                ctx.lineWidth = 1;
                ctx.beginPath();
                ctx.moveTo(cx - 6, cy); ctx.lineTo(cx + 6, cy);
                ctx.moveTo(cx, cy - 6); ctx.lineTo(cx, cy + 6);
                ctx.stroke();
            };
            if (h >= 180) {
                const crossTopY = isCompact ? 48 : 80;
                drawCross(32, crossTopY);
                drawCross(w - 32, crossTopY);
                drawCross(32, h - 28);
                drawCross(w - 32, h - 28);
            }

            if (!prefersReducedMotion) {
                requestAnimationFrame(renderFrame);
            }
        }

        window.addEventListener('resize', resize, { passive: true });
        requestAnimationFrame(renderFrame);
    })();

    // ── SENIOR DETAIL: SCROLL PROGRESS BAR & FLOATING DEFENSE HUD ──
    (function() {
        const progressBar = document.getElementById('scrollProgressBar');
        const hud = document.getElementById('floatingDefenseHud');
        const backToTop = document.getElementById('hudBackToTop');

        function updateScroll() {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            if (progressBar && docHeight > 0) {
                const progress = Math.min(Math.max(scrollTop / docHeight, 0), 1);
                progressBar.style.transform = `scaleX(${progress})`;
            }
            if (hud) {
                hud.classList.toggle('is-visible', scrollTop > 380);
            }
        }

        window.addEventListener('scroll', updateScroll, { passive: true });
        updateScroll();

        if (backToTop) {
            backToTop.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    })();

    // ── SENIOR DETAIL: INTERACTIVE SPOTLIGHT BORDER & SHEEN ──
    (function() {
        const cards = document.querySelectorAll('.spotlight-card, .product-card-clean, .capability-card-clean, .console-clean-card, .ref-corporate-card, .cert-corporate-card');
        cards.forEach(card => {
            card.classList.add('spotlight-card');
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            }, { passive: true });
        });
    })();

    // ── SENIOR DETAIL: 3D PERSPECTIVE MICRO-TILT ──
    (function() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        const tiltElements = document.querySelectorAll('[data-tilt-3d]');
        tiltElements.forEach(el => {
            el.addEventListener('mousemove', e => {
                const rect = el.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;
                el.style.transform = `perspective(1000px) rotateY(${x * 5}deg) rotateX(${-y * 5}deg) translateY(-2px)`;
            }, { passive: true });

            el.addEventListener('mouseleave', () => {
                el.style.transform = 'perspective(1000px) rotateY(0deg) rotateX(0deg) translateY(0)';
            });
        });
    })();

    // ── SENIOR DETAIL: KEYBOARD SHORTCUT (/) FOR CATALOG SEARCH ──
    (function() {
        document.addEventListener('keydown', e => {
            if (e.key === '/' && !['INPUT', 'TEXTAREA'].includes(document.activeElement?.tagName)) {
                const searchInput = document.getElementById('catalogSearchInput');
                if (searchInput) {
                    e.preventDefault();
                    searchInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    setTimeout(() => searchInput.focus(), 150);
                }
            }
        });
    })();

    // ── SENIOR DETAIL: SEAMLESS THEME SWITCHER (LIGHT / DARK PERSISTENCE) ──
    (function() {
        function updateToggleButtons(theme) {
            document.querySelectorAll('.theme-toggle-btn').forEach(btn => {
                if (btn.getAttribute('data-theme-val') === theme) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }

        function setAppTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            try {
                localStorage.setItem('emc_defense_theme', theme);
                document.cookie = "emc_defense_theme=" + theme + "; path=/; max-age=31536000; SameSite=Lax";
            } catch(e) {}
            updateToggleButtons(theme);
        }

        const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
        updateToggleButtons(currentTheme);

        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.theme-toggle-btn');
            if (btn) {
                const targetTheme = btn.getAttribute('data-theme-val');
                if (targetTheme) {
                    setAppTheme(targetTheme);
                }
            }
        });
    })();
</script>
@stack('scripts')
</body>
</html>
