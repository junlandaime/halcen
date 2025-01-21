@extends('admin.layouts.app')

@section('title')
    <title>Dashboard - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">
        <!-- Top Bar -->
        <div class="flex items-center justify-between mb-4">
            <button @click="sidebarOpen = !sidebarOpen"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Total Certifications -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-primer-100 dark:bg-primer-900">
                        <svg class="w-6 h-6 text-primer-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Program Layanan</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-white">{{ $stats['total_certifications'] }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Similar cards for other statistics -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Mitra</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-white">{{ $stats['total_clients'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-red-100 dark:bg-red-900">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 2h8a2 2 0 012 2v16a2 2 0 01-2 2H8a2 2 0 01-2-2V4a2 2 0 012-2zm0 4h8M8 8h8M8 12h4">
                            </path>
                        </svg>

                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Artikel</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-white">{{ $stats['total_articles'] }}</p>
                    </div>
                </div>
            </div>
            <!-- Regulation -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Regulation</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-white">{{ $stats['total_regulations'] }}</p>
                    </div>
                </div>
            </div>

            <!-- FAQ -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 9h6m-3-3v6m-3 6h6">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total FAQ</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-white">{{ $stats['total_faqs'] }}</p>
                    </div>
                </div>
            </div>

            <!-- User -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 dark:bg-green-900">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 14a4 4 0 01-8 0m8 0a4 4 0 01-8 0m8 0c0-2.21-2.69-4-6-4s-6 1.79-6 4m12 0h-6m-6 0v-6">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Users</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-white">{{ $stats['total_users'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Video -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900">
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.5 2.5L15 15v-5zm-2 9a9 9 0 110-18 9 9 0 010 18zm-4.5-7.5L9 10v5l-1.5-2.5z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Videos</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-white">{{ $stats['total_videos'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-pink-100 dark:bg-pink-900">
                        <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M16 10h.01M12 16h-4m6-4c-1.1 0-2 .9-2 2 0 .21.02.41.06.61.11.54.36 1.04.72 1.39.37.36.87.61 1.41.72.2.04.4.06.61.06h.13c1.1 0 2-.9 2-2 0-.21-.02-.41-.06-.61a2.004 2.004 0 00-.72-1.39 2.004 2.004 0 00-1.41-.72c-.2-.04-.4-.06-.61-.06H14z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Testimonials</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-white">{{ $stats['total_testimonials'] }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional statistic cards... -->
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
                    @foreach ($recentActivities as $activity)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-8 h-8 rounded-full" src="{{ $activity['image'] }}"
                                        alt="{{ $activity['title'] }}">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        {{ $activity['title'] }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        {{ $activity['description'] }}
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    {{ $activity['time']->diffForHumans() }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Certification Chart
                const certCtx = document.getElementById('certificationChart').getContext('2d');
                new Chart(certCtx, {
                    type: 'line',
                    data: {
                        labels: @json($certificationData['labels']),
                        datasets: [{
                            label: 'Sertifikasi',
                            data: @json($certificationData['data']),
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
                        labels: @json($clientTrendData['labels']),
                        datasets: [{
                            label: 'Klien Baru',
                            data: @json($clientTrendData['data']),
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
    @endpush
@endsection
