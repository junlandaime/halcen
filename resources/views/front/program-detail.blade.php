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
            <div class="flex flex-col md:flex-row gap-8 items-center">
                <div class="flex-1">
                    <h1 class="text-4xl font-bold mb-4">{{ $programLayanan->nama_banner }}</h1>
                    <p class="text-lg opacity-90">{{ $programLayanan->deskripsi }}</p>

                    @if ($activeBatch)
                        <div class="mt-8 space-y-4">
                            <div class="flex items-center gap-2">
                                <span class="text-lg font-semibold">Batch {{ $activeBatch->batch_ke }} -
                                    {{ $activeBatch->nama_batch }}</span>
                                <span class="px-3 py-1 bg-green-500 text-white text-sm rounded-full">Pendaftaran
                                    Dibuka</span>
                            </div>
                            <div class="flex gap-4">
                                <div>
                                    <span class="block text-sm opacity-75">Harga Program</span>
                                    <span class="text-2xl font-bold">Rp
                                        {{ number_format($activeBatch->harga, 0, ',', '.') }}</span>
                                </div>
                                <div>
                                    <span class="block text-sm opacity-75">Sisa Kuota</span>
                                    <span class="text-2xl font-bold">{{ $activeBatch->kuota }} Peserta</span>
                                </div>
                            </div>
                            <div>
                                <span class="block text-sm opacity-75">Batas Pendaftaran</span>
                                <span
                                    class="text-lg">{{ $activeBatch->tanggal_selesai_pendaftaran->format('d F Y') }}</span>
                            </div>
                            <a href="{{ $activeBatch->external_link }}" target="_blank"
                                class="inline-block px-6 py-3 bg-white text-primary font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                                Daftar Sekarang
                            </a>
                        </div>
                    @else
                        @if ($upcomingBatches->isNotEmpty())
                            <div class="mt-8">
                                <span class="px-4 py-2 bg-yellow-500 text-white rounded-lg">
                                    Batch berikutnya akan dibuka pada
                                    {{ $upcomingBatches->first()->tanggal_mulai_pendaftaran->format('d F Y') }}
                                </span>
                            </div>
                        @endif
                    @endif
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
                    <div class="bg-white rounded-xl shadow-lg p-6">
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
                    </div>

                    <!-- Materi -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
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
                    </div>

                    <!-- Manfaat -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">Benefit Program</h2>
                        <ul class="space-y-2">
                            @foreach ($programLayanan->manfaat as $manfaat)
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-star text-yellow-500 mt-1"></i>
                                    <span>{{ $manfaat }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Persyaratan -->
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h2 class="text-2xl font-bold mb-4">Capaian Program</h2>
                        <ul class="space-y-2">
                            @foreach ($programLayanan->persyaratan as $syarat)
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-clipboard-check text-primary mt-1"></i>
                                    <span>{{ $syarat }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Alur Proses -->
                    @if (count($programLayanan['alur_proses']) > 0)
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h2 class="text-2xl font-bold mb-4">Alur Proses</h2>
                            <div class="space-y-4">
                                @foreach ($programLayanan->alur_proses as $index => $alur)
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                                            {{ $index + 1 }}
                                        </div>
                                        <div>
                                            <p>{{ $alur }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    @if ($activeBatch)
                        <!-- Registration Form -->
                        <div id="daftar" class="bg-white rounded-xl shadow-lg p-10 text-center">

                            @if ($activeBatch->external_link)
                                <a href="{{ $activeBatch->external_link }}" target="_blank"
                                    class="w-full px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors">
                                    Daftar Sekarang
                                </a>
                            @endif
                        </div>
                    @endif

                    <!-- Upcoming Batches -->
                    @if ($upcomingBatches->isNotEmpty())
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h2 class="text-xl font-bold mb-4">Batch Mendatang</h2>
                            <div class="space-y-4">
                                @foreach ($upcomingBatches as $batch)
                                    <div class="border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                                        <h3 class="font-semibold">Batch {{ $batch->batch_ke }} - {{ $batch->nama_batch }}
                                        </h3>
                                        <div class="text-sm text-gray-600 space-y-1 mt-2">
                                            <p>
                                                <i class="fas fa-calendar-alt w-5"></i>
                                                Mulai: {{ $batch->tanggal_mulai_program->format('d F Y') }}
                                            </p>
                                            <p>
                                                <i class="fas fa-users w-5"></i>
                                                Kuota: {{ $batch->kuota }} peserta
                                            </p>
                                            <p>
                                                <i class="fas fa-tag w-5"></i>
                                                Rp {{ number_format($batch->harga, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
