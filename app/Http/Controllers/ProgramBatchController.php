<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProgramLayanan;
use App\Models\ProgramBatch;
use Illuminate\Http\Request;

class ProgramBatchController extends Controller
{
    public function create(ProgramLayanan $program)
    {
        return view('admin.program-layanan.batch.create', compact('program'));
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
            'external_link' => 'nullable|url|max:255',
            'catatan_batch' => 'nullable|string'
        ]);

        $program->batches()->create($validated);

        return redirect()
            ->route('admin.program-layanan.show', $program)
            ->with('success', 'Batch baru berhasil ditambahkan');
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
