<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function create(Request $request)
    {
        $about = About::findOrFail($request->about_id);
        return view('admin.about-sections.create', compact('about'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'about_id' => 'required|exists:abouts,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about/sections', 'public');
        }

        AboutSection::create($validated);

        return redirect()
            ->route('admin.abouts.edit', $request->about_id)
            ->with('success', 'Bagian berhasil ditambahkan');
    }

    public function edit(AboutSection $aboutSection)
    {
        return view('admin.about-sections.edit', compact('aboutSection'));
    }

    public function update(Request $request, AboutSection $aboutSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutSection->image) {
                Storage::disk('public')->delete($aboutSection->image);
            }
            $validated['image'] = $request->file('image')->store('about/sections', 'public');
        }

        $aboutSection->update($validated);

        return redirect()
            ->route('admin.abouts.edit', $aboutSection->about_id)
            ->with('success', 'Bagian berhasil diperbarui');
    }

    public function destroy(AboutSection $aboutSection)
    {
        if ($aboutSection->image) {
            Storage::disk('public')->delete($aboutSection->image);
        }
        
        $aboutSection->delete();

        return redirect()
            ->route('admin.abouts.edit', $aboutSection->about_id)
            ->with('success', 'Bagian berhasil dihapus');
    }
}
