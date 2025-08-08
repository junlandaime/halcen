<x-guest-layout>
    <!-- Logo -->
    <div class="sm:mx-auto sm:w-full sm:max-w-sm mt-4">
        <a href="/">
            <img src="{{ asset('logohalcen.png') }}" alt="Logo Halal Center" class="mx-auto h-32 mt-4">
        </a>
    </div>

    <!-- Card -->
    <div class="w-full max-w-md mx-auto mt-6 bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">Verifikasi OTP</h2>

        <!-- QR Code -->
        <div class="flex justify-center mb-4">
            {!! $QR_Image !!}
        </div>

        <!-- Manual Code -->
        <p class="text-center text-sm text-gray-500 mb-4">
            Masukkan kode dari aplikasi autentikator Anda. <br>
            Manual code: <strong>{{ $secret }}</strong>
        </p>

        <!-- Form -->
        <form method="POST" action="{{ route('2fa.verify') }}">
            @csrf

            <div class="mb-4">
                <label for="one_time_password" class="block text-sm font-medium text-gray-700">Kode OTP</label>
                <input id="one_time_password" name="one_time_password" type="text" maxlength="6" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="123456">
                @error('one_time_password')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">
                Verifikasi
            </button>
        </form>
    </div>
</x-guest-layout>
