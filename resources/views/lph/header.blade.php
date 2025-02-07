<nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <a href="#" class="text-primary font-bold text-xl">LPH Salman ITB</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('lph.index') }}"
                    class="text-gray-700 hover:text-primary px-3 py-2 transition duration-300">Beranda</a>
                <a href="{{ route('lph.service') }}"
                    class="text-gray-700 hover:text-primary px-3 py-2 transition duration-300">Layanan</a>
                <a href="{{ route('lph.about') }}"
                    class="text-gray-700 hover:text-primary px-3 py-2 transition duration-300">Tentang
                    Kami</a>
                <a href="#konsultasi"
                    class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/80 transition duration-300">Konsultasi</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="isOpen = !isOpen" class="text-gray-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="isOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="isOpen" x-cloak class="md:hidden bg-white">
        <a href="{{ route('lph.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-primary/10">Beranda</a>
        <a href="{{ route('lph.service') }}" class="block px-4 py-2 text-gray-700 hover:bg-primary/10">Layanan</a>
        <a href="{{ route('lph.about') }}" class="block px-4 py-2 text-gray-700 hover:bg-primary/10">Tentang Kami</a>
        <a href="#konsultasi" class="block px-4 py-2 text-gray-700 hover:bg-primary/10">Konsultasi</a>
    </div>
</nav>
