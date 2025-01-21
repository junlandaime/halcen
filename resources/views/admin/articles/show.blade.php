@extends('admin.layouts.app')

@section('title', $article->title)

@push('styles')
    <style>
        /* Article Section */
        .article {
            padding: 4rem 0;
        }

        .article .container {
            max-width: 56rem;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .article p.lead {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .article h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 3rem 0 1.5rem;
            color: black;
        }

        .article p {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .article .list {
            margin: 1rem 0;
        }

        .article .list div {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .article .list span {
            color: #16A34A;
        }

        .article .highlight {
            background-color: #F9FAFB;
            border-radius: 0.75rem;
            padding: 2rem;
            margin: 3rem 0;
        }

        .article .highlight h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: black;
        }

        .article blockquote {
            border-left: 4px solid #16A34A;
            padding-left: 1.5rem;
            margin: 3rem 0;
        }

        .article blockquote p {
            font-size: 1.25rem;
            font-style: italic;
            margin-bottom: 0.5rem;
        }

        .article blockquote cite {
            font-size: 0.875rem;
            color: #6B7280;
            font-style: normal;
        }
    </style>
@endpush

@section('content')
    <!-- Main Content -->
    <div class="p-4 md:ml-64">
        <!-- Top Bar -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">View Article</h1>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.articles.edit', $article) }}"
                    class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2">
                    Edit Article
                </a>
                <a href="{{ Auth::user()->hasRole('superAdmin') ? route('admin.articles.index') : route('article.index') }}"
                    class="text-white bg-primary hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    Back to List
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <!-- Main Content Column -->
            <div class="lg:col-span-2">
                <!-- Article Content -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg mb-4">
                    <div class="p-4 flex justify-between items-center border-b">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Article Content</h2>
                        <div class="flex space-x-2">
                            <span
                                class="px-2 py-1 text-xs font-semibold rounded-full {{ $article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($article->status) }}
                            </span>
                            @if ($article->is_featured)
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Featured
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="p-4">
                        @if ($article->featured_image)
                            <div class="mb-4">
                                <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                                    class="w-full rounded-lg">
                            </div>
                        @endif

                        <h2 class="text-xl font-bold mb-3 text-gray-900 dark:text-white">{{ $article->title }}</h2>

                        @if ($article->excerpt)
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 mb-4">
                                <h6 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">Excerpt</h6>
                                <p class="text-gray-800 dark:text-gray-200">{{ $article->excerpt }}</p>
                            </div>
                        @endif

                        <div class="prose dark:prose-invert max-w-none article">
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>

                <!-- Related Articles -->
                @if ($relatedArticles->count() > 0)
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                        <div class="p-4 border-b">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Related Articles</h2>
                        </div>
                        <div class="p-4">
                            <div class="divide-y">
                                @foreach ($relatedArticles as $relatedArticle)
                                    <a href="{{ route('admin.articles.show', $relatedArticle) }}"
                                        class="block py-3 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <div class="flex justify-between">
                                            <h6 class="font-medium text-gray-900 dark:text-white">
                                                {{ $relatedArticle->title }}</h6>
                                            <span
                                                class="text-sm text-gray-500">{{ $relatedArticle->published_at?->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            {{ Str::limit($relatedArticle->excerpt ?? strip_tags($relatedArticle->content), 100) }}
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-4">
                <!-- Article Meta -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Article Details</h2>
                    </div>
                    <div class="p-4 space-y-4">
                        <div>
                            <h6 class="font-medium text-gray-900 dark:text-white">Category</h6>
                            <p class="text-gray-600 dark:text-gray-400">{{ $article->category->name }}</p>
                        </div>

                        <div>
                            <h6 class="font-medium text-gray-900 dark:text-white">Author</h6>
                            <p class="text-gray-600 dark:text-gray-400">{{ $article->author->name }}</p>
                        </div>

                        <div>
                            <h6 class="font-medium text-gray-900 dark:text-white">Created At</h6>
                            <p class="text-gray-600 dark:text-gray-400">{{ $article->created_at->format('F d, Y H:i') }}
                            </p>
                        </div>

                        @if ($article->published_at)
                            <div>
                                <h6 class="font-medium text-gray-900 dark:text-white">Published At</h6>
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ $article->published_at->format('F d, Y H:i') }}</p>
                            </div>
                        @endif

                        <div>
                            <h6 class="font-medium text-gray-900 dark:text-white">Last Updated</h6>
                            <p class="text-gray-600 dark:text-gray-400">{{ $article->updated_at->format('F d, Y H:i') }}
                            </p>
                        </div>

                        <div>
                            <h6 class="font-medium text-gray-900 dark:text-white">Slug</h6>
                            <p class="text-gray-600 dark:text-gray-400 break-all">{{ $article->slug }}</p>
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">SEO Information</h2>
                    </div>
                    <div class="p-4 space-y-4">
                        <div>
                            <h6 class="font-medium text-gray-900 dark:text-white">Meta Description</h6>
                            <p class="text-gray-600 dark:text-gray-400 break-all">
                                {{ $article->meta_description ?? 'Not set' }}</p>
                        </div>

                        <div>
                            <h6 class="font-medium text-gray-900 dark:text-white">Meta Keywords</h6>
                            @if ($article->meta_keywords)
                                <div class="flex flex-wrap gap-2">
                                    @foreach (explode(',', $article->meta_keywords) as $keyword)
                                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">
                                            {{ trim($keyword) }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-600 dark:text-gray-400">Not set</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Quick Actions</h2>
                    </div>
                    <div class="p-4 space-y-3">
                        <form action="{{ route('admin.articles.toggleStatus', $article) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-white {{ $article->status === 'published' ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-green-500 hover:bg-green-600' }} focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2">
                                {{ $article->status === 'published' ? 'Unpublish' : 'Publish' }}
                            </button>
                        </form>

                        <form action="{{ route('admin.articles.toggleFeatured', $article) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                                {{ $article->is_featured ? 'Remove from Featured' : 'Mark as Featured' }}
                            </button>
                        </form>

                        <a href="{{ route('articles.show', $article) }}" target="_blank"
                            class="block w-full text-center text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">
                            View on Site
                        </a>

                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this article?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                                Delete Article
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .prose img {
            @apply max-w-full h-auto;
        }
    </style>
@endpush
