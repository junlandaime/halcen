@extends('layouts.front')

@section('content')

@if (session('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-transition
        class="max-w-2xl mx-auto mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow"
        style="display: none;"
    >
        <div class="flex justify-between items-center">
            <div>
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
            <button @click="show = false" class="text-green-700 font-bold">&times;</button>
        </div>
    </div>
@endif

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-6 text-center">
            @if ($form->programBatch && $form->programBatch->programLayanan)
                Form Pendaftaran untuk Batch {{ $form->programBatch->batch_ke }} {{ $form->programBatch->programLayanan->nama_program }}
            @else
                Informasi program tidak lengkap.
            @endif
        </h1>
        @if ($form->is_active)
        <form action="{{ route('registration.form.store', $form->slug) }}" method="POST" x-data="{ siap: false, syarat: false, open: false }" @submit.prevent="
            if (siap && syarat) {
                open = true;
                sessionStorage.setItem('showModal', true);
                let form = $el;
                setTimeout(() => {
                    form.submit();
                }, 100); // cukup 100ms agar proses JS selesai
            } else {
                alert('Harap centang semua persetujuan terlebih dahulu.');
            }
        ">
                <div class="grid grid-cols-1 gap-6">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-950 mb-1">Nama Lengkap <span
                                class="text-red-500">*</span></label>
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
                            <input type="number" id="usia" name="usia" min="17" max="70" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                        </div>
                    </div>

                    <!-- Sapaan dan WhatsApp -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Sapaan -->
                        <div>
                            <label for="sapaan" class="block text-sm font-medium text-gray-950 mb-1">Sapaan</label>
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
                            <label for="wa" class="block text-sm font-medium text-gray-950 mb-1">Nomor WhatsApp <span
                                    class="text-red-500">*</span></label>
                            <input type="tel" id="wa" name="wa" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                placeholder="Contoh: 08123456789" maxlength="13">
                        </div>
                    </div>

                    <!-- Alamat KTP -->
                    <div x-data="{ beda: false }">
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
                                <div>
                    <label for="kecamatan" class="block text-sm font-medium text-gray-950 mb-1">
                        Kecamatan <span class="text-red-500">*</span>
                    </label>
                    <select id="kecamatan" name="kecamatan" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all" disabled>
                        <option value="">Pilih Kecamatan</option>
                    </select>
                </div>

                <!-- Kelurahan -->
                <div>
                    <label for="kelurahan" class="block text-sm font-medium text-gray-950 mb-1">
                        Kelurahan <span class="text-red-500">*</span>
                    </label>
                    <select id="kelurahan" name="kelurahan" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all" disabled>
                        <option value="">Pilih Kelurahan</option>
                    </select>
                    </div>
                </div>

                    <!-- Pendidikan Terakhir -->
                    <div>
                        <label for="pendidikan" class="block text-sm font-medium text-gray-950 mb-1">Pendidikan Terakhir
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
                            <label for="pekerjaan" class="block text-sm font-medium text-gray-950 mb-1">Pekerjaan /
                                Aktivitas Saat Ini</label>
                            <select type="text" id="pekerjaan" name="pekerjaan" required
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
                                <option value="IRT">Lainnya</option>
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
                                <input id="pernah_ya" name="pernah_mengikuti" type="radio" value="Ya" required
                                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300" x-model="pernah">
                                <label for="pernah_ya" class="ml-2 block text-sm text-gray-950">Ya</label>
                            </div>
                            <div class="flex items-center">
                                <input id="pernah_tidak" name="pernah_mengikuti" type="radio" value="Tidak" required
                                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300" x-model="pernah">
                                <label for="pernah_tidak" class="ml-2 block text-sm text-gray-950">Tidak</label>
                            </div>
                        </div>

                        <!-- Batch -->
                        <div id="batch_container" class="mt-4" x-show="pernah === 'Ya'" x-transition>
                            <label for="batch" class="block text-sm font-medium text-gray-950 mb-1">Batch yang Diikuti
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="batch" name="batch" placeholder="misalnya: Batch 1"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all">
                        </div>
                    </div>
                    <!-- Siap Mengikuti -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1">Siapkah Anda mengikuti rangkaian
                            kegiatan ini hingga selesai selama 14 pertemuan?
                            <span class="text-red-500">*</span></label>
                        <label class="block text-xs font-medium text-red-600 mb-1">*Catatan: Untuk bisa lulus dan mendapat
                            sertifikat, kehadiran minimum 70%</label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="siap_ya" name="siap_mengikuti" type="radio" value="Ya" required
                                    x-model="siap" class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                <label for="siap_ya" class="ml-2 block text-sm text-gray-950">Ya, saya siap</label>
                            </div>
                            <div class="flex items-center">
                                <input id="siap_tidak" name="siap_mengikuti" type="radio" value="Insyaallah diusahakan" required
                                    x-model="siap" class="h-4 w-4 text-primary focus:ring-primary border-gray-300">
                                <label for="siap_tidak" class="ml-2 block text-sm text-gray-950">Insyaallah diusahakan
                                    dapat 70%</label>
                            </div>
                        </div>
                    </div>

                    <!-- Syarat dan Ketentuan -->
                    <div class="border-t pt-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="syarat" name="syarat" type="checkbox" required x-model="syarat"
                                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                            </div>
                            <div class="ml-3">
                                <label for="syarat" class="text-sm text-gray-950">Saya Menyetujui Semua Syarat dan
                                    Ketentuan yang Berlaku.</label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-between items-center pt-6">
                        <!-- BACK BUTTON -->
                        <button type="button"
                            @click="window.history.back()"
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded transition-colors w-full md:w-auto">
                            Kembali
                        </button>

                        <!-- REGISTER NOW -->
                        <button type="submit" :disabled="!(siap && syarat)"
                            :class="(siap && syarat)
                                ? 'bg-green-600 hover:bg-green-700'
                                : 'bg-gray-400 cursor-not-allowed'"
                            class="text-white font-semibold py-2 px-4 rounded transition-colors w-full md:w-auto">
                            Daftar Sekarang
                        </button>
                    </div>
                        </form>
                    </div>
                </div>
            </form>
        @else
            <p class="text-center text-lg text-red-600">Form pendaftaran untuk batch ini tidak aktif.</p>
        @endif
    </div>
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

    // Ambil data provinsi
    fetch('https://ibnux.github.io/data-indonesia/provinsi.json')
        .then(response => response.json())
        .then(data => {
            provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
            data.forEach(prov => {
                const option = document.createElement('option');
                option.value = prov.id;
                option.textContent = prov.nama;
                provinsiSelect.appendChild(option);
            });
        });

    // Saat provinsi diubah
    provinsiSelect.addEventListener('change', function () {
        const provId = this.value;
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
                    option.value = kota.id;
                    option.textContent = kota.nama;
                    kotaSelect.appendChild(option);
                });
                kotaSelect.disabled = false;
            })
            .catch(() => {
                kotaSelect.innerHTML = '<option value="">Gagal memuat data kota</option>';
            });
    });

    // Saat kota diubah
    kotaSelect.addEventListener('change', function () {
        const kotaId = this.value;
        kecamatanSelect.innerHTML = '<option value="">Memuat...</option>';
        kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
        kelurahanSelect.disabled = true;

        if (!kotaId) {
            kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            kecamatanSelect.disabled = true;
            return;
        }

        fetch(`https://ibnux.github.io/data-indonesia/kecamatan/${kotaId}.json`)
            .then(response => response.json())
            .then(data => {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                data.forEach(kec => {
                    const option = document.createElement('option');
                    option.value = kec.id;
                    option.textContent = kec.nama;
                    kecamatanSelect.appendChild(option);
                });
                kecamatanSelect.disabled = false;
            })
            .catch(() => {
                kecamatanSelect.innerHTML = '<option value="">Gagal memuat data kecamatan</option>';
            });
    });

    // Saat kecamatan diubah
    kecamatanSelect.addEventListener('change', function () {
        const kecId = this.value;
        kelurahanSelect.innerHTML = '<option value="">Memuat...</option>';

        if (!kecId) {
            kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
            kelurahanSelect.disabled = true;
            return;
        }

        fetch(`https://ibnux.github.io/data-indonesia/kelurahan/${kecId}.json`)
            .then(response => response.json())
            .then(data => {
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                data.forEach(kel => {
                    const option = document.createElement('option');
                    option.value = kel.id;
                    option.textContent = kel.nama;
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
