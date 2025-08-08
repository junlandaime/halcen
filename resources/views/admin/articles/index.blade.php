@extends('template.layouts.index')

@section('title')
    <title>Manajemen Artikel - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 md:ml-64">
        <!-- Top Bar -->
        <h2 class="text-2xl font-semibold text-gray-700">
            Manajemen Artikel
        </h2>
        <div class="flex items-center justify-end mb-4">
            <div class="flex items-center space-x-1">
                <a href="{{ route('admin.articles.create') }}"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
                    Tambah Artikel
                </a>
                <a href="{{ route('admin.categories.index') }}"
                    class="text-gray-700 bg-white border border-gray-300 shadow-sm hover:bg-gray-50 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2">
                    {{-- class="bg-white px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50"> --}}
                    Kategori
                </a>
            </div>
        </div>

        <!-- Article List -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
            <div class="p-8">
                <div>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="selection-table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                @foreach (['Judul', 'Kategori', 'Penulis', 'Tanggal', 'Status', 'Featured', 'Actions'] as $label)
                                    <th scope="col" class="px-4 py-4 text-center">
                                        <div class="flex items-center justify-center uppercase text-black dark:text-white">
                                            {{ $label }}
                                            <svg class="w-4 h-4 ml-1 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 15l4 4 4-4m0-6l-4-4-4 4" />
                                            </svg>
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $article)
                                <tr class="border-b hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-600">
                                    <td
                                        class="px-4 py-3 font-medium text-gray-900 dark:text-white whitespace-nowrap flex items-center gap-3">
                                        @if ($article->featured_image)
                                            <img src="{{ Storage::url($article->featured_image) }}"
                                                alt="{{ $article->title }}"
                                                class="w-[50px] h-[50px] object-cover rounded" />
                                        @endif
                                        <span>{{ $article->title }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-center align-middle">{{ $article->category->name }}</td>
                                    <td class="px-4 py-3 text-center align-middle">{{ $article->author->name }}</td>
                                    <td class="px-4 py-3 text-center align-middle">
                                        {{ $article->published_at ? $article->published_at->format('d M Y H:i') : '-' }}
                                    </td>
                                    <td class="px-4 py-3 text-center align-middle">
                                        <span
                                            class="px-2.5 py-0.5 rounded text-xs font-medium
                        {{ $article->status === 'published'
                            ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
                            : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                            {{ ucfirst($article->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-center align-middle">
                                        <span
                                            class="px-2.5 py-0.5 rounded text-xs font-medium
                        {{ $article->is_featured
                            ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300'
                            : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' }}">
                                            {{ $article->is_featured ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex justify-center">
                                            <!-- View -->
                                            <a href="{{ route('admin.articles.show', $article->slug) }}"
                                                class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150">
                                                <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>

                                            <!-- Edit -->
                                            <a href="{{ route('admin.articles.edit', $article) }}"
                                                class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150">
                                                <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this article?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150">
                                                    <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                            {{-- <!-- View -->
                                            <a href="{{ route('admin.articles.show', $article->slug) }}"
                                                class="text-green-600 hover:text-green-900">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <!-- Edit -->
                                            <a href="{{ route('admin.articles.edit', $article) }}"
                                                class="text-blue-600 hover:text-blue-900">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <!-- Delete -->
                                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                                class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this article?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-3 text-center text-gray-500">No articles found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush

{{-- @section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Articles</h1>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create New Article
            </a>
        </div>

        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="articles-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Published At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $article)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if ($article->featured_image)
                                                <img src="{{ Storage::url($article->featured_image) }}"
                                                    alt="{{ $article->title }}" class="img-thumbnail me-2"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                            {{ $article->title }}
                                        </div>
                                    </td>
                                    <td>{{ $article->category->name }}</td>
                                    <td>{{ $article->author->name }}</td>
                                    <td>
                                        <span
                                            class="badge badge-{{ $article->status === 'published' ? 'success' : 'warning' }}">
                                            {{ ucfirst($article->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $article->is_featured ? 'info' : 'secondary' }}">
                                            {{ $article->is_featured ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                    <td>{{ $article->published_at ? $article->published_at->format('d M Y H:i') : '-' }}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.articles.edit', $article) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.articles.show', $article->slug) }}"
                                                class="btn btn-sm btn-info" target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this article?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No articles found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#articles-table').DataTable({
                "order": [
                    [5, "desc"]
                ],
                "pageLength": 10,
            });
        });
    </script>
@endpush --}}
