<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Message;
use App\Models\Page;
use App\Models\Product;
use App\Models\Reference;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'categories' => Category::count(),
            'products' => Product::count(),
            'references' => Reference::count(),
            'certificates' => Certificate::count(),
            'pages' => Page::count(),
            'messages' => Message::count(),
            'unread' => Message::where('is_read', false)->count(),
            'test_requests' => Message::whereNotNull('device_name')->where('device_name', '!=', '')->count(),
            'contact_messages' => Message::where(function ($q) {
                $q->whereNull('device_name')->orWhere('device_name', '');
            })->count(),
        ];

        $recentMessages = Message::latest()->take(6)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
