@extends('layouts.front')

@section('title')
    <title>LPH Salman ITB | Lembaga Pemeriksa Halal | Sertifikasi Halal</title>
@endsection

@section('content')

    {{-- ========================= HERO SLIDER ========================= --}}
    <section id="home" class="min-h-screen bg-white overflow-hidden" x-data="{
        slide: 0,
        slides: {{ $heroSlides->count() ?: 3 }},
        startSlide() { setInterval(() => { this.slide = (this.slide + 1) % this.slides }, 4500) }
    }" x-init="startSlide()">

        @if ($heroSlides->count() > 0)
            @foreach ($heroSlides as $index => $heroSlide)
                <div class="max-w-screen-xl mx-auto px-4 sm:px-8 py-12 md:py-20 items-center justify-between gap-6 md:gap-10 w-full min-h-[60vh] md:min-h-screen flex-col md:flex-row"
                    :class="slide === {{ $index }} ? 'flex' : 'hidden'" style="animation:fadeUp .6s ease">
                    <div class="flex-1 max-w-xl text-center md:text-left">
                        @if ($heroSlide->tag_text)
                            <span class="tag mb-4 inline-block">{{ $heroSlide->tag_text }}</span>
                        @endif
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black leading-tight text-gray-900 mb-3">
                            {!! nl2br(e($heroSlide->title)) !!}
                        </h1>
                        @if ($heroSlide->subtitle)
                            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-black leading-tight mb-4 md:mb-6"
                                style="color:#4a86b8">
                                {{ $heroSlide->subtitle }}
                            </h2>
                        @endif
                        @if ($heroSlide->hashtag)
                            <p class="text-gray-500 font-semibold text-base mb-1">{{ $heroSlide->hashtag }}</p>
                        @endif
                        @if ($heroSlide->description)
                            <p class="text-gray-600 text-sm md:text-base mb-6 md:mb-10 max-w-md mx-auto md:mx-0">
                                {{ $heroSlide->description }}</p>
                        @endif
                        @if ($heroSlide->button_text)
                            <a href="{{ $heroSlide->button_link ?? '#' }}"
                                class="inline-flex items-center gap-3 bg-[#4a86b8] text-white font-bold rounded-full px-5 md:px-7 py-2.5 md:py-3 text-xs md:text-sm hover:bg-[#3a6d96] transition transform hover:-translate-y-0.5 shadow-lg">
                                {{ $heroSlide->button_text }}
                                <span class="w-8 h-8 bg-[#b8972a] rounded-full flex items-center justify-center">
                                    <i class="fa fa-play text-white text-xs ml-0.5"></i>
                                </span>
                            </a>
                        @endif
                    </div>
                    <div class="hidden md:block hero-blob flex-shrink-0">
                        @if ($heroSlide->image)
                            <img src="{{ Storage::url($heroSlide->image) }}" alt="{{ $heroSlide->title }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center"
                                style="background:linear-gradient(135deg,#4a86b8,#2c5478)">
                                <i class="fa fa-mosque text-white opacity-70" style="font-size:120px"></i>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            {{-- Default slides when no data --}}
            <div class="max-w-screen-xl mx-auto px-4 sm:px-8 py-12 md:py-20 items-center justify-between gap-6 md:gap-10 w-full min-h-[60vh] md:min-h-screen flex flex-col md:flex-row"
                style="animation:fadeUp .6s ease">

                {{-- Konten slide (berubah) --}}
                <div class="flex-1 max-w-xl relative text-center md:text-left" style="min-height:200px">
                    <div :class="slide === 0 ? 'block' : 'hidden'" style="animation:fadeUp .6s ease">
                        <h1
                            class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black leading-tight text-gray-900 mb-3">
                            LEMBAGA<br>PEMERIKSA<br>HALAL
                        </h1>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-black leading-tight mb-4 md:mb-6"
                            style="color:#4a86b8">YPM SALMAN ITB
                        </h2>
                        <p class="text-gray-500 font-semibold text-sm md:text-base mb-1">#berkahalal</p>
                        <p class="text-gray-600 text-sm md:text-base mb-6 md:mb-10 max-w-md mx-auto md:mx-0">Kami melayani
                            audit kehalalan produk untuk
                            kebutuhan
                            Sertifikasi Halal produk makanan dan minuman UMKM.</p>
                        <button
                            class="inline-flex items-center gap-3 bg-[#4a86b8] text-white font-bold rounded-full px-5 md:px-7 py-2.5 md:py-3 text-xs md:text-sm hover:bg-[#3a6d96] transition shadow-lg">
                            Daftar Sekarang
                            <span class="w-8 h-8 bg-[#b8972a] rounded-full flex items-center justify-center"><i
                                    class="fa fa-play text-white text-xs ml-0.5"></i></span>
                        </button>
                    </div>

                    <div :class="slide === 1 ? 'block' : 'hidden'" style="animation:fadeUp .6s ease">
                        <span class="tag mb-4 inline-block">Mitra BPJPH Resmi</span>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black leading-tight text-gray-900 mb-3">
                            MEWUJUDKAN<br>EKOSISTEM<br>HALAL
                        </h1>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-black leading-tight mb-4 md:mb-6"
                            style="color:#4a86b8">YANG BERKELANJUTAN</h2>
                        <p class="text-gray-600 text-sm md:text-base mb-6 md:mb-10 max-w-md mx-auto md:mx-0">Didukung
                            auditor halal bersertifikat BNSP dan
                            laboratorium terakreditasi SNI ISO/IEC 17025:2017 kerja sama dengan ITB.</p>
                        <button
                            class="inline-flex items-center gap-3 bg-[#4a86b8] text-white font-bold rounded-full px-5 md:px-7 py-2.5 md:py-3 text-xs md:text-sm hover:bg-[#3a6d96] transition shadow-lg">
                            Pelajari Lebih Lanjut
                            <span class="w-8 h-8 bg-[#b8972a] rounded-full flex items-center justify-center"><i
                                    class="fa fa-arrow-right text-white text-xs"></i></span>
                        </button>
                    </div>

                    <div :class="slide === 2 ? 'block' : 'hidden'" style="animation:fadeUp .6s ease">
                        <span class="tag mb-4 inline-block">Program Unggulan {{ date('Y') }}</span>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black leading-tight text-gray-900 mb-3">
                            SERTIFIKASI<br>HALAL GRATIS<br>ITU
                            MUDAH</h1>
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-black leading-tight mb-4 md:mb-6"
                            style="color:#4a86b8">SELF DECLARE BPJPH</h2>
                        <p class="text-gray-600 text-sm md:text-base mb-6 md:mb-10 max-w-md mx-auto md:mx-0">Tidak perlu
                            khawatir. Mengurus Sertifikasi Halal
                            itu
                            mudah dan biayanya terjangkau. Kami siap membantu Anda.</p>
                        <button
                            class="inline-flex items-center gap-3 bg-[#b8972a] text-white font-bold rounded-full px-5 md:px-7 py-2.5 md:py-3 text-xs md:text-sm hover:bg-[#9a7d20] transition shadow-lg">
                            Info Selengkapnya
                            <span class="w-8 h-8 bg-[#4a86b8] rounded-full flex items-center justify-center"><i
                                    class="fa fa-play text-white text-xs ml-0.5"></i></span>
                        </button>
                    </div>
                </div>

                {{-- Gambar tetap (tidak berubah saat slide berganti) --}}
                <div class="hidden md:block flex-shrink-0">
                    <img src="{{ asset('hero-lph.jpg') }}" alt="Hero Image"
                        class="object-cover rounded-3xl shadow-xl max-w-xs lg:max-w-md">
                </div>

            </div>
        @endif

        <!-- Slide dots -->
        <div class="flex justify-center gap-3 pb-10 -mt-8">
            <template x-for="i in slides" :key="i">
                <button @click="slide=i-1" :class="slide === i - 1 ? 'slider-dot active' : 'slider-dot'"></button>
            </template>
        </div>
    </section>

    {{-- ========================= MARQUEE ========================= --}}
    <div class="bg-[#e8f0f7] border-y border-[#c8d8e8] py-3 overflow-hidden">
        <div class="marquee-track text-sm font-bold text-[#4a86b8]">
            {{-- <span class="flex items-center gap-2"><i class="fa fa-check-circle"></i> Terakreditasi BPJPH</span>
            <span class="flex items-center gap-2"><i class="fa fa-flask"></i> Lab Terakreditasi ISO 17025</span> --}}
            <span class="flex items-center gap-2"><i class="fa fa-user-tie"></i> Auditor Bersertifikat BNSP</span>
            <span class="flex items-center gap-2"><i class="fa fa-university"></i> Mitra Resmi BPJPH RI</span>
            <span class="flex items-center gap-2"><i class="fa fa-globe"></i> Skala Layanan se-Jawa Barat</span>
            <span class="flex items-center gap-2"><i class="fa fa-mosque"></i> YPM Salman ITB</span>
            <span class="flex items-center gap-2"><i class="fa fa-handshake"></i> MoU dengan BPJPH Kemenag RI</span>
            {{-- <span class="flex items-center gap-2"><i class="fa fa-check-circle"></i> Terakreditasi BPJPH</span> --}}
            {{-- <span class="flex items-center gap-2"><i class="fa fa-flask"></i> Lab Terakreditasi ISO 17025</span> --}}
            <span class="flex items-center gap-2"><i class="fa fa-user-tie"></i> Auditor Bersertifikat BNSP</span>
            <span class="flex items-center gap-2"><i class="fa fa-university"></i> Mitra Resmi BPJPH RI</span>
            <span class="flex items-center gap-2"><i class="fa fa-globe"></i> Skala Layanan se-Jawa Barat</span>
            <span class="flex items-center gap-2"><i class="fa fa-mosque"></i> YPM Salman ITB</span>
            <span class="flex items-center gap-2"><i class="fa fa-handshake"></i> MoU dengan BPJPH Kemenag RI</span>
        </div>
    </div>

    {{-- ========================= PROFILE / ABOUT ========================= --}}
    <section id="profile" class="py-20 bg-white" data-aos="fade-up">
        <div class="max-w-screen-xl mx-auto px-8">
            <div class="grid md:grid-cols-2 gap-12 items-start">
                <!-- Left: image grid -->
                <div class="grid grid-cols-2 gap-4">
                    <div
                        class="blue-label rounded-2xl aspect-square justify-between group transition-transform hover:-translate-y-1">
                        <div><i class="fa fa-mosque text-4xl text-[#b8972a] mb-3"></i></div>
                        <div>
                            <div class="text-sm font-black mb-1" style="color:#b8972a">LPH</div>
                            <div class="blue-label-title">PROFILE</div>
                        </div>
                    </div>
                    <div
                        class="rounded-2xl overflow-hidden bg-gray-100 aspect-square flex items-center justify-center group hover:shadow-lg transition-shadow">
                        @if ($landingPage->hero_image)
                            <img src="{{ Storage::url($landingPage->hero_image) }}" alt="Kantor LPH"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="text-center text-gray-400 group-hover:scale-110 transition-transform duration-300">
                                <i class="fa fa-building text-4xl mb-2 text-[#4a86b8]"></i>
                                <p class="text-xs font-semibold">Kompleks Masjid<br>Salman ITB, Lt.3</p>
                            </div>
                        @endif
                    </div>
                    <div
                        class="col-span-2 rounded-2xl overflow-hidden bg-[#e8f0f7] h-44 flex items-center justify-center group hover:shadow-lg transition-shadow">
                        <div class="text-center text-[#4a86b8] group-hover:scale-105 transition-transform duration-300">
                            <i class="fa fa-users text-5xl mb-2 opacity-60"></i>
                            <p class="text-sm font-semibold">Kegiatan & Sosialisasi LPH Salman ITB</p>
                        </div>
                    </div>
                </div>

                <!-- Right: text -->
                <div class="pt-2">
                    <div class="grid grid-cols-3 gap-3 mb-8">
                        <div class="stat-box">
                            <div class="stat-num">2018</div>
                            <div class="text-xs text-gray-500 mt-1">Tahun Berdiri</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-num">222</div>
                            <div class="text-xs text-gray-500 mt-1">UMKM Tersertifikasi</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-num">2022</div>
                            <div class="text-xs text-gray-500 mt-1">Terakreditasi BPJPH sejak tahun</div>
                        </div>
                    </div>

                    <p class="text-gray-700 text-base leading-loose text-justify font-medium mb-5">
                        <strong>Lembaga Pemeriksa Halal (LPH) YPM Salman ITB</strong> adalah lembaga di bawah naungan
                        <strong>Yayasan Pembina Masjid (YPM) Salman ITB</strong> yang bergerak di bidang pemeriksaan dan
                        audit
                        kehalalan produk. Lembaga ini didirikan pada <strong>13 September 2018</strong> dan resmi
                        <strong>terakreditasi oleh BPJPH Kementerian Agama Republik Indonesia pada 8 April 2022</strong>.
                    </p>

                    <p class="text-gray-600 text-base leading-loose text-justify mb-8">
                        LPH YPM Salman ITB dirintis untuk membantu pelaku usaha memperoleh sertifikasi halal sebagai
                        kelanjutan dari <strong>Pusat Halal Salman ITB</strong> yang telah hadir sejak 2015 dalam bidang
                        edukasi
                        dan sosialisasi gaya hidup halal. Saat ini, LPH YPM Salman ITB telah terintegrasi dengan sistem
                        <strong>SiHalal</strong> BPJPH dan menjalankan layanan dengan prinsip <strong>SAFE</strong>:
                        <strong>Simple, Accurate, Fast,</strong> dan <strong>Ekonomis</strong>.
                    </p>

                    <a href="{{ route('abouts.index') }}" class="btn-more">
                        Selengkapnya
                        <span class="circle"><i class="fa fa-play text-white text-xs ml-0.5"></i></span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- ========================= HALAL INSPECTION SERVICE ========================= --}}
    <section id="service" class="py-20 bg-white" data-aos="fade-up" x-data="{
        slide: 0,
        slides: 3,
        startSlide() { setInterval(() => { this.slide = (this.slide + 1) % this.slides }, 4500) }
    }" x-init="startSlide()">
        <div class="max-w-screen-xl mx-auto px-8">
            <div class="flex flex-col md:flex-row gap-8 items-stretch">

                <!-- Green label -->
                <div class="blue-label w-full md:w-72 flex-shrink-0 rounded-2xl justify-between" style="min-height:360px">
                    <div><i class="fa fa-certificate text-4xl text-[#b8972a] mb-4"></i></div>
                    <div>
                        <p class="blue-label-title text-2xl">LAYANAN<br>PEMERIKSAAN<br>HALAL</p>
                    </div>
                </div>

                <!-- Cards Slider -->
                <div class="flex-1 relative overflow-hidden">

                    @forelse($services->chunk(3) as $chunkIndex => $chunk)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5"
                            :class="slide === {{ $chunkIndex }} ? 'flex' : 'hidden'" style="animation:fadeUp .6s ease">
                            @foreach ($chunk as $service)
                                <div class="svc-card">
                                    <div class="svc-icon"><i class="fa {{ $service->icon }}"></i></div>
                                    <h3 class="font-black text-lg">{{ $service->title }}</h3>
                                    <p class="text-gray-500 text-sm leading-relaxed flex-1">{{ $service->description }}
                                    </p>
                                    @if ($service->link)
                                        <a href="{{ $service->link }}" class="btn-more mt-2">Selengkapnya
                                            <span class="circle"><i
                                                    class="fa fa-play text-white text-xs ml-0.5"></i></span>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @empty
                        {{-- Slide 1: Makanan, Minuman, Obat --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5" :class="slide === 0 ? 'grid' : 'hidden'"
                            style="animation:fadeUp .6s ease">
                            <div class="svc-card">
                                <div class="svc-icon"><i class="fa fa-utensils"></i></div>
                                <h3 class="font-black text-lg">Makanan</h3>
                                <p class="text-gray-500 text-sm leading-relaxed flex-1">Sertifikasi halal untuk makanan
                                    memastikan produk yang dikonsumsi umat Islam memenuhi syarat kehalalan sesuai syariat.
                                </p>
                            </div>
                            <div class="svc-card">
                                <div class="svc-icon"><i class="fa fa-wine-glass-alt"></i></div>
                                <h3 class="font-black text-lg">Minuman</h3>
                                <p class="text-gray-500 text-sm leading-relaxed flex-1">Minuman yang memperoleh sertifikasi
                                    halal harus terbebas dari alkohol dan bahan terlarang dalam Islam.</p>
                            </div>
                            <div class="svc-card">
                                <!-- Badge On Progress -->
                                <span
                                    class="absolute top-3 right-3 inline-flex items-center gap-1.5 bg-amber-500 text-white text-xs font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow-md shadow-amber-500/30">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                    On Progress
                                </span>

                                <div class="svc-icon"><i class="fa fa-pills"></i></div>
                                <h3 class="font-black text-lg">Obat</h3>
                                <p class="text-gray-500 text-sm leading-relaxed flex-1">Sertifikasi halal pada obat
                                    memastikan bahan aktif maupun tambahan berasal dari sumber halal dan suci sesuai
                                    ketentuan syariat.</p>
                            </div>

                        </div>

                        {{-- Slide 2: Kosmetik, Produk Kimia, Barang Gunaan --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5" :class="slide === 1 ? 'grid' : 'hidden'"
                            style="animation:fadeUp .6s ease">

                            {{-- Kosmetik --}}
                            <div class="svc-card relative overflow-hidden">
                                <span
                                    class="absolute top-3 right-3 inline-flex items-center gap-1.5 bg-amber-500 text-white text-xs font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow-md shadow-amber-500/30">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                    On Progress
                                </span>
                                <div class="svc-icon"><i class="fa fa-pump-soap"></i></div>
                                <h3 class="font-black text-lg">Kosmetik</h3>
                                <p class="text-gray-500 text-sm leading-relaxed flex-1">Sertifikasi halal kosmetik
                                    memastikan seluruh bahan baku dan proses produksi bebas dari unsur yang diharamkan dalam
                                    Islam.</p>
                            </div>

                            {{-- Produk Kimia --}}
                            <div class="svc-card relative overflow-hidden">
                                <span
                                    class="absolute top-3 right-3 inline-flex items-center gap-1.5 bg-amber-500 text-white text-xs font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow-md shadow-amber-500/30">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                    On Progress
                                </span>
                                <div class="svc-icon"><i class="fa fa-flask"></i></div>
                                <h3 class="font-black text-lg">Produk Kimia</h3>
                                <p class="text-gray-500 text-sm leading-relaxed flex-1">Produk kimia seperti deterjen dan
                                    pembersih yang bersertifikat halal dipastikan tidak mengandung turunan bahan haram.</p>
                            </div>

                            {{-- Barang Gunaan --}}
                            <div class="svc-card relative overflow-hidden">
                                <span
                                    class="absolute top-3 right-3 inline-flex items-center gap-1.5 bg-amber-500 text-white text-xs font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow-md shadow-amber-500/30">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                    On Progress
                                </span>
                                <div class="svc-icon"><i class="fa fa-box-open"></i></div>
                                <h3 class="font-black text-lg">Barang Gunaan</h3>
                                <p class="text-gray-500 text-sm leading-relaxed flex-1">Barang gunaan seperti peralatan
                                    makan, tekstil, dan perlengkapan ibadah disertifikasi halal untuk memastikan
                                    kesuciannya.</p>
                            </div>

                        </div>

                        {{-- Slide 3: Jasa Penyembelihan, Jasa Pengolahan, Jasa Pengemasan --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5" :class="slide === 2 ? 'grid' : 'hidden'"
                            style="animation:fadeUp .6s ease">

                            {{-- Jasa Penyembelihan --}}
                            <div class="svc-card relative overflow-hidden">
                                <span
                                    class="absolute top-3 right-3 inline-flex items-center gap-1.5 bg-amber-500 text-white text-xs font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow-md shadow-amber-500/30">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                    On Progress
                                </span>
                                <div class="svc-icon"><i class="fa fa-drumstick-bite"></i></div>
                                <h3 class="font-black text-lg">Jasa Penyembelihan</h3>
                                <p class="text-gray-500 text-sm leading-relaxed flex-1">Audit halal pada proses
                                    penyembelihan memastikan hewan disembelih sesuai tata cara syariat Islam oleh juru
                                    sembelih bersertifikat.</p>
                            </div>

                            {{-- Jasa Pengolahan --}}
                            <div class="svc-card relative overflow-hidden">
                                <span
                                    class="absolute top-3 right-3 inline-flex items-center gap-1.5 bg-amber-500 text-white text-xs font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow-md shadow-amber-500/30">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                    On Progress
                                </span>
                                <div class="svc-icon"><i class="fa fa-industry"></i></div>
                                <h3 class="font-black text-lg">Jasa Pengolahan</h3>
                                <p class="text-gray-500 text-sm leading-relaxed flex-1">Pemeriksaan halal pada jasa
                                    pengolahan memastikan setiap tahap produksi tidak terkontaminasi bahan maupun peralatan
                                    yang haram.</p>
                            </div>

                            {{-- Jasa Pengemasan --}}
                            <div class="svc-card relative overflow-hidden">
                                <span
                                    class="absolute top-3 right-3 inline-flex items-center gap-1.5 bg-amber-500 text-white text-xs font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow-md shadow-amber-500/30">
                                    <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                    On Progress
                                </span>
                                <div class="svc-icon"><i class="fa fa-archive"></i></div>
                                <h3 class="font-black text-lg">Jasa Pengemasan</h3>
                                <p class="text-gray-500 text-sm leading-relaxed flex-1">Sertifikasi halal jasa pengemasan
                                    menjamin kemasan yang digunakan aman, suci, dan tidak mencemari produk halal di
                                    dalamnya.</p>
                            </div>

                        </div>
                    @endforelse

                </div>
            </div>
        </div>

        <!-- Slide dots -->
        <div class="flex justify-center gap-3 pt-8">
            <template x-for="i in slides" :key="i">
                <button @click="slide=i-1" :class="slide === i - 1 ? 'slider-dot active' : 'slider-dot'"></button>
            </template>
        </div>
    </section>

    {{-- ========================= HALAL CERTIFICATION FLOW ========================= --}}
    <section id="flow" class="py-20 bg-white" data-aos="fade-up">
        <div class="max-w-screen-xl mx-auto px-8">
            <div class="flex flex-col md:flex-row gap-8 items-stretch">
                <!-- Steps box -->
                <div class="flex-1 border-2 border-[#4a86b8] rounded-2xl p-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
                        <div class="flow-card">
                            <div class="flow-icon"><i class="fa fa-users-cog"></i></div>
                            <p class="font-black text-sm mb-2">Preparation</p>
                            <p class="text-xs text-gray-500 leading-relaxed">Pelaku usaha mempersiapkan SDM halal dan
                                mengidentifikasi titik kritis halal.</p>
                            <div class="flow-num">1</div>
                        </div>
                        <div class="flow-card">
                            <div class="flow-icon"><i class="fa fa-file-alt"></i></div>
                            <p class="font-black text-sm mb-2">Registration</p>
                            <p class="text-xs text-gray-500 leading-relaxed">Menyiapkan dokumen dan mendaftar secara online
                                melalui BPJPH.</p>
                            <div class="flow-num">2</div>
                        </div>
                        <div class="flow-card">
                            <div class="flow-icon"><i class="fa fa-search-plus"></i></div>
                            <p class="font-black text-sm mb-2">Inspection</p>
                            <p class="text-xs text-gray-500 leading-relaxed">LPH Salman ITB melakukan audit halal di lokasi
                                produksi.</p>
                            <div class="flow-num">3</div>
                        </div>
                        <div class="flow-card">
                            <div class="flow-icon"><i class="fa fa-gavel"></i></div>
                            <p class="font-black text-sm mb-2">Fatwa Session</p>
                            <p class="text-xs text-gray-500 leading-relaxed">Komisi Fatwa MUI menentukan status kehalalan
                                berdasarkan hasil audit.</p>
                            <div class="flow-num">4</div>
                        </div>
                        <div class="flow-card">
                            <div class="flow-icon"><i class="fa fa-certificate"></i></div>
                            <p class="font-black text-sm mb-2">Certificate</p>
                            <p class="text-xs text-gray-500 leading-relaxed">BPJPH menerbitkan Sertifikat Halal. </p>
                            <div class="flow-num">5</div>
                        </div>
                    </div>
                </div>
                <!-- Label -->
                <div class="blue-label w-full md:w-64 flex-shrink-0 rounded-2xl justify-end" style="min-height:260px">
                    <p class="blue-label-title text-2xl">HALAL<br>CERTIFICATION<br>FLOW</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Hitung Biaya Layanan --}}
    <section id="cost" class="py-20 bg-white" data-aos="fade-up">
        <div class="max-w-screen-xl mx-auto px-8">
            <div class="relative overflow-hidden rounded-2xl"
                style="background: linear-gradient(135deg, #1a3a5c 0%, #2a5f8f 50%, #1a3a5c 100%); min-height: 220px;">

                <!-- Decorative background pattern -->
                <div
                    style="position:absolute;inset:0;opacity:0.07;background-image:repeating-linear-gradient(45deg,#b8972a 0,#b8972a 1px,transparent 0,transparent 50%);background-size:20px 20px;">
                </div>

                <!-- Gold accent line top -->
                <div
                    style="position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,transparent,#b8972a,transparent);">
                </div>

                <!-- Calculator icon decoration -->
                <div style="position:absolute;right:-10px;bottom:-30px;opacity:0.06;font-size:200px;line-height:1;"
                    class="fas fa-calculator"></div>

                <a href="https://bpjph.halal.go.id/kalkulator-biaya-sh/" target="_blank" rel="noopener noreferrer"
                    class="relative flex flex-col md:flex-row items-center justify-between gap-6 px-8 md:px-12 py-10 group"
                    style="text-decoration:none;">

                    <div class="flex items-center gap-5 text-center md:text-left">
                        <div class="w-16 h-16 rounded-xl flex items-center justify-center flex-shrink-0"
                            style="background:rgba(184,151,42,0.15);border:1px solid rgba(184,151,42,0.35);">
                            <i class="fas fa-calculator" style="color:#b8972a;font-size:1.5rem;"></i>
                        </div>
                        <div>
                            <span
                                style="color:#b8972a;font-size:0.7rem;font-weight:900;letter-spacing:0.18em;text-transform:uppercase;display:block;margin-bottom:4px;">
                                BPJPH
                            </span>
                            <h3 style="color:#ffffff;font-weight:800;font-size:1.25rem;letter-spacing:0.02em;">
                                Hitung Biaya Layanan
                            </h3>
                            <p style="color:rgba(255,255,255,0.7);font-size:0.9rem;margin-top:4px;">
                                Kalkulator estimasi biaya sertifikasi halal dari BPJPH
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 flex-shrink-0 group-hover:-translate-y-1 transition-transform"
                        style="
                       background:linear-gradient(135deg,#b8972a,#d4af50);
                       color:#1a3a5c;
                       font-weight:800;
                       font-size:0.9rem;
                       letter-spacing:0.06em;
                       text-transform:uppercase;
                       padding:14px 32px;
                       border-radius:100px;
                       box-shadow:0 4px 24px rgba(184,151,42,0.35);
                   ">
                        <span>Hitung Sekarang</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </a>

                <!-- Gold accent line bottom -->
                <div
                    style="position:absolute;bottom:0;left:0;right:0;height:4px;background:linear-gradient(90deg,transparent,#b8972a,transparent);">
                </div>
            </div>
        </div>
    </section>

    {{-- ========================= CHECK HALAL PRODUCT ========================= --}}
    <section id="check" class="py-20 bg-white" data-aos="fade-up">
        <div class="max-w-screen-xl mx-auto px-8">
            <div class="relative overflow-hidden rounded-2xl"
                style="background: linear-gradient(135deg, #1a3a5c 0%, #2a5f8f 50%, #1a3a5c 100%); min-height: 280px;">

                <!-- Decorative background pattern -->
                <div
                    style="position:absolute;inset:0;opacity:0.07;background-image:repeating-linear-gradient(45deg,#b8972a 0,#b8972a 1px,transparent 0,transparent 50%);background-size:20px 20px;">
                </div>

                <!-- Gold accent line top -->
                <div
                    style="position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,transparent,#b8972a,transparent);">
                </div>

                <!-- Mosque icon decoration -->
                <div style="position:absolute;right:-20px;bottom:-20px;opacity:0.06;font-size:220px;line-height:1;"
                    class="fa fa-mosque"></div>

                <!-- Content -->
                <div class="relative flex flex-col items-center justify-center text-center px-8 py-16 gap-6">

                    <!-- Label atas -->
                    <div class="flex items-center gap-2">
                        <i class="fa fa-mosque" style="color:#b8972a;font-size:1.25rem;"></i>
                        <span
                            style="color:#b8972a;font-size:0.75rem;font-weight:900;letter-spacing:0.18em;text-transform:uppercase;">LPH
                            Salman ITB</span>
                    </div>

                    <!-- Judul -->
                    <h2
                        style="color:#ffffff;font-size:clamp(1.75rem,4vw,2.75rem);font-weight:900;letter-spacing:0.04em;line-height:1.1;text-transform:uppercase;text-shadow:0 2px 16px rgba(0,0,0,0.3);">
                        Check Halal<br>
                        <span style="color:#b8972a;">Product</span>
                    </h2>

                    <!-- Sub teks -->
                    <p style="color:rgba(255,255,255,0.7);font-size:0.95rem;max-width:420px;line-height:1.6;">
                        Cek status kehalalan produk secara resmi melalui Badan Penyelenggara Jaminan Produk Halal (BPJPH).
                    </p>

                    <!-- Tombol CTA -->
                    <a href="https://bpjph.halal.go.id/" target="_blank" rel="noopener noreferrer"
                        style="
                       display:inline-flex;align-items:center;gap:10px;
                       background:linear-gradient(135deg,#b8972a,#d4af50);
                       color:#1a3a5c;
                       font-weight:800;
                       font-size:0.95rem;
                       letter-spacing:0.06em;
                       text-transform:uppercase;
                       padding:14px 36px;
                       border-radius:100px;
                       text-decoration:none;
                       box-shadow:0 4px 24px rgba(184,151,42,0.35);
                       transition:transform 0.2s ease, box-shadow 0.2s ease;
                   "
                        onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 32px rgba(184,151,42,0.5)'"
                        onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 24px rgba(184,151,42,0.35)'">
                        <i class="fa fa-search"></i>
                        Klik di sini
                        <i class="fa fa-arrow-right" style="font-size:0.8rem;"></i>
                    </a>

                </div>

                <!-- Gold accent line bottom -->
                <div
                    style="position:absolute;bottom:0;left:0;right:0;height:4px;background:linear-gradient(90deg,transparent,#b8972a,transparent);">
                </div>
            </div>
        </div>
    </section>

    {{-- ========================= LATEST PUBLICATIONS ========================= --}}
    <section id="publication" class="py-20 bg-white" data-aos="fade-up">
        <div class="max-w-screen-xl mx-auto px-8">
            <div class="flex flex-col md:flex-row gap-8 items-stretch">
                <!-- Cards -->
                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($latestArticles as $article)
                        <div class="pub-card">
                            <p class="font-black text-lg leading-snug text-gray-900">{{ $article->title }}</p>
                            <p class="text-xs text-gray-400 font-medium">By {{ $article->author?->name ?? 'Admin' }} /
                                {{ $article->created_at->format('d F Y') }}</p>
                            <div class="flex-1 rounded-xl overflow-hidden group" style="min-height:100px">
                                @if ($article->featured_image)
                                    <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full bg-[#e8f0f7] flex items-center justify-center">
                                        <i
                                            class="fa fa-newspaper text-5xl text-[#4a86b8] opacity-30 group-hover:scale-110 transition-transform duration-300"></i>
                                    </div>
                                @endif
                            </div>
                            <a href="{{ route('articles.show', $article) }}" class="btn-more">Baca Selengkapnya <span
                                    class="circle"><i class="fa fa-play text-white text-xs ml-0.5"></i></span></a>
                        </div>
                    @empty
                        <div class="pub-card">
                            <p class="font-black text-lg leading-snug text-gray-900">Belum ada artikel terbaru</p>
                            <p class="text-xs text-gray-400 font-medium">Artikel akan muncul di sini setelah dipublikasikan
                            </p>
                            <div class="flex-1 bg-[#e8f0f7] rounded-xl flex items-center justify-center"
                                style="min-height:100px">
                                <i class="fa fa-newspaper text-5xl text-[#4a86b8] opacity-30"></i>
                            </div>
                        </div>
                    @endforelse
                </div>
                <!-- Label -->
                <div class="blue-label w-full md:w-56 flex-shrink-0 rounded-2xl justify-end" style="min-height:260px">
                    <p class="blue-label-title text-2xl">LATEST<br>PUBLICATIONS</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ========================= SUPPORTED BY ========================= --}}
    @if ($partners->count() > 0)
        <section class="py-12 bg-white border-t border-gray-100" data-aos="fade-up">
            <div class="max-w-screen-xl mx-auto px-8">
                <div class="flex items-center gap-12 flex-wrap justify-center">
                    <span class="text-sm font-bold text-gray-500 whitespace-nowrap">Supported By:</span>
                    @foreach ($partners as $partner)
                        <a href="{{ $partner->website ?? '#' }}" target="_blank" class="group">
                            @if ($partner->logo)
                                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                                    class="h-16 w-auto object-contain filter grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110">
                            @else
                                <div class="logo-placeholder" style="background:#4a86b8;color:white;font-size:9px">
                                    {{ $partner->name }}</div>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ========================= CONTACT ========================= --}}
    <section id="contact" class="py-20 bg-white" data-aos="fade-up">
        <div class="max-w-screen-xl mx-auto px-8">
            <div class="flex flex-col md:flex-row gap-8 items-stretch">
                <!-- Label -->
                <div class="blue-label w-full md:w-72 flex-shrink-0 rounded-2xl justify-between" style="min-height:360px">
                    <div>
                        <i class="fa fa-mosque text-4xl text-[#b8972a] mb-3"></i>
                        <div class="text-sm font-black mb-1" style="color:#b8972a">LPH SALMAN ITB</div>
                        <div class="text-xs text-white/70">Kompleks Masjid Salman ITB</div>
                    </div>
                    <p class="blue-label-title text-2xl">CONTACT</p>
                </div>

                <!-- Info card -->
                <div
                    class="flex-1 border border-gray-200 rounded-2xl p-8 flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div class="space-y-6">
                        @if (!empty($landingPage->contact_phone))
                            <div class="contact-info-row">
                                <div
                                    class="w-10 h-10 border-2 border-[#4a86b8] rounded-lg flex items-center justify-center flex-shrink-0 hover:bg-[#e8f0f7] transition-colors">
                                    <i class="fa fa-phone text-[#4a86b8]"></i>
                                </div>
                                <span>{{ $landingPage->contact_phone }}</span>
                            </div>
                        @endif
                        @if (!empty($landingPage->contact_email))
                            <div class="contact-info-row">
                                <div
                                    class="w-10 h-10 border-2 border-[#4a86b8] rounded-lg flex items-center justify-center flex-shrink-0 hover:bg-[#e8f0f7] transition-colors">
                                    <i class="fa fa-envelope text-[#4a86b8]"></i>
                                </div>
                                <span>{{ $landingPage->contact_email }}</span>
                            </div>
                        @endif
                        <div class="contact-info-row">
                            <div
                                class="w-10 h-10 border-2 border-[#4a86b8] rounded-lg flex items-center justify-center flex-shrink-0 hover:bg-[#e8f0f7] transition-colors">
                                <i class="fa fa-globe text-[#4a86b8]"></i>
                            </div>
                            <span>pusathalal.salmanitb.com</span>
                        </div>
                        <div class="contact-info-row">
                            <div
                                class="w-10 h-10 border-2 border-[#4a86b8] rounded-lg flex items-center justify-center flex-shrink-0 hover:bg-[#e8f0f7] transition-colors">
                                <i class="fa fa-map-marker-alt text-[#4a86b8]"></i>
                            </div>
                            <span>Kompleks Masjid Salman ITB, Lt. 3<br><span class="text-sm text-gray-500 font-normal">Jl.
                                    Ganesha No.7, Bandung 40132</span></span>
                        </div>
                    </div>
                    <div class="mt-8">
                        <a href="{{ route('front.kontak') }}" class="btn-more">
                            Hubungi Kami
                            <span class="circle"><i class="fa fa-play text-white text-xs ml-0.5"></i></span>
                        </a>
                    </div>
                </div>

                <!-- Map -->
                <div class="flex-1 rounded-2xl overflow-hidden border border-gray-200 hover:shadow-md transition-shadow"
                    style="min-height:320px">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9!2d107.6096!3d-6.8917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64c5e8866b3%3A0x5030bfbca832610!2sMasjid%20Salman%20ITB!5e0!3m2!1sid!2sid!4v1"
                        width="100%" height="100%" style="border:0;min-height:320px" allowfullscreen loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

@endsection
