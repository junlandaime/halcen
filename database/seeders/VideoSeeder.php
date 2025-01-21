<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        $videos = [
            [
                'video_category_id' => 1, // Kuliah Halal
                'title' => 'Pengantar Sistem Jaminan Halal',
                'description' => 'Pembelajaran dasar tentang sistem jaminan halal dan implementasinya',
                'youtube_id' => 'VIDEO_ID',
                'duration' => 45,
                'is_active' => true,
                'order' => 1
            ],
            [
                'video_category_id' => 1,
                'title' => 'Titik Kritis Kehalalan Produk',
                'description' => 'Identifikasi dan analisis titik kritis dalam produksi',
                'youtube_id' => 'VIDEO_ID',
                'duration' => 35,
                'is_active' => true,
                'order' => 2
            ],
            [
                'video_category_id' => 1,
                'title' => 'Regulasi Halal Terkini',
                'description' => 'Update regulasi dan kebijakan halal nasional',
                'youtube_id' => 'VIDEO_ID',
                'duration' => 40,
                'is_active' => true,
                'order' => 3
            ],
            [
                'video_category_id' => 2, // JULEHA Kurban
                'title' => 'Teknik Penyembelihan Kurban',
                'description' => 'Panduan lengkap penyembelihan hewan kurban sesuai syariat',
                'youtube_id' => 'VIDEO_ID',
                'duration' => 50,
                'is_active' => true,
                'order' => 1
            ],
            [
                'video_category_id' => 3, // JULEHA Unggas
                'title' => 'Standar RPU Modern',
                'description' => 'Pengenalan standar Rumah Potong Unggas modern',
                'youtube_id' => 'VIDEO_ID',
                'duration' => 45,
                'is_active' => true,
                'order' => 1
            ]
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
