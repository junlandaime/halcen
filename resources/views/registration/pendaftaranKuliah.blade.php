@extends('layouts.front')

@section('title')
    <title>Form Pendaftaran {{ $registration->programBatch?->programLayanan?->nama_program ?? 'Program' }} - Halal Center
        Salman ITB</title>
@endsection

@section('content')
    <section class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                {{-- Header with improved design --}}
                <div class="bg-gradient-to-r from-green-600 to-blue-600 px-8 py-12 text-center">
                    <div class="max-w-2xl mx-auto">
                        <h1 class="text-2xl md:text-3xl font-bold text-white leading-tight mb-4">
                            Pendaftaran {{ $registration->programBatch?->programLayanan?->nama_program ?? 'Program' }}
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

                    @if ($registration->is_active)
                        <form action="{{ route('registration.form.store', $registration->slug) }}" method="POST"
                            x-data="{ siap: false, syarat: false, open: false }"
                            @submit.prevent="
        if (siap && syarat) {
            open = true;
            sessionStorage.setItem('showModal', true);
            let form = $el;
            setTimeout(() => { form.submit(); }, 100);
        } else {
            alert('Harap centang semua persetujuan terlebih dahulu.');
        }
      "
                            class="space-y-6">
                            @csrf

                            <!-- Nama Lengkap -->
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-950 mb-1">Nama Lengkap
                                    <span class="text-red-500">*</span></label>
                                <input type="text" id="nama" name="nama" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-950 mb-1">Email <span
                                        class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                            </div>

                            <!-- Kelamin dan Usia -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Jenis Kelamin -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-950 mb-1">Jenis Kelamin <span
                                            class="text-red-500">*</span></label>
                                    <div class="space-y-2">
                                        <div class="flex items-center">
                                            <input id="male" name="kelamin" type="radio" value="pria"
                                                class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                            <label for="male" class="ml-2 block text-sm text-gray-950">Pria</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="female" name="kelamin" type="radio" value="wanita"
                                                class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                            <label for="female" class="ml-2 block text-sm text-gray-950">Wanita</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Usia -->
                                <div>
                                    <label for="usia" class="block text-sm font-medium text-gray-950 mb-1">Usia <span
                                            class="text-red-500">*</span></label>
                                    <input type="number" id="usia" name="usia" min="17" max="70"
                                        required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                </div>
                            </div>

                            <!-- Sapaan dan WhatsApp -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Sapaan -->
                                <div>
                                    <label for="sapaan"
                                        class="block text-sm font-medium text-gray-950 mb-1">Sapaan</label>
                                    <select id="sapaan" name="sapaan"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                        <option value="" hidden>Pilih Sapaan</option>
                                        <option value="Bapak">Bapak</option>
                                        <option value="Ibu">Ibu</option>
                                        <option value="Kak">Kak</option>
                                    </select>
                                </div>

                                <!-- WhatsApp -->
                                <div>
                                    <label for="wa" class="block text-sm font-medium text-gray-950 mb-1">Nomor
                                        WhatsApp <span class="text-red-500">*</span></label>
                                    <input type="tel" id="wa" name="wa" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                        placeholder="Contoh: 08123456789" maxlength="13">
                                </div>
                            </div>

                            <!-- Alamat KTP -->
                            <div>
                                <label for="alamat_ktp" class="block text-sm font-medium text-gray-950 mb-1">
                                    Alamat Lengkap <span class="text-red-500">*</span>
                                </label>
                                <textarea id="alamat_ktp" name="alamat_ktp" rows="3" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                    placeholder="Contoh: Jl. Gelap Nyawang No.123 RT07/RW01"></textarea>
                            </div>

                            <!-- Kota/Kabupaten dan Provinsi -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Provinsi -->
                                <div>
                                    <label for="provinsi" class="block text-sm font-medium text-gray-950 mb-1">
                                        Provinsi <span class="text-red-500">*</span>
                                    </label>
                                    <select id="provinsi" name="provinsi" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                </div>

                                <!-- Kota/Kabupaten -->
                                <div>
                                    <label for="kota" class="block text-sm font-medium text-gray-950 mb-1">
                                        Kota/Kabupaten <span class="text-red-500">*</span>
                                    </label>
                                    <select id="kota" name="kota" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                        <option value="">Pilih Kota/Kabupaten</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Kecamatan dan Kelurahan -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Kecamatan -->
                                <div>
                                    <label for="kecamatan" class="block text-sm font-medium text-gray-950 mb-1">
                                        Kecamatan <span class="text-red-500">*</span>
                                    </label>
                                    <select id="kecamatan" name="kecamatan" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                        disabled>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>

                                <!-- Kelurahan -->
                                <div>
                                    <label for="kelurahan" class="block text-sm font-medium text-gray-950 mb-1">
                                        Kelurahan <span class="text-red-500">*</span>
                                    </label>
                                    <select id="kelurahan" name="kelurahan" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                        disabled>
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Pendidikan Terakhir -->
                            <div>
                                <label for="pendidikan" class="block text-sm font-medium text-gray-950 mb-1">Pendidikan
                                    Terakhir
                                    <span class="text-red-500">*</span></label>
                                <select id="pendidikan" name="pendidikan" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                    <option value="" hidden>Pilih Pendidikan</option>
                                    <option value="SD/MI">SD/MI</option>
                                    <option value="SMP/MTs">SMP/MTs</option>
                                    <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>

                            <!-- Nama Sekolah/Universitas -->
                            <div>
                                <label for="sekolah" class="block text-sm font-medium text-gray-950 mb-1">Nama
                                    Sekolah/Universitas</label>
                                <input type="text" id="sekolah" name="sekolah" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                            </div>

                            <!-- Pekerjaan dan Instansi -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Pekerjaan -->
                                <div>
                                    <label for="pekerjaan" class="block text-sm font-medium text-gray-950 mb-1">Pekerjaan
                                        /
                                        Aktivitas Saat Ini</label>
                                    <select id="pekerjaan" name="pekerjaan" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                        <option value="" hidden>Pilih Pekerjaan</option>
                                        <option value="Dosen/Guru">Dosen/Guru</option>
                                        <option value="Mahasiswa/Pelajar">Mahasiswa/Pelajar</option>
                                        <option value="Fresh Graduated">Fresh Graduated</option>
                                        <option value="Pengusaha">Pengusaha/Berdagang</option>
                                        <option value="ASN">Aparatur Sipil Negara</option>
                                        <option value="BUMN">Karyawan BUMN</option>
                                        <option value="Swasta">Karyawan Swasta</option>
                                        <option value="IRT">Ibu Rumah Tangga</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <!-- Instansi/Perusahaan -->
                                <div>
                                    <label for="instansi"
                                        class="block text-sm font-medium text-gray-950 mb-1">Instansi/Perusahaan</label>
                                    <input type="text" id="instansi" name="instansi"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                </div>
                            </div>

                            <!-- Info Dari -->
                            <div x-data="{ info: '' }">
                                <label for="info_dari" class="block text-sm font-medium text-gray-950 mb-1">Dari mana Anda
                                    mengetahui program ini? <span class="text-red-500">*</span></label>

                                <select id="info_dari" name="info_dari" x-model="info" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                    <option value="" hidden>Pilih Sumber Informasi</option>
                                    <option value="WaG">Grup WA</option>
                                    <option value="Medsos">Media Sosial Masjid Salman ITB</option>
                                    <option value="rekan">Diberi tahu atasan/rekan kerja</option>
                                    <option value="keluarga">Diberi tahu kerabat/keluarga</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <!-- Input jika "Lainnya" dipilih -->
                                <div class="mt-4" x-show="info === 'Lainnya'" x-transition>
                                    <label for="info_lainnya" class="block text-sm font-medium text-gray-950 mb-1">Mohon
                                        sebutkan</label>
                                    <input type="text" id="info_lainnya" name="info_lainnya"
                                        placeholder="Contoh: Acara kampus, teman, dll"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                </div>
                            </div>

                            <!-- Pernah Mengikuti -->
                            <div x-data="{ pernah: '' }">
                                <label class="block text-sm font-medium text-gray-950 mb-1">Pernah mengikuti program kami
                                    sebelumnya? <span class="text-red-500">*</span></label>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input id="pernah_ya" name="pernah_mengikuti" type="radio" value="Ya"
                                            required class="h-4 w-4 text-primary focus:ring-primary border-gray-300"
                                            x-model="pernah">
                                        <label for="pernah_ya" class="ml-2 block text-sm text-gray-950">Ya</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="pernah_tidak" name="pernah_mengikuti" type="radio" value="Tidak"
                                            required class="h-4 w-4 text-primary focus:ring-primary border-gray-300"
                                            x-model="pernah">
                                        <label for="pernah_tidak" class="ml-2 block text-sm text-gray-950">Tidak</label>
                                    </div>
                                </div>

                                <!-- Batch -->
                                <div class="mt-4" x-show="pernah === 'Ya'" x-transition>
                                    <label for="batch" class="block text-sm font-medium text-gray-950 mb-1">Batch yang
                                        Diikuti
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" id="batch" name="batch_lama"
                                        placeholder="misalnya: Batch 1"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                                </div>
                            </div>

                            <!-- Siap Mengikuti -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-1">Siapkah Anda mengikuti
                                    rangkaian
                                    kegiatan ini hingga selesai selama 14 pertemuan?
                                    <span class="text-red-500">*</span></label>
                                <label class="block text-xs font-medium text-red-600 mb-1">*Catatan: Untuk bisa lulus dan
                                    mendapat
                                    sertifikat, kehadiran minimum 70%</label>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input id="siap_ya" name="siap_mengikuti" type="radio" value="Ya"
                                            required x-model="siap"
                                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                        <label for="siap_ya" class="ml-2 block text-sm text-gray-950">Ya, saya
                                            siap</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="siap_tidak" name="siap_mengikuti" type="radio"
                                            value="Insyaallah diusahakan" required x-model="siap"
                                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                        <label for="siap_tidak" class="ml-2 block text-sm text-gray-950">Insyaallah
                                            diusahakan
                                            dapat 70%</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Syarat dan Ketentuan -->
                            <div class="border-t pt-6">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="syarat" name="syarat" type="checkbox" required x-model="syarat"
                                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3">
                                        <label for="syarat" class="text-sm text-gray-950">Saya Menyetujui Semua Syarat
                                            dan
                                            Ketentuan yang Berlaku.</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6">
                                <!-- Back Button -->
                                <a href="{{ route('front.index') }}"
                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 w-full sm:w-auto text-center">
                                    Kembali ke Beranda
                                </a>

                                <!-- Submit Button -->
                                <button type="submit" :disabled="!(siap && syarat)"
                                    :class="(siap && syarat) ?
                                    'bg-green-600 hover:bg-green-700' :
                                    'bg-gray-400 cursor-not-allowed'"
                                    class="text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 w-full sm:w-auto">
                                    Daftar Sekarang
                                </button>
                            </div>

                        </form>
                    @else
                        <div class="text-center py-12">
                            <div class="bg-red-50 rounded-xl p-8 border border-red-200">
                                <svg class="h-12 w-12 text-red-400 mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                                <p class="text-lg text-red-600 font-medium">Form pendaftaran untuk batch ini tidak aktif.
                                </p>
                                <p class="text-red-500 text-sm mt-2">Silakan hubungi customer service untuk informasi lebih
                                    lanjut.</p>
                            </div>
                        </div>
                    @endif

                    {{-- SCRIPT --}}
                    <script>
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
                                    kecamatanSelect.innerHTML = '<option value="">Gagal memuat data kecamatan</option>';
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
                                    kelurahanSelect.innerHTML = '<option value="">Gagal memuat data kelurahan</option>';
                                });
                        });
                    </script>
                @endsection
