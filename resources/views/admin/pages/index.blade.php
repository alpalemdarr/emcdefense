@extends('admin.layout')

@section('title', 'Pages Management – Admin')
@section('page_title', 'Sayfa Yönetimi & İçerik Düzenleme')

@section('content')
<div class="card-custom">
    <div class="card-header-custom">
        <div>
            <h5 class="fw-bold mb-1" style="color: #0F172A;">
                <i class="bi bi-file-earmark-text text-primary me-2"></i>Web Sayfaları ({{ $pages->count() }})
            </h5>
            <small class="text-muted">Web sitenizdeki dinamik sayfaların içeriklerini, başlıklarını ve SEO ayarlarını yönetin.</small>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.pages.create') }}" class="btn-emc py-2 px-3" style="font-size: 0.85rem;">
                <i class="bi bi-plus-lg me-1"></i> Yeni Sayfa Ekle
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: #DCFCE7; border: 1px solid #86EFAC; color: #166534;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: #FEE2E2; border: 1px solid #FCA5A5; color: #991B1B;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table-custom">
            <thead>
                <tr>
                    <th style="width: 50px;">Sıra</th>
                    <th>Sayfa Başlığı & URL (Slug)</th>
                    <th style="width: 130px;">Sayfa Türü</th>
                    <th>Üst Rozet & Giriş Metni</th>
                    <th style="width: 140px;">Menüde Göster</th>
                    <th style="width: 90px;">Durum</th>
                    <th style="width: 140px; text-align: right;">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td class="text-muted fw-bold font-monospace">#{{ $page->sort_order }}</td>
                        <td>
                            <div class="fw-bold" style="color: #0F172A; font-size: 0.95rem;">
                                {{ $page->title_tr }}
                            </div>
                            <div class="d-flex align-items-center gap-1 mt-1">
                                <span class="badge bg-light text-secondary border font-monospace" style="font-size: 0.72rem;">
                                    /{{ $page->slug }}
                                </span>
                                <span class="text-muted small">({{ $page->title_en }})</span>
                            </div>
                        </td>
                        <td>
                            @if($page->is_system)
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold">
                                    <i class="bi bi-gear-fill me-1"></i> Sistem Sayfası
                                </span>
                            @else
                                <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold">
                                    <i class="bi bi-file-earmark-plus me-1"></i> Özel Sayfa
                                </span>
                            @endif
                        </td>
                        <td>
                            @if($page->badge_tr)
                                <div class="badge bg-light text-primary border border-primary-subtle font-monospace text-truncate mb-1" style="max-width: 280px; font-size: 0.68rem;">
                                    {{ $page->badge_tr }}
                                </div>
                            @endif
                            <div class="small text-muted text-truncate" style="max-width: 320px;">
                                {{ $page->lead_tr ?: '—' }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column gap-1">
                                @if($page->show_in_navbar)
                                    <span class="badge bg-info-subtle text-info border border-info-subtle" style="font-size: 0.68rem;">
                                        <i class="bi bi-compass me-1"></i> Navbar'da
                                    </span>
                                @endif
                                @if($page->show_in_footer)
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle" style="font-size: 0.68rem;">
                                        <i class="bi bi-layout-text-window-reverse me-1"></i> Footer'da
                                    </span>
                                @endif
                                @if(!$page->show_in_navbar && !$page->show_in_footer)
                                    <span class="text-muted small">—</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('admin.pages.toggle-status', $page->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="border-0 bg-transparent p-0 text-start" style="cursor: pointer;" title="{{ $page->is_active ? 'Yayında (Aktif) – Pasife almak için tıklayın' : 'Pasif (Gizli) – Yayına almak için tıklayın' }}">
                                    @if($page->is_active)
                                        <span class="badge-status badge-active" style="display: inline-flex; align-items: center; gap: 4px;">
                                            <i class="bi bi-check-circle-fill"></i> Yayında
                                        </span>
                                    @else
                                        <span class="badge-status badge-inactive" style="display: inline-flex; align-items: center; gap: 4px;">
                                            <i class="bi bi-pause-circle-fill"></i> Pasif
                                        </span>
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td style="text-align: right;">
                            <div class="d-inline-flex gap-1">
                                @php
                                    $pageUrl = $page->is_system
                                        ? ($page->slug === 'certificates' ? route('certificates') : ($page->slug === 'references' ? route('references') : route('contact')))
                                        : url('/' . $page->slug);
                                @endphp
                                <form action="{{ route('admin.pages.toggle-status', $page->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-action {{ $page->is_active ? 'text-warning' : 'text-success' }}" title="{{ $page->is_active ? 'Sayfayı Pasife Al (Gizle)' : 'Sayfayı Yayına Al (Aktifleştir)' }}">
                                        <i class="bi bi-{{ $page->is_active ? 'eye-slash' : 'eye' }}"></i>
                                    </button>
                                </form>
                                <a href="{{ $pageUrl }}" target="_blank" class="btn-action" title="Ön yüzde incele">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                                <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn-action" title="Sayfayı baştan aşağı düzenle">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" class="d-inline" onsubmit="return confirm('\'{{ $page->title_tr }}\' sayfasını kalıcı olarak silmek istediğinize emin misiniz?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action delete" title="Sayfayı Sil">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
