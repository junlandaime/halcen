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
        $programs = ProgramLayanan::all();
        $start = Carbon::now()->subYears(2)->subDays(rand(0, 30)); // acak hingga 1 tahun + 30 hari lalu

        $tanggal_mulai_pendaftaran    = $start;
        $tanggal_selesai_pendaftaran = $start->copy()->addDays(30);
        $tanggal_mulai_program        = $tanggal_selesai_pendaftaran->copy()->addDays(5);
        $tanggal_selesai_program      = $tanggal_mulai_program->copy()->addDays(105);

        foreach ($programs as $program) {
            // Create an active batch
            ProgramBatch::create([
                'program_layanan_id' => $program->id,
                'nama_batch' => 'Batch Regular',
                'batch_ke' => 6,
                'tanggal_mulai_pendaftaran' => $tanggal_mulai_pendaftaran,
                'tanggal_selesai_pendaftaran' => $tanggal_selesai_pendaftaran,
                'tanggal_mulai_program' => $tanggal_mulai_program,
                'tanggal_selesai_program' => $tanggal_selesai_program,
                'kuota' => 300,
                // 'harga' => rand(1000000, 5000000),
                'harga' => 30000,
                'external_link' => '',
                'status' => 'selesai',
                'catatan_batch' => 'Batch perdana untuk program ini'
            ]);

            // Create an upcoming batch
            ProgramBatch::create([
                'program_layanan_id' => $program->id,
                'nama_batch' => 'Batch Weekend',
                'batch_ke' => 7,
                'tanggal_mulai_pendaftaran' => Carbon::now()->addDays(40),
                'tanggal_selesai_pendaftaran' => Carbon::now()->addDays(70),
                'tanggal_mulai_program' => Carbon::now()->addDays(75),
                'tanggal_selesai_program' => Carbon::now()->addDays(105),
                'kuota' => 400,
                'harga' => 30000,
                'status' => 'selesai',
                'external_link' => '',
                'catatan_batch' => 'Batch khusus weekend'
            ]);

            // Create a completed batch
            ProgramBatch::create([
                'program_layanan_id' => $program->id,
                'nama_batch' => 'Batch Intensif',
                'batch_ke' => 8,
                'tanggal_mulai_pendaftaran' => Carbon::now()->subDays(90),
                'tanggal_selesai_pendaftaran' => Carbon::now()->subDays(60),
                'tanggal_mulai_program' => Carbon::now()->subDays(55),
                'tanggal_selesai_program' => Carbon::now()->subDays(25),
                'kuota' => 200,
                'harga' => 30000,
                'status' => 'aktif',
                'external_link' => 'https://www.bpjph.go.id',
                'catatan_batch' => 'Batch intensif telah selesai'
            ]);
        }
    }
}
