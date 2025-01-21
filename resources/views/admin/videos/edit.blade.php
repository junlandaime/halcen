@extends('admin.layouts.app')

@section('title')
    <title>Edit Video - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Video
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('admin.videos.update', $video) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Kategori Video
                        </label>
                        <select name="video_category_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $video->video_category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('video_category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Judul Video
                        </label>
                        <input type="text" name="title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                            value="{{ old('title', $video->title) }}">
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Deskripsi
                        </label>
                        <textarea name="description" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('description', $video->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            ID Video YouTube
                        </label>
                        <input type="text" name="youtube_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                            value="{{ old('youtube_id', $video->youtube_id) }}">
                        <p class="mt-1 text-sm text-gray-500">Contoh: Jika URL video adalah
                            https://www.youtube.com/watch?v=ABC123, maka ID-nya adalah ABC123</p>
                        @error('youtube_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Durasi (menit)
                        </label>
                        <input type="number" name="duration"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                            value="{{ old('duration', $video->duration) }}">
                        @error('duration')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Urutan
                        </label>
                        <input type="number" name="order"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                            value="{{ old('order', $video->order) }}">
                        @error('order')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active"
                                class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50"
                                value="1" {{ old('is_active', $video->is_active) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-600">Aktif</span>
                        </label>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
