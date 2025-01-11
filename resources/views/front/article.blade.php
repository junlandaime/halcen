@extends('layouts.front')

@section('title')
    <title>Artikel dan Publikasi - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Page Header -->
<section class="relative h-[300px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/800" alt="Artikel Banner" class="w-full h-[500px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Artikel dan Publikasi</h1>
                <p class="text-2xl mb-8 text-gray-200">Informasi Terkini Seputar Halal</p>
            </div>
        </div>
    </div>
</section>

<!-- Article Categories and Search -->
<section class="py-8 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-wrap gap-4 justify-between items-center">
            <div class="flex flex-wrap gap-4" data-aos="fade-right">
                <button class="px-6 py-2 rounded-full bg-primary text-white">Semua</button>
                <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200">Regulasi</button>
                <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200">Industri</button>
                <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200">UMKM</button>
            </div>
            <div class="relative" data-aos="fade-left">
                <input type="text" placeholder="Cari artikel..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Featured Article -->
<section class="py-12">
    <div class="max-w-6xl mx-auto px-4">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="h-64 md:h-auto">
                    <img src="https://picsum.photos/800/600" alt="Featured Article" class="w-full h-full object-cover">
                </div>
                <div class="p-8">
                    <span class="inline-block px-3 py-1 bg-blue-100 text-primary rounded-full text-sm mb-4">Regulasi</span>
                    <h2 class="text-2xl font-bold mb-4">Perkembangan Terbaru Regulasi Halal di Indonesia 2024</h2>
                    <p class="text-gray-600 mb-6">Update terkini mengenai perkembangan regulasi halal di Indonesia, termasuk perubahan kebijakan dan dampaknya terhadap industri...</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="https://picsum.photos/32/32" alt="Author" class="w-8 h-8 rounded-full">
                            <span class="text-sm text-gray-600">Dr. Ahmad Syafiq</span>
                        </div>
                        <span class="text-sm text-gray-500">5 Jan 2024</span>
                    </div>
                    <a href="{{ route('front.article-detail') }}" class="inline-block mt-6 text-primary hover:text-blue-700">
                        Baca selengkapnya →
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Grid -->
<section class="py-12">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Article Card 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <img src="https://picsum.photos/400/300" alt="Article 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="inline-block px-3 py-1 bg-blue-100 text-primary rounded-full text-sm mb-4">UMKM</span>
                    <h3 class="font-bold text-xl mb-2">Panduan Lengkap Sertifikasi Halal untuk UMKM</h3>
                    <p class="text-gray-600 text-sm mb-4">Langkah-langkah praktis untuk UMKM dalam memperoleh sertifikasi halal...</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">3 Jan 2024</span>
                        <a href="{{ route('front.article-detail') }}" class="text-primary hover:text-blue-700">Baca →</a>
                    </div>
                </div>
            </div>

            <!-- Article Card 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <img src="https://picsum.photos/401/300" alt="Article 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="inline-block px-3 py-1 bg-blue-100 text-primary rounded-full text-sm mb-4">Industri</span>
                    <h3 class="font-bold text-xl mb-2">Tren Industri Halal Global 2024</h3>
                    <p class="text-gray-600 text-sm mb-4">Analisis mendalam tentang perkembangan industri halal global...</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">2 Jan 2024</span>
                        <a href="{{ route('front.article-detail') }}" class="text-primary hover:text-blue-700">Baca →</a>
                    </div>
                </div>
            </div>

            <!-- Article Card 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <img src="https://picsum.photos/402/300" alt="Article 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <span class="inline-block px-3 py-1 bg-blue-100 text-primary rounded-full text-sm mb-4">Regulasi</span>
                    <h3 class="font-bold text-xl mb-2">Standar Baru Sertifikasi Halal 2024</h3>
                    <p class="text-gray-600 text-sm mb-4">Pembaruan standar dan persyaratan sertifikasi halal...</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">1 Jan 2024</span>
                        <a href="{{ route('front.article-detail') }}" class="text-primary hover:text-blue-700">Baca →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12" data-aos="fade-up">
            <nav class="flex items-center gap-2">
                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:border-primary hover:text-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-white">1</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:border-primary hover:text-primary">2</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:border-primary hover:text-primary">3</button>
                <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:border-primary hover:text-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </nav>
        </div>
    </div>
</section>

@endsection
