<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProgramLayanan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProgramLayananController extends Controller
{
    public function index()
    {
        $programs = ProgramLayanan::with('batches')->get();
        return view('admin.program-layanan.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.program-layanan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'nama_banner' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deskripsi_lengkap' => 'required|string',
            'tipe_kelas' => 'required|in:online,offline,hybrid',
            'durasi' => 'required|string',
            'materi' => 'required|array',
            'materi.*' => 'required|string',
            'manfaat' => 'required|array',
            'manfaat.*' => 'required|string',
            'persyaratan' => 'required|array',
            'persyaratan.*' => 'required|string',
            'alur_proses' => 'required|array',
            'alur_proses.*' => 'required|string',
            'gambar_banner' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('gambar_banner')) {
            $file = $request->file('gambar_banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('program-layanan', $filename, 'public');
            $validated['gambar_banner'] = 'program-layanan/' . $filename;
        }

        // Generate slug
        $validated['slug'] = Str::slug($validated['nama_program']);

        ProgramLayanan::create($validated);

        return redirect()->route('admin.program-layanan.index')
            ->with('success', 'Program berhasil ditambahkan');
    }

    public function show(ProgramLayanan $programLayanan)
    {
        $programLayanan->load('batches');
        return view('admin.program-layanan.show', compact('programLayanan'));
    }

    public function edit(ProgramLayanan $programLayanan)
    {
        return view('admin.program-layanan.edit', compact('programLayanan'));
    }

    public function update(Request $request, ProgramLayanan $programLayanan)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'nama_banner' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deskripsi_lengkap' => 'required|string',
            'tipe_kelas' => 'required|in:online,offline,hybrid',
            'durasi' => 'required|string',
            'materi' => 'required|array',
            'materi.*' => 'required|string',
            'manfaat' => 'required|array',
            'manfaat.*' => 'required|string',
            'persyaratan' => 'required|array',
            'persyaratan.*' => 'required|string',
            'alur_proses' => 'required|array',
            'alur_proses.*' => 'required|string',
            'gambar_banner' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Handle image upload
        if ($request->hasFile('gambar_banner')) {
            if ($programLayanan->gambar_banner) {
                // Hapus gambar lama jika ada
                Storage::disk('public')->delete($programLayanan->gambar_banner);
            }

            // Upload gambar baru ke folder public/program-layanan
            $file = $request->file('gambar_banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('program-layanan', $filename, 'public'); // Pastikan menggunakan disk 'public'
            $validated['gambar_banner'] = 'program-layanan/' . $filename; // Simpan path relatif
        }


        // Generate slug only if the name changes
        if ($validated['nama_program'] !== $programLayanan->nama_program) {
            $validated['slug'] = Str::slug($validated['nama_program']);
        }

        // Update the record
        $programLayanan->update($validated);

        return redirect()->route('admin.program-layanan.index')
            ->with('success', 'Program berhasil diperbarui');
    }


    public function destroy(ProgramLayanan $programLayanan)
    {
        $programLayanan->delete();
        return redirect()->route('admin.program-layanan.index')
            ->with('success', 'Program berhasil dihapus');
    }
}
