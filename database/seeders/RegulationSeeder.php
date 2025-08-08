<?php

namespace Database\Seeders;

use App\Models\Regulation;
use Illuminate\Database\Seeder;

class RegulationSeeder extends Seeder
{
    public function run()
    {
        $regulations = [
            [
                'regulation_category_id' => 1, // UU
                'title' => 'Tentang Jaminan Produk Halal',
                'number' => '33',
                'year' => '2014',
                'description' => 'Undang-Undang tentang Jaminan Produk Halal',
                'enacted_date' => '2014-10-17',
                'external_link' => 'https://www.bpjph.go.id',
                'is_active' => true
            ],
            [
                'regulation_category_id' => 2, // PP
                'title' => 'Tentang Penyelenggaraan Bidang Jaminan Produk Halal',
                'number' => '39',
                'year' => '2021',
                'description' => 'Peraturan Pemerintah tentang Penyelenggaraan Bidang Jaminan Produk Halal',
                'enacted_date' => '2021-02-02',
                'external_link' => 'https://www.bpjph.go.id',
                'is_active' => true
            ],
            [
                'regulation_category_id' => 3, // Permen
                'title' => 'Tentang Penyelenggaraan Jaminan Produk Halal',
                'number' => '26',
                'year' => '2019',
                'description' => 'Peraturan Menteri tentang Penyelenggaraan Jaminan Produk Halal',
                'enacted_date' => '2019-10-15',
                'external_link' => 'https://www.bpjph.go.id',
                'is_active' => true
            ]
        ];

        foreach ($regulations as $regulation) {
            Regulation::create($regulation);
        }
    }
}
