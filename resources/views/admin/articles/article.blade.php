<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="py-12 md:px-36">
        <!-- Top Bar -->
        <div class="flex items-center justify-between mb-4">

            <div class="flex items-center space-x-3">

                <button type="submit" form="article-form"
                    class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
                    Publish Artikel
                </button>
            </div>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <!-- Article Form -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-4">
            <form id="article-form" action="{{ route('admin.articles.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 mb-4">
                    <div x-data="{ pesan: '' }">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                            Artikel</label>
                        <input x-model="pesan" type="text" name="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-600 focus:border-primer-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500"
                            placeholder="Masukkan judul artikel" required>

                        @error('title')
                            <div class="text-sm text-red-600 space-y-1">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select name="category_id" id="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500">
                            @forelse($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @empty
                            @endforelse
                        </select>
                        @error('category')
                            <div class="text-sm text-red-600 space-y-1">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="excerpt"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ringkasan</label>
                        <textarea id="excerpt" name="excerpt" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primer-500 focus:border-primer-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500"
                            placeholder="Tulis ringkasan artikel di sini..." :value="old('excerpt')"></textarea>
                        @error('excerpt')
                            <div class="text-sm text-red-600 space-y-1">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="featured-image"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Utama</label>
                        <input type="file" name="featured_image" id="featured-image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            accept="image/*">
                        @error('featured-image')
                            <div class="text-sm text-red-600 space-y-1">* {{ $message }}</div>
                        @enderror
                    </div>
                    <div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control summernote @error('content') is-invalid @enderror" id="content" name="content">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-sm text-red-600 space-y-1">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>

                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500 @error('status') is-invalid @enderror"
                                id="status" name="status">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>
                                    Published
                                </option>
                            </select>
                            @error('status')
                                <div class="text-sm text-red-600 space-y-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>


                            <label for="published_at" class="block text-sm font-medium text-gray-700">
                                Publish Date
                            </label>
                            <input type="date" name="published_at" id="published_at"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-green-500 focus:border-green-500">
                        </div>

                        <div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_featured"
                                        name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="is_featured">Featured Article</label>
                                </div>
                            </div>

                        </div>
                        <div>
                        </div>


                    </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
</x-app-layout>
