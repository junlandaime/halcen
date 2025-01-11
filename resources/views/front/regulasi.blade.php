@extends('layouts.front')

@section('title')
    <title>Regulasi Kehalalan - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Page Header -->
<section class="relative h-[300px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/800" alt="Regulasi Banner" class="w-full h-[500px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Regulasi Halal</h1>
                <p class="text-2xl mb-8 text-gray-200">Kumpulan Regulasi dan Kebijakan Halal</p>
            </div>
        </div>
    </div>
</section>

<!-- Search and Filter -->
<section class="py-8 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-wrap gap-4 justify-between items-center">
            <div class="flex flex-wrap gap-4" data-aos="fade-right">
                <button class="px-6 py-2 rounded-full bg-primary text-white">Semua</button>
                <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200">UU</button>
                <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200">PP</button>
                <button class="px-6 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200">Permen</button>
            </div>
            <div class="relative" data-aos="fade-left">
                <input type="text" placeholder="Cari regulasi..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Regulations List -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="space-y-8">
            <!-- UU Section -->
            <div data-aos="fade-up">
                <h2 class="text-2xl font-bold mb-6">Undang-Undang</h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex items-start gap-6">
                            <div class="bg-blue-100 p-4 rounded-lg">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl mb-2">UU No. 33 Tahun 2014</h3>
                                <p class="text-gray-600 mb-4">Tentang Jaminan Produk Halal</p>
                                <div class="flex items-center gap-6">
                                    <span class="text-sm text-gray-500">Diundangkan: 17 Oktober 2014</span>
                                    <a href="https://www.bpjph.go.id" target="_blank" class="text-primary hover:text-blue-700">
                                        Lihat di Website BPJPH →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PP Section -->
            <div data-aos="fade-up">
                <h2 class="text-2xl font-bold mb-6">Peraturan Pemerintah</h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex items-start gap-6">
                            <div class="bg-blue-100 p-4 rounded-lg">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl mb-2">PP No. 39 Tahun 2021</h3>
                                <p class="text-gray-600 mb-4">Tentang Penyelenggaraan Bidang Jaminan Produk Halal</p>
                                <div class="flex items-center gap-6">
                                    <span class="text-sm text-gray-500">Diundangkan: 2 Februari 2021</span>
                                    <a href="https://www.bpjph.go.id" target="_blank" class="text-primary hover:text-blue-700">
                                        Lihat di Website BPJPH →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Permen Section -->
            <div data-aos="fade-up">
                <h2 class="text-2xl font-bold mb-6">Peraturan Menteri</h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex items-start gap-6">
                            <div class="bg-blue-100 p-4 rounded-lg">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl mb-2">Permenag No. 26 Tahun 2019</h3>
                                <p class="text-gray-600 mb-4">Tentang Penyelenggaraan Jaminan Produk Halal</p>
                                <div class="flex items-center gap-6">
                                    <span class="text-sm text-gray-500">Diundangkan: 15 Oktober 2019</span>
                                    <a href="https://www.bpjph.go.id" target="_blank" class="text-primary hover:text-blue-700">
                                        Lihat di Website BPJPH →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
