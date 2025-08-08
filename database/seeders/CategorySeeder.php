<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Berita' => 'Berita terkini seputar halal',
            'Artikel' => 'Artikel mendalam tentang halal',
            'Tutorial' => 'Panduan dan tutorial terkait halal',
            'Tips' => 'Tips dan trik seputar halal',
            'Event' => 'Event dan kegiatan terkait halal'
        ];

        foreach ($categories as $name => $description) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $description
            ]);
        }
    }
}
