<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    public function run(): void
    {
        LandingPage::create([
            'hero_title' => 'Pusat Halal Salman ITB',
            'hero_subtitle' => 'Menjadi pusat pengembangan dan edukasi sistem halal terpercaya di Indonesia',
            'hero_image' => null,
            
            'about_title' => 'Tentang Kami',
            'about_content' => 'Pusat Halal Salman ITB adalah lembaga yang berfokus pada pengembangan dan edukasi sistem halal di Indonesia. Kami berkomitmen untuk memberikan layanan terbaik dalam sertifikasi halal dan edukasi halal kepada masyarakat.',
            
            'mission_title' => 'Misi Kami',
            'mission_content' => 'Memberikan layanan sertifikasi halal yang terpercaya dan profesional, serta mengedukasi masyarakat tentang pentingnya produk halal dalam kehidupan sehari-hari.',
            
            'vision_title' => 'Visi Kami',
            'vision_content' => 'Menjadi lembaga sertifikasi halal terkemuka yang dipercaya oleh masyarakat dan industri di Indonesia.',
            
            'stats_clients' => 100,
            'stats_projects' => 250,
            'stats_partners' => 50,
            
            'contact_address' => 'Jl. Ganesa No.7, Lb. Siliwangi, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132',
            'contact_email' => 'info@halalsalman.org',
            'contact_phone' => '+62 22 2500935',
            'contact_whatsapp' => '+62 812 3456 7890',
            
            'social_facebook' => 'https://facebook.com/halalsalman',
            'social_twitter' => 'https://twitter.com/halalsalman',
            'social_instagram' => 'https://instagram.com/halalsalman',
            'social_linkedin' => 'https://linkedin.com/company/halalsalman',
            
            'footer_description' => 'Pusat Halal Salman ITB berkomitmen untuk memberikan layanan terbaik dalam sertifikasi halal dan edukasi halal kepada masyarakat.',
            
            'meta_title' => 'Pusat Halal Salman ITB - Lembaga Sertifikasi Halal Terpercaya',
            'meta_description' => 'Pusat Halal Salman ITB adalah lembaga sertifikasi halal terpercaya yang berfokus pada pengembangan dan edukasi sistem halal di Indonesia.',
            'meta_keywords' => 'halal, sertifikasi halal, edukasi halal, Salman ITB, lembaga halal'
        ]);
    }
}
