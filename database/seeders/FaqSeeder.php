<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $faqs = [
            [
                'faq_category_id' => 1, // Sertifikasi Halal
                'question' => 'Apa itu sertifikasi halal?',
                'answer' => 'Sertifikasi halal adalah proses pemeriksaan, pengujian, dan evaluasi yang dilakukan untuk memastikan bahwa produk telah memenuhi standar halal sesuai dengan syariat Islam. Sertifikasi ini mencakup aspek bahan baku, proses produksi, fasilitas, dan sistem jaminan halal.',
                'is_active' => true,
                'order' => 1
            ],
            [
                'faq_category_id' => 1,
                'question' => 'Berapa lama proses sertifikasi halal?',
                'answer' => 'Proses sertifikasi halal umumnya memakan waktu 2-3 bulan, tergantung pada kompleksitas produk dan kesiapan perusahaan. Proses ini meliputi pengajuan dokumen, audit, dan evaluasi oleh tim auditor.',
                'is_active' => true,
                'order' => 2
            ],
            [
                'faq_category_id' => 2, // Program
                'question' => 'Apa saja program yang tersedia di Pusat Halal Salman ITB?',
                'answer' => "Pusat Halal Salman ITB menyediakan berbagai program, termasuk:\n- Kuliah Halal\n- JULEHA (Juru Sembelih Halal)\n- P3H (Pelatihan Penyelia Halal)\n- Pelatihan Kerja",
                'is_active' => true,
                'order' => 1
            ],
            [
                'faq_category_id' => 3, // Layanan
                'question' => 'Bagaimana cara mendaftar layanan sertifikasi halal?',
                'answer' => "Untuk mendaftar layanan sertifikasi halal, Anda dapat:\n1. Mengisi formulir pendaftaran online\n2. Melengkapi dokumen yang diperlukan\n3. Melakukan pembayaran biaya sertifikasi\n4. Menunggu konfirmasi dan jadwal audit",
                'is_active' => true,
                'order' => 1
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
