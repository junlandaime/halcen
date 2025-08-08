<div class="grid grid-cols-3 gap-6 mt-6 xl:grid-cols-1">


    <!-- Browser Stats -->
    <div class="card">
        <div class="card-header">Program & Layanan</div>

        <div class="overflow-y-auto " style="max-height: calc(3 * 4.5rem);">
            @foreach ($programs as $program)
                <div class="p-4 flex justify-between items-center text-gray-600 border-b">
                    <div class="flex items-center">
                        <i class="fab fa-chrome mr-4"></i>
                        <h1>{{ $program->nama_program }}</h1>
                    </div>
                    <div>
                        @if ($program->status == 'nonaktif')
                            <span class="px-2 py-1 bg-gray-500 text-slate-950 text-sm rounded">TIDAK TERSEDIA</span>
                        @else
                            <span class="px-2 py-1 bg-green-400 text-green-900 text-sm rounded">TERSEDIA</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <!-- end Browser Stats -->
    </div>


    <!-- Start Recent Sales -->
    <div class="card col-span-2 xl:col-span-1">
        <div class="card-header">Aktivitas Terbaru</div>

        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-r"></th>
                    <th class="px-4 py-2 border-r">Aktivitas</th>
                    <th class="px-4 py-2 border-r">Keterangan</th>
                    <th class="px-4 py-2 border-r">Penulis</th>
                    <th class="px-4 py-2">date</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($recentActivities as $activity)
                    <tr>
                        <td class="border border-l-0 px-4 py-2 text-center text-green-500">{{ $loop->iteration }}
                        </td>
                        <td class="border border-l-0 px-4 py-2">{{ $activity['title'] }}</td>
                        <td class="border border-l-0 px-4 py-2"> {{ $activity['description'] }}</td>
                        <td class="border border-l-0 px-4 py-2"> {{ $activity['author'] }}</td>
                        <td class="border border-l-0 border-r-0 px-4 py-2">{{ $activity['time']->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- End Recent Sales -->
</div>
