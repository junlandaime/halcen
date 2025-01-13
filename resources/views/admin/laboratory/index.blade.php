@extends('admin.layouts.app')

@section('title')
    <title>Manajemen Laboratorium - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
<!-- Main Content -->
<div class="p-4 md:ml-64">
    <!-- Top Bar -->
    <div class="flex items-center justify-between mb-4">
        <button @click="sidebarOpen = !sidebarOpen" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Laboratory Statistics -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primer-100 dark:bg-primer-900">
                    <svg class="w-6 h-6 text-primer-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Pengujian</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">156</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Selesai</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">89</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Dalam Proses</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">45</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 dark:bg-red-900">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Perlu Tindakan</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">8</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Laboratory Equipment -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Peralatan Laboratorium</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Alat</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Kalibrasi</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    HPLC Analyzer
                                </th>
                                <td class="px-4 py-3">
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-4 py-3">15/03/2025</td>
                                <td class="px-4 py-3">
                                    <button type="button" class="text-primer-700 border border-primer-700 hover:bg-primer-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-primer-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center dark:border-primer-500 dark:text-primer-500 dark:hover:text-white dark:focus:ring-primer-800 dark:hover:bg-primer-500">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                        <span class="sr-only">Lihat Detail</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- Add more equipment rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Testing Schedule -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Jadwal Pengujian</h3>
                <div class="space-y-4">
                    <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="flex-shrink-0">
                            <span class="text-lg font-bold text-gray-900 dark:text-white">10</span>
                            <span class="block text-sm text-gray-600 dark:text-gray-400">Jan</span>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Pengujian Kandungan Gelatin</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">PT. Makanan Sehat Indonesia</p>
                        </div>
                        <div class="ml-auto">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                09:00 WIB
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="flex-shrink-0">
                            <span class="text-lg font-bold text-gray-900 dark:text-white">10</span>
                            <span class="block text-sm text-gray-600 dark:text-gray-400">Jan</span>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Analisis Bahan Pengawet</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">CV. Berkah Jaya</p>
                        </div>
                        <div class="ml-auto">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                13:00 WIB
                            </span>
                        </div>
                    </div>
                    <!-- Add more schedule items as needed -->
                </div>
            </div>
        </div>
    </div>

    <!-- Testing List -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Daftar Pengujian</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">ID Pengujian</th>
                            <th scope="col" class="px-4 py-3">Klien</th>
                            <th scope="col" class="px-4 py-3">Jenis Pengujian</th>
                            <th scope="col" class="px-4 py-3">Tanggal</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Progress</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                LAB-2025-001
                            </th>
                            <td class="px-4 py-3">PT. Makanan Sehat Indonesia</td>
                            <td class="px-4 py-3">Kandungan Gelatin</td>
                            <td class="px-4 py-3">10/01/2025</td>
                            <td class="px-4 py-3">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                    Dalam Proses
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-primer-600 h-2.5 rounded-full" style="width: 45%"></div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <button type="button" class="text-primer-700 border border-primer-700 hover:bg-primer-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-primer-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center dark:border-primer-500 dark:text-primer-500 dark:hover:text-white dark:focus:ring-primer-800 dark:hover:bg-primer-500">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                    <span class="sr-only">Lihat Detail</span>
                                </button>
                            </td>
                        </tr>
                        <!-- Add more testing rows as needed -->
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing 1-10 of 30
                </span>
                <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
