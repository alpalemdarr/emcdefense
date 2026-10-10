@extends('admin.layout')

@section('title', 'Message: ' . ($message->subject ?: 'Inquiry') . ' – Admin')
@section('page_title', 'View Message')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card-custom">
            <div class="card-header-custom">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge rounded-pill {{ !empty($message->device_name) ? 'bg-primary' : 'bg-success' }} small">
                        {{ !empty($message->device_name) ? 'Deney Talebi #' . $message->id : 'İletişim Mesajı #' . $message->id }}
                    </span>
                    <h6 class="card-title-custom mb-0">
                        {{ $message->subject ?: (!empty($message->device_name) ? 'Deney Talep Formu Başvurusu' : 'Genel İletişim Formu') }}
                    </h6>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="btn-outline-emc py-1 px-3" style="font-size: 0.8rem;">
                    <i class="bi bi-arrow-left"></i>
                    <span>Talepler Listesine Dön</span>
                </a>
            </div>

            <!-- Sender Meta Info Box -->
            <div class="p-3 mb-4 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                <div class="row g-3">
                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">From</span>
                        <strong style="color: #0F172A;">{{ $message->name }}</strong>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">Company</span>
                        <strong style="color: #0F172A;">{{ $message->company ?: 'Not Specified' }}</strong>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">Email</span>
                        <a href="mailto:{{ $message->email }}" class="text-decoration-none fw-semibold" style="color: #1E2D7D;">
                            {{ $message->email }}
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <span class="text-muted small d-block">Phone</span>
                        <span style="color: #0F172A;">{{ $message->phone ?: '—' }}</span>
                    </div>
                    <div class="col-12 pt-2 mt-2 d-flex justify-content-between text-muted small" style="border-top: 1px solid #E2E8F0;">
                        <span><i class="bi bi-calendar3 me-1"></i> Sent: {{ $message->created_at->format('F d, Y \a\t H:i:s') }}</span>
                        <span>({{ $message->created_at->diffForHumans() }})</span>
                    </div>
                </div>
            </div>

            @if($message->device_name)
                <!-- FR 7.1.4 Official Test Request Specifications -->
                <div class="card mb-4 border-primary shadow-sm" style="border-radius: 12px; overflow: hidden;">
                    <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between py-3">
                        <div class="fw-bold fs-6">
                            <i class="bi bi-file-earmark-medical me-2"></i> Deney Talep Formu (FR 7.1.4) – Cihaz Teknik Özellikleri
                        </div>
                        <span class="badge bg-white text-primary font-monospace">DOKÜMAN: {{ \App\Models\Setting::get('test_form_doc_no', 'FR 7.1.4') }}</span>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th class="bg-light text-muted" style="width: 28%;">Cihazın Adı</th>
                                    <td class="fw-bold text-dark">{{ $message->device_name }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Marka / Model</th>
                                    <td class="fw-semibold text-dark">{{ $message->brand_model ?: '—' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Elektriksel Parametreler</th>
                                    <td>
                                        <span class="badge bg-light text-dark border me-2">Besleme: {{ $message->voltage ?: '—' }} V</span>
                                        <span class="badge bg-light text-dark border">Faz Başı Akım: {{ $message->current ?: '—' }} A</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Ürün Standardı</th>
                                    <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle font-monospace">{{ $message->product_standard ?: '—' }}</span></td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Kullanım Alanı & Çalışma Modu</th>
                                    <td>{{ $message->usage_area ?: '—' }} / {{ $message->operation_mode ?: '—' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Elektronik Devre & Besleme Türü</th>
                                    <td>{{ $message->electronic_circuit ?: '—' }} / {{ $message->power_type ?: '—' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light text-muted">Konnektörler & Boyutlar</th>
                                    <td>{{ $message->connectors ?: '—' }} / {{ $message->dimensions ?: '—' }}</td>
                                </tr>
                                @if($message->device_description)
                                    <tr>
                                        <th class="bg-light text-muted">Cihaz Fonksiyon Açıklaması</th>
                                        <td>{{ $message->device_description }}</td>
                                    </tr>
                                @endif
                                @if($message->attachment)
                                    <tr>
                                        <th class="bg-light text-muted">Ek Doküman / Şartname</th>
                                        <td>
                                            <a href="{{ asset('storage/' . $message->attachment) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-paperclip me-1"></i> Eki İndir / Görüntüle
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Message Body -->
            <div class="mb-4">
                <label class="form-label-custom mb-2">Mesaj / Açıklama Metni</label>
                <div class="p-4 rounded-3" style="background: #FFFFFF; border: 1.5px solid #CBD5E1; color: #0F172A; font-size: 0.95rem; line-height: 1.7; white-space: pre-line;">
                    {{ $message->message ?: 'Ek açıklama belirtilmedi.' }}
                </div>
            </div>

            <!-- Actions Bar -->
            <div class="d-flex flex-wrap gap-2 justify-content-between pt-3" style="border-top: 1px solid #E2E8F0;">
                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Permanently delete this message?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm px-3">
                        <i class="bi bi-trash me-1"></i> Delete Message
                    </button>
                </form>

                <div class="d-flex gap-2">
                    <a href="mailto:{{ $message->email }}?subject={{ urlencode('Re: ' . ($message->subject ?: 'EMC Defense Inquiry')) }}" class="btn-emc">
                        <i class="bi bi-reply-fill"></i>
                        <span>Reply via Email</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
