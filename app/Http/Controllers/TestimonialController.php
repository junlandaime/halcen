<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer|min:0'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil ditambahkan.');
    }


    public function update(Request $request, Testimonial $testimonial)
    {
        // Transform is_featured value
        if ($request->has('is_featured')) {
            $request->merge(['is_featured' => $request->is_featured === '1' ? true : false]);
        }

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_featured' => 'required|boolean',
            'order' => 'nullable|integer|min:0',
            'image' => $request->hasFile('image') ? 'image|mimes:jpeg,png,jpg,gif|max:2048' : '',
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($testimonial->image) {
                    Storage::disk('public')->delete($testimonial->image);
                }
                $validated['image'] = $request->file('image')->store('testimonials', 'public');
            } else {
                unset($validated['image']);
            }

            // Simpan perubahan testimonial
            $testimonial->update($validated);

            return redirect()->route('admin.testimonials.index')
                ->with('updated', 'Testimonial has been updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update testimonial: ' . $e->getMessage()]);
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            // Hapus gambar dari storage jika ada
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }

            // Hapus data testimonial
            $testimonial->delete();

            return redirect()->route('admin.testimonials.index')
                ->with('success', 'Testimonial berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Gagal menghapus testimonial: ' . $e->getMessage()]);
        }
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'required|integer|exists:testimonials,id'
        ]);

        foreach ($request->orders as $index => $id) {
            Testimonial::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['message' => 'Order updated successfully']);
    }
}
