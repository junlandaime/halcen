<?php

namespace App\Http\Controllers;

use App\Models\ProgramLayanan;
use App\Models\ProgramBatch;
use App\Models\RegistrationForm;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProgramBatchController extends Controller
{
    public function create($programId)
    {
        $program = ProgramLayanan::findOrFail($programId);
        $lastBatchNumber = $program->batches()->max('batch_ke') ?? 0;
        $nextBatchNumber = $lastBatchNumber + 1;

        return view('admin.program-layanan.batch.create', compact('program', 'nextBatchNumber'));
    }

    public function detail($programId, $batchId)
    {
        $program = ProgramLayanan::findOrFail($programId);
        $batch = ProgramBatch::where('id', $batchId)
            ->where('program_layanan_id', $programId)
            ->firstOrFail();

        $attendances = Attendance::whereHas('participant', function ($query) use ($programId, $batchId) {
            $query->where('program_layanan_id', $programId)
                ->where('batch_id', $batchId);
        })->with([
            'participant',
            'participant.batch',
            'participant.programLayanan'
        ])->get();

        $attendances->map(function ($attendance) {
            $item = $attendance->participant;

            if (!$item) return $attendance;

            $provinsiList = Cache::remember('provinsi_list', now()->addDays(1), function () {
                $response = Http::get('https://ibnux.github.io/data-indonesia/provinsi.json');
                return $response->ok() ? $response->json() : [];
            });

            $item->provinsi_nama = collect($provinsiList)->firstWhere('id', (string) $item->provinsi)['nama'] ?? null;

            $item->kota_nama = Cache::remember("kota_{$item->kota}", now()->addDays(1), function () use ($item) {
                $response = Http::get("https://ibnux.github.io/data-indonesia/kota/{$item->kota}.json");
                return $response->ok() ? ($response->json()['nama'] ?? null) : null;
            });

            $item->kecamatan_nama = Cache::remember("kecamatan_{$item->kecamatan}", now()->addDays(1), function () use ($item) {
                $response = Http::get("https://ibnux.github.io/data-indonesia/kecamatan/{$item->kecamatan}.json");
                return $response->ok() ? ($response->json()['nama'] ?? null) : null;
            });

            $item->kelurahan_nama = Cache::remember("kelurahan_{$item->kelurahan}", now()->addDays(1), function () use ($item) {
                $response = Http::get("https://ibnux.github.io/data-indonesia/kelurahan/{$item->kelurahan}.json");
                return $response->ok() ? ($response->json()['nama'] ?? null) : null;
            });

            return $attendance;
        });

        return view('admin.program-layanan.detail', compact('attendances'));
    }

    public function store(Request $request, ProgramLayanan $program)
    {
        $validated = $request->validate([
            'nama_batch' => 'required|string|max:255',
            'batch_ke' => 'required|integer|min:1',
            'tanggal_mulai_pendaftaran' => 'required|date',
            'tanggal_selesai_pendaftaran' => 'required|date|after:tanggal_mulai_pendaftaran',
            'tanggal_mulai_program' => 'required|date|after_or_equal:tanggal_mulai_pendaftaran',
            'tanggal_selesai_program' => 'required|date|after:tanggal_mulai_program',
            'kuota' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'status' => 'required|in:draft,aktif,selesai',
            'catatan_batch' => 'nullable|string',
            'whatsapp_group_link' => 'nullable|url|max:255', // <- Tambahan
        ]);

        // Simpan batch baru, termasuk whatsapp_group_link
        $batch = $program->batches()->create(array_merge(
            $validated,
            ['external_link' => null] // akan diisi nanti
        ));

        $slug = Str::slug($batch->nama_batch) . '-' . uniqid();

        $form = RegistrationForm::create([
            'program_batch_id' => $batch->id,
            'title' => 'Form Pendaftaran ' . $batch->nama_batch,
            'slug' => $slug,
            'jadwal_pertemuan' => 'Belum ditentukan',
            'narahubung' => '0812xxxxxxx',
        ]);

        $formLink = route('registration.form.show', $slug);

        // Update link pendaftaran
        $batch->update([
            'external_link' => $formLink
        ]);

        return redirect()
            ->route('admin.program-layanan.show', $program)
            ->with('success', 'Batch baru dan form pendaftaran berhasil dibuat');
    }

    public function edit(ProgramLayanan $program, ProgramBatch $batch)
    {
        return view('admin.program-layanan.batch.edit', compact('program', 'batch'));
    }

    public function update(Request $request, ProgramLayanan $program, ProgramBatch $batch)
    {
        $validated = $request->validate([
            'nama_batch' => 'required|string|max:255',
            'batch_ke' => 'required|integer|min:1',
            'tanggal_mulai_pendaftaran' => 'required|date',
            'tanggal_selesai_pendaftaran' => 'required|date|after:tanggal_mulai_pendaftaran',
            'tanggal_mulai_program' => 'required|date|after_or_equal:tanggal_mulai_pendaftaran',
            'tanggal_selesai_program' => 'required|date|after:tanggal_mulai_program',
            'kuota' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'status' => 'required|in:draft,aktif,selesai',
            'external_link' => 'nullable|url|max:255',
            'whatsapp_group_link' => 'nullable|url|max:255', // <- Tambahan
            'catatan_batch' => 'nullable|string'
        ]);

        $batch->update($validated);

        return redirect()
            ->route('admin.program-layanan.show', $program)
            ->with('success', 'Batch berhasil diperbarui');
    }

    public function destroy(ProgramLayanan $program, ProgramBatch $batch)
    {
        $batch->delete();

        return redirect()
            ->route('admin.program-layanan.show', $program)
            ->with('success', 'Batch berhasil dihapus');
    }
}
