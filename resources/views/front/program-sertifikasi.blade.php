@extends('layouts.front')
{{-- @dd($programLayanan) --}}
@section('title')
    <title>{{ $programLayanan->nama_program }} - Halal Center</title>
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
    {{ Str::limit($programLayanan->deskripsi, 160) }}
@endsection

@section('og_title', $programLayanan->nama_banner . ' - Pusat Halal Salman')

@section('og_description')
    {{ Str::limit($programLayanan->deskripsi, 200) }}
@endsection

@section('og_image', 'https://pusathalal.salmanitb.com/storage/' . $programLayanan->gambar_banner)

@section('additional_meta_tags')

@endsection


@push('css')
    <style>
        p {
            text-align: justify;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary to-primary-dark text-white py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-8 items-center h-[300px]">
                <div class="flex-1">
                    <h1 class="text-4xl font-bold mb-4">{{ $programLayanan->nama_banner }}</h1>
                    <p class="text-lg opacity-90">{{ $programLayanan->deskripsi }}</p>

                </div>
                {{-- @dd($programLayanan->gambar_banner) --}}
                @if ($programLayanan->gambar_banner)
                    <div class="md:w-1/3">
                        <img src="{{ Storage::url($programLayanan->gambar_banner) }}"
                            alt="{{ $programLayanan->nama_program }}" class="rounded-lg shadow-lg">
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Program Details -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="md:col-span-2 space-y-8">
                    <!-- Program Info -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">Apa itu {{ $programLayanan->nama_banner }}</h2>


                        <div>
                            <p class="font-semibold text-wrap">{!! $programLayanan->deskripsi_lengkap !!}</p>
                        </div>

                    </div>

                    <!-- Program Info -->
                    {{-- <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">Informasi Program</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <span class="text-gray-600">Tipe Kelas</span>
                                <p class="font-semibold">{{ ucfirst($programLayanan->tipe_kelas) }}</p>
                            </div>
                            <div>
                                <span class="text-gray-600">Durasi Program</span>
                                <p class="font-semibold">{{ $programLayanan->durasi }}</p>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Materi -->
                    {{-- <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">Apa saja yang dipelajari di {{ $programLayanan->nama_banner }}
                        </h2>
                        <ul class="space-y-2">
                            @foreach ($programLayanan->materi as $materi)
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-check-circle text-primary mt-1"></i>
                                    <span>{{ $materi }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}

                    <!-- Alur Proses -->
                    @if (count($programLayanan['alur_proses']) > 0)
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h2 class="text-2xl font-bold mb-4">Apa saja ciri utama {{ $programLayanan->nama_banner }}</h2>
                            <div class="space-y-4">
                                @foreach ($programLayanan->alur_proses as $index => $alur)
                                    <div class="flex items-start gap-4">
                                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <div>
                                            <p>{{ $alur }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Manfaat -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">
                            {{ $programLayanan->slug == 'layanan-sertifikasi-halal' ? 'Apa saja manfaat dari produk yang sudah bersertifikat halal?' : 'Manfaat apa saja yang didapatkan dari ' . $programLayanan->nama_banner }}
                        </h2>
                        <ul class="space-y-2">
                            @foreach ($programLayanan->manfaat as $manfaat)
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>{{ $manfaat }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Persyaratan -->
                    @if (count($programLayanan['persyaratan']) > 0)
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h2 class="text-2xl font-bold mb-4">Syarat apa saja yang harus dipenuhi untuk mengurus
                                {{ $programLayanan->nama_banner }} </h2>
                            <ul class="space-y-2">
                                @foreach ($programLayanan->persyaratan as $syarat)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>{{ $syarat }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                </div>

                <!-- Sidebar -->
                <div class="space-y-6">

                    <!-- Registration Form -->
                    <div id="daftar" class="bg-white rounded-xl shadow-lg p-10 text-center">


                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $landingPage->contact_whatsapp) }}"
                            target="_blank"
                            class="flex items-start gap-3 w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-primary-dark transition-colors">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                            Konsultasi via WhatsApp
                        </a>

                    </div>
                </div>


            </div>
        </div>
    </section>

    @if ($programLayanan->slug === 'layanan-sertifikasi-halal')
        <!-- Service Paths -->
        <section class="py-16">
            <div class="max-w-6xl mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    @foreach ($subsertifikasi as $subser)
                        <div class="bg-white rounded-xl shadow-lg p-8" data-aos="fade-up" data-aos-delay="100">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="bg-blue-100 p-4 rounded-lg">
                                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold">{{ $subser->nama_program }}</h3>
                            </div>
                            <p class="text-gray-600 mb-6">{{ $subser->deskripsi }}</p>
                            <div class="space-y-6">
                                <div>
                                    <h4 class="font-semibold mb-3">Syarat dan Ketentuan:</h4>
                                    <ul class="space-y-2 text-gray-600">
                                        @foreach ($subser->materi as $syaratSingkat)
                                            <li class="flex items-start gap-3">
                                                <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>{{ $syaratSingkat }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <a href="{{ route('program-layanan.show', $subser) }}"
                                    class="block w-full bg-primary text-white text-center py-3 rounded-lg hover:bg-blue-700 transition-colors">
                                    Pelajari Lebih Lengkap
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

@endsection
