<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Peserta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'bounce-in': 'bounceIn 0.6s ease-out',
                        'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
                        'float': 'float 3s ease-in-out infinite',
                        'countdown': 'countdown 1s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        bounceIn: {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)' },
                            '70%': { transform: 'scale(0.9)' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        },
                        pulseGlow: {
                            '0%, 100%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.5)' },
                            '50%': { boxShadow: '0 0 30px rgba(59, 130, 246, 0.8)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        countdown: {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.1)' }
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-pink-400 to-yellow-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-gradient-to-br from-indigo-400 to-cyan-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"></div>
    </div>

    <!-- Main Container -->
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Header Section -->
            <div class="text-center mb-8 animate-fade-in">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mb-4 shadow-lg animate-float">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                    Presensi Peserta
                </h1>
                <p class="text-gray-600 text-sm">Masukkan nama Anda untuk melakukan presensi</p>
                <!-- Time Status -->
                <div id="time-status" class="mt-4 inline-flex items-center px-4 py-2 rounded-full text-sm font-medium shadow-lg">
                    <svg class="w-4 h-4 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span id="time-text">Memuat status waktu...</span>
                </div>
            </div>

            <!-- Main Card -->
            <div class="bg-white/70 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 p-8 animate-slide-up">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl animate-bounce-in">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-green-800 font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Error Message -->
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl animate-bounce-in">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-red-800 font-medium">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ url('/attendance') }}" class="space-y-6">
                    @csrf
                    <!-- Input Container -->
                    <div class="relative">
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                id="nama"
                                placeholder="Ketik nama Anda..."
                                autocomplete="off"
                                class="w-full px-4 py-4 bg-white/50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-lg backdrop-blur-sm disabled:bg-gray-100 disabled:cursor-not-allowed"
                            />
                            <div class="absolute right-4 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                        <input type="hidden" name="participant_id" id="participant_id">

                        <!-- Dropdown Results -->
                        <div id="nama-list" class="absolute w-full bg-white/90 backdrop-blur-lg border border-gray-200 rounded-xl mt-2 max-h-60 overflow-auto shadow-xl z-20 hidden"></div>
                    </div>

                    <!-- Presensi Buttons -->
                    <div class="flex flex-col gap-4">
                        <!-- Tombol Presensi Pagi -->
                        <button id="btn-pagi" type="submit"
                            class="w-full py-4 px-6 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-xl font-semibold text-lg shadow-lg hover:from-yellow-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed hidden">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                Presensi Pagi
                            </span>
                        </button>

                        <!-- Tombol Presensi Siang -->
                        <button id="btn-siang" type="submit"
                            class="w-full py-4 px-6 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-xl font-semibold text-lg shadow-lg hover:from-blue-600 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed hidden">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                                </svg>
                                Presensi Siang
                            </span>
                        </button>
                    </div>

                    <!-- Inactive Time Message -->
                    <div id="inactive-message" class="hidden p-6 bg-gray-50 border border-gray-200 rounded-xl text-center">
                        <div class="text-gray-600">
                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Waktu Presensi Belum Aktif</h3>
                            <p class="text-sm text-gray-600 mb-4">Silakan kembali pada waktu yang telah ditentukan</p>
                            <div class="bg-white p-4 rounded-lg shadow-sm">
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div class="text-center">
                                        <div class="font-medium text-yellow-600">Presensi Pagi</div>
                                        <div class="text-gray-600">14:00 - 14:30</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="font-medium text-blue-600">Presensi Siang</div>
                                        <div class="text-gray-600">15:00 - 15:50</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="pt-4 border-t border-gray-200">
                        <button type="button"
                            onclick="window.history.back()"
                            class="w-full py-3 px-4 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-xl font-medium hover:from-gray-600 hover:to-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Kembali
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 text-gray-500 text-sm animate-fade-in">
                <p>© 2024 Sistem Presensi Digital</p>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            let typingTimer;
            let isParticipantSelected = false;

            // Enhanced search with debouncing
            $('#nama').on('input', function() {
                let query = $(this).val().trim();
                clearTimeout(typingTimer);

                if (!isParticipantSelected && query !== '') {
                    $('#participant_id').val('');
                }

                if (query.length >= 3) {
                    typingTimer = setTimeout(function() {
                        searchParticipant(query);
                    }, 300);
                } else {
                    $('#nama-list').addClass('hidden').empty();
                }
            });

            // Search function
            function searchParticipant(query) {
                $.get('/search-participant?q=' + query, function(data) {
                    let list = $('#nama-list').empty();
                    $('#nama-list').removeClass('hidden');

                    if (data.length > 0) {
                        data.forEach(function(item) {
                            list.append(`
                                <button type="button" class="w-full p-4 text-left border-b border-gray-100 hover:bg-blue-50 transition-colors duration-200 flex items-center justify-between group" data-id="${item.id}">
                                    <div>
                                        <div class="font-medium text-gray-900">${item.nama}</div>
                                        <div class="text-sm text-gray-500">${item.batch}</div>
                                    </div>
                                    <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            `);
                        });
                    } else {
                        list.html('<div class="p-4 text-red-600 text-center">Peserta tidak ditemukan</div>');
                    }
                });
            }

            // Handle participant selection
            $('#nama-list').on('click', 'button', function() {
                if ($(this).data('id')) {
                    const selectedText = $(this).find('.font-medium').text();
                    const selectedId = $(this).data('id');

                    $('#nama').val(selectedText);
                    $('#participant_id').val(selectedId);
                    $('#nama-list').addClass('hidden').empty();

                    isParticipantSelected = true;
                }
            });

            // Reset selection when user types again
            $('#nama').on('focus', function() {
                if (isParticipantSelected) {
                    isParticipantSelected = false;
                }
            });

            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#nama, #nama-list').length) {
                    $('#nama-list').addClass('hidden');
                }
            });
        });

        function checkPresensiTime() {
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const totalMinutes = hours * 60 + minutes;

            const pagiStart = 14 * 60;        // 14:00
            const pagiEnd = 14 * 60 + 30;     // 14:30
            const siangStart = 15 * 60;       // 15:00
            const siangEnd = 15 * 60 + 50;    // 15:50

            const btnPagi = document.getElementById('btn-pagi');
            const btnSiang = document.getElementById('btn-siang');
            const inputNama = document.getElementById('nama');
            const timeStatus = document.getElementById('time-status');
            const timeText = document.getElementById('time-text');
            const inactiveMessage = document.getElementById('inactive-message');

            // Reset semua
            btnPagi.classList.add('hidden');
            btnSiang.classList.add('hidden');
            btnPagi.disabled = true;
            btnSiang.disabled = true;
            inputNama.disabled = true;
            inputNama.classList.add('bg-gray-100', 'cursor-not-allowed');
            inactiveMessage.classList.remove('hidden');

            // Update time display
            const currentTime = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

            // Cek apakah dalam rentang pagi
            if (totalMinutes >= pagiStart && totalMinutes <= pagiEnd) {
                btnPagi.classList.remove('hidden');
                btnPagi.disabled = false;
                inputNama.disabled = false;
                inputNama.classList.remove('bg-gray-100', 'cursor-not-allowed');
                inactiveMessage.classList.add('hidden');

                timeStatus.className = 'mt-4 inline-flex items-center px-4 py-2 rounded-full text-sm font-medium shadow-lg bg-yellow-100 text-yellow-800 animate-pulse-glow';
                timeText.textContent = `Presensi Pagi Aktif - ${currentTime}`;
            }
            // Cek apakah dalam rentang siang
            else if (totalMinutes >= siangStart && totalMinutes <= siangEnd) {
                btnSiang.classList.remove('hidden');
                btnSiang.disabled = false;
                inputNama.disabled = false;
                inputNama.classList.remove('bg-gray-100', 'cursor-not-allowed');
                inactiveMessage.classList.add('hidden');

                timeStatus.className = 'mt-4 inline-flex items-center px-4 py-2 rounded-full text-sm font-medium shadow-lg bg-blue-100 text-blue-800 animate-pulse-glow';
                timeText.textContent = `Presensi Siang Aktif - ${currentTime}`;
            } else {
                timeStatus.className = 'mt-4 inline-flex items-center px-4 py-2 rounded-full text-sm font-medium shadow-lg bg-gray-100 text-gray-600';
                timeText.textContent = `Waktu Tidak Aktif - ${currentTime}`;
            }
        }

        // Jalankan saat halaman dimuat
        checkPresensiTime();

        // Cek ulang setiap menit
        setInterval(checkPresensiTime, 60000);
    </script>
</body>
</html>
