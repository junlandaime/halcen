<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\ProgramBatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ParticipantController extends Controller
{
    public function create(ProgramBatch $batch)
    {
        return view('registration.form', compact('batch'));
    }

    public function store(Request $request, ProgramBatch $batch)
    {
        try {
            // Validasi dasar
            $request->validate([
                'nama_lengkap' => 'required|string',
                'whatsapp' => 'required|string',
                'usia' => 'required|integer',
            ]);

            $data = $request->all();

            // Normalisasi
            $data['nama'] = $data['nama'] ?? $data['nama_lengkap'];
            $data['wa'] = $data['wa'] ?? $data['whatsapp'];

            $data['batch_id'] = $batch->id;
            $data['program_layanan_id'] = $batch->program_layanan_id;

            // Hanya field yang diizinkan
            $allowedFields = [
                'nama', 'email', 'kelamin', 'usia', 'sapaan', 'wa',
                'alamat_ktp', 'alamat_domisili', 'provinsi', 'kota',
                'kecamatan', 'kelurahan', 'pendidikan', 'sekolah',
                'pekerjaan', 'instansi', 'info_dari', 'info_lainnya',
                'pernah_mengikuti', 'batch_lama', 'siap_mengikuti', 'syarat',
                'kategori', 'nama_instansi', 'alamat_instansi', 'pernah_juleha',
                'batch_id', 'program_layanan_id', 'nama_lengkap', 'whatsapp',
            ];

            $participantData = collect($data)->only($allowedFields)->toArray();

            // Simpan ke database
            $participant = Participant::create($participantData);

            return redirect()->back()->with('success', 'Pendaftaran berhasil!');
        } catch (\Exception $e) {
            Log::error('Gagal simpan participant: ' . $e->getMessage());
            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}
