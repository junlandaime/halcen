@extends('layouts.front')

@section('title')
    <title>Tentang Halal Center - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/1080" alt="Pusat Halal Banner" class="w-full h-[600px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Pusat Halal Salman ITB</h1>
                <p class="text-2xl mb-8 text-gray-200">Mewujudkan Ekosistem Halal yang Berkelanjutan</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <img src="https://picsum.photos/600/400" alt="Pusat Halal Office" class="w-full rounded-xl shadow-lg">
            </div>
            <div class="space-y-6" data-aos="fade-left">
                <h2 class="text-3xl font-bold text-primary">Tentang Kami</h2>
                <p class="text-gray-600">
                    Pusat Halal Salman ITB adalah lembaga yang bergerak dalam pengembangan dan penerapan sistem jaminan halal di Indonesia. Didirikan dengan semangat untuk memajukan industri halal nasional, kami memadukan keahlian teknis dengan pemahaman syariah yang komprehensif.
                </p>
                <p class="text-gray-600">
                    Sebagai bagian dari Yayasan Salman ITB, kami berkomitmen untuk memberikan layanan terbaik dalam sertifikasi halal, pendidikan, dan pemberdayaan UMKM menuju ekosistem halal yang berkelanjutan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Visi & Misi</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Komitmen kami dalam membangun ekosistem halal yang berkelanjutan
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Visi</h3>
                <p class="text-gray-600">
                    Menjadi pusat unggulan dalam pengembangan dan penerapan sistem jaminan halal yang terintegrasi, berbasis teknologi, dan berkelanjutan di Indonesia.
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Misi</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Mengembangkan sistem jaminan halal yang terintegrasi dan berbasis teknologi</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Memberikan layanan sertifikasi halal yang profesional dan terpercaya</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Menyelenggarakan pendidikan dan pelatihan halal yang berkualitas</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Memberdayakan UMKM dalam penerapan sistem jaminan halal</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Program Unggulan</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Program-program inovatif untuk mendukung pengembangan ekosistem halal
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Kuliah Halal</h3>
                <p class="text-gray-600">
                    Program pendidikan komprehensif tentang sistem jaminan halal untuk mahasiswa dan profesional.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Sertifikasi Halal</h3>
                <p class="text-gray-600">
                    Layanan sertifikasi halal profesional dengan pendampingan komprehensif.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Pemberdayaan UMKM</h3>
                <p class="text-gray-600">
                    Program pendampingan dan fasilitasi sertifikasi halal untuk UMKM.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Tim Kami</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Para profesional berpengalaman yang mendedikasikan diri untuk pengembangan ekosistem halal
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <img src="https://picsum.photos/200" alt="Team Member 1" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="font-bold mb-1">Dr. Ahmad Syafiq</h3>
                <p class="text-gray-600 text-sm">Direktur Pusat Halal</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="https://picsum.photos/201" alt="Team Member 2" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="font-bold mb-1">Dr. Sarah Amalia</h3>
                <p class="text-gray-600 text-sm">Kepala Divisi Sertifikasi</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <img src="https://picsum.photos/202" alt="Team Member 3" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="font-bold mb-1">Ir. Fadhil Rahman</h3>
                <p class="text-gray-600 text-sm">Kepala Divisi Pendidikan</p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <img src="https://picsum.photos/203" alt="Team Member 4" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="font-bold mb-1">Dr. Nur Fitria</h3>
                <p class="text-gray-600 text-sm">Kepala Divisi Riset</p>
            </div>
        </div>
    </div>
</section>

@endsection
