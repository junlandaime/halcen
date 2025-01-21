@extends('admin.layouts.app')

@section('title')
    <title>Kategori Video - Admin Pusat Halal Salman ITB</title>
@endsection
@section('content')
    <div x-data="{ showAddModal: false, showEditModal: false }" class="min-h-screen">
        <!-- Main Content -->
        <div class="p-4 md:ml-64">
            <!-- Categories Management -->
            <main class="p-6">
                <!-- Header -->
                <div class="mb-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Manage Categories</h1>
                            <p class="mt-1 text-sm text-gray-600">
                                Manage your categories efficiently
                            </p>
                        </div>
                        <button @click="showAddModal = true"
                            class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
                            Add Category
                        </button>
                    </div>
                </div>

                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Categories Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse($categories as $category)
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900">{{ $category->name }}</h3>
                                    <p class="mt-1 text-sm text-gray-500">{{ $category->videos_count }} video</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button @click="showEditModal = true" class="text-gray-400 hover:text-gray-500"
                                        data-category="{{ json_encode($category) }}">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('admin.video-categories.destroy', $category) }}" method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500"
                                            {{ $category->videos_count > 0 ? 'disabled' : '' }}>
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-sm text-gray-600">{{ $category->description }}</p>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    {{ number_format($category->views ?? 0) }} views
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-4 text-gray-500">
                            No categories found.
                        </div>
                    @endforelse
                </div>

                <div class="mt-6">
                    {{ $categories->links() }}
                </div>

                <!-- Add Category Modal -->
                <div x-show="showAddModal"
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center p-4 md:ml-64">
                    <div class="bg-white rounded-lg p-6 max-w-md w-full">
                        <form action="{{ route('admin.video-categories.store') }}" method="POST">
                            @csrf
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900">Add New Category</h3>
                                <button @click="showAddModal = false" type="button"
                                    class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" id="name" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" id="description" rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500 sm:text-sm"></textarea>
                                </div>
                            </div>
                            <div class="mt-5 flex justify-end space-x-3">
                                <button type="button" @click="showAddModal = false"
                                    class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primer-500 focus:ring-offset-2">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="rounded-md bg-primer-600 px-4 py-2 text-sm font-medium text-white hover:bg-primer-700 focus:outline-none focus:ring-2 focus:ring-primer-500 focus:ring-offset-2">
                                    Create Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Category Modal -->
                <div x-show="showEditModal"
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center p-4 md:ml-64">
                    <div class="bg-white rounded-lg p-6 max-w-md w-full">
                        <form id="editCategoryForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900">Edit Category</h3>
                                <button @click="showEditModal = false" type="button"
                                    class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label for="edit_name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" id="edit_name" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="edit_description"
                                        class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea name="description" id="edit_description" rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500 sm:text-sm"></textarea>
                                </div>
                            </div>
                            <div class="mt-5 flex justify-end space-x-3">
                                <button type="button" @click="showEditModal = false"
                                    class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primer-500 focus:ring-offset-2">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="rounded-md bg-primer-600 px-4 py-2 text-sm font-medium text-white hover:bg-primer-700 focus:outline-none focus:ring-2 focus:ring-primer-500 focus:ring-offset-2">
                                    Update Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            // Handle edit category modal
            const editButtons = document.querySelectorAll('[data-category]');
            editButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const category = JSON.parse(button.dataset.category);
                    document.getElementById('edit_name').value = category.name;
                    document.getElementById('edit_description').value = category.description;
                    document.getElementById('editCategoryForm').action =
                        `/admin/video-categories/${category.id}`;
                });
            });

            // Show validation errors in modals if any
            @if ($errors->any())
                @if (old('_method') == 'PUT')
                    window.showEditModal = true;
                @else
                    window.showAddModal = true;
                @endif
            @endif
        });
    </script>
@endpush
