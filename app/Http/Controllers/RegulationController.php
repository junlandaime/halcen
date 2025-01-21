<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Regulation;
use App\Models\RegulationCategory;
use Illuminate\Http\Request;

class RegulationController extends Controller
{
    public function index()
    {
        $regulations = Regulation::with('category')->latest()->paginate(10);
        return view('admin.regulations.index', compact('regulations'));
    }

    public function create()
    {
        $categories = RegulationCategory::all();
        return view('admin.regulations.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'regulation_category_id' => 'required|exists:regulation_categories,id',
            'title' => 'required|string|max:255',
            'number' => 'required|string|max:50',
            'year' => 'required|integer|min:1900|max:2100',
            'description' => 'required|string',
            'enacted_date' => 'required|date',
            'external_link' => 'nullable|url|max:255',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        Regulation::create($validated);

        return redirect()->route('admin.regulations.index')
            ->with('success', 'Regulasi berhasil ditambahkan');
    }

    public function edit(Regulation $regulation)
    {
        $categories = RegulationCategory::all();
        return view('admin.regulations.edit', compact('regulation', 'categories'));
    }

    public function update(Request $request, Regulation $regulation)
    {
        $validated = $request->validate([
            'regulation_category_id' => 'required|exists:regulation_categories,id',
            'title' => 'required|string|max:255',
            'number' => 'required|string|max:50',
            'year' => 'required|integer|min:1900|max:2100',
            'description' => 'required|string',
            'enacted_date' => 'required|date',
            'external_link' => 'nullable|url|max:255',
            'is_active' => 'boolean'
        ]);
        $validated['is_active'] = $request->has('is_active');
        $regulation->update($validated);

        return redirect()->route('admin.regulations.index')
            ->with('success', 'Regulasi berhasil diperbarui');
    }

    public function destroy(Regulation $regulation)
    {
        $regulation->delete();

        return redirect()->route('admin.regulations.index')
            ->with('success', 'Regulasi berhasil dihapus');
    }
}
