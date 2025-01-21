<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->paginate(10);
        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vision' => 'nullable|string',
            'mission' => 'nullable|array',
            'mission.*' => 'required|string',
            'is_active' => 'boolean',
            'order' => 'integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string'
        ]);

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('about/hero', 'public');
        }

        $validated['slug'] = Str::slug($request->title);

        $about = About::create($validated);

        return redirect()->route('admin.abouts.edit', $about)
            ->with('success', 'Halaman tentang berhasil dibuat');
    }

    public function edit(About $about)
    {
        $about->load(['sections', 'teams', 'programs']);
        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'nullable|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vision' => 'nullable|string',
            'mission' => 'nullable|array',
            'mission.*' => 'required|string',
            'is_active' => 'boolean',
            'order' => 'integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string'
        ]);

        if ($request->hasFile('hero_image')) {
            // Delete old image if exists
            if ($about->hero_image) {
                Storage::disk('public')->delete($about->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('about/hero', 'public');
        }

        $validated['slug'] = Str::slug($request->title);

        $about->update($validated);

        return redirect()->route('admin.abouts.edit', $about)
            ->with('success', 'Halaman tentang berhasil diperbarui');
    }

    public function destroy(About $about)
    {
        if ($about->hero_image) {
            Storage::disk('public')->delete($about->hero_image);
        }
        
        $about->delete();

        return redirect()->route('admin.abouts.index')
            ->with('success', 'Halaman tentang berhasil dihapus');
    }
}
