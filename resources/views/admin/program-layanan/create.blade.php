@extends('admin.layouts.app')

@section('title')
    <title>Tambah Program/Layanan Baru - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        Tambah Program Baru
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

                <form action="{{ route('admin.program-layanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Program
                            </label>
                            <input type="text" name="nama_program" value="{{ old('nama_program') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Banner Program
                            </label>
                            <input type="text" name="nama_banner" value="{{ old('nama_banner') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tipe Kelas
                            </label>
                            <select name="tipe_kelas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                required>
                                <option value="">Pilih Tipe Kelas</option>
                                <option value="online" {{ old('tipe_kelas') == 'online' ? 'selected' : '' }}>Online</option>
                                <option value="offline" {{ old('tipe_kelas') == 'offline' ? 'selected' : '' }}>Offline
                                </option>
                                <option value="hybrid" {{ old('tipe_kelas') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Durasi
                            </label>
                            <input type="text" name="durasi" value="{{ old('durasi') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Banner Program
                            </label>
                            <input type="file" name="gambar_banner"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Deskripsi
                            </label>
                            <textarea name="deskripsi" rows="4"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                required>{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Deskripsi Lengkap
                            </label>
                            <textarea name="deskripsi_lengkap" rows="4" id="content"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                required>{{ old('deskripsi_lengkap') }}</textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Materi Program
                            </label>
                            <div class="space-y-2" x-data="{ items: {{ old('materi') ? json_encode(old('materi')) : '[]' }} }">
                                <template x-for="(item, index) in items" :key="index">
                                    <div class="flex gap-2">
                                        <input type="text" :name="'materi[' + index + ']'" x-model="items[index]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <button type="button" @click="items.splice(index, 1)"
                                            class="px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </div>
                                </template>
                                <button type="button" @click="items.push('')"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                    Tambah Materi
                                </button>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Manfaat Program
                            </label>
                            <div class="space-y-2" x-data="{ items: {{ old('manfaat') ? json_encode(old('manfaat')) : '[]' }} }">
                                <template x-for="(item, index) in items" :key="index">
                                    <div class="flex gap-2">
                                        <input type="text" :name="'manfaat[' + index + ']'" x-model="items[index]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <button type="button" @click="items.splice(index, 1)"
                                            class="px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </div>
                                </template>
                                <button type="button" @click="items.push('')"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                    Tambah Manfaat
                                </button>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Capaian
                            </label>
                            <div class="space-y-2" x-data="{ items: {{ old('persyaratan') ? json_encode(old('persyaratan')) : '[]' }} }">
                                <template x-for="(item, index) in items" :key="index">
                                    <div class="flex gap-2">
                                        <input type="text" :name="'persyaratan[' + index + ']'" x-model="items[index]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <button type="button" @click="items.splice(index, 1)"
                                            class="px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </div>
                                </template>
                                <button type="button" @click="items.push('')"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                    Tambah Persyaratan
                                </button>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Alur Proses
                            </label>
                            <div class="space-y-2" x-data="{ items: {{ old('alur_proses') ? json_encode(old('alur_proses')) : '[]' }} }">
                                <template x-for="(item, index) in items" :key="index">
                                    <div class="flex gap-2">
                                        <input type="text" :name="'alur_proses[' + index + ']'" x-model="items[index]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                        <button type="button" @click="items.splice(index, 1)"
                                            class="px-3 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </div>
                                </template>
                                <button type="button" @click="items.push('')"
                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                    Tambah Alur
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('admin.program-layanan.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                            Simpan Program
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endpush
