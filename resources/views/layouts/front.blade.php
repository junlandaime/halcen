<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    @yield('title')

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <link rel="icon" href="{{ asset('favicon.png') }}">
    <!-- Meta tags untuk SEO dan sharing -->
    <meta name="description" content="@yield('meta_description', $frontLandingPage->meta_description ?? '')">
    <meta name="keywords" content="@yield('meta_keywords', $frontLandingPage->meta_keywords ?? '')">
    <meta name="author" content="Tim Pusat Halal Salman">

    <!-- Open Graph / Facebook -->
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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @yield('css') --}}
    @stack('css')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.header')

        <!-- Main Content -->
        <main class="md:pt-16">

            @yield('content')
        </main>


        @include('layouts.footer')
    </div>
    @stack('script')
</body>
<script>
    // Initialize AOS
    // AOS.init({
    //     duration: 800,
    //     easing: 'ease-in-out',
    //     once: true
    // });
</script>

</html>
