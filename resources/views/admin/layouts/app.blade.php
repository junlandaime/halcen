<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    darkMode: false,
    sidebarOpen: window.innerWidth >= 768,
    init() {
        // Listen for window resize events
        window.addEventListener('resize', () => {
            // Update sidebarOpen based on window width
            if (window.innerWidth >= 768) {
                this.sidebarOpen = true;
            } else {
                this.sidebarOpen = false;
            }
        });
    }
}" :class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('title')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @if (Auth::user()->hasRole('superAdmin'))
            @include('admin.layouts.sidebar')
        @endif

        <!-- Main Content -->
        <div class="p-4 md:ml-64">
            <!-- Top Bar -->
            <div class="flex items-center justify-between mb-4">
                <button @click="sidebarOpen = !sidebarOpen"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="flex items-center">
                    <button @click="darkMode = !darkMode"
                        class="p-2 text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 mr-2">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="relative flex items-center ml-3">
                        <!-- Button -->
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button" aria-expanded="false">
                            <img class="w-8 h-8 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user() ? Auth::user()->name : '') }}"
                                alt="{{ Auth::user() ? Auth::user()->name : '' }}">
                        </button>

                        <!-- Dropdown menu -->
                        <div class="absolute right-0 top-full mt-2 w-48 z-50 hidden bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3">
                                <p class="text-sm text-gray-900 dark:text-white">
                                    {{ Auth::user() ? Auth::user()->name : '' }}</p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300">
                                    {{ Auth::user() ? Auth::user()->email : '' }}</p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300">
                                    {{ Auth::user() ? Auth::user()->roles[0]->name : '' }}</p>
                            </div>
                            <ul class="py-1">
                                <li>
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                            out</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function untuk setup dropdown toggle
            function setupDropdownToggle(buttonId, dropdownId) {
                const button = document.getElementById(buttonId);
                const dropdown = document.getElementById(dropdownId);

                if (!button || !dropdown) return; // Guard clause jika element tidak ditemukan

                // Toggle dropdown saat button diklik
                button.addEventListener('click', (e) => {
                    e.stopPropagation(); // Prevent event bubbling
                    dropdown.classList.toggle('hidden');
                    button.setAttribute('aria-expanded',
                        !dropdown.classList.contains('hidden'));
                });
            }

            // Setup untuk user menu dropdown
            setupDropdownToggle('user-menu-button', 'dropdown-user');

            // Setup untuk semua dropdown yang menggunakan data-collapse-toggle
            const dropdownButtons = document.querySelectorAll('[data-collapse-toggle]');
            dropdownButtons.forEach(button => {
                const targetId = button.getAttribute('data-collapse-toggle');
                if (targetId) {
                    button.addEventListener('click', (e) => {
                        e.stopPropagation();
                        const targetElement = document.getElementById(targetId);
                        if (targetElement) {
                            targetElement.classList.toggle('hidden');
                        }
                    });
                }
            });

            // Global click handler untuk menutup semua dropdown saat klik di luar
            document.addEventListener('click', () => {
                // Tutup user menu dropdown
                const userMenu = document.getElementById('dropdown-user');
                if (userMenu && !userMenu.classList.contains('hidden')) {
                    userMenu.classList.add('hidden');
                    document.getElementById('user-menu-button')?.setAttribute('aria-expanded', 'false');
                }

                // Tutup semua dropdown yang menggunakan data-collapse-toggle
                document.querySelectorAll('[data-collapse-toggle]').forEach(button => {
                    const targetId = button.getAttribute('data-collapse-toggle');
                    const targetElement = document.getElementById(targetId);
                    if (targetElement && !targetElement.classList.contains('hidden')) {
                        targetElement.classList.add('hidden');
                    }
                });
            });
        });
    </script>
</body>

</html>
