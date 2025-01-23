@extends('admin.layouts.app')

@section('title')
    <title>User Management - Admin Panel</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">
        <!-- Top Bar -->
        <div class="flex items-center justify-between mb-4">
            <button @click="sidebarOpen = !sidebarOpen"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <a href="{{ route('admin.users.create') }}"
                class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2">
                Add User
            </a>
        </div>

        <!-- User List -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-4">Name</th>
                                <th scope="col" class="px-4 py-4">Email</th>
                                <th scope="col" class="px-4 py-4">Roles</th>
                                <th scope="col" class="px-4 py-4">Created At</th>
                                <th scope="col" class="px-4 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr class="border-b">
                                    <td class="px-4 py-3 font-medium text-gray-900">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3">
                                        @foreach ($user->roles as $role)
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-3">{{ $user->created_at->format('d M Y') }}</td>
                                    <td class="px-4 py-3 flex items-center space-x-2">
                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="text-blue-600 hover:text-blue-900">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:text-red-900">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
