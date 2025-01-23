<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Sertifikasi Halal',
                'slug' => 'layanan-sertifikasi-halal',
                'description' => 'Pertanyaan seputar sertifikasi halal',
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'Program',
                'slug' => 'program',
                'description' => 'Pertanyaan seputar program-program yang tersedia',
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'Layanan',
                'slug' => 'layanan',
                'description' => 'Pertanyaan seputar layanan yang tersedia',
                'is_active' => true,
                'order' => 3
            ],
            [
                'name' => 'Umum',
                'slug' => 'umum',
                'description' => 'Pertanyaan umum lainnya',
                'is_active' => true,
                'order' => 4
            ]
        ];

        foreach ($categories as $category) {
            FaqCategory::create($category);
        }
    }
}
