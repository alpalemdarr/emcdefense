<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('category_id')->orderBy('sort_order')->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('admin.products.form', ['product' => null, 'categories' => $categories]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'model_number' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'specifications' => 'nullable|string',
            'quote_email' => 'nullable|email',
            'is_used_equipment' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'datasheet' => 'nullable|file|mimes:pdf|max:10240',
            'image' => 'nullable|image|max:5120',
            'video' => 'nullable|file|mimes:mp4,webm|max:51200',
        ]);

        $validated['is_used_equipment'] = $request->boolean('is_used_equipment');
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('datasheet')) {
            $validated['datasheet_path'] = $request->file('datasheet')->store('datasheets', 'public');
        }

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('video')) {
            $validated['video_path'] = $request->file('video')->store('videos', 'public');
        }

        // Parse specifications from textarea (key: value per line)
        if (isset($validated['specifications'])) {
            $specs = [];
            foreach (explode("\n", trim($validated['specifications'])) as $line) {
                $parts = explode(':', $line, 2);
                if (count($parts) === 2) {
                    $specs[trim($parts[0])] = trim($parts[1]);
                }
            }
            $validated['specifications'] = $specs ?: null;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('admin.products.form', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'model_number' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'specifications' => 'nullable|string',
            'quote_email' => 'nullable|email',
            'is_used_equipment' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'datasheet' => 'nullable|file|mimes:pdf|max:10240',
            'image' => 'nullable|image|max:5120',
            'video' => 'nullable|file|mimes:mp4,webm|max:51200',
        ]);

        $validated['is_used_equipment'] = $request->boolean('is_used_equipment');
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('datasheet')) {
            if ($product->datasheet_path) {
                Storage::disk('public')->delete($product->datasheet_path);
            }
            $validated['datasheet_path'] = $request->file('datasheet')->store('datasheets', 'public');
        }

        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('products', 'public');
        }

        if ($request->hasFile('video')) {
            if ($product->video_path) {
                Storage::disk('public')->delete($product->video_path);
            }
            $validated['video_path'] = $request->file('video')->store('videos', 'public');
        }

        if (isset($validated['specifications'])) {
            $specs = [];
            foreach (explode("\n", trim($validated['specifications'])) as $line) {
                $parts = explode(':', $line, 2);
                if (count($parts) === 2) {
                    $specs[trim($parts[0])] = trim($parts[1]);
                }
            }
            $validated['specifications'] = $specs ?: null;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->datasheet_path) {
            Storage::disk('public')->delete($product->datasheet_path);
        }
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        if ($product->video_path) {
            Storage::disk('public')->delete($product->video_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }
}
