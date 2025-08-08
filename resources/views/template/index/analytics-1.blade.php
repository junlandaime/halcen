<div class="mt-6 grid grid-cols-2 gap-6 xl:grid-cols-1">

    <!-- update section -->
    <div class="card bg-teal-400 border-teal-400 shadow-md text-white">
        <div class="card-body flex flex-row">

            <!-- image -->
            <div class="img-wrapper w-40 h-40 flex justify-center items-center ">
                <img class="rounded-full" src="{{ asset('profile.jpg') }}" alt="img title">
            </div>
            <!-- end image -->

            <!-- info -->
            <div class="py-2 ml-10">
 <h1 class="h6">
    Selamat Datang, {{ Auth::user()->name }}
    @if(Auth::user()->role)
        - {{ Auth::user()->role }}
    @endif
</h1>

                <p class="text-white text-xs">Selamat Datang di dashboard Halal Center</p>

                <ul class="mt-4">
                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i> Finish Dashboard Design
                    </li>
                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i> Fix Issue #74</li>
                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2"></i> Publish version 1.0.6</li>
                </ul>
            </div>
            <!-- end info -->

        </div>
    </div>
    <!-- end update section -->

    <!-- carts -->
    <div class="flex flex-col">

        {{-- <!-- alert -->
        <div class="alert alert-dark mb-6">
            Hi! Wait A Minute . . . . . . Follow Me On Twitter
            <a class="ml-2" target="_blank" href="https://twitter.com/MohamedSaid__">@moesaid</a>
        </div>
        <!-- end alert --> --}}

        <!-- charts -->
        <div class="grid grid-cols-1 gap-6 h-full">

            <div class="card flex flex-col justify-between">
                <div class="py-3 px-4 flex flex-row justify-between">
                    <h1 class="h6">
                        <span>Kuliah Halal</span>
                        <p>Statistik Sertifikasi</p>
                    </h1>

                    <div
                        class="bg-teal-200 text-teal-700 border-teal-300 border w-10 h-10 rounded-full flex justify-center items-center">
                        <i class="fad fa-eye"></i>
                    </div>
                </div>
                <div id="participantChart"></div>
            </div>

            {{-- <div class="card flex flex-col justify-between">
                <div class="py-3 px-4 flex flex-row justify-between">
                    <h1 class="h6">
                        <span class="num-2"></span>
                        <p>Tren Klien</p>
                    </h1>

                    <div
                        class="bg-indigo-200 text-indigo-700 border-indigo-300 border w-10 h-10 rounded-full flex justify-center items-center">
                        <i class="fad fa-users-crown"></i>
                    </div>
                </div>
                <div class="analytics_1"></div>
            </div> --}}

        </div>
        <!-- charts    -->

    </div>
    <!-- end charts -->


</div>
{{-- <!-- Charts -->
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
</script> --}}
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const batchLabels = @json($labels);
            const batchData = @json($data);

            console.log("Labels:", batchLabels);
            console.log("Data:", batchData);

            const maxValue = Math.max(...batchData);
            const tickAmount = 4;

            const options = {
                chart: {
                    type: 'area',
                    height: 200,
                    toolbar: {
                        show: false
                    },
                    sparkline: {
                        enabled: true
                    },
                    parentHeightOffset: 0
                },
                series: [{
                    name: "Jumlah Peserta",
                    data: batchData
                }],
                xaxis: {
                    categories: batchLabels,
                    labels: {
                        show: false
                    },
                    axisBorder: {
                        show: false
                    },
                    tooltip: {
                        enabled: false
                    }
                },
                yaxis: {
                    show: true,
                    tickAmount: tickAmount,
                    min: 0,
                    max: maxValue + 100,
                    labels: {
                        style: {
                            fontSize: '10px',
                            colors: '#888'
                        },
                        formatter: function(val) {
                            return parseInt(val);
                        }
                    }
                },
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    padding: {
                        top: 0,
                        right: 10,
                        bottom: -10,
                        left: 10
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 2,
                    colors: ['#4fd1c5']
                },
                fill: {
                    colors: ['#4fd1c5'],
                    opacity: 0.3
                },
                markers: {
                    size: 4,
                    colors: ['#fff'],
                    strokeColors: '#4fd1c5',
                    strokeWidth: 2
                },
                tooltip: {
                    enabled: true,
                    shared: false,
                    intersect: true,
                    theme: 'light',
                    x: {
                        show: true,
                        formatter: (_, {
                            dataPointIndex
                        }) => batchLabels[dataPointIndex] ?? ''
                    },
                    y: {
                        formatter: val => `${val} Peserta`
                    }
                },
                dataLabels: {
                    enabled: true,
                    style: {
                        fontSize: '12px',
                        colors: ['#000']
                    },
                    formatter: val => val
                },
                legend: {
                    show: false
                }
            };

            const chart = new ApexCharts(document.querySelector("#participantChart"), options);
            chart.render();
        });
    </script>
@endpush
