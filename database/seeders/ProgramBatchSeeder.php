<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramLayanan;
use App\Models\ProgramBatch;
use Carbon\Carbon;

class ProgramBatchSeeder extends Seeder
{
    public function run()
    {
        // $programs = ProgramLayanan::all();

        // foreach ($programs as $program) {
        //     // Create an active batch
        //     ProgramBatch::create([
        //         'program_layanan_id' => $program->id,
        //         'nama_batch' => 'Batch Regular',
        //         'batch_ke' => 1,
        //         'tanggal_mulai_pendaftaran' => Carbon::now(),
        //         'tanggal_selesai_pendaftaran' => Carbon::now()->addDays(30),
        //         'tanggal_mulai_program' => Carbon::now()->addDays(35),
        //         'tanggal_selesai_program' => Carbon::now()->addDays(65),
        //         'kuota' => 30,
        //         'harga' => rand(1000000, 5000000),
        //         'status' => 'aktif',
        //         'external_link' => 'https://www.bpjph.go.id',
        //         'catatan_batch' => 'Batch perdana untuk program ini'
        //     ]);

        //     // Create an upcoming batch
        //     ProgramBatch::create([
        //         'program_layanan_id' => $program->id,
        //         'nama_batch' => 'Batch Weekend',
        //         'batch_ke' => 2,
        //         'tanggal_mulai_pendaftaran' => Carbon::now()->addDays(40),
        //         'tanggal_selesai_pendaftaran' => Carbon::now()->addDays(70),
        //         'tanggal_mulai_program' => Carbon::now()->addDays(75),
        //         'tanggal_selesai_program' => Carbon::now()->addDays(105),
        //         'kuota' => 25,
        //         'harga' => rand(1000000, 5000000),
        //         'status' => 'aktif',
        //         'external_link' => 'https://www.bpjph.go.id',
        //         'catatan_batch' => 'Batch khusus weekend'
        //     ]);

        //     // Create a completed batch
        //     ProgramBatch::create([
        //         'program_layanan_id' => $program->id,
        //         'nama_batch' => 'Batch Intensif',
        //         'batch_ke' => 3,
        //         'tanggal_mulai_pendaftaran' => Carbon::now()->subDays(90),
        //         'tanggal_selesai_pendaftaran' => Carbon::now()->subDays(60),
        //         'tanggal_mulai_program' => Carbon::now()->subDays(55),
        //         'tanggal_selesai_program' => Carbon::now()->subDays(25),
        //         'kuota' => 20,
        //         'harga' => rand(1000000, 5000000),
        //         'status' => 'selesai',
        //         'external_link' => 'https://www.bpjph.go.id',
        //         'catatan_batch' => 'Batch intensif telah selesai'
        //     ]);
        // }
    }
}
