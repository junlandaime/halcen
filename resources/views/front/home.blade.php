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
    <section class="relative h-[600px] overflow-hidden pt-16" x-data="{ scroll: 0 }"
        @scroll.window="scroll = window.pageYOffset">
        <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
            @if ($landingPage->hero_image)
                <img src="{{ Storage::url($landingPage->hero_image) }}" alt="Hero Image" class="w-full h-[800px] object-cover">
            @endif
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
            <div class="max-w-6xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <h1 class="text-5xl font-bold mb-6">{{ $landingPage->hero_title }}</h1>
                    <p class="text-2xl mb-8 text-gray-200">{{ $landingPage->hero_subtitle }}</p>
                    <a href="{{ route('front.kontak') }}"><button
                            class="bg-white text-primary px-8 py-3 rounded-full hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                            Mulai Sekarang
                        </button></a>
                </div>
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
                                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
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
                            :class="{ 'bg-primary': currentIndex === index, 'bg-gray-300': currentIndex !== index }"
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
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8" data-aos="fade-up">Program Mendatang</h2>
            <div class="space-y-4">
                @forelse($upcomingPrograms as $program)
                    @foreach ($program->batches as $batch)
                        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all duration-300"
                            data-aos="fade-up" data-aos-delay="100">
                            <div class="flex gap-6">
                                <div class="text-center bg-blue-50 px-4 py-2 rounded-lg">
                                    <div class="text-2xl font-bold text-primary">
                                        {{ $batch->tanggal_mulai_program->format('d') }}</div>
                                    <div class="text-sm text-primary">{{ $batch->tanggal_mulai_program->format('M') }}
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-semibold text-lg">{{ $program->nama_program }}</h3>
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
                                            <span
                                                class="px-2 py-1 {{ $program->tipe_kelas === 'online' ? 'bg-blue-100 text-blue-600' : ($program->tipe_kelas === 'offline' ? 'bg-yellow-100 text-yellow-600' : 'bg-purple-100 text-purple-600') }} text-sm rounded">
                                                {{ ucfirst($program->tipe_kelas) }}
                                            </span>
                                            <span
                                                class="px-2 py-1 bg-blue-100 text-blue-600 text-sm rounded">{{ $program->durasi }}</span>
                                            @if ($batch->isOpenForRegistration())
                                                <span class="px-2 py-1 bg-red-100 text-red-600 text-sm rounded">
                                                    Sisa
                                                    {{ $batch->tanggal_selesai_pendaftaran->diffForHumans(null, true) }}
                                                </span>
                                            @endif
                                        </div>
                                        @if ($batch->isOpenForRegistration())
                                            <div class="">

                                                <a href="{{ route('program-layanan.show', $program) }}"
                                                    class="inline-block px-3 py-1 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors">
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
                    <div class="text-center text-gray-500 py-8">
                        Tidak ada program yang akan datang dalam waktu dekat
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
                                class="w-full bg-primary text-white py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                                Konsultasi Sekarang
                            </button></a>
                    </div>
                    <div x-show.transition.opacity="category === 'industri'">
                        <p class="text-gray-600 mb-4">Konsultasi khusus Pelaku Usaha omzet lebih dari 500 juta rupiah</p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $landingPage->contact_whatsapp) }}"
                            target="_blank"><button
                                class="w-full bg-primary text-white py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                                Konsultasi Sekarang
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @section('content')
    <!-- Hero Section -->
    <section class="relative bg-green-50 py-32">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6" data-aos="fade-up">
                    {{ $landingPage->hero_title }}
                </h1>
                <p class="text-xl text-gray-600 mb-8" data-aos="fade-up" data-aos-delay="100">
                    {{ $landingPage->hero_subtitle }}
                </p>
                @if ($landingPage->hero_image)
                    <img src="{{ Storage::url($landingPage->hero_image) }}" alt="Hero Image"
                        class="mx-auto rounded-lg shadow-lg">
                @endif
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="relative z-10 -mt-20 pb-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl font-bold text-green-600 mb-2">{{ $landingPage->stats_clients }}+</div>
                    <div class="text-gray-600">Klien Terpuaskan</div>
                </div>
                <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl font-bold text-green-600 mb-2">{{ $landingPage->stats_projects }}+</div>
                    <div class="text-gray-600">Proyek Selesai</div>
                </div>
                <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl font-bold text-green-600 mb-2">{{ $landingPage->stats_partners }}+</div>
                    <div class="text-gray-600">Mitra Kerjasama</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white" id="about">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6" data-aos="fade-up">{{ $landingPage->about_title }}</h2>
                    <div class="prose prose-lg" data-aos="fade-up" data-aos-delay="100">
                        {!! $landingPage->about_content !!}
                    </div>
                </div>
                <div class="space-y-8">
                    <div class="bg-green-50 p-6 rounded-lg" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-xl font-bold mb-4">{{ $landingPage->vision_title }}</h3>
                        <p class="text-gray-600">{{ $landingPage->vision_content }}</p>
                    </div>
                    <div class="bg-green-50 p-6 rounded-lg" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-xl font-bold mb-4">{{ $landingPage->mission_title }}</h3>
                        <p class="text-gray-600">{{ $landingPage->mission_content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="py-16 bg-gray-50" id="partners">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Mitra Kami</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($partners as $partner)
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration * 100 }}">
                        <a href="{{ $partner->website }}" target="_blank" class="block">
                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                                class="mx-auto h-20 object-contain">
                            <h3 class="text-center mt-4 font-semibold">{{ $partner->name }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" data-aos="fade-up">Testimoni</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($testimonials as $testimonial)
                    <div class="bg-white p-6 rounded-lg shadow-lg" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="flex items-center mb-4">
                            @if ($testimonial->image)
                                <img src="{{ Storage::url($testimonial->image) }}" alt="{{ $testimonial->name }}"
                                    class="w-12 h-12 rounded-full">
                            @endif
                            <div class="ml-4">
                                <h3 class="font-semibold">{{ $testimonial->name }}</h3>
                                <p class="text-sm text-gray-600">{{ $testimonial->position }} -
                                    {{ $testimonial->company }}</p>
                            </div>
                        </div>
                        <p class="text-gray-600">{{ $testimonial->content }}</p>
                        <div class="flex mt-4">
                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-gray-50" id="contact">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold mb-8" data-aos="fade-up">Hubungi Kami</h2>
                    <div class="space-y-6">
                        @if ($landingPage->contact_address)
                            <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="100">
                                <svg class="w-6 h-6 text-green-600 mt-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-2">Alamat</h3>
                                    <p class="text-gray-600">{{ $landingPage->contact_address }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($landingPage->contact_email)
                            <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="200">
                                <svg class="w-6 h-6 text-green-600 mt-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-2">Email</h3>
                                    <a href="mailto:{{ $landingPage->contact_email }}"
                                        class="text-green-600 hover:text-green-700">
                                        {{ $landingPage->contact_email }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if ($landingPage->contact_phone)
                            <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="300">
                                <svg class="w-6 h-6 text-green-600 mt-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-2">Telepon</h3>
                                    <a href="tel:{{ $landingPage->contact_phone }}"
                                        class="text-green-600 hover:text-green-700">
                                        {{ $landingPage->contact_phone }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if ($landingPage->contact_whatsapp)
                            <div class="flex items-start gap-4" data-aos="fade-up" data-aos-delay="400">
                                <svg class="w-6 h-6 text-green-600 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-2">WhatsApp</h3>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $landingPage->contact_whatsapp) }}"
                                        target="_blank" class="text-green-600 hover:text-green-700">
                                        {{ $landingPage->contact_whatsapp }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8" data-aos="fade-up" data-aos-delay="500">
                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                            <textarea name="message" id="message" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection --}}
