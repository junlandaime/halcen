@extends('lph.front')

@section('title')
    <title>LPH Salman ITB - Lembaga Pemeriksa Halal</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="beranda" class="pt-20 bg-gradient-to-b from-primary/10 to-white">
        <div class="max-w-7xl mx-auto px-4 py-16 md:py-24">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div data-aos="fade-right">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Sertifikasi Halal untuk Produk Anda
                    </h1>
                    <p class="text-gray-600 mb-8">Kami membantu UMKM dalam proses sertifikasi halal dengan pendampingan
                        profesional dan terpercaya.</p>
                    <a href="#konsultasi"
                        class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/80 transition duration-300 inline-block">Mulai
                        Konsultasi</a>
                </div>
                <div data-aos="fade-left">
                    <img src="https://picsum.photos/600/400" alt="Hero Image" class="rounded-lg shadow-xl w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div data-aos="fade-up" class="p-6 bg-primary/5 rounded-lg">
                    <h3 class="text-3xl font-bold text-primary mb-2">500+</h3>
                    <p class="text-gray-600">UMKM Tersertifikasi</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="p-6 bg-primary/5 rounded-lg">
                    <h3 class="text-3xl font-bold text-primary mb-2">50+</h3>
                    <p class="text-gray-600">Auditor Berpengalaman</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="p-6 bg-primary/5 rounded-lg">
                    <h3 class="text-3xl font-bold text-primary mb-2">1000+</h3>
                    <p class="text-gray-600">Konsultasi Selesai</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="p-6 bg-primary/5 rounded-lg">
                    <h3 class="text-3xl font-bold text-primary mb-2">95%</h3>
                    <p class="text-gray-600">Tingkat Kepuasan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Layanan Kami</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div data-aos="fade-up" class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="https://picsum.photos/400/300" alt="Audit" class="w-full rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Audit Halal</h3>
                    <p class="text-gray-600">Pemeriksaan menyeluruh terhadap proses produksi dan bahan baku.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="https://picsum.photos/401/300" alt="Konsultasi" class="w-full rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Konsultasi</h3>
                    <p class="text-gray-600">Pendampingan dalam persiapan sertifikasi halal.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white p-6 rounded-lg shadow-lg">
                    <img src="https://picsum.photos/402/300" alt="Pelatihan" class="w-full rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Pelatihan</h3>
                    <p class="text-gray-600">Program pelatihan untuk implementasi sistem jaminan halal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="konsultasi" class="py-16 bg-primary">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center text-white">
                <h2 class="text-3xl font-bold mb-4">Siap Memulai Sertifikasi Halal?</h2>
                <p class="mb-8">Konsultasikan kebutuhan sertifikasi halal Anda dengan tim kami</p>
                <button class="bg-white text-primary px-8 py-3 rounded-lg hover:bg-gray-100 transition duration-300"
                    @click="alert('Form konsultasi akan segera dibuka')">
                    Mulai Konsultasi Gratis
                </button>
            </div>
        </div>
    </section>
@endsection
