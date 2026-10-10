@extends('admin.layout')

@section('title', 'Gelen Talepler & Mesajlar – Admin')
@section('page_title', 'Talepler & Mesaj Merkezi')

@section('content')
<div class="card-custom">
    <div class="card-header-custom flex-wrap gap-3">
        <div>
            <h5 class="fw-bold mb-1" style="color: #0F172A;">
                <i class="bi bi-inbox text-primary me-2"></i>Gelen Talepler & Mesajlar
            </h5>
            <small class="text-muted">Web siteniz üzerinden iletilen deney talepleri ve iletişim bildirimleri.</small>
        </div>
        <!-- Segment Filter Pills -->
        <div class="btn-group p-1 bg-light rounded-pill border" role="group">
            <a href="{{ route('admin.messages.index') }}" class="btn btn-sm rounded-pill px-3 py-1 {{ empty($type) ? 'btn-primary text-white fw-bold shadow-sm' : 'text-muted' }}">
                Tümü ({{ $totalTestRequests + $totalContactMessages }})
            </a>
            <a href="{{ route('admin.messages.index', ['type' => 'test_request']) }}" class="btn btn-sm rounded-pill px-3 py-1 {{ $type === 'test_request' ? 'btn-primary text-white fw-bold shadow-sm' : 'text-muted' }}">
                <i class="bi bi-file-earmark-medical me-1"></i> Deney Talepleri ({{ $totalTestRequests }})
            </a>
            <a href="{{ route('admin.messages.index', ['type' => 'contact']) }}" class="btn btn-sm rounded-pill px-3 py-1 {{ $type === 'contact' ? 'btn-primary text-white fw-bold shadow-sm' : 'text-muted' }}">
                <i class="bi bi-chat-left-dots me-1"></i> Genel İletişim ({{ $totalContactMessages }})
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert" style="background: #DCFCE7; border: 1px solid #86EFAC; color: #166534;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($messages->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-inbox display-6 mb-3 d-block opacity-50"></i>
            <p class="mb-0">Henüz bu kategoride gelen bir bildirim bulunmuyor.</p>
        </div>
    @else
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th style="width: 50px;">Durum</th>
                        <th style="width: 170px;">Talep Türü</th>
                        <th>Başvuru Sahibi & Kurum</th>
                        <th>İletişim Bilgileri</th>
                        <th>Talep / Cihaz Özeti</th>
                        <th style="width: 130px;">Tarih</th>
                        <th style="width: 110px; text-align: right;">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                        @php
                            $isTestRequest = !empty($msg->device_name);
                        @endphp
                        <tr style="{{ !$msg->is_read ? 'background: #EFF6FF;' : '' }}">
                            <td>
                                @if(!$msg->is_read)
                                    <span class="badge rounded-pill bg-danger" title="Okunmadı">YENİ</span>
                                @else
                                    <span class="badge rounded-pill bg-secondary opacity-50" title="Okundu">Okundu</span>
                                @endif
                            </td>
                            <td>
                                @if($isTestRequest)
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold d-inline-flex align-items-center gap-1">
                                        <i class="bi bi-file-earmark-medical"></i> Deney Talebi (FR 7.1.4)
                                    </span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle fw-semibold d-inline-flex align-items-center gap-1">
                                        <i class="bi bi-chat-left-dots"></i> İletişim Mesajı
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold" style="color: #0F172A;">{{ $msg->name }}</div>
                                @if($msg->company)
                                    <div class="small text-muted"><i class="bi bi-building me-1"></i>{{ $msg->company }}</div>
                                @endif
                            </td>
                            <td>
                                <div><a href="mailto:{{ $msg->email }}" class="text-decoration-none small fw-semibold" style="color: #1E2D7D;"><i class="bi bi-envelope me-1"></i>{{ $msg->email }}</a></div>
                                @if($msg->phone)
                                    <div class="small text-muted"><i class="bi bi-telephone me-1"></i>{{ $msg->phone }}</div>
                                @endif
                            </td>
                            <td>
                                @if($isTestRequest)
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-decoration-none fw-bold text-dark d-block">
                                        {{ $msg->device_name }}
                                        @if($msg->brand_model)
                                            <span class="text-muted fw-normal">({{ $msg->brand_model }})</span>
                                        @endif
                                    </a>
                                    @if($msg->product_standard)
                                        <span class="badge bg-light text-primary border font-monospace mt-1" style="font-size: 0.68rem;">
                                            {{ $msg->product_standard }}
                                        </span>
                                    @endif
                                @else
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-decoration-none {{ !$msg->is_read ? 'fw-bold' : '' }}" style="color: {{ !$msg->is_read ? '#1E2D7D' : '#64748B' }};">
                                        {{ Str::limit($msg->subject ?: 'Genel Danışma / Mesaj', 45) }}
                                    </a>
                                @endif
                            </td>
                            <td class="small text-muted">
                                <div>{{ $msg->created_at->format('d.m.Y') }}</div>
                                <div style="font-size: 0.72rem;">{{ $msg->created_at->format('H:i') }}</div>
                            </td>
                            <td style="text-align: right;">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn-action" title="Tüm Detayları Gör">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bu kaydı silmek istediğinize emin misiniz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action delete" title="Sil">
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

        <div class="mt-4 d-flex justify-content-center">
            {{ $messages->links() }}
        </div>
    @endif
</div>
@endsection
