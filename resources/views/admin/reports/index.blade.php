@extends('admin.layouts.app')

@section('title')
    <title>Laporan - Admin Pusat Halal Salman ITB</title>
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
        <div class="flex items-center space-x-2">
            <div class="relative">
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500">
                    <option value="this_month">Bulan Ini</option>
                    <option value="last_month">Bulan Lalu</option>
                    <option value="this_year">Tahun Ini</option>
                    <option value="last_year">Tahun Lalu</option>
                    <option value="custom">Kustom</option>
                </select>
            </div>
            <button type="button" class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2.5 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
                Download Laporan
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primer-100 dark:bg-primer-900">
                    <svg class="w-6 h-6 text-primer-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pendapatan</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">Rp 125.000.000</p>
                    <p class="text-sm text-green-600">+12.5% dari bulan lalu</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Klien Baru</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">45</p>
                    <p class="text-sm text-green-600">+8.2% dari bulan lalu</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Sertifikasi Selesai</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">78</p>
                    <p class="text-sm text-green-600">+15.3% dari bulan lalu</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 dark:bg-red-900">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Program Aktif</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">12</p>
                    <p class="text-sm text-red-600">-2.7% dari bulan lalu</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <!-- Revenue Chart -->
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pendapatan Bulanan</h3>
            <canvas id="revenueChart" class="w-full" height="300"></canvas>
        </div>

        <!-- Certifications Chart -->
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Sertifikasi per Kategori</h3>
            <canvas id="certificationsChart" class="w-full" height="300"></canvas>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Aktivitas Terkini</h3>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-primer-100 dark:bg-primer-900 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-primer-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Sertifikasi Halal Selesai
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    PT Berkah Makanan Indonesia
                                </p>
                            </div>
                            <div class="inline-flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                2 jam yang lalu
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Klien Baru Terdaftar
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    CV Sehat Sejahtera
                                </p>
                            </div>
                            <div class="inline-flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                5 jam yang lalu
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Pendapatan (Juta Rupiah)',
                data: [65, 78, 90, 85, 95, 110, 125, 130, 120, 140, 150, 160],
                borderColor: '#22c55e',
                tension: 0.3,
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // Certifications Chart
    const certificationsCtx = document.getElementById('certificationsChart').getContext('2d');
    new Chart(certificationsCtx, {
        type: 'doughnut',
        data: {
            labels: ['Makanan', 'Minuman', 'Kosmetik', 'Farmasi', 'Lainnya'],
            datasets: [{
                data: [45, 25, 15, 10, 5],
                backgroundColor: [
                    '#22c55e',
                    '#3b82f6',
                    '#eab308',
                    '#ef4444',
                    '#8b5cf6'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
</script>
@endpush

