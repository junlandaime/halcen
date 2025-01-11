@extends('layouts.front')

@section('title')
    <title>Tentang LP3H - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Hero Section -->
<section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/1080" alt="LP3H Banner" class="w-full h-[600px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">LP3H Salman ITB</h1>
                <p class="text-2xl mb-8 text-gray-200">Lembaga Pengkajian Pangan, Obat-obatan, dan Kosmetika Halal</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-primary">Tentang LP3H</h2>
                <p class="text-gray-600">
                    LP3H Salman ITB adalah lembaga yang fokus pada pengkajian dan penelitian terkait kehalalan produk pangan, obat-obatan, dan kosmetika. Didirikan sebagai bagian dari Pusat Halal Salman ITB, kami berkomitmen untuk memberikan landasan ilmiah dalam penjaminan produk halal.
                </p>
                <p class="text-gray-600">
                    Dengan dukungan tenaga ahli dan fasilitas laboratorium yang modern, LP3H Salman ITB menjadi pusat riset terdepan dalam pengembangan metode analisis kehalalan produk.
                </p>
            </div>
            <div data-aos="fade-left">
                <img src="https://picsum.photos/600/400" alt="LP3H Lab" class="w-full rounded-xl shadow-lg">
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
                Layanan komprehensif dalam pengkajian dan analisis kehalalan produk
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Analisis Laboratorium</h3>
                <p class="text-gray-600">
                    Pengujian laboratorium untuk mendeteksi kandungan non-halal dalam produk.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Kajian Produk</h3>
                <p class="text-gray-600">
                    Penelitian mendalam tentang komposisi dan proses produksi untuk memastikan kehalalan.
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Konsultasi Teknis</h3>
                <p class="text-gray-600">
                    Pendampingan teknis dalam pengembangan produk halal dan sistem jaminan halal.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Research Areas -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Area Penelitian</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Fokus penelitian kami dalam pengembangan metode analisis kehalalan produk
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-2xl font-bold mb-4">Pangan Halal</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Pengembangan metode deteksi DNA babi dalam produk pangan</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Analisis titik kritis kehalalan dalam proses produksi</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Kajian bahan tambahan pangan dari perspektif halal</p>
                    </li>
                </ul>
            </div>
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-2xl font-bold mb-4">Obat-obatan & Kosmetika</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Identifikasi sumber gelatin dalam produk farmasi</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Pengembangan alternatif bahan halal untuk kosmetik</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-primary mt-1">•</span>
                        <p>Analisis kehalalan bahan aktif obat-obatan</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Facilities -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Fasilitas Laboratorium</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Laboratorium modern dengan peralatan canggih untuk analisis kehalalan produk
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <img src="https://picsum.photos/400/300" alt="Lab Facility 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2">Lab Analisis DNA</h3>
                    <p class="text-gray-600">Dilengkapi dengan peralatan PCR dan elektroforesis untuk analisis DNA.</p>
                </div>
            </div>
            <div class="bg-white rounded-xl overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <img src="https://picsum.photos/401/300" alt="Lab Facility 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2">Lab Kromatografi</h3>
                    <p class="text-gray-600">Sistem HPLC dan GC-MS untuk analisis komponen kimia produk.</p>
                </div>
            </div>
            <div class="bg-white rounded-xl overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="300">
                <img src="https://picsum.photos/402/300" alt="Lab Facility 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2">Lab Mikrobiologi</h3>
                    <p class="text-gray-600">Fasilitas lengkap untuk analisis mikrobiologi dan keamanan produk.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
