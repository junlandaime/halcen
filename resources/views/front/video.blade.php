@extends('layouts.front')

@section('title')
    <title>Video Pembelajaran - Halal Center Masjid Salman ITB</title>
@endsection

@section('content')

 <!-- Page Header -->
 <section class="relative h-[300px] overflow-hidden pt-16" x-data="{ scroll: 0 }" @scroll.window="scroll = window.pageYOffset">
    <div class="absolute inset-0" x-bind:style="`transform: translateY(${scroll * 0.5}px)`">
        <img src="https://picsum.photos/1920/800" alt="Video Pembelajaran Banner" class="w-full h-[500px] object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-primary/60">
        <div class="max-w-6xl mx-auto h-full flex items-center px-4">
            <div class="text-white" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6">Video Pembelajaran</h1>
                <p class="text-2xl mb-8 text-gray-200">Materi Edukatif Seputar Halal</p>
            </div>
        </div>
    </div>
</section>

<!-- Video Categories -->
<section class="py-16">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Video Category Tabs -->
        <div x-data="{ activeTab: 'kuliah-halal' }" class="mb-12">
            <div class="flex flex-wrap gap-4 justify-center mb-8" data-aos="fade-up">
                <button 
                    @click="activeTab = 'kuliah-halal'" 
                    :class="{ 'bg-primary text-white': activeTab === 'kuliah-halal', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeTab !== 'kuliah-halal' }"
                    class="px-6 py-2 rounded-full transition-colors">
                    Kuliah Halal
                </button>
                <button 
                    @click="activeTab = 'juleha-kurban'" 
                    :class="{ 'bg-primary text-white': activeTab === 'juleha-kurban', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeTab !== 'juleha-kurban' }"
                    class="px-6 py-2 rounded-full transition-colors">
                    JULEHA Kurban
                </button>
                <button 
                    @click="activeTab = 'juleha-unggas'" 
                    :class="{ 'bg-primary text-white': activeTab === 'juleha-unggas', 'bg-gray-100 text-gray-600 hover:bg-gray-200': activeTab !== 'juleha-unggas' }"
                    class="px-6 py-2 rounded-full transition-colors">
                    JULEHA Unggas
                </button>
            </div>

            <!-- Kuliah Halal Videos -->
            <div x-show="activeTab === 'kuliah-halal'" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="aspect-video bg-gray-100">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Pengantar Sistem Jaminan Halal</h3>
                        <p class="text-gray-600 text-sm mb-4">Pembelajaran dasar tentang sistem jaminan halal dan implementasinya</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            45 menit
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                    <div class="aspect-video bg-gray-100">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Titik Kritis Kehalalan Produk</h3>
                        <p class="text-gray-600 text-sm mb-4">Identifikasi dan analisis titik kritis dalam produksi</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            35 menit
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                    <div class="aspect-video bg-gray-100">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Regulasi Halal Terkini</h3>
                        <p class="text-gray-600 text-sm mb-4">Update regulasi dan kebijakan halal nasional</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            40 menit
                        </div>
                    </div>
                </div>
            </div>

            <!-- JULEHA Kurban Videos -->
            <div x-show="activeTab === 'juleha-kurban'" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Similar structure as above, with different content -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="aspect-video bg-gray-100">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Teknik Penyembelihan Kurban</h3>
                        <p class="text-gray-600 text-sm mb-4">Panduan lengkap penyembelihan hewan kurban sesuai syariat</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            50 menit
                        </div>
                    </div>
                </div>
            </div>

            <!-- JULEHA Unggas Videos -->
            <div x-show="activeTab === 'juleha-unggas'" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Similar structure as above, with different content -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="aspect-video bg-gray-100">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-2">Standar RPU Modern</h3>
                        <p class="text-gray-600 text-sm mb-4">Pengenalan standar Rumah Potong Unggas modern</p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            45 menit
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection