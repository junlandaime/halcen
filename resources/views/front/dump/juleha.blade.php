@extends('layouts.front')

@section('title')
    <title>JULEHA - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

 <!-- Program Hero Section -->
 <section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/800" alt="JULEHA Banner" class="w-full h-[600px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Program JULEHA</h1>
                <p class="text-2xl mb-8 text-gray-200">Pelatihan Juru Sembelih Halal Profesional</p>
            </div>
        </div>
    </div>
</section>

<!-- Program Types -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Program JULEHA</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- JULEHA Kurban -->
            <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold">JULEHA Kurban</h3>
                </div>
                <p class="text-gray-600 mb-6">Pelatihan khusus untuk penyembelihan hewan kurban sesuai syariat Islam dan standar keamanan pangan.</p>
                <ul class="space-y-3 mb-6 text-gray-600">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Teknik penyembelihan sesuai syariat</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Penanganan hewan kurban</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Praktik langsung</span>
                    </li>
                </ul>
                <a href="#" class="block w-full bg-primary text-white text-center py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Daftar JULEHA Kurban
                </a>
            </div>

            <!-- JULEHA Unggas -->
            <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold">JULEHA Unggas</h3>
                </div>
                <p class="text-gray-600 mb-6">Pelatihan khusus untuk penyembelihan unggas sesuai syariat Islam dan standar keamanan pangan.</p>
                <ul class="space-y-3 mb-6 text-gray-600">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Teknik penyembelihan unggas</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Standar RPU (Rumah Potong Unggas)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Praktik di RPU</span>
                    </li>
                </ul>
                <a href="#" class="block w-full bg-primary text-white text-center py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Daftar JULEHA Unggas
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Information Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="md:col-span-2 space-y-6" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-primary">Informasi Pendaftaran</h2>
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold">Persyaratan:</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Muslim/Muslimah berusia minimal 17 tahun</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Sehat jasmani dan rohani</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-primary mt-1">•</span>
                            <p>Memiliki komitmen untuk menerapkan standar halal</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="space-y-6" data-aos="fade-left">
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold mb-4">Kontak Informasi</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-gray-600">+62 812-3456-7890</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-gray-600">info@pusathalal.com</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
