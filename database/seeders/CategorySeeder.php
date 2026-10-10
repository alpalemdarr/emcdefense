<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'MARX GENERATOR',
                'slug' => 'marx-generator',
                'icon' => 'bi-lightning-charge-fill',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Filters',
                'slug' => 'filters',
                'icon' => 'bi-funnel-fill',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Chambers',
                'slug' => 'chambers',
                'icon' => 'bi-box-fill',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'RF Absorbers',
                'slug' => 'rf-absorbers',
                'icon' => 'bi-shield-shaded',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Antennas',
                'slug' => 'antennas',
                'icon' => 'bi-broadcast-pin',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'LISN',
                'slug' => 'lisn',
                'icon' => 'bi-activity',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'CDN',
                'slug' => 'cdn',
                'icon' => 'bi-diagram-3-fill',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Test Equipment',
                'slug' => 'test-equipment',
                'icon' => 'bi-tools',
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'Used Equipment',
                'slug' => 'used-equipment',
                'icon' => 'bi-recycle',
                'sort_order' => 9,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
