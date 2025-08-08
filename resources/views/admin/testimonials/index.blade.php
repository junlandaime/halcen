@extends('template.layouts.index')

@section('title')
    <title>Manajemen Testimonial - Admin</title>
@endsection

@section('content')
    @foreach (['deleted' => 'red', 'updated' => 'green', 'success' => 'blue'] as $key => $color)
        @if (session($key))
            <div id="alert-{{ $key }}"
                class="flex items-center p-4 mb-4 text-sm text-{{ $color }}-800 rounded-lg bg-{{ $color }}-50 dark:bg-gray-800 dark:text-{{ $color }}-400"
                role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                </svg>
                <span class="sr-only">Success</span>
                <div>
                    <span class="font-medium">Berhasil!</span> {{ session($key) }}
                </div>
            </div>
        @endif
    @endforeach
    @php
        $disableOverflowHidden = true;
    @endphp
    <div class="min-h-screen">
        <!-- Main Content -->
        <div class="p-4 md:ml-64">
            <!-- Top Bar -->
            <h2 class="text-2xl my-5 font-semibold text-gray-700">
                Manajemen Testimonial
            </h2>
            <div class="flex items-center justify-end mb-4">
                <div class="flex items-center space-x-1">
                    <button type="button" data-modal-target="crud-modal" id="create-partner-btn"
                        data-modal-toggle="crud-modal"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800 edit-partner">
                        Tambah Testimoni
                    </button>
                </div>
            </div>

            <!-- Testimonial List -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">Photo</th>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">Position</th>
                                    <th scope="col" class="px-4 py-3">Company</th>
                                    <th scope="col" class="px-4 py-3">Content</th>
                                    <th scope="col" class="px-4 py-3">Rating</th>
                                    <th scope="col" class="px-4 py-3">Featured</th>
                                    <th scope="col" class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr class="border-b dark:border-gray-700" data-id="{{ $testimonial->id }}">
                                        <td class="px-4 py-3">
                                            <i class="fas fa-grip-vertical handle cursor-move"></i>
                                        </td>
                                        <td class="px-4 py-3">
                                            <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}"
                                                class="w-12 h-12 object-cover rounded-full">
                                        </td>
                                        <td class="px-4 py-3">{{ $testimonial->name }}</td>
                                        <td class="px-4 py-3">{{ $testimonial->position }}</td>
                                        <td class="px-4 py-3">{{ $testimonial->company }}</td>
                                        <td class="px-4 py-3">
                                            <div class="max-w-xs overflow-hidden text-ellipsis">
                                                {{ $testimonial->content }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">{{ $testimonial->rating }}</td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="px-2 py-1 text-xs rounded-full {{ $testimonial->is_featured ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $testimonial->is_featured ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-2">
                                                <button type="button" data-modal-target="crud-modal"
                                                    data-modal-toggle="crud-modal"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150 edit-testimoni"
                                                    data-testimoni='@json($testimonial)'>
                                                    <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                                    data-testimoni-id="{{ $testimonial->id }}" type="button"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150 delete-testimoni-button">
                                                    <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="modal-title">
                            Edit Testimonial
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" id="testimonial-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="form-method" value="POST">
                        <input type="hidden" name="id" id="testimonial-id">
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="col-span-2">
                                    <label for="testimonial-name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="testimonial-name" name="name" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label for="testimonial-position"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="testimonial-position" name="position" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label for="testimonial-company"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="testimonial-company" name="company" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                </div>
                                <div class="col-span-2">
                                    <label for="testimonial-photo"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                                    <input type="file" id="testimonial-photo" name="image" accept="image/*"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                                    <div id="current-photo" class="mt-2"></div>
                                </div>
                                <div class="col-span-2">
                                    <label for="testimonial-content"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content <span
                                            class="text-red-500">*</span></label>
                                    <textarea id="testimonial-content" name="content" rows="4" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"></textarea>
                                </div>
                                <div>
                                    <label for="testimonial-rating"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating <span
                                            class="text-red-500">*</span></label>
                                    <select id="testimonial-rating" name="rating" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                        <option value="5">5 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="2">2 Stars</option>
                                        <option value="1">1 Star</option>
                                    </select>
                                </div>
                                <div>
                                    <label
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Featured</label>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="edit_is_featured" name="is_featured" value="1"
                                            class="w-4 h-4 text-primer-600 bg-gray-100 border-gray-300 rounded focus:ring-primer-500">
                                        <label for="edit_is_featured"
                                            class="ml-2 text-sm text-gray-900 dark:text-white">Mark as featured</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-1">
                            <button type="submit" id="submit-button"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Simpan
                            </button>
                        </div>
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
                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
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
                        <form id="delete-testimoni-form" method="POST">
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

            document.getElementById('create-partner-btn').addEventListener('click', function() {
                setTimeout(() => {
                    const submitButton = document.getElementById('submit-button');
                    const modalTitle = document.getElementById('modal-title');
                    const form = document.getElementById('testimonial-form');
                    const formMethod = document.getElementById('form-method');

                    if (submitButton && modalTitle) {
                        form.reset();
                        form.action = '/admin/testimonials';
                        formMethod.value = 'POST';
                        submitButton.textContent = 'Tambah Partner';
                        modalTitle.textContent = 'Tambah Partner';
                    } else {
                        console.error('Modal belum selesai dirender, elemen tidak ditemukan.');
                    }
                }, 5); // sesuaikan delay jika modal pakai animasi (bisa 200–500ms)
            });

            const editButtons = document.querySelectorAll('.edit-testimoni');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    setTimeout(() => {
                        const TestimonialData = JSON.parse(this.getAttribute(
                            'data-testimoni'));
                        const submitButton = document.getElementById('submit-button');
                        const modalTitle = document.getElementById('modal-title');
                        const form = document.getElementById('testimonial-form');
                        const formMethod = document.getElementById('form-method');

                        if (submitButton && modalTitle) {
                            document.getElementById('testimonial-id').value =
                                TestimonialData.id;
                            document.getElementById('testimonial-name').value =
                                TestimonialData.name;
                            document.getElementById('testimonial-position').value =
                                TestimonialData
                                .position;
                            document.getElementById('testimonial-company').value =
                                TestimonialData.company;
                            document.getElementById('testimonial-content').value =
                                TestimonialData.content;
                            document.getElementById('testimonial-rating').value =
                                TestimonialData.rating;
                            document.getElementById('edit_is_featured').checked =
                                TestimonialData.is_featured == 1 || TestimonialData
                                .is_featured === true;
                            form.action = '/admin/testimonials/' + TestimonialData.id;
                            formMethod.value = 'PUT';
                            modalTitle.textContent = 'Edit Testimonial';
                            submitButton.textContent = 'Update';
                        } else {
                            console.error(
                                'Modal belum selesai dirender, elemen tidak ditemukan.');
                        }
                    }, 5); // sesuaikan delay jika modal pakai animasi (bisa 200–500ms)
                });
            });

            const deleteButtons = document.querySelectorAll('.delete-testimoni-button');
            const deleteForm = document.getElementById('delete-testimoni-form');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const testimonialid = this.getAttribute('data-testimoni-id');
                    deleteForm.action = `/admin/testimonials/${testimonialid}`;
                });
            });
        });
    </script>
@endpush
