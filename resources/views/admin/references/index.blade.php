@extends('admin.layout')

@section('title', 'References – Admin')
@section('page_title', 'Client References')

@section('content')
<div class="card-custom">
    <div class="card-header-custom">
        <div>
            <h5 class="fw-bold mb-1" style="color: #0F172A;">
                <i class="bi bi-shield-check text-primary me-2"></i>Müşteri & Kurum Referansları ({{ $references->count() }})
            </h5>
            <small class="text-muted">Web sitesinde ve ana sayfada sergilenen savunma sanayii paydaş logoları.</small>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.references.create') }}" class="btn-emc py-2 px-3" style="font-size: 0.85rem;">
                <i class="bi bi-plus-lg me-1"></i> Yeni Referans Ekle
            </a>
        </div>
    </div>

    @if($references->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-buildings display-6 mb-3 d-block opacity-50"></i>
            <p class="mb-3">No references registered yet.</p>
            <a href="{{ route('admin.references.create') }}" class="btn-emc">Add First Reference</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th style="width: 70px;">Logo</th>
                        <th>Organization / Company Name</th>
                        <th>Category Group</th>
                        <th>Website Link</th>
                        <th style="width: 80px;">Order</th>
                        <th style="width: 90px;">Status</th>
                        <th style="width: 100px; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $groupLabels = [
                            'shielded_rooms'  => 'Shielded Rooms & Test Cabins',
                            'tempest_filters' => 'TEMPEST Filters & Custom Filters',
                            'instruments'     => 'Instruments & Antennas',
                            'general'         => 'General Reference',
                        ];
                    @endphp
                    @foreach($references as $ref)
                        <tr>
                            <td>
                                @if($ref->logo_path)
                                    <div style="background: #F8FAFC; border: 1px solid #E2E8F0; padding: 4px 8px; border-radius: 6px; display: inline-flex;">
                                        <img src="{{ asset('storage/' . $ref->logo_path) }}" alt="{{ $ref->name }}" style="max-height: 32px; max-width: 60px; object-fit: contain;">
                                    </div>
                                @else
                                    <div class="user-avatar" style="width: 36px; height: 36px; border-radius: 6px; background: #EFF6FF; color: #1E2D7D; border: 1px solid #DBEAFE;">
                                        <i class="bi bi-building"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold" style="color: #0F172A;">{{ $ref->name }}</div>
                            </td>
                            <td>
                                <span class="badge badge-tag">{{ $groupLabels[$ref->group] ?? ucfirst($ref->group) }}</span>
                            </td>
                            <td>
                                @if($ref->url)
                                    <a href="{{ $ref->url }}" target="_blank" class="small text-info text-decoration-none" style="word-break: break-all;">
                                        <i class="bi bi-link-45deg me-1"></i>{{ Str::limit($ref->url, 30) }}
                                    </a>
                                @else
                                    <span class="small text-muted">—</span>
                                @endif
                            </td>
                            <td class="text-muted fw-bold">#{{ $ref->sort_order }}</td>
                            <td>
                                @if($ref->is_active)
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
                                    <a href="{{ route('admin.references.edit', $ref->id) }}" class="btn-action" title="Edit Reference">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.references.destroy', $ref->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this reference?');">
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
