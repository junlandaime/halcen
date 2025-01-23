@extends('admin.layouts.app')

@section('title')
    <title>Edit Halaman Tentang - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">

        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Edit Halaman Tentang
            </h2>

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Main About Form -->
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <form action="{{ route('admin.abouts.update', $about) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">
                                Judul
                            </label>
                            <input type="text" name="title" value="{{ old('title', $about->title) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">
                                Judul Hero
                            </label>
                            <input type="text" name="hero_title" value="{{ old('hero_title', $about->hero_title) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('hero_title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Deskripsi
                        </label>
                        <textarea name="description" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('description', $about->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Subtitle Hero
                        </label>
                        <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $about->hero_subtitle) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                        @error('hero_subtitle')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Gambar Hero
                        </label>
                        @if ($about->hero_image)
                            <div class="mt-2">
                                <img src="{{ Storage::url($about->hero_image) }}" alt="{{ $about->title }}"
                                    class="w-32 h-32 object-cover rounded">
                            </div>
                        @endif
                        <input type="file" name="hero_image" class="mt-1 block w-full">
                        @error('hero_image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Visi
                        </label>
                        <textarea name="vision" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">{{ old('vision', $about->vision) }}</textarea>
                        @error('vision')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">
                            Misi
                        </label>
                        <div id="mission-container">
                            @foreach (old('mission', $about->mission ?? []) as $mission)
                                <div class="flex gap-2 mb-2">
                                    <input type="text" name="mission[]" value="{{ $mission }}"
                                        class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                    <button type="button" onclick="this.parentElement.remove()"
                                        class="px-2 py-1 text-red-600 hover:text-red-900">Hapus</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" onclick="addMission()"
                            class="mt-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                            Tambah Misi
                        </button>
                        @error('mission')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">
                                Urutan
                            </label>
                            <input type="number" name="order" value="{{ old('order', $about->order) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            @error('order')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">
                                Status
                            </label>
                            <select name="is_active"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                                <option value="1" {{ old('is_active', $about->is_active) ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="0" {{ old('is_active', $about->is_active) ? '' : 'selected' }}>Nonaktif
                                </option>
                            </select>
                            @error('is_active')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Sections -->
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Bagian</h3>
                <div class="space-y-4">
                    @foreach ($about->sections as $section)
                        <div class="border p-4 rounded-lg">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-medium">{{ $section->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ Str::limit($section->content, 100) }}</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button onclick="editSection({{ $section->id }})"
                                        class="text-primary hover:text-primary-dark">Edit</button>
                                    <form action="{{ route('admin.about-sections.destroy', $section) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Yakin ingin menghapus bagian ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            @if ($section->image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($section->image) }}" alt="{{ $section->title }}"
                                        class="w-20 h-20 object-cover rounded">
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <button onclick="addSection()"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                        Tambah Bagian
                    </button>
                </div>
            </div>

            <!-- Teams -->
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Tim</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($about->teams as $team)
                        <div class="border p-4 rounded-lg">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-medium">{{ $team->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $team->position }}</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button onclick="editTeam({{ $team->id }})"
                                        class="text-primary hover:text-primary-dark">Edit</button>
                                    <form action="{{ route('admin.about-teams.destroy', $team) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Yakin ingin menghapus anggota tim ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            @if ($team->image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($team->image) }}" alt="{{ $team->name }}"
                                        class="w-20 h-20 object-cover rounded-full">
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <button onclick="addTeam()" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                        Tambah Anggota Tim
                    </button>
                </div>
            </div>

            <!-- Programs -->
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Program</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($about->programs as $program)
                        <div class="border p-4 rounded-lg">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-medium">{{ $program->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ Str::limit($program->description, 100) }}</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button onclick="editProgram({{ $program->id }})"
                                        class="text-primary hover:text-primary-dark">Edit</button>
                                    <form action="{{ route('admin.about-programs.destroy', $program) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Yakin ingin menghapus program ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                            @if ($program->icon)
                                <div class="mt-2">
                                    <i class="{{ $program->icon }} text-2xl text-primary"></i>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <button onclick="addProgram()"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                        Tambah Program
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function addMission() {
                const container = document.getElementById('mission-container');
                const div = document.createElement('div');
                div.className = 'flex gap-2 mb-2';
                div.innerHTML = `
        <input type="text" name="mission[]" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
        <button type="button" onclick="this.parentElement.remove()" class="px-2 py-1 text-red-600 hover:text-red-900">Hapus</button>
    `;
                container.appendChild(div);
            }

            function addSection() {
                window.location.href = "{{ route('admin.about-sections.create', ['about_id' => $about->id]) }}";
            }

            function editSection(id) {
                window.location.href = `/admin/about-sections/${id}/edit`;
            }

            function addTeam() {
                window.location.href = "{{ route('admin.about-teams.create', ['about_id' => $about->id]) }}";
            }

            function editTeam(id) {
                window.location.href = `/admin/about-teams/${id}/edit`;
            }

            function addProgram() {
                window.location.href = "{{ route('admin.about-programs.create', ['about_id' => $about->id]) }}";
            }

            function editProgram(id) {
                window.location.href = `/admin/about-programs/${id}/edit`;
            }
        </script>
    @endpush
@endsection
