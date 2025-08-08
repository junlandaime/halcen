<?php

namespace Database\Seeders;

use App\Models\VideoCategory;
use Illuminate\Database\Seeder;

class VideoCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Kuliah Halal',
                'slug' => 'kuliah-halal',
                'description' => 'Materi pembelajaran tentang sistem jaminan halal',
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'JULEHA Kurban',
                'slug' => 'juleha-kurban',
                'description' => 'Materi khusus tentang penyembelihan hewan kurban',
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'JULEHA Unggas',
                'slug' => 'juleha-unggas',
                'description' => 'Materi khusus tentang penyembelihan unggas',
                'is_active' => true,
                'order' => 3
            ]
        ];

        foreach ($categories as $category) {
            VideoCategory::create($category);
        }
    }
}
