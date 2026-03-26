<x-guest-layout>
    {{-- Logo Halcen --}}
    <div class="mx-auto w-full max-w-sm mt-4">
        <a href="/">
            <img src="{{ asset('logolph.png') }}" alt="Logo Halal Center" class="mx-auto h-32 mt-4">
        </a>
    </div>

    {{-- Card Login --}}
    <div class="w-full max-w-md mx-auto mt-6 bg-white shadow-lg rounded-xl p-6">

        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        {{-- ALERT ERROR (validation & pesan manual) --}}
        @if ($errors->any() || session('error'))
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-3 text-red-700 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    @if (session('error'))
                        <li>{{ session('error') }}</li>
                    @endif
                </ul>
            </div>
        @endif

        {{-- ALERT SUCCESS --}}
        @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-50 border border-green-200 p-3 text-green-700 text-sm">
                {{ session('status') }}
            </div>
        @endif

        {{-- TOMBOL GOOGLE --}}
        <div class="mb-6">
            <a href="{{ route('login.google') }}"
                class="flex items-center justify-center w-full gap-3 border border-gray-300 rounded-md px-4 py-2
                      bg-white hover:bg-gray-100 transition text-sm font-medium">
                {{-- SVG logo “G” --}}
                <svg class="w-5 h-5" viewBox="0 0 533.5 544.3">
                    <path fill="#4285F4"
                        d="M533.5 278.4c0-18.8-1.6-37-4.6-54.6H272v103.1h146.9c-6.3 33.9-25 62.7-53.3 82l86.1 66.9c50.2-46.3 79.8-114.6 79.8-197.4z" />
                    <path fill="#34A853"
                        d="M272 544.3c72.2 0 132.7-23.9 176.9-65.1l-86.1-66.9c-24 16.1-54.8 25.6-90.8 25.6-69.9 0-129.3-47.2-150.4-110.4l-88.5 68.5C75 482.5 167.6 544.3 272 544.3z" />
                    <path fill="#FBBC04"
                        d="M121.6 327.5c-10.3-30.1-10.3-62.6 0-92.7l-88.5-68.5C-13.3 240.2-13.3 304.1 33.1 359.9l88.5-32.4z" />
                    <path fill="#EA4335"
                        d="M272 108.4c39.3-.6 77.1 14 104.7 40.2l78.3-78.3C406.8 23.2 341.5-1.3 272 0 167.6 0 75 61.8 33.1 153l88.5 68.5C142.7 172.7 202.1 108.4 272 108.4z" />
                </svg>
                <span>Login dengan Google</span>
            </a>
        </div>

        {{-- Garis pemisah --}}
        <div class="flex items-center mb-6">
            <hr class="flex-grow border-t border-gray-200">
            <span class="px-3 text-xs text-gray-400">atau</span>
            <hr class="flex-grow border-t border-gray-200">
        </div>

        {{-- Form Email / Password --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" required autofocus
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            {{-- Remember Me --}}
            <div class="mb-4 flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">Ingat saya</label>
            </div>

            {{-- Aksi --}}
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
                    Login
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
