<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center">

    <div class="w-full max-w-lg p-8 bg-white shadow-lg rounded-lg border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Presensi Peserta</h2>

        @if(session('success'))
            <div class="alert alert-success text-green-600 bg-green-100 border border-green-300 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ url('/presensi') }}">
            @csrf
            <div class="relative mb-6">
                <input type="text" id="nama" class="w-full p-4 border rounded-lg border-gray-300 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 placeholder-gray-400" placeholder="Ketik Nama Anda Disini" autocomplete="off">
                <input type="hidden" name="participant_id" id="participant_id">
                <div id="nama-list" class="absolute w-full bg-white border rounded-lg mt-1 max-h-60 overflow-auto shadow-lg"></div>
            </div>

            <!-- Custom Alert with margin -->
            <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative hidden" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">Anda Tidak Terdaftar</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"></span>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none text-lg mt-4">Absen</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#nama').on('input', function() {
                let query = $(this).val();

                if (query.length >= 3) {
                    $.get('/search-participant?q=' + query, function(data) {
                        let list = $('#nama-list').empty();
                        if (data.length > 0) {
                            $('#error-message').addClass('hidden');
                            data.forEach(function(item) {
                                list.append(`<button type="button" class="w-full p-4 text-left border-b hover:bg-blue-100" data-id="${item.id}">${item.nama} - Batch ${item.batch}</button>`);
                            });
                        } else {
                            $('#error-message').removeClass('hidden');
                        }
                    });
                } else {
                    $('#nama-list').empty();
                    $('#error-message').addClass('hidden');
                }
            });

            $('#nama-list').on('click', 'button', function() {
                $('#nama').val($(this).text());
                $('#participant_id').val($(this).data('id'));
                $('#nama-list').empty();
            });

            // Close alert functionality
            $('#error-message').on('click', 'svg', function() {
                $('#error-message').addClass('hidden');
            });
        });
    </script>
</body>
</html>
