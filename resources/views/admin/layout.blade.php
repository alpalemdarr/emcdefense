<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') – EMC Defense</title>
    <link rel="icon" href="{{ asset('images/logo_icon.png') }}" type="image/png">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --brand-primary: #1E2D7D;
            --brand-hover: #15225E;
            --brand-soft: #2563EB;
            --brand-light: #EFF6FF;
            --brand-border: #DBEAFE;
            --bg-body: #F8FAFC;
            --bg-card: #FFFFFF;
            --border-color: #E2E8F0;
            --border-med: #CBD5E1;
            --text-main: #0F172A;
            --text-body: #334155;
            --text-muted: #64748B;
            --text-subtle: #94A3B8;
            --sidebar-width: 260px;
        }

        * { box-sizing: border-box; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-body);
            min-height: 100vh;
            margin: 0;
            display: flex;
        }

        /* ── SIDEBAR ── */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: #FFFFFF;
            border-right: 1px solid var(--border-color);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            box-shadow: 2px 0 12px rgba(15, 23, 42, 0.02);
        }

        .sidebar-brand {
            padding: 1.25rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid var(--border-color);
            background: #FFFFFF;
        }

        .sidebar-brand img {
            height: 38px;
            object-fit: contain;
        }

        .sidebar-brand .brand-title {
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: -0.01em;
            color: #0F172A;
            margin: 0;
            line-height: 1.2;
        }

        .sidebar-brand .brand-badge {
            font-size: 0.65rem;
            font-weight: 800;
            background: var(--brand-light);
            color: var(--brand-primary);
            border: 1px solid var(--brand-border);
            padding: 2px 6px;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
            margin-top: 2px;
        }

        .sidebar-menu {
            padding: 1.25rem 0.85rem;
            list-style: none;
            margin: 0;
            flex: 1;
            overflow-y: auto;
        }

        .menu-header {
            font-size: 0.68rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.1px;
            color: var(--text-subtle);
            padding: 0.85rem 0.75rem 0.35rem;
        }

        .sidebar-menu .nav-item {
            margin-bottom: 0.3rem;
        }

        .sidebar-menu .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.85rem;
            color: #475569;
            font-size: 0.88rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
            position: relative;
        }

        .sidebar-menu .nav-link i {
            font-size: 1.1rem;
            color: #64748B;
            transition: color 0.2s;
            width: 22px;
            text-align: center;
        }

        .sidebar-menu .nav-link:hover {
            color: var(--brand-primary);
            background: #F1F5F9;
        }

        .sidebar-menu .nav-link:hover i {
            color: var(--brand-primary);
        }

        .sidebar-menu .nav-link.active {
            color: #FFFFFF !important;
            background: var(--brand-primary);
            box-shadow: 0 4px 14px rgba(30, 45, 125, 0.22);
            font-weight: 700;
        }

        .sidebar-menu .nav-link.active i {
            color: #FFFFFF !important;
        }

        .sidebar-menu .badge {
            margin-left: auto;
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
        }

        .sidebar-footer {
            padding: 1rem 1.25rem;
            border-top: 1px solid var(--border-color);
            background: #F8FAFC;
        }

        .user-panel {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .user-panel-info {
            display: flex;
            align-items: center;
            gap: 0.65rem;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--brand-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFFFFF;
            font-weight: 800;
            font-size: 0.85rem;
            box-shadow: 0 2px 8px rgba(30, 45, 125, 0.15);
        }

        .user-details .name {
            font-size: 0.84rem;
            font-weight: 700;
            color: #0F172A;
            margin: 0;
            line-height: 1.2;
        }

        .user-details .role {
            font-size: 0.72rem;
            color: var(--text-muted);
            margin: 0;
        }

        /* ── MAIN CONTENT WRAPPER ── */
        .admin-main {
            margin-left: var(--sidebar-width);
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            background: var(--bg-body);
        }

        /* ── TOPBAR ── */
        .admin-topbar {
            height: 68px;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            padding: 0 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 99;
            box-shadow: 0 1px 4px rgba(15, 23, 42, 0.02);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .topbar-left h5 {
            color: #0F172A !important;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-sidebar-toggle {
            background: #FFFFFF;
            border: 1.5px solid var(--border-color);
            color: #475569;
            border-radius: 8px;
            padding: 0.35rem 0.65rem;
            font-size: 1.1rem;
            cursor: pointer;
            display: none;
        }

        .btn-live-site {
            background: #FFFFFF;
            border: 1.5px solid var(--border-color);
            color: var(--brand-primary);
            font-size: 0.84rem;
            font-weight: 700;
            padding: 0.45rem 0.95rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            transition: all 0.2s;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.04);
        }

        .btn-live-site:hover {
            background: var(--brand-light);
            color: var(--brand-primary);
            border-color: var(--brand-primary);
        }

        /* ── CONTENT AREA ── */
        .admin-content {
            padding: 2rem 1.75rem;
            flex: 1;
        }

        /* ── CARDS & COMPONENTS ── */
        .card-custom {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04), 0 1px 3px rgba(15, 23, 42, 0.02);
        }

        .card-header-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
            padding-bottom: 0.85rem;
            border-bottom: 1px solid #F1F5F9;
        }

        .card-title-custom {
            font-size: 1.05rem;
            font-weight: 800;
            letter-spacing: -0.01em;
            color: #0F172A;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* ── TABLES ── */
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            color: #334155;
        }

        .table-custom th {
            background: #F8FAFC;
            color: #475569;
            font-size: 0.74rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 0.85rem 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .table-custom td {
            padding: 0.85rem 1rem;
            font-size: 0.88rem;
            vertical-align: middle;
            border-bottom: 1px solid #F1F5F9;
            background: transparent;
            color: #334155;
        }

        .table-custom tr:hover td {
            background: #F8FAFC;
        }

        /* ── FORM ELEMENTS ── */
        .form-label-custom {
            font-size: 0.82rem;
            font-weight: 700;
            color: #334155;
            margin-bottom: 0.4rem;
        }

        .form-control-custom, .form-select-custom {
            background: #FFFFFF;
            border: 1.5px solid var(--border-med);
            color: #0F172A;
            border-radius: 8px;
            padding: 0.65rem 0.9rem;
            font-size: 0.88rem;
            font-weight: 500;
            transition: all 0.2s;
            width: 100%;
        }

        .form-control-custom:focus, .form-select-custom:focus {
            outline: none;
            background: #FFFFFF;
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 3px rgba(30, 45, 125, 0.12);
            color: #0F172A;
        }

        .form-control-custom::placeholder {
            color: #94A3B8;
        }

        .form-check-input {
            background-color: #FFFFFF;
            border-color: var(--border-med);
        }

        .form-check-input:checked {
            background-color: var(--brand-primary);
            border-color: var(--brand-primary);
        }

        /* ── BUTTONS ── */
        .btn-emc {
            background: var(--brand-primary);
            color: #FFFFFF;
            border: 1px solid var(--brand-primary);
            font-weight: 700;
            font-size: 0.85rem;
            padding: 0.55rem 1.15rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            transition: all 0.2s;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(30, 45, 125, 0.18);
        }

        .btn-emc:hover {
            background: var(--brand-hover);
            border-color: var(--brand-hover);
            box-shadow: 0 4px 14px rgba(30, 45, 125, 0.28);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .btn-outline-emc {
            background: #FFFFFF;
            border: 1.5px solid var(--border-med);
            color: #334155;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-outline-emc:hover {
            border-color: var(--brand-primary);
            color: var(--brand-primary);
            background: var(--brand-light);
        }

        .btn-action {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border-color);
            background: #F8FAFC;
            color: #475569;
            transition: all 0.2s;
            text-decoration: none;
            font-size: 0.85rem;
        }

        .btn-action:hover {
            background: var(--brand-light);
            color: var(--brand-primary);
            border-color: var(--brand-border);
        }

        .btn-action.delete:hover {
            background: #FEE2E2;
            border-color: #FECACA;
            color: #DC2626;
        }

        /* ── BADGES ── */
        .badge-status {
            padding: 0.25rem 0.6rem;
            font-size: 0.72rem;
            font-weight: 700;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .badge-active {
            background: #DCFCE7;
            color: #15803D;
            border: 1px solid #BBF7D0;
        }

        .badge-inactive {
            background: #FEE2E2;
            color: #B91C1C;
            border: 1px solid #FECACA;
        }

        .badge-tag {
            background: var(--brand-light);
            color: var(--brand-primary);
            border: 1px solid var(--brand-border);
            font-weight: 700;
        }

        /* ── NAV PILLS & TABS ── */
        .nav-pills .nav-link {
            background: #FFFFFF;
            color: #475569;
            border: 1.5px solid var(--border-med);
            font-weight: 600;
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
        }
        .nav-pills .nav-link:hover {
            background: var(--brand-light);
            color: var(--brand-primary);
            border-color: var(--brand-primary);
        }
        .nav-pills .nav-link.active {
            background: var(--brand-primary) !important;
            color: #FFFFFF !important;
            border-color: var(--brand-primary) !important;
            box-shadow: 0 2px 8px rgba(30, 45, 125, 0.22);
            font-weight: 700;
        }

        /* ── ALERTS ── */
        .alert-dismissible {
            border-radius: 10px;
            font-size: 0.88rem;
        }

        /* ── CERTIFICATES & GALLERY CARDS ── */
        .certificate-card {
            background: #FFFFFF;
            border: 1px solid var(--border-color);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.02);
            transition: all 0.25s ease;
        }
        .certificate-card:hover {
            transform: translateY(-3px);
            border-color: #CBD5E1;
            box-shadow: 0 12px 28px -5px rgba(15, 23, 42, 0.08), 0 8px 10px -6px rgba(15, 23, 42, 0.04);
        }
        .certificate-thumb {
            height: 200px;
            background: #F8FAFC;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 1.25rem;
        }
        .certificate-thumb img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            filter: drop-shadow(0 2px 6px rgba(15, 23, 42, 0.08));
            border-radius: 4px;
        }
        .certificate-status-pill {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        /* ── PRODUCT GRADE UPLOAD DROPZONES & PREVIEWS ── */
        .upload-dropzone {
            border: 1.5px dashed #CBD5E1;
            background: #F8FAFC;
            border-radius: 12px;
            padding: 1.5rem 1rem;
            text-align: center;
            transition: all 0.2s ease;
            cursor: pointer;
            position: relative;
        }
        .upload-dropzone:hover {
            border-color: var(--brand-primary);
            background: #EFF6FF;
        }
        .upload-dropzone input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-preview-card {
            background: #FFFFFF;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0.75rem;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
        }
        .file-preview-card .thumb-container {
            width: 52px;
            height: 52px;
            border-radius: 8px;
            background: #F8FAFC;
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
        }
        .file-preview-card .thumb-container img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Form Switch Customization */
        .form-switch .form-check-input {
            width: 2.6em;
            height: 1.4em;
            cursor: pointer;
            border-color: #CBD5E1;
            background-color: #E2E8F0;
            transition: all 0.2s ease;
        }
        .form-switch .form-check-input:checked {
            background-color: var(--brand-primary);
            border-color: var(--brand-primary);
        }

        /* ── GLOBAL LIGHT THEME TEXT OVERRIDES ── */
        .card-custom .text-white:not(.btn):not(.badge):not(.nav-link.active) {
            color: #0F172A !important;
        }
        .card-custom .text-light {
            color: #334155 !important;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .btn-sidebar-toggle {
                display: block;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo_icon.png') }}" alt="EMC Defense">
            <div>
                <p class="brand-title">EMC DEFENSE</p>
                <span class="brand-badge">Control Panel</span>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-header">Genel Bakış</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2"></i>
                    <span>Kontrol Paneli</span>
                </a>
            </li>

            <li class="menu-header">Katalog & Ürünler</li>
            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="bi bi-cpu"></i>
                    <span>Ürünler & Sistemler</span>
                    @php $prodCount = \App\Models\Product::count(); @endphp
                    <span class="badge bg-light text-primary border ms-auto">{{ $prodCount }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tags"></i>
                    <span>Ürün Kategorileri</span>
                    @php $catCount = \App\Models\Category::count(); @endphp
                    <span class="badge bg-light text-secondary border ms-auto">{{ $catCount }}</span>
                </a>
            </li>

            <li class="menu-header">Sayfalar & İçerikler</li>
            <li class="nav-item">
                <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Web Sayfaları (CMS)</span>
                    @php $pageCount = \App\Models\Page::count(); @endphp
                    <span class="badge bg-light text-secondary border ms-auto">{{ $pageCount }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.references.index') }}" class="nav-link {{ request()->routeIs('admin.references.*') ? 'active' : '' }}">
                    <i class="bi bi-shield-check"></i>
                    <span>Müşteri Referansları</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.certificates.index') }}" class="nav-link {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                    <i class="bi bi-award"></i>
                    <span>Sertifikalar & Kalite</span>
                </a>
            </li>

            <li class="menu-header">Talepler & İletişim</li>
            <li class="nav-item">
                <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                    <i class="bi bi-chat-left-dots"></i>
                    <span>Gelen Talepler & Mesajlar</span>
                    @php
                        $unreadCount = \App\Models\Message::where('is_read', false)->count();
                    @endphp
                    @if($unreadCount > 0)
                        <span class="badge bg-danger ms-auto">{{ $unreadCount }}</span>
                    @endif
                </a>
            </li>

            <li class="menu-header">Yapılandırma</li>
            <li class="nav-item">
                <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="bi bi-sliders"></i>
                    <span>Site İçerikleri & Ayarlar</span>
                </a>
            </li>

            <li class="menu-header">Canlı Site</li>
            <li class="nav-item">
                <a href="{{ route('home') }}" target="_blank" class="nav-link">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <span>Web Sitesini Aç</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="user-panel">
                <div class="user-panel-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="user-details">
                        <p class="name">{{ Auth::guard('admin')->user()->name ?? 'Administrator' }}</p>
                        <p class="role">{{ Auth::guard('admin')->user()->email ?? 'admin@emcdefence.com' }}</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-action text-danger" title="Logout" style="background:none; border:none;">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- MAIN WRAPPER -->
    <div class="admin-main">
        <!-- TOPBAR -->
        <header class="admin-topbar">
            <div class="topbar-left">
                <button class="btn-sidebar-toggle" id="toggleSidebar">
                    <i class="bi bi-list"></i>
                </button>
                <h5 class="mb-0 fw-bold" style="color: #0F172A; letter-spacing: -0.02em;">@yield('page_title', 'Dashboard')</h5>
            </div>
            <div class="topbar-right">
                <a href="{{ route('home') }}" target="_blank" class="btn-live-site">
                    <i class="bi bi-globe"></i>
                    <span>Live Website</span>
                </a>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="admin-content">
            <!-- Flash Alerts -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show bg-success text-white border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show bg-danger text-white border-0 shadow-sm mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show bg-danger text-white border-0 shadow-sm mb-4" role="alert">
                    <div class="fw-bold mb-1"><i class="bi bi-exclamation-octagon-fill me-2"></i>Please fix the following errors:</div>
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('adminSidebar');
        if(toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('show');
            });
        }

        // Dropzone file selection preview feedback
        document.querySelectorAll('.upload-dropzone input[type="file"]').forEach(input => {
            const dropzone = input.closest('.upload-dropzone');
            if(!dropzone) return;

            input.addEventListener('change', () => {
                if(input.files && input.files[0]) {
                    const file = input.files[0];
                    let sizeStr = (file.size / 1024).toFixed(1) + ' KB';
                    if(file.size > 1024 * 1024) {
                        sizeStr = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
                    }

                    let preview = dropzone.querySelector('.dropzone-file-selected');
                    if(!preview) {
                        preview = document.createElement('div');
                        preview.className = 'dropzone-file-selected mt-2 p-2 rounded bg-white border border-primary-subtle d-flex align-items-center justify-content-between text-start';
                        dropzone.appendChild(preview);
                    }
                    preview.innerHTML = `
                        <div class="d-flex align-items-center gap-2 text-truncate" style="max-width: 80%;">
                            <i class="bi bi-check-circle-fill text-success fs-5"></i>
                            <div class="text-truncate">
                                <div class="fw-bold small text-dark text-truncate">${file.name}</div>
                                <div class="text-muted small" style="font-size: 0.72rem;">${sizeStr}</div>
                            </div>
                        </div>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle" style="font-size: 0.72rem;">Seçildi</span>
                    `;
                    dropzone.style.borderColor = 'var(--brand-primary)';
                    dropzone.style.background = '#EFF6FF';
                }
            });

            dropzone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzone.style.borderColor = 'var(--brand-primary)';
                dropzone.style.background = '#EFF6FF';
            });
            dropzone.addEventListener('dragleave', () => {
                if(!input.files || !input.files.length) {
                    dropzone.style.borderColor = '#CBD5E1';
                    dropzone.style.background = '#F8FAFC';
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
