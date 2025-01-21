<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        // dd($request);

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
            ->with('success', 'Testimonial has been added successfully.');
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        // Transform is_featured value
        if ($request->has('is_featured')) {
            $request->merge(['is_featured' => $request->is_featured === '1' ? true : false]);
        }

        // Validate basic fields
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
            DB::beginTransaction();

            // Handle image upload if new image exists
            if ($request->hasFile('image')) {
                try {
                    // Upload new image
                    $newImage = $request->file('image')->store('testimonials', 'public');
                    
                    // Delete old image if exists
                    if ($testimonial->image) {
                        $oldImagePath = $testimonial->image;
                        if (Storage::disk('public')->exists($oldImagePath)) {
                            Storage::disk('public')->delete($oldImagePath);
                        }
                    }
                    
                    $validated['image'] = $newImage;
                } catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['image' => 'Failed to process image: ' . $e->getMessage()]);
                }
            } else {
                // If no new image, remove image from validated data to prevent overwriting
                unset($validated['image']);
            }

            // Update testimonial
            $testimonial->update($validated);
            
            DB::commit();

            return redirect()->route('admin.testimonials.index')
                ->with('success', 'Testimonial has been updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            // If new image was uploaded but update failed, try to clean it up
            if (isset($newImage) && Storage::disk('public')->exists($newImage)) {
                Storage::disk('public')->delete($newImage);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update testimonial: ' . $e->getMessage()]);
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial has been deleted successfully.');
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
