@extends('layouts.front')

@section('title')
    <title>Regulasi Kehalalan - Halal Center Masjid Salman ITB</title>
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
{{-- @dd($regulations) --}}
@section('content')
    <!-- Page Header -->
    <section class="relative h-[300px] overflow-hidden pt-16" x-data="{ scroll: 0 }"
        @scroll.window="scroll = window.pageYOffset">
        <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
            {{-- <img src="https://picsum.photos/1920/800" alt="Regulasi Banner" class="w-full h-[500px] object-cover"> --}}
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
            <div class="max-w-6xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <h1 class="text-5xl font-bold mb-6">Regulasi Halal</h1>
                    <p class="text-2xl mb-8 text-gray-200">Kumpulan Regulasi dan Kebijakan Halal</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Search and Filter -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <form action="{{ route('regulations.index') }}" method="GET"
                class="flex flex-wrap gap-4 justify-between items-center">
                <div class="flex flex-wrap gap-4" data-aos="fade-right">
                    <a href="{{ route('regulations.index') }}"
                        class="px-6 py-2 rounded-full {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        Semua
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('regulations.index', ['category' => $category->code]) }}"
                            class="px-6 py-2 rounded-full {{ request('category') == $category->code ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            {{ $category->code }}
                        </a>
                    @endforeach
                </div>
                <div class="relative" data-aos="fade-left">
                    <input type="text" name="search" placeholder="Cari regulasi..." value="{{ request('search') }}"
                        class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </form>
        </div>
    </section>

    <!-- Regulations List -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="space-y-8">
                @forelse($regulations as $regulation)
                    <div data-aos="fade-up" class="bg-white rounded-xl shadow-lg p-6">
                        <div class="flex items-start gap-6">
                            <div class="bg-blue-100 p-4 rounded-lg">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl mb-2">{{ $regulation->category->code ?? '' }} No.
                                    {{ $regulation->number ?? '' }} Tahun {{ $regulation->year ?? '' }}</h3>
                                <p class="text-gray-600 mb-4">{{ $regulation->title }}</p>
                                <div class="flex items-center gap-6">
                                    <span class="text-sm text-gray-500">Diundangkan:
                                        {{ $regulation->enacted_date->format('d F Y') }}</span>
                                    @if ($regulation->external_link)
                                        <a href="{{ $regulation->external_link }}" target="_blank"
                                            class="text-primary hover:text-blue-700">
                                            Lihat di Website BPJPH →
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-gray-500">Tidak ada regulasi yang ditemukan.</p>
                    </div>
                @endforelse

                <div class="mt-8">
                    {{ $regulations->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
