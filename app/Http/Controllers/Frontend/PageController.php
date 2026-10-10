<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a custom or dynamic page by slug.
     */
    public function show(string $slug): View
    {
        $page = Page::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // If it's a system page with dedicated controller, redirect to named route
        if ($page->is_system) {
            if ($slug === 'certificates') {
                return app(HomeController::class)->certificates();
            }
            if ($slug === 'references') {
                return app(HomeController::class)->references();
            }
            if ($slug === 'contact') {
                return app(ContactController::class)->show();
            }
        }

        return view('frontend.page', compact('page'));
    }
}
