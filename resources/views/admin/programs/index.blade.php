@extends('admin.layouts.app')

@section('title')
    <title>Manajemen Program - Admin Pusat Halal Salman ITB</title>
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

    <!-- Program Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
        <!-- Kuliah Halal Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Kuliah Halal</h3>
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                        Aktif
                    </span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Program edukasi tentang produk halal dan sertifikasi halal.
                </p>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Peserta Terdaftar</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">156</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Batch Aktif</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">3</p>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="kuliah-halal.html" class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
                        Kelola
                    </a>
                    <button class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                        Statistik
                    </button>
                </div>
            </div>
        </div>

        <!-- JULEHA Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">JULEHA</h3>
                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                        Aktif
                    </span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Program juru sembelih halal dan pengelolaan RPH halal.
                </p>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Peserta Terdaftar</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">89</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Batch Aktif</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">2</p>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="juleha.html" class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
                        Kelola
                    </a>
                    <button class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                        Statistik
                    </button>
                </div>
            </div>
        </div>

        <!-- P3H Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <div class="p-5">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">P3H</h3>
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                        Persiapan
                    </span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Program pelatihan penyelia halal untuk industri.
                </p>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Peserta Terdaftar</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">45</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Batch Aktif</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">1</p>
                    </div>
                </div>
                <div class="flex space-x-2">
                    <a href="p3h.html" class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
                        Kelola
                    </a>
                    <button class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                        Statistik
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Registrations -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pendaftaran Terbaru</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama</th>
                            <th scope="col" class="px-4 py-3">Program</th>
                            <th scope="col" class="px-4 py-3">Batch</th>
                            <th scope="col" class="px-4 py-3">Tanggal Daftar</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Ahmad Fadillah
                            </th>
                            <td class="px-4 py-3">Kuliah Halal</td>
                            <td class="px-4 py-3">Batch 12</td>
                            <td class="px-4 py-3">05/01/2025</td>
                            <td class="px-4 py-3">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                    Menunggu Pembayaran
                                </span>
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
                        <!-- Add more registration rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush
