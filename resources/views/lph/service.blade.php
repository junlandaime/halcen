@extends('lph.front')

@section('title')
    <title>Layanan - LPH Salman ITB - Lembaga Pemeriksa Halal</title>
@endsection

@section('content')
    <section class="pt-20 bg-gradient-to-b from-primary/10 to-white">
        <div class="max-w-7xl mx-auto px-4 py-16">
            <h1 class="text-4xl font-bold text-center mb-8">Layanan Audit Halal</h1>
            <p class="text-center text-gray-600 max-w-2xl mx-auto">Proses pemeriksaan menyeluruh untuk memastikan kehalalan
                produk Anda</p>
        </div>
    </section>

    <!-- Audit Process -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <div data-aos="fade-up" class="bg-primary/5 p-6 rounded-lg">
                    <div class="text-primary text-4xl font-bold mb-4">01</div>
                    <h3 class="text-xl font-bold mb-2">Persiapan Audit</h3>
                    <p class="text-gray-600">Pemeriksaan dokumen dan persiapan tim audit</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-primary/5 p-6 rounded-lg">
                    <div class="text-primary text-4xl font-bold mb-4">02</div>
                    <h3 class="text-xl font-bold mb-2">Pelaksanaan Audit</h3>
                    <p class="text-gray-600">Inspeksi lapangan dan verifikasi proses produksi</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-primary/5 p-6 rounded-lg">
                    <div class="text-primary text-4xl font-bold mb-4">03</div>
                    <h3 class="text-xl font-bold mb-2">Laporan Audit</h3>
                    <p class="text-gray-600">Penyusunan hasil temuan dan rekomendasi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Audit Scope -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Ruang Lingkup Audit</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div data-aos="fade-right" class="space-y-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-2">Bahan Baku</h3>
                        <p class="text-gray-600">Pemeriksaan sumber dan kandungan bahan baku</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-2">Proses Produksi</h3>
                        <p class="text-gray-600">Evaluasi metode dan alur produksi</p>
                    </div>
                </div>
                <div data-aos="fade-left" class="space-y-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-2">Fasilitas Produksi</h3>
                        <p class="text-gray-600">Pemeriksaan peralatan dan area produksi</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-2">Sistem Dokumentasi</h3>
                        <p class="text-gray-600">Review sistem pencatatan dan dokumentasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Siap Memulai Audit Halal?</h2>
            <p class="text-white/80 mb-8">Hubungi kami untuk mendapatkan informasi lebih lanjut</p>
            <a href="/consultation-form.html"
                class="bg-white text-primary px-8 py-3 rounded-lg hover:bg-gray-100 transition duration-300">
                Ajukan Audit Sekarang
            </a>
        </div>
    </section>
@endsection
