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

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        @include('layouts.header')

        <main class="md:pt-16">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>

    <!-- Stack Script Tambahan -->
    @stack('scripts')
</body>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

</html>
