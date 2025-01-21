@extends('layouts.front')

@section('title')
    <title>Tentang LPH - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/1080" alt="LPH Banner" class="w-full h-[600px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">LPH Salman ITB</h1>
                <p class="text-2xl mb-8 text-gray-200">Lembaga Pemeriksa Halal Profesional dan Terpercaya</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-primary">Tentang LPH</h2>
                <p class="text-gray-600">
                    LPH Salman ITB adalah Lembaga Pemeriksa Halal yang telah mendapat akreditasi dari BPJPH (Badan Penyelenggara Jaminan Produk Halal). Kami berkomitmen untuk memberikan layanan pemeriksaan dan audit halal yang profesional dan terpercaya.
                </p>
                <p class="text-gray-600">
                    Dengan dukungan auditor halal berpengalaman dan sistem manajemen yang terintegrasi, kami membantu pelaku usaha dalam memenuhi standar kehalalan produk sesuai dengan regulasi yang berlaku.
                </p>
            </div>
            <div data-aos="fade-left">
                <img src="https://picsum.photos/600/400" alt="LPH Office" class="w-full rounded-xl shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Layanan Kami</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Layanan pemeriksaan halal komprehensif untuk berbagai jenis industri
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Audit Halal</h3>
                <p class="text-gray-600">
                    Pemeriksaan menyeluruh terhadap sistem jaminan halal perusahaan.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Pendampingan SJH</h3>
                <p class="text-gray-600">
                    Konsultasi dan pendampingan implementasi Sistem Jaminan Halal.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Pelatihan Internal</h3>
                <p class="text-gray-600">
                    Program pelatihan untuk tim internal perusahaan dalam penerapan SJH.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Proses Sertifikasi</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Tahapan proses sertifikasi halal yang sistematis dan terstruktur
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-primary">1</span>
                </div>
                <h3 class="font-bold mb-2">Pengajuan</h3>
                <p class="text-gray-600 text-sm">
                    Pendaftaran dan pengumpulan dokumen persyaratan
                </p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-primary">2</span>
                </div>
                <h3 class="font-bold mb-2">Audit</h3>
                <p class="text-gray-600 text-sm">
                    Pemeriksaan dokumen dan audit lapangan
                </p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-primary">3</span>
                </div>
                <h3 class="font-bold mb-2">Evaluasi</h3>
                <p class="text-gray-600 text-sm">
                    Analisis hasil audit dan rekomendasi
                </p>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-primary">4</span>
                </div>
                <h3 class="font-bold mb-2">Keputusan</h3>
                <p class="text-gray-600 text-sm">
                    Penerbitan sertifikat halal oleh BPJPH
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Clients Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Klien Kami</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Perusahaan yang telah mempercayakan sertifikasi halal kepada kami
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-center" data-aos="fade-up" data-aos-delay="100">
                <img src="https://picsum.photos/200/100" alt="Client Logo 1" class="max-w-[120px]">
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-center" data-aos="fade-up" data-aos-delay="200">
                <img src="https://picsum.photos/201/100" alt="Client Logo 2" class="max-w-[120px]">
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-center" data-aos="fade-up" data-aos-delay="300">
                <img src="https://picsum.photos/202/100" alt="Client Logo 3" class="max-w-[120px]">
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-center" data-aos="fade-up" data-aos-delay="400">
                <img src="https://picsum.photos/203/100" alt="Client Logo 4" class="max-w-[120px]">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-primary rounded-2xl p-12 text-center text-white" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-6">Mulai Sertifikasi Halal Sekarang</h2>
            <p class="mb-8 text-blue-100">
                Hubungi kami untuk konsultasi gratis mengenai proses sertifikasi halal untuk produk Anda
            </p>
            <a href="../contact.html" class="inline-block px-8 py-3 bg-white text-primary rounded-lg hover:bg-blue-50 transition-colors">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection
