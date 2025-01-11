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
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('css')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.header')
            
            <!-- Main Content -->
            <main class="pt-16">

                @yield('content')
            </main>
            
            
            @include('layouts.footer')
        </div>
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
