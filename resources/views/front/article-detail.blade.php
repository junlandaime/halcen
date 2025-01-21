@extends('layouts.front')

@section('title')
    <title>{{ $article->title }} - Halal Center Masjid Salman ITB</title>
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

@section('meta_description')
    {{ Str::limit($article->excerpt, 160) }}
@endsection

@section('og_title', $article->title . ' - Pusat Halal Salman')

@section('og_description')
    {{ Str::limit($article->excerpt, 200) }}
@endsection

@section('og_image', 'https://pusathalal.salmanitb.com/storage/' . $article->featured_image)

@section('additional_meta_tags')

@endsection

@push('css')
    <style>
        /* Article Section */
        .article {
            padding: 4rem 0;
        }

        .article .container {
            max-width: 56rem;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .article p.lead {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .article h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 3rem 0 1.5rem;
            color: black;
        }

        .article p {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .article .list {
            margin: 1rem 0;
        }

        .article .list div {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .article .list span {
            color: #16A34A;
        }

        .article .highlight {
            background-color: #F9FAFB;
            border-radius: 0.75rem;
            padding: 2rem;
            margin: 3rem 0;
        }

        .article .highlight h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: black;
        }

        .article blockquote {
            border-left: 4px solid #16A34A;
            padding-left: 1.5rem;
            margin: 3rem 0;
        }

        .article blockquote p {
            font-size: 1.25rem;
            font-style: italic;
            margin-bottom: 0.5rem;
        }

        .article blockquote cite {
            font-size: 0.875rem;
            color: #6B7280;
            font-style: normal;
        }
    </style>
@endpush

@section('content')

    <!-- Article Header -->
    <section class="relative h-[500px] overflow-hidden pt-16" x-data="{ scroll: 0 }"
        @scroll.window="scroll = window.pageYOffset">
        <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
            @if ($article->featured_image)
                <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                    class="w-full h-[700px] object-cover">
            @else
                <img src="https://picsum.photos/1920/1080" alt="{{ $article->title }}" class="w-full h-[700px] object-cover">
            @endif
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
            <div class="max-w-4xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <span
                        class="inline-block px-3 py-1 bg-white/20 text-white rounded-full text-sm mb-6">{{ $article->category->name }}</span>
                    <h1 class="text-5xl font-bold mb-6">{{ $article->title }}</h1>
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($article->author->name) }}"
                                alt="{{ $article->author->name }}" class="w-8 h-8 rounded-full">
                            <span>{{ $article->author->name }}</span>
                        </div>
                        <span>{{ $article->published_at->format('d F Y') }}</span>
                        <span>{{ ceil(str_word_count(strip_tags($article->content)) / 200) }} menit membaca</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-16 article">
        <div class="max-w-4xl mx-auto px-4">
            <article class="prose prose-lg max-w-none" data-aos="fade-up">
                {!! $article->content !!}
            </article>

            <!-- Share Buttons -->
            <div class="flex items-center gap-4 mt-12 pt-8 border-t" data-aos="fade-up">
                <span class="text-gray-600">Bagikan:</span>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}"
                    target="_blank"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z">
                        </path>
                    </svg>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z">
                        </path>
                    </svg>
                </a>
                <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}" target="_blank"
                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z">
                        </path>
                    </svg>
                </a>
            </div>

            <!-- Related Articles -->
            @if ($relatedArticles->count() > 0)
                <div class="mt-16">
                    <h3 class="text-2xl font-bold mb-8">Artikel Terkait</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach ($relatedArticles->take(2) as $relatedArticle)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up"
                                data-aos-delay="{{ $loop->index * 100 + 100 }}">
                                @if ($relatedArticle->featured_image)
                                    <img src="{{ Storage::url($relatedArticle->featured_image) }}"
                                        alt="{{ $relatedArticle->title }}" class="w-full h-48 object-cover">
                                @else
                                    <img src="https://picsum.photos/400/300" alt="{{ $relatedArticle->title }}"
                                        class="w-full h-48 object-cover">
                                @endif
                                <div class="p-6">
                                    <span
                                        class="inline-block px-3 py-1 bg-blue-100 text-primary rounded-full text-sm mb-4">{{ $relatedArticle->category->name }}</span>
                                    <h3 class="font-bold text-xl mb-2">{{ $relatedArticle->title }}</h3>
                                    <a href="{{ route('articles.show', $relatedArticle->slug) }}"
                                        class="text-primary hover:text-blue-700">Baca selengkapnya →</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .prose img {
            @apply rounded-xl shadow-lg my-8;
        }

        .prose h2 {
            @apply text-2xl font-bold mt-12 mb-6;
        }

        .prose h3 {
            @apply text-xl font-bold mt-8 mb-4;
        }

        .prose p {
            @apply text-gray-600 mb-6;
        }

        .prose ul {
            @apply space-y-4 text-gray-600 mb-8 list-none;
        }

        .prose ul li {
            @apply flex items-start gap-3;
        }

        .prose ul li:before {
            content: "•";
            @apply text-primary mt-1;
        }

        .prose blockquote {
            @apply border-l-4 border-primary pl-6 my-12;
        }

        .prose blockquote p {
            @apply text-xl text-gray-600 italic;
        }
    </style>
@endpush
