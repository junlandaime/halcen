@extends('layouts.front')

@section('title')
    <title>LPH Salman ITB | Lembaga Pemeriksa Halal | Sertifikasi Halal</title>
@endsection

@section('content')

{{-- ========================= HERO SLIDER ========================= --}}
<section id="home" class="min-h-screen bg-white overflow-hidden"
    x-data="{
        slide: 0,
        slides: {{ $heroSlides->count() ?: 3 }},
        startSlide() { setInterval(() => { this.slide = (this.slide + 1) % this.slides }, 4500) }
    }"
    x-init="startSlide()">

    @if($heroSlides->count() > 0)
        @foreach($heroSlides as $index => $heroSlide)
        <div class="max-w-screen-xl mx-auto px-8 py-20 items-center justify-between gap-10 w-full min-h-screen"
             :class="slide === {{ $index }} ? 'flex' : 'hidden'" style="animation:fadeUp .6s ease">
            <div class="flex-1 max-w-xl">
                @if($heroSlide->tag_text)
                <span class="tag mb-4 inline-block">{{ $heroSlide->tag_text }}</span>
                @endif
                <h1 class="text-5xl md:text-6xl font-black leading-tight text-gray-900 mb-3">
                    {!! nl2br(e($heroSlide->title)) !!}
                </h1>
                @if($heroSlide->subtitle)
                <h2 class="text-4xl md:text-5xl font-black leading-tight mb-6" style="color:#4a86b8">
                    {{ $heroSlide->subtitle }}
                </h2>
                @endif
                @if($heroSlide->hashtag)
                <p class="text-gray-500 font-semibold text-base mb-1">{{ $heroSlide->hashtag }}</p>
                @endif
                @if($heroSlide->description)
                <p class="text-gray-600 text-base mb-10 max-w-md">{{ $heroSlide->description }}</p>
                @endif
                @if($heroSlide->button_text)
                <a href="{{ $heroSlide->button_link ?? '#' }}" class="inline-flex items-center gap-3 bg-[#4a86b8] text-white font-bold rounded-full px-7 py-3 text-sm hover:bg-[#3a6d96] transition transform hover:-translate-y-0.5 shadow-lg">
                    {{ $heroSlide->button_text }}
                    <span class="w-8 h-8 bg-[#b8972a] rounded-full flex items-center justify-center">
                        <i class="fa fa-play text-white text-xs ml-0.5"></i>
                    </span>
                </a>
                @endif
            </div>
            <div class="hidden md:block hero-blob">
                @if($heroSlide->image)
                    <img src="{{ Storage::url($heroSlide->image) }}" alt="{{ $heroSlide->title }}">
                @else
                    <div class="w-full h-full flex items-center justify-center" style="background:linear-gradient(135deg,#4a86b8,#2c5478)">
                        <i class="fa fa-mosque text-white opacity-70" style="font-size:120px"></i>
                    </div>
                @endif
            </div>
        </div>
        @endforeach
    @else
        {{-- Default slides when no data --}}
        <div class="max-w-screen-xl mx-auto px-8 py-20 items-center justify-between gap-10 w-full min-h-screen"
             :class="slide === 0 ? 'flex' : 'hidden'" style="animation:fadeUp .6s ease">
            <div class="flex-1 max-w-xl">
                <span class="tag mb-4 inline-block">Terakreditasi BPJPH Â· Bandung</span>
                <h1 class="text-5xl md:text-6xl font-black leading-tight text-gray-900 mb-3">
                    HALAL<br>INSPECTION<br>INSTITUTION
                </h1>
                <h2 class="text-4xl md:text-5xl font-black leading-tight mb-6" style="color:#4a86b8">SALMAN ITB</h2>
                <p class="text-gray-500 font-semibold text-base mb-1">#halalitumudah</p>
                <p class="text-gray-600 text-base mb-10 max-w-md">Registering for independent halal certification is now faster and easier. Serving businesses from Bandung to national scale.</p>
                <button class="inline-flex items-center gap-3 bg-[#4a86b8] text-white font-bold rounded-full px-7 py-3 text-sm hover:bg-[#3a6d96] transition shadow-lg">
                    Daftar Sekarang
                    <span class="w-8 h-8 bg-[#b8972a] rounded-full flex items-center justify-center"><i class="fa fa-play text-white text-xs ml-0.5"></i></span>
                </button>
            </div>
            <div class="hidden md:block hero-blob" style="background:linear-gradient(135deg,#4a86b8,#3a6d96)">
                <div class="w-full h-full flex items-center justify-center opacity-70">
                    <i class="fa fa-mosque text-white" style="font-size:120px"></i>
                </div>
            </div>
        </div>
        <div class="max-w-screen-xl mx-auto px-8 py-20 items-center justify-between gap-10 w-full min-h-screen"
             :class="slide === 1 ? 'flex' : 'hidden'" style="animation:fadeUp .6s ease">
            <div class="flex-1 max-w-xl">
                <span class="tag mb-4 inline-block">Mitra BPJPH Resmi</span>
                <h1 class="text-5xl font-black leading-tight text-gray-900 mb-3">MEWUJUDKAN<br>EKOSISTEM<br>HALAL</h1>
                <h2 class="text-4xl font-black leading-tight mb-6" style="color:#4a86b8">YANG BERKELANJUTAN</h2>
                <p class="text-gray-600 text-base mb-10 max-w-md">Didukung auditor halal bersertifikat BNSP dan laboratorium terakreditasi SNI ISO/IEC 17025:2017 kerja sama dengan ITB.</p>
                <button class="inline-flex items-center gap-3 bg-[#4a86b8] text-white font-bold rounded-full px-7 py-3 text-sm hover:bg-[#3a6d96] transition shadow-lg">
                    Pelajari Lebih Lanjut
                    <span class="w-8 h-8 bg-[#b8972a] rounded-full flex items-center justify-center"><i class="fa fa-arrow-right text-white text-xs"></i></span>
                </button>
            </div>
            <div class="hidden md:block hero-blob" style="background:linear-gradient(135deg,#4a86b8,#2c5478)">
                <div class="w-full h-full flex items-center justify-center opacity-70"><i class="fa fa-mosque text-white" style="font-size:120px"></i></div>
            </div>
        </div>
        <div class="max-w-screen-xl mx-auto px-8 py-20 items-center justify-between gap-10 w-full min-h-screen"
             :class="slide === 2 ? 'flex' : 'hidden'" style="animation:fadeUp .6s ease">
            <div class="flex-1 max-w-xl">
                <span class="tag mb-4 inline-block">Program Unggulan {{ date('Y') }}</span>
                <h1 class="text-5xl font-black leading-tight text-gray-900 mb-3">SERTIFIKASI<br>HALAL GRATIS<br>UNTUK UMKM</h1>
                <h2 class="text-4xl font-black leading-tight mb-6" style="color:#4a86b8">SELF DECLARE BPJPH</h2>
                <p class="text-gray-600 text-base mb-10 max-w-md">UMKM wajib tahu! Sertifikat Halal sekarang bisa GRATIS melalui program Self Declare BPJPH SEHATI. LPH Salman ITB siap mendampingi.</p>
                <button class="inline-flex items-center gap-3 bg-[#b8972a] text-white font-bold rounded-full px-7 py-3 text-sm hover:bg-[#9a7d20] transition shadow-lg">
                    Info Selengkapnya
                    <span class="w-8 h-8 bg-[#4a86b8] rounded-full flex items-center justify-center"><i class="fa fa-play text-white text-xs ml-0.5"></i></span>
                </button>
            </div>
            <div class="hidden md:block hero-blob" style="background:linear-gradient(135deg,#b8972a,#9a7d20)">
                <div class="w-full h-full flex items-center justify-center opacity-50"><i class="fa fa-certificate text-white" style="font-size:120px"></i></div>
            </div>
        </div>
    @endif

    <!-- Slide dots -->
    <div class="flex justify-center gap-3 pb-10 -mt-8">
        <template x-for="i in slides" :key="i">
            <button @click="slide=i-1" :class="slide===i-1 ? 'slider-dot active' : 'slider-dot'"></button>
        </template>
    </div>
