@extends('template.layouts.index')

@section('title')
    Detail Program - {{ $programLayanan->nama_program }}
@endsection

@push('styles')
    <style>
        p {
            text-align: justify;
        }
    </style>
@endpush

@section('content')
    @foreach (['deleted' => 'red', 'updated' => 'green', 'success' => 'blue'] as $key => $color)
        @if (session($key))
            <div id="alert-{{ $key }}"
                class="flex items-center p-4 mb-4 text-sm text-{{ $color }}-800 rounded-lg bg-{{ $color }}-50 dark:bg-gray-800 dark:text-{{ $color }}-400"
                role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                </svg>
                <span class="sr-only">Success</span>
                <div>
                    <span class="font-medium">Alert! </span> {{ session($key) }}
                </div>
            </div>
        @endif
    @endforeach

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
                                        Sesi
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kuota
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Harga
                                    </th>
                                    {{-- <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Link Pendaftaran
                                    </th> --}}
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
                                            {{ $batch->Sesi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $batch->kuota }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Rp {{ number_format($batch->harga, 0, ',', '.') }}
                                        </td>
                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ Str::limit($batch->external_link, 20) }}
                                        </td> --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex">
                                                <form action="{{ route('admin.sesi.tambah.manual') }}" method="POST"
                                                    class="flex flex-col items-center space-y-1">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $batch->id }}">

                                                    <button type="submit" name="action" value="tambah"
                                                        class="px-2 bg-green-600 text-white rounded hover:bg-green-700 text-lg leading-none">
                                                        +
                                                    </button>

                                                    <button type="submit" name="action" value="kurang"
                                                        class="px-2 bg-green-600 text-white rounded hover:bg-green-700 text-lg leading-none">
                                                        −
                                                    </button>
                                                </form>
                                                <!-- View -->
                                                <a href="{{ route('admin.program-layanan.detail', [$programLayanan->id, $batch->id]) }}"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-150">
                                                    Detail
                                                </a>
                                                <!-- Edit -->
                                                <a href="{{ route('admin.program-layanan.batch.edit', [$programLayanan, $batch]) }}"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150">
                                                    <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <!-- Delete -->
                                                <form
                                                    action="{{ route('admin.program-layanan.batch.destroy', [$programLayanan, $batch]) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus batch ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center mx-1 px-3 py-3 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150">
                                                        <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
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
