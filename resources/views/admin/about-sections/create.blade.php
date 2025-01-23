@extends('admin.layouts.app')

@section('content')
    <div class="container px-6 mx-auto grid md:ml-64">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Tambah Bagian - {{ $about->title }}
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <form action="{{ route('admin.about-sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="about_id" value="{{ $about->id }}">

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
                        Konten
                    </label>
                    <textarea name="content" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        Gambar
                    </label>
                    <input type="file" name="image" class="mt-1 block w-full">
                    @error('image')
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
                        <label class="block text-sm font-medium text-gray-700">
                            Status
                        </label>
                        <select name="is_active"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            <option value="1" {{ old('is_active', true) ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ old('is_active', true) ? '' : 'selected' }}>Nonaktif</option>
                        </select>
                        @error('is_active')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                        Simpan
                    </button>
                    <a href="{{ route('admin.abouts.edit', $about) }}"
                        class="ml-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
