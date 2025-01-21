@extends('layouts.front')

@section('title')
    <title>Artikel dan Publikasi - Halal Center Masjid Salman ITB</title>
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
            <img src="https://picsum.photos/1920/800" alt="Artikel Banner" class="w-full h-[500px] object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
            <div class="max-w-6xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <h1 class="text-5xl font-bold mb-6">Artikel & Berita</h1>
                    <p class="text-2xl mb-8 text-gray-200">Temukan informasi terkini seputar sertifikasi halal dan
                        perkembangan industri halal di Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap gap-4 justify-between items-center">
                <!-- Filter Buttons -->
                <div class="flex flex-wrap gap-4" data-aos="fade-right">
                    <a href="{{ route('articles.index') }}"
                        class="px-6 py-2 rounded-full {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        Semua
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('articles.index', ['category' => $category->slug]) }}"
                            class="px-6 py-2 rounded-full {{ request('category') == $category->slug ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
                <!-- Search Box -->
                <form action="{{ route('articles.index') }}" method="GET" class="relative" data-aos="fade-left">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}"
                        class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Articles -->
    @if ($featuredArticles->count() > 0)
        <section class="py-12">
            <div class="max-w-6xl mx-auto px-4">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        @foreach ($featuredArticles as $article)
                            <div class="h-64 md:h-auto">
                                <img src="{{ Storage::url($article->featured_image) }}" alt="Featured Artikel"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="p-8">
                                <span
                                    class="inline-block px-3 py-1 bg-blue-100 text-primary rounded-full text-sm mb-4">{{ $article->category->name }}</span>
                                <h2 class="text-2xl font-bold mb-4">{{ $article->title }}</h2>
                                <p class="text-gray-600 mb-6">{{ Str::limit($article->excerpt, 100) }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span
                                            class="text-sm text-gray-600">{{ $article->published_at->format('d M Y') }}</span>
                                    </div>
                                    <span class="text-sm text-gray-500">{{ $article->author->name }}</span>
                                </div>
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="inline-block mt-6 text-primary hover:text-blue-700">
                                    Lihat Artikel →
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Artikel Grid -->
    <section class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($articles as $article)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ Storage::url($article->featured_image) }}" alt="Artikel"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <span
                                class="inline-block px-3 py-1 bg-blue-100 text-primary rounded-full text-sm mb-4">{{ $article->category->name }}</span>
                            <h3 class="font-bold text-xl mb-2">{{ $article->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($article->excerpt, 100) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-500">{{ $article->published_at->format('d M Y') }}</span>
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="text-primary hover:text-blue-700">Lihat →</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            Tidak ada artikel yang ditemukan.
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12" data-aos="fade-up">
                {{ $articles->links() }}
            </div>
        </div>
    </section>
@endsection
