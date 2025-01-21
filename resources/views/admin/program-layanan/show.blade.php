@extends('admin.layouts.app')

@section('title', $programLayanan->title)

@push('styles')
    <style>
        p {
            text-align: justify;
        }
    </style>
@endpush

@section('content')
    <div class="p-4 md:ml-64">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        Detail Program: {{ $programLayanan->nama_program }}
                    </h2>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.program-layanan.edit', $programLayanan) }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Edit Program
                        </a>
                        <a href="{{ route('admin.program-layanan.batch.create', $programLayanan) }}"
                            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            Tambah Batch
                        </a>
                    </div>

                </div>

                <!-- Program Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Informasi Program</h3>
                        <div class="space-y-3">
                            <div>
                                <span class="text-gray-600">Tipe Kelas:</span>
                                <span class="font-medium">{{ ucfirst($programLayanan->tipe_kelas) }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Durasi:</span>
                                <span class="font-medium">{{ $programLayanan->durasi }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Deskripsi:</span>
                                <p class="mt-1">{{ $programLayanan->deskripsi }}</p>
                            </div>
                            <div>
                                <span class="text-gray-600">Deskripsi Lengkap:</span>
                                <p class="mt-1">{!! $programLayanan->deskripsi_lengkap !!}</p>
                            </div>
                        </div>
                    </div>

                    @if ($programLayanan->gambar_banner)
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Banner Program</h3>
                            <img src="{{ Storage::url($programLayanan->gambar_banner) }}"
                                alt="{{ $programLayanan->nama_program }}" class="w-full h-48 object-cover rounded-lg">
                        </div>
                    @endif
                </div>

                <!-- Batch List -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold mb-4">Daftar Batch</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Batch
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Periode Pendaftaran
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kuota
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Harga
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Link Pendaftaran
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($programLayanan->batches as $batch)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
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
                                            <div class="text-sm text-gray-900">
                                                {{ $batch->tanggal_mulai_pendaftaran->format('d M Y') }} -
                                                {{ $batch->tanggal_selesai_pendaftaran->format('d M Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $batch->kuota }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Rp {{ number_format($batch->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ Str::limit($batch->external_link, 20) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.program-layanan.batch.edit', [$programLayanan, $batch]) }}"
                                                    class="text-blue-600 hover:text-blue-900">
                                                    Edit
                                                </a>
                                                <form
                                                    action="{{ route('admin.program-layanan.batch.destroy', [$programLayanan, $batch]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus batch ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6"
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            Belum ada batch yang ditambahkan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Program Content -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Materi Program</h3>
                        <ul class="list-disc list-inside space-y-2">
                            @foreach ($programLayanan->materi as $materi)
                                <li class="text-gray-700">{{ $materi }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Manfaat Program</h3>
                        <ul class="list-disc list-inside space-y-2">
                            @foreach ($programLayanan->manfaat as $manfaat)
                                <li class="text-gray-700">{{ $manfaat }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Capaian</h3>
                        <ul class="list-disc list-inside space-y-2">
                            @foreach ($programLayanan->persyaratan as $syarat)
                                <li class="text-gray-700">{{ $syarat }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Alur Proses</h3>
                        <div class="space-y-4">
                            @foreach ($programLayanan->alur_proses as $index => $alur)
                                <div class="flex items-start gap-3">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm">
                                        {{ $index + 1 }}
                                    </div>
                                    <p class="text-gray-700">{{ $alur }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
