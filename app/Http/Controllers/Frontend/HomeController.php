<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Reference;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->with(['activeProducts'])
            ->get();

        $references = Reference::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $certificates = Certificate::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.home', compact('categories', 'references', 'certificates'));
    }

    public function references()
    {
        $referenceGroups = Reference::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('group');

        return view('frontend.references', compact('referenceGroups'));
    }

    public function certificates()
    {
        $certificates = Certificate::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.certificates', compact('certificates'));
    }
}
