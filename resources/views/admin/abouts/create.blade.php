@extends('admin.layouts.app')

@section('title')
    <title>Tambah Halaman Tentang - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">

        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Tambah Halaman Tentang
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">
                                Judul
                            </label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">
                                Judul Hero
                            </label>
                            <input type="text" name="hero_title" value="{{ old('hero_title') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('hero_title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Deskripsi
                        </label>
                        <textarea name="description" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Subtitle Hero
                        </label>
                        <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                        @error('hero_subtitle')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Gambar Hero
                        </label>
                        <input type="file" name="hero_image" class="mt-1 block w-full">
                        @error('hero_image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Visi
                        </label>
                        <textarea name="vision" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('vision') }}</textarea>
                        @error('vision')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Misi
                        </label>
                        <div id="mission-container">
                            @if (old('mission'))
                                @foreach (old('mission') as $key => $mission)
                                    <div class="flex gap-2 mb-2">
                                        <input type="text" name="mission[]" value="{{ $mission }}"
                                            class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                        <button type="button" onclick="this.parentElement.remove()"
                                            class="px-2 py-1 text-red-600 hover:text-red-900">Hapus</button>
                                    </div>
                                @endforeach
                            @else
                                <div class="flex gap-2 mb-2">
                                    <input type="text" name="mission[]"
                                        class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    <button type="button" onclick="this.parentElement.remove()"
                                        class="px-2 py-1 text-red-600 hover:text-red-900">Hapus</button>
                                </div>
                            @endif
                        </div>
                        <button type="button" onclick="addMission()"
                            class="mt-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                            Tambah Misi
                        </button>
                        @error('mission')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">
                                Urutan
                            </label>
                            <input type="number" name="order" value="{{ old('order', 0) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('order')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1"
                                    {{ old('is_active', true) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600">Aktif</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function addMission() {
                const container = document.getElementById('mission-container');
                const div = document.createElement('div');
                div.className = 'flex gap-2 mb-2';
                div.innerHTML = `
        <input type="text" name="mission[]" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
        <button type="button" onclick="this.parentElement.remove()" class="px-2 py-1 text-red-600 hover:text-red-900">Hapus</button>
    `;
                container.appendChild(div);
            }
        </script>
    @endpush
@endsection
