<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Show site settings management form.
     */
    public function index(): View
    {
        $settings = Setting::all()->keyBy('key');

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update site settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $activeTab = $request->input('active_tab', '');
        $data = $request->except(['_token', '_method', 'active_tab']);

        // Mapping keys to their groups
        $groupMap = [
            'contact_' => 'contact',
            'company_' => 'contact',
            'hero_' => 'hero',
            'stat_' => 'stats',
            'facility_' => 'facility',
            'disp_' => 'capabilities',
            'catalog_' => 'catalog',
            'banner_' => 'banner',
            'nav_' => 'navbar',
            'navbar_' => 'navbar',
            'footer_' => 'footer',
            'test_form_' => 'test_form',
            'product_' => 'product',
            'partner_' => 'partner',
        ];

        foreach ($data as $key => $value) {
            $group = 'general';
            foreach ($groupMap as $prefix => $grp) {
                if (str_starts_with($key, $prefix)) {
                    $group = $grp;
                    break;
                }
            }

            Setting::set($key, is_string($value) ? trim($value) : ($value ?? ''), $group);
        }

        Setting::clearCache();

        $redirectUrl = route('admin.settings.index');
        if (! empty($activeTab)) {
            $redirectUrl .= '#'.$activeTab;
        }

        return redirect($redirectUrl)
            ->with('success', 'Site ayarları ve tüm dinamik içerikler başarıyla güncellendi.');
    }
}
