@extends('template.layouts.index')

@section('title')
    <title>Manajemen Hero Slides - Admin</title>
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
            <h2 class="text-2xl my-5 font-semibold text-gray-700">Manajemen Hero Slides</h2>
            <div class="flex items-center justify-end mb-4">
                <button type="button" data-modal-target="crud-modal" id="create-btn" data-modal-toggle="crud-modal"
                    class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2">
                    Tambah Slide
                </button>
            </div>

            <!-- Slide List -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">Image</th>
                                    <th class="px-4 py-3">Title</th>
                                    <th class="px-4 py-3">Subtitle</th>
                                    <th class="px-4 py-3">Tag</th>
                                    <th class="px-4 py-3">Active</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $slide)
                                    <tr class="border-b" data-id="{{ $slide->id }}">
                                        <td class="px-4 py-3">
                                            <i class="fas fa-grip-vertical handle cursor-move"></i>
                                        </td>
                                        <td class="px-4 py-3">
                                            @if($slide->image)
                                                <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->title }}" class="w-16 h-12 object-cover rounded">
                                            @else
                                                <div class="w-16 h-12 bg-gray-100 rounded flex items-center justify-center">
                                                    <i class="fa fa-image text-gray-400"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 font-medium">{{ Str::limit($slide->title, 30) }}</td>
                                        <td class="px-4 py-3">{{ Str::limit($slide->subtitle, 25) }}</td>
                                        <td class="px-4 py-3">{{ $slide->tag_text }}</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full {{ $slide->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $slide->is_active ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-2">
                                                <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                                    class="px-3 py-1.5 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 edit-slide"
                                                    data-slide='@json($slide)'>
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </button>
                                                <button data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                                    data-slide-id="{{ $slide->id }}" type="button"
                                                    class="px-3 py-1.5 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 delete-slide-btn">
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
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900" id="modal-title">Tambah Slide</h3>
                        <button type="button" class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                        </button>
                    </div>
                    <form class="p-4 md:p-5" id="slide-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.hero-slides.store') }}">
                        @csrf
                        <input type="hidden" name="_method" id="form-method" value="POST">
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="title" id="slide-title" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Subtitle</label>
                                    <input type="text" name="subtitle" id="slide-subtitle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Tag Text</label>
                                    <input type="text" name="tag_text" id="slide-tag" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                                <div class="col-span-2">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                    <textarea name="description" id="slide-description" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"></textarea>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Hashtag</label>
                                    <input type="text" name="hashtag" id="slide-hashtag" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="#halalitumudah">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Order</label>
                                    <input type="number" name="order" id="slide-order" value="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Button Text</label>
                                    <input type="text" name="button_text" id="slide-btn-text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Button Link</label>
                                    <input type="text" name="button_link" id="slide-btn-link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                                    <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                                </div>
                                <div class="flex items-end">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="slide-active" name="is_active" value="1" checked class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded">
                                        <label for="slide-active" class="ml-2 text-sm text-gray-900">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" id="submit-button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                Simpan
                            </button>
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
                    <div class="p-4"><p class="text-sm text-gray-600">Apakah Anda yakin ingin menghapus slide ini?</p></div>
                    <div class="flex justify-end gap-2 p-4 border-t">
                        <form id="delete-slide-form" method="POST">
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
            const form = document.getElementById('slide-form');
            const method = document.getElementById('form-method');
            const title = document.getElementById('modal-title');
            form.reset();
            form.action = '{{ route("admin.hero-slides.store") }}';
            method.value = 'POST';
            title.textContent = 'Tambah Slide';
            document.getElementById('slide-active').checked = true;
        }, 5);
    });

    document.querySelectorAll('.edit-slide').forEach(btn => {
        btn.addEventListener('click', function() {
            setTimeout(() => {
                const d = JSON.parse(this.getAttribute('data-slide'));
                const form = document.getElementById('slide-form');
                form.action = '/admin/hero-slides/' + d.id;
                document.getElementById('form-method').value = 'PUT';
                document.getElementById('modal-title').textContent = 'Edit Slide';
                document.getElementById('slide-title').value = d.title || '';
                document.getElementById('slide-subtitle').value = d.subtitle || '';
                document.getElementById('slide-tag').value = d.tag_text || '';
                document.getElementById('slide-description').value = d.description || '';
                document.getElementById('slide-hashtag').value = d.hashtag || '';
                document.getElementById('slide-order').value = d.order || 0;
                document.getElementById('slide-btn-text').value = d.button_text || '';
                document.getElementById('slide-btn-link').value = d.button_link || '';
                document.getElementById('slide-active').checked = d.is_active;
            }, 5);
        });
    });

    document.querySelectorAll('.delete-slide-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.getAttribute('data-slide-id');
            document.getElementById('delete-slide-form').action = '/admin/hero-slides/' + id;
        });
    });
});
</script>
@endpush
