<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @yield('css') --}}
    @stack('css')
    {{-- 
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#498fcb',
                    }
                }
            }
        }
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style> --}}
</head>

<body class="font-sans" x-data="{ isOpen: false }">
    <!-- Navigation -->
    @include('lph.header')

    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">LPH Salman ITB</h3>
                    <p class="text-gray-400">Lembaga Pemeriksa Halal Profesional dan Terpercaya</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Kontak</h4>
                    <p class="text-gray-400">Email: info@lphsalmanitb.com</p>
                    <p class="text-gray-400">Telp: (022) 1234567</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Alamat</h4>
                    <p class="text-gray-400">Jl. Ganeca No.10, Bandung</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Media Sosial</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">Instagram</a>
                        <a href="#" class="text-gray-400 hover:text-white">Facebook</a>
                        <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 LPH Salman ITB. All rights reserved.</p>
            </div>
        </div>
    </footer>


</body>

</html>
