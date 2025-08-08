<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Ahmad Syafiq',
                'position' => 'CEO',
                'company' => 'PT Makanan Sehat Indonesia',
                'content' => 'Proses sertifikasi halal bersama Pusat Halal Salman ITB sangat profesional dan transparan. Tim mereka sangat membantu dalam setiap tahapan proses sertifikasi.',
                'image' => 'testimoni/1. Ahmad Syafiq.jpg',
                'rating' => 5,
                'is_featured' => true,
                'order' => 1
            ],
            [
                'name' => 'Siti Aminah',
                'position' => 'Quality Assurance Manager',
                'company' => 'CV Berkah Jaya',
                'content' => 'Kami sangat terbantu dengan adanya pelatihan dan pendampingan dari Pusat Halal Salman ITB dalam mempersiapkan sertifikasi halal untuk produk kami.',
                'image' => 'testimoni/2. Siti Aminah.jpg',
                'rating' => 5,
                'is_featured' => true,
                'order' => 2
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Owner',
                'company' => 'Restoran Nusantara',
                'content' => 'Terima kasih Pusat Halal Salman ITB atas bantuan dan bimbingannya. Proses sertifikasi halal menjadi lebih mudah dengan panduan yang jelas.',
                'image' => 'testimoni/3. Budi Santoso.jpg',
                'rating' => 5,
                'is_featured' => true,
                'order' => 3
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
