@extends('admin.layout')

@section('title', 'Products – Admin')
@section('page_title', 'Product Catalog')

@section('content')
<div class="card-custom">
    <div class="card-header-custom">
        <div>
            <h5 class="fw-bold mb-1" style="color: #0F172A;">
                <i class="bi bi-cpu text-primary me-2"></i>Ürün Kataloğu & Donanımlar
            </h5>
            <small class="text-muted">Sitede sergilenen {{ $products->total() }} savunma sistemi, teknik şartnameleri ve PDF datasheetler.</small>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-tags me-1"></i> Kategorileri Yönet ({{ \App\Models\Category::count() }})
            </a>
            <a href="{{ route('admin.products.create') }}" class="btn-emc py-2 px-3" style="font-size: 0.85rem;">
                <i class="bi bi-plus-lg me-1"></i> Yeni Ürün Ekle
            </a>
        </div>
    </div>

    @if($products->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-inbox display-6 mb-3 d-block opacity-50"></i>
            <p class="mb-3">No products found in the catalog.</p>
            <a href="{{ route('admin.products.create') }}" class="btn-emc">Add Your First Product</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th style="width: 65px;">Image</th>
                        <th>Name & Model</th>
                        <th>Category</th>
                        <th style="width: 130px;">Files & Media</th>
                        <th style="width: 100px;">Type</th>
                        <th style="width: 90px;">Status</th>
                        <th style="width: 120px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                @if($product->image_path)
                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="width: 48px; height: 48px; object-fit: cover; border-radius: 8px; border: 1px solid #E2E8F0; background: #F8FAFC;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 8px; background: #F1F5F9; color: #94A3B8; border: 1px solid #E2E8F0;">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold" style="color: #0F172A;">{{ $product->name }}</div>
                                @if($product->model_number)
                                    <div class="small text-muted font-monospace"><i class="bi bi-upc me-1"></i>{{ $product->model_number }}</div>
                                @endif
                            </td>
                            <td>
                                @if($product->category)
                                    <span class="badge badge-tag">{{ $product->category->name }}</span>
                                @else
                                    <span class="text-muted small">None</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    @if($product->datasheet_path)
                                        <a href="{{ asset('storage/' . $product->datasheet_path) }}" target="_blank" class="btn-action text-danger" title="Download Datasheet PDF">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </a>
                                    @endif
                                    @if($product->video_path)
                                        <span class="btn-action text-info" title="Has Video Demonstration">
                                            <i class="bi bi-film"></i>
                                        </span>
                                    @endif
                                    @if(!$product->datasheet_path && !$product->video_path)
                                        <span class="small text-muted">—</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($product->is_used_equipment)
                                    <span class="badge rounded-pill bg-warning text-dark font-monospace" style="font-size: 0.68rem;">Used / 2nd Hand</span>
                                @else
                                    <span class="badge rounded-pill bg-secondary text-light font-monospace opacity-75" style="font-size: 0.68rem;">New</span>
                                @endif
                            </td>
                            <td>
                                @if($product->is_active)
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
                                    <a href="{{ route('product.show', $product->id) }}" target="_blank" class="btn-action" title="View on Frontend">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-action" title="Edit Product">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
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

        <div class="mt-4 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection
