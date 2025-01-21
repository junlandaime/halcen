@extends('layouts.front')

@section('title')
    <title>PPK - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Program Hero Section -->
<section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/800" alt="Pelatihan Kerja Banner" class="w-full h-[600px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Program Pelatihan Kerja</h1>
                <p class="text-2xl mb-8 text-gray-200">Persiapkan Karir di Industri Halal</p>
            </div>
        </div>
    </div>
</section>

<!-- Program Overview -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="md:col-span-2 space-y-6" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-primary">Tentang Program</h2>
                <p class="text-gray-600 text-lg">Program Pelatihan Kerja Pusat Halal Salman ITB dirancang untuk mempersiapkan tenaga kerja profesional yang siap berkontribusi dalam industri halal. Program ini menggabungkan teori dan praktik untuk memberikan pengalaman belajar yang komprehensif.</p>
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold">Fokus Program:</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Auditor Halal Internal</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Supervisor Produksi Halal</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Quality Control Halal</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="space-y-6" data-aos="fade-left">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold mb-4">Detail Program</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">Durasi: 6 Bulan</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span class="text-gray-600">Mode: Full Time</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">Sertifikasi Kompetensi</span>
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

<!-- Training Tracks -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Jalur Pelatihan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Auditor Track -->
            <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 p-4 rounded-lg w-16 h-16 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-4">Auditor Halal Internal</h3>
                <p class="text-gray-600 mb-4">Persiapkan diri menjadi auditor halal internal yang kompeten untuk industri.</p>
                <ul class="space-y-2 text-gray-600 mb-6">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Sistem Audit Halal</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Dokumentasi Audit</span>
                    </li>
                </ul>
            </div>

            <!-- Supervisor Track -->
            <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-blue-100 p-4 rounded-lg w-16 h-16 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-4">Supervisor Produksi Halal</h3>
                <p class="text-gray-600 mb-4">Pelajari manajemen produksi yang sesuai dengan standar halal.</p>
                <ul class="space-y-2 text-gray-600 mb-6">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Manajemen Produksi</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Kontrol Proses</span>
                    </li>
                </ul>
            </div>

            <!-- QC Track -->
            <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-blue-100 p-4 rounded-lg w-16 h-16 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-4">Quality Control Halal</h3>
                <p class="text-gray-600 mb-4">Kuasai teknik pengendalian mutu produk halal.</p>
                <ul class="space-y-2 text-gray-600 mb-6">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Pengujian Sampel</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Standar Mutu Halal</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
