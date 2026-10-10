@extends('admin.layout')

@php
    $isEdit = !empty($product);
    $title = $isEdit ? 'Ürün Düzenle: ' . $product->name : 'Yeni Ürün Ekle';

    // Format specifications array to lines
    $specsText = '';
    if ($isEdit && is_array($product->specifications)) {
        foreach ($product->specifications as $key => $val) {
            $specsText .= "$key: $val\n";
        }
    }
@endphp

@section('title', $title . ' – Admin')
@section('page_title', $title)

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-11 col-xxl-10">
        <div class="card-custom">
            <div class="card-header-custom">
                <div>
                    <h6 class="card-title-custom">
                        <i class="bi bi-{{ $isEdit ? 'pencil-square' : 'plus-circle' }} text-primary"></i>
                        {{ $title }}
                    </h6>
                    <p class="text-muted small mb-0 mt-1">Ürünün askeri standartlara uyumunu, teknik şartname tablosunu, resim, 3D video ve PDF datasheet dosyalarını buradan yönetin.</p>
                </div>
                <div class="d-flex gap-2">
                    @if($isEdit)
                        <a href="{{ route('product.show', $product->id) }}" target="_blank" class="btn-outline-emc py-1 px-3" style="font-size: 0.82rem;">
                            <i class="bi bi-box-arrow-up-right"></i>
                            <span>Canlı Ürünü Gör</span>
                        </a>
                    @endif
                    <a href="{{ route('admin.products.index') }}" class="btn-outline-emc py-1 px-3" style="font-size: 0.82rem;">
                        <i class="bi bi-arrow-left"></i>
                        <span>Kataloğa Dön</span>
                    </a>
                </div>
            </div>

            <form action="{{ $isEdit ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="row g-4">
                    <!-- SECTION 1: BASIC INFORMATION -->
                    <div class="col-12">
                        <div class="d-flex align-items-center gap-2 pb-2 border-bottom" style="border-color: #E2E8F0 !important;">
                            <span class="badge rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 0.75rem;">1</span>
                            <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.95rem;">Temel Bilgiler & Kategori Sınıflandırması</h6>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom" for="category_id">Product Category <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-select-custom" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="small text-muted mt-1">Used for filtering and category grouping on the public website</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom" for="name">Product Title / Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control-custom" placeholder="e.g. Marx Generator RS105, Power Line Filter..." value="{{ old('name', $product->name ?? '') }}" required>
                        <div class="small text-muted mt-1">Full commercial or military designation of the product</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom" for="model_number">Model / Part Number</label>
                        <input type="text" name="model_number" id="model_number" class="form-control-custom font-monospace" placeholder="e.g. MIL-STD-461, TGH-16, EK454545" value="{{ old('model_number', $product->model_number ?? '') }}">
                        <div class="small text-muted mt-1">Optional internal or MIL-SPEC part code</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom" for="quote_email">Direct RFQ / Quote Email</label>
                        <input type="email" name="quote_email" id="quote_email" class="form-control-custom" placeholder="sales@emcdefence.com" value="{{ old('quote_email', $product->quote_email ?? '') }}">
                        <div class="small text-muted mt-1">Recipient for "Request Quote" inquiries (leave blank for default)</div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom" for="sort_order">Catalog Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" class="form-control-custom" value="{{ old('sort_order', $product->sort_order ?? 0) }}" min="0">
                        <div class="small text-muted mt-1">Lower numbers appear first in the catalog grid</div>
                    </div>

                    <!-- SECTION 2: DESCRIPTIONS & SPECIFICATIONS -->
                    <div class="col-12 mt-4">
                        <div class="d-flex align-items-center gap-2 pb-2 border-bottom" style="border-color: #E2E8F0 !important;">
                            <span class="badge rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 0.75rem;">2</span>
                            <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.95rem;">Descriptions & Technical Specifications</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label-custom" for="short_description">Short Summary</label>
                        <textarea name="short_description" id="short_description" class="form-control-custom" rows="2" placeholder="Brief technical summary shown on product cards and preview teasers (1-2 sentences)...">{{ old('short_description', $product->short_description ?? '') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label-custom" for="description">Detailed Overview & Capabilities</label>
                        <textarea name="description" id="description" class="form-control-custom" rows="5" placeholder="Comprehensive technical overview, compliant military standards (MIL-STD-461, MIL-STD-188-125, SDIP-27), design architecture, operational reliability...">{{ old('description', $product->description ?? '') }}</textarea>
                    </div>

                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <label class="form-label-custom mb-0" for="specifications">Technical Specifications Table</label>
                            <span class="badge bg-light text-primary border border-primary-subtle font-monospace" style="font-size: 0.72rem;">Key: Value per line</span>
                        </div>
                        <div class="p-3 rounded-3" style="background: #F8FAFC; border: 1.5px solid #CBD5E1;">
                            <textarea name="specifications" id="specifications" class="form-control font-monospace border-0 bg-transparent text-dark p-0 shadow-none" rows="7" style="font-size: 0.88rem; line-height: 1.6;" placeholder="Frequency Range: 10 kHz - 18 GHz&#10;Input Voltage: 230V AC / 50Hz&#10;Current Rating: 16A&#10;Attenuation: > 100 dB (100kHz - 10GHz)&#10;Standards: MIL-STD-461G / DEF-STAN 59-411">{{ old('specifications', $specsText) }}</textarea>
                        </div>
                        <div class="small text-muted mt-2 d-flex align-items-center gap-1">
                            <i class="bi bi-info-circle text-primary"></i>
                            <span>Format: Enter one parameter per line as <code>Param: Value</code>. The frontend automatically parses these into a formatted responsive table.</span>
                        </div>
                    </div>

                    <!-- SECTION 3: MEDIA & DATASHEET ASSETS -->
                    <div class="col-12 mt-4">
                        <div class="d-flex align-items-center gap-2 pb-2 border-bottom" style="border-color: #E2E8F0 !important;">
                            <span class="badge rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width: 24px; height: 24px; font-size: 0.75rem;">3</span>
                            <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.95rem;">Media & Technical Datasheet Uploads</h6>
                        </div>
                    </div>

                    <!-- Datasheet PDF -->
                    <div class="col-md-4">
                        <label class="form-label-custom d-flex align-items-center justify-content-between" for="datasheet">
                            <span>Datasheet (PDF)</span>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle" style="font-size: 0.68rem;">PDF Document</span>
                        </label>
                        <div class="upload-dropzone">
                            <i class="bi bi-file-earmark-pdf fs-2 text-danger mb-2"></i>
                            <div class="fw-semibold text-dark mb-1" style="font-size: 0.85rem;">Select Datasheet PDF</div>
                            <div class="text-muted small mb-2" style="font-size: 0.75rem;">Max 10 MB (.pdf)</div>
                            <input type="file" name="datasheet" id="datasheet" class="form-control-custom" accept=".pdf">
                        </div>
                        @if($isEdit && $product->datasheet_path)
                            <div class="file-preview-card mt-2 p-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2 text-truncate" style="max-width: 75%;">
                                        <div class="p-2 rounded bg-danger-subtle text-danger">
                                            <i class="bi bi-file-earmark-pdf-fill"></i>
                                        </div>
                                        <div class="text-truncate">
                                            <div class="fw-bold text-dark small text-truncate">Current PDF Document</div>
                                            <div class="text-muted small" style="font-size: 0.7rem;">Ready for download</div>
                                        </div>
                                    </div>
                                    <a href="{{ asset('storage/' . $product->datasheet_path) }}" target="_blank" class="btn btn-sm btn-outline-danger py-1 px-2" style="font-size: 0.75rem;">
                                        <i class="bi bi-box-arrow-up-right"></i> View
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Product Image -->
                    <div class="col-md-4">
                        <label class="form-label-custom d-flex align-items-center justify-content-between" for="image">
                            <span>Product Image</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle" style="font-size: 0.68rem;">Cover Image</span>
                        </label>
                        <div class="upload-dropzone">
                            <i class="bi bi-image fs-2 text-success mb-2"></i>
                            <div class="fw-semibold text-dark mb-1" style="font-size: 0.85rem;">Select Cover Image</div>
                            <div class="text-muted small mb-2" style="font-size: 0.75rem;">JPEG, PNG, WebP • Max 5 MB</div>
                            <input type="file" name="image" id="image" class="form-control-custom" accept="image/*">
                        </div>
                        @if($isEdit && $product->image_path)
                            <div class="file-preview-card mt-2 p-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="Preview" style="height: 38px; width: 38px; object-fit: cover; border-radius: 6px; border: 1px solid #E2E8F0;">
                                        <div>
                                            <div class="fw-bold text-dark small">Current Image</div>
                                            <div class="text-muted small" style="font-size: 0.7rem;">Active cover</div>
                                        </div>
                                    </div>
                                    <a href="{{ asset('storage/' . $product->image_path) }}" target="_blank" class="btn btn-sm btn-outline-success py-1 px-2" style="font-size: 0.75rem;">
                                        <i class="bi bi-zoom-in"></i> View
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Product Video -->
                    <div class="col-md-4">
                        <label class="form-label-custom d-flex align-items-center justify-content-between" for="video">
                            <span>Demo Video</span>
                            <span class="badge bg-info-subtle text-info border border-info-subtle" style="font-size: 0.68rem;">MP4 / WebM</span>
                        </label>
                        <div class="upload-dropzone">
                            <i class="bi bi-camera-video fs-2 text-primary mb-2"></i>
                            <div class="fw-semibold text-dark mb-1" style="font-size: 0.85rem;">Select Demo Video</div>
                            <div class="text-muted small mb-2" style="font-size: 0.75rem;">MP4, WebM • Max 50 MB</div>
                            <input type="file" name="video" id="video" class="form-control-custom" accept="video/mp4,video/webm">
                        </div>
                        @if($isEdit && $product->video_path)
                            <div class="file-preview-card mt-2 p-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center gap-2 text-truncate" style="max-width: 75%;">
                                        <div class="p-2 rounded bg-primary-subtle text-primary">
                                            <i class="bi bi-play-circle-fill"></i>
                                        </div>
                                        <div class="text-truncate">
                                            <div class="fw-bold text-dark small text-truncate">Uploaded Video</div>
                                            <div class="text-muted small" style="font-size: 0.7rem;">Demonstration clip</div>
                                        </div>
                                    </div>
                                    <a href="{{ asset('storage/' . $product->video_path) }}" target="_blank" class="btn btn-sm btn-outline-primary py-1 px-2" style="font-size: 0.75rem;">
                                        <i class="bi bi-play-fill"></i> Play
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- SECTION 4: VISIBILITY & STATUS -->
                    <div class="col-12 mt-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-dark ms-2" for="is_active">
                                            Active (Visible in Catalog)
                                        </label>
                                        <div class="text-muted small ms-2 mt-1">When disabled, this product remains saved in the database but will not be shown on public listings.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 rounded-3 h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0;">
                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input" type="checkbox" role="switch" name="is_used_equipment" id="is_used_equipment" value="1" {{ old('is_used_equipment', $product->is_used_equipment ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold text-dark ms-2" for="is_used_equipment">
                                            Used / Second-Hand Equipment
                                        </label>
                                        <div class="text-muted small ms-2 mt-1">Flags this item as certified 2nd-hand/refurbished military stock with a prominent badge.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ACTIONS BAR -->
                    <div class="col-12 mt-4 pt-3 border-top d-flex gap-2 justify-content-end" style="border-color: #E2E8F0 !important;">
                        <a href="{{ route('admin.products.index') }}" class="btn-outline-emc">Cancel</a>
                        <button type="submit" class="btn-emc">
                            <i class="bi bi-check-lg"></i>
                            <span>{{ $isEdit ? 'Update Product' : 'Create Product' }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
