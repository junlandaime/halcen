@extends('layouts.front')

@section('title')
    <title>Form Pendaftaran JULEHA-UNGGAS - Halal Center Salman ITB</title>
@endsection

@section('content')
    <section class="py-16 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                {{-- Header with improved design --}}
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-8 py-12 text-center">
                    <div class="max-w-2xl mx-auto">
                        <h1 class="text-2xl md:text-3xl font-bold text-white leading-tight mb-4">
                            Pendaftaran {{ $registration->programBatch?->programLayanan?->nama_program ?? 'JULEHA-UNGGAS' }}
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

                {{-- Form Content --}}
                <div class="px-8 py-8">
                    {{-- Success/Error Messages --}}
                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-400 rounded-r-lg">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-green-700 font-medium">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-400 rounded-r-lg">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-red-700 font-medium">{{ session('error') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Registration Form --}}
                    <form method="POST" action="{{ route('registration.form.store', ['slug' => $slug]) }}"
                        x-data="{ pernah: '', syarat: false }" class="space-y-6">
                        @csrf

                        {{-- Personal Information Section --}}
                        <div class="bg-gray-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                Informasi Personal
                            </h3>

                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Nama Lengkap -->
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama" id="nama"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        placeholder="Masukkan nama lengkap" required>
                                </div>

                                <!-- Usia -->
                                <div>
                                    <label for="usia" class="block text-sm font-medium text-gray-700 mb-2">Usia</label>
                                    <input type="number" name="usia" id="usia"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        placeholder="Masukkan usia" required>
                                </div>

                                <!-- No WhatsApp -->
                                <div class="md:col-span-2">
                                    <label for="wa" class="block text-sm font-medium text-gray-700 mb-2">Nomor
                                        WhatsApp Aktif</label>
                                    <input type="text" name="wa" id="wa"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        placeholder="Contoh: 081234567890" required>
                                </div>
                            </div>
                        </div>

                        {{-- Category Information Section --}}
                        <div class="bg-green-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                Informasi Kategori & Instansi
                            </h3>

                            <div class="space-y-4">
                                <!-- Kategori Pendaftar -->
                                <div>
                                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori
                                        Pendaftar</label>
                                    <select name="kategori" id="kategori"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Dewan Kemakmuran Masjid">Pedagang Ayam/Unggas</option>
                                        <option value="Lembaga Pemerintahan/Swasta">Rumah Potong Ayam (RPA)</option>
                                        <option value="Umum">Umum</option>
                                    </select>
                                </div>

                                <!-- Nama Instansi -->
                                <div>
                                    <label for="instansi" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                        Pasar/RPA</label>
                                    <input type="text" name="instansi" id="instansi"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        placeholder="Contoh: Pasar Ciroyom, RPA Barokah, atau UMUM" required>
                                    <p class="text-sm text-gray-500 mt-2">Contoh: Pasar Ciroyom, Rumah Potong Ayam Barokah.
                                        Jika dari umum, tulis "UMUM".</p>
                                </div>

                                <!-- Alamat Instansi -->
                                <div>
                                    <label for="alamat_instansi"
                                        class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap
                                        Pasar/RPA</label>
                                    <textarea name="alamat_instansi" id="alamat_instansi" rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        placeholder="Masukkan alamat lengkap..." required></textarea>
                                    <p class="text-sm text-gray-500 mt-2">Contoh: Jl. Ciroyom Barat Kecamatan Andir Kota
                                        Bandung Jawa Barat. Jika dari umum, silakan tulis alamat tempat tinggal saat ini.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Location Information Section --}}
                        <div class="bg-orange-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                Informasi Lokasi
                            </h3>

                            <div class="grid md:grid-cols-2 gap-4">
                                <!-- Provinsi -->
                                <div>
                                    <label for="provinsi"
                                        class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                                    <select id="provinsi" name="provinsi"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        required>
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                </div>

                                <!-- Kota/Kabupaten -->
                                <div>
                                    <label for="kota"
                                        class="block text-sm font-medium text-gray-700 mb-2">Kota/Kabupaten</label>
                                    <select id="kota" name="kota"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        required disabled>
                                        <option value="">Pilih Kota/Kabupaten</option>
                                    </select>
                                </div>

                                <!-- Kecamatan -->
                                <div>
                                    <label for="kecamatan"
                                        class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                                    <select id="kecamatan" name="kecamatan"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        required disabled>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>

                                <!-- Kelurahan -->
                                <div>
                                    <label for="kelurahan"
                                        class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                                    <select id="kelurahan" name="kelurahan"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                        required disabled>
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Experience Section --}}
                        <div class="bg-purple-50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                Pengalaman Pelatihan
                            </h3>

                            <div class="space-y-3">
                                <p class="text-sm font-medium text-gray-700">Apakah Anda pernah mengikuti Pelatihan JULEHA
                                    di Masjid Salman ITB?</p>
                                <div class="flex space-x-6">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="pernah_mengikuti" value="Ya" x-model="pernah"
                                            class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300" required>
                                        <span class="ml-2 text-gray-700">Ya, pernah</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="pernah_mengikuti" value="Tidak" x-model="pernah"
                                            class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300" required>
                                        <span class="ml-2 text-gray-700">Belum pernah</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Important Information --}}
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-r-xl">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h4 class="text-lg font-semibold text-yellow-800 mb-2">Informasi Penting!</h4>
                                    <ul class="text-sm text-yellow-700 space-y-1">
                                        <li class="flex items-start">
                                            <span
                                                class="inline-block w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                                            Sertifikat dibagikan setelah seluruh rangkaian acara selesai dilaksanakan
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="inline-block w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                                            Pastikan nama lengkap sudah benar sebelum submit
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="inline-block w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                                            Ikuti pelatihan sampai selesai untuk mendapatkan sertifikat
                                        </li>
                                        <li class="flex items-start">
                                            <span
                                                class="inline-block w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-2 flex-shrink-0"></span>
                                            Setelah submit, Anda akan diarahkan ke link grup WhatsApp peserta
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Terms and Conditions --}}
                        <div class="bg-gray-50 rounded-xl p-6">
                            <div class="flex items-start space-x-3">
                                <div class="flex items-center h-5 mt-1">
                                    <input id="syarat" name="syarat" type="checkbox" x-model="syarat" required
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                </div>
                                <div class="flex-1">
                                    <label for="syarat" class="text-sm font-medium text-gray-900 cursor-pointer">
                                        Saya menyetujui semua syarat dan ketentuan yang berlaku
                                    </label>
                                    <p class="text-xs text-gray-500 mt-1">
                                        Dengan mencentang kotak ini, Anda setuju untuk mengikuti seluruh rangkaian pelatihan
                                        dan mematuhi peraturan yang ada.
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Form Actions --}}
                        <div
                            class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                            <!-- Back Button -->
                            <a href="{{ route('front.index') }}"
                                class="w-full sm:w-auto bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 text-center inline-flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Kembali ke Beranda
                            </a>

                            <!-- Submit Button -->
                            <button type="submit" :disabled="!(pernah && syarat)"
                                :class="(pernah && syarat) ?
                                'bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5' :
                                'bg-gray-300 cursor-not-allowed'"
                                class="w-full sm:w-auto text-white font-semibold py-3 px-8 rounded-lg transition-all duration-200 inline-flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Daftar Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <style>
        /* Custom styles for better UX */
        .form-input:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.15);
        }

        .form-section {
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Better focus states */
        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        /* Loading state for disabled selects */
        select:disabled {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
    </style>
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

            // Redirect WA setelah submit

        });
    </script>
@endpush
