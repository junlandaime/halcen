@extends('template.layouts.index')

@section('title')
    <title>User Management - Admin Panel</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">
        {{-- Top-Bar --}}
        <div class="flex items-center justify-end mb-4">
            <a href="{{ route('admin.users.create') }}"
               class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">
                Add User
            </a>
        </div>

        {{-- Flash Message --}}
        @foreach (['success','error'] as $msg)
            @if(session($msg))
                <div class="mb-4 p-3 rounded {{ $msg=='success'
                      ? 'bg-green-50 border border-green-200 text-green-800'
                      : 'bg-red-50 border border-red-200 text-red-800' }}">
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach

        {{-- User List --}}
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Roles</th>
                                <th class="px-4 py-3">2-FA</th>
                                <th class="px-4 py-3">Created</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="border-b">
                                    <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3">
                                        @foreach ($user->roles as $role)
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded mr-1">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>

                                    {{-- Status 2FA --}}
                                    <td class="px-4 py-3">
                                        @if($user->two_factor_secret)
                                            <span class="text-green-600 font-semibold">Aktif</span>
                                            <a href="{{ route('admin.users.qr', $user) }}"
                                               class="ml-1 text-xs text-indigo-600 underline">QR</a>
                                        @else
                                            <span class="text-red-600 font-semibold">Nonaktif</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">{{ $user->created_at->format('d M Y') }}</td>

                                    {{-- Aksi --}}
                                    <td class="px-4 py-3 flex items-center space-x-2">
                                        {{-- Edit --}}
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                           class="text-blue-600 hover:text-blue-900">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                                 viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                                                 d="M15.232 5.232l3.536 3.536M9 11l6 6M13 7l4 4m-9 2l-4 4m0 0H3v-3l4-4"/></svg>
                                        </a>

                                        {{-- Hapus --}}
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                              onsubmit="return confirm('Hapus user ini?');">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600 hover:text-red-900">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
                                                     viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                                                     d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </form>

                                        {{-- Toggle 2FA --}}
                                        @if(auth()->user()->hasRole('superAdmin') && auth()->id() !== $user->id)
                                            @if($user->two_factor_secret)
                                                {{-- Nonaktifkan --}}
                                                <form action="{{ route('admin.users.disable2fa', $user) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <button type="submit"
                                                            class="text-xs px-2 py-1 rounded bg-red-500 hover:bg-red-600 text-white">
                                                        Nonaktifkan 2FA
                                                    </button>
                                                </form>
                                            @else
                                                {{-- Aktifkan --}}
                                                <form action="{{ route('admin.users.enable2fa', $user) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <button type="submit"
                                                            class="text-xs px-2 py-1 rounded bg-green-500 hover:bg-green-600 text-white">
                                                        Aktifkan 2FA
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center py-4">No users found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-4">{{ $users->links() }}</div>
            </div>
        </div>
    </div>
@endsection
