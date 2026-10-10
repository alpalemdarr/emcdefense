<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('sort_order')->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.form', ['certificate' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
            'image' => 'required|image|max:5120',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['image_path'] = $request->file('image')->store('certificates', 'public');

        Certificate::create($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate added.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.form', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
            'image' => 'nullable|image|max:5120',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($certificate->image_path);
            $validated['image_path'] = $request->file('image')->store('certificates', 'public');
        }

        $certificate->update($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated.');
    }

    public function destroy(Certificate $certificate): RedirectResponse
    {
        Storage::disk('public')->delete($certificate->image_path);
        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted.');
    }
}
