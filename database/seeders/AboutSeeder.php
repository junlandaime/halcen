<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AboutSection;
use App\Models\AboutTeam;
use App\Models\AboutProgram;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AboutSeeder extends Seeder
{
    public function run()
    {
        $abouts = [
            [
                'title' => 'Halal Center',
                'slug' => 'halal-center',
                'description' => 'Pusat Halal Salman ITB adalah lembaga yang bergerak dalam pengembangan dan edukasi halal.',
                'hero_title' => 'Pusat Halal Salman ITB',
                'hero_subtitle' => 'Mewujudkan Ekosistem Halal yang Berkelanjutan',
                'hero_image' => 'about/hero/halcen.jpg',
                'vision' => 'Menjadi pusat pengembangan dan edukasi halal terkemuka di Indonesia',
                'mission' => [
                    'Mengembangkan sistem sertifikasi halal yang terpercaya',
                    'Memberikan edukasi halal kepada masyarakat',
                    'Mendorong inovasi produk halal',
                    'Membangun kerjasama dengan berbagai pihak'
                ],
                'is_active' => true,
                'order' => 1
            ],
            [
                'title' => 'LP3H',
                'slug' => 'lp3h',
                'description' => 'Lembaga Pengkajian Pangan, Obat-obatan, dan Kosmetika Halal.',
                'hero_title' => 'LP3H Salman ITB',
                'hero_subtitle' => 'Pengkajian Pangan, Obat-obatan, dan Kosmetika Halal',
                'hero_image' => 'about/hero/lp3h.jpg',
                'vision' => 'Menjadi lembaga pengkajian halal yang terpercaya',
                'mission' => [
                    'Melakukan pengkajian produk halal',
                    'Memberikan rekomendasi sertifikasi halal',
                    'Mengembangkan standar pengujian halal'
                ],
                'is_active' => true,
                'order' => 2
            ],
            [
                'title' => 'LPH Salman',
                'slug' => 'lph-salman',
                'description' => 'Lembaga Pemeriksa Halal Profesional dan Terpercaya.',
                'hero_title' => 'LPH Salman ITB',
                'hero_subtitle' => 'Profesional dan Terpercaya dalam Pemeriksaan Halal',
                'hero_image' => 'about/hero/lph.jpg',
                'vision' => 'Menjadi lembaga pemeriksa halal terdepan di Indonesia',
                'mission' => [
                    'Melakukan pemeriksaan produk secara profesional',
                    'Menyediakan layanan sertifikasi halal yang efisien',
                    'Berkomitmen pada standar pemeriksaan halal yang tinggi'
                ],
                'is_active' => true,
                'order' => 3
            ],
            [
                'title' => 'Salman ITB',
                'slug' => 'salman-itb',
                'description' => 'Yayasan Pembina Masjid Salman Salman ITB adalah pusat kegiatan keagamaan dan sosial.',
                'hero_title' => 'Salman ITB',
                'hero_subtitle' => 'Pusat Keagamaan dan Sosial di ITB',
                'hero_image' => 'about/hero/salman.jpg',
                'vision' => 'Menjadi pusat kegiatan keagamaan dan sosial yang inklusif dan inovatif',
                'mission' => [
                    'Menyelenggarakan kegiatan keagamaan yang berkesinambungan',
                    'Memberikan layanan sosial kepada masyarakat',
                    'Mengembangkan program pemberdayaan umat'
                ],
                'is_active' => true,
                'order' => 4
            ]
        ];
        
        foreach ($abouts as $aboutData) {
            $about = About::create($aboutData);
        
            // Create sections
            AboutSection::create([
                'about_id' => $about->id,
                'title' => 'Sejarah',
                'content' => 'Sejarah perkembangan ' . $about->title,
                'order' => 1,
                'is_active' => true
            ]);
        
            // Create teams
            AboutTeam::create([
                'about_id' => $about->id,
                'name' => 'Dr. Example',
                'position' => 'Direktur',
                'image' => 'about/team/director.jpg',
                'order' => 1,
                'is_active' => true
            ]);
        
            // Create programs
            AboutProgram::create([
                'about_id' => $about->id,
                'title' => 'Program Unggulan 1',
                'description' => 'Deskripsi program unggulan 1',
                'icon' => 'about/icons/program1.svg',
                'order' => 1,
                'is_active' => true
            ]);
        }
        
    }
}
