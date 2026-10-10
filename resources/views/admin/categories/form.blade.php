@extends('admin.layout')

@php
    $isEdit = !empty($category);
    $title = $isEdit ? 'Kategori Düzenle: ' . $category->name : 'Yeni Kategori Oluştur';
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
                    <p class="text-muted small mb-0 mt-1">Katalog kategori filtrelerini, menü sırasını ve ikonunu buradan yapılandırın.</p>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="btn-outline-emc py-1 px-3" style="font-size: 0.82rem;">
                    <i class="bi bi-arrow-left"></i>
                    <span>Kategorilere Dön</span>
                </a>
            </div>

            <form action="{{ $isEdit ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="form-label-custom" for="name">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control-custom" placeholder="e.g. Marx Generators, RF Absorbers..." value="{{ old('name', $category->name ?? '') }}" required autofocus>
                        <div class="small text-muted mt-1">Shown in the top navigation bar and product filter pills</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom" for="sort_order">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" class="form-control-custom" value="{{ old('sort_order', $category->sort_order ?? 0) }}" min="0">
                        <div class="small text-muted mt-1">Lower numbers appear first in the menu</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom" for="slug">URL Slug (Optional)</label>
                        <input type="text" name="slug" id="slug" class="form-control-custom font-monospace" placeholder="auto-generated-from-name" value="{{ old('slug', $category->slug ?? '') }}">
                        <div class="small text-muted mt-1">Leave empty to auto-generate a clean URL slug from the title</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom" for="icon">Bootstrap Icon Class</label>
                        <div class="input-group">
                            <input type="text" name="icon" id="icon" class="form-control-custom font-monospace" placeholder="e.g. bi-lightning-charge, bi-cpu" value="{{ old('icon', $category->icon ?? '') }}">
                        </div>
                        <div class="small text-muted mt-1">Examples: <code>bi-lightning-charge</code>, <code>bi-cpu</code>, <code>bi-shield-check</code></div>
                    </div>

                    <div class="col-12">
                        <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active" value="1" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold text-dark ms-2" for="is_active">
                                    Active (Visible in navigation and catalog)
                                </label>
                                <div class="text-muted small ms-2 mt-1">Disabling this category hides it and all products inside it from public view.</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 pt-3 border-top d-flex gap-2 justify-content-end" style="border-color: #E2E8F0 !important;">
                        <a href="{{ route('admin.categories.index') }}" class="btn-outline-emc">Cancel</a>
                        <button type="submit" class="btn-emc">
                            <i class="bi bi-check-lg"></i>
                            <span>{{ $isEdit ? 'Update Category' : 'Create Category' }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
