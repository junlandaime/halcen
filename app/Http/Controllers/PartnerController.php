<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::withTrashed()->orderBy('id', 'desc')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0'
        ]);

        if ($request->hasFile('logo')) {
            $folder = public_path('partners');

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
            $extension = $request->file('logo')->getClientOriginalExtension();
            $safeName = Str::slug($validated['name'], '_');
            $fileName = "{$nextNumber}. {$validated['name']}.{$extension}";
            $filePath = 'partners/' . $fileName;

            // Pindahkan file
            $request->file('logo')->move($folder, $fileName);

            // Simpan path relatif
            $validated['logo'] = 'partners/' . $fileName;
        }

        Partner::create($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner has been added successfully.');
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0'
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $validated['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')
            ->with('updated', 'Partner has been updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        try {
            // Hapus gambar dari folder public/testimoni jika ada
            if ($partner->logo) {
                $imagePath = public_path($partner->logo);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            // Hapus data testimonial
            $partner->forceDelete();

            return redirect()->route('admin.partners.index')
                ->with('deleted', 'Partner has been deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Erro Deleting Partner: ' . $e->getMessage()]);
        }
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'required|integer|exists:partners,id'
        ]);

        foreach ($request->orders as $index => $id) {
            Partner::where('id', $id)->update(['order' => $index]);
        }

        return response()->json(['message' => 'Order updated successfully']);
    }
}
