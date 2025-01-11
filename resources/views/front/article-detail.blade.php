@extends('layouts.front')

@section('title')
    <title>Judul Artikel dan Publikasi - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Article Header -->
<section class="relative h-[500px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/1080" alt="Article Banner" class="w-full h-[700px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-4xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <span class="inline-block px-3 py-1 bg-white/20 text-white rounded-full text-sm mb-6">Regulasi</span>
                <h1 class="text-5xl font-bold mb-6">Perkembangan Terbaru Regulasi Halal di Indonesia 2024</h1>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-3">
                        <img src="https://picsum.photos/32/32" alt="Author" class="w-8 h-8 rounded-full">
                        <span>Dr. Ahmad Syafiq</span>
                    </div>
                    <span>5 Januari 2024</span>
                    <span>10 menit membaca</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4">
        <article class="prose prose-lg max-w-none" data-aos="fade-up">
            <p class="lead text-xl text-gray-600 mb-8">
                Perkembangan regulasi halal di Indonesia terus mengalami pembaruan seiring dengan meningkatnya kesadaran masyarakat akan pentingnya produk halal. Artikel ini akan membahas perubahan-perubahan signifikan dalam regulasi halal di tahun 2024.
            </p>

            <h2 class="text-2xl font-bold mt-12 mb-6">Latar Belakang</h2>
            <p class="text-gray-600 mb-6">
                Sejak diberlakukannya UU Nomor 33 Tahun 2014 tentang Jaminan Produk Halal, Indonesia telah melalui berbagai fase implementasi dan penyempurnaan regulasi halal. Tahun 2024 membawa beberapa perubahan penting yang perlu diperhatikan oleh pelaku industri dan UMKM.
            </p>

            <h2 class="text-2xl font-bold mt-12 mb-6">Perubahan Utama di 2024</h2>
            <ul class="space-y-4 text-gray-600 mb-8">
                <li class="flex items-start gap-3">
                    <span class="text-primary mt-1">•</span>
                    <p>Penyederhanaan proses sertifikasi untuk UMKM</p>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-primary mt-1">•</span>
                    <p>Integrasi sistem digital dalam proses pengajuan</p>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-primary mt-1">•</span>
                    <p>Perluasan cakupan produk wajib sertifikasi</p>
                </li>
            </ul>

            <div class="bg-gray-50 rounded-xl p-8 my-12">
                <h3 class="text-xl font-bold mb-4">Highlight Perubahan</h3>
                <p class="text-gray-600">
                    BPJPH telah mengimplementasikan sistem baru yang memungkinkan proses sertifikasi lebih cepat dan efisien. Sistem ini terintegrasi dengan platform digital yang memudahkan pelaku usaha dalam mengajukan permohonan sertifikasi halal.
                </p>
            </div>

            <h2 class="text-2xl font-bold mt-12 mb-6">Dampak bagi Pelaku Usaha</h2>
            <p class="text-gray-600 mb-6">
                Perubahan regulasi ini membawa dampak signifikan bagi pelaku usaha, terutama dalam hal:
            </p>
            <ul class="space-y-4 text-gray-600 mb-8">
                <li class="flex items-start gap-3">
                    <span class="text-primary mt-1">•</span>
                    <p>Kemudahan proses pengajuan sertifikasi</p>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-primary mt-1">•</span>
                    <p>Pengurangan biaya dan waktu proses</p>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-primary mt-1">•</span>
                    <p>Peningkatan transparansi proses sertifikasi</p>
                </li>
            </ul>

            <div class="border-l-4 border-primary pl-6 my-12">
                <p class="text-xl text-gray-600 italic">
                    "Perubahan regulasi ini merupakan langkah penting dalam mendukung pengembangan industri halal di Indonesia sekaligus memudahkan UMKM dalam mendapatkan sertifikasi halal."
                </p>
                <p class="text-sm text-gray-500 mt-4">
                    - Kepala BPJPH
                </p>
            </div>

            <h2 class="text-2xl font-bold mt-12 mb-6">Kesimpulan</h2>
            <p class="text-gray-600 mb-8">
                Perubahan regulasi halal di tahun 2024 menunjukkan komitmen pemerintah dalam mendukung perkembangan industri halal di Indonesia. Dengan sistem yang lebih efisien dan terintegrasi, diharapkan dapat meningkatkan jumlah produk bersertifikat halal di Indonesia.
            </p>
        </article>

        <!-- Share Buttons -->
        <div class="flex items-center gap-4 mt-12 pt-8 border-t" data-aos="fade-up">
            <span class="text-gray-600">Bagikan:</span>
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path>
                </svg>
            </a>
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                </svg>
            </a>
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"></path>
                </svg>
            </a>
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path>
                </svg>
            </a>
        </div>

        <!-- Related Articles -->
        <div class="mt-16">
            <h3 class="text-2xl font-bold mb-8">Artikel Terkait</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://picsum.photos/400/300" alt="Related Article 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="inline-block px-3 py-1 bg-blue-100 text-primary rounded-full text-sm mb-4">UMKM</span>
                        <h3 class="font-bold text-xl mb-2">Panduan Lengkap Sertifikasi Halal untuk UMKM</h3>
                        <a href="#" class="text-primary hover:text-blue-700">Baca selengkapnya →</a>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://picsum.photos/401/300" alt="Related Article 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="inline-block px-3 py-1 bg-blue-100 text-primary rounded-full text-sm mb-4">Industri</span>
                        <h3 class="font-bold text-xl mb-2">Tren Industri Halal Global 2024</h3>
                        <a href="#" class="text-primary hover:text-blue-700">Baca selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
