@extends('admin.layouts.app')

@section('title')
    <title>Manajemen Program Layanan - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 md:ml-64">
        <!-- Top Bar -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>
                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white ml-2">Program Layanan</h1>
            </div>
            <a href="{{ route('admin.program-layanan.create') }}"
                class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2">
                Tambah Program
            </a>
        </div>

        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Program Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
            @foreach ($programs as $program)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                    <div class="p-5">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $program->nama_program }}</h3>
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                {{ ucfirst($program->tipe_kelas) }}
                            </span>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            {{ Str::limit($program->deskripsi, 100) }}
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Durasi</p>
                                <p class="text-base font-bold text-gray-900 dark:text-white">{{ $program->durasi }}</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.program-layanan.show', $program->id) }}"
                                class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
                                Detail
                            </a>
                            <a href="{{ route('admin.program-layanan.edit', $program->id) }}"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                Edit
                            </a>
                            <form action="{{ route('admin.program-layanan.destroy', $program->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this program?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                                    Delete Program
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @php
            $upcomingPrograms = App\Models\ProgramLayanan::with(['batches'])
                ->where('status', 'aktif')
                ->whereHas('batches', function ($query) {
                    $query->where('status', 'aktif')->where('tanggal_selesai_pendaftaran', '>=', now());
                })
                ->get();
        @endphp

        <!-- Recent Registrations -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Batch Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Program
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Batch
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Periode Pendaftaran
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kuota
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Link Pendaftaran
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($upcomingPrograms as $program)
                                @foreach ($program->batches as $batch)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $program->nama_program }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                Batch {{ $batch->batch_ke }} - {{ $batch->nama_batch }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $batch->status === 'aktif'
                                            ? 'bg-green-100 text-green-800'
                                            : ($batch->status === 'draft'
                                                ? 'bg-gray-100 text-gray-800'
                                                : 'bg-red-100 text-red-800') }}">
                                                {{ ucfirst($batch->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $batch->tanggal_mulai_pendaftaran->format('d M Y') }} -
                                                {{ $batch->tanggal_selesai_pendaftaran->format('d M Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $batch->kuota }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Rp {{ number_format($batch->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ Str::limit($batch->external_link, 20) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.program-layanan.batch.edit', [$program, $batch]) }}"
                                                    class="text-blue-600 hover:text-blue-900">
                                                    Edit
                                                </a>
                                                <form
                                                    action="{{ route('admin.program-layanan.batch.destroy', [$program, $batch]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus batch ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty

                                <tr>
                                    <td colspan="6" class="px-4 py-3 text-center">Tidak ada program yang akan datang
                                        dalam waktu dekat</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
