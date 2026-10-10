@extends('admin.layout')

@section('title', 'Kontrol Paneli – Admin')
@section('page_title', 'Dashboard Overview')
@section('content')
<div class="d-none">Dashboard Overview</div>
<!-- TOP STATS ROW -->
<div class="row g-3 mb-4">
    <!-- Products & Catalog -->
    <div class="col-sm-6 col-xl-3">
        <div class="card-custom h-100 d-flex flex-column justify-content-between p-3 shadow-sm">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-bold text-uppercase tracking-wider">Katalog Portföyü</span>
                <div class="user-avatar" style="background: #EFF6FF; color: #1E2D7D; border: 1px solid #DBEAFE;">
                    <i class="bi bi-cpu"></i>
                </div>
            </div>
            <div class="d-flex align-items-baseline justify-content-between">
                <div>
                    <h3 class="fw-bold mb-0" style="color: #0F172A;">{{ $stats['products'] }}</h3>
                    <small class="text-muted">{{ $stats['categories'] }} Kategori Altında</small>
                </div>
                <a href="{{ route('admin.products.index') }}" class="small text-decoration-none fw-bold" style="color: #1E2D7D;">Yönet &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Pages & Content -->
    <div class="col-sm-6 col-xl-3">
        <div class="card-custom h-100 d-flex flex-column justify-content-between p-3 shadow-sm">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-bold text-uppercase tracking-wider">Sayfalar & İçerik</span>
                <div class="user-avatar" style="background: #EFF6FF; color: #1E2D7D; border: 1px solid #DBEAFE;">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
            </div>
            <div class="d-flex align-items-baseline justify-content-between">
                <div>
                    <h3 class="fw-bold mb-0" style="color: #0F172A;">{{ $stats['pages'] }}</h3>
                    <small class="text-muted">{{ $stats['references'] }} Ref &bull; {{ $stats['certificates'] }} Sertifika</small>
                </div>
                <a href="{{ route('admin.pages.index') }}" class="small text-decoration-none fw-bold" style="color: #1E2D7D;">Yönet &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Official Test Requests FR 7.1.4 -->
    <div class="col-sm-6 col-xl-3">
        <div class="card-custom h-100 d-flex flex-column justify-content-between p-3 shadow-sm">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-bold text-uppercase tracking-wider">Deney Talepleri (FR 7.1.4)</span>
                <div class="user-avatar" style="background: #DCFCE7; color: #16A34A; border: 1px solid #BBF7D0;">
                    <i class="bi bi-file-earmark-medical"></i>
                </div>
            </div>
            <div class="d-flex align-items-baseline justify-content-between">
                <div>
                    <h3 class="fw-bold mb-0" style="color: #0F172A;">{{ $stats['test_requests'] }}</h3>
                    <small class="text-success fw-semibold">Resmi Cihaz Başvurusu</small>
                </div>
                <a href="{{ route('admin.messages.index', ['type' => 'test_request']) }}" class="small text-decoration-none fw-bold" style="color: #16A34A;">İncele &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Messages / Unread -->
    <div class="col-sm-6 col-xl-3">
        <div class="card-custom h-100 d-flex flex-column justify-content-between p-3 shadow-sm">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted small fw-bold text-uppercase tracking-wider">Mesajlar & Bildirimler</span>
                <div class="user-avatar" style="background: #FEF3C7; color: #D97706; border: 1px solid #FDE68A;">
                    <i class="bi bi-chat-left-dots"></i>
                </div>
            </div>
            <div class="d-flex align-items-baseline justify-content-between">
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <h3 class="fw-bold mb-0" style="color: #0F172A;">{{ $stats['messages'] }}</h3>
                        @if($stats['unread'] > 0)
                            <span class="badge bg-danger rounded-pill">{{ $stats['unread'] }} Yeni</span>
                        @endif
                    </div>
                    <small class="text-muted">{{ $stats['contact_messages'] }} Genel İletişim</small>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="small text-decoration-none fw-bold" style="color: #D97706;">Gelen Kutusu &rarr;</a>
            </div>
        </div>
    </div>
</div>

