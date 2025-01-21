<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name' => 'Rumah Amal Salman',
                'logo' => 'partners/1. RAS vertical.png',
                'website' => 'https://www.rumahamal.org',
                'description' => 'Rumah Amal Salman adalah lembaga sosial yang bergerak di bidang amal dan zakat.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Forum Zakat',
                'logo' => 'partners/2. FOZ.png',
                'website' => 'https://www.forumzakat.org',
                'description' => 'Forum Zakat adalah jaringan organisasi pengelola zakat di Indonesia.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Kementerian Agama (Kemenag) Indonesia',
                'logo' => 'partners/1. Kementerian Agama (Kemenag) Indonesia (PNG-1080p) - Logopedia.png',
                'website' => 'https://www.kemenag.go.id',
                'description' => 'Kementerian Agama Indonesia adalah lembaga pemerintah yang mengurusi bidang keagamaan.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Badan Penyelenggara Jaminan Produk Halal',
                'logo' => 'partners/2. Badan Penyelenggara Jaminan Produk HalalKoleksilogo.com.png',
                'website' => 'https://www.halal.go.id',
                'description' => 'Badan Penyelenggara Jaminan Produk Halal bertugas memastikan kehalalan produk.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Bank Indonesia',
                'logo' => 'partners/3. bank-indonesia-seeklogo.png',
                'website' => 'https://www.bi.go.id',
                'description' => 'Bank Indonesia adalah bank sentral Republik Indonesia.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Kementerian Perindustrian Indonesia',
                'logo' => 'partners/4. Kementerian Perindustrian Indonesia (PNG-1080p) - Logopedia.png',
                'website' => 'https://www.kemenperin.go.id',
                'description' => 'Kementerian Perindustrian mengelola kebijakan industri di Indonesia.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Bio Farma',
                'logo' => 'partners/5. Bio Farma - Koleksilogo.com.png',
                'website' => 'https://www.biofarma.co.id',
                'description' => 'Bio Farma adalah perusahaan farmasi milik negara Indonesia.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Badan Pemeriksa Keuangan (BPK)',
                'logo' => 'partners/6. Badan Pemeriksa Keuangan (BPK) - Koleksilogo.com.png',
                'website' => 'https://www.bpk.go.id',
                'description' => 'BPK adalah lembaga negara yang bertugas memeriksa pengelolaan keuangan negara.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'DKPP Kota Bandung',
                'logo' => 'partners/7. DKPP Kota Bandung.png',
                'website' => 'https://www.dkpp.bandung.go.id',
                'description' => 'DKPP Kota Bandung mengelola tata kelola perumahan dan permukiman di Bandung.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'ITB (Institut Teknologi Bandung)',
                'logo' => 'partners/1. ITB (Institut Teknologi Bandung) (CDRX5) - (Koleksilogo.com).png',
                'website' => 'https://www.itb.ac.id',
                'description' => 'Institut Teknologi Bandung adalah perguruan tinggi teknik terkemuka di Indonesia.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Unpad',
                'logo' => 'partners/2. Unpad-(Koleksilogo.com).png',
                'website' => 'https://www.unpad.ac.id',
                'description' => 'Universitas Padjadjaran adalah perguruan tinggi negeri di Bandung.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'UPI (Universitas Pendidikan Indonesia)',
                'logo' => 'partners/3. UPI (Universitas Pendidikan Indonesia) Logo - (Koleksilogo.com).png',
                'website' => 'https://www.upi.edu',
                'description' => 'Universitas Pendidikan Indonesia adalah perguruan tinggi pendidikan di Bandung.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Universitas Djuanda UNIDA Bogor',
                'logo' => 'partners/4. Universitas Djuanda UNIDA Bogor - Koleksilogo.com.png',
                'website' => 'https://www.unida.ac.id',
                'description' => 'Universitas Djuanda adalah perguruan tinggi swasta di Bogor.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Universitas Islam Bandung',
                'logo' => 'partners/5. Universitas Islam Bandung - Koleksilogo.com.png',
                'website' => 'https://www.unisba.ac.id',
                'description' => 'Universitas Islam Bandung adalah perguruan tinggi swasta berbasis Islam di Bandung.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'UMBandung',
                'logo' => 'partners/6. UMBandung-Logo-Navy-01-Agung-Tw-Theboss-1024x1014.png',
                'website' => 'https://www.umbandung.ac.id',
                'description' => 'Universitas Muhammadiyah Bandung adalah perguruan tinggi swasta di Bandung.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'UIN Sunan Kalijaga',
                'logo' => 'partners/7. UIN Sunan Kalijaga Logo [KOLEKSILOGO.COM].png',
                'website' => 'https://www.uin-suka.ac.id',
                'description' => 'Universitas Islam Negeri Sunan Kalijaga adalah perguruan tinggi negeri Islam di Yogyakarta.',
                'order' => rand(1, 100)
            ],
            [
                'name' => 'Politeknik Pariwisata Lombok',
                'logo' => 'partners/8. Politeknik Pariwisata Lombok.png',
                'website' => 'https://www.ppl.ac.id',
                'description' => 'Politeknik Pariwisata Lombok adalah institusi pendidikan pariwisata di Lombok.',
                'order' => rand(1, 100)
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
