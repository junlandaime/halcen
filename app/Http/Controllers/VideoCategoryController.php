<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VideoCategory;

class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = VideoCategory::withCount('videos')->paginate(10);
        return view('admin.videos.categories', compact('categories'));
    }

    /**
     * Store a newly created VideoCategory in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:video_categories',
            'description' => 'nullable'
        ]);

        $validated['slug'] = Str::slug($request->name);

        VideoCategory::create($validated);

        return redirect()->route('admin.video-categories.index')
            ->with('success', 'Video Category created successfully.');
    }

    /**
     * Update the specified VideoCategory in storage.
     */
    public function update(Request $request, VideoCategory $videoCategory)
    {

        // dd($videoCategory);
        $validated = $request->validate([
            'name' => 'required|max:255|unique:video_categories,name,' . $videoCategory->id,
            'description' => 'nullable'
        ]);

        $validated['slug'] = Str::slug($request->name);

        $videoCategory->update($validated);

        return redirect()->route('admin.video-categories.index')
            ->with('success', 'VideoCategory updated successfully.');
    }

    /**
     * Remove the specified VideoCategory from storage.
     */
    public function destroy(VideoCategory $videoCategory)
    {
        // dd($videoCategory);
        if ($videoCategory->videos()->count() > 0) {
            return redirect()->route('videos-admin.categories.index')
                ->with('error', 'Cannot delete VideoCategory with associated videos.');
        }

        $videoCategory->delete();

        return redirect()->route('admin.video-categories.index')
            ->with('success', 'VideoCategory deleted successfully.');
    }
}
