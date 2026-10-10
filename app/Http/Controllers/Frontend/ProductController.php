<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(int $id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->with(['activeProducts'])
            ->get();

        return view('frontend.product', compact('product', 'categories'));
    }
}
