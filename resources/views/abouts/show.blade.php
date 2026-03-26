@extends('layouts.front')

@section('title')
    <title>{{ $about->meta_title ?? $about->title }} - Halal Center Masjid Salman ITB</title>
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

        /* ── Stats bar ── */
        .stats-bar {
            background: linear-gradient(135deg, #1a6a9a 0%, #1e7bb5 50%, #1a6a9a 100%);
            padding: 2rem 1rem;
        }

        .stats-bar .stats-inner {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
            gap: 2rem;
        }

        .counter-icon {
            width: 70px;
            height: 70px;
            border: 3px solid #4dd9e8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stats-divider {
            display: none;
        }

        @media (min-width: 768px) {
            .stats-divider {
                display: block;
                width: 1px;
                height: 64px;
                background: rgba(147, 197, 253, 0.4);
            }
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

        /* ── Team cards ── */
        .team-avatar {
            width: 6rem;
            height: 6rem;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1rem;
            border: 3px solid #1e7bb5;
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

        /* ── Vision/Mission ── */
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

        /* ── Sub-lembaga tab navigation ── */
        .lembaga-nav {
            display: flex;
            gap: 0;
            border-bottom: 2px solid #e5e7eb;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .lembaga-nav::-webkit-scrollbar {
            display: none;
        }

        .lembaga-tab {
            padding: 0.75rem 1.25rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: #6b7280;
            white-space: nowrap;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            transition: color 0.2s, border-color 0.2s;
            background: none;
            border-top: none;
            border-left: none;
            border-right: none;
        }

        .lembaga-tab:hover {
            color: #1e7bb5;
        }

        .lembaga-tab.active {
            color: #1a6a9a;
            border-bottom-color: #1e7bb5;
        }

        /* ── Sub-lembaga panel ── */
        .lembaga-panel {
            display: none;
        }

        .lembaga-panel.active {
            display: block;
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

        /* ── Tugas/manfaat list item ── */
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

        /* ── Motto SAFE cards ── */
        .motto-card {
            background: white;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            padding: 1.25rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            border-top: 3px solid #1e7bb5;
        }

        .motto-letter {
            font-size: 2rem;
            font-weight: 800;
            color: #1a6a9a;
            line-height: 1;
        }

        /* ── Section anchor highlight ── */
        .section-anchor {
            scroll-margin-top: 80px;
        }
    </style>
@endpush

@section('content')

    {{-- ══════════════════════ HERO ══════════════════════ --}}
    <section class="hero-section fade-up" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
        <div class="hero-bg">
            <img src="{{ Storage::url($about->hero_image) }}" alt="{{ $about->title }}"
                x-bind:style="`transform: translateY(${scroll * 0.4}px)`">
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content max-w-6xl mx-auto w-full" data-aos="fade-up">
            <div class="text-white">
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg mb-3">
                    {{ $about->hero_title }}
                </h1>
                <p class="text-lg md:text-xl text-blue-100">{{ $about->hero_subtitle }}</p>
            </div>
        </div>
    </section>

    {{-- ══════════════════════ STATS BAR ══════════════════════ --}}
    @if ($about->stats && count($about->stats))
        <div class="stats-bar fade-up delay-1" x-data="{
            counters: @json($about->stats),
            started: false,
            startCounters() {
                if (this.started) return;
                this.started = true;
                this.counters.forEach((c, i) => {
                    let step = Math.ceil(c.value / 60);
                    let current = 0;
                    let interval = setInterval(() => {
                        current = Math.min(current + step, c.value);
                        this.counters[i].current = current;
                        if (current >= c.value) clearInterval(interval);
                    }, 20);
                });
            }
        }" x-intersect.once="startCounters()">
            <div class="stats-inner">
                @foreach ($about->stats as $i => $stat)
                    @if ($i > 0)
                        <div class="stats-divider"></div>
                    @endif
                    <div class="flex items-center gap-5">
                        <div class="counter-icon">
                            <svg class="w-9 h-9 text-cyan-300" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24">
                                @if (($stat['icon'] ?? '') === 'auditor')
                                    <circle cx="12" cy="8" r="4" />
                                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                                @elseif (($stat['icon'] ?? '') === 'doc')
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                    <polyline points="14 2 14 8 20 8" />
                                    <polyline points="9 15 11 17 15 13" />
                                @else
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                @endif
                            </svg>
                        </div>
                        <div>
                            <div class="text-white text-4xl font-extrabold leading-none">
                                <span
                                    x-text="counters[{{ $i }}].current ?? {{ $stat['value'] }}">{{ $stat['value'] }}</span>{{ isset($stat['plus']) && $stat['plus'] ? '+' : '' }}
                            </div>
                            <div class="text-cyan-200 text-sm font-medium mt-1">{{ $stat['label'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- ══════════════════════ ABOUT (description) ══════════════════════ --}}
    <div class="max-w-6xl mx-auto px-4 py-12 flex flex-col md:flex-row gap-6 fade-up delay-2">
        <div class="about-section-card flex-1" data-aos="fade-right">
            <p class="text-gray-600 leading-relaxed">{{ $about->description }}</p>
        </div>
        <div class="sidebar-label" data-aos="fade-left">ABOUT</div>
    </div>

    {{-- ══════════════════════ VISION & MISSION ══════════════════════ --}}
    @if ($about->vision)
        <div class="max-w-6xl mx-auto px-4 pb-12 fade-up delay-3">
            <div class="purpose-wrap" data-aos="fade-up">
                <div class="purpose-label">VISI &amp; MISI</div>
                <div class="purpose-content">
                    <div class="mb-6">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="vm-icon-wrap">
                                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-blue-800">Visi</h3>
                        </div>
                        <p>{{ $about->vision }}</p>
                    </div>
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="vm-icon-wrap">
                                <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-blue-800">Misi</h3>
                        </div>
                        <ul class="space-y-2">
                            @foreach ($about->mission as $i => $mission)
                                <p>{{ $i + 1 }}. {{ $mission }}</p>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ══════════════════════ SUB-LEMBAGA (SECTIONS AS TABS) ══════════════════════ --}}
    {{--
        PANDUAN PENGISIAN DATA DI ADMIN:
        Setiap `section` mewakili satu sub-lembaga. Gunakan field berikut:
          - title   → Nama lembaga pendek, misal "LP3H" atau "LPH"
          - content → HTML lengkap profil lembaga (sejarah, tugas, manfaat, dst.)
          - image   → (opsional) Foto/logo lembaga
        Halaman ini otomatis menampilkan semua sections dalam satu blok bertab.
    --}}
    @if ($about->sections->isNotEmpty())
        <div class="bg-gray-50 py-14 section-anchor" id="lembaga" data-aos="fade-up">
            <div class="max-w-6xl mx-auto px-4">

                {{-- Heading blok --}}
                <div class="purpose-wrap mb-8">
                    <div class="purpose-label">UNIT<br>LEMBAGA</div>
                    <div class="purpose-content">
                        <p class="text-gray-500 text-sm">
                            Pusat Halal Salman ITB memiliki beberapa unit lembaga yang saling melengkapi dalam
                            mewujudkan ekosistem halal yang komprehensif. Pilih lembaga di bawah untuk mengetahui
                            lebih lanjut.
                        </p>

                        {{-- Tab navigation --}}
                        <div class="lembaga-nav mt-4" x-data="{
                            active: 0,
                            tabs: {{ $about->sections->pluck('title') }}
                        }">
                            @foreach ($about->sections as $si => $section)
                                <button class="lembaga-tab {{ $si === 0 ? 'active' : '' }}"
                                    onclick="switchTab({{ $si }})" id="tab-btn-{{ $si }}">
                                    {{ $section->title }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Tab panels --}}
                @foreach ($about->sections as $si => $section)
                    <div class="lembaga-panel {{ $si === 0 ? 'active' : '' }}" id="tab-panel-{{ $si }}"
                        data-aos="fade-up">

                        {{-- Header panel dengan image bila ada --}}
                        <div class="flex flex-col {{ $section->image ? 'md:flex-row' : '' }} gap-6 mb-6">
                            @if ($section->image)
                                <div class="md:w-64 flex-shrink-0">
                                    <img src="{{ Storage::url($section->image) }}" alt="{{ $section->title }}"
                                        class="w-full rounded-xl shadow-md object-cover max-h-48">
                                </div>
                            @endif
                            <div class="flex-1 about-section-card">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="badge-pill">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        Unit Lembaga
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-blue-900 mb-3">{{ $section->title }}</h3>
                                <div class="prose prose-sm text-gray-600 text-justify leading-relaxed">
                                    {!! $section->content !!}
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

        <script>
            function switchTab(index) {
                // hide all panels
                document.querySelectorAll('.lembaga-panel').forEach(p => p.classList.remove('active'));
                document.querySelectorAll('.lembaga-tab').forEach(b => b.classList.remove('active'));
                // show selected
                const panel = document.getElementById('tab-panel-' + index);
                const btn = document.getElementById('tab-btn-' + index);
                if (panel) panel.classList.add('active');
                if (btn) btn.classList.add('active');
            }
        </script>
    @endif

    {{-- ══════════════════════ PROGRAMS ══════════════════════ --}}
    @if ($about->programs->isNotEmpty())
        <section class="py-16 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="purpose-wrap mb-10" data-aos="fade-up">
                    <div class="purpose-label">PROGRAM<br>UNGGULAN</div>
                    <div class="purpose-content">
                        <p>Program-program inovatif untuk mendukung pengembangan ekosistem halal.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($about->programs as $program)
                        <div class="program-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <h3 class="text-base font-bold text-blue-800 mb-3 text-center">{{ $program->title }}</h3>
                            <p class="text-gray-600 text-sm text-justify">{{ $program->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ══════════════════════ TEAM ══════════════════════ --}}
    @if ($about->teams->isNotEmpty())
        <section class="py-16 bg-gray-50">
            <div class="max-w-6xl mx-auto px-4">
                <div class="purpose-wrap mb-10" data-aos="fade-up">
                    <div class="purpose-label">TIM<br>KAMI</div>
                    <div class="purpose-content">
                        <p>Para profesional berpengalaman yang mendedikasikan diri untuk pengembangan ekosistem halal.</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach ($about->teams as $team)
                        <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            @if ($team->image)
                                <img src="{{ Storage::url($team->image) }}" alt="{{ $team->name }}"
                                    class="team-avatar">
                            @else
                                <div class="team-avatar bg-blue-100 flex items-center justify-center">
                                    <span class="text-3xl text-blue-400 font-bold">{{ substr($team->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <h3 class="font-bold text-sm mt-1">{{ $team->name }}</h3>
                            <p class="text-gray-500 text-xs mt-0.5">{{ $team->position }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
