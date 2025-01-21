@extends('layouts.front')

@section('title')
    <title>{{ $about->meta_title ?? $about->title }} - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }"
        @scroll.window="scroll = window.pageYOffset">
        <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
            <img src="{{ Storage::url($about->hero_image) }}" alt="{{ $about->title }}" class="w-full h-[600px] object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
            <div class="max-w-6xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <h1 class="text-5xl font-bold mb-6">{{ $about->hero_title }}</h1>
                    <p class="text-2xl mb-8 text-gray-200">{{ $about->hero_subtitle }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <img src="{{ Storage::url($about->hero_image) }}" alt="{{ $about->title }}"
                        class="w-full rounded-xl shadow-lg">
                </div>
                <div class="space-y-6" data-aos="fade-left">
                    <h2 class="text-3xl font-bold text-primary">Tentang Kami</h2>
                    <p class="text-gray-600">{{ $about->description }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-primary mb-4">Visi & Misi</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">{{ $about->description }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Visi</h3>
                    <p class="text-gray-600">{{ $about->vision }}</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Misi</h3>
                    <ul class="space-y-3 text-gray-600">
                        @foreach ($about->mission as $mission)
                            <li class="flex items-start gap-3">
                                <span class="text-primary mt-1">•</span>
                                <p>{{ $mission }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    @if ($about->programs->isNotEmpty())
        <section class="py-16">
            <div class="max-w-6xl mx-auto px-4">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-primary mb-4">Program Unggulan</h2>
                    <p class="text-gray-600 max-w-3xl mx-auto">Program-program inovatif untuk mendukung pengembangan
                        ekosistem halal</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($about->programs as $program)
                        <div class="bg-white p-6 rounded-xl shadow-lg" data-aos="fade-up"
                            data-aos-delay="{{ $loop->index * 100 }}">
                            @if ($program->icon)
                                <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                                    <img src="{{ Storage::url($program->icon) }}" alt="{{ $program->title }}"
                                        class="w-6 h-6">
                                </div>
                            @endif
                            <h3 class="text-xl font-bold mb-2">{{ $program->title }}</h3>
                            <p class="text-gray-600">{{ $program->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Team Section -->
    @if ($about->teams->isNotEmpty())
        <section class="py-16 bg-gray-50">
            <div class="max-w-6xl mx-auto px-4">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-primary mb-4">Tim Kami</h2>
                    <p class="text-gray-600 max-w-3xl mx-auto">Para profesional berpengalaman yang mendedikasikan diri untuk
                        pengembangan ekosistem halal</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    @foreach ($about->teams as $team)
                        <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            @if ($team->image)
                                <img src="{{ Storage::url($team->image) }}" alt="{{ $team->name }}"
                                    class="w-32 h-32 rounded-full mx-auto mb-4">
                            @else
                                <div
                                    class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <span class="text-4xl text-gray-400">{{ substr($team->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <h3 class="font-bold mb-1">{{ $team->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $team->position }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
