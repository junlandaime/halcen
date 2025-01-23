<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutTeamController extends Controller
{
    public function create(Request $request)
    {
        $about = About::findOrFail($request->about_id);
        return view('admin.about-teams.create', compact('about'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'about_id' => 'required|exists:abouts,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about/teams', 'public');
        }

        AboutTeam::create($validated);

        return redirect()
            ->route('admin.abouts.edit', $request->about_id)
            ->with('success', 'Anggota tim berhasil ditambahkan');
    }

    public function edit(AboutTeam $aboutTeam)
    {
        return view('admin.about-teams.edit', compact('aboutTeam'));
    }

    public function update(Request $request, AboutTeam $aboutTeam)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($aboutTeam->image) {
                Storage::disk('public')->delete($aboutTeam->image);
            }
            $validated['image'] = $request->file('image')->store('about/teams', 'public');
        }

        $aboutTeam->update($validated);

        return redirect()
            ->route('admin.abouts.edit', $aboutTeam->about_id)
            ->with('success', 'Anggota tim berhasil diperbarui');
    }

    public function destroy(AboutTeam $aboutTeam)
    {
        if ($aboutTeam->image) {
            Storage::disk('public')->delete($aboutTeam->image);
        }
        
        $aboutTeam->delete();

        return redirect()
            ->route('admin.abouts.edit', $aboutTeam->about_id)
            ->with('success', 'Anggota tim berhasil dihapus');
    }
}
