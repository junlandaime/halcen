@extends('admin.layouts.app')

@section('content')
    <div class="container px-6 mx-auto grid md:ml-64">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Edit Program - {{ $aboutProgram->about->title }}
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <form action="{{ route('admin.about-programs.update', $aboutProgram) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        Judul Program
                    </label>
                    <input type="text" name="title" value="{{ old('title', $aboutProgram->title) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        Deskripsi
                    </label>
                    <textarea name="description" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('description', $aboutProgram->description) }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">
                        Icon (Font Awesome Class)
                    </label>
                    <input type="text" name="icon" value="{{ old('icon', $aboutProgram->icon) }}"
                        placeholder="fas fa-example"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                    <p class="mt-1 text-sm text-gray-500">Contoh: fas fa-users, fas fa-building, dll.</p>
                    @if ($aboutProgram->icon)
                        <div class="mt-2">
                            <i class="{{ $aboutProgram->icon }} text-2xl text-primary"></i>
                            <span class="ml-2 text-sm text-gray-600">Icon saat ini</span>
                        </div>
                    @endif
                    @error('icon')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Urutan
                        </label>
                        <input type="number" name="order" value="{{ old('order', $aboutProgram->order) }}"
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
                            <option value="1" {{ old('is_active', $aboutProgram->is_active) ? 'selected' : '' }}>Aktif
                            </option>
                            <option value="0" {{ old('is_active', $aboutProgram->is_active) ? '' : 'selected' }}>
                                Nonaktif</option>
                        </select>
                        @error('is_active')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.abouts.edit', $aboutProgram->about_id) }}"
                        class="ml-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @endpush
@endsection
