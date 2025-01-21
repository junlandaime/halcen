@extends('layouts.front')

@section('title')
    <title>Tentang Kami - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[300px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
        <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
            <img src="https://picsum.photos/1920/800" alt="About Banner" class="w-full h-[500px] object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
            <div class="max-w-6xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <h1 class="text-5xl font-bold mb-6">Tentang Kami</h1>
                    <p class="text-2xl mb-8 text-gray-200">Mengenal Lebih Dekat Halal Center Masjid Salman ITB</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Cards -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($abouts as $about)
                <a href="{{ route('abouts.show', $about->slug) }}" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 group-hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        @if($about->hero_image)
                        <img src="{{ Storage::url($about->hero_image) }}" alt="{{ $about->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-primary mb-4 group-hover:text-primary-dark transition-colors duration-300">{{ $about->title }}</h2>
                            <p class="text-gray-600 mb-4">{{ Str::limit($about->description, 150) }}</p>
                            <div class="flex items-center text-primary group-hover:text-primary-dark transition-colors duration-300">
                                <span>Baca Selengkapnya</span>
                                <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
