<!-- Footer -->
<footer class="py-12" style="background:linear-gradient(135deg,#4a86b8,#2c5478)">
    <div class="max-w-screen-xl mx-auto px-8">
        <div class="grid md:grid-cols-3 gap-10">
            <!-- Brand -->
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <div
                        class="w-14 h-14 rounded-full border-2 border-white/30 bg-white/10 flex items-center justify-center">
                        @if (file_exists(public_path('logolph.png')))
                            <img src="{{ asset('logolph.png') }}" alt="Logo" class="h-10 rounded">
                        @else
                            <i class="fa fa-mosque text-white text-xl"></i>
                        @endif
                    </div>
                    <div>
                        <div class="font-black text-3xl leading-none" style="color:#b8972a">LPH</div>
                        <div style="font-size:8px;letter-spacing:.12em" class="text-white/60 font-semibold">SALMAN ITB
                        </div>
                    </div>
                </div>
                <p class="text-white/80 text-sm leading-relaxed">
                    {{ $footerLandingPage->footer_description ?? 'Lembaga Pemeriksa Halal (LPH) YPM Salman ITB adalah lembaga di bawah naungan Yayasan Pembina Masjid Salman ITB yang bergerak di bidang pemeriksaan kehalalan produk.' }}
                </p>
            </div>

            <!-- Service Scope -->
            <div>
                {{-- <h4 class="text-white font-bold text-base mb-5">Service Scope</h4>
                <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-sm text-white/80">
                    @foreach ($footerPrograms as $program)
                        <a href="{{ route('program-layanan.show', $program) }}"
                            class="hover:text-white transition">{{ $program->nama_program }}</a>
                    @endforeach
                </div> --}}
                <h4 class="text-white font-bold text-base mb-5">Service Scope</h4>
                <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-sm text-white/80">
                    <a href="{{ route('front.index') }}" class="hover:text-white transition">Makanan</a>
                    <a href="{{ route('front.index') }}" class="hover:text-white transition">Minuman</a>
                    <a href="{{ route('front.index') }}" class="hover:text-white transition">Obat</a>
                    <a href="{{ route('front.index') }}" class="hover:text-white transition">Kosmetik</a>
                    {{-- <a href="{{ route('front.index') }}" class="hover:text-white transition">Produk Kimia</a> --}}
                    <a href="{{ route('front.index') }}" class="hover:text-white transition">Barang Gunaan</a>
                    <a href="{{ route('front.index') }}" class="hover:text-white transition">Jasa Penyembelihan</a>
                    <a href="{{ route('front.index') }}" class="hover:text-white transition">Jasa Penjualan</a>
                    <a href="{{ route('front.index') }}" class="hover:text-white transition">Jasa Pengemasan</a>
                </div>

            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-white font-bold text-base mb-5">Our Contact</h4>
                <div class="text-white/80 text-sm leading-loose mb-6">
                    <p class="font-semibold text-white">Alamat:</p>
                    <p>Kompleks Masjid Salman ITB, Lantai 3</p>
                    <p>Jl. Ganesha No.7, Lb. Siliwangi,</p>
                    <p>Kec. Coblong, Kota Bandung 40132</p>
                </div>

                @if (!empty($footerLandingPage->contact_email))
                    <div class="text-white/80 text-sm mb-2">
                        <i class="fa fa-envelope mr-2 text-[#b8972a]"></i>
                        <a href="mailto:{{ $footerLandingPage->contact_email }}"
                            class="hover:text-white">{{ $footerLandingPage->contact_email }}</a>
                    </div>
                @endif

                @if (!empty($footerLandingPage->contact_whatsapp))
                    <div class="text-white/80 text-sm mb-4">
                        <i class="fa fa-phone mr-2 text-[#b8972a]"></i>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $footerLandingPage->contact_whatsapp) }}"
                            class="hover:text-white">{{ $footerLandingPage->contact_whatsapp }}</a>
                    </div>
                @endif

                <div class="flex gap-3 mt-4">
                    @if (!empty($footerLandingPage->social_facebook))
                        <a href="{{ $footerLandingPage->social_facebook }}" target="_blank"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#b8972a] transition transform hover:scale-110">
                            <i class="fab fa-facebook text-white"></i>
                        </a>
                    @endif
                    @if (!empty($footerLandingPage->social_instagram))
                        <a href="{{ $footerLandingPage->social_instagram }}" target="_blank"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#b8972a] transition transform hover:scale-110">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                    @endif
                    @if (!empty($footerLandingPage->social_twitter))
                        <a href="{{ $footerLandingPage->social_twitter }}" target="_blank"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#b8972a] transition transform hover:scale-110">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                    @endif
                    @if (!empty($footerLandingPage->social_linkedin))
                        <a href="{{ $footerLandingPage->social_linkedin }}" target="_blank"
                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-[#b8972a] transition transform hover:scale-110">
                            <i class="fab fa-linkedin text-white"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="border-t border-white/20 mt-10 pt-6 text-center text-xs text-white/50">
            Â© {{ date('Y') }} LPH Salman ITB â€” Lembaga Pemeriksa Halal Yayasan Pembina Masjid Salman ITB. All
            rights reserved.
        </div>
    </div>
</footer>
