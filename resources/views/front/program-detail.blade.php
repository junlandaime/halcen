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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        p {
            text-align: justify;
        }

        /* ── Hero ── */
        .hero-section {
            position: relative;
            min-height: 280px;
            overflow: hidden;
        }

        .hero-section .hero-bg {
            position: absolute;
            inset: 0;
        }

        .hero-section .hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-section .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(20, 80, 120, 0.65);
        }

        .hero-section .hero-content {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            min-height: 280px;
            padding: 2rem 2rem;
        }

        /* ── Purpose block ── */
        .purpose-wrap {
            display: flex;
            flex-direction: column;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        @media (min-width: 768px) {
            .purpose-wrap {
                flex-direction: row;
            }
        }

        .purpose-label {
            background: linear-gradient(135deg, #1a6a9a, #1e7bb5);
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 2rem;
            min-height: 10rem;
        }

        @media (min-width: 768px) {
            .purpose-label {
                width: 12rem;
                min-height: unset;
            }
        }

        .purpose-content {
            flex: 1;
            background: white;
            border: 1px solid #f3f4f6;
            padding: 2rem;
            color: #374151;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* ── Content sections ── */
        .about-section-card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #f3f4f6;
            padding: 2rem;
            color: #374151;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* ── Sidebar label ── */
        .sidebar-label {
            background: linear-gradient(135deg, #1a6a9a, #1e7bb5);
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 1.5rem;
            border-radius: 0.75rem;
            min-height: 8rem;
            box-shadow: 0 4px 12px rgba(26, 106, 154, 0.3);
        }

        @media (min-width: 768px) {
            .sidebar-label {
                width: 9rem;
                min-height: unset;
                border-radius: 0.75rem;
            }
        }

        /* ── Task list item ── */
        .task-item {
            display: flex;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            border-radius: 0.5rem;
            background: #f8fafc;
            border-left: 3px solid #1e7bb5;
            font-size: 0.9rem;
            color: #374151;
            line-height: 1.6;
        }

        .task-item .task-num {
            flex-shrink: 0;
            width: 1.5rem;
            height: 1.5rem;
            background: #1e7bb5;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            margin-top: 0.1rem;
        }

        /* ── Badge pill ── */
        .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #dbeafe;
            color: #1e40af;
            font-size: 0.78rem;
            font-weight: 600;
            padding: 0.3rem 0.8rem;
            border-radius: 9999px;
        }

        /* ── Program cards ── */
        .program-card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            border-top: 3px solid #1e7bb5;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .program-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(26, 106, 154, 0.18);
        }

        /* ── Fade-up animation ── */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp 0.6s ease both;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }

        /* ── VM icon wrap ── */
        .vm-icon-wrap {
            background: #dbeafe;
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        /* ── Section anchor ── */
        .section-anchor {
            scroll-margin-top: 80px;
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
                                <a href="https://drive.google.com/drive/folders/1sLZ63chjv0GKpwB1OiqgidAsrVZUqtfC"
                                    target="_blank" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
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
                                <a href="https://drive.google.com/drive/folders/1sLZ63chjv0GKpwB1OiqgidAsrVZUqtfC"
                                    target="_blank" class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
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
        {{-- <div x-data="{ open: false }" id="modal-obat-wrapper">
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
                                <a href="https://drive.google.com/drive/folders/1sLZ63chjv0GKpwB1OiqgidAsrVZUqtfC"
                                    target="_blank"
                                    class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
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
        </div> --}}

        {{-- MODAL: KOSMETIK --}}
        {{-- <div x-data="{ open: false }" id="modal-kosmetik-wrapper">
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
                                <a href="https://drive.google.com/drive/folders/1sLZ63chjv0GKpwB1OiqgidAsrVZUqtfC"
                                    target="_blank"
                                    class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
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
        </div> --}}

        {{-- MODAL: PRODUK KIMIAWI --}}
        {{-- <div x-data="{ open: false }" id="modal-kimiawi-wrapper">
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
                                <a href="https://drive.google.com/drive/folders/1sLZ63chjv0GKpwB1OiqgidAsrVZUqtfC"
                                    target="_blank"
                                    class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
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
        </div> --}}

        {{-- MODAL: BARANG GUNAAN --}}
        {{-- <div x-data="{ open: false }" id="modal-gunaan-wrapper">
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
                                <a href="https://drive.google.com/drive/folders/1sLZ63chjv0GKpwB1OiqgidAsrVZUqtfC"
                                    target="_blank"
                                    class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
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
        </div> --}}

        {{-- MODAL: JASA PENYEMBELIHAN --}}
        {{-- <div x-data="{ open: false }" id="modal-sembelih-wrapper">
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
                                <a href="https://drive.google.com/drive/folders/1sLZ63chjv0GKpwB1OiqgidAsrVZUqtfC"
                                    target="_blank"
                                    class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
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
        </div> --}}

        {{-- MODAL: JASA PENGOLAHAN --}}
        {{-- <div x-data="{ open: false }" id="modal-pengolahan-wrapper">
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
                                <a href="https://drive.google.com/drive/folders/1sLZ63chjv0GKpwB1OiqgidAsrVZUqtfC"
                                    target="_blank"
                                    class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
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
        </div> --}}

        {{-- MODAL: JASA PENGEMASAN --}}
        {{-- <div x-data="{ open: false }" id="modal-pengemasan-wrapper">
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
                                <a href="https://drive.google.com/drive/folders/1sLZ63chjv0GKpwB1OiqgidAsrVZUqtfC"
                                    target="_blank"
                                    class="text-indigo-600 underline text-[18px] hover:text-indigo-700">See
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
        </div> --}}

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
            <div class="section-title-box rounded-2xl flex items-center justify-center p-8 max-w-xs mx-auto mb-8 shadow-lg">
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
                {{-- <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalObat.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f489.svg"
                            class="h-20 opacity-80" alt="Obat" />
                    </div>
                    <p class="service-label mb-2">OBAT</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Sertifikasi halal pada obat memastikan bahwa
                        bahan-bahan yang digunakan berasal dari sumber yang halal dan suci.</p>
                </div> --}}

                {{-- KOSMETIK --}}
                {{-- <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalKosmetik.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f48e.svg"
                            class="h-20 opacity-80" alt="Kosmetik" />
                    </div>
                    <p class="service-label mb-2">KOSMETIK</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Kosmetik yang mendapatkan sertifikasi halal harus
                        terbebas dari bahan haram, baik dari hewan maupun bahan kimia yang najis.</p>
                </div> --}}

                {{-- PRODUK KIMIAWI --}}
                {{-- <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalKimiawi.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f9ea.svg"
                            class="h-20 opacity-80" alt="Produk Kimiawi" />
                    </div>
                    <p class="service-label mb-2">PRODUK KIMIAWI</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Produk kimiawi seperti enzim dan nutrisi mikroba juga
                        dapat disertifikasi halal sesuai syariat Islam.</p>
                </div> --}}

                {{-- BARANG GUNAAN --}}
                {{-- <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalGunaan.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f6cd.svg"
                            class="h-20 opacity-80" alt="Barang Gunaan" />
                    </div>
                    <p class="service-label mb-2">BARANG GUNAAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Sertifikasi halal berlaku untuk barang sehari-hari
                        seperti pakaian atau peralatan rumah tangga yang mengandung unsur hewan.</p>
                </div> --}}

                {{-- JASA PENYEMBELIHAN --}}
                {{-- <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalSembelih.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f404.svg"
                            class="h-20 opacity-80" alt="Jasa Penyembelihan" />
                    </div>
                    <p class="service-label mb-2">JASA PENYEMBELIHAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Jasa penyembelihan yang disertifikasi halal harus
                        memenuhi syarat syariat dan dilakukan oleh Juru Sembelih Halal (Juleha) yang kompeten.</p>
                </div> --}}

                {{-- JASA PENGOLAHAN --}}
                {{-- <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalPengolahan.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f3ed.svg"
                            class="h-20 opacity-80" alt="Jasa Pengolahan" />
                    </div>
                    <p class="service-label mb-2">JASA PENGOLAHAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Jasa pengolahan terkait makanan, minuman, obat dan
                        kosmetik diaudit untuk memastikan setiap tahap sesuai syariat Islam.</p>
                </div> --}}

                {{-- JASA PENGEMASAN --}}
                {{-- <div class="bg-white rounded-2xl p-5 card-hover shadow-sm border border-gray-100 cursor-pointer"
                    @click="$store.modalPengemasan.open = true">
                    <div class="img-placeholder mb-4">
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/twemoji/14.0.2/svg/1f4cb.svg"
                            class="h-20 opacity-80" alt="Jasa Pengemasan" />
                    </div>
                    <p class="service-label mb-2">JASA PENGEMASAN</p>
                    <p class="text-gray-500 text-xs leading-relaxed">Jasa pengemasan harus memastikan produk halal dikemas
                        tanpa kontaminasi bahan haram dan alat yang digunakan bersih dari najis.</p>
                </div> --}}

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
                                <p class="text-white/70 text-sm mt-1">Kalkulator estimasi biaya sertifikasi halal dari
                                    BPJPH</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-2 bg-white text-[#1a5f8b] font-bold px-6 py-3 rounded-xl group-hover:bg-blue-50 transition-colors">
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

        {{-- ══════════════════════ HERO ══════════════════════ --}}
        <section class="hero-section fade-up" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
            <div class="hero-bg">
                @if ($programLayanan->gambar_banner)
                    <img src="{{ Storage::url($programLayanan->gambar_banner) }}"
                        alt="{{ $programLayanan->nama_banner }}"
                        x-bind:style="`transform: translateY(${scroll * 0.4}px)`">
                @endif
            </div>
            <div class="hero-overlay"></div>
            <div class="hero-content max-w-6xl mx-auto w-full">
                <div class="text-white">
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg mb-3">
                        {{ $programLayanan->nama_banner }}
                    </h1>
                    @if ($programLayanan->deskripsi)
                        <p class="text-lg md:text-xl text-blue-100">{{ $programLayanan->deskripsi }}</p>
                    @endif

                    @if ($activeBatch)
                        <div class="mt-6 flex flex-wrap items-center gap-4">
                            <span class="badge-pill" style="background:#065f46;color:#d1fae5;">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="5" />
                                </svg>
                                Pendaftaran Dibuka
                            </span>
                            <span class="text-blue-100 text-sm font-medium">
                                Batch {{ $activeBatch->batch_ke }} – {{ $activeBatch->nama_batch }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        {{-- ══════════════════════ BATCH INFO BAR ══════════════════════ --}}
        @if ($activeBatch)
            <div class="fade-up delay-1"
                style="background:linear-gradient(135deg,#1a6a9a 0%,#1e7bb5 50%,#1a6a9a 100%);padding:2rem 1rem;">
                <div
                    style="max-width:900px;margin:0 auto;display:flex;flex-wrap:wrap;align-items:center;justify-content:space-around;gap:2rem;">
                    <div class="flex items-center gap-5">
                        <div class="counter-icon"
                            style="width:70px;height:70px;border:3px solid #4dd9e8;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <svg class="w-9 h-9 text-cyan-300" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-white text-3xl font-extrabold leading-none">Rp
                                {{ number_format($activeBatch->harga, 0, ',', '.') }}</div>
                            <div class="text-cyan-200 text-sm font-medium mt-1">Harga Program</div>
                        </div>
                    </div>
                    <div style="display:none;width:1px;height:64px;background:rgba(147,197,253,0.4);"
                        class="hidden md:block"></div>
                    <div class="flex items-center gap-5">
                        <div
                            style="width:70px;height:70px;border:3px solid #4dd9e8;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <svg class="w-9 h-9 text-cyan-300" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-white text-3xl font-extrabold leading-none">{{ $activeBatch->kuota }} Peserta
                            </div>
                            <div class="text-cyan-200 text-sm font-medium mt-1">Sisa Kuota</div>
                        </div>
                    </div>
                    <div style="display:none;width:1px;height:64px;background:rgba(147,197,253,0.4);"
                        class="hidden md:block"></div>
                    <div class="flex items-center gap-5">
                        <div
                            style="width:70px;height:70px;border:3px solid #4dd9e8;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <svg class="w-9 h-9 text-cyan-300" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-white text-xl font-extrabold leading-none">
                                {{ $activeBatch->tanggal_selesai_pendaftaran->format('d F Y') }}</div>
                            <div class="text-cyan-200 text-sm font-medium mt-1">Batas Pendaftaran</div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-6">
                    <a href="{{ $activeBatch->external_link }}" target="_blank"
                        class="inline-block px-8 py-3 bg-white text-blue-700 font-bold rounded-lg hover:bg-blue-50 transition shadow-lg">
                        Daftar Sekarang →
                    </a>
                </div>
            </div>
        @endif

        {{-- ══════════════════════ DESKRIPSI ══════════════════════ --}}
        <div class="max-w-6xl mx-auto px-4 py-12 flex flex-col md:flex-row gap-6 fade-up delay-2">
            <div class="about-section-card flex-1">
                <p class="text-gray-600 leading-relaxed">{{ $programLayanan->deskripsi }}</p>
            </div>
            <div class="sidebar-label">DESKRIPSI SINGKAT</div>
        </div>

        {{-- ══════════════════════ APA ITU PROGRAM ══════════════════════ --}}
        <div class="max-w-6xl mx-auto px-4 pb-12 fade-up delay-3">
            <div class="purpose-wrap">
                <div class="purpose-label">PROFIL<br>PROGRAM</div>
                <div class="purpose-content">
                    <div class="prose prose-sm text-gray-600 text-justify leading-relaxed">
                        {!! $programLayanan->deskripsi_lengkap !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════ INFORMASI PROGRAM ══════════════════════ --}}
        <div class="bg-gray-50 py-14 section-anchor" id="info-program">
            <div class="max-w-6xl mx-auto px-4">

                <div class="purpose-wrap mb-10 fade-up">
                    <div class="purpose-label">INFORMASI<br>PROGRAM</div>
                    <div class="purpose-content">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="task-item">
                                <div class="task-num">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="font-semibold text-blue-900">Tipe Kelas</span>
                                    <p class="mt-1">{{ ucfirst($programLayanan->tipe_kelas) }}</p>
                                </div>
                            </div>
                            <div class="task-item">
                                <div class="task-num">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="font-semibold text-blue-900">Durasi Program</span>
                                    <p class="mt-1">{{ $programLayanan->durasi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- ══════════════════════ MATERI ══════════════════════ --}}
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="purpose-wrap mb-10 fade-up">
                    <div class="purpose-label">MATERI<br>PROGRAM</div>
                    <div class="purpose-content">
                        <p>Materi yang akan dipelajari dalam program {{ $programLayanan->nama_banner }}.</p>
                    </div>
                </div>
                <div class="space-y-3 fade-up delay-1">
                    @foreach ($programLayanan->materi as $i => $materi)
                        <div class="task-item">
                            <div class="task-num">{{ $i + 1 }}</div>
                            <div>{{ $materi }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ══════════════════════ MANFAAT ══════════════════════ --}}
        <section class="py-16 bg-gray-50">
            <div class="max-w-6xl mx-auto px-4">
                <div class="purpose-wrap mb-10 fade-up">
                    <div class="purpose-label">BENEFIT<br>PROGRAM</div>
                    <div class="purpose-content">
                        <p>Manfaat yang akan Anda peroleh dari program ini.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 fade-up delay-1">
                    @foreach ($programLayanan->manfaat as $i => $manfaat)
                        <div class="program-card">
                            <div class="flex items-start gap-3">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <p class="text-gray-700 text-sm">{{ $manfaat }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ══════════════════════ CAPAIAN ══════════════════════ --}}
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="purpose-wrap mb-10 fade-up">
                    <div class="purpose-label">CAPAIAN<br>PROGRAM</div>
                    <div class="purpose-content">
                        <p>Target capaian yang akan diperoleh peserta setelah mengikuti program.</p>
                    </div>
                </div>
                <div class="space-y-3 fade-up delay-1">
                    @foreach ($programLayanan->persyaratan as $i => $syarat)
                        <div class="task-item">
                            <div class="task-num">{{ $i + 1 }}</div>
                            <div>{{ $syarat }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ══════════════════════ ALUR PROSES ══════════════════════ --}}
        @if (count($programLayanan['alur_proses']) > 1)
            <section class="py-16 bg-gray-50">
                <div class="max-w-6xl mx-auto px-4">
                    <div class="purpose-wrap mb-10 fade-up">
                        <div class="purpose-label">ALUR<br>PROSES</div>
                        <div class="purpose-content">
                            <p>Langkah-langkah yang perlu dilalui dalam program ini.</p>
                        </div>
                    </div>
                    <div class="space-y-4 fade-up delay-1">
                        @foreach ($programLayanan->alur_proses as $index => $alur)
                            <div class="task-item">
                                <div class="task-num">{{ $index + 1 }}</div>
                                <div>{{ $alur }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- ══════════════════════ BATCH MENDATANG ══════════════════════ --}}
        @if ($upcomingBatches->isNotEmpty())
            <section class="py-16 bg-white">
                <div class="max-w-6xl mx-auto px-4">
                    <div class="purpose-wrap mb-10 fade-up">
                        <div class="purpose-label">BATCH<br>MENDATANG</div>
                        <div class="purpose-content">
                            <p>Jadwal batch yang akan segera dibuka untuk pendaftaran.</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 fade-up delay-1">
                        @foreach ($upcomingBatches as $batch)
                            <div class="program-card">
                                <h3 class="text-base font-bold text-blue-800 mb-3">
                                    Batch {{ $batch->batch_ke }} - {{ $batch->nama_batch }}
                                </h3>
                                <div class="space-y-2 text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span>Mulai: {{ $batch->tanggal_mulai_program->format('d F Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>Kuota: {{ $batch->kuota }} peserta</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        <span>Rp {{ number_format($batch->harga, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        {{-- ══════════════════════ IMAGE BANNER ══════════════════════ --}}
        @if ($programLayanan->gambar_banner)
            <section class="py-12 bg-gray-50">
                <div class="max-w-4xl mx-auto px-4 fade-up">
                    <div x-data="{ open: false }" class="relative cursor-pointer">
                        <img src="{{ Storage::url($programLayanan->gambar_banner) }}"
                            alt="{{ $programLayanan->nama_program }}"
                            class="w-full rounded-xl shadow-lg object-cover max-h-[420px] cursor-zoom-in"
                            style="border: 3px solid #1e7bb5;" @click="open = true">
                        <div
                            class="absolute inset-0 bg-black/30 opacity-0 hover:opacity-100 transition flex items-center justify-center rounded-xl pointer-events-none">
                            <span class="text-white text-sm font-medium bg-black/40 px-4 py-2 rounded-lg">Klik untuk
                                memperbesar</span>
                        </div>
                        <div x-show="open" x-cloak x-transition
                            class="fixed inset-0 z-[9999] bg-black/80 flex items-center justify-center"
                            @click.self="open = false">
                            <img src="{{ Storage::url($programLayanan->gambar_banner) }}"
                                class="max-w-[90%] max-h-[90%] rounded-lg shadow-2xl">
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endif

@endsection
