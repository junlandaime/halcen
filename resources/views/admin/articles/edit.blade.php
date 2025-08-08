@extends('template.layouts.index')

@section('title')
    <title>Edit Artikel - Admin Pusat Halal Salman ITB</title>
@endsection

@push('styles')
    <style>
        .btn-enhanced {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-enhanced:hover::before {
            left: 100%;
        }

        .btn-enhanced:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-enhanced:active {
            transform: translateY(0);
        }

        .btn-back {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-back:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-update {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            border: none;
            color: white;
            box-shadow: 0 4px 15px rgba(72, 187, 120, 0.3);
        }

        .btn-update:hover {
            background: linear-gradient(135deg, #38a169 0%, #2f855a 100%);
            box-shadow: 0 8px 25px rgba(72, 187, 120, 0.4);
        }

        .icon-animate {
            transition: transform 0.3s ease;
        }

        .btn-enhanced:hover .icon-animate {
            transform: translateX(-3px);
        }

        .btn-update:hover .icon-animate {
            transform: scale(1.1);
        }
    </style>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="p-4 md:ml-64">
        <!-- Enhanced Top Bar -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Artikel</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Perbarui konten dan informasi artikel Anda</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <!-- Enhanced Back Button -->
                    <a href="{{ Auth::user()->hasRole('superAdmin') ? route('admin.articles.index') : route('article.index') }}"
                        class="btn-enhanced btn-back inline-flex items-center px-6 py-3 font-medium text-sm rounded-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 mr-2 icon-animate" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Kembali ke List Artikel</span>
                    </a>

                    <!-- Enhanced Update Button -->
                    <button type="submit" form="article-form"
                        class="btn-enhanced btn-update inline-flex items-center px-6 py-3 font-medium text-sm rounded-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800">
                        <svg class="w-5 h-5 mr-2 icon-animate" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Update Artikel</span>
                    </button>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-4 mb-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.268 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800 dark:text-red-400">
                            Terdapat kesalahan pada form:
                        </h3>
                        <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Enhanced Article Form -->
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Artikel</h2>
            </div>

            <div class="p-6">
                <form id="article-form" action="{{ route('admin.articles.update', $article) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-6 mb-6">
                        <!-- Title Field -->
                        <div x-data="{ pesan: '{{ old('title', $article->title) }}' }" class="space-y-2">
                            <label for="title" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Judul Artikel
                            </label>
                            <input x-model="pesan" type="text" name="title" id="title"
                                value="{{ old('title', $article->title) }}"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                placeholder="Masukkan judul artikel" required>
                            <div class="flex justify-between items-center">
                                <p class="text-sm" :class="pesan.length > 75 ? 'text-red-500' : 'text-green-600'"
                                    x-text="pesan.length + ' karakter'"></p>
                                <span class="text-xs text-gray-500">Maksimal 75 karakter</span>
                            </div>
                            @error('title')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category Field -->
                        <div class="space-y-2">
                            <label for="category" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Kategori
                            </label>
                            <select name="category_id" id="category_id"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @empty
                                    <option>Tidak ada kategori tersedia</option>
                                @endforelse
                            </select>
                            @error('category')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Excerpt Field -->
                        <div class="space-y-2">
                            <label for="excerpt" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Ringkasan
                            </label>
                            <textarea id="excerpt" name="excerpt" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                placeholder="Tulis ringkasan artikel di sini...">{{ old('excerpt', $article->excerpt) }}</textarea>
                            @error('excerpt')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Featured Image Field -->
                        <div class="space-y-2">
                            <label for="featured-image" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Gambar Utama
                            </label>
                            @if ($article->featured_image)
                                <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl">
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="Current Featured Image"
                                        class="max-w-xs rounded-lg shadow-md">
                                </div>
                            @endif
                            <input type="file" name="featured_image" id="featured-image"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                accept="image/*">
                            @error('featured-image')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content Field -->
                        <div class="space-y-2">
                            <label for="content" class="block text-sm font-medium text-gray-900 dark:text-white">
                                Konten Artikel
                            </label>
                            <textarea class="w-full summernote" id="content" name="content">{{ old('content', $article->content) }}</textarea>
                            @error('content')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status and Date Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">
                                    Status
                                </label>
                                <select id="status" name="status"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
                                    <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>
                                    <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>
                                        Published
                                    </option>
                                </select>
                                @error('status')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="published_at" class="block text-sm font-medium text-gray-900 dark:text-white">
                                    Tanggal Publish
                                </label>
                                <input type="date" name="published_at" id="published_at"
                                    value="{{ old('published_at', $article->published_at ? date('Y-m-d', strtotime($article->published_at)) : '') }}"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
                            </div>
                        </div>
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

        // Enhanced button interactions
        document.querySelectorAll('.btn-enhanced').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
@endpush
