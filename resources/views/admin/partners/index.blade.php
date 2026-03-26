@extends('template.layouts.index')

@section('title')
    <title>Manajemen Mitra - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    @foreach (['deleted' => 'red', 'updated' => 'green'] as $key => $color)
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
            <h2 class="text-2xl my-5 font-semibold text-gray-700">
                Manajemen Partners
            </h2>
            <div class="flex items-center justify-end mb-4">
                <div class="flex items-center space-x-1">
                    <button type="button" data-modal-target="crud-modal" id="create-partner-btn"
                        data-modal-toggle="crud-modal"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800 edit-partner">
                        Tambah Mitra
                    </button>
                </div>
            </div>
            <!-- Partner List -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="search-table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">Logo</th>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">URL</th>
                                    <th scope="col" class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                                <button type="button" data-modal-target="crud-modal"
                                                    data-modal-toggle="crud-modal"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150 edit-partner"
                                                    data-partner='@json($partner)'>
                                                    <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                {{-- <button type="button"
                                                    @click="editingPartner = {{ json_encode($partner) }}; showEditModal = true"
                                                    class="text-blue-600 hover:text-blue-900">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button> --}}
                                                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                                    data-partner-id="{{ $partner->id }}" type="button"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-150 delete-partner-button">
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
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" id="partner-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="form-method" value="POST">
                        <input type="hidden" name="id" id="partner-id">

                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="partner-name"
                                    class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="partner-name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                            </div>
                            <div class="col-span-2">
                                <label for="partner-website"
                                    class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Website URL</label>
                                <input type="url" name="website" id="partner-website"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                            </div>
                            <div class="col-span-2">
                                <label for="partner-logo"
                                    class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Logo</label>
                                <input type="file" name="logo" id="partner-logo"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                <div id="current-logo" class="mt-2"></div>
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
                        <form id="delete-partner-form" method="POST">
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

        {{-- <!-- Create Partner Modal -->
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
    </div> --}}
    @endsection

    @push('scripts')
        {{-- <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
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
        </script> --}}
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
                    const form = document.getElementById('partner-form');
                    form.reset();
                    form.action = '/admin/partners';
                    document.getElementById('form-method').value = 'POST';
                    document.getElementById('current-logo').innerHTML = '';

                    // Ubah teks
                    document.getElementById('submit-button').textContent = 'Tambah Partner';
                    document.getElementById('modal-title').textContent = 'Tambah Partner';
                });

                const editButtons = document.querySelectorAll('.edit-partner');
                editButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const partnerData = JSON.parse(this.getAttribute('data-partner'));
                        document.getElementById('partner-id').value = partnerData.id;
                        document.getElementById('partner-name').value = partnerData.name;
                        document.getElementById('partner-website').value = partnerData.website;

                        const baseUrl = window.location.origin;
                        const logoPath = `/storage/${partnerData.logo}`;
                        const currentLogoDiv = document.getElementById('current-logo');
                        currentLogoDiv.innerHTML = `
            <p class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Current Logo:</p>
            <img src="${logoPath}" alt="${partnerData.name}" class="w-16 h-16 object-contain mt-1">
        `;

                        const form = document.getElementById('partner-form');
                        form.action = '/admin/partners/' + partnerData.id;
                        document.getElementById('form-method').value = 'PUT';

                        // Ubah teks
                        document.getElementById('submit-button').textContent = 'Update Partner';
                        document.getElementById('modal-title').textContent = 'Edit Partner';
                    });
                });

                const deleteButtons = document.querySelectorAll('.delete-partner-button');
                const deleteForm = document.getElementById('delete-partner-form');

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const partnerId = this.getAttribute('data-partner-id');
                        deleteForm.action = `/admin/partners/${partnerId}`;
                    });
                });
                // const editButtons = document.querySelectorAll('.edit-partner');
                // editButtons.forEach(button => {
                //     button.addEventListener('click', function() {
                //         const partnerData = JSON.parse(this.getAttribute('data-partner'));
                //         document.getElementById('partner-id').value = partnerData.id;
                //         document.getElementById('partner-name').value = partnerData.name;
                //         document.getElementById('partner-website').value = partnerData.website;

                //         const baseUrl = window.location.origin;
                //         const logoPath = `${baseUrl}/${partnerData.logo}`;
                //         const currentLogoDiv = document.getElementById('current-logo');
                //         currentLogoDiv.innerHTML = `
        //     <p class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Current Logo:</p>
        //     <img src="${logoPath}" alt="${partnerData.name}" class="w-16 h-16 object-contain mt-1">
        // `;

                //         const form = document.getElementById('partner-form');
                //         form.action = '/admin/partners/' + partnerData.id;
                //     });
                // });
            });
        </script>
    @endpush
