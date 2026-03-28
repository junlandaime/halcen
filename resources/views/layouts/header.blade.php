@php
    $headerPrograms = $headerPrograms ?? collect();
    $headerAbouts = $headerAbouts ?? collect();
@endphp

<header class="sticky top-0 z-50 bg-white shadow-sm" x-data="{ profileOpen: false, serviceOpen: false, pubOpen: false, mob: false }">
    <div class="max-w-screen-xl mx-auto px-8 py-3 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('front.index') }}" class="flex items-center gap-3">
            @if (file_exists(public_path('logolph.png')))
                <img src="{{ asset('logolph.png') }}" alt="Logo" class="h-12 w-auto rounded">
            @else
                <div
                    class="w-14 h-14 rounded-full border-2 border-[#4a86b8] flex items-center justify-center bg-white relative">
                    <i class="fa fa-mosque text-[#4a86b8] text-xl"></i>
                    <div class="absolute inset-0 rounded-full border border-[#4a86b8] opacity-50"
                        style="transform:scale(1.1)"></div>
                </div>
            @endif
            <div class="w-px h-10 bg-gray-200 mx-1"></div>
            <div>
                <div class="text-2xl font-black leading-none" style="color:#4a86b8;letter-spacing:.05em">LPH</div>
                <div style="font-size:8px;letter-spacing:.12em" class="text-gray-400 font-semibold">YPM SALMAN ITB</div>
            </div>
        </a>

        <!-- Desktop nav -->
        <nav class="hidden md:flex items-center gap-7">
            <a href="{{ route('front.index') }}"
                class="nav-link {{ request()->routeIs('front.index') ? 'nav-active' : '' }}">HOME</a>

            <!-- Profile dropdown -->
            <div class="relative" @mouseenter="profileOpen=true" @mouseleave="profileOpen=false">
                <button class="nav-link {{ request()->routeIs('abouts.*') ? 'nav-active' : '' }}">PROFILE</button>
                <div x-show="profileOpen" x-cloak class="dropdown-menu">
                    @foreach ($headerAbouts as $about)
                        <a href="{{ route('abouts.show', $about) }}">{{ strtoupper($about->title) }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Service dropdown -->
            <div class="relative" @mouseenter="serviceOpen=true" @mouseleave="serviceOpen=false">
                <button
                    class="nav-link {{ request()->routeIs('program-layanan.*') ? 'nav-active' : '' }}">SERVICE</button>
                <div x-show="serviceOpen" x-cloak class="dropdown-menu">
                    @foreach ($headerPrograms as $program)
                        <a
                            href="{{ route('program-layanan.show', $program) }}">{{ strtoupper($program->nama_program) }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Publication dropdown -->
            <div class="relative" @mouseenter="pubOpen=true" @mouseleave="pubOpen=false">
                <button
                    class="nav-link {{ request()->routeIs('articles.*') || request()->routeIs('videos.*') || request()->routeIs('regulations.*') ? 'nav-active' : '' }}">PUBLICATION</button>
                <div x-show="pubOpen" x-cloak class="dropdown-menu">
                    <a href="{{ route('articles.index') }}">ARTIKEL</a>
                    <a href="{{ route('videos.index') }}">VIDEO PEMBELAJARAN</a>
                    <a href="{{ route('regulations.index') }}">REGULASI</a>
                </div>
            </div>

            <a href="{{ route('front.kontak') }}"
                class="nav-link {{ request()->routeIs('front.kontak') ? 'nav-active' : '' }}">CONTACT</a>
        </nav>

        <!-- Mobile menu button -->
        <button @click="mob=!mob" class="md:hidden text-[#4a86b8] text-xl">
            <i :class="mob ? 'fa fa-times' : 'fa fa-bars'"></i>
        </button>
    </div>

    <!-- Mobile menu -->
    <div x-show="mob" x-cloak x-transition
        class="md:hidden bg-white border-t px-6 py-4 space-y-3 text-sm font-bold uppercase tracking-wider text-[#4a86b8]">
        <a href="{{ route('front.index') }}" class="block py-2">Home</a>

        <div>
            <button @click="profileOpen=!profileOpen"
                class="block py-2 w-full text-left flex items-center justify-between">
                Profile
                <i class="fa fa-chevron-down text-xs"></i>
            </button>
            <div x-show="profileOpen" class="pl-4 space-y-2 text-xs">
                @foreach ($headerAbouts as $about)
                    <a href="{{ route('abouts.show', $about) }}" class="block py-1">{{ $about->title }}</a>
                @endforeach
            </div>
        </div>

        <div>
            <button @click="serviceOpen=!serviceOpen"
                class="block py-2 w-full text-left flex items-center justify-between">
                Service
                <i class="fa fa-chevron-down text-xs"></i>
            </button>
            <div x-show="serviceOpen" class="pl-4 space-y-2 text-xs">
                @foreach ($headerPrograms as $program)
                    <a href="{{ route('program-layanan.show', $program) }}"
                        class="block py-1">{{ $program->nama_program }}</a>
                @endforeach
            </div>
        </div>

        <div>
            <button @click="pubOpen=!pubOpen" class="block py-2 w-full text-left flex items-center justify-between">
                Publication
                <i class="fa fa-chevron-down text-xs"></i>
            </button>
            <div x-show="pubOpen" class="pl-4 space-y-2 text-xs">
                <a href="{{ route('articles.index') }}" class="block py-1">Artikel</a>
                <a href="{{ route('videos.index') }}" class="block py-1">Video Pembelajaran</a>
                <a href="{{ route('regulations.index') }}" class="block py-1">Regulasi</a>
            </div>
        </div>

        <a href="{{ route('front.kontak') }}" class="block py-2">Contact</a>
    </div>
</header>
