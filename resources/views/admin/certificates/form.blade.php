@extends('admin.layout')

@php
    $isEdit = !empty($certificate);
    $title = $isEdit ? 'Sertifika Düzenle: ' . $certificate->title : 'Yeni Sertifika Belgesi Yükle';
@endphp

@section('title', $title . ' – Admin')
@section('page_title', $title)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-xl-7">
        <div class="card-custom">
            <div class="card-header-custom">
                <div>
                    <h6 class="card-title-custom">
                        <i class="bi bi-{{ $isEdit ? 'pencil-square' : 'plus-circle' }} text-primary"></i>
                        {{ $title }}
                    </h6>
                    <p class="text-muted small mb-0 mt-1">Sertifikalar ve kalite belgelerini (PDF ve görsel) buradan yükleyip yönetin.</p>
                </div>
                <a href="{{ route('admin.certificates.index') }}" class="btn-outline-emc py-1 px-3" style="font-size: 0.82rem;">
                    <i class="bi bi-arrow-left"></i>
                    <span>Sertifikalara Dön</span>
                </a>
            </div>

            <form action="{{ $isEdit ? route('admin.certificates.update', $certificate->id) : route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="form-label-custom" for="title">Certificate Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control-custom" placeholder="e.g. ISO 9001:2015 Quality Management System" value="{{ old('title', $certificate->title ?? '') }}" required autofocus>
                        <div class="small text-muted mt-1">Clear title describing the standard or accreditation scope</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom" for="sort_order">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" class="form-control-custom" value="{{ old('sort_order', $certificate->sort_order ?? 0) }}" min="0">
                        <div class="small text-muted mt-1">Order on certificates grid</div>
                    </div>

                    <div class="col-12">
                        <label class="form-label-custom" for="image">
                            Certificate Document Image {{ $isEdit ? '(Optional to replace)' : '*' }}
                        </label>
                        
                        <div class="upload-dropzone">
                            <i class="bi bi-file-earmark-image fs-2 text-primary mb-2"></i>
                            <div class="fw-semibold text-dark mb-1">Click to select or drag and drop image file</div>
                            <div class="text-muted small mb-3">High resolution PNG, JPG, or WebP. Recommended ratio 3:4. Max: 5 MB</div>
                            <input type="file" name="image" id="image" class="form-control-custom" accept="image/*" {{ $isEdit ? '' : 'required' }}>
                        </div>

                        @if($isEdit && $certificate->image_path)
                            <div class="file-preview-card mt-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="thumb-container">
                                        <img src="{{ asset('storage/' . $certificate->image_path) }}" alt="Current Certificate">
                                    </div>
                                    <div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold">Current Document</span>
                                            <span class="text-muted small">Uploaded</span>
                                        </div>
                                        <div class="fw-bold text-dark mt-1" style="font-size: 0.9rem;">{{ $certificate->title }}</div>
                                        <a href="{{ asset('storage/' . $certificate->image_path) }}" target="_blank" class="small fw-semibold text-decoration-none mt-1 d-inline-flex align-items-center gap-1" style="color: var(--brand-primary);">
                                            <i class="bi bi-box-arrow-up-right"></i> View Full Resolution
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-12">
                        <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active" value="1" {{ old('is_active', $certificate->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark ms-2" for="is_active">
                                    Active (Visible in public certificates section)
                                </label>
                                <div class="text-muted small ms-2 mt-1">If unchecked, this certificate will be hidden from the public website immediately.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pt-3 border-top d-flex gap-2 justify-content-end" style="border-color: #E2E8F0 !important;">
                        <a href="{{ route('admin.certificates.index') }}" class="btn-outline-emc">Cancel</a>
                        <button type="submit" class="btn-emc">
                            <i class="bi bi-check-lg"></i>
                            <span>{{ $isEdit ? 'Update Certificate' : 'Save Certificate' }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
