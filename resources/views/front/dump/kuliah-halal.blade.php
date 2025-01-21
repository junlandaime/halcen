@extends('layouts.front')

@section('title')
    <title>Kuliah Halal - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Program Hero Section -->
<section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/800" alt="Kuliah Halal Banner" class="w-full h-[600px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Program Kuliah Halal</h1>
                <p class="text-2xl mb-8 text-gray-200">Pelajari Sistem Jaminan Halal dari Para Ahli</p>
            </div>
        </div>
    </div>
</section>

<!-- Program Description -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="md:col-span-2 space-y-6" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-primary">Tentang Program</h2>
                <p class="text-gray-600 text-lg">Program Kuliah Halal merupakan program pendidikan komprehensif yang dirancang untuk memberikan pemahaman mendalam tentang sistem jaminan halal. Program ini mencakup aspek teoritis dan praktis dalam penerapan sistem halal pada industri pangan, farmasi, dan kosmetika.</p>
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold">Materi yang Dipelajari:</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Dasar-dasar Sistem Jaminan Halal</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Regulasi dan Standar Halal Nasional & Internasional</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Titik Kritis Kehalalan Produk</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Implementasi Sistem Jaminan Halal di Industri</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="space-y-6" data-aos="fade-left">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold mb-4">Informasi Program</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">Durasi: 3 Bulan</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-600">Kapasitas: 30 Peserta</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">Sertifikat Resmi</span>
                        </li>
                    </ul>
                    <div class="mt-6">
                        <a href="https://forms.google.com/..." target="_blank" class="block w-full bg-primary text-white text-center py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Schedule Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Jadwal Kelas</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="font-bold text-xl mb-4">Batch 12 (Online)</h3>
                <ul class="space-y-4 text-gray-600">
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>Mulai: 15 Januari 2024</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Setiap Senin & Rabu, 19.00 - 21.00 WIB</span>
                    </li>
                </ul>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="200">
                <h3 class="font-bold text-xl mb-4">Batch 13 (Hybrid)</h3>
                <ul class="space-y-4 text-gray-600">
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>Mulai: 1 Maret 2024</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Setiap Sabtu, 09.00 - 12.00 WIB</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
