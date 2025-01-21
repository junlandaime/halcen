<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the articles.
     */
    public function index()
    {
        $articles = Article::with(['category', 'author'])
            ->latest()
            ->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'meta_description' => 'nullable|max:255',
            'meta_keywords' => 'nullable|max:255',
            'is_featured' => 'boolean'
        ]);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('articles', 'public');
            $validated['featured_image'] = $path;
        }

        $validated['slug'] = Str::slug($request->title);
        $validated['author_id'] = auth()->id();
        $validated['published_at'] = $request->status === 'published' ?
            ($request->published_at ?? now()) : null;
        // 'status' => $request->status == 'on' ? 1 : 0
        // $validated['is_featured'] = $request->is_featured === '1' ? 1 :  0;
        // dd($validated);

        Article::create($validated);
        if (auth()->user()->hasRole('superAdmin')) {
            return redirect()->route('admin.articles.index')
                ->with('success', 'Article created successfully.');
        } else {
            return redirect()->route('articles.index')
                ->with('success', 'Article created successfully.');
        }
    }

    /**
     * Show the form for editing the specified article.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'meta_description' => 'nullable|max:255',
            'meta_keywords' => 'nullable|max:255',
            'is_featured' => 'boolean'
        ]);

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }
            $path = $request->file('featured_image')->store('articles', 'public');
            $validated['featured_image'] = $path;
        }

        $validated['slug'] = Str::slug($request->title);
        $validated['published_at'] = $request->status === 'published' ?
            ($request->published_at ?? now()) : null;

        $article->update($validated);

        if (auth()->user()->hasRole('superAdmin')) {
            return redirect()->route('admin.articles.index')
                ->with('success', 'Article updated successfully.');
        } else {
            return redirect()->route('article.index')
                ->with('success', 'Article updated successfully.');
        }
    }

    /**
     * Display the specified article.
     */
    public function show(Article $article)
    {
        $article->load(['category', 'author']);

        // Get related articles from the same category
        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        return view('admin.articles.show', compact('article', 'relatedArticles'));
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->featured_image) {
            Storage::disk('public')->delete($article->featured_image);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article deleted successfully.');
    }


    /**
     * Toggle the featured status of the article.
     */
    public function toggleFeatured(Article $article)
    {
        $article->update([
            'is_featured' => !$article->is_featured
        ]);

        return back()->with(
            'success',
            $article->is_featured
                ? 'Article has been marked as featured.'
                : 'Article has been removed from featured.'
        );
    }

    /**
     * Toggle the publication status of the article.
     */
    public function toggleStatus(Article $article)
    {
        $newStatus = $article->status === 'published' ? 'draft' : 'published';

        $article->update([
            'status' => $newStatus,
            'published_at' => $newStatus === 'published' ? now() : null
        ]);

        return back()->with(
            'success',
            $newStatus === 'published'
                ? 'Article has been published.'
                : 'Article has been unpublished and marked as draft.'
        );
    }

    /**
     * Update the order of articles.
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'required|integer|exists:articles,id'
        ]);

        foreach ($request->orders as $index => $id) {
            Article::where('id', $id)->update(['order' => $index]);
        }

        return response()->json([
            'message' => 'Article order has been updated successfully.'
        ]);
    }
}
