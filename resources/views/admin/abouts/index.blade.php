@extends('admin.layouts.app')

@section('title')
    <title>Manajemen Halaman Tentang - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">

        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Manajemen Halaman Tentang
            </h2>

            <div class="flex justify-between items-center mb-6">
                <div>
                    <a href="{{ route('admin.abouts.create') }}"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                        Tambah Halaman
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                                <th class="px-4 py-3">Judul</th>
                                <th class="px-4 py-3">Slug</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Urutan</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @foreach ($abouts as $about)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            @if ($about->hero_image)
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="{{ Storage::url($about->hero_image) }}"
                                                        alt="{{ $about->title }}">
                                                </div>
                                            @endif
                                            <div>
                                                <p class="font-semibold">{{ $about->title }}</p>
                                                <p class="text-xs text-gray-600">{{ Str::limit($about->description, 50) }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $about->slug }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight rounded-full {{ $about->is_active ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }}">
                                            {{ $about->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $about->order }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <div class="flex items-center space-x-4">
                                            <a href="{{ route('admin.abouts.edit', $about) }}"
                                                class="text-primary hover:text-primary-dark">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.abouts.destroy', $about) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus halaman ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 border-t">
                    {{ $abouts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
