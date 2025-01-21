@extends('layouts.front')

@section('title')
    <title>FAQ dan Kontak Halal Center - Halal Center Masjid Salman ITB</title>
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

@section('content')
    <!-- FAQ Hero Section -->
    <section class="relative h-[300px] overflow-hidden pt-16" x-data="{ scroll: 0 }"
        @scroll.window="scroll = window.pageYOffset">
        <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
            <img src="https://picsum.photos/1920/800" alt="FAQ Banner" class="w-full h-[500px] object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
            <div class="max-w-6xl mx-auto h-full flex items-center px-4">
                <div class="text-white" data-aos="fade-up">
                    <h1 class="text-5xl font-bold mb-6">FAQ & Kontak</h1>
                    <p class="text-2xl mb-8 text-gray-200">Pertanyaan yang Sering Diajukan & Kontak Pusat Halal Salman ITB
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Categories -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap gap-4" data-aos="fade-up">
                <a href="{{ route('front.kontak') }}"
                    class="px-6 py-2 rounded-full {{ !request('category') ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    Semua
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('front.kontak', ['category' => $category->slug]) }}"
                        class="px-6 py-2 rounded-full {{ request('category') == $category->slug ? 'bg-primary text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ Content -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4">
            <!-- FAQ Search -->
            <form action="{{ route('front.kontak') }}" method="GET" class="relative mb-12" data-aos="fade-up">
                <input type="text" name="search" placeholder="Cari pertanyaan..." value="{{ request('search') }}"
                    class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <svg class="w-6 h-6 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </form>

            <!-- FAQ Items -->
            <div class="space-y-6">
                @forelse($faqs->groupBy('category.name') as $categoryName => $categoryFaqs)
                    <div data-aos="fade-up">
                        <h2 class="text-2xl font-bold mb-6">{{ $categoryName }}</h2>
                        <div class="space-y-4">
                            @foreach ($categoryFaqs as $faq)
                                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg overflow-hidden">
                                    <button @click="open = !open"
                                        class="w-full px-6 py-4 text-left bg-white hover:bg-gray-50 flex justify-between items-center">
                                        <span class="font-medium">{{ $faq->question }}</span>
                                        <svg class="w-5 h-5 transform transition-transform" :class="{ 'rotate-180': open }"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div x-show="open" x-collapse>
                                        <div class="px-6 py-4 bg-gray-50">
                                            <p class="text-gray-600 whitespace-pre-line">{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-gray-500">Tidak ada FAQ yang ditemukan.</p>
                    </div>
                @endforelse
            </div>

            <!-- Contact Support -->
            <div class="mt-16 text-center p-8 bg-gray-50 rounded-xl" data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-4">Masih Ada Pertanyaan?</h3>
                <p class="text-gray-600 mb-6">Jika Anda memiliki pertanyaan lain, jangan ragu untuk menghubungi tim support
                    kami</p>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $landingPage->contact_whatsapp) }}" target="_blank"
                    class="inline-block px-8 py-3 bg-primary text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>


    <!-- Contact Information -->
    <section class="py-16" id="contact">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="space-y-6" data-aos="fade-right">
                    <h2 class="text-3xl font-bold text-primary">Kirim Pesan</h2>
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                Lengkap</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject"
                                class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="6"
                                class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                        </div>
                        <a href="#" id="startcon"
                            class="w-full px-10 md:px-40 bg-primary text-white py-3 rounded-lg hover:bg-blue-700 transition-colors"
                            onclick="gettogetInputValue()">
                            Kirim Pesan
                        </a>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8" data-aos="fade-left">
                    <div>
                        <h2 class="text-3xl font-bold text-primary mb-6">Informasi Kontak</h2>
                        <div class="space-y-6">
                            @if ($landingPage->contact_address)
                                <div class="flex items-start gap-4">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-2">Alamat</h3>
                                        <p class="text-gray-600">{{ $landingPage->contact_address }}</p>
                                    </div>
                                </div>
                            @endif

                            @if ($landingPage->contact_phone)
                                <div class="flex items-start gap-4">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-2">Telepon</h3>
                                        <a href="tel:{{ $landingPage->contact_phone }}"
                                            class="text-green-600 hover:text-green-700">
                                            {{ $landingPage->contact_phone }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if ($landingPage->contact_whatsapp)
                                <div class="flex items-start gap-4">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-primary mt-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                        </svg>
                                    </div>

                                    <div>
                                        <h3 class="font-semibold mb-2">WhatsApp</h3>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $landingPage->contact_whatsapp) }}"
                                            target="_blank" class="text-green-600 hover:text-green-700">
                                            {{ $landingPage->contact_whatsapp }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if ($landingPage->contact_email)
                                <div class="flex items-start gap-4">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-lg mb-2">Email</h3>
                                        <a href="mailto:{{ $landingPage->contact_email }}"
                                            class="text-green-600 hover:text-green-700">
                                            {{ $landingPage->contact_email }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                    <!-- Social Media -->
                    <div>
                        <h3 class="text-xl font-bold mb-4">Media Sosial</h3>
                        <div class="flex gap-4">
                            @if ($landingPage->social_facebook)
                                <a href="{{ $landingPage->social_facebook }}" target="_blank"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z">
                                        </path>
                                    </svg>
                                </a>
                            @endif
                            @if ($landingPage->social_twitter)
                                <a href="{{ $landingPage->social_twitter }}" target="_blank"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z">
                                        </path>
                                    </svg>
                                </a>
                            @endif
                            @if ($landingPage->social_instagram)
                                <a href="{{ $landingPage->social_instagram }}" target="_blank"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z">
                                        </path>
                                    </svg>
                                </a>
                            @endif
                            @if ($landingPage->social_linkedin)
                                <a href="{{ $landingPage->social_linkedin }}" target="_blank"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 text-gray-600 hover:bg-primary hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z">
                                        </path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Google Maps -->
                    <div class="mt-8">
                        <h3 class="text-xl font-bold mb-4">Lokasi Kami</h3>
                        <div class="w-full h-[300px] rounded-xl overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1975970386086!2d107.60905931477246!3d-6.893277695019756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e65767c9b183%3A0x2478e3dcdce37961!2sMasjid%20Salman%20ITB!5e0!3m2!1sen!2sid!4v1645678901234!5m2!1sen!2sid"
                                width="100%" height="100%" style="border:0;" allowfullscreen=""
                                loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        // Mengambil nomor WhatsApp dari PHP dan membersihkan karakter non-angka
        const whatsappNumber = '<?php echo preg_replace('/[^0-9]/', '', $landingPage->contact_whatsapp); ?>';

        function gettogetInputValue() {
            let inputName = document.getElementById("name").value;
            let inputTopik = document.getElementById("subject").value;
            let email = document.getElementById("email").value;
            let inputMessage = document.getElementById("message").value;
            let tombol = document.getElementById('startcon');

            // Menggunakan whatsappNumber yang sudah didefinisikan
            let hrefAwal =
                `https://wa.me/${whatsappNumber}?text=_Assalamualaikum_%20*Admin%20Pusat%20Halal%20Salman*%0A%0APerkenalkan%20saya%20${inputName}%0A%0AIngin%20bertanya%20terkait%20topik%20${inputTopik}%0AJika%20ada%20file%20yang%20bisa%20di%20kirimkan%20ke%20email%20saya%20${email}%0A%0Apesan%20tambahan%3A%0A${inputMessage}%0A%0AHatur%20Nuhun%20sebelumnya%20Admin%0AWassalamualaikum`;

            tombol.href = hrefAwal;
        }
    </script>
@endpush
