@extends('layouts.front')

@section('title')
    <title>Program Layanan - Pusat Halal Salman ITB</title>
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
{{-- @section('content')
    <!-- Hero Section -->
    <section class="relative h-[400px] overflow-hidden pt-16" x-data="{ scroll: 0 }"
        @scroll.window="scroll = window.pageYOffset">
        <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
            <img src="https://picsum.photos/1920/800" alt="Program Layanan Banner" class="w-full h-[600px] object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-green-900/80 to-green-600/60">
            <div class="max-w-6xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <h1 class="text-5xl font-bold mb-6">Program Layanan</h1>
                    <p class="text-2xl mb-8 text-gray-200">Tingkatkan Kompetensi Anda bersama Kami</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="py-8 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('program-layanan.search') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <input type="text" name="keyword" placeholder="Cari program..."
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500"
                            value="{{ request('keyword') }}">
                    </div>
                    <div>
                        <select name="tipe_kelas"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                            <option value="">Semua Tipe Kelas</option>
                            <option value="online" {{ request('tipe_kelas') == 'online' ? 'selected' : '' }}>Online</option>
                            <option value="hybrid" {{ request('tipe_kelas') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            <option value="offline" {{ request('tipe_kelas') == 'offline' ? 'selected' : '' }}>Offline
                            </option>
                        </select>
                    </div>
                    <div>
                        <input type="date" name="tanggal_mulai"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500"
                            value="{{ request('tanggal_mulai') }}">
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Programs -->
    @if (isset($featuredPrograms) && $featuredPrograms->count() > 0)
        <section class="py-16">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-3xl font-bold mb-8" data-aos="fade-up">Program Unggulan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($featuredPrograms as $program)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up"
                            data-aos-delay="{{ $loop->iteration * 100 }}">
                            <img src="{{ $program->gambar_banner }}" alt="{{ $program->nama_program }}"
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">{{ $program->nama_program }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($program->deskripsi, 100) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-green-600 font-bold">Rp
                                        {{ number_format($program->harga, 0, ',', '.') }}</span>
                                    <a href="{{ route('program-layanan.show', $program) }}"
                                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- All Programs -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8" data-aos="fade-up">Semua Program</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($programs as $program)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration * 100 }}">
                        <img src="{{ $program->gambar_banner }}" alt="{{ $program->nama_program }}"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center mb-2">
                                <span
                                    class="badge bg-{{ $program->tipe_kelas === 'online' ? 'blue' : ($program->tipe_kelas === 'hybrid' ? 'purple' : 'orange') }}-100 text-{{ $program->tipe_kelas === 'online' ? 'blue' : ($program->tipe_kelas === 'hybrid' ? 'purple' : 'orange') }}-800 px-2 py-1 rounded-full text-sm">
                                    {{ ucfirst($program->tipe_kelas) }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold mb-2">{{ $program->nama_program }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($program->deskripsi, 100) }}</p>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-gray-600">
                                    <i class="far fa-calendar-alt w-5"></i>
                                    <span>{{ $program->tanggal_mulai->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="far fa-clock w-5"></i>
                                    <span>{{ $program->jadwal_kelas }}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="far fa-user w-5"></i>
                                    <span>{{ $program->kapasitas }} peserta</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-green-600 font-bold">Rp
                                    {{ number_format($program->harga, 0, ',', '.') }}</span>
                                <a href="{{ route('program-layanan.show', $program) }}"
                                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-600">Tidak ada program yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $programs->links() }}
            </div>
        </div>
    </section>
@endsection --}}

@section('content')
    <!-- Web Banner -->
    <section class="relative h-[600px] overflow-hidden pt-16" x-data="{ scroll: 0 }"
        @scroll.window="scroll = window.pageYOffset">
        <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
            <img src="https://picsum.photos/1920/800" alt="Program Layanan Banner" class="w-full h-[800px] object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
            <div class="max-w-6xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <h1 class="text-5xl font-bold mb-6">Program Layanan</h1>
                    <p class="text-2xl mb-8 text-gray-200">Tingkatkan Kompetensi Anda bersama Kami</p>
                    <a href="#program-list"
                        class="bg-white text-primary px-8 py-3 rounded-full hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                        Lihat Program
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Search & Filter -->
    <section class="relative z-10 -mt-20 pb-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="bg-white rounded-xl shadow-xl p-8" data-aos="fade-up">
                <form action="{{ route('program-layanan.search') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kata Kunci</label>
                        <input type="text" name="keyword" placeholder="Cari program..."
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                            value="{{ request('keyword') }}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Kelas</label>
                        <select name="tipe_kelas"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary">
                            <option value="">Semua Tipe Kelas</option>
                            <option value="online" {{ request('tipe_kelas') == 'online' ? 'selected' : '' }}>Online</option>
                            <option value="hybrid" {{ request('tipe_kelas') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            <option value="offline" {{ request('tipe_kelas') == 'offline' ? 'selected' : '' }}>Offline
                            </option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                            value="{{ request('tanggal_mulai') }}">
                    </div>
                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300">
                            Cari Program
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Programs -->
    @if (isset($featuredPrograms) && $featuredPrograms->count() > 0)
        <section class="py-16" id="program-list">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-2xl font-bold mb-8" data-aos="fade-up">Program Unggulan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($featuredPrograms as $program)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300"
                            data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <img src="{{ $program->gambar_banner }}" alt="{{ $program->nama_program }}"
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex items-center mb-2">
                                    <span
                                        class="px-3 py-1 rounded-full text-sm
                                    {{ $program->tipe_kelas === 'online'
                                        ? 'bg-blue-100 text-blue-800'
                                        : ($program->tipe_kelas === 'hybrid'
                                            ? 'bg-purple-100 text-purple-800'
                                            : 'bg-orange-100 text-orange-800') }}">
                                        {{ ucfirst($program->tipe_kelas) }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold mb-2">{{ $program->nama_program }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($program->deskripsi, 100) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-primary font-bold">Rp
                                        {{ number_format($program->harga, 0, ',', '.') }}</span>
                                    <a href="{{ route('program-layanan.show', $program) }}"
                                        class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- All Programs -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8" data-aos="fade-up">Semua Program</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($programs as $program)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <img src="{{ $program->gambar_banner }}" alt="{{ $program->nama_program }}"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center mb-2">
                                <span
                                    class="px-3 py-1 rounded-full text-sm
                                    {{ $program->tipe_kelas === 'online'
                                        ? 'bg-blue-100 text-blue-800'
                                        : ($program->tipe_kelas === 'hybrid'
                                            ? 'bg-purple-100 text-purple-800'
                                            : 'bg-orange-100 text-orange-800') }}">
                                    {{ ucfirst($program->tipe_kelas) }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold mb-2">{{ $program->nama_program }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($program->deskripsi, 100) }}</p>
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-gray-600">
                                    <i class="far fa-calendar-alt w-5"></i>
                                    {{-- <span>{{ $program->tanggal_mulai->format('d M Y') }}</span> --}}
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="far fa-clock w-5"></i>
                                    <span>{{ $program->jadwal_kelas }}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="far fa-user w-5"></i>
                                    <span>{{ $program->kapasitas }} peserta</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-primary font-bold">Rp
                                    {{ number_format($program->harga, 0, ',', '.') }}</span>
                                <a href="{{ route('program-layanan.show', $program) }}"
                                    class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-300">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-600">Tidak ada program yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $programs->links() }}
            </div>
        </div>
    </section>
@endsection
