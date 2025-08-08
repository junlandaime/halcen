@extends('template.layouts.index')

@section('title')
    <title>Kategori Artikel - Admin Pusat Halal Salman ITB</title>
@endsection
@section('content')
    <div x-data="{ showAddModal: false, showEditModal: false }" class="min-h-screen">
        <!-- Main Content -->
        <div class="p-4 md:ml-64">
            <!-- Categories Management -->
            <main class="p-6">
                <!-- Header -->
                <div class="mb-6">
                    <div class="flex justify-between items-end">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">Manage Categories</h1>
                            <p class="mt-1 text-sm text-gray-600">
                                Manage your categories efficiently
                            </p>
                        </div>
                        <button type="button" data-modal-target="crud-modal" id="create-categories-btn"
                            data-modal-toggle="crud-modal"
                            class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800 edit-partner">
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
                                    <p class="mt-1 text-sm text-gray-500">{{ $category->articles_count }} articles</p>
                                </div>
                                <div class="flex flex-col">
                                    <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                        class="inline-flex items-center my-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150 edit-categories"
                                        data-categories='@json($category)'>
                                        <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                        data-categories-id="{{ $category->id }}" type="button"
                                        class="inline-flex items-center my-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150 delete-categories-button">
                                        <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
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

                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modal-title">
                                    Edit Partner
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" id="categories-form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" id="form-method" value="POST">
                                <input type="hidden" name="id" id="categories-id">

                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="name" class="block text-sm font-bold text-gray-700">Name</label>
                                        <input type="text" name="name" id="name" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500 sm:text-sm">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="description"
                                            class="block text-sm font-bold text-gray-700">Description</label>
                                        <textarea name="description" id="description" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500 sm:text-sm"></textarea>
                                    </div>
                                </div>
                                <button type="submit" id="submit-button"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="default-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Konfirmasi Hapus
                                </h3>
                                <button type="button" data-modal-hide="default-modal"
                                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                            <div class="p-4">
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    Apakah Anda yakin ingin menghapus item ini?
                                </p>
                            </div>
                            <div class="flex justify-end gap-2 p-4 border-t border-gray-200 dark:border-gray-600">
                                <form id="delete-categories-form" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm">
                                        Hapus
                                    </button>
                                </form>
                                <button data-modal-hide="default-modal" type="button"
                                    class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 text-sm dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ['alert-deleted', 'alert-updated', 'success'].forEach(id => {
                const alert = document.getElementById(id);
                if (alert) {
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 3000);
                }
            });

            document.getElementById('create-categories-btn').addEventListener('click', function() {
                setTimeout(() => {
                    const form = document.getElementById('categories-form');
                    const submitButton = document.getElementById('submit-button');
                    const modalTitle = document.getElementById('modal-title');
                    const formMethod = document.getElementById('form-method');

                    if (submitButton && modalTitle) {
                        form.reset();
                        form.action = '/admin/categories';
                        formMethod.value = 'POST';
                        submitButton.textContent = 'Tambah Category';
                        modalTitle.textContent = 'Tambah Category';
                    } else {
                        console.error('Modal belum selesai dirender, elemen tidak ditemukan.');
                    }
                }, 5); // sesuaikan delay jika modal pakai animasi (bisa 200–500ms)
            });

            const editButtons = document.querySelectorAll('.edit-categories');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    setTimeout(() => {
                        const CategoriesData = JSON.parse(this.getAttribute(
                            'data-categories'));
                        const submitButton = document.getElementById('submit-button');
                        const modalTitle = document.getElementById('modal-title');
                        const form = document.getElementById('categories-form');
                        const formMethod = document.getElementById('form-method');

                        if (submitButton && modalTitle) {
                            document.getElementById('categories-id').value =
                                CategoriesData.id;
                            document.getElementById('name').value =
                                CategoriesData.name;
                            document.getElementById('description').value =
                                CategoriesData
                                .description;
                            form.action = '/admin/categories/' + CategoriesData.id;
                            formMethod.value = 'PUT';
                            modalTitle.textContent = 'Edit Category';
                            submitButton.textContent = 'Update';
                        } else {
                            console.error(
                                'Modal belum selesai dirender, elemen tidak ditemukan.');
                        }
                    }, 5); // sesuaikan delay jika modal pakai animasi (bisa 200–500ms)
                });
            });

            const deleteButtons = document.querySelectorAll('.delete-categories-button');
            const deleteForm = document.getElementById('delete-categories-form');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    console.log("Form Action:", deleteForm.action);
                    const categoriesid = this.getAttribute('data-categories-id');
                    deleteForm.action = `/admin/categories/${categoriesid}`;
                });
            });
        });
    </script>
@endpush
