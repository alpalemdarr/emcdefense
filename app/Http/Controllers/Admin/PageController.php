<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a listing of all pages.
     */
    public function index(): View
    {
        $pages = Page::orderBy('is_system', 'desc')
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page from scratch.
     */
    public function create(): View
    {
        return view('admin.pages.form', [
            'page' => new Page([
                'is_active' => true,
                'show_in_navbar' => false,
                'show_in_footer' => false,
                'sort_order' => 0,
            ]),
        ]);
    }

    /**
     * Store a newly created page in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title_tr' => ['required', 'string', 'max:255'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pages,slug'],
            'badge_tr' => ['nullable', 'string', 'max:255'],
            'badge_en' => ['nullable', 'string', 'max:255'],
            'lead_tr' => ['nullable', 'string'],
            'lead_en' => ['nullable', 'string'],
            'content_tr' => ['nullable', 'string'],
            'content_en' => ['nullable', 'string'],
            'meta_title_tr' => ['nullable', 'string', 'max:255'],
            'meta_title_en' => ['nullable', 'string', 'max:255'],
            'meta_description_tr' => ['nullable', 'string'],
            'meta_description_en' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if (empty($validated['title_en'])) {
            $validated['title_en'] = $validated['title_tr'];
        }

        $validated['slug'] = ! empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title_tr']);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['show_in_navbar'] = $request->boolean('show_in_navbar');
        $validated['show_in_footer'] = $request->boolean('show_in_footer');
        $validated['is_system'] = false;
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        $page = Page::create($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', "Yeni '{$page->title_tr}' sayfası başarıyla oluşturuldu.");
    }

    /**
     * Show the form for editing the specified page.
     */
    public function edit(Page $page): View
    {
        return view('admin.pages.form', compact('page'));
    }

    /**
     * Update the specified page in storage.
     */
    public function update(Request $request, Page $page): RedirectResponse
    {
        $validated = $request->validate([
            'title_tr' => ['required', 'string', 'max:255'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pages,slug,'.$page->id],
            'badge_tr' => ['nullable', 'string', 'max:255'],
            'badge_en' => ['nullable', 'string', 'max:255'],
            'lead_tr' => ['nullable', 'string'],
            'lead_en' => ['nullable', 'string'],
            'content_tr' => ['nullable', 'string'],
            'content_en' => ['nullable', 'string'],
            'meta_title_tr' => ['nullable', 'string', 'max:255'],
            'meta_title_en' => ['nullable', 'string', 'max:255'],
            'meta_description_tr' => ['nullable', 'string'],
            'meta_description_en' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if (empty($validated['title_en'])) {
            $validated['title_en'] = $validated['title_tr'];
        }

        if (! empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['slug']);
        } else {
            $validated['slug'] = $page->slug ?: Str::slug($validated['title_tr']);
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['show_in_navbar'] = $request->boolean('show_in_navbar');
        $validated['show_in_footer'] = $request->boolean('show_in_footer');
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        $page->update($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', "'{$page->title_tr}' sayfası başarıyla güncellendi.");
    }

    /**
     * Remove the specified page from storage.
     */
    public function destroy(Page $page): RedirectResponse
    {
        $title = $page->title_tr ?: $page->title_en ?: $page->slug;
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', "'{$title}' sayfası başarıyla silindi.");
    }
}
