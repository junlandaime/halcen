<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutProgramController extends Controller
{
    public function create(Request $request)
    {
        $about = About::findOrFail($request->about_id);
        return view('admin.about-programs.create', compact('about'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'about_id' => 'required|exists:abouts,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        AboutProgram::create($validated);

        return redirect()
            ->route('admin.abouts.edit', $request->about_id)
            ->with('success', 'Program berhasil ditambahkan');
    }

    public function edit(AboutProgram $aboutProgram)
    {
        return view('admin.about-programs.edit', compact('aboutProgram'));
    }

    public function update(Request $request, AboutProgram $aboutProgram)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        $aboutProgram->update($validated);

        return redirect()
            ->route('admin.abouts.edit', $aboutProgram->about_id)
            ->with('success', 'Program berhasil diperbarui');
    }

    public function destroy(AboutProgram $aboutProgram)
    {
        $aboutProgram->delete();

        return redirect()
            ->route('admin.abouts.edit', $aboutProgram->about_id)
            ->with('success', 'Program berhasil dihapus');
    }
}
