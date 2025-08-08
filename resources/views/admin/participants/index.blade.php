@extends('template.layouts.index')

@section('title')
    Daftar Peserta - Admin
@endsection

@section('content')
    @foreach (['deleted' => 'red', 'updated' => 'green', 'success' => 'blue'] as $key => $color)
        @if (session($key))
            <div id="alert-{{ $key }}"
                class="flex items-center p-4 mb-4 text-sm text-{{ $color }}-800 rounded-lg bg-{{ $color }}-50 dark:bg-gray-800 dark:text-{{ $color }}-400"
                role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                </svg>
                <span class="sr-only">Success</span>
                <div>
                    <span class="font-medium">Berhasil!</span> {{ session($key) }}
                </div>
            </div>
        @endif
    @endforeach
    @php
        $disableOverflowHidden = true;
    @endphp
    <div class="min-h-screen">
        <!-- Main Content -->
        <div class="p-4 md:ml-64">
            <!-- Top Bar -->
            <h2 class="text-2xl my-5 font-semibold text-gray-700">
                Peserta Program
            </h2>
        </div>

        <!-- Peserta List -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <div class="relative">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="selection-table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">#</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Program</th>
                                <th scope="col" class="px-4 py-3">Batch</th>
                                <th scope="col" class="px-4 py-3">Mulai</th>
                                <th scope="col" class="px-4 py-3">Selesai</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participants as $participant)
                                {{-- @php
                                    $participantData = [
                                        'nama' => $participant->nama,
                                        'kelamin' => $participant->kelamin,
                                        'email' => $participant->email,
                                        'wa' => $participant->wa,
                                        'alamat_ktp' => $participant->alamat_ktp,
                                        'alamat_domisili' => $participant->alamat_domisili,
                                        'info_dari' => $participant->info_dari,
                                        'pekerjaan' => $participant->pekerjaan,
                                        'instansi' => $participant->instansi,
                                        'pendidikan' => $participant->pendidikan,
                                        'sekolah' => $participant->sekolah,
                                        'pernah_mengikuti' => $participant->pernah_mengikuti,
                                        'batch_lama' => $participant->batch_lama,
                                        'program_layanan' => [
                                            'nama_program' => optional($participant->programLayanan)->nama_program,
                                        ],
                                        'batch' => [
                                            'batch_ke' => optional($participant->batch)->batch_ke,
                                        ],
                                        'provinsi_nama' => $participant->provinsi_nama,
                                        'kecamatan_nama' => $participant->kecamatan_nama,
                                        'kelurahan_nama' => $participant->kelurahan_nama,
                                        'kota_nama' => $participant->kota_nama,
                                        'provinsi_nama' => $participant->provinsi_nama,
                                    ];
                                @endphp --}}
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $participant->nama }}</td>
                                    <td class="px-4 py-3">{{ $participant->programLayanan->nama_program ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">{{ $participant->batch->batch_ke ?? 'N/A' }}</td>
                                    <td class="px-4 py-3">
                                        {{ optional($participant->batch)->tanggal_mulai_program ? \Carbon\Carbon::parse($participant->batch->tanggal_mulai_program)->format('d-m-Y') : 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ optional($participant->batch)->tanggal_selesai_program ? \Carbon\Carbon::parse($participant->batch->tanggal_selesai_program)->format('d-m-Y') : 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        @php
                                            $now = \Carbon\Carbon::now();
                                            $start = optional($participant->batch)->tanggal_mulai_program
                                                ? \Carbon\Carbon::parse($participant->batch->tanggal_mulai_program)
                                                : null;
                                            $end = optional($participant->batch)->tanggal_selesai_program
                                                ? \Carbon\Carbon::parse($participant->batch->tanggal_selesai_program)
                                                : null;
                                        @endphp

                                        @if ($end && $now->gt($end))
                                            <span class="text-gray-600">Selesai</span>
                                        @elseif ($start && $now->lt($start))
                                            <span class="text-yellow-500">Belum Dimulai</span>
                                        @elseif ($start && $end && $now->between($start, $end))
                                            <span class="text-green-600">Aktif</span>
                                        @else
                                            <span class="text-red-600">Data Tidak Lengkap</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                            data-participant='@json($participant)'
                                            class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-150 btn-detail">
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Detail Peserta
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4" id="modal-detail-body">
                    </div>
                    <!-- Modal footer -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toTitleCase(str) {
            if (!str || typeof str !== 'string') return 'N/A';
            return str
                .toLowerCase()
                .split(' ')
                .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                .join(' ');
        }
        document.addEventListener('DOMContentLoaded', function() {
            const detailButtons = document.querySelectorAll('.btn-detail');
            const modalBody = document.getElementById('modal-detail-body');

            detailButtons.forEach(button => {
                button.addEventListener('click', () => {
                    try {
                        const data = JSON.parse(button.getAttribute('data-participant'));
                        const alamatKTP = data.alamat_ktp ?? 'N/A';
                        const alamatDomisili = data.alamat_domisili;
                        console.log(data); // ✅ Setelah data didefinisikan

                        // Siapkan bagian alamat secara kondisional
                        let alamatHTML = '';
                        if (alamatDomisili && alamatDomisili.trim() !== '') {
                            alamatHTML = `
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Alamat KTP</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${alamatKTP},  Kec. ${data.kecamatan}, </span><br>
                                <span class="text-gray-700 dark:text-gray-300">Kel. ${toTitleCase(data.kelurahan)}, ${toTitleCase(data.kota)}, ${toTitleCase(data.provinsi)}</span>

                            </p>
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Alamat Domisili</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${alamatDomisili}</span>
                            </p>
                        `;
                        } else {
                            alamatHTML = `
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Alamat</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${alamatKTP},  Kec. ${data.kecamatan}, </span><br>
                                <span class="text-gray-700 dark:text-gray-300">Kel. ${toTitleCase(data.kelurahan)}, ${toTitleCase(data.kota)}, ${toTitleCase(data.provinsi)}</span>
                            </p>
                        `;
                        }
                        const pernah = data.pernah_mengikuti;
                        const batchlama = data.batch_lama ?? 'N/A';

                        // Siapkan bagian alamat secara kondisional
                        let batchlamaHTML = '';
                        if (pernah === 'Ya') {
                            batchlamaHTML = `
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Pernah Mengikuti</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${pernah}</span>
                            </p>
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Batch Sebelumnya</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${batchlama}</span>
                            </p>
                        `;
                        } else {
                            batchlamaHTML = `
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Pernah Mengikuti</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${pernah}</span>
                            </p>
                        `;
                        }
                        // console.log(data);
                        modalBody.innerHTML = `
                        <div class="grid grid-cols-2 sm:grid-cols-1 gap-4 text-sm text-gray-700 dark:text-gray-300">
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Nama</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.nama ?? 'N/A'}</span>
                            </p>
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Program yang di ikuti</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.program_layanan?.nama_program ?? 'N/A'} - Batch ${data.batch?.batch_ke ?? 'N/A'}</span>
                            </p>
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Jenis Kelamin</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.kelamin ?? 'N/A'} - ${data.usia ?? 'N/A'}</span>
                            </p>
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Email</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.email ?? 'N/A'}</span>
                            </p>
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">WhatsApp</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.wa ?? 'N/A'}</span>
                            </p>
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Info Dari</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.info_dari ?? 'N/A'}</span>
                            </p>
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Pekerjaan</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.pekerjaan ?? 'N/A'}</span>
                            </p>
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Instansi</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.instansi ?? 'N/A'}</span>
                            </p>
                             ${alamatHTML}
                            <p>
                                <span class="font-semibold text-gray-800 dark:text-white">Pendidikan Terakhir</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.pendidikan ?? 'N/A'} - ${data.sekolah ?? 'N/A'}</span>
                            </p>
                            ${batchlamaHTML}
                        </div>
                    `;
                    } catch (err) {
                        console.error("Gagal parsing data peserta:", err);
                        modalBody.innerHTML =
                            '<p class="text-red-600">Data tidak dapat ditampilkan.</p>';
                    }
                });
            });
        });
    </script>
@endpush
