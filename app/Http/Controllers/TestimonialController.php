<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
            $folder = public_path('testimoni');

            // Buat folder kalau belum ada
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            // Ambil urutan terakhir berdasarkan nama file yang diawali angka
            $existingFiles = File::files($folder);
            $maxNumber = 0;

            foreach ($existingFiles as $file) {
                $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);
                if (preg_match('/^(\d+)\./', $filename, $matches)) {
                    $num = intval($matches[1]);
                    if ($num > $maxNumber) {
                        $maxNumber = $num;
                    }
                }
            }

            $nextNumber = $maxNumber + 1;

            // Format nama: 4. Nama Pengguna.extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $safeName = Str::slug($validated['name'], '_');
            $fileName = "{$nextNumber}. {$validated['name']}.{$extension}";
            $filePath = 'testimoni/' . $fileName;

            // Pindahkan file
            $request->file('image')->move($folder, $fileName);

            // Simpan path relatif
            $validated['image'] = 'testimoni/' . $fileName;
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
            DB::beginTransaction();

            // Handle image upload
            if ($request->hasFile('image')) {
                try {
                    $image = $request->file('image');
                    $imageName = uniqid('testimonial_') . '.' . $image->getClientOriginalExtension();
                    $imagePath = public_path('testimoni');

                    // Buat folder jika belum ada
                    if (!file_exists($imagePath)) {
                        mkdir($imagePath, 0755, true);
                    }

                    $image->move($imagePath, $imageName);

                    // Hapus gambar lama jika ada
                    if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                        unlink(public_path($testimonial->image));
                    }

                    $validated['image'] = 'testimoni/' . $imageName;
                } catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['image' => 'Failed to process image: ' . $e->getMessage()]);
                }
            } else {
                unset($validated['image']);
            }

            // Simpan perubahan testimonial
            $testimonial->update($validated);

            DB::commit();

            return redirect()->route('admin.testimonials.index')
                ->with('updated', 'Testimonial has been updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Hapus gambar baru jika update gagal
            if (isset($validated['image']) && file_exists(public_path($validated['image']))) {
                unlink(public_path($validated['image']));
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update testimonial: ' . $e->getMessage()]);
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            // Hapus gambar dari folder public/testimoni jika ada
            if ($testimonial->image) {
                $imagePath = public_path($testimonial->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
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
