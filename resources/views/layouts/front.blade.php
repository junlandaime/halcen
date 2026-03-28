<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <link rel="icon" href="{{ asset('favicon.png') }}">

    <meta name="description" content="@yield('meta_description', $frontLandingPage->meta_description ?? '')">
    <meta name="keywords" content="@yield('meta_keywords', $frontLandingPage->meta_keywords ?? '')">
    <meta name="author" content="Tim Pusat Halal Salman">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', $frontLandingPage->meta_title ?? '')">
    <meta property="og:description" content="@yield('og_description', $frontLandingPage->meta_description ?? '')">
    <meta property="og:image" content="@yield('og_image', !empty($frontLandingPage->hero_image) ? Storage::url($frontLandingPage->hero_image) : '')">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('og_title', $frontLandingPage->meta_title ?? '')">
    <meta name="twitter:description" content="@yield('og_description', $frontLandingPage->meta_description ?? '')">
    <meta name="twitter:image" content="@yield('og_image', !empty($frontLandingPage->hero_image) ? Storage::url($frontLandingPage->hero_image) : '')">

    @yield('additional_meta_tags')

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        [x-cloak]{display:none!important}
        *{font-family:'Inter',sans-serif;scroll-behavior:smooth}

        /* === COLOR THEME === */
        :root{
          --green:#4a86b8;
          --green-dark:#3a6d96;
          --green-light:#e8f0f7;
          --gold:#b8972a;
          --navy:#1e2d3e;
        }

        /* === NAV === */
        .nav-active{border:2px solid #4a86b8;border-radius:999px;padding:5px 18px;color:#4a86b8;font-weight:700}
        .dropdown-menu{position:absolute;top:calc(100%+6px);left:50%;transform:translateX(-50%);background:white;border-radius:12px;box-shadow:0 8px 32px rgba(0,0,0,.12);min-width:210px;padding:6px 0;z-index:200}
        .dropdown-menu a{display:block;padding:11px 20px;font-size:12px;font-weight:700;letter-spacing:.06em;color:#1a2e3e;transition:background .15s}
        .dropdown-menu a:hover{background:#e8f0f7;color:#4a86b8}

        /* === HERO BLOB === */
        .hero-blob{
          width:620px;height:580px;position:relative;flex-shrink:0;
          clip-path:path("M310 0 C490 0 610 100 610 280 C610 440 500 560 310 600 C120 560 10 440 10 280 C10 100 130 0 310 0Z");
          overflow:hidden;
        }
        @media(max-width:1024px){
          .hero-blob{width:380px;height:360px;clip-path:path("M190 0 C300 0 374 61 374 171 C374 270 306 343 190 367 C74 343 6 270 6 171 C6 61 80 0 190 0Z")}
        }
        .hero-blob img{width:100%;height:100%;object-fit:cover;transition:transform .6s ease}
        .hero-blob:hover img{transform:scale(1.05)}
        .hero-blob::after{content:'';position:absolute;inset:0;background:rgba(74,134,184,.25)}

        /* === BTN MORE === */
        .btn-more{display:inline-flex;align-items:center;gap:10px;font-weight:700;font-size:14px;color:#4a86b8;transition:gap .2s}
        .btn-more:hover{gap:16px}
        .btn-more .circle{width:34px;height:34px;background:#4a86b8;border-radius:50%;display:flex;align-items:center;justify-content:center;transition:background .2s,transform .2s}
        .btn-more:hover .circle{background:#3a6d96;transform:translateX(3px)}

        /* === GREEN LABEL BOX === */
        .blue-label{background:linear-gradient(135deg,#4a86b8,#3a6d96);border-radius:16px;color:white;padding:28px;display:flex;flex-direction:column}
        .blue-label-title{color:white;font-weight:900;font-size:1.35rem;line-height:1.3}

        /* === SERVICE CARD === */
        .svc-card{background:white;border:1.5px solid #e5e7eb;border-radius:16px;padding:28px 24px;display:flex;flex-direction:column;gap:12px;transition:box-shadow .25s,border-color .25s,transform .25s}
        .svc-card:hover{box-shadow:0 16px 40px rgba(74,134,184,.12);border-color:#4a86b8;transform:translateY(-4px)}
        .svc-icon{font-size:36px;color:#1a1a2e}

        /* === FLOW CARD === */
        .flow-card{flex:1;min-width:0;background:white;border:1px solid #e5e7eb;border-radius:12px;padding:24px 16px;text-align:center;position:relative;overflow:hidden;transition:box-shadow .25s,border-color .25s,transform .25s}
        .flow-card:hover{border-color:#4a86b8;box-shadow:0 10px 30px rgba(74,134,184,.1);transform:translateY(-4px)}
        .flow-num{font-size:5rem;font-weight:900;color:#e5e7eb;position:absolute;bottom:-10px;right:8px;line-height:1;user-select:none;transition:color .25s}
        .flow-card:hover .flow-num{color:#c8d8e8}
        .flow-icon{font-size:32px;color:#4a86b8;margin-bottom:8px}

        /* === CHECK HALAL === */
        .check-input{border:1.5px solid #d1d5db;border-radius:10px;padding:12px 16px;font-size:14px;outline:none;color:#374151;background:white;transition:border-color .2s,box-shadow .2s}
        .check-input:focus{border-color:#4a86b8;box-shadow:0 0 0 3px rgba(74,134,184,.1)}
        .btn-search{background:#4a86b8;color:white;font-weight:700;padding:12px 28px;border-radius:10px;font-size:14px;cursor:pointer;transition:background .2s,transform .15s}
        .btn-search:hover{background:#3a6d96;transform:translateY(-1px)}

        /* === PUB CARD === */
        .pub-card{background:white;border:1.5px solid #e5e7eb;border-radius:16px;padding:24px;display:flex;flex-direction:column;gap:14px;min-height:300px;transition:box-shadow .25s,border-color .25s,transform .25s}
        .pub-card:hover{box-shadow:0 16px 40px rgba(74,134,184,.1);border-color:#4a86b8;transform:translateY(-4px)}

        /* === CONTACT INFO === */
        .contact-info-row{display:flex;align-items:center;gap:14px;font-size:15px;color:#1a2e3e;font-weight:600}

        /* === WHATSAPP === */
        .whatsapp-float{position:fixed;bottom:28px;right:28px;width:54px;height:54px;background:#25D366;border-radius:50%;display:flex;align-items:center;justify-content:center;z-index:999;box-shadow:0 4px 20px rgba(0,0,0,.2);transition:transform .2s,box-shadow .2s}
        .whatsapp-float:hover{transform:scale(1.1);box-shadow:0 8px 28px rgba(0,0,0,.3)}

        /* === LOGO PLACEHOLDER === */
        .logo-placeholder{width:72px;height:72px;border-radius:50%;background:#e5e7eb;display:flex;align-items:center;justify-content:center;font-size:10px;text-align:center;color:#666;font-weight:600;line-height:1.2;transition:transform .2s,box-shadow .2s}
        .logo-placeholder:hover{transform:scale(1.1);box-shadow:0 6px 20px rgba(0,0,0,.12)}

        /* === HERO SLIDER === */
        .slider-dot{width:10px;height:10px;border-radius:50%;background:#ccc;cursor:pointer;transition:background .3s,transform .3s}
        .slider-dot.active{background:#4a86b8;transform:scale(1.3)}

        /* === MARQUEE === */
        @keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
        .marquee-track{display:flex;gap:48px;animation:marquee 22s linear infinite;white-space:nowrap}

        /* === FADE IN === */
        @keyframes fadeUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
        .fade-up{animation:fadeUp .6s ease forwards}

        /* === STATS === */
        .stat-box{background:white;border:1.5px solid #e5e7eb;border-radius:14px;padding:20px 16px;text-align:center;transition:transform .2s,box-shadow .2s}
        .stat-box:hover{transform:translateY(-4px);box-shadow:0 10px 28px rgba(74,134,184,.1)}
        .stat-num{color:#4a86b8;font-size:2rem;font-weight:900}

        /* === NAV LINK === */
        .nav-link{position:relative;font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#1a2e3e;transition:color .2s}
        .nav-link::after{content:'';position:absolute;bottom:-3px;left:0;width:0;height:2px;background:#4a86b8;border-radius:2px;transition:width .25s}
        .nav-link:hover{color:#4a86b8}
        .nav-link:hover::after{width:100%}

        /* === TAG === */
        .tag{display:inline-block;background:#e8f0f7;color:#4a86b8;font-size:11px;font-weight:700;padding:3px 10px;border-radius:999px;letter-spacing:.05em}

        /* === HERO SLIDE TRANSITION === */
        .slide{display:none;animation:fadeUp .5s ease}
        .slide.active{display:flex}
    </style>
</head>

<body class="bg-white text-gray-900">
    <div class="min-h-screen">
        @include('layouts.header')

        <main>
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    <!-- WhatsApp Float -->
    @if(!empty($frontLandingPage->contact_whatsapp))
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $frontLandingPage->contact_whatsapp) }}" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
    </a>
    @endif

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>

    @stack('scripts')
</body>

</html>
