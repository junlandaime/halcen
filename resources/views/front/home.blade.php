@extends('layouts.front')

@section('title')
    <title>Halal Center - Masjid Salman ITB</title>
@endsection

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZBD9MEK0DY"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-ZBD9MEK0DY');
</script>

@section('content')
    <!-- Web Banner -->
    <section class="relative min-h-[90vh] pt-16 overflow-hidden" x-data="{ scroll: 0 }"
        @scroll.window="scroll = window.pageYOffset">
        {{-- Background Image --}}
        @if ($landingPage->hero_image)
            <img src="{{ asset('storage/' . $landingPage->hero_image) }}" alt="Hero Image"
                class="absolute inset-0 w-full h-full object-cover object-bottom"
                :style="`transform: translateY(${scroll * 0.3}px)`">
        @endif

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-400/70"></div>

        {{-- Content --}}
        <div class="relative z-10 max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white max-w-2xl" data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    {{ $landingPage->hero_title }}
                </h1>

                <p class="text-lg md:text-2xl mb-8 text-gray-200">
                    {{ $landingPage->hero_subtitle }}
                </p>

                <a href="{{ route('front.kontak') }}">
                    <button
                        class="bg-white text-blue-700 px-8 py-3 rounded-full
                           hover:bg-blue-50 transition-all duration-300
                           transform hover:scale-105">
                        Mulai Sekarang
                    </button>
                </a>
            </div>
        </div>
    </section>


    <!-- Rekap Penerima Manfaat -->
    <section class="relative z-10 -mt-20 pb-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl font-bold text-primary mb-2" x-data="{ count: 0 }" x-init="setInterval(() => { if (count < {{ $landingPage->stats_clients }}) count++ }, 1)">
                        <span x-text="count">0</span>+
                    </div>
                    <p class="text-gray-600">Lulusan Kuliah Halal</p>
                    <div class="mt-4 h-1 w-20 bg-primary rounded"></div>
                </div>
                <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-bold text-primary mb-2" x-data="{ count: 0 }" x-init="setInterval(() => { if (count < {{ $landingPage->stats_projects }}) count++ }, 1)">
                        <span x-text="count">0</span>+
                    </div>
                    <p class="text-gray-600">Peserta JULEHA</p>
                    <div class="mt-4 h-1 w-20 bg-primary rounded"></div>
                </div>
                <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl font-bold text-primary mb-2" x-data="{ count: 5500 }" x-init="setInterval(() => { if (count < {{ $landingPage->stats_partners }}) count++ }, 0.1)">
                        <span x-text="count">0</span>+
                    </div>
                    <p class="text-gray-600">UMKM Tersertifikasi</p>
                    <div class="mt-4 h-1 w-20 bg-primary rounded"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-12" data-aos="fade-up">Mitra Kami</h2>
            <div x-data="{
                partners: [],
                currentIndex: 0,
                totalSlides: 0,
                itemsPerSlide: 4,
            
                init() {
                    this.partners = Array.from(document.querySelectorAll('#partner-slider > div'));
                    this.totalSlides = Math.ceil(this.partners.length / this.itemsPerSlide);
            
                    // Handle responsive itemsPerSlide
                    window.addEventListener('resize', () => {
                        if (window.innerWidth < 768) {
                            this.itemsPerSlide = 1;
                        } else if (window.innerWidth < 1024) {
                            this.itemsPerSlide = 2;
                        } else {
                            this.itemsPerSlide = 4;
                        }
                        this.totalSlides = Math.ceil(this.partners.length / this.itemsPerSlide);
                        this.currentIndex = Math.min(this.currentIndex, this.totalSlides - 1);
                    });
                },
            
                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.totalSlides;
                },
            
                prev() {
                    this.currentIndex = (this.currentIndex - 1 + this.totalSlides) % this.totalSlides;
                },
            
                autoplay: null,
            
                startAutoplay() {
                    this.autoplay = setInterval(() => {
                        this.next();
                    }, 3000);
                },
            
                stopAutoplay() {
                    if (this.autoplay) clearInterval(this.autoplay);
                }
            }" x-init="init();
            startAutoplay()" @mouseover="stopAutoplay()" @mouseleave="startAutoplay()"
                class="relative">
                <!-- Previous Button -->
                <button @click="prev"
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-white rounded-full p-2 shadow-lg z-10 hover:bg-gray-50">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Next Button -->
                <button @click="next"
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-white rounded-full p-2 shadow-lg z-10 hover:bg-gray-50">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Slides Container -->
                <div class="overflow-hidden">
                    <div id="partner-slider" class="flex transition-transform duration-500 ease-in-out"
                        :style="`transform: translateX(-${currentIndex * 100}%)`">
                        @foreach ($partners as $partner)
                            <div class="w-full md:w-1/2 lg:w-1/4 flex-shrink-0 px-4">
                                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300"
                                    data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                                    <a href="{{ $partner->website }}" target="_blank" class="block">
                                        <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}"
                                            class="w-full h-24 object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Dots Navigation -->
                <div class="flex justify-center mt-6 space-x-2">
                    <template x-for="(dot, index) in totalSlides" :key="index">
                        <button @click="currentIndex = index"
                            :class="{ 'bg-blue-500': currentIndex === index, 'bg-gray-300': currentIndex !== index }"
                            class="w-3 h-3 rounded-full transition-colors duration-300">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    @php
        $upcomingPrograms = App\Models\ProgramLayanan::with([
            'batches' => function ($query) {
                $query
                    ->where('status', 'aktif')
                    ->where(function ($q) {
                        $q->where('tanggal_mulai_pendaftaran', '<=', now()->addMonths(2))->where(
                            'tanggal_selesai_pendaftaran',
                            '>=',
                            now(),
                        );
                    })
                    ->orderBy('tanggal_mulai_pendaftaran');
            },
        ])
            ->where('status', 'aktif')
            ->whereHas('batches', function ($query) {
                $query->where('status', 'aktif')->where('tanggal_selesai_pendaftaran', '>=', now());
            })
            ->get();
    @endphp

    <!-- Upcoming Program -->
    <section class="py-16" x-data="{
        selectedCategory: 'all',
        categories: {
            1: 'Kuliah Halal',
            2: 'Juleha Kurban',
            3: 'Juleha Unggas',
            4: 'P3H',
            5: 'Sertifikasi'
        }
    }">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8" data-aos="fade-up">Program Mendatang</h2>

            <!-- Filter Menu -->
            <div class="flex flex-wrap gap-2 mb-6 border-b-2 border-gray-200" data-aos="fade-up">
                <template x-for="(category, id) in { all: 'Semua', ...categories }" :key="id">
                    <button @click="selectedCategory = id"
                        class="relative px-4 py-2 text-sm font-medium transition-all duration-300"
                        :class="selectedCategory === id ?
                            'text-primary border-b-4 border-primary font-semibold' :
                            'text-gray-500 hover:text-primary hover:border-primary/50 border-b-4 border-transparent'">
                        <span x-text="category"></span>
                    </button>
                </template>
            </div>

            <!-- Program List -->
            <div class="space-y-8">
                <!-- Loop through all programs -->
                @forelse ($upcomingPrograms as $program)
                    @foreach ($program->batches as $batch)
                        <div x-show="selectedCategory === 'all' || selectedCategory == {{ $batch->program_layanan_id }}"
                            class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300">
                            <div class="flex gap-6">
                                <div class="text-center bg-blue-50 px-4 py-2 rounded-lg">
                                    <div class="text-2xl font-bold text-primary">
                                        {{ $batch->tanggal_mulai_program->format('d') }}
                                    </div>
                                    <div class="text-sm text-primary">{{ $batch->tanggal_mulai_program->format('M') }}
                                    </div>
                                </div>

                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-semibold text-lg">{{ $program->nama_program }}</h4>
                                            <p class="text-gray-600">Batch {{ $batch->batch_ke }} -
                                                {{ $batch->nama_batch }}</p>
                                        </div>
                                        @if ($batch->isOpenForRegistration())
                                            <span class="px-3 py-1 bg-green-100 text-green-600 text-sm rounded-full">
                                                Pendaftaran Dibuka
                                            </span>
                                        @else
                                            <span class="px-3 py-1 bg-blue-100 text-blue-600 text-sm rounded-full">
                                                Upcoming
                                            </span>
                                        @endif
                                    </div>

                                    <div class="mt-2 flex gap-2 justify-between items-start">
                                        <div>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-600 text-sm rounded">
                                                {{ $program->durasi ?? '-' }}
                                            </span>
                                            @if ($batch->isOpenForRegistration())
                                                <span class="px-2 py-1 bg-red-100 text-red-600 text-sm rounded">
                                                    Sisa
                                                    {{ $batch->tanggal_selesai_pendaftaran->diffForHumans(null, true) }}
                                                </span>
                                            @endif
                                        </div>
                                        @if ($batch->isOpenForRegistration() && $batch->external_link)
                                            <div class="">
                                                <a href="{{ $batch->external_link }}"
                                                    class="inline-block px-3 py-1 bg-blue-300 text-black rounded-lg hover:bg-primary-dark transition-colors">
                                                    Daftar Sekarang
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @empty
                    <div class="text-gray-500">
                        Belum ada program.
                    </div>
                @endforelse
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
                            Pelaku Usaha Mikro dan Ultra Mikro
                        </button>
                        <button @click="category = 'industri'"
                            :class="category === 'industri' ? 'bg-white shadow-md' : 'hover:bg-gray-50'"
                            class="flex-1 py-2 rounded-lg transition-all duration-300">
                            Pelaku Usaha Skala Menengah dan Besar
                        </button>
                    </div>
                    <div x-show.transition.opacity="category === 'umkm'">
                        <p class="text-gray-600 mb-4">Konsultasi khusus Pelaku Usaha omzet kurang dari 500 juta rupiah
                        </p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $landingPage->contact_whatsapp) }}"
                            target="_blank"><button
                                class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-102 cursor-pointer">
                                Konsultasi Sekarang
                            </button></a>
                    </div>
                    <div x-show.transition.opacity="category === 'industri'">
                        <p class="text-gray-600 mb-4">Konsultasi khusus Pelaku Usaha omzet lebih dari 500 juta rupiah</p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $landingPage->contact_whatsapp) }}"
                            target="_blank"><button
                                class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-102 cursor-pointer">
                                Konsultasi Sekarang
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
