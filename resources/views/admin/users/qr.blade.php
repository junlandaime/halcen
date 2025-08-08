@extends('template.layouts.index')

@section('title')
    <title>Setup 2FA - {{ $user->name }}</title>
@endsection

@section('content')
    <div class="p-6 md:ml-64">
        <h2 class="text-2xl font-semibold mb-4">
            Aktivasi 2-FA untuk {{ $user->email }}
        </h2>

        <p class="mb-4">
            Scan QR-Code di bawah dengan aplikasi authenticator (<em>Google Authenticator</em>, <em>Authy</em>, dll).
        </p>

        {{-- QR-Code --}}
        <div class="mb-6 flex justify-center">
            {!! $QR_Image !!}
        </div>

        <p class="text-sm mb-2">
            Jika tidak bisa memindai, masukkan kode manual berikut:
        </p>
        <code class="bg-gray-100 px-2 py-1 rounded text-sm">{{ $secret }}</code>

        <div class="mt-6">
            <a href="{{ route('admin.users.index') }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
                Kembali ke User List
            </a>
        </div>
    </div>
@endsection
