<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all categories
        $categories = Category::all();

        // Get or create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

        // Sample articles
        $articles = [
            [
                'title' => 'Pentingnya Sertifikasi Halal di Era Modern',
                'content' => $this->generateArticleContent(),
                'category' => 'Artikel'
            ],
            [
                'title' => 'Tips Memilih Produk Halal yang Terpercaya',
                'content' => $this->generateArticleContent(),
                'category' => 'Tips'
            ],
            [
                'title' => 'Event Halal Expo 2024',
                'content' => $this->generateArticleContent(),
                'category' => 'Event'
            ],
            [
                'title' => 'Panduan Lengkap Mengurus Sertifikasi Halal',
                'content' => $this->generateArticleContent(),
                'category' => 'Tutorial'
            ],
            [
                'title' => 'Perkembangan Industri Halal di Indonesia',
                'content' => $this->generateArticleContent(),
                'category' => 'Berita'
            ],
            [
                'title' => 'Tips Memilih Produk Halal yang Terpercaya 2',
                'content' => $this->generateArticleContent(),
                'category' => 'Tips'
            ],
            [
                'title' => 'Event Halal Expo 2024 2',
                'content' => $this->generateArticleContent(),
                'category' => 'Event'
            ],
            [
                'title' => 'Panduan Lengkap Mengurus Sertifikasi Halal 2',
                'content' => $this->generateArticleContent(),
                'category' => 'Tutorial'
            ],
            [
                'title' => 'Perkembangan Industri Halal di Indonesia 2',
                'content' => $this->generateArticleContent(),
                'category' => 'Berita'
            ],
            [
                'title' => 'Tips Memilih Produk Halal yang Terpercaya 3',
                'content' => $this->generateArticleContent(),
                'category' => 'Tips'
            ],
            [
                'title' => 'Event Halal Expo 2024 3',
                'content' => $this->generateArticleContent(),
                'category' => 'Event'
            ],
            [
                'title' => 'Panduan Lengkap Mengurus Sertifikasi Halal 3',
                'content' => $this->generateArticleContent(),
                'category' => 'Tutorial'
            ],
            [
                'title' => 'Perkembangan Industri Halal di Indonesia 3',
                'content' => $this->generateArticleContent(),
                'category' => 'Berita'
            ]
        ];

        foreach ($articles as $index => $articleData) {
            $category = $categories->where('name', $articleData['category'])->first();

            Article::create([
                'title' => $articleData['title'],
                'slug' => Str::slug($articleData['title']),
                'content' => $articleData['content'],
                'excerpt' => Str::limit(strip_tags($articleData['content']), 200),
                'category_id' => $category->id,
                'author_id' => $admin->id,
                'status' => 'published',
                'is_featured' => $index < 3, // First 3 articles are featured
                'published_at' => now()->subDays(rand(1, 30)),
                'meta_description' => 'Meta description for ' . $articleData['title'],
                'meta_keywords' => 'halal, sertifikasi, indonesia'
            ]);
        }
    }

    /**
     * Generate dummy article content
     */
    private function generateArticleContent(): string
    {
        return '<h2>Pendahuluan</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        
        <h3>Sub Bagian 1</h3>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <ul>
            <li>Point penting pertama</li>
            <li>Point penting kedua</li>
            <li>Point penting ketiga</li>
        </ul>
        
        <h3>Sub Bagian 2</h3>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        
        <h2>Kesimpulan</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
    }
}
