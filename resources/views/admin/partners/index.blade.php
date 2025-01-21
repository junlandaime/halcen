@extends('admin.layouts.app')

@section('title')
    <title>Manajemen Mitra - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <div x-data="{ showAddModal: false, showEditModal: false, editingPartner: null }" class="min-h-screen">
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
                        Tambah Partner
                    </button>
                </div>
            </div>

            <!-- Partner List -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 mb-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500"
                                        placeholder="Cari partner" required="">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">Logo</th>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">URL</th>
                                    <th scope="col" class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="partners-tbody">
                                @foreach ($partners as $partner)
                                    <tr class="border-b dark:border-gray-700" data-id="{{ $partner->id }}">
                                        <td class="px-4 py-3">
                                            <i class="fas fa-grip-vertical handle cursor-move"></i>
                                        </td>
                                        <td class="px-4 py-3">
                                            <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                                                class="w-12 h-12 object-contain">
                                        </td>
                                        <td class="px-4 py-3">{{ $partner->name }}</td>
                                        <td class="px-4 py-3">
                                            <a href="{{ $partner->website }}" target="_blank"
                                                class="text-blue-600 hover:underline">
                                                {{ $partner->website }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-2">
                                                <button type="button"
                                                    @click="editingPartner = {{ json_encode($partner) }}; showEditModal = true"
                                                    class="text-blue-600 hover:text-blue-900">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                                <form action="{{ route('admin.partners.destroy', $partner) }}"
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

        <!-- Create Partner Modal -->
        <div x-show="showAddModal" x-cloak
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center p-4">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add New Partner</h3>
                            <button type="button" @click="showAddModal = false"
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
                            <div class="mb-6">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500">
                            </div>
                            <div class="mb-6">
                                <label for="url"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website <span
                                        class="text-red-500">*</span></label>
                                <input type="url" id="website" name="website" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500">
                            </div>
                            <div class="mb-6">
                                <label for="logo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo <span
                                        class="text-red-500">*</span></label>
                                <input type="file" id="logo" name="logo" required accept="image/*"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            </div>
                        </div>
                        <div
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:outline-none focus:ring-primer-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primer-600 dark:hover:bg-primer-700 dark:focus:ring-primer-800">Save
                                Partner</button>
                            <button type="button" @click="showAddModal = false"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Partner Modal -->
        <div x-show="showEditModal" x-cloak
            class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center p-4">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <form id="editPartnerForm" method="POST" enctype="multipart/form-data"
                        x-bind:action="'/admin/partners/' + editingPartner?.id">
                        @csrf
                        @method('PUT')
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Partner</h3>
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
                            <div class="mb-6">
                                <label for="edit_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="edit_name" name="name" required
                                    x-model="editingPartner?.name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500">
                            </div>
                            <div class="mb-6">
                                <label for="edit_url"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website <span
                                        class="text-red-500">*</span></label>
                                <input type="url" id="edit_url" name="website" required
                                    x-model="editingPartner?.website"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primer-500 dark:focus:border-primer-500">
                            </div>
                            <div class="mb-6">
                                <label for="edit_logo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo</label>
                                <input type="file" id="edit_logo" name="logo" accept="image/*"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                <div id="current_logo" class="mt-2">
                                    <template x-if="editingPartner?.logo">
                                        <img :src="'/storage/' + editingPartner?.logo" :alt="editingPartner?.name"
                                            class="w-12 h-12 object-contain">
                                    </template>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:outline-none focus:ring-primer-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primer-600 dark:hover:bg-primer-700 dark:focus:ring-primer-800">Update
                                Partner</button>
                            <button type="button" @click="showEditModal = false"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
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
            // Initialize Sortable
            new Sortable(document.getElementById('partners-tbody'), {
                handle: '.handle',
                animation: 150,
                onEnd: function(evt) {
                    // Update order after drag and drop
                    const items = [...evt.to.children].map((tr, index) => ({
                        id: tr.dataset.id,
                        order: index
                    }));

                    // Send order update to server
                    fetch('{{ route('admin.partners.updateOrder') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            orders: items.map(item => item.id)
                        })
                    });
                }
            });
        });
    </script>
@endpush
