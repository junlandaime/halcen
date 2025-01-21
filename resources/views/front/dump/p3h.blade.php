@extends('layouts.front')

@section('title')
    <title>P3H - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

 <!-- Program Hero Section -->
 <section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/800" alt="P3H Banner" class="w-full h-[600px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Program P3H</h1>
                <p class="text-2xl mb-8 text-gray-200">Pendamping Proses Produk Halal</p>
            </div>
        </div>
    </div>
</section>

<!-- Program Description -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="md:col-span-2 space-y-6" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-primary">Tentang Program P3H</h2>
                <p class="text-gray-600 text-lg">Program Pendamping Proses Produk Halal (P3H) dirancang untuk mempersiapkan tenaga profesional yang akan membantu UMKM dalam proses sertifikasi halal. Program ini memberikan pemahaman komprehensif tentang sistem jaminan halal dan proses pendampingannya.</p>
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold">Materi Pelatihan:</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Regulasi dan Kebijakan Jaminan Produk Halal</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Sistem Jaminan Halal untuk UMKM</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Teknik Pendampingan UMKM</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Praktik Pendampingan Langsung</p>
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
                            <span class="text-gray-600">Durasi: 2 Bulan</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span class="text-gray-600">Mode: Hybrid (Online & Offline)</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-gray-600">Sertifikat Resmi BPJPH</span>
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

<!-- Benefits Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Manfaat Program</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 p-4 rounded-lg w-16 h-16 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-4">Sertifikasi Resmi</h3>
                <p class="text-gray-600">Mendapatkan sertifikat resmi dari BPJPH sebagai Pendamping Proses Produk Halal.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-blue-100 p-4 rounded-lg w-16 h-16 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-4">Peluang Karir</h3>
                <p class="text-gray-600">Menjadi bagian dari ekosistem halal nasional dengan peluang karir yang menjanjikan.</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-blue-100 p-4 rounded-lg w-16 h-16 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-4">Jaringan Profesional</h3>
                <p class="text-gray-600">Tergabung dalam komunitas profesional halal dan akses ke berbagai peluang kolaborasi.</p>
            </div>
        </div>
    </div>
</section>

@endsection
