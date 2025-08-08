@extends('template.layouts.index')

@section('title')
    <title>Edit User - Admin Panel</title>
@endsection

@section('content')
    <div class="p-4 md:ml-64">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Edit User: {{ $user->name }}</h2>

                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password <span class="text-gray-500 text-xs">(leave blank to keep current password)</span>
                        </label>
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primer-500 focus:ring-primer-500">
                    </div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Roles</label>
    <div class="mt-2 space-y-2">
        @foreach ($roles as $role)
            <div class="flex items-center">
                <input type="radio" name="role" value="{{ $role->name }}"
                    {{ $user->hasRole($role->name) ? 'checked' : '' }}
                    class="h-4 w-4 text-primer-600 focus:ring-primer-500 border-gray-300">
                <label class="ml-2 text-sm text-gray-700">{{ $role->name }}</label>
            </div>
        @endforeach
    </div>
    @error('role')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>


                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.users.index') }}"
                            class="bg-gray-100 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primer-500">
                            Cancel
                        </a>
                        <button type="submit"
                            class="text-white bg-green-500 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-4 py-2">
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
