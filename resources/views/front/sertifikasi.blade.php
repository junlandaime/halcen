@extends('layouts.front')

@section('title')
    <title>Sertifikasi Halal - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Service Hero Section -->
<section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/800" alt="Sertifikasi Halal Banner" class="w-full h-[600px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Sertifikasi Halal</h1>
                <p class="text-2xl mb-8 text-gray-200">Layanan Pendampingan Sertifikasi Halal untuk UMKM</p>
            </div>
        </div>
    </div>
</section>

<!-- Service Paths -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Self Declare -->
            <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold">Jalur Self Declare</h3>
                </div>
                <p class="text-gray-600 mb-6">Jalur sertifikasi mandiri untuk UMKM dengan kriteria tertentu sesuai regulasi BPJPH.</p>
                <div class="space-y-6">
                    <div>
                        <h4 class="font-semibold mb-3">Syarat dan Ketentuan:</h4>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Omset maksimal 1 Miliar/tahun</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Produk tidak berisiko tinggi</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Memiliki NIB</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890" target="_blank" class="block w-full bg-primary text-white text-center py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        Konsultasi via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Regular Path -->
            <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold">Jalur Reguler</h3>
                </div>
                <p class="text-gray-600 mb-6">Jalur sertifikasi standar melalui Lembaga Pemeriksa Halal (LPH) Salman ITB.</p>
                <div class="space-y-6">
                    <div>
                        <h4 class="font-semibold mb-3">Syarat dan Ketentuan:</h4>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Memiliki NIB</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Dokumen legalitas usaha</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Data produk lengkap</span>
                            </li>
                        </ul>
                    </div>
                    <a href="https://wa.me/6281234567890" target="_blank" class="block w-full bg-primary text-white text-center py-3 rounded-lg hover:bg-blue-700 transition-colors">
                        Konsultasi via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Flow -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Alur Proses Sertifikasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-primary">1</span>
                </div>
                <h3 class="font-bold text-xl mb-2">Konsultasi Awal</h3>
                <p class="text-gray-600">Diskusi kebutuhan dan jalur sertifikasi yang sesuai</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-primary">2</span>
                </div>
                <h3 class="font-bold text-xl mb-2">Persiapan Dokumen</h3>
                <p class="text-gray-600">Penyiapan berkas dan dokumen pendukung</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-primary">3</span>
                </div>
                <h3 class="font-bold text-xl mb-2">Pendampingan</h3>
                <p class="text-gray-600">Proses pendampingan dan pemeriksaan</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-primary">4</span>
                </div>
                <h3 class="font-bold text-xl mb-2">Sertifikasi</h3>
                <p class="text-gray-600">Penerbitan sertifikat halal</p>
            </div>
        </div>
    </div>
</section>

@endsection
