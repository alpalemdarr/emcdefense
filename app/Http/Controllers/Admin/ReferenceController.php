<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::orderBy('group')->orderBy('sort_order')->get();

        return view('admin.references.index', compact('references'));
    }

    public function create()
    {
        return view('admin.references.form', ['reference' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'group' => 'required|in:shielded_rooms,tempest_filters,instruments,general',
            'url' => 'nullable|url|max:500',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
            'logo' => 'nullable|image|max:2048',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            $validated['logo_path'] = $request->file('logo')->store('references', 'public');
        }

        Reference::create($validated);

        return redirect()->route('admin.references.index')->with('success', 'Reference created.');
    }

    public function edit(Reference $reference)
    {
        return view('admin.references.form', compact('reference'));
    }

    public function update(Request $request, Reference $reference): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'group' => 'required|in:shielded_rooms,tempest_filters,instruments,general',
            'url' => 'nullable|url|max:500',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
            'logo' => 'nullable|image|max:2048',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            if ($reference->logo_path) {
                Storage::disk('public')->delete($reference->logo_path);
            }
            $validated['logo_path'] = $request->file('logo')->store('references', 'public');
        }

        $reference->update($validated);

        return redirect()->route('admin.references.index')->with('success', 'Reference updated.');
    }

    public function destroy(Reference $reference): RedirectResponse
    {
        if ($reference->logo_path) {
            Storage::disk('public')->delete($reference->logo_path);
        }

        $reference->delete();

        return redirect()->route('admin.references.index')->with('success', 'Reference deleted.');
    }
}
