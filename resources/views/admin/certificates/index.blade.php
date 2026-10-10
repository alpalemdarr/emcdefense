@extends('admin.layout')

@section('title', 'Certificates – Admin')
@section('page_title', 'Quality & Standard Certificates')

@section('content')
<div class="card-custom">
    <div class="card-header-custom">
        <div>
            <h5 class="fw-bold mb-1" style="color: #0F172A;">
                <i class="bi bi-award text-primary me-2"></i>Kalite & Akreditasyon Belgeleri ({{ $certificates->count() }})
            </h5>
            <small class="text-muted">Web sitesinde sergilenen ISO 9001:2015, ISO 17025 ve savunma kalite sertifikaları.</small>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.certificates.create') }}" class="btn-emc py-2 px-3" style="font-size: 0.85rem;">
                <i class="bi bi-plus-lg me-1"></i> Yeni Sertifika Yükle
            </a>
        </div>
    </div>

    @if($certificates->isEmpty())
        <div class="text-center py-5 text-muted">
            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light mb-3" style="width: 72px; height: 72px;">
                <i class="bi bi-patch-check display-6 text-primary opacity-50"></i>
            </div>
            <h5 class="fw-bold text-dark mb-1">No certificates uploaded yet</h5>
            <p class="mb-3 text-muted small">Upload your first quality or defense security accreditation document.</p>
            <a href="{{ route('admin.certificates.create') }}" class="btn-emc">Upload First Certificate</a>
        </div>
    @else
        <div class="row g-4">
            @foreach($certificates as $cert)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="certificate-card h-100 d-flex flex-column">
                        <div class="certificate-thumb">
                            <img src="{{ asset('storage/' . $cert->image_path) }}" alt="{{ $cert->title }}">
                            <div class="certificate-status-pill">
                                @if($cert->is_active)
                                    <span class="badge-status badge-active">
                                        <i class="bi bi-check-circle-fill"></i> Active
                                    </span>
                                @else
                                    <span class="badge-status badge-inactive">
                                        <i class="bi bi-x-circle-fill"></i> Inactive
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <span class="badge bg-light text-secondary border fw-semibold" style="font-size: 0.7rem;">
                                        Order #{{ $cert->sort_order }}
                                    </span>
                                    <span class="text-muted small font-monospace" style="font-size: 0.72rem;">ID: {{ $cert->id }}</span>
                                </div>
                                <h6 class="fw-bold mb-2 text-truncate-2" style="color: #0F172A; font-size: 0.9rem; line-height: 1.35; min-height: 2.7rem;" title="{{ $cert->title }}">
                                    {{ $cert->title }}
                                </h6>
                            </div>

                            <div class="d-flex align-items-center justify-content-between pt-3 mt-2" style="border-top: 1px solid #F1F5F9;">
                                <a href="{{ asset('storage/' . $cert->image_path) }}" target="_blank" class="small fw-semibold text-decoration-none d-inline-flex align-items-center gap-1" style="color: var(--brand-primary); font-size: 0.8rem;">
                                    <i class="bi bi-box-arrow-up-right"></i> Preview
                                </a>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.certificates.edit', $cert->id) }}" class="btn-action" title="Edit Certificate">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.certificates.destroy', $cert->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Permanently delete this certificate?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action delete" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
