@extends('admin.layouts.app')

@section('title')
    <title>Tambah Program/Layanan Baru - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Batch - {{ $program->nama_program }}
                    </h2>
                </div>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.program-layanan.batch.update', [$program, $batch]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Batch
                            </label>
                            <input type="text" name="nama_batch" value="{{ old('nama_batch', $batch->nama_batch) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Batch Ke-
                            </label>
                            <input type="number" name="batch_ke" value="{{ old('batch_ke', $batch->batch_ke) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Mulai Pendaftaran
                            </label>
                            <input type="date" name="tanggal_mulai_pendaftaran"
                                value="{{ old('tanggal_mulai_pendaftaran', $batch->tanggal_mulai_pendaftaran->format('Y-m-d')) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Selesai Pendaftaran
                            </label>
                            <input type="date" name="tanggal_selesai_pendaftaran"
                                value="{{ old('tanggal_selesai_pendaftaran', $batch->tanggal_selesai_pendaftaran->format('Y-m-d')) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Mulai Program
                            </label>
                            <input type="date" name="tanggal_mulai_program"
                                value="{{ old('tanggal_mulai_program', $batch->tanggal_mulai_program->format('Y-m-d')) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Selesai Program
                            </label>
                            <input type="date" name="tanggal_selesai_program"
                                value="{{ old('tanggal_selesai_program', $batch->tanggal_selesai_program->format('Y-m-d')) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kuota
                            </label>
                            <input type="number" name="kuota" value="{{ old('kuota', $batch->kuota) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Harga
                            </label>
                            <input type="number" name="harga" value="{{ old('harga', $batch->harga) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Status
                            </label>
                            <select name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                required>
                                <option value="draft" {{ old('status', $batch->status) == 'draft' ? 'selected' : '' }}>
                                    Draft</option>
                                <option value="aktif" {{ old('status', $batch->status) == 'aktif' ? 'selected' : '' }}>
                                    Aktif</option>
                                <option value="selesai" {{ old('status', $batch->status) == 'selesai' ? 'selected' : '' }}>
                                    Selesai</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Link External
                            </label>
                            <input type="url" name="external_link"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"
                                value="{{ old('external_link', $batch->external_link) }}">
                            @error('external_link')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Catatan Batch
                            </label>
                            <textarea name="catatan_batch" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">{{ old('catatan_batch', $batch->catatan_batch) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('admin.program-layanan.show', $program) }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-primer-600 rounded-lg hover:bg-primer-700">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
