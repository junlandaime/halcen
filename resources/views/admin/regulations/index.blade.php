@extends('admin.layouts.app')

@section('title')
    <title>Manajemen Regulasi - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 md:ml-64">
        <!-- Top Bar -->


        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Manajemen Regulasi
            </h2>

            <div class="flex justify-between items-center mb-6">
                <div>
                    <a href="{{ route('admin.regulations.create') }}"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark">
                        Tambah Regulasi
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
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3">Nomor</th>
                                <th class="px-4 py-3">Judul</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @foreach ($regulations as $regulation)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3">
                                        {{ $regulation->category->name }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $regulation->number }}/{{ $regulation->year }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $regulation->title }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $regulation->enacted_date->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight rounded-full {{ $regulation->is_active ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }}">
                                            {{ $regulation->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4">
                                            <a href="{{ route('admin.regulations.edit', $regulation) }}"
                                                class="text-primary hover:text-primary-dark">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.regulations.destroy', $regulation) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus regulasi ini?')">
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
                    {{ $regulations->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
