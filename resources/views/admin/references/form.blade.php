@extends('admin.layout')

@php
    $isEdit = !empty($reference);
    $title = $isEdit ? 'Referans Düzenle: ' . $reference->name : 'Yeni Referans Logosu Ekle';
@endphp

@section('title', $title . ' – Admin')
@section('page_title', $title)

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-custom">
            <div class="card-header-custom">
                <div>
                    <h6 class="card-title-custom">
                        <i class="bi bi-{{ $isEdit ? 'pencil-square' : 'plus-circle' }} text-primary"></i>
                        {{ $title }}
                    </h6>
                    <p class="text-muted small mb-0 mt-1">Savunma sanayii paydaşları, kurum ve müşteri referans logolarını buradan yönetin.</p>
                </div>
                <a href="{{ route('admin.references.index') }}" class="btn-outline-emc py-1 px-3" style="font-size: 0.82rem;">
                    <i class="bi bi-arrow-left"></i>
                    <span>Referanslara Dön</span>
                </a>
            </div>

            <form action="{{ $isEdit ? route('admin.references.update', $reference->id) : route('admin.references.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="form-label-custom" for="name">Organization / Company Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control-custom" placeholder="e.g. Aselsan, Roketsan, TÜBİTAK SAGE, Havelsan..." value="{{ old('name', $reference->name ?? '') }}" required autofocus>
                        <div class="small text-muted mt-1">Official defense contractor or agency corporate name</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom" for="sort_order">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" class="form-control-custom" value="{{ old('sort_order', $reference->sort_order ?? 0) }}" min="0">
                        <div class="small text-muted mt-1">Order on the references grid</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom" for="group">Category Group <span class="text-danger">*</span></label>
                        <select name="group" id="group" class="form-select-custom" required>
                            <option value="">-- Select Group --</option>
                            <option value="shielded_rooms" {{ old('group', $reference->group ?? '') == 'shielded_rooms' ? 'selected' : '' }}>Shielded Rooms & Test Cabins</option>
                            <option value="tempest_filters" {{ old('group', $reference->group ?? '') == 'tempest_filters' ? 'selected' : '' }}>TEMPEST Filters & Custom Filters</option>
                            <option value="instruments" {{ old('group', $reference->group ?? '') == 'instruments' ? 'selected' : '' }}>Instruments, Antennas & Accessories</option>
                            <option value="general" {{ old('group', $reference->group ?? '') == 'general' ? 'selected' : '' }}>General References</option>
                        </select>
                        <div class="small text-muted mt-1">Used for tab filtering on the references page</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom" for="url">Website URL (Optional)</label>
                        <input type="url" name="url" id="url" class="form-control-custom font-monospace" placeholder="https://www.example.com" value="{{ old('url', $reference->url ?? '') }}">
                        <div class="small text-muted mt-1">Direct link to partner / client website</div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label-custom" for="logo">Organization Logo (PNG / SVG / WebP)</label>
                        <div class="upload-dropzone">
                            <i class="bi bi-building fs-2 text-primary mb-2"></i>
                            <div class="fw-semibold text-dark mb-1" style="font-size: 0.85rem;">Select Organization Logo</div>
                            <div class="text-muted small mb-2" style="font-size: 0.75rem;">Transparent PNG or SVG recommended • Max: 2 MB</div>
                            <input type="file" name="logo" id="logo" class="form-control-custom" accept="image/*">
                        </div>
                        
                        @if($isEdit && $reference->logo_path)
                            <div class="file-preview-card mt-2 p-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="p-2 rounded border bg-white d-flex align-items-center justify-content-center" style="width: 80px; height: 50px;">
                                        <img src="{{ asset('storage/' . $reference->logo_path) }}" alt="{{ $reference->name }}" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                    </div>
                                    <div>
                                        <div class="badge bg-success-subtle text-success border border-success-subtle mb-1">Active Logo</div>
                                        <div class="fw-bold text-dark small">{{ $reference->name }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-12">
                        <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active" value="1" {{ old('is_active', $reference->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark ms-2" for="is_active">
                                    Active (Displayed on References page)
                                </label>
                                <div class="text-muted small ms-2 mt-1">When unchecked, this reference will be hidden immediately from all public listings.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pt-3 border-top d-flex gap-2 justify-content-end" style="border-color: #E2E8F0 !important;">
                        <a href="{{ route('admin.references.index') }}" class="btn-outline-emc">Cancel</a>
                        <button type="submit" class="btn-emc">
                            <i class="bi bi-check-lg"></i>
                            <span>{{ $isEdit ? 'Update Reference' : 'Save Reference' }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
