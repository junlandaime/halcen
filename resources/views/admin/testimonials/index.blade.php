@extends('admin.layouts.app')

@section('title')
    <title>Manajemen Testimonial - Admin</title>
@endsection

@section('content')
    <div x-data="{ showAddModal: false, showEditModal: false, editingTestimonial: null }" class="min-h-screen">
        <!-- Main Content -->
        <div class="p-4 md:ml-64">
            <!-- Top Bar -->
            <div class="flex items-center justify-between mb-4">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>
                <div class="flex items-center space-x-2">
                    <button type="button" @click="showAddModal = true"
                        class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
                        Tambah Testimonial
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
                            <tbody id="testimonials-tbody">
                                @foreach ($testimonials as $testimonial)
                                    <tr class="border-b dark:border-gray-700" data-id="{{ $testimonial->id }}">
                                        <td class="px-4 py-3">
                                            <i class="fas fa-grip-vertical handle cursor-move"></i>
                                        </td>
                                        <td class="px-4 py-3">
                                            <img src="{{ Storage::url($testimonial->image) }}"
                                                alt="{{ $testimonial->name }}" class="w-12 h-12 object-cover rounded-full">
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
                                                <button type="button"
                                                    @click="editingTestimonial = {{ json_encode($testimonial) }}; showEditModal = true"
                                                    class="text-blue-600 hover:text-blue-900">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
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

        <!-- Create Testimonial Modal -->
        <div x-show="showAddModal" x-cloak
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center p-4">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add New Testimonial</h3>
                            <button type="button" @click="showAddModal = false"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="name" name="name" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label for="position"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="position" name="position" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label for="company"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="company" name="company" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                </div>
                                <div class="col-span-2">
                                    <label for="image"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo <span
                                            class="text-red-500">*</span></label>
                                    <input type="file" id="image" name="image" required accept="image/*"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                                </div>
                                <div class="col-span-2">
                                    <label for="content"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content <span
                                            class="text-red-500">*</span></label>
                                    <textarea id="content" name="content" rows="4" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"></textarea>
                                </div>
                                <div>
                                    <label for="rating"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating <span
                                            class="text-red-500">*</span></label>
                                    <select id="rating" name="rating" required
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
                                        <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                            class="w-4 h-4 text-primer-600 bg-gray-100 border-gray-300 rounded focus:ring-primer-500">
                                        <label for="is_featured" class="ml-2 text-sm text-gray-900 dark:text-white">Mark
                                            as featured</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:outline-none focus:ring-primer-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save
                                Testimonial</button>
                            <button type="button" @click="showAddModal = false"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Testimonial Modal -->
        <div x-show="showEditModal" x-cloak
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center p-4">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    {{-- <form id="editTestimonialForm" method="POST" enctype="multipart/form-data"
                        x-bind:action="'/admin/testimonials/' + editingTestimonial?.id"> --}}
                    <form id="editTestimonialForm" method="POST" enctype="multipart/form-data"
                        x-bind:action="'{{ url('/admin/testimonials') }}/' + editingTestimonial?.id">
                        @csrf
                        @method('PUT')
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Testimonial</h3>
                            <button type="button" @click="showEditModal = false"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="col-span-2">
                                    <label for="edit_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="edit_name" name="name" required
                                        x-model="editingTestimonial?.name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label for="edit_position"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="edit_position" name="position" required
                                        x-model="editingTestimonial?.position"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label for="edit_company"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="edit_company" name="company" required
                                        x-model="editingTestimonial?.company"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5">
                                </div>
                                <div class="col-span-2">
                                    <label for="edit_image"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                                    <input type="file" id="edit_image" name="image" accept="image/*"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                                    <div class="mt-2">
                                        <template x-if="editingTestimonial?.image">
                                            <img :src="'/storage/' + editingTestimonial?.image"
                                                :alt="editingTestimonial?.name"
                                                class="w-12 h-12 object-cover rounded-full">
                                        </template>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <label for="edit_content"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content <span
                                            class="text-red-500">*</span></label>
                                    <textarea id="edit_content" name="content" rows="4" required x-model="editingTestimonial?.content"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5"></textarea>
                                </div>
                                <div>
                                    <label for="edit_rating"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating <span
                                            class="text-red-500">*</span></label>
                                    <select id="edit_rating" name="rating" required x-model="editingTestimonial?.rating"
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
                                        <input type="hidden" name="is_featured" value="0">
                                        <!-- Ini akan terkirim jika checkbox tidak dicentang -->
                                        <input type="checkbox" id="edit_is_featured" name="is_featured" value="1"
                                            :checked="editingTestimonial?.is_featured"
                                            class="w-4 h-4 text-primer-600 bg-gray-100 border-gray-300 rounded focus:ring-primer-500">
                                        <label for="edit_is_featured"
                                            class="ml-2 text-sm text-gray-900 dark:text-white">Mark as featured</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:outline-none focus:ring-primer-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
                                Testimonial</button>
                            <button type="button" @click="showEditModal = false"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Sortable(document.getElementById('testimonials-tbody'), {
                handle: '.handle',
                animation: 150,
                onEnd: function(evt) {
                    const items = [...evt.to.children].map((tr, index) => ({
                        id: tr.dataset.id,
                        order: index + 1
                    }));

                    fetch('{{ route('admin.testimonials.updateOrder') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            orders: items
                        })
                    });
                }
            });
        });
    </script>
@endpush
