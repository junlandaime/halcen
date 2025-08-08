@extends('template.layouts.index')

@section('title', 'Rekap Presensi Peserta - Admin')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6">Rekap Presensi Peserta</h1>

    <div class="overflow-auto bg-white rounded shadow">
        <table class="min-w-full table-auto text-sm text-left">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Presensi Pagi</th>
                    <th class="px-4 py-2">Presensi Siang</th>
                    <th class="px-4 py-2">% Total</th>
                    <th class="px-4 py-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participants as $i => $p)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $i + 1 }}</td>
                        <td class="px-4 py-2">{{ $p->nama }}</td>
                        <td class="px-4 py-2">{{ $p->presensi_pagi }}</td>
                        <td class="px-4 py-2">{{ $p->presensi_siang }}</td>
                        <td class="px-4 py-2 font-semibold text-blue-600">{{ $p->persentase }}%</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                {{ $p->keterangan === 'Lulus' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $p->keterangan }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
