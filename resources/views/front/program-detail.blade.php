@extends('layouts.front')
{{-- @dd($programLayanan) --}}
@section('title')
    <title>{{ $programLayanan->nama_program }} - Halal Center</title>
@endsection

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZBD9MEK0DY"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-ZBD9MEK0DY');
</script>



@section('meta_description')
    {{ Str::limit($programLayanan->deskripsi, 160) }}
@endsection

@section('og_title', $programLayanan->nama_banner . ' - Pusat Halal Salman')

@section('og_description')
    {{ Str::limit($programLayanan->deskripsi, 200) }}
@endsection

@section('og_image', 'https://pusathalal.salmanitb.com/storage/' . $programLayanan->gambar_banner)

@section('additional_meta_tags')

@endsection



@push('css')
    <style>
        p {
            text-align: justify;
        }
    </style>
@endpush

@section('content')

    @if ($programLayanan->slug === 'audit-halal-produk-umkm')

        {{-- ============================================================ --}}
        {{-- TAMPILAN KHUSUS: AUDIT HALAL PRODUK UMKM (Halal Inspection)  --}}
        {{-- ============================================================ --}}

        @push('css')
            <style>
                .card-hover {
                    transition: transform 0.22s ease, box-shadow 0.22s ease;
                }

                .card-hover:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.10);
                }

                .section-title-box {
                    background: linear-gradient(135deg, #1a5f8b 0%, #0d4a72 100%);
                }

                .service-label {
                    color: #2b7fc1;
                    font-weight: 600;
                    font-size: 0.92rem;
                    letter-spacing: 0.01em;
                }

                .img-placeholder {
                    width: 100%;
                    height: 160px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 10px;
                    background: #eef2f7;
                }
            </style>
        @endpush

        {{-- HERO BANNER --}}
        <section class="relative flex items-center justify-center mb-10"
            style="background: linear-gradient(rgba(13,80,120,0.62), rgba(10,60,100,0.68)),
                   url('{{ $programLayanan->gambar_banner ? Storage::url($programLayanan->gambar_banner) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/UB_Malang.jpg/1280px-UB_Malang.jpg' }}') center/cover no-repeat;
                   min-height: 320px;">
            <div class="text-center px-6 py-16">
                <h1 class="text-white font-extrabold text-3xl md:text-5xl tracking-wide drop-shadow-lg uppercase">
                    {{ $programLayanan->nama_banner }}
                </h1>
                @if ($programLayanan->deskripsi)
                    <p class="text-white/80 mt-4 max-w-2xl mx-auto text-base md:text-lg">
                        {{ $programLayanan->deskripsi }}
                    </p>
                @endif

                @if ($activeBatch)
                    <div class="mt-6 inline-flex flex-col items-center gap-3">
                        <div class="flex items-center gap-3">
                            <span class="text-white font-semibold">
                                Batch {{ $activeBatch->batch_ke }} – {{ $activeBatch->nama_batch }}
                            </span>
                            <span class="px-3 py-1 bg-green-500 text-white text-sm rounded-full">
                                Pendaftaran Dibuka
                            </span>
                        </div>
                        <div class="flex gap-6 text-white">
                            <div>
                                <div class="text-sm opacity-75">Harga Program</div>
                                <div class="text-2xl font-bold">
                                    Rp {{ number_format($activeBatch->harga, 0, ',', '.') }}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm opacity-75">Sisa Kuota</div>
                                <div class="text-2xl font-bold">
                                    {{ $activeBatch->kuota }} Peserta
                                </div>
                            </div>
                        </div>
                        <div class="text-white/80 text-sm">
                            Batas Pendaftaran: {{ $activeBatch->tanggal_selesai_pendaftaran->format('d F Y') }}
                        </div>
                        <a href="{{ $activeBatch->external_link }}" target="_blank"
                            class="mt-2 px-6 py-3 bg-white text-blue-700 font-semibold rounded-lg hover:bg-blue-50 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </section>

        {{-- MODALS --}}

        {{-- MODAL: MAKANAN --}}
        <div x-data="{ open: false }" id="modal-makanan-wrapper">
            <template x-teleport="body">
                <div x-show="$store.modalMakanan.open" x-cloak x-transition
                    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-4"
                    @click.self="$store.modalMakanan.open = false">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-y-auto relative">
                        <button @click="$store.modalMakanan.open = false"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold z-10">&times;</button>
                        <div class="max-w-5xl mx-auto px-8 py-10 text-slate-500 leading-relaxed">
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Description:</h3>
                                <p class="text-[18px] leading-9">Sertifikasi halal untuk makanan memastikan bahwa produk
                                    yang dikonsumsi oleh umat Islam memenuhi syarat kehalalan sesuai syariat. Proses ini
                                    mencakup pemeriksaan bahan baku, seperti daging yang harus berasal dari hewan yang
                                    disembelih sesuai syariat, hingga penggunaan bahan tambahan seperti gelatin, enzim, atau
                                    pewarna yang mungkin berasal dari sumber haram. Proses produksi dan pengemasan juga
                                    diaudit untuk memastikan tidak ada kontaminasi dengan bahan najis.</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Examples of Products:</h3>
                                <ol class="list-decimal pl-8 space-y-3 text-[18px] leading-9">
                                    <li><span class="font-extrabold text-slate-700">Susu dan analognya</span>
                                        <div>Susu, Yogurt, Susu Kental Manis, Keju.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Lemak, minyak dan emulsi minyak</span>
                                        <div>Minyak Goreng, Mentega, Minyak Zaitun</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Es untuk dimakan (edible ice) termasuk
                                            sorbet</span>
                                        <div>Es Batu, Es Puter, Es lilin</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Buah dan sayur dengan pengolahan dan
                                            penambahan bahan tambahan pangan</span>
                                        <div>Asinan buah, Buah bersalut, Cincau hitam, Sayuran dalam kemasan</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Kembang gula/permen dan cokelat</span>
                                        <div>Cokelat Krim, Kembang gula</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Serealia dan produk serealia</span>
                                        <div>Nasi instan, Tepung terigu, Oatmeal, Pasta</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Produk menggunakan Bakteri</span>
                                        <div>Roti tawar, Roti Jala, Donut.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Daging dan produk olahan daging</span>
                                        <div>Daging, daging unggas, jeroan, Abon daging</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Ikan dan produk perikanan</span>
                                        <div>Ikan pindang, presto, terasi, sosis udang</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Telur olahan dan produk-produk telur
                                            hasil olahan</span>
                                        <div>Tepung telur, Telur fermentasi, selai kaya</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Gula dan pemanis termasuk madu</span>
                                        <div>Gula serbuk, Sirup glukosa, Gula Kelapa, Sirup buah</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Garam, rempah, sup, saus, salad, serta
                                            produk protein</span>
                                        <div>Garam Beriodium, lada, ketumbar bubuk, Pala Bubuk, Sup instan</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Pangan olahan untuk keperluan Gizi
                                            khusus</span>
                                        <div>Formula bayi, PKMK, PKMK untuk diet, Mpasi</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Makanan ringan siap santap</span>
                                        <div>Keripik kentang, Jagung berondong, Biskuit, Kacang atom, Sumpia Udang.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Pangan siap saji</span>
                                        <div>Pangan siap saji berbasis sayuran, Pangan siap saji berbasis kentang</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Penyediaan Makanan dan Minuman dengan
                                            Pengolahan</span>
                                        <div>Restoran, Rumah makan, Kantin/ kafetaria, Jasa Boga/ katering</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Bahan Tambahan Pangan</span>
                                        <div>Pemanis, Antioksidan, Pengatur Keasaman</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Kelompok bahan lainnya</span>
                                        <div>Tepung panir, Sarang burung walet, Vanili</div>
                                    </li>
                                </ol>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Required Documents:</h3>
                                <a href="#" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
                                    Document</a>
                            </section>
                            <section>
                                <h3 class="text-4xl font-extrabold text-black mb-4">Documents that need to be prepared
                                    during a field audit:</h3>
                                <ol class="list-decimal pl-8 space-y-2 text-[18px] leading-9">
                                    <li>Pemeriksaan daftar bahan;<div>Dokumen pendukung daftar bahan halal (SH, SHLN, MSDS,
                                            CoA, atau Halal Declaration)</div>
                                    </li>
                                    <li>Pemeriksaan proses produksi (wajib) hingga penyajian (jika ada); untuk produk olahan
                                        daging dapat dilampirkan video pencucian daging dengan menggunakan air mengalir</li>
                                    <li>Apabila produk yang menggunakan bahan daging dapat melampirkan surat pernyataan
                                        konsitensi pengambilan daging dari produsen, nota pembelian daging minimal 3 bulan
                                        terakhir)</li>
                                    <li>Pemeriksaan dokumen pembelian bahan minimal 3 (tiga) bulan terakhir;</li>
                                    <li>Pemeriksaan dokumen lainnya (hasil uji laboratorium, penjamah makanan, laik higiene
                                        dan sanitasi serta pest manajemen)</li>
                                    <li>Pemeriksaan gudang, kantor, area produksi, serta outlet (jika ada);</li>
                                    <li>Pemeriksaaan pelaksanaan/implementasi SJPH</li>
                                </ol>
                            </section>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- MODAL: MINUMAN --}}
        <div x-data="{ open: false }" id="modal-minuman-wrapper">
            <template x-teleport="body">
                <div x-show="$store.modalMinuman.open" x-cloak x-transition
                    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-4"
                    @click.self="$store.modalMinuman.open = false">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-y-auto relative">
                        <button @click="$store.modalMinuman.open = false"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold z-10">&times;</button>
                        <div class="max-w-5xl mx-auto px-8 py-10 text-slate-500 leading-relaxed">
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Description:</h3>
                                <p class="text-[18px] leading-9">Minuman yang memperoleh sertifikasi halal harus terbebas
                                    dari alkohol dan bahan-bahan lain yang dilarang dalam Islam. Lingkup pemeriksaan
                                    mencakup bahan baku, proses produksi, serta pengemasan. Titik kritis utama adalah
                                    kandungan alkohol, aditif minuman, serta penggunaan alat-alat yang harus bebas dari
                                    kontaminasi bahan haram selama proses produksi.</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Examples of Products:</h3>
                                <ol class="list-decimal pl-8 space-y-3 text-[18px] leading-9">
                                    <li><span class="font-extrabold text-slate-700">Minuman dengan pengolahan</span>
                                        <div>Air minum; Sari buah dan sari sayuran; Konsentrat sari buah dan sari sayur;
                                            Minuman berbasis air, berperisa, dan particulated drinks; Minuman berbasis susu;
                                            Minuman tradisional; Produk minuman dengan pengolahan lainnya</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Kelompok bahan minuman</span>
                                        <div>Bahan minuman (Premiks minuman)</div>
                                    </li>
                                </ol>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Required Documents:</h3>
                                <a href="#" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
                                    Document</a>
                            </section>
                            <section>
                                <h3 class="text-4xl font-extrabold text-black mb-4">Documents that need to be prepared
                                    during a field audit:</h3>
                                <ol class="list-decimal pl-8 space-y-2 text-[18px] leading-9">
                                    <li>Pemeriksaan daftar bahan;<div>Dokumen pendukung daftar bahan halal (SH, SHLN, MSDS,
                                            CoA, atau Halal Declaration.)</div>
                                    </li>
                                    <li>Pemeriksaan proses produksi (wajib) hingga penyajian (jika ada);</li>
                                    <li>Pemeriksaan dokumen pembelian bahan minimal 3 (tiga) bulan terakhir;</li>
                                    <li>Pemeriksaan gudang, kantor, area produksi, serta outlet (jika ada);</li>
                                    <li>Pemeriksaaan pelaksanaan/implementasi SJPH</li>
                                </ol>
                            </section>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- MODAL: OBAT --}}
        <div x-data="{ open: false }" id="modal-obat-wrapper">
            <template x-teleport="body">
                <div x-show="$store.modalObat.open" x-cloak x-transition
                    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-4"
                    @click.self="$store.modalObat.open = false">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-y-auto relative">
                        <button @click="$store.modalObat.open = false"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold z-10">&times;</button>
                        <div class="max-w-5xl mx-auto px-8 py-10 text-slate-500 leading-relaxed">
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Description:</h3>
                                <p class="text-[18px] leading-9">Sertifikasi halal pada obat memastikan bahwa bahan-bahan
                                    yang digunakan, baik bahan aktif maupun tambahan, berasal dari sumber yang halal dan
                                    suci. Pemeriksaan meliputi bahan kimia, bahan biologis seperti gelatin pada kapsul,
                                    hingga proses fermentasi yang mungkin menggunakan alkohol sebagai pelarut. Proses
                                    pengemasan obat juga diperiksa untuk memastikan kehalalan produk akhir.</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Examples of Products:</h3>
                                <ol class="list-decimal pl-8 space-y-3 text-[18px] leading-9">
                                    <li><span class="font-extrabold text-slate-700">Obat tradisional</span>
                                        <div>Jamu, Obat herbal terstandar, Fitofarmaka, Ekstrak bahan alam, Obat tradisional
                                            impor, Obat tradisional lisensi, Obat tradisional lainnya.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Suplemen kesehatan</span>
                                        <div>Suplemen kesehatan mengandung satu atau lebih bahan berupa vitamin, mineral,
                                            asam amino dan/atau bahan lain bukan tumbuhan; Bahan suplemen kesehatan.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Obat kuasi</span></li>
                                    <li><span class="font-extrabold text-slate-700">Obat bebas</span>
                                        <div>Semua obat bertanda hijau dengan tepian garis berwarna hitam</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Obat bebas terbatas</span>
                                        <div>Semua obat bertanda biru dengan tepian garis berwarna hitam</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Obat keras dikecualikan narkotika dan
                                            psikotropia</span>
                                        <div>Semua obat bertanda khusus pada kemasan dan etiket dengan huruf dalam lingkaran
                                            merah dan garis tepi berwarna hitam</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Bahan obat</span>
                                        <div>Bahan penyusun obat (Bahan aktif, Bahan eksipien)</div>
                                    </li>
                                </ol>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Required Documents:</h3>
                                <a href="#" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
                                    Document</a>
                            </section>
                            <section>
                                <h3 class="text-4xl font-extrabold text-black mb-4">Documents that need to be prepared
                                    during a field audit:</h3>
                                <p class="text-[18px] leading-9 text-slate-400 italic">Dokumen akan segera tersedia.</p>
                            </section>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- MODAL: KOSMETIK --}}
        <div x-data="{ open: false }" id="modal-kosmetik-wrapper">
            <template x-teleport="body">
                <div x-show="$store.modalKosmetik.open" x-cloak x-transition
                    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-4"
                    @click.self="$store.modalKosmetik.open = false">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-y-auto relative">
                        <button @click="$store.modalKosmetik.open = false"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold z-10">&times;</button>
                        <div class="max-w-5xl mx-auto px-8 py-10 text-slate-500 leading-relaxed">
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Description:</h3>
                                <p class="text-[18px] leading-9">Kosmetik yang mendapatkan sertifikasi halal harus terbebas
                                    dari bahan haram, baik yang berasal dari hewan maupun bahan kimia yang najis.
                                    Pemeriksaan mencakup bahan baku, seperti kolagen atau lanolin yang berasal dari hewan,
                                    serta bahan tambahan seperti pewarna atau pengawet. Proses produksi dan pengemasan juga
                                    diaudit untuk memastikan kebersihan dan ketiadaan kontaminasi.</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Examples of Products:</h3>
                                <ol class="list-decimal pl-8 space-y-3 text-[18px] leading-9">
                                    <li><span class="font-extrabold text-slate-700">Krim, emulsi, cair, gel, minyak untuk
                                            kulit</span>
                                        <div>Minyak bayi, Krim siang/malam, Pelembap.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Masker wajah</span>
                                        <div>Masker, Peeling, Masker mat.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Alas bedak</span>
                                        <div>Dasar make up/alas bedak, Penyamar noda pada wajah (concealer), Dasar make up
                                            untuk mata.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Bedak</span>
                                        <div>Bedak badan, Bedak Bayi, Bedak Wajah.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Sabun mandi</span>
                                        <div>Sabun cuci tangan (padat), Sabun mandi (padat).</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan wangi-wangian</span>
                                        <div>Wangi-wangian untuk bayi, Pewangi badan, Parfum.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan mandi</span>
                                        <div>Sabun mandi (cair), Sabun cuci tangan (cair), Sabun mandi antiseptik (cair).
                                        </div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Deodoran dan anti-perspiran</span></li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan rambut</span>
                                        <div>Pewarna Rambut, Sampo, Kondisioner.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan rias mata dan wajah</span>
                                        <div>Sediaan untuk alis, Eye liner, Mascara.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan perawatan dan rias bibir</span>
                                        <div>Lip color, Lip liner, Lip gloss.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan perawatan gigi dan mulut</span>
                                        <div>Pasta gigi, Mouth washer, Penyegar mulut.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan untuk perawatan dan rias
                                            kuku</span>
                                        <div>Top/base coat, Nail dryer, Pewarna kuku.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan tabir surya</span></li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan pencerah kulit</span>
                                        <div>Krim pemerah kulit sekitar mata, Pencerah kulit.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Sediaan anti-wrinkle</span>
                                        <div>Wrinkle smoothing, Skin aging product, Penyamar kerut kulit sekitar mata.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Bahan penyusun kosmetika</span></li>
                                </ol>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Required Documents:</h3>
                                <a href="#" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
                                    Document</a>
                            </section>
                            <section>
                                <h3 class="text-4xl font-extrabold text-black mb-4">Documents that need to be prepared
                                    during a field audit:</h3>
                                <ol class="list-decimal pl-8 space-y-2 text-[18px] leading-9">
                                    <li>Pemeriksaan daftar bahan;<div>Dokumen pendukung daftar bahan halal (SH, SHLN, MSDS,
                                            CoA, atau Halal Declaration.)</div>
                                    </li>
                                    <li>Pemeriksaan proses produksi (wajib) hingga penyajian (jika ada);</li>
                                    <li>Pemeriksaan dokumen pendukung lainnya (Hasil uji daya tembus air, dll)</li>
                                    <li>Pemeriksaan dokumen pembelian bahan minimal 3 (tiga) bulan terakhir;</li>
                                    <li>Pemeriksaan gudang, kantor, area produksi, serta outlet (jika ada);</li>
                                    <li>Pemeriksaaan pelaksanaan/implementasi SJPH</li>
                                </ol>
                            </section>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- MODAL: PRODUK KIMIAWI --}}
        <div x-data="{ open: false }" id="modal-kimiawi-wrapper">
            <template x-teleport="body">
                <div x-show="$store.modalKimiawi.open" x-cloak x-transition
                    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-4"
                    @click.self="$store.modalKimiawi.open = false">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-y-auto relative">
                        <button @click="$store.modalKimiawi.open = false"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold z-10">&times;</button>
                        <div class="max-w-5xl mx-auto px-8 py-10 text-slate-500 leading-relaxed">
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Description:</h3>
                                <p class="text-[18px] leading-9">Produk kimiawi seperti enzim, nutrisi mikroba atau bahan
                                    kimia lainnya juga bisa disertifikasi halal. Proses audit memastikan bahan baku yang
                                    digunakan dalam produk tersebut, terutama yang berasal dari hewan atau yang mengandung
                                    unsur najis, tidak melanggar syariat Islam. Titik kritis dalam produk kimiawi adalah
                                    bahan-bahan kimia yang dihasilkan dari proses-proses yang dapat melibatkan bahan haram.
                                </p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Examples of Products:</h3>
                                <ol class="list-decimal pl-8 space-y-3 text-[18px] leading-9">
                                    <li><span class="font-extrabold text-slate-700">Kelompok bahan penolong</span>
                                        <div>Bahan pemucat, pencuci, dan/atau pengelupas kulit; Bahan penjernih, penyaring,
                                            adsorben, dan/atau penghilang warna; Flokulan; Enzim; Katalis; Pengontrol
                                            pertumbuhan mikroorganisme; Resin penukar ion</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Bahan Kimiawi Lainnya</span>
                                        <div>Pengikis/abrasiv, Arang/karbon aktif, Alumina attapulgi, Fragrance Flavor,
                                            Surfaktan/Surface active agent, Chelating agent, Cloudifier Buffering, Media
                                            fermentasi, Hexamediamin, Cafein</div>
                                    </li>
                                </ol>
                                <p class="mt-4 text-sm italic text-slate-400">NB: Produk tersebut hanya yang terkait dengan
                                    makanan, minuman, obat, atau kosmetik</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Required Documents:</h3>
                                <a href="#" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
                                    Document</a>
                            </section>
                            <section>
                                <h3 class="text-4xl font-extrabold text-black mb-4">Documents that need to be prepared
                                    during a field audit:</h3>
                                <p class="text-[18px] leading-9 text-slate-400 italic">Dokumen akan segera tersedia.</p>
                            </section>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- MODAL: BARANG GUNAAN --}}
        <div x-data="{ open: false }" id="modal-gunaan-wrapper">
            <template x-teleport="body">
                <div x-show="$store.modalGunaan.open" x-cloak x-transition
                    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-4"
                    @click.self="$store.modalGunaan.open = false">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-y-auto relative">
                        <button @click="$store.modalGunaan.open = false"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold z-10">&times;</button>
                        <div class="max-w-5xl mx-auto px-8 py-10 text-slate-500 leading-relaxed">
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Description:</h3>
                                <p class="text-[18px] leading-9">Sertifikasi halal juga berlaku untuk barang-barang yang
                                    digunakan sehari-hari, seperti pakaian atau peralatan rumah tangga. Bahan yang
                                    digunakan, misalnya kulit hewan, harus berasal dari sumber yang halal. Proses produksi
                                    barang-barang ini juga harus terhindar dari kontaminasi bahan najis. Pemakaian bahan
                                    yang haram atau tercemar oleh najis dalam proses pembuatan akan menyebabkan barang
                                    tersebut tidak halal.</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Examples of Products:</h3>
                                <ol class="list-decimal pl-8 space-y-3 text-[18px] leading-9">
                                    <li><span class="font-extrabold text-slate-700">Sandang</span>
                                        <div>Pakaian, Kaos kaki, Jaket.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Penutup kepala</span>
                                        <div>Peci, Topi, Kerudung.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Aksesoris</span>
                                        <div>Dompet, Sepatu, Jam tangan.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Perbekalan kesehatan rumah
                                            tangga</span>
                                        <div>Tisu, Kapas, Sabun cuci, Detergen, Pembersih, Botol susu, Popok bayi,
                                            Antiseptika, Desinfektan, Pewangi, Pestisida rumah tangga.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Peralatan rumah tangga</span>
                                        <div>Piring, Gelas, Kuas.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Perlengkapan peribadatan bagi umat
                                            Islam</span>
                                        <div>Sajadah, Sarung, Mukena.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Kemasan produk</span>
                                        <div>Plystirene foam, Alumunium foil, Kemasan produk lainnya.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Alat tulis dan perlengkapan
                                            kantor</span>
                                        <div>Tinta, Lem, Bulpoin.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Alat kesehatan</span>
                                        <div>Peralatan kimia klinik dan toksikologi klinik; Peralatan hematologi dan
                                            patalogi; Peralatan imunologi dan mikrobiologi.</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Bahan penyusun barang gunaan</span>
                                        <div>Bulu hewan, Kulit hewan, Bahan penyusun barang gunaan lainnya.</div>
                                    </li>
                                </ol>
                                <p class="mt-4 text-sm italic text-slate-400">*NB: Contoh produk diatas hanya yang berasal
                                    dari dan/atau mengandung unsur hewan.</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Required Documents:</h3>
                                <a href="#" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
                                    Document</a>
                            </section>
                            <section>
                                <h3 class="text-4xl font-extrabold text-black mb-4">Documents that need to be prepared
                                    during a field audit:</h3>
                                <ol class="list-decimal pl-8 space-y-2 text-[18px] leading-9">
                                    <li>Pemeriksaan daftar bahan;<div>Dokumen pendukung daftar bahan halal (SH, SHLN, MSDS,
                                            CoA, atau Halal Declaration)</div>
                                    </li>
                                    <li>Pemeriksaan proses produksi (wajib)</li>
                                    <li>Pemeriksaan dokumen lainnya (hasil uji laboratorium, spesifikasi bahan, dll)</li>
                                    <li>Pemeriksaan dokumen pembelian bahan minimal 3 (tiga) bulan terakhir;</li>
                                    <li>Pemeriksaan gudang, kantor, area produksi, serta outlet (jika ada);</li>
                                    <li>Pemeriksaaan pelaksanaan/implementasi SJPH</li>
                                </ol>
                            </section>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- MODAL: JASA PENYEMBELIHAN --}}
        <div x-data="{ open: false }" id="modal-sembelih-wrapper">
            <template x-teleport="body">
                <div x-show="$store.modalSembelih.open" x-cloak x-transition
                    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-4"
                    @click.self="$store.modalSembelih.open = false">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-y-auto relative">
                        <button @click="$store.modalSembelih.open = false"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold z-10">&times;</button>
                        <div class="max-w-5xl mx-auto px-8 py-10 text-slate-500 leading-relaxed">
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Description:</h3>
                                <p class="text-[18px] leading-9">Jasa penyembelihan yang disertifikasi halal harus memenuhi
                                    syarat-syarat syariat dalam proses penyembelihan hewan. Proses ini mencakup metode
                                    penyembelihan yang harus dilakukan dengan memotong saluran makan, saluran pernafasan dan
                                    dua saluran darah, serta harus dilakukan oleh seorang Juru Sembelih Halal (Juleha) yang
                                    kompeten. Alat dan tempat penyembelihan serta pembuangan limbah juga diperiksa untuk
                                    memastikan tidak ada kontaminasi dengan bahan haram dan kebersihan tempat.</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Examples of Products:</h3>
                                <ol class="list-decimal pl-8 space-y-3 text-[18px] leading-9">
                                    <li><span class="font-extrabold text-slate-700">Jasa Penyembelihan</span>
                                        <div>Rumah potong hewan (RPH), Rumah potong unggas (RPU), Tempat pemotongan hewan
                                            (TPH), Slaughterhouse, Tempat pemotongan unggas (TPU), Jasa penyembelihan
                                            lainnya. Jasa tersebut hanya yang terkait dengan makanan, minuman, obat,
                                            kosmetik.</div>
                                    </li>
                                </ol>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Required Documents:</h3>
                                <a href="#" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
                                    Document</a>
                            </section>
                            <section>
                                <h3 class="text-4xl font-extrabold text-black mb-4">Documents that need to be prepared
                                    during a field audit:</h3>
                                <ol class="list-decimal pl-8 space-y-2 text-[18px] leading-9">
                                    <li>Pemeriksaan proses penyembelihan (masing-masing JULEHA 3 ekor) dan sampel stunning
                                        (jika ada)</li>
                                    <li>Pemeriksaan pasca penyembelihan</li>
                                    <li>Pemeriksaan tempat pengolahan limbah</li>
                                    <li>Pemeriksaan penutup tempat penyembelihan dengan kandang</li>
                                    <li>Pemeriksaan dokumen dokter hewan, juru sembelih halal (JULEHA)</li>
                                    <li>Pemeriksaan gudang, kantor, area produksi, serta outlet (jika ada);</li>
                                    <li>Pemeriksaaan pelaksanaan/implementasi SJPH</li>
                                </ol>
                            </section>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- MODAL: JASA PENGOLAHAN --}}
        <div x-data="{ open: false }" id="modal-pengolahan-wrapper">
            <template x-teleport="body">
                <div x-show="$store.modalPengolahan.open" x-cloak x-transition
                    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-4"
                    @click.self="$store.modalPengolahan.open = false">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-y-auto relative">
                        <button @click="$store.modalPengolahan.open = false"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold z-10">&times;</button>
                        <div class="max-w-5xl mx-auto px-8 py-10 text-slate-500 leading-relaxed">
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Description:</h3>
                                <p class="text-[18px] leading-9">Jasa pengolahan terkait makanan, minuman, obat dan
                                    kosmetik harus diaudit untuk memastikan bahwa setiap tahap pengolahan, mulai dari bahan
                                    baku hingga proses penyajian, sesuai dengan syariat Islam. Bahan yang digunakan harus
                                    halal, dan tidak ada kontaminasi dengan bahan haram atau najis selama proses produksi
                                    dan pengolahan.</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Examples of Products:</h3>
                                <ol class="list-decimal pl-8 space-y-3 text-[18px] leading-9">
                                    <li><span class="font-extrabold text-slate-700">Jasa Pengolahan</span>
                                        <div>Jasa pengolahan makanan, minuman, obat, dan kosmetik; Jasa pengolahan tekstil,
                                            pakaian jadi, dan produk kulit; Jasa pengolahan kayu dan kertas; Jasa pengolahan
                                            produk minyak, bahan kimia, dan barang-barang farmasi; Jasa pengolahan karet dan
                                            plastik; Jasa pengolahan lainnya.</div>
                                    </li>
                                </ol>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Required Documents:</h3>
                                <a href="#" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
                                    Document</a>
                            </section>
                            <section>
                                <h3 class="text-4xl font-extrabold text-black mb-4">Documents that need to be prepared
                                    during a field audit:</h3>
                                <p class="text-[18px] leading-9 text-slate-400 italic">Dokumen akan segera tersedia.</p>
                            </section>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- MODAL: JASA PENGEMASAN --}}
        <div x-data="{ open: false }" id="modal-pengemasan-wrapper">
            <template x-teleport="body">
                <div x-show="$store.modalPengemasan.open" x-cloak x-transition
                    class="fixed inset-0 z-[9999] bg-black/60 flex items-center justify-center p-4"
                    @click.self="$store.modalPengemasan.open = false">
                    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl max-h-[90vh] overflow-y-auto relative">
                        <button @click="$store.modalPengemasan.open = false"
                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl font-bold z-10">&times;</button>
                        <div class="max-w-5xl mx-auto px-8 py-10 text-slate-500 leading-relaxed">
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Description:</h3>
                                <p class="text-[18px] leading-9">Jasa pengemasan harus memastikan bahwa produk halal
                                    dikemas tanpa adanya kontaminasi dengan bahan yang haram. Bahan kemasan yang digunakan,
                                    seperti plastik atau kertas, harus bebas dari unsur haram, dan alat yang digunakan untuk
                                    pengemasan harus bersih dari kontaminasi bahan najis atau haram.</p>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Examples of Products:</h3>
                                <ol class="list-decimal pl-8 space-y-3 text-[18px] leading-9">
                                    <li><span class="font-extrabold text-slate-700">Jasa pengepakan/pengemasan
                                            produk</span>
                                        <div>Jasa pengepakan/pengemasan produk berupa barang yang terkait dengan makanan,
                                            minuman, obat dan kosmetik</div>
                                    </li>
                                    <li><span class="font-extrabold text-slate-700">Jasa pengemasan lainnya</span></li>
                                </ol>
                            </section>
                            <section class="mb-10">
                                <h3 class="text-4xl font-extrabold text-black mb-4">Required Documents:</h3>
                                <a href="#" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
                                    Document</a>
                            </section>
                            <section>
                                <h3 class="text-4xl font-extrabold text-black mb-4">Documents that need to be prepared
                                    during a field audit:</h3>
                                <p class="text-[18px] leading-9 text-slate-400 italic">Dokumen akan segera tersedia.</p>
                            </section>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- Alpine Store Init --}}
        @push('scripts')
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.store('modalMakanan', {
                        open: false
                    });
                    Alpine.store('modalMinuman', {
                        open: false
                    });
                    Alpine.store('modalObat', {
                        open: false
                    });
                    Alpine.store('modalKosmetik', {
                        open: false
                    });
                    Alpine.store('modalKimiawi', {
                        open: false
                    });
                    Alpine.store('modalGunaan', {
                        open: false
                    });
                    Alpine.store('modalSembelih', {
                        open: false
                    });
                    Alpine.store('modalPengolahan', {
                        open: false
                    });
                    Alpine.store('modalPengemasan', {
                        open: false
                    });
                });
            </script>
        @endpush

        {{-- MAIN CONTENT --}}
        <main class="max-w-7xl mx-auto px-4 pb-16">

            {{-- Title Box --}}
            <div
                class="section-title-box rounded-2xl flex items-center justify-center p-8 max-w-xs mx-auto mb-8 shadow-lg">
                <div class="text-center text-white">
                    <p class="text-xs uppercase tracking-widest opacity-80 mb-1">Layanan</p>
                    <h2 class="text-2xl font-extrabold uppercase leading-tight">
                        Halal<br />Inspection<br />Service
                    </h2>
                </div>
            </div>

            {{-- Cards Grid: 9 items --}}
            <div x-data class="grid grid-cols-2 md:grid-cols-3 gap-5 mb-12">

                {{-- MAKANAN --}}
                <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalMakanan.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f373.svg"
                            class="h-20 opacity-80" alt="Makanan" />
                    </div>
                    <p class="service-label mb-2">MAKANAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Sertifikasi halal untuk makanan memastikan bahwa
                        produk yang dikonsumsi memenuhi syarat kehalalan sesuai syariat.</p>
                </div>

                {{-- MINUMAN --}}
                <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalMinuman.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f9c3.svg"
                            class="h-20 opacity-80" alt="Minuman" />
                    </div>
                    <p class="service-label mb-2">MINUMAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Minuman yang memperoleh sertifikasi halal harus
                        terbebas dari alkohol dan bahan-bahan lain yang dilarang dalam Islam.</p>
                </div>

                {{-- OBAT --}}
                <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalObat.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f489.svg"
                            class="h-20 opacity-80" alt="Obat" />
                    </div>
                    <p class="service-label mb-2">OBAT</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Sertifikasi halal pada obat memastikan bahwa
                        bahan-bahan yang digunakan berasal dari sumber yang halal dan suci.</p>
                </div>

                {{-- KOSMETIK --}}
                <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalKosmetik.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f48e.svg"
                            class="h-20 opacity-80" alt="Kosmetik" />
                    </div>
                    <p class="service-label mb-2">KOSMETIK</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Kosmetik yang mendapatkan sertifikasi halal harus
                        terbebas dari bahan haram, baik dari hewan maupun bahan kimia yang najis.</p>
                </div>

                {{-- PRODUK KIMIAWI --}}
                <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalKimiawi.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f9ea.svg"
                            class="h-20 opacity-80" alt="Produk Kimiawi" />
                    </div>
                    <p class="service-label mb-2">PRODUK KIMIAWI</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Produk kimiawi seperti enzim dan nutrisi mikroba juga
                        dapat disertifikasi halal sesuai syariat Islam.</p>
                </div>

                {{-- BARANG GUNAAN --}}
                <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalGunaan.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f6cd.svg"
                            class="h-20 opacity-80" alt="Barang Gunaan" />
                    </div>
                    <p class="service-label mb-2">BARANG GUNAAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Sertifikasi halal berlaku untuk barang sehari-hari
                        seperti pakaian atau peralatan rumah tangga yang mengandung unsur hewan.</p>
                </div>

                {{-- JASA PENYEMBELIHAN --}}
                <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalSembelih.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f404.svg"
                            class="h-20 opacity-80" alt="Jasa Penyembelihan" />
                    </div>
                    <p class="service-label mb-2">JASA PENYEMBELIHAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Jasa penyembelihan yang disertifikasi halal harus
                        memenuhi syarat syariat dan dilakukan oleh Juru Sembelih Halal (Juleha) yang kompeten.</p>
                </div>

                {{-- JASA PENGOLAHAN --}}
                <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalPengolahan.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f3ed.svg"
                            class="h-20 opacity-80" alt="Jasa Pengolahan" />
                    </div>
                    <p class="service-label mb-2">JASA PENGOLAHAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Jasa pengolahan terkait makanan, minuman, obat dan
                        kosmetik diaudit untuk memastikan setiap tahap sesuai syariat Islam.</p>
                </div>

                {{-- JASA PENGEMASAN --}}
                <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalPengemasan.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f4cb.svg"
                            class="h-20 opacity-80" alt="Jasa Pengemasan" />
                    </div>
                    <p class="service-label mb-2">JASA PENGEMASAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Jasa pengemasan harus memastikan produk halal dikemas
                        tanpa kontaminasi bahan haram dan alat yang digunakan bersih dari najis.</p>
                </div>

            </div>

            {{-- Hitung Biaya Layanan --}}
            <div class="mb-12">
                <a href="https://bpjph.halal.go.id/kalkulator-biaya-sh/" target="_blank" rel="noopener noreferrer"
                    class="block bg-gradient-to-r from-[#1a5f8b] to-[#0d4a72] rounded-2xl p-6 md:p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-calculator text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-extrabold text-lg md:text-xl">Hitung Biaya Layanan</h3>
                                <p class="text-white/70 text-sm mt-1">Kalkulator estimasi biaya sertifikasi halal dari BPJPH</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 bg-white text-[#1a5f8b] font-bold px-6 py-3 rounded-xl group-hover:bg-blue-50 transition-colors">
                            <span>Hitung Sekarang</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Upcoming Batches (jika ada) --}}
            @if ($upcomingBatches->isNotEmpty())
                <div class="mt-12 md:ml-[272px]">
                    <h2 class="text-xl font-bold mb-4 text-gray-800">Batch Mendatang</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($upcomingBatches as $batch)
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                                <h3 class="font-semibold text-gray-800">
                                    Batch {{ $batch->batch_ke }} - {{ $batch->nama_batch }}
                                </h3>
                                <div class="text-sm text-gray-600 space-y-1 mt-2">
                                    <p>
                                        <i class="fas fa-calendar-alt w-5"></i>
                                        Mulai: {{ $batch->tanggal_mulai_program->format('d F Y') }}
                                    </p>
                                    <p>
                                        <i class="fas fa-users w-5"></i>
                                        Kuota: {{ $batch->kuota }} peserta
                                    </p>
                                    <p>
                                        <i class="fas fa-tag w-5"></i>
                                        Rp {{ number_format($batch->harga, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </main>
    @else
        {{-- ============================================================ --}}
        {{-- TAMPILAN DEFAULT UNTUK SLUG LAINNYA                          --}}
        {{-- ============================================================ --}}

        {{-- HERO BANNER --}}
        <section class="relative flex items-center justify-center mb-10"
            style="background: linear-gradient(rgba(13,80,120,0.62), rgba(10,60,100,0.68)),
                   url('{{ $programLayanan->gambar_banner ? Storage::url($programLayanan->gambar_banner) : '' }}') center/cover no-repeat;
                   min-height: 320px;">
            <div class="text-center px-6 py-16">
                <h1 class="text-white font-extrabold text-3xl md:text-5xl tracking-wide drop-shadow-lg uppercase">
                    {{ $programLayanan->nama_banner }}
                </h1>
                @if ($programLayanan->deskripsi)
                    <p class="text-white/80 mt-4 max-w-2xl mx-auto text-base md:text-lg">
                        {{ $programLayanan->deskripsi }}
                    </p>
                @endif

                @if ($activeBatch)
                    <div class="mt-6 inline-flex flex-col items-center gap-3">
                        <div class="flex items-center gap-3">
                            <span class="text-white font-semibold">
                                Batch {{ $activeBatch->batch_ke }} – {{ $activeBatch->nama_batch }}
                            </span>
                            <span class="px-3 py-1 bg-green-500 text-white text-sm rounded-full">
                                Pendaftaran Dibuka
                            </span>
                        </div>
                        <div class="flex gap-6 text-white">
                            <div>
                                <div class="text-sm opacity-75">Harga Program</div>
                                <div class="text-2xl font-bold">
                                    Rp {{ number_format($activeBatch->harga, 0, ',', '.') }}
                                </div>
                            </div>
                            <div>
                                <div class="text-sm opacity-75">Sisa Kuota</div>
                                <div class="text-2xl font-bold">
                                    {{ $activeBatch->kuota }} Peserta
                                </div>
                            </div>
                        </div>
                        <div class="text-white/80 text-sm">
                            Batas Pendaftaran: {{ $activeBatch->tanggal_selesai_pendaftaran->format('d F Y') }}
                        </div>
                        <a href="{{ $activeBatch->external_link }}" target="_blank"
                            class="mt-2 px-6 py-3 bg-white text-blue-700 font-semibold rounded-lg hover:bg-blue-50 transition">
                            Daftar Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </section>

        {{-- MAIN CONTENT --}}
        <main class="max-w-7xl mx-auto px-4 pb-16">

            {{-- IMAGE BANNER (jika ada) --}}
            @if ($programLayanan->gambar_banner)
                <div x-data="{ open: false }" class="relative cursor-pointer mb-10 max-w-3xl mx-auto">

                    {{-- IMAGE THUMBNAIL --}}
                    <img src="{{ Storage::url($programLayanan->gambar_banner) }}"
                        alt="{{ $programLayanan->nama_program }}"
                        class="rounded-xl shadow-lg object-cover w-full max-h-[420px] cursor-zoom-in"
                        @click="open = true">

                    {{-- HOVER OVERLAY --}}
                    <div
                        class="absolute inset-0 bg-black/30 opacity-0 hover:opacity-100 transition flex items-center justify-center rounded-xl pointer-events-none">
                        <span class="text-white text-sm">Klik untuk memperbesar</span>
                    </div>

                    {{-- MODAL IMAGE --}}
                    <div x-show="open" x-cloak x-transition
                        class="fixed inset-0 z-[9999] bg-black/80 flex items-center justify-center"
                        @click.self="open = false">
                        <img src="{{ Storage::url($programLayanan->gambar_banner) }}"
                            class="max-w-[90%] max-h-[90%] rounded-lg shadow-2xl">
                    </div>

                </div>
            @endif

            {{-- PROGRAM DETAILS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- MAIN CONTENT --}}
                <div class="md:col-span-2 space-y-6">

                    {{-- Apa itu --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-2xl font-bold mb-4">Apa itu {{ $programLayanan->nama_banner }}</h2>
                        <div>
                            <p class="font-semibold text-wrap">{!! $programLayanan->deskripsi_lengkap !!}</p>
                        </div>
                    </div>

                    {{-- Informasi Program --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-2xl font-bold mb-4">Informasi Program</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <span class="text-gray-600">Tipe Kelas</span>
                                <p class="font-semibold">{{ ucfirst($programLayanan->tipe_kelas) }}</p>
                            </div>
                            <div>
                                <span class="text-gray-600">Durasi Program</span>
                                <p class="font-semibold">{{ $programLayanan->durasi }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Materi --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-2xl font-bold mb-4">Apa saja yang dipelajari di {{ $programLayanan->nama_banner }}
                        </h2>
                        <ul class="space-y-2">
                            @foreach ($programLayanan->materi as $materi)
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-check-circle text-primary mt-1"></i>
                                    <span>{{ $materi }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Manfaat --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-2xl font-bold mb-4">Benefit Program</h2>
                        <ul class="space-y-2">
                            @foreach ($programLayanan->manfaat as $manfaat)
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-star text-yellow-500 mt-1"></i>
                                    <span>{{ $manfaat }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Persyaratan / Capaian --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-2xl font-bold mb-4">Capaian Program</h2>
                        <ul class="space-y-2">
                            @foreach ($programLayanan->persyaratan as $syarat)
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-clipboard-check text-primary mt-1"></i>
                                    <span>{{ $syarat }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Alur Proses --}}
                    @if (count($programLayanan['alur_proses']) > 1)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                            <h2 class="text-2xl font-bold mb-4">Alur Proses</h2>
                            <div class="space-y-4">
                                @foreach ($programLayanan->alur_proses as $index => $alur)
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                                            {{ $index + 1 }}
                                        </div>
                                        <div>
                                            <p>{{ $alur }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                {{-- SIDEBAR --}}
                <div class="space-y-6">
                    {{-- Upcoming Batches --}}
                    @if ($upcomingBatches->isNotEmpty())
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                            <h2 class="text-xl font-bold mb-4">Batch Mendatang</h2>
                            <div class="space-y-4">
                                @foreach ($upcomingBatches as $batch)
                                    <div class="border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                                        <h3 class="font-semibold text-gray-800">
                                            Batch {{ $batch->batch_ke }} - {{ $batch->nama_batch }}
                                        </h3>
                                        <div class="text-sm text-gray-600 space-y-1 mt-2">
                                            <p>
                                                <i class="fas fa-calendar-alt w-5"></i>
                                                Mulai: {{ $batch->tanggal_mulai_program->format('d F Y') }}
                                            </p>
                                            <p>
                                                <i class="fas fa-users w-5"></i>
                                                Kuota: {{ $batch->kuota }} peserta
                                            </p>
                                            <p>
                                                <i class="fas fa-tag w-5"></i>
                                                Rp {{ number_format($batch->harga, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

            </div>

        </main>

    @endif

@endsection
