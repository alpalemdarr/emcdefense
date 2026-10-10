<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $certificates = [
            [
                'title' => 'ISO 9001:2015 Quality Management System (Kalite Yönetim Sistemi)',
                'image_path' => 'certificates/emc_iso_cert_1.jpg',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'ISO 9001:2015 Accreditation Scope & Certification (Akreditasyon Kapsamı)',
                'image_path' => 'certificates/emc_iso_cert_2.jpg',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'ISO 9001:2015 International Registration (Uluslararası Tescil Belgesi)',
                'image_path' => 'certificates/emc_iso_9001_cert_1.jpg',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'ISO Management System Quality Compliance (Kalite Uygunluk Sertifikası)',
                'image_path' => 'certificates/emc_iso_9001_cert_2.jpg',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'ISO / IEC 17025 Test & Calibration Competence (Test ve Kalibrasyon Yeterliliği)',
                'image_path' => 'certificates/emc_iso_cert_3.jpg',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        Certificate::truncate();

        foreach ($certificates as $cert) {
            Certificate::create($cert);
        }
    }
}
