@extends('layouts.front')

@section('title')
    <title>Form Pendaftaran JULEHA-KURBAN - Halal Center Salman ITB</title>
@endsection

@section('content')
    <section class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">



            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                {{-- Header with improved design --}}
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-8 py-12 text-center">
                    <div class="max-w-2xl mx-auto">
                        <h1 class="text-2xl md:text-3xl font-bold text-white leading-tight mb-4">
                            Pendaftaran {{ $registration->programBatch?->programLayanan?->nama_program ?? 'JULEHA-KURBAN' }}
                        </h1>
                        <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2 inline-block mb-4">
                            <p class="text-white font-medium">
                                {{ $registration->programBatch?->nama_batch ?? '-' }}
                                {{ $registration->programBatch?->batch_ke ? 'Batch ' . $registration->programBatch->batch_ke : '' }}
                            </p>
                        </div>
                        <p class="text-green-100 text-lg">
                            Diselenggarakan oleh <span class="font-semibold text-white">Pusat Halal Salman ITB</span>
                        </p>
                    </div>
                </div>

                {{-- Contact Info Card --}}
                <div class="px-8 -mt-6 relative z-10">
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-4">
                        <div class="flex items-center justify-center space-x-4">
                            <div class="flex items-center space-x-2 text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M20.52 3.48A11.77 11.77 0 0 0 3.48 20.52L2 22l2.65-.68a11.8 11.8 0 0 0 15.87-17.84ZM12 21.06a9.05 9.05 0 0 1-4.63-1.27l-.33-.2-3.06.79.82-2.99-.21-.34a9.06 9.06 0 1 1 7.41 3.99Zm4.82-6.91c-.26-.13-1.56-.77-1.8-.85s-.42-.13-.6.13-.69.85-.85 1-.31.2-.56.07a7.32 7.32 0 0 1-2.16-1.33 8.12 8.12 0 0 1-1.5-1.87c-.16-.28 0-.43.12-.56s.26-.31.39-.47a1.85 1.85 0 0 0 .26-.44.54.54 0 0 0 0-.5c-.12-.12-.6-1.45-.82-1.99s-.43-.46-.6-.47h-.52a1 1 0 0 0-.73.34 3.06 3.06 0 0 0-.96 2.27 5.35 5.35 0 0 0 1.14 2.41c.14.2 2.19 3.33 5.32 4.67a17.34 17.34 0 0 0 1.73.64 4.15 4.15 0 0 0 1.9.12 3.1 3.1 0 0 0 2-1.42 2.53 2.53 0 0 0 .18-1.42c-.07-.13-.23-.2-.49-.33Z" />
                                </svg>
                                <span class="font-medium">Butuh Bantuan?</span>
                            </div>
                            <a href="https://api.whatsapp.com/send/?phone=6282318183566&text&type=phone_number&app_absent=0"
                                target="_blank"
                                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                                Hubungi Customer Service
                            </a>
                        </div>
                    </div>
                </div>

                <div class="px-8 py-8">
                    {{-- Success/Error Messages with better styling --}}
                    @if (session('success'))
                        <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-green-800 font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-red-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-red-800 font-medium">{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif

                    @if (session('redirect_to_whatsapp'))
                        <script>
                            setTimeout(function() {
                                window.location.href = "{{ session('redirect_to_whatsapp') }}";
                            }, 2000);
                        </script>
                    @endif

                    {{-- Form dengan section yang lebih terorganisir --}}
                    <form method="POST" action="{{ route('registration.form.store', ['slug' => $slug]) }}"
                        x-data="{ pernah: '', syarat: false, currentStep: 1 }" class="space-y-8">
                        @csrf

                        {{-- Section 1: Data Personal --}}
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                <svg class="h-6 w-6 text-blue-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Data Personal
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Nama --}}
                                <div class="md:col-span-2">
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        placeholder="Masukkan nama lengkap Anda" required>
                                    @error('nama')
                                        <p class="text-red-600 text-sm mt-1 flex items-center"><svg class="h-4 w-4 mr-1"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Usia --}}
                                <div>
                                    <label for="usia" class="block text-sm font-medium text-gray-700 mb-2">
                                        Usia <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" name="usia" id="usia" value="{{ old('usia') }}"
                                        min="17" max="100"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        placeholder="Contoh: 25" required>
                                    @error('usia')
                                        <p class="text-red-600 text-sm mt-1 flex items-center"><svg class="h-4 w-4 mr-1"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- WhatsApp --}}
                                <div>
                                    <label for="wa" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nomor WhatsApp Aktif <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">

                                        </div>
                                        <input type="text" name="wa" id="wa" value="{{ old('wa') }}"
                                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                            placeholder="08*****" required>
                                    </div>

                                    @error('wa')
                                        <p class="text-red-600 text-sm mt-1 flex items-center"><svg class="h-4 w-4 mr-1"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Section 2: Data Instansi --}}
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m0 0v-4a2 2 0 012-2h10a2 2 0 012 2v4M9 7h6m-6 4h6m-6 4h6" />
                                </svg>
                                Data Lembaga/Instansi
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Kategori --}}
                                <div>
                                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                        Kategori Pendaftar <span class="text-red-500">*</span>
                                    </label>
                                    <select name="kategori" id="kategori"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Dewan Kemakmuran Masjid"
                                            {{ old('kategori') == 'Dewan Kemakmuran Masjid' ? 'selected' : '' }}>DKM (Dewan
                                            Kemakmuran Masjid)</option>
                                        <option value="Lembaga Pemerintahan/Swasta"
                                            {{ old('kategori') == 'Lembaga Pemerintahan/Swasta' ? 'selected' : '' }}>
                                            Lembaga Pemerintahan/Swasta</option>
                                        <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected' : '' }}>Umum
                                        </option>
                                    </select>
                                    @error('kategori')
                                        <p class="text-red-600 text-sm mt-1 flex items-center"><svg class="h-4 w-4 mr-1"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Instansi --}}
                                <div>
                                    <label for="instansi" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Lembaga/Instansi <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="instansi" id="instansi" value="{{ old('instansi') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                        placeholder="Contoh: DKM Al-Masyriq atau UMUM" required>
                                    <p class="text-xs text-gray-500 mt-1">Jika dari umum, tulis "UMUM"</p>
                                    @error('instansi')
                                        <p class="text-red-600 text-sm mt-1 flex items-center"><svg class="h-4 w-4 mr-1"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Alamat Instansi --}}
                                <div class="md:col-span-2">
                                    <label for="alamat_instansi" class="block text-sm font-medium text-gray-700 mb-2">
                                        Alamat Lembaga/Instansi <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="alamat_instansi" id="alamat_instansi" rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"
                                        placeholder="Masukkan alamat lengkap lembaga/instansi" required>{{ old('alamat_instansi') }}</textarea>
                                    @error('alamat_instansi')
                                        <p class="text-red-600 text-sm mt-1 flex items-center"><svg class="h-4 w-4 mr-1"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Section 3: Alamat Wilayah --}}
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                <svg class="h-6 w-6 text-purple-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Wilayah Domisili
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach (['provinsi', 'kota', 'kecamatan', 'kelurahan'] as $field)
                                    <div>
                                        <label for="{{ $field }}"
                                            class="block text-sm font-medium text-gray-700 mb-2">
                                            {{ ucfirst($field) }} <span class="text-red-500">*</span>
                                        </label>
                                        <select id="{{ $field }}" name="{{ $field }}"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors {{ in_array($field, ['kota', 'kecamatan', 'kelurahan']) ? 'bg-gray-100' : '' }}"
                                            {{ in_array($field, ['kota', 'kecamatan', 'kelurahan']) ? 'disabled' : '' }}
                                            required>
                                            <option value="">Pilih {{ ucfirst($field) }}</option>
                                        </select>
                                        @error($field)
                                            <p class="text-red-600 text-sm mt-1 flex items-center"><svg class="h-4 w-4 mr-1"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Section 4: Pengalaman --}}
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                <svg class="h-6 w-6 text-orange-500 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Pengalaman Pelatihan
                            </h3>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-4">
                                    Apakah Anda pernah mengikuti pelatihan JULEHA di Salman ITB? <span
                                        class="text-red-500">*</span>
                                </label>
                                <div class="space-y-3">
                                    <label
                                        class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="pernah_mengikuti" value="Ya" x-model="pernah"
                                            class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" required>
                                        <span class="ml-3 text-gray-900">Ya, saya pernah mengikuti pelatihan JULEHA di
                                            Salman ITB</span>
                                    </label>
                                    <label
                                        class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="pernah_mengikuti" value="Tidak" x-model="pernah"
                                            class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" required>
                                        <span class="ml-3 text-gray-900">Tidak, ini pertama kali saya mengikuti pelatihan
                                            JULEHA di Salman ITB</span>
                                    </label>
                                </div>
                                @error('pernah_mengikuti')
                                    <p class="text-red-600 text-sm mt-2 flex items-center"><svg class="h-4 w-4 mr-1"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Important Notice --}}
                        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl p-6">
                            <div class="flex items-start">
                                <svg class="h-6 w-6 text-yellow-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div>
                                    <h4 class="text-lg font-semibold text-yellow-800 mb-3">Informasi Penting</h4>
                                    <div class="space-y-2 text-yellow-700">
                                        <div class="flex items-start">
                                            <svg class="h-4 w-4 text-yellow-600 mt-0.5 mr-2 flex-shrink-0"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Sertifikat dibagikan setelah seluruh rangkaian acara selesai</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="h-4 w-4 text-yellow-600 mt-0.5 mr-2 flex-shrink-0"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Pastikan nama lengkap sudah benar untuk sertifikat</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="h-4 w-4 text-yellow-600 mt-0.5 mr-2 flex-shrink-0"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Wajib mengikuti pelatihan sampai selesai</span>
                                        </div>
                                        <div class="flex items-start">
                                            <svg class="h-4 w-4 text-yellow-600 mt-0.5 mr-2 flex-shrink-0"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Setelah mendaftar, Anda akan diarahkan ke grup WhatsApp peserta</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Terms and Conditions --}}
                        <div class="bg-white border border-gray-200 rounded-xl p-6">
                            <div class="flex items-start space-x-3">
                                <input id="syarat" name="syarat" type="checkbox" x-model="syarat"
                                    class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mt-0.5 flex-shrink-0"
                                    required>
                                <label for="syarat" class="text-sm text-gray-700 cursor-pointer">
                                    <span class="font-medium">Saya menyetujui semua syarat dan ketentuan yang
                                        berlaku</span>
                                    dan memahami bahwa data yang saya berikan adalah benar dan dapat dipertanggungjawabkan.
                                </label>
                            </div>
                            @error('syarat')
                                <p class="text-red-600 text-sm mt-2 flex items-center"><svg class="h-4 w-4 mr-1"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Form Actions --}}
                        <div class="bg-white border-t border-gray-200 px-8 py-6 -mx-8 -mb-8 rounded-b-2xl">
                            <div class="flex flex-col sm:flex-row gap-4 justify-between items-center">
                                {{-- Back Button --}}
                                <a href="{{ route('front.index') }}"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 border border-red-300 text-red-700 bg-white rounded-lg hover:bg-red-50 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors font-medium">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    Kembali ke Beranda
                                </a>

                                {{-- Submit Button --}}
                                <button type="submit" :disabled="!(pernah && syarat)"
                                    :class="(pernah && syarat) ?
                                    'bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white shadow-lg hover:shadow-xl' :
                                    'bg-gray-300 text-gray-500 cursor-not-allowed'"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 rounded-lg font-medium transition-all duration-200 min-w-[200px]">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        x-show="pernah && syarat">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        x-show="!(pernah && syarat)">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    <span x-text="(pernah && syarat) ? 'Daftar Sekarang' : 'Lengkapi Form'"></span>
                                </button>
                            </div>

                            {{-- Progress indicator for form completion --}}
                            <div class="mt-4 text-center text-sm text-gray-500" x-show="!(pernah && syarat)">
                                <span>Mohon lengkapi semua field yang diperlukan dan setujui syarat & ketentuan</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinsiSelect = document.getElementById('provinsi');
            const kotaSelect = document.getElementById('kota');
            const kecamatanSelect = document.getElementById('kecamatan');
            const kelurahanSelect = document.getElementById('kelurahan');

            // Inisialisasi awal
            kotaSelect.disabled = true;
            kecamatanSelect.disabled = true;
            kelurahanSelect.disabled = true;

            // Ambil data Provinsi
            fetch('https://ibnux.github.io/data-indonesia/provinsi.json')
                .then(response => response.json())
                .then(data => {
                    provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                    data.forEach(prov => {
                        const option = document.createElement('option');
                        option.value = prov.nama; // yang akan disubmit
                        option.textContent = prov.nama;
                        option.setAttribute('data-id', prov.id); // digunakan untuk fetch
                        provinsiSelect.appendChild(option);
                    });
                });

            // Saat Provinsi dipilih
            provinsiSelect.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                const provId = selected.getAttribute('data-id');

                kotaSelect.innerHTML = '<option value="">Memuat...</option>';
                kotaSelect.disabled = true;
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kecamatanSelect.disabled = true;
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                kelurahanSelect.disabled = true;

                if (!provId) return;

                fetch(`https://ibnux.github.io/data-indonesia/kabupaten/${provId}.json`)
                    .then(response => response.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                        data.forEach(kota => {
                            const option = document.createElement('option');
                            option.value = kota.nama;
                            option.textContent = kota.nama;
                            option.setAttribute('data-id', kota.id);
                            kotaSelect.appendChild(option);
                        });
                        kotaSelect.disabled = false;
                    })
                    .catch(() => {
                        kotaSelect.innerHTML = '<option value="">Gagal memuat data kota</option>';
                    });
            });

            // Saat Kota dipilih
            kotaSelect.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                const kotaId = selected.getAttribute('data-id');

                kecamatanSelect.innerHTML = '<option value="">Memuat...</option>';
                kecamatanSelect.disabled = true;
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                kelurahanSelect.disabled = true;

                if (!kotaId) return;

                fetch(`https://ibnux.github.io/data-indonesia/kecamatan/${kotaId}.json`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(kec => {
                            const option = document.createElement('option');
                            option.value = kec.nama;
                            option.textContent = kec.nama;
                            option.setAttribute('data-id', kec.id);
                            kecamatanSelect.appendChild(option);
                        });
                        kecamatanSelect.disabled = false;
                    })
                    .catch(() => {
                        kecamatanSelect.innerHTML =
                            '<option value="">Gagal memuat data kecamatan</option>';
                    });
            });

            // Saat Kecamatan dipilih
            kecamatanSelect.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                const kecId = selected.getAttribute('data-id');

                kelurahanSelect.innerHTML = '<option value="">Memuat...</option>';
                kelurahanSelect.disabled = true;

                if (!kecId) return;

                fetch(`https://ibnux.github.io/data-indonesia/kelurahan/${kecId}.json`)
                    .then(response => response.json())
                    .then(data => {
                        kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                        data.forEach(kel => {
                            const option = document.createElement('option');
                            option.value = kel.nama;
                            option.textContent = kel.nama;
                            option.setAttribute('data-id', kel.id);
                            kelurahanSelect.appendChild(option);
                        });
                        kelurahanSelect.disabled = false;
                    })
                    .catch(() => {
                        kelurahanSelect.innerHTML =
                            '<option value="">Gagal memuat data kelurahan</option>';
                    });
            });

            // Validasi visual field kosong
            const inputs = document.querySelectorAll('input[required], select[required], textarea[required]');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim() === '') {
                        this.classList.add('border-red-300', 'focus:ring-red-500',
                            'focus:border-red-500');
                        this.classList.remove('border-gray-300', 'focus:ring-blue-500',
                            'focus:border-blue-500');
                    } else {
                        this.classList.remove('border-red-300', 'focus:ring-red-500',
                            'focus:border-red-500');
                        this.classList.add('border-green-300', 'focus:ring-green-500',
                            'focus:border-green-500');
                    }
                });
                input.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        this.classList.remove('border-red-300', 'focus:ring-red-500',
                            'focus:border-red-500');
                        this.classList.add('border-green-300', 'focus:ring-green-500',
                            'focus:border-green-500');
                    }
                });
            });

            // Scroll ke error
            const firstError = document.querySelector('.text-red-600');
            if (firstError) {
                firstError.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }

            // Capitalize nama
            const nameInput = document.getElementById('nama');
            nameInput.addEventListener('input', function(e) {
                const words = e.target.value.split(' ');
                const capitalizedWords = words.map(word =>
                    word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()
                );
                e.target.value = capitalizedWords.join(' ');
            });
        });
    </script>
@endpush
