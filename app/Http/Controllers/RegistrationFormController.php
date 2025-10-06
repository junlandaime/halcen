<?php

namespace App\Http\Controllers;

use App\Models\RegistrationForm;
use App\Models\ProgramBatch;
use App\Models\Participant;
use App\Models\Attendance;
use Illuminate\Http\Request;

class RegistrationFormController extends Controller
{
    public function showBySlug($slug)
    {
        $form = RegistrationForm::with(['programBatch.programLayanan'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$form) abort(404, 'Form tidak ditemukan atau tidak aktif.');

        $programLayanan = $form->programBatch?->programLayanan;
        if (!$programLayanan) abort(404, 'Program layanan tidak ditemukan.');

        $programSlug = strtolower($programLayanan->slug ?? '');

        // ✅ mapping ke folder registration
        $viewMap = [
            'program-kuliah-halal'     => 'registration.pendaftaranKuliah',
            'pelatihan-juleha-kurban'  => 'registration.pendaftaranJuleha-Kurban',
            'pelatihan-juleha-unggas'  => 'registration.pendaftaranJuleha-Unggas',
        ];

        // fallback view default (kalau slug tidak cocok)
        $viewName = $viewMap[$programSlug] ?? 'registration.pendaftaranKuliah';

        return view($viewName, [
            'registration' => $form,
            'slug' => $slug,
            'batch' => $form->programBatch,
        ]);
    }

    public function showByBatch(ProgramBatch $batch)
    {
        $form = $batch->registrationForm()->with('programBatch')->first();
        if (!$form || !$form->is_active) abort(404, 'Form tidak ditemukan atau tidak aktif.');

        return view('registration.pendaftaranKuliah', compact('form'));
    }

    public function store(Request $request, $slug)
    {
        $form = RegistrationForm::with('programBatch.programLayanan')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$form) abort(404, 'Form tidak ditemukan atau tidak aktif.');

        $programSlug = strtolower($form->programBatch?->programLayanan?->slug ?? '');

        // ✅ logika duplikat & validasi tetap sama persis
        if ($programSlug === 'program-kuliah-halal') {
            $emailExist = Participant::where('email', $request->email)
                ->where('batch_id', $form->program_batch_id)
                ->exists();
            $waExist = Participant::where('wa', $request->wa)
                ->where('batch_id', $form->program_batch_id)
                ->exists();

            if ($emailExist)
                return back()->withInput()->with('error', 'Email sudah terdaftar.');
            if ($waExist)
                return back()->withInput()->with('error', 'Nomor WhatsApp sudah terdaftar.');
        } else {
            $waExist = Participant::where('wa', $request->wa)
                ->where('batch_id', $form->program_batch_id)
                ->exists();
            if ($waExist)
                return back()->withInput()->with('error', 'Nomor WhatsApp sudah terdaftar.');
        }

        // ✅ Validasi per program
        $rules = $programSlug === 'program-kuliah-halal' ? [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'kelamin' => 'required|in:pria,wanita',
            'usia' => 'required|integer|min:17|max:70',
            'sapaan' => 'nullable|string|max:10',
            'wa' => 'required|string|max:13',
            'alamat_ktp' => 'required|string|max:500',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kelurahan' => 'required|string|max:100',
            'pendidikan' => 'required|string|max:100',
            'sekolah' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:100',
            'instansi' => 'nullable|string|max:255',
            'info_dari' => 'required|string|max:255',
            'info_lainnya' => 'nullable|string|max:255',
            'pernah_mengikuti' => 'required|in:Ya,Tidak',
            'batch_lama' => 'nullable|string|max:50',
            'siap_mengikuti' => 'required|in:Ya,Insyaallah diusahakan',
            'syarat' => 'accepted',
        ] : [
            'nama' => 'required|string|max:255',
            'usia' => 'required|integer|min:17|max:70',
            'wa' => 'required|string|max:13',
            'kategori' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'alamat_instansi' => 'required|string|max:255',
            'provinsi' => 'required|string|max:100',
            'kota' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kelurahan' => 'required|string|max:100',
            'pernah_mengikuti' => 'required|in:Ya,Tidak',
            'syarat' => 'accepted',
        ];

        $validated = $request->validate($rules);
        $validated['pernah_mengikuti'] = strtolower($validated['pernah_mengikuti'] ?? '');
        $validated['syarat'] = $request->has('syarat');

        $participant = new Participant($validated);
        $participant->program_layanan_id = $form->programBatch?->program_layanan_id;
        $participant->batch_id = $form->program_batch_id;
        $participant->save();

        Attendance::create([
            'participant_id' => $participant->id,
            'presensi_pagi' => 0,
            'presensi_siang' => 0,
        ]);

        // Redirect ke link WA jika ada
        if ($form->programBatch?->whatsapp_group_link) {
            return view('registration.redirect_wa', ['link' => $form->programBatch->whatsapp_group_link]);
        }

        return redirect()->route('registration.form.show', $form->slug)
            ->with('success', 'Pendaftaran berhasil!');
    }
}
