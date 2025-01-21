@extends('layouts.front')

@section('title')
    <title>Video Pembelajaran - Halal Center Masjid Salman ITB</title>
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
    <!-- Page Header -->
    <section class="relative h-[300px] overflow-hidden pt-16" x-data="{ scroll: 0 }"
        @scroll.window="scroll = window.pageYOffset">
        <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
            <img src="https://picsum.photos/1920/800" alt="Video Pembelajaran Banner" class="w-full h-[500px] object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
            <div class="max-w-6xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <h1 class="text-5xl font-bold mb-6">Video Pembelajaran</h1>
                    <p class="text-2xl mb-8 text-gray-200">Materi Edukatif Seputar Halal</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Categories -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Video Category Tabs -->
            <div x-data="{ activeTab: '{{ $activeCategory }}' }" class="mb-12">
                <div class="flex flex-wrap gap-4 justify-center mb-8" data-aos="fade-up">
                    @foreach ($categories as $category)
                        <button @click="activeTab = '{{ $category->slug }}'"
                            :class="{ 'bg-primary text-white': activeTab === '{{ $category->slug }}', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeTab !== '{{ $category->slug }}' }"
                            class="px-6 py-2 rounded-full transition-colors">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                @foreach ($categories as $category)
                    <div x-show="activeTab === '{{ $category->slug }}'" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach ($videos->where('video_category_id', $category->id) as $video)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up"
                                data-aos-delay="{{ $loop->iteration * 100 }}">
                                <div class="aspect-video bg-gray-100">
                                    <iframe class="w-full h-full" src="{{ $video->youtube_url }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                <div class="p-6">
                                    <h3 class="font-bold text-lg mb-2">{{ $video->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-4">{{ $video->description }}</p>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $video->duration_for_humans }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
