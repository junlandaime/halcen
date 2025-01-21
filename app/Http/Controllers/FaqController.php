<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::with('category')->latest()->paginate(10);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = FaqCategory::where('is_active', true)->get();
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
            'is_active' => 'nullable|boolean',
            'order' => 'integer'
        ]);
        
        // Convert is_active dari checkbox ke boolean
        $validated['is_active'] = $request->has('is_active');
        
        Faq::create($validated);
        
        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ berhasil ditambahkan');
    }

    public function edit(Faq $faq)
    {
        $categories = FaqCategory::where('is_active', true)->get();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        // dd($request);
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
            'is_active' => 'nullable|boolean',
            'order' => 'integer'
        ]);
        $data = $validated;
        $data['is_active'] = $request->has('is_active');

        $faq->update($data);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ berhasil diperbarui');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ berhasil dihapus');
    }
}
