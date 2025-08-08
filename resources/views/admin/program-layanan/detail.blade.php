@extends('template.layouts.index')

@section('title')
    Detail Daftar Peserta - Admin
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
                Peserta Program -
                {{ $attendances->first()?->participant?->programLayanan?->nama_program ?? 'Program' }} Batch
                {{ $attendances->first()?->participant?->batch?->batch_ke ?? 'Tidak Diketahui' }}
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
                                <th scope="col" class="px-4 py-3">Jenis Kelamin</th>
                                <th scope="col" class="px-4 py-3">Presensi Pagi</th>
                                <th scope="col" class="px-4 py-3">Presensi Siang</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                                @php
                                    $participant = $attendance->participant;
                                    $participantDataK = [
                                        'nama' => $participant->nama,
                                        'kelamin' => $participant->kelamin,
                                        'usia' => $participant->usia,
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
                                        'kecamatan' => $participant->kecamatan,
                                        'kelurahan' => $participant->kelurahan,
                                        'kota' => $participant->kota,
                                        'provinsi' => $participant->provinsi,
                                    ];
                                    $participantDataJ = [
                                        'nama' => $participant->nama,
                                        'usia' => $participant->usia,
                                        'kelamin' => $participant->kelamin,
                                        'wa' => $participant->wa,
                                        'kategori' => $participant->kategori,
                                        'instansi' => $participant->instansi,
                                        'alamat_instansi' => $participant->alamat_instansi,
                                        'pernah_mengikuti' => $participant->pernah_mengikuti,
                                        'batch_lama' => $participant->batch_lama,
                                        'program_layanan' => [
                                            'nama_program' => optional($participant->programLayanan)->nama_program,
                                        ],
                                        'batch' => [
                                            'batch_ke' => optional($participant->batch)->batch_ke,
                                        ],
                                        'kecamatan' => $participant->kecamatan,
                                        'kelurahan' => $participant->kelurahan,
                                        'kota' => $participant->kota,
                                        'provinsi' => $participant->provinsi,
                                    ];
                                @endphp
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $attendance->participant->nama }}</td>
                                    <td class="px-4 py-3">{{ $attendance->participant->kelamin }}</td>
                                    <td class="px-4 py-3">{{ $attendance->presensi_pagi }}</td>
                                    <td class="px-4 py-3">{{ $attendance->presensi_siang }}</td>
                                    <td class="px-4 py-3">
                                        @if ($attendance->presensi_pagi + $attendance->presensi_siang >= 20)
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded">LULUS</span>
                                        @else
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded">TIDAK
                                                LULUS</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex gap-2">
                                            <div class="flex justify-center">
                                                <!-- View -->
                                                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                                    data-participant='@json($participantDataK)'
                                                    data-participant-j='@json($participantDataJ)'
                                                    data-programlayanan-id="{{ $participant->program_layanan_id }}"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-150 btn-detail">
                                                    Detail
                                                </button>
                                                <!-- Edit -->
                                                {{-- <a href="#"
                                                    class="inline-flex items-center mx-1 px-3 py-1.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150">
                                                    <svg class="w-4 h-4 mr-0.5 -ml-0.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </a> --}}
                                            </div>
                                        </div>
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
                        const programId = parseInt(button.getAttribute('data-programlayanan-id'));
                        const dataK = JSON.parse(button.getAttribute('data-participant'));
                        const dataJ = JSON.parse(button.getAttribute('data-participant-j'));

                        const data = (programId === 2 || programId === 3) ? dataJ : dataK;
                        console.log('Menggunakan data:', (programId === 2 || programId === 3) ?
                            'participantDataJ' : 'participantDataK');

                        const pernah = data.pernah_mengikuti;
                        const batchlama = data.batch_lama ?? 'N/A';
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

                        // Programlayanan_id 2 atau 3 → Gunakan participantDataJ
                        if (programId === 2 || programId === 3) {
                            modalBody.innerHTML = `
                            <div class="grid grid-cols-2 sm:grid-cols-1 gap-4 text-sm text-gray-700 dark:text-gray-300">
                                <p><span class="font-semibold text-gray-800 dark:text-white">Nama</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.nama}</span></p>

                                <p><span class="font-semibold text-gray-800 dark:text-white">Program</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.program_layanan?.nama_program ?? 'N/A'} - Batch ${data.batch?.batch_ke ?? 'N/A'}</span></p>

                                <p><span class="font-semibold text-gray-800 dark:text-white">Usia</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.usia ?? 'N/A'}</span></p>

                                <p><span class="font-semibold text-gray-800 dark:text-white">Jenis Kelamin</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.kelamin}</span></p>

                                <p><span class="font-semibold text-gray-800 dark:text-white">WhatsApp</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.wa}</span></p>

                                <p><span class="font-semibold text-gray-800 dark:text-white">Kategori</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.kategori}</span></p>

                                <p><span class="font-semibold text-gray-800 dark:text-white">Instansi</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.instansi}</span></p>

                                <p><span class="font-semibold text-gray-800 dark:text-white">Alamat Instansi</span><br>
                                <span class="text-gray-700 dark:text-gray-300">${data.alamat_instansi}</span></p>

                                <p><span class="font-semibold text-gray-800 dark:text-white">Alamat</span><br>
                                <span class="text-gray-700 dark:text-gray-300">Kec. ${data.kecamatan}, Kel. ${toTitleCase(data.kelurahan)}, ${toTitleCase(data.kota)}, ${toTitleCase(data.provinsi)}</span></p>

                                ${batchlamaHTML}

                            </div>
                        `;
                        } else {
                            // programlayanan_id == 1 → Gunakan participantDataK
                            const alamatKTP = data.alamat_ktp ?? 'N/A';
                            const alamatDomisili = data.alamat_domisili;
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
                        }
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
