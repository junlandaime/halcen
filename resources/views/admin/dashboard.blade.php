@extends('admin.layouts.app')

@section('title')
    <title>Dashboard - Halal Center Masjid Salman ITB</title>
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
        <!-- User menu from template -->
    </div>

    <!-- Dashboard Content -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <!-- Statistik Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-primer-100 dark:bg-primer-900">
                    <svg class="w-6 h-6 text-primer-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Sertifikasi</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">245</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Klien</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">156</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pengajuan Baru</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">12</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 dark:bg-red-900">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Menunggu Review</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-white">8</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Statistik Sertifikasi</h3>
            <canvas id="certificationChart"></canvas>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Tren Klien</h3>
            <canvas id="clientChart"></canvas>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Aktivitas Terbaru</h3>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="User image">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                PT. Makanan Sehat Indonesia
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                Mengajukan sertifikasi baru
                            </p>
                        </div>
                        <div class="inline-flex items-center text-sm text-gray-500 dark:text-gray-400">
                            2 jam yang lalu
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="User image">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                CV. Berkah Jaya
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                Sertifikasi disetujui
                            </p>
                        </div>
                        <div class="inline-flex items-center text-sm text-gray-500 dark:text-gray-400">
                            5 jam yang lalu
                        </div>
                    </div>
                </li>
                <!-- Add more activity items as needed -->
            </ul>
        </div>
    </div>
</div>
<script>
    // Initialize charts
    document.addEventListener('DOMContentLoaded', function() {
        // Certification Chart
        const certCtx = document.getElementById('certificationChart').getContext('2d');
        new Chart(certCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sertifikasi',
                    data: [12, 19, 15, 25, 22, 30],
                    borderColor: '#22c55e',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Client Chart
        const clientCtx = document.getElementById('clientChart').getContext('2d');
        new Chart(clientCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Klien Baru',
                    data: [8, 12, 10, 15, 18, 20],
                    backgroundColor: '#3b82f6'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
@endsection

@push('scripts')

@endpush