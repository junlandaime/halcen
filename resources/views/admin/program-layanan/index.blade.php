@extends('template.layouts.index')

@section('title')
    Manajemen Program Layanan - Admin Pusat Halal Salman ITB
@endsection

@section('content')
    @foreach (['deleted' => 'red', 'updated' => 'green', 'success' => 'blue'] as $key => $color)
        @if (session($key))
            <div id="alert-{{ $key }}"
                class="flex items-center p-4 mb-4 text-sm text-{{ $color }}-800 rounded-lg bg-{{ $color }}-50 dark:bg-gray-800 dark:text-{{ $color }}-400"
                role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                </svg>
                <span class="sr-only">Success</span>
                <div>
                    <span class="font-medium">Alert! </span> {{ session($key) }}
                </div>
            </div>
        @endif
    @endforeach

    <!-- Main Content -->
    <div class="p-4 md:ml-64">
        <!-- Top Bar -->
        <h2 class="text-2xl my-5 font-semibold text-gray-700">
            Manajemen Program Layanan
        </h2>
        <div class="flex items-center justify-end mb-4">
            <div class="flex items-center space-x-1">
                <a href="{{ route('admin.program-layanan.create') }}"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">
                    Create Program
                </a>
            </div>
        </div>

        <!-- Program Cards -->
        <div class="grid grid-cols-3 gap-4 mb-4">
            {{-- <div class="grid grid-cols-3 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4"> --}}
            @foreach ($programs as $program)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                    <div class="p-5">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $program->nama_program }}</h3>
                            <span
                                class="text-xs font-medium px-2.5 py-0.5 rounded {{ strtolower($program->tipe_kelas) === 'online' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : '' }}{{ strtolower($program->tipe_kelas) === 'offline' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' : '' }}">
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
                        <div class="flex justify-end items-center">
                            <a href="{{ route('admin.program-layanan.show', $program->id) }}"
                                class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">
                                Detail
                            </a>
                            <a href="{{ route('admin.program-layanan.edit', $program->id) }}"
                                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 mx-2">
                                Edit
                            </a>
                            <form action="{{ route('admin.program-layanan.destroy', $program->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this program?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                                    Delete
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
        <div class="bg-white mt-10 dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <div class="flex justify-center">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Batch Terbaru</h3>
                </div>
                <div>
                    <table id="selection-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Program
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Batch
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Status
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Periode Pendaftaran
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Kuota
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Sesi
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Harga
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Aksi
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($upcomingPrograms as $program)
                                @foreach ($program->batches as $batch)
                                    <tr>
                                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="text-sm font-medium text-gray-800 dark:text-gray-100">
                                                {{ $program->nama_program }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-800 dark:text-gray-100">
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
                                            <div class="text-sm text-gray-800 dark:text-gray-100">
                                                {{ $batch->tanggal_mulai_pendaftaran->format('d M Y') }} -
                                                {{ $batch->tanggal_selesai_pendaftaran->format('d M Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-100">
                                            {{ $batch->kuota }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-100">
                                            {{ $batch->Sesi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-100">
                                            Rp {{ number_format($batch->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex gap-2">
                                                <div class="flex justify-center">
                                                    <form action="{{ route('admin.sesi.tambah.manual') }}" method="POST"
                                                        class="flex flex-col items-center space-y-1">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $batch->id }}">

                                                        <button type="submit" name="action" value="tambah"
                                                            class="px-2 bg-green-600 text-white rounded hover:bg-green-700 text-lg leading-none">
                                                            +
                                                        </button>

                                                        <button type="submit" name="action" value="kurang"
                                                            class="px-2 bg-green-600 text-white rounded hover:bg-green-700 text-lg leading-none">
                                                            −
                                                        </button>
                                                    </form>
                                                    <!-- View -->
                                                    <a href="{{ route('admin.program-layanan.detail', [$program->id, $batch->id]) }}"
                                                        class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-150">
                                                        Detail
                                                    </a>
                                                    <!-- Edit -->
                                                    <a href="{{ route('admin.program-layanan.batch.edit', [$program, $batch]) }}"
                                                        class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150">
                                                        <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                    </a>

                                                    <!-- Delete -->
                                                    <form
                                                        action="{{ route('admin.program-layanan.batch.destroy', [$program, $batch]) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this Batch?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center mx-1 px-3 py-3 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150">
                                                            <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-3 text-center text-gray-800 dark:text-gray-100">
                                        Tidak ada program yang akan datang dalam waktu dekat
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
