<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            [
                'name' => 'JULEHA Kurban',
                'description' => 'Pelatihan khusus untuk penyembelihan hewan kurban sesuai syariat Islam dan standar keamanan pangan.',
                'duration' => '2 hari',
                'capacity' => 30,
                'price' => 500000,
                'category' => 'juleha',
                'status' => 'active'
            ],
            [
                'name' => 'JULEHA Unggas',
                'description' => 'Pelatihan penyembelihan unggas sesuai syariat Islam dan standar keamanan pangan.',
                'duration' => '2 hari',
                'capacity' => 30,
                'price' => 500000,
                'category' => 'juleha',
                'status' => 'active'
            ],
            [
                'name' => 'Kuliah Halal',
                'description' => 'Program pendidikan komprehensif yang dirancang untuk memberikan pemahaman mendalam tentang sistem jaminan halal.',
                'duration' => '3 bulan',
                'capacity' => 30,
                'price' => 2500000,
                'category' => 'kuliah',
                'status' => 'active'
            ],
            [
                'name' => 'Pelatihan Kerja',
                'description' => 'Program pelatihan kerja yang dirancang untuk mempersiapkan peserta dalam dunia kerja profesional.',
                'duration' => '1 bulan',
                'capacity' => 25,
                'price' => 1500000,
                'category' => 'pelatihan',
                'status' => 'active'
            ]
        ];

        foreach ($programs as $program) {
            Program::create(array_merge($program, [
                'slug' => Str::slug($program['name'])
            ]));
        }
    }
}
