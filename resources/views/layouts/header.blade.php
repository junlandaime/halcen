<!-- Header -->
<header class="fixed w-full z-50 bg-white/95 backdrop-blur-sm shadow-sm" x-data="{ isOpen: false, dropdowns: { program: false, mitra: false } }">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('front.index') }}" class="text-primary text-xl font-bold flex items-center gap-2">
                <img src="{{ asset('logohalcen.png') }}" alt="Logo" class="h-8 rounded">
                Pusat Halal Salman ITB
            </a>
           
            <!-- Desktop Menu -->
            <nav class="hidden md:flex items-center gap-6">
                <a href="{{ route('front.index') }}" class="text-gray-600 hover:text-primary transition-colors">Beranda</a>
                
                <!-- Program Dropdown -->
                <div class="relative" @mouseenter="dropdowns.program = true" @mouseleave="dropdowns.program = false">
                    <button class="text-gray-600 hover:text-primary transition-colors flex items-center gap-1">
                        Program & layanan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.program" 
                         x-transition
                         class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        <a href="{{ route('front.kuliah-halal') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">Kuliah Halal</a>
                        <a href="{{ route('front.juleha') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">Juleha</a>
                        <a href="{{ route('front.p3h') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">P3H</a>
                        <a href="{{ route('front.sertifikasi') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">Sertifikasi</a>
                        <a href="{{ route('front.ppk') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">PPK</a>
                    </div>
                </div>

                <!-- Mitra Dropdown -->
                <div class="relative" @mouseenter="dropdowns.konten = true" @mouseleave="dropdowns.konten = false">
                    <button class="text-gray-600 hover:text-primary transition-colors flex items-center gap-1">
                        Konten
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.konten" 
                         x-transition
                         class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        <a href="{{ route('front.video') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">Video Pembelajaran</a>
                        <a href="{{ route('front.article') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">Artikel dan Publikasi</a>
                        <a href="{{ route('front.regulasi') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">Regulasi Halal</a>
                    </div>
                </div>

                <!-- Tentang Dropdown -->
                <div class="relative" @mouseenter="dropdowns.tentang = true" @mouseleave="dropdowns.tentang = false">
                    <button class="text-gray-600 hover:text-primary transition-colors flex items-center gap-1">
                        Tentang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.tentang" 
                         x-transition
                         class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        <a href="{{ route('front.halcen') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">Halal Center</a>
                        <a href="{{ route('front.lp3h') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">LP3H Salman</a>
                        <a href="{{ route('front.lph') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">LPH Salman</a>
                        <a href="{{ route('front.salman') }}" class="block px-4 py-2 text-gray-600 hover:text-primary hover:bg-gray-50">Salman ITB</a>
                    </div>
                </div>

                <a href="{{ route('front.kontak') }}" class="text-gray-600 hover:text-primary transition-colors">Kontak</a>
                <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    Masuk
                </button>
            </nav>

            <!-- Mobile Menu Button -->
            <button @click="isOpen = !isOpen" class="md:hidden text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isOpen" x-transition class="md:hidden py-4">
            <nav class="flex flex-col gap-4">
                <a href="{{ route('front.index') }}" class="text-gray-600 hover:text-primary transition-colors">Beranda</a>
                
                <!-- Mobile Program Dropdown -->
                <div class="relative">
                    <button @click="dropdowns.program = !dropdowns.program" 
                            class="text-gray-600 hover:text-primary transition-colors flex items-center justify-between w-full">
                        Program & Layanan
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.program" x-transition class="pl-4 mt-2 flex flex-col gap-2">
                        <a href="{{ route('front.kuliah-halal') }}" class="text-gray-600 hover:text-primary transition-colors">Kuliah Halal</</a>
                        <a href="{{ route('front.juleha') }}" class="text-gray-600 hover:text-primary transition-colors">Juleha</a>
                        <a href="{{ route('front.p3h') }}" class="text-gray-600 hover:text-primary transition-colors">P3H</a>
                        <a href="{{ route('front.sertifikasi') }}" class="text-gray-600 hover:text-primary transition-colors">Sertifikasi</a>
                        <a href="{{ route('front.ppk') }}" class="text-gray-600 hover:text-primary transition-colors">PPK</a>
                    </div>
                </div>

                <!-- Mobile Mitra Dropdown -->
                <div class="relative">
                    <button @click="dropdowns.mitra = !dropdowns.mitra"
                            class="text-gray-600 hover:text-primary transition-colors flex items-center justify-between w-full">
                        Mitra
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="dropdowns.mitra" x-transition class="pl-4 mt-2 flex flex-col gap-2">
                        <a href="#mitra1" class="text-gray-600 hover:text-primary transition-colors">Mitra 1</a>
                        <a href="#mitra2" class="text-gray-600 hover:text-primary transition-colors">Mitra 2</a>
                        <a href="#mitra3" class="text-gray-600 hover:text-primary transition-colors">Mitra 3</a>
                    </div>
                </div>

                <a href="#kontak" class="text-gray-600 hover:text-primary transition-colors">Kontak</a>
                <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors w-full">
                    Masuk
                </button>
            </nav>
        </div>
    </div>
</header>