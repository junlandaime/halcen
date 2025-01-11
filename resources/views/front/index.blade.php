@extends('layouts.front')

@section('title')
    <title>Halal Center - Masjid Salman ITB</title>
@endsection

@section('content')

<!-- Web Banner -->
<section class="relative h-[600px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/1080" alt="Banner" class="w-full h-[800px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Pusat Halal Salman ITB</h1>
                <p class="text-2xl mb-8 text-gray-200">Menuju Indonesia Halal 2024</p>
                <button class="bg-white text-primary px-8 py-3 rounded-full hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                    Mulai Sekarang
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Rekap Penerima Manfaat -->
<section class="relative z-10 -mt-20 pb-16">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl font-bold text-primary mb-2" x-data="{ count: 0 }" 
                     x-init="setTimeout(() => { count = 500 }, 500)">
                    <span x-text="count">0</span>+
                </div>
                <p class="text-gray-600">Lulusan Kuliah Halal</p>
                <div class="mt-4 h-1 w-20 bg-primary rounded"></div>
            </div>
            <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl font-bold text-primary mb-2" x-data="{ count: 0 }" 
                     x-init="setTimeout(() => { count = 1000 }, 500)">
                    <span x-text="count">0</span>+
                </div>
                <p class="text-gray-600">Peserta JULEHA</p>
                <div class="mt-4 h-1 w-20 bg-primary rounded"></div>
            </div>
            <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="300">
                <div class="text-4xl font-bold text-primary mb-2" x-data="{ count: 0 }" 
                     x-init="setTimeout(() => { count = 250 }, 500)">
                    <span x-text="count">0</span>+
                </div>
                <p class="text-gray-600">UMKM Tersertifikasi</p>
                <div class="mt-4 h-1 w-20 bg-primary rounded"></div>
            </div>
        </div>
    </div>
</section>

<!-- Mitra Kami -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-center mb-12" data-aos="fade-up">Mitra Kami</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <img src="https://picsum.photos/200/100" alt="Partner 1" class="w-full h-24 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <img src="https://picsum.photos/201/100" alt="Partner 2" class="w-full h-24 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                <img src="https://picsum.photos/202/100" alt="Partner 3" class="w-full h-24 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                <img src="https://picsum.photos/203/100" alt="Partner 4" class="w-full h-24 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Program -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-8" data-aos="fade-up">Program Mendatang</h2>
        <div class="space-y-4">
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="flex gap-6">
                    <div class="text-center bg-blue-50 px-4 py-2 rounded-lg">
                        <div class="text-2xl font-bold text-primary">15</div>
                        <div class="text-sm text-primary">JAN</div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Pelatihan JULEHA Batch 12</h3>
                        <p class="text-gray-600">Program pelatihan juru sembelih halal profesional</p>
                        <div class="mt-2 flex gap-2">
                            <span class="px-2 py-1 bg-blue-100 text-primary text-sm rounded">Online</span>
                            <span class="px-2 py-1 bg-blue-100 text-blue-600 text-sm rounded">3 Hari</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="flex gap-6">
                    <div class="text-center bg-blue-50 px-4 py-2 rounded-lg">
                        <div class="text-2xl font-bold text-primary">22</div>
                        <div class="text-sm text-primary">JAN</div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Workshop Sertifikasi Halal</h3>
                        <p class="text-gray-600">Khusus UMKM Kuliner Bandung Raya</p>
                        <div class="mt-2 flex gap-2">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-600 text-sm rounded">Offline</span>
                            <span class="px-2 py-1 bg-blue-100 text-blue-600 text-sm rounded">1 Hari</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Button Konsultasi -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up">
            <h2 class="text-2xl font-bold mb-6">Konsultasi Sertifikasi Halal</h2>
            <div x-data="{ category: 'umkm' }" class="space-y-6">
                <div class="flex p-1 bg-gray-100 rounded-lg">
                    <button @click="category = 'umkm'" 
                            :class="category === 'umkm' ? 'bg-white shadow-md' : 'hover:bg-gray-50'"
                            class="flex-1 py-2 rounded-lg transition-all duration-300">
                        UMKM
                    </button>
                    <button @click="category = 'industri'"
                            :class="category === 'industri' ? 'bg-white shadow-md' : 'hover:bg-gray-50'"
                            class="flex-1 py-2 rounded-lg transition-all duration-300">
                        Industri
                    </button>
                </div>
                <div x-show.transition.opacity="category === 'umkm'">
                    <p class="text-gray-600 mb-4">Konsultasi khusus UMKM dengan pendampingan lengkap</p>
                    <button class="w-full bg-primary text-white py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                        Daftar Sekarang
                    </button>
                </div>
                <div x-show.transition.opacity="category === 'industri'">
                    <p class="text-gray-600 mb-4">Layanan konsultasi untuk industri skala besar</p>
                    <button class="w-full bg-primary text-white py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                        Hubungi Kami
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
