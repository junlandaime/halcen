@extends('template.layouts.index')

@section('title')
    <title>Manajemen Video - Admin Pusat Halal Salman ITB</title>
@endsection

@push('styles')
    <style>
        /* Perkecil dan rapikan tulisan bawaan datatables */
        .datatable-info {
            margin-left: 20pt;
            margin-top: 5pt;
            font-weight: bold;
        }

        /* Hilangkan border bawah kotak */
        .dataTables_wrapper {
            border-bottom: none !important;
        }

        /* Hilangkan border hitam saat klik header kolom */
        table.dataTable thead th:focus {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
@endpush

@section('content')
    <div class="p-4 md:ml-64">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Manajemen Video
            </h2>

            <div class="flex justify-end items-center mb-6">
                <a href="{{ route('admin.videos.create') }}"
                    class="px-4 py-2 mx-1 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                    Tambah Video
                </a>
                <a href="{{ route('admin.video-categories.index') }}"
                    class="bg-white px-4 py-2 mx-1 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Kategori Video
                </a>
            </div>

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="w-full overflow-hidden rounded-lg shadow">
                <div class="w-full">
                    <table class="min-w-full text-sm text-left text-gray-500" id="selection-table">
                        <thead class="text-xs">
                            <tr>
                                @foreach (['Judul', 'Kategori', 'Durasi', 'Status', 'Urutan', 'Aksi'] as $label)
                                    <th scope="col" class="px-6 py-3 text-center"> <!-- Tambahkan text-center di sini -->
                                        <div class="flex text-center align-middle uppercase bg-gray-50" style="color:black">
                                            <!-- Perubahan di justify-center -->
                                            {{ $label }}
                                            <svg class="w-4 h-4 ms-1 text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                            </svg>
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @foreach ($videos as $video)
                                <tr class="text-gray-700">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900">{{ $video->title }}</div>
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit($video->description, 50) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center align-middle">
                                        {{ $video->category->name }}
                                    </td>
                                    <td class="px-6 py-4 text-center align-middle">
                                        {{ $video->duration_for_humans }}
                                    </td>
                                    <td class="px-6 py-4 text-center align-middle">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full
                                            {{ $video->is_active ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }}">
                                            {{ $video->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center align-middle">
                                        {{ $video->order }}
                                    </td>
                                    <td class="px-10 py-4">
                                        <div class="flex justify-center">
                                            <!-- Tombol Edit di kiri -->
                                            <a href="{{ route('admin.videos.edit', $video) }}"
                                                class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150">
                                                <svg class="w-4 h-4 mr-1.5 -ml-0.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <!-- Tombol Delete di kanan -->
                                            <form action="{{ route('admin.videos.destroy', $video) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150">
                                                    <svg class="w-4 h-4 mr-1.5 -ml-0.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-3 bg-gray-50 border-t">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
