@php
    $headerPrograms = $headerPrograms ?? collect();
    $headerAbouts = $headerAbouts ?? collect();
@endphp

<header class="md:fixed w-full z-50 bg-white/95 backdrop-blur-sm shadow-sm" x-data="{ isOpen: false, dropdowns: { program: false, mitra: false } }">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('front.index') }}" class="text-primary text-xl font-bold flex items-center gap-2">
                <img src="{{ asset('logohalcen.png') }}" alt="Logo" class="h-8 rounded">
                Pusat Halal Salman ITB
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex items-center gap-6">
                <a href="{{ route('front.index') }}"
                    class="transition-colors {{ request()->routeIs('front.index') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                    Beranda
                </a>

                <!-- Program Dropdown -->
                <div class="relative" @mouseenter="dropdowns.program = true" @mouseleave="dropdowns.program = false">
                    <button
                        class="transition-colors flex items-center gap-1 {{ request()->routeIs('program-layanan.*') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                        Program & layanan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.program" x-transition
                        class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        @foreach ($headerPrograms as $program)
                            <a href="{{ route('program-layanan.show', $program) }}"
                                class="block px-4 py-2 transition-colors {{ request()->routeIs('program-layanan.show') && request()->segment(2) == $program->slug ? 'text-primary bg-gray-50 font-medium' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">
                                {{ $program->nama_program }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Konten Dropdown -->
                <div class="relative" @mouseenter="dropdowns.konten = true" @mouseleave="dropdowns.konten = false">
                    <button
                        class="transition-colors flex items-center gap-1 {{ request()->routeIs('videos.*') || request()->routeIs('articles.*') || request()->routeIs('regulations.*') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                        Konten
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.konten" x-transition
                        class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        <a href="{{ route('videos.index') }}"
                            class="block px-4 py-2 transition-colors {{ request()->routeIs('videos.*') ? 'text-primary bg-gray-50 font-medium' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">
                            Video Pembelajaran
                        </a>
                        <a href="{{ route('articles.index') }}"
                            class="block px-4 py-2 transition-colors {{ request()->routeIs('articles.*') ? 'text-primary bg-gray-50 font-medium' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">
                            Artikel dan Publikasi
                        </a>
                        <a href="{{ route('regulations.index') }}"
                            class="block px-4 py-2 transition-colors {{ request()->routeIs('regulations.*') ? 'text-primary bg-gray-50 font-medium' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">
                            Regulasi Halal
                        </a>
                    </div>
                </div>

                <!-- Tentang Dropdown -->
                <div class="relative" @mouseenter="dropdowns.tentang = true" @mouseleave="dropdowns.tentang = false">
                    <button
                        class="transition-colors flex items-center gap-1 {{ request()->routeIs('abouts.*') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                        Tentang Kami
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.tentang" x-transition
                        class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        @foreach ($headerAbouts as $about)
                            <a href="{{ route('abouts.show', $about) }}"
                                class="block px-4 py-2 transition-colors {{ request()->routeIs('abouts.show') && request()->segment(2) == $about->slug ? 'text-primary bg-gray-50 font-medium' : 'text-gray-600 hover:text-primary hover:bg-gray-50' }}">
                                {{ $about->title }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('front.kontak') }}"
                    class="transition-colors {{ request()->routeIs('front.kontak') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                    Kontak
                </a>
                @auth

                    <a href="{{ Auth::user()->hasRole('superAdmin') ? route('admin.dashboard') : route('dashboard') }}"
                        class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Masuk
                    </a>
                @endauth

            </nav>

            <!-- Mobile Menu Button -->
            <button @click="isOpen = !isOpen" class="md:hidden text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" x-transition class="md:hidden py-4">
            <nav class="flex flex-col gap-4">
                <a href="{{ route('front.index') }}"
                    class="transition-colors {{ request()->routeIs('front.index') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                    Beranda
                </a>

                <!-- Mobile Program Dropdown -->
                <div class="relative">
                    <button @click="dropdowns.program = !dropdowns.program"
                        class="transition-colors flex items-center justify-between w-full {{ request()->routeIs('program-layanan.*') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                        Program & Layanan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.program" x-transition class="pl-4 mt-2 flex flex-col gap-2">
                        @foreach ($headerPrograms as $program)
                            <a href="{{ route('program-layanan.show', $program) }}"
                                class="transition-colors {{ request()->routeIs('program-layanan.show') && request()->segment(2) == $program->slug ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                                {{ $program->nama_program }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Mobile Konten Dropdown -->
                <div class="relative">
                    <button @click="dropdowns.konten = !dropdowns.konten"
                        class="transition-colors flex items-center justify-between w-full {{ request()->routeIs('videos.*') || request()->routeIs('articles.*') || request()->routeIs('regulations.*') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                        Konten
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.konten" x-transition class="pl-4 mt-2 flex flex-col gap-2">
                        <a href="{{ route('videos.index') }}"
                            class="transition-colors {{ request()->routeIs('videos.*') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                            Video Pembelajaran
                        </a>
                        <a href="{{ route('articles.index') }}"
                            class="transition-colors {{ request()->routeIs('articles.*') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                            Artikel dan Publikasi
                        </a>
                        <a href="{{ route('regulations.index') }}"
                            class="transition-colors {{ request()->routeIs('regulations.*') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                            Regulasi Halal
                        </a>
                    </div>
                </div>

                <!-- Mobile Tentang Dropdown -->
                <div class="relative">
                    <button @click="dropdowns.tentang = !dropdowns.tentang"
                        class="transition-colors flex items-center justify-between w-full {{ request()->routeIs('abouts.*') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                        Tentang Kami
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.tentang" x-transition class="pl-4 mt-2 flex flex-col gap-2">
                        @foreach ($headerAbouts as $about)
                            <a href="{{ route('abouts.show', $about) }}"
                                class="transition-colors {{ request()->routeIs('abouts.show') && request()->segment(2) == $about->slug ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                                {{ $about->title }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('front.kontak') }}"
                    class="transition-colors {{ request()->routeIs('front.kontak') ? 'text-primary font-medium' : 'text-gray-600 hover:text-primary' }}">
                    Kontak
                </a>

                <a href="{{ route('login') }}"
                    class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-center">
                    Masuk
                </a>
            </nav>
        </div>
    </div>
</header>

@push('scripts')
    <script>
        // Add scroll event listener for header background
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            header.classList.toggle('bg-white/95', window.scrollY > 0);
        });
    </script>
@endpush