</section>

{{-- ========================= MARQUEE ========================= --}}
<div class="bg-[#e8f0f7] border-y border-[#c8d8e8] py-3 overflow-hidden">
    <div class="marquee-track text-sm font-bold text-[#4a86b8]">
        <span class="flex items-center gap-2"><i class="fa fa-check-circle"></i> Terakreditasi BPJPH</span>
        <span class="flex items-center gap-2"><i class="fa fa-flask"></i> Lab Terakreditasi ISO 17025</span>
        <span class="flex items-center gap-2"><i class="fa fa-user-tie"></i> Auditor Bersertifikat BNSP</span>
        <span class="flex items-center gap-2"><i class="fa fa-university"></i> Mitra Resmi ITB</span>
        <span class="flex items-center gap-2"><i class="fa fa-globe"></i> Melayani Nasional & Internasional</span>
        <span class="flex items-center gap-2"><i class="fa fa-mosque"></i> YPM Salman ITB</span>
        <span class="flex items-center gap-2"><i class="fa fa-handshake"></i> MoU dengan BPJPH Kemenag RI</span>
        <span class="flex items-center gap-2"><i class="fa fa-check-circle"></i> Terakreditasi BPJPH</span>
        <span class="flex items-center gap-2"><i class="fa fa-flask"></i> Lab Terakreditasi ISO 17025</span>
        <span class="flex items-center gap-2"><i class="fa fa-user-tie"></i> Auditor Bersertifikat BNSP</span>
        <span class="flex items-center gap-2"><i class="fa fa-university"></i> Mitra Resmi ITB</span>
        <span class="flex items-center gap-2"><i class="fa fa-globe"></i> Melayani Nasional & Internasional</span>
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
                <div class="blue-label rounded-2xl aspect-square justify-between group transition-transform hover:-translate-y-1">
                    <div><i class="fa fa-mosque text-4xl text-[#b8972a] mb-3"></i></div>
                    <div>
                        <div class="text-sm font-black mb-1" style="color:#b8972a">LPH</div>
                        <div class="blue-label-title">PROFILE</div>
                    </div>
                </div>
                <div class="rounded-2xl overflow-hidden bg-gray-100 aspect-square flex items-center justify-center group hover:shadow-lg transition-shadow">
                    @if($landingPage->hero_image)
                        <img src="{{ Storage::url($landingPage->hero_image) }}" alt="Kantor LPH" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="text-center text-gray-400 group-hover:scale-110 transition-transform duration-300">
                            <i class="fa fa-building text-4xl mb-2 text-[#4a86b8]"></i>
                            <p class="text-xs font-semibold">Kompleks Masjid<br>Salman ITB, Lt.3</p>
                        </div>
                    @endif
                </div>
                <div class="col-span-2 rounded-2xl overflow-hidden bg-[#e8f0f7] h-44 flex items-center justify-center group hover:shadow-lg transition-shadow">
                    <div class="text-center text-[#4a86b8] group-hover:scale-105 transition-transform duration-300">
                        <i class="fa fa-users text-5xl mb-2 opacity-60"></i>
                        <p class="text-sm font-semibold">Kegiatan & Sosialisasi LPH Salman ITB</p>
                    </div>
                </div>
            </div>

            <!-- Right: text -->
            <div class="pt-2">
                <div class="grid grid-cols-3 gap-3 mb-8">
                    <div class="stat-box"><div class="stat-num">2015</div><div class="text-xs text-gray-500 mt-1">Tahun Berdiri</div></div>
                    <div class="stat-box"><div class="stat-num">26+</div><div class="text-xs text-gray-500 mt-1">UMKM Tersertifikasi</div></div>
                    <div class="stat-box"><div class="stat-num">4th</div><div class="text-xs text-gray-500 mt-1">Masa Berlaku</div></div>
                </div>
                <p class="text-gray-700 text-base leading-loose text-justify font-medium mb-5">
                    <strong>Lembaga Pemeriksa Halal (LPH) YPM Salman ITB</strong> adalah lembaga yang bergerak di bidang pemeriksaan dan pengujian kehalalan produk di bawah naungan <strong>Yayasan Pembina Masjid (YPM) Salman ITB</strong>, resmi terakreditasi oleh BPJPH Kementerian Agama RI.
                </p>
                <p class="text-gray-600 text-base leading-loose text-justify mb-8">
                    {{ $landingPage->hero_description ?? 'Didirikan pada Juli 2015 di Kompleks Masjid Salman ITB Lantai 3, LPH Salman ITB didukung oleh auditor halal bersertifikat BNSP dan bekerja sama dengan laboratorium ITB yang terakreditasi SNI ISO/IEC 17025:2017.' }}
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
<section id="service" class="py-20 bg-white" data-aos="fade-up">
    <div class="max-w-screen-xl mx-auto px-8">
        <div class="flex flex-col md:flex-row gap-8 items-stretch">
            <!-- Green label -->
            <div class="blue-label w-full md:w-72 flex-shrink-0 rounded-2xl justify-between" style="min-height:360px">
                <div><i class="fa fa-certificate text-4xl text-[#b8972a] mb-4"></i></div>
                <div>
                    <p class="blue-label-title text-2xl">LAYANAN<br>PEMERIKSAAN<br>HALAL</p>
                </div>
            </div>

            <!-- Cards -->
            <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-5">
                @forelse($services as $service)
                <div class="svc-card">
                    <div class="svc-icon"><i class="fa {{ $service->icon }}"></i></div>
                    <h3 class="font-black text-lg">{{ $service->title }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed flex-1">{{ $service->description }}</p>
                    @if($service->link)
                    <a href="{{ $service->link }}" class="btn-more mt-2">Selengkapnya <span class="circle"><i class="fa fa-play text-white text-xs ml-0.5"></i></span></a>
                    @endif
                </div>
                @empty
                <div class="svc-card">
                    <div class="svc-icon"><i class="fa fa-utensils"></i></div>
                    <h3 class="font-black text-lg">Makanan</h3>
                    <p class="text-gray-500 text-sm leading-relaxed flex-1">Sertifikasi halal untuk makanan memastikan produk yang dikonsumsi umat Islam memenuhi syarat kehalalan sesuai syariat.</p>
                </div>
                <div class="svc-card">
                    <div class="svc-icon"><i class="fa fa-wine-glass-alt"></i></div>
                    <h3 class="font-black text-lg">Minuman</h3>
                    <p class="text-gray-500 text-sm leading-relaxed flex-1">Minuman yang memperoleh sertifikasi halal harus terbebas dari alkohol dan bahan terlarang dalam Islam.</p>
                </div>
                <div class="svc-card">
                    <div class="svc-icon"><i class="fa fa-pills"></i></div>
                    <h3 class="font-black text-lg">Obat & Kosmetik</h3>
                    <p class="text-gray-500 text-sm leading-relaxed flex-1">Sertifikasi halal pada obat dan kosmetik memastikan bahan aktif maupun tambahan berasal dari sumber halal dan suci.</p>
                </div>
                @endforelse
            </div>
        </div>
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
                        <p class="text-xs text-gray-500 leading-relaxed">Pelaku usaha mempersiapkan SDM halal dan mengidentifikasi titik kritis halal.</p>
                        <div class="flow-num">1</div>
                    </div>
                    <div class="flow-card">
                        <div class="flow-icon"><i class="fa fa-file-alt"></i></div>
                        <p class="font-black text-sm mb-2">Registration</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Menyiapkan dokumen dan mendaftar secara online melalui BPJPH.</p>
                        <div class="flow-num">2</div>
                    </div>
                    <div class="flow-card">
                        <div class="flow-icon"><i class="fa fa-search-plus"></i></div>
                        <p class="font-black text-sm mb-2">Inspection</p>
                        <p class="text-xs text-gray-500 leading-relaxed">LPH Salman ITB melakukan audit halal di lokasi produksi.</p>
                        <div class="flow-num">3</div>
                    </div>
                    <div class="flow-card">
                        <div class="flow-icon"><i class="fa fa-gavel"></i></div>
                        <p class="font-black text-sm mb-2">Fatwa Session</p>
                        <p class="text-xs text-gray-500 leading-relaxed">Komisi Fatwa MUI menentukan status kehalalan berdasarkan hasil audit.</p>
                        <div class="flow-num">4</div>
                    </div>
                    <div class="flow-card">
                        <div class="flow-icon"><i class="fa fa-certificate"></i></div>
                        <p class="font-black text-sm mb-2">Certificate</p>
                        <p class="text-xs text-gray-500 leading-relaxed">BPJPH menerbitkan Sertifikat Halal. Berlaku 4 tahun.</p>
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

{{-- ========================= CHECK HALAL PRODUCT ========================= --}}
<section id="check" class="py-20 bg-white" data-aos="fade-up">
    <div class="max-w-screen-xl mx-auto px-8">
        <div class="flex flex-col md:flex-row gap-8 items-stretch">
            <!-- Label -->
            <div class="blue-label w-full md:w-72 flex-shrink-0 rounded-2xl justify-between" style="min-height:280px">
                <div>
                    <i class="fa fa-mosque text-4xl text-[#b8972a] mb-3"></i>
                    <div class="text-sm font-black" style="color:#b8972a">LPH SALMAN ITB</div>
                </div>
                <p class="blue-label-title text-2xl">CHECK HALAL<br>PRODUCT</p>
            </div>
            <!-- Forms -->
            <div class="flex-1 space-y-8">
                <div>
                    <p class="font-bold text-[#4a86b8] text-base mb-3">Berdasarkan BPJPH</p>
                    <div class="flex gap-3 flex-wrap">
                        <input class="check-input flex-1 min-w-[140px]" placeholder="Nama Produk"/>
                        <input class="check-input flex-1 min-w-[140px]" placeholder="Nama Usaha"/>
                        <input class="check-input flex-1 min-w-[140px]" placeholder="Nomor Sertifikat"/>
                        <button class="btn-search">Cari</button>
                    </div>
                </div>
                <div>
                    <p class="font-bold text-[#4a86b8] text-base mb-3">Berdasarkan KH LPH Salman ITB</p>
                    <div class="flex gap-3 flex-wrap">
                        <input class="check-input flex-1 min-w-[140px]" placeholder="Jenis Produk"/>
                        <input class="check-input flex-1 min-w-[140px]" placeholder="Nama Usaha"/>
                        <input class="check-input flex-1 min-w-[140px]" placeholder="Nomor KH"/>
                        <button class="btn-search">Cari</button>
                    </div>
                </div>
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
                    <p class="text-xs text-gray-400 font-medium">By {{ $article->author?->name ?? 'Admin' }} / {{ $article->created_at->format('d F Y') }}</p>
                    <div class="flex-1 rounded-xl overflow-hidden group" style="min-height:100px">
                        @if($article->featured_image)
                            <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-[#e8f0f7] flex items-center justify-center">
                                <i class="fa fa-newspaper text-5xl text-[#4a86b8] opacity-30 group-hover:scale-110 transition-transform duration-300"></i>
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('articles.show', $article) }}" class="btn-more">Baca Selengkapnya <span class="circle"><i class="fa fa-play text-white text-xs ml-0.5"></i></span></a>
                </div>
                @empty
                <div class="pub-card">
                    <p class="font-black text-lg leading-snug text-gray-900">Belum ada artikel terbaru</p>
                    <p class="text-xs text-gray-400 font-medium">Artikel akan muncul di sini setelah dipublikasikan</p>
                    <div class="flex-1 bg-[#e8f0f7] rounded-xl flex items-center justify-center" style="min-height:100px">
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
@if($partners->count() > 0)
<section class="py-12 bg-white border-t border-gray-100" data-aos="fade-up">
    <div class="max-w-screen-xl mx-auto px-8">
        <div class="flex items-center gap-12 flex-wrap justify-center">
            <span class="text-sm font-bold text-gray-500 whitespace-nowrap">Supported By:</span>
            @foreach($partners as $partner)
                <a href="{{ $partner->website ?? '#' }}" target="_blank" class="group">
                    @if($partner->logo)
                        <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}"
                             class="h-16 w-auto object-contain filter grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110">
                    @else
                        <div class="logo-placeholder" style="background:#4a86b8;color:white;font-size:9px">{{ $partner->name }}</div>
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
            <div class="flex-1 border border-gray-200 rounded-2xl p-8 flex flex-col justify-between hover:shadow-md transition-shadow">
                <div class="space-y-6">
                    @if(!empty($landingPage->contact_phone))
                    <div class="contact-info-row">
                        <div class="w-10 h-10 border-2 border-[#4a86b8] rounded-lg flex items-center justify-center flex-shrink-0 hover:bg-[#e8f0f7] transition-colors">
                            <i class="fa fa-phone text-[#4a86b8]"></i>
                        </div>
                        <span>{{ $landingPage->contact_phone }}</span>
                    </div>
                    @endif
                    @if(!empty($landingPage->contact_email))
                    <div class="contact-info-row">
                        <div class="w-10 h-10 border-2 border-[#4a86b8] rounded-lg flex items-center justify-center flex-shrink-0 hover:bg-[#e8f0f7] transition-colors">
                            <i class="fa fa-envelope text-[#4a86b8]"></i>
                        </div>
                        <span>{{ $landingPage->contact_email }}</span>
                    </div>
                    @endif
                    <div class="contact-info-row">
                        <div class="w-10 h-10 border-2 border-[#4a86b8] rounded-lg flex items-center justify-center flex-shrink-0 hover:bg-[#e8f0f7] transition-colors">
                            <i class="fa fa-globe text-[#4a86b8]"></i>
                        </div>
                        <span>pusathalal.salmanitb.com</span>
                    </div>
                    <div class="contact-info-row">
                        <div class="w-10 h-10 border-2 border-[#4a86b8] rounded-lg flex items-center justify-center flex-shrink-0 hover:bg-[#e8f0f7] transition-colors">
                            <i class="fa fa-map-marker-alt text-[#4a86b8]"></i>
                        </div>
                        <span>Kompleks Masjid Salman ITB, Lt. 3<br><span class="text-sm text-gray-500 font-normal">Jl. Ganesha No.7, Bandung 40132</span></span>
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
            <div class="flex-1 rounded-2xl overflow-hidden border border-gray-200 hover:shadow-md transition-shadow" style="min-height:320px">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9!2d107.6096!3d-6.8917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64c5e8866b3%3A0x5030bfbca832610!2sMasjid%20Salman%20ITB!5e0!3m2!1sid!2sid!4v1"
                    width="100%" height="100%" style="border:0;min-height:320px" allowfullscreen loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection
