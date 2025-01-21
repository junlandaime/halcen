<?php

namespace Database\Seeders;

use App\Models\RegulationCategory;
use Illuminate\Database\Seeder;

class RegulationCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Undang-Undang',
                'code' => 'UU',
                'description' => 'Undang-Undang tentang Jaminan Produk Halal'
            ],
            [
                'name' => 'Peraturan Pemerintah',
                'code' => 'PP',
                'description' => 'Peraturan Pemerintah terkait Jaminan Produk Halal'
            ],
            [
                'name' => 'Peraturan Menteri',
                'code' => 'Permen',
                'description' => 'Peraturan Menteri terkait Jaminan Produk Halal'
            ],
            [
                'name' => 'Keputusan Presiden',
                'code' => 'Keppres',
                'description' => 'Keputusan Presiden tentang kebijakan pendukung Jaminan Produk Halal'
            ],
            [
                'name' => 'Instruksi Presiden',
                'code' => 'Inpres',
                'description' => 'Instruksi Presiden untuk pelaksanaan kebijakan halal'
            ],
            [
                'name' => 'Peraturan Kepala Badan/Komisi',
                'code' => 'Perka',
                'description' => 'Peraturan Kepala BPJPH tentang tata cara pengajuan sertifikasi halal'
            ],
            [
                'name' => 'Keputusan Kepala Badan/Komisi',
                'code' => 'Kepka',
                'description' => 'Keputusan Kepala BPJPH terkait biaya dan teknis layanan sertifikasi halal'
            ],
            [
                'name' => 'Peraturan Daerah',
                'code' => 'Perda',
                'description' => 'Peraturan Daerah terkait Jaminan Produk Halal'
            ],
            [
                'name' => 'Fatwa Majelis Ulama Indonesia',
                'code' => 'Fatwa MUI',
                'description' => 'Fatwa MUI mengenai standar kehalalan produk'
            ],
            [
                'name' => 'Standar Nasional Indonesia',
                'code' => 'SNI',
                'description' => 'Standar Nasional Indonesia untuk produk halal'
            ],
            [
                'name' => 'Peraturan Gubernur',
                'code' => 'Pergub',
                'description' => 'Peraturan Gubernur tentang implementasi kebijakan halal di tingkat provinsi'
            ],
            [
                'name' => 'Peraturan Bupati/Wali Kota',
                'code' => 'Perbup/Perwali',
                'description' => 'Peraturan Bupati atau Wali Kota terkait Jaminan Produk Halal di tingkat kabupaten/kota'
            ],
            [
                'name' => 'Surat Edaran',
                'code' => 'SE',
                'description' => 'Surat Edaran yang memberikan pedoman pelaksanaan kebijakan halal'
            ],
            [
                'name' => 'Perjanjian Kerja Sama',
                'code' => 'PKS',
                'description' => 'Perjanjian kerja sama antara BPJPH atau pemerintah dengan pihak terkait implementasi halal'
            ],
            [
                'name' => 'Sertifikasi Halal',
                'code' => 'SH',
                'description' => 'Dokumen resmi pengakuan kehalalan produk'
            ],
            [
                'name' => 'Prosedur Operasional Standar',
                'code' => 'POS',
                'description' => 'Panduan teknis operasional terkait proses sertifikasi halal'
            ],
            [
                'name' => 'Instruksi Lembaga Pemerintah Non-Kementerian',
                'code' => 'Instruksi LPNK',
                'description' => 'Instruksi dari BPOM atau lembaga lain terkait label halal'
            ]
        ];


        foreach ($categories as $category) {
            RegulationCategory::create($category);
        }
    }
}
