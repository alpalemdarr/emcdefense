<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;

class ReferenceSeeder extends Seeder
{
    public function run(): void
    {
        $references = [
            // ── 1. Shielded Rooms & Test Cabins (Ekranlı Odalar & Test Kabinleri) ──
            [
                'name' => 'AR-MERKOM',
                'logo_path' => 'references/armerkom.jpg',
                'group' => 'shielded_rooms',
                'url' => 'https://www.armerkom.com.tr',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Gebze Institute of Technology (GYTE / GTÜ)',
                'logo_path' => 'references/gyte.gif',
                'group' => 'shielded_rooms',
                'url' => 'https://www.gtu.edu.tr',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Sakarya University (SAÜ)',
                'logo_path' => 'references/sau.jpg',
                'group' => 'shielded_rooms',
                'url' => 'https://www.sakarya.edu.tr',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'TÜBİTAK UME (National Metrology Institute)',
                'logo_path' => 'references/tubitak_ume.jpg',
                'group' => 'shielded_rooms',
                'url' => 'https://www.ume.tubitak.gov.tr',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'TÜBİTAK BİLGEM',
                'logo_path' => 'references/tubitak_bilgem.jpg',
                'group' => 'shielded_rooms',
                'url' => 'https://bilgem.tubitak.gov.tr',
                'sort_order' => 5,
                'is_active' => true,
            ],

            // ── 2. TEMPEST Filters & Custom Filters (TEMPEST ve Özel Filtreler) ──
            [
                'name' => 'TSK (Turkish Armed Forces Facilities)',
                'logo_path' => 'references/tsk.png',
                'group' => 'tempest_filters',
                'url' => 'https://www.tsk.tr',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'SSB - Defence Industry Agency (SSM)',
                'logo_path' => 'references/ssb.jpg',
                'group' => 'tempest_filters',
                'url' => 'https://www.ssb.gov.tr',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Milens Defense & Communication Solutions',
                'logo_path' => 'references/milens.jpg',
                'group' => 'tempest_filters',
                'url' => 'https://www.milens.com',
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'MilSOFT Software Technologies',
                'logo_path' => 'references/milsoft.gif',
                'group' => 'tempest_filters',
                'url' => 'https://www.milsoft.com.tr',
                'sort_order' => 9,
                'is_active' => true,
            ],
            [
                'name' => 'TAI - Turkish Aerospace Industries (TUSAŞ)',
                'logo_path' => 'references/tai.jpg',
                'group' => 'tempest_filters',
                'url' => 'https://www.tusas.com',
                'sort_order' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'CTech Information Technologies',
                'logo_path' => 'references/ctech.png',
                'group' => 'tempest_filters',
                'url' => 'https://www.ctech.com.tr',
                'sort_order' => 11,
                'is_active' => true,
            ],
            [
                'name' => 'Orantech Microwave & RF',
                'logo_path' => 'references/orantech.png',
                'group' => 'tempest_filters',
                'url' => 'https://orantech.com.tr',
                'sort_order' => 12,
                'is_active' => true,
            ],
            [
                'name' => 'Roketsan Missile Industries',
                'logo_path' => 'references/roketsan.jpg',
                'group' => 'tempest_filters',
                'url' => 'https://www.roketsan.com.tr',
                'sort_order' => 13,
                'is_active' => true,
            ],
            [
                'name' => 'Aselsan Electronics Industry',
                'logo_path' => 'references/aselsan.gif',
                'group' => 'tempest_filters',
                'url' => 'https://www.aselsan.com.tr',
                'sort_order' => 14,
                'is_active' => true,
            ],

            // ── 3. Instruments, Antennas & Accessories (Cihazlar, Antenler ve Aksesuarlar) ──
            [
                'name' => 'TSE - Turkish Standards Institution',
                'logo_path' => 'references/tse.jpg',
                'group' => 'instruments',
                'url' => 'https://www.tse.org.tr',
                'sort_order' => 15,
                'is_active' => true,
            ],
            [
                'name' => 'FNSS Defense Systems',
                'logo_path' => 'references/fnss.jpg',
                'group' => 'instruments',
                'url' => 'https://www.fnss.com.tr',
                'sort_order' => 16,
                'is_active' => true,
            ],
            [
                'name' => 'Nero Industry Defense & Aerospace',
                'logo_path' => 'references/nero.png',
                'group' => 'instruments',
                'url' => 'https://www.neroindustry.com',
                'sort_order' => 17,
                'is_active' => true,
            ],
        ];

        // Truncate and re-seed to ensure clean IDs and exact logos
        Reference::truncate();

        foreach ($references as $ref) {
            Reference::create($ref);
        }
    }
}
