<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = FaqCategory::withCount('faqs')->paginate(10);
        return view('admin.faqs.categories', compact('categories'));
    }

    /**
     * Store a newly created FaqCategory in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:faq_categories',
            'description' => 'nullable'
        ]);

        $validated['slug'] = Str::slug($request->name);

        FaqCategory::create($validated);

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'Faq Category created successfully.');
    }

    /**
     * Update the specified FaqCategory in storage.
     */
    public function update(Request $request, FaqCategory $faqCategory)
    {

        // dd($faqCategory);
        $validated = $request->validate([
            'name' => 'required|max:255|unique:faq_categories,name,' . $faqCategory->id,
            'description' => 'nullable'
        ]);

        $validated['slug'] = Str::slug($request->name);

        $faqCategory->update($validated);

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'Faq Category updated successfully.');
    }

    /**
     * Remove the specified FaqCategory from storage.
     */
    public function destroy(FaqCategory $faqCategory)
    {
        // dd($faqCategory);
        if ($faqCategory->faqs()->count() > 0) {
            return redirect()->route('admin.faq-categories.index')
                ->with('error', 'Cannot delete FaqCategory with associated faqs.');
        }

        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'FaqCategory deleted successfully.');
    }
}
