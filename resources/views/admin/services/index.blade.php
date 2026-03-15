@extends('template.layouts.index')

@section('title')
    <title>Manajemen Services - Admin</title>
@endsection

@section('content')
    @foreach (['deleted' => 'red', 'updated' => 'green', 'success' => 'blue'] as $key => $color)
        @if (session($key))
            <div id="alert-{{ $key }}"
                class="flex items-center p-4 mb-4 text-sm text-{{ $color }}-800 rounded-lg bg-{{ $color }}-50"
                role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                </svg>
                <div><span class="font-medium">Berhasil!</span> {{ session($key) }}</div>
            </div>
        @endif
    @endforeach

    <div class="min-h-screen">
        <div class="p-4 md:ml-64">
            <h2 class="text-2xl my-5 font-semibold text-gray-700">Manajemen Layanan (Services)</h2>
            <div class="flex items-center justify-end mb-4">
                <button type="button" data-modal-target="crud-modal" id="create-btn" data-modal-toggle="crud-modal"
                    class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2">
                    Tambah Service
                </button>
            </div>

            <!-- Service List -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">Icon</th>
                                    <th class="px-4 py-3">Title</th>
                                    <th class="px-4 py-3">Description</th>
                                    <th class="px-4 py-3">Active</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr class="border-b" data-id="{{ $service->id }}">
                                        <td class="px-4 py-3"><i class="fas fa-grip-vertical handle cursor-move"></i></td>
                                        <td class="px-4 py-3"><i class="fa {{ $service->icon }} text-2xl text-[#1a6e3c]"></i></td>
                                        <td class="px-4 py-3 font-medium">{{ $service->title }}</td>
                                        <td class="px-4 py-3"><div class="max-w-xs overflow-hidden text-ellipsis">{{ Str::limit($service->description, 60) }}</div></td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $service->is_active ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-2">
                                                <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                                    class="px-3 py-1.5 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 edit-service"
                                                    data-service='@json($service)'>
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </button>
                                                <button data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                                    data-service-id="{{ $service->id }}" type="button"
                                                    class="px-3 py-1.5 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 delete-service-btn">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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

        <!-- CRUD Modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900" id="modal-title">Tambah Service</h3>
                        <button type="button" class="text-gray-400 hover:bg-gray-200 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                        </button>
                    </div>
                    <form class="p-4 md:p-5" id="service-form" method="POST" action="{{ route('admin.services.store') }}">
                        @csrf
                        <input type="hidden" name="_method" id="form-method" value="POST">
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Icon (Font Awesome class) <span class="text-red-500">*</span></label>
                                <input type="text" name="icon" id="svc-icon" required placeholder="fa-utensils" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                <p class="text-xs text-gray-400 mt-1">Contoh: fa-utensils, fa-wine-glass-alt, fa-pills, fa-spray-can</p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-500">*</span></label>
                                <input type="text" name="title" id="svc-title" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                <textarea name="description" id="svc-description" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"></textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Link</label>
                                    <input type="text" name="link" id="svc-link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Order</label>
                                    <input type="number" name="order" id="svc-order" value="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="svc-active" name="is_active" value="1" checked class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded">
                                <label for="svc-active" class="ml-2 text-sm text-gray-900">Active</label>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" id="submit-button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="delete-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between p-4 border-b">
                        <h3 class="text-xl font-semibold text-gray-900">Konfirmasi Hapus</h3>
                        <button type="button" data-modal-hide="delete-modal" class="text-gray-400 hover:bg-gray-200 rounded-lg w-8 h-8 inline-flex justify-center items-center">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                        </button>
                    </div>
                    <div class="p-4"><p class="text-sm text-gray-600">Apakah Anda yakin ingin menghapus service ini?</p></div>
                    <div class="flex justify-end gap-2 p-4 border-t">
                        <form id="delete-service-form" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm">Hapus</button>
                        </form>
                        <button data-modal-hide="delete-modal" type="button" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 text-sm">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    ['alert-deleted', 'alert-updated', 'alert-success'].forEach(id => {
        const el = document.getElementById(id);
        if (el) setTimeout(() => el.style.display = 'none', 3000);
    });

    document.getElementById('create-btn').addEventListener('click', function() {
        setTimeout(() => {
            const form = document.getElementById('service-form');
            form.reset();
            form.action = '{{ route("admin.services.store") }}';
            document.getElementById('form-method').value = 'POST';
            document.getElementById('modal-title').textContent = 'Tambah Service';
            document.getElementById('svc-active').checked = true;
        }, 5);
    });

    document.querySelectorAll('.edit-service').forEach(btn => {
        btn.addEventListener('click', function() {
            setTimeout(() => {
                const d = JSON.parse(this.getAttribute('data-service'));
                const form = document.getElementById('service-form');
                form.action = '/admin/services/' + d.id;
                document.getElementById('form-method').value = 'PUT';
                document.getElementById('modal-title').textContent = 'Edit Service';
                document.getElementById('svc-icon').value = d.icon || '';
                document.getElementById('svc-title').value = d.title || '';
                document.getElementById('svc-description').value = d.description || '';
                document.getElementById('svc-link').value = d.link || '';
                document.getElementById('svc-order').value = d.order || 0;
                document.getElementById('svc-active').checked = d.is_active;
            }, 5);
        });
    });

    document.querySelectorAll('.delete-service-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('delete-service-form').action = '/admin/services/' + this.getAttribute('data-service-id');
        });
    });
});
</script>
@endpush
