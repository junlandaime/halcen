<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('category')->latest()->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        $categories = VideoCategory::where('is_active', true)->get();
        return view('admin.videos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'video_category_id' => 'required|exists:video_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'youtube_id' => 'required|string|max:50',
            'duration' => 'required|integer|min:1',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        $validated['is_active'] = $request->has('is_active');
        Video::create($validated);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video berhasil ditambahkan');
    }

    public function edit(Video $video)
    {
        $categories = VideoCategory::where('is_active', true)->get();
        return view('admin.videos.edit', compact('video', 'categories'));
    }

    public function update(Request $request, Video $video)
    {
        $validated = $request->validate([
            'video_category_id' => 'required|exists:video_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'youtube_id' => 'required|string|max:50',
            'duration' => 'required|integer|min:1',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);
        $validated['is_active'] = $request->has('is_active');
        $video->update($validated);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video berhasil diperbarui');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video berhasil dihapus');
    }
}
