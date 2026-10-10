@extends('admin.layout')

@section('title', 'Categories – Admin')
@section('page_title', 'Product Categories')

@section('content')
<div class="card-custom">
    <div class="card-header-custom">
        <div>
            <h5 class="fw-bold mb-1" style="color: #0F172A;">
                <i class="bi bi-tags text-primary me-2"></i>Ürün Kategorileri
            </h5>
            <small class="text-muted">Katalog filtreleme ve menü grupları ({{ $categories->count() }} Kategori).</small>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Ürünler Listesi
            </a>
            <a href="{{ route('admin.categories.create') }}" class="btn-emc py-2 px-3" style="font-size: 0.85rem;">
                <i class="bi bi-plus-lg me-1"></i> Yeni Kategori Ekle
            </a>
        </div>
    </div>

    @if($categories->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-folder2-open display-6 mb-3 d-block opacity-50"></i>
            <p class="mb-3">No categories found.</p>
            <a href="{{ route('admin.categories.create') }}" class="btn-emc">Create First Category</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th style="width: 60px;">Order</th>
                        <th style="width: 50px;">Icon</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th style="width: 120px;">Products</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 110px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="text-muted fw-bold">#{{ $category->sort_order }}</td>
                            <td>
                                <div class="user-avatar" style="width: 32px; height: 32px; font-size: 0.9rem; background: #EFF6FF; color: #1E2D7D; border: 1px solid #DBEAFE;">
                                    <i class="bi {{ $category->icon ?: 'bi-folder' }}"></i>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold" style="color: #0F172A;">{{ $category->name }}</div>
                            </td>
                            <td>
                                <code class="small text-secondary">{{ $category->slug }}</code>
                            </td>
                            <td>
                                <span class="badge badge-tag">{{ $category->products_count }} items</span>
                            </td>
                            <td>
                                @if($category->is_active)
                                    <span class="badge-status badge-active">
                                        <i class="bi bi-check-circle-fill"></i> Active
                                    </span>
                                @else
                                    <span class="badge-status badge-inactive">
                                        <i class="bi bi-x-circle-fill"></i> Inactive
                                    </span>
                                @endif
                            </td>
                            <td style="text-align: right;">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn-action" title="Edit Category">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category? Products in this category may be affected.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action delete" title="Delete">
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
    @endif
</div>
@endsection