<!-- MAIN DASHBOARD 2-COLUMN SECTION -->
<div class="row g-4">
    <!-- LEFT: RECENT INQUIRIES & TEST REQUESTS (8 COLS) -->
    <div class="col-lg-8">
        <div class="card-custom h-100 shadow-sm mb-0">
            <div class="card-header-custom">
                <div>
                    <h6 class="card-title-custom mb-0">
                        <i class="bi bi-inbox text-primary me-2"></i>Son Gelen Talepler & Bildirimler
                    </h6>
                    <small class="text-muted">Gelen Deney Talep Formu ve genel danışma başvuruları.</small>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.messages.index') }}" class="btn-outline-emc py-1 px-3" style="font-size: 0.78rem;">
                        <span>Tümünü Gör</span>
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

            @if($recentMessages->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-chat-square-text display-6 mb-3 d-block opacity-50"></i>
                    <p class="mb-0">Henüz gelen bir başvuru veya mesaj bulunmuyor.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th style="width: 50px;">Durum</th>
                                <th style="width: 160px;">Talep Türü</th>
                                <th>Gönderen</th>
                                <th>Cihaz / Konu</th>
                                <th>Tarih</th>
                                <th style="width: 70px; text-align: right;">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentMessages as $msg)
                                @php $isTestRequest = !empty($msg->device_name); @endphp
                                <tr style="{{ !$msg->is_read ? 'background: #EFF6FF;' : '' }}">
                                    <td>
                                        @if(!$msg->is_read)
                                            <span class="badge rounded-pill bg-danger" style="font-size: 0.65rem;">YENİ</span>
                                        @else
                                            <span class="badge rounded-pill bg-secondary opacity-50" style="font-size: 0.65rem;">Okundu</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($isTestRequest)
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle" style="font-size: 0.72rem;">
                                                <i class="bi bi-file-earmark-medical me-1"></i> Deney Talebi
                                            </span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle" style="font-size: 0.72rem;">
                                                <i class="bi bi-chat-left-dots me-1"></i> İletişim
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-bold text-dark" style="font-size: 0.88rem;">{{ $msg->name }}</div>
                                        @if($msg->company)
                                            <div class="small text-muted text-truncate" style="max-width: 140px; font-size: 0.72rem;">{{ $msg->company }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($isTestRequest)
                                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-decoration-none fw-semibold text-dark">
                                                {{ $msg->device_name }}
                                                @if($msg->brand_model) <span class="text-muted fw-normal small">({{ $msg->brand_model }})</span> @endif
                                            </a>
                                        @else
                                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-decoration-none {{ !$msg->is_read ? 'fw-bold text-dark' : 'text-muted' }}">
                                                {{ Str::limit($msg->subject ?: 'Genel Danışma', 35) }}
                                            </a>
                                        @endif
                                    </td>
                                    <td class="small text-muted" style="font-size: 0.78rem;">
                                        {{ $msg->created_at->format('d.m.Y H:i') }}
                                    </td>
                                    <td style="text-align: right;">
                                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn-action" title="İncele">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- RIGHT: QUICK ACTIONS & SYSTEM (4 COLS) -->
    <div class="col-lg-4">
        <!-- Quick Actions Card -->
        <div class="card-custom shadow-sm mb-4">
            <div class="card-header-custom pb-2">
                <h6 class="card-title-custom mb-0">
                    <i class="bi bi-lightning-charge text-warning me-2"></i>Hızlı İşlemler
                </h6>
            </div>
            <div class="d-flex flex-column gap-2 pt-2">
                <a href="{{ route('admin.products.create') }}" class="p-2 px-3 rounded-3 d-flex align-items-center justify-content-between text-decoration-none bg-light border hover-shadow" style="transition: all 0.2s;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle text-primary fs-5"></i>
                        <span class="fw-bold text-dark" style="font-size: 0.88rem;">Yeni Ürün Ekle</span>
                    </div>
                    <i class="bi bi-chevron-right text-muted small"></i>
                </a>
                <a href="{{ route('admin.pages.create') }}" class="p-2 px-3 rounded-3 d-flex align-items-center justify-content-between text-decoration-none bg-light border hover-shadow" style="transition: all 0.2s;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-file-earmark-plus text-primary fs-5"></i>
                        <span class="fw-bold text-dark" style="font-size: 0.88rem;">Yeni Sayfa Oluştur</span>
                    </div>
                    <i class="bi bi-chevron-right text-muted small"></i>
                </a>
                <a href="{{ route('admin.references.create') }}" class="p-2 px-3 rounded-3 d-flex align-items-center justify-content-between text-decoration-none bg-light border hover-shadow" style="transition: all 0.2s;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-building-add text-success fs-5"></i>
                        <span class="fw-bold text-dark" style="font-size: 0.88rem;">Yeni Referans Logosu</span>
                    </div>
                    <i class="bi bi-chevron-right text-muted small"></i>
                </a>
                <a href="{{ route('admin.certificates.create') }}" class="p-2 px-3 rounded-3 d-flex align-items-center justify-content-between text-decoration-none bg-light border hover-shadow" style="transition: all 0.2s;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-award text-warning fs-5"></i>
                        <span class="fw-bold text-dark" style="font-size: 0.88rem;">Yeni Sertifika Belgesi</span>
                    </div>
                    <i class="bi bi-chevron-right text-muted small"></i>
                </a>
            </div>
        </div>

        <!-- System & Settings Card -->
        <div class="card-custom shadow-sm mb-0">
            <div class="card-header-custom pb-2">
                <h6 class="card-title-custom mb-0">
                    <i class="bi bi-sliders text-primary me-2"></i>Sistem & Canlı Site
                </h6>
            </div>
            <div class="d-flex flex-column gap-2 pt-2">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-sm btn-outline-primary bg-white d-flex align-items-center justify-content-between p-2 px-3">
                    <span class="fw-bold"><i class="bi bi-gear me-2"></i>Site İçerikleri & Ayarlar</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary d-flex align-items-center justify-content-between p-2 px-3">
                    <span class="fw-bold"><i class="bi bi-box-arrow-up-right me-2"></i>Web Sitesini Aç</span>
                    <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
