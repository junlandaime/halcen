@extends('lph.front')

@section('title')
    <title>Layanan - LPH Salman ITB - Lembaga Pemeriksa Halal</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="pt-20 bg-gradient-to-b from-primary/10 to-white">
        <div class="max-w-7xl mx-auto px-4 py-16">
            <h1 class="text-4xl font-bold text-center mb-8">Tentang Kami</h1>
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div data-aos="fade-right">
                    <img src="https://picsum.photos/600/400" alt="LPH Salman ITB" class="rounded-lg shadow-xl">
                </div>
                <div data-aos="fade-left">
                    <h2 class="text-2xl font-bold mb-4">Lembaga Pemeriksa Halal Salman ITB</h2>
                    <p class="text-gray-600 mb-4">LPH Salman ITB adalah lembaga yang berdedikasi dalam pemeriksaan dan
                        sertifikasi halal yang telah terakreditasi secara nasional.</p>
                    <p class="text-gray-600 mb-4">Didirikan pada tahun 2020, kami telah membantu ratusan UMKM dalam proses
                        sertifikasi halal mereka.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div data-aos="fade-up" class="bg-primary/5 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold mb-4 text-primary">Visi</h3>
                    <p class="text-gray-600">Menjadi lembaga pemeriksa halal terpercaya dan profesional di Indonesia.</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-primary/5 p-8 rounded-lg">
                    <h3 class="text-2xl font-bold mb-4 text-primary">Misi</h3>
                    <ul class="text-gray-600 list-disc list-inside space-y-2">
                        <li>Memberikan layanan pemeriksaan halal yang profesional</li>
                        <li>Mendukung UMKM dalam sertifikasi halal</li>
                        <li>Meningkatkan awareness masyarakat tentang produk halal</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Tim Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Tim Kami</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div data-aos="fade-up" class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://picsum.photos/200" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Dr. Ahmad</h3>
                    <p class="text-gray-600">Kepala LPH</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://picsum.photos/201" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Dr. Sarah</h3>
                    <p class="text-gray-600">Kepala Auditor</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://picsum.photos/202" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                    <h3 class="text-xl font-bold mb-2">Dr. Budi</h3>
                    <p class="text-gray-600">Kepala Penelitian</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sertifikasi Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Sertifikasi & Akreditasi</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div data-aos="fade-up" class="p-6 bg-primary/5 rounded-lg text-center">
                    <img src="https://picsum.photos/100" alt="Certification" class="w-20 h-20 mx-auto mb-4">
                    <p class="text-gray-600">ISO 9001:2015</p>
                </div>
                <!-- [Add more certifications as needed] -->
            </div>
        </div>
    </section>
@endsection
