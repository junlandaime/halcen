@extends('admin.layouts.app')

@section('title')
    <title>Pengaturan - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
<!-- Main Content -->
<div class="p-4 md:ml-64">
    <!-- Top Bar -->
    <div class="flex items-center justify-between mb-4">
        <button @click="sidebarOpen = !sidebarOpen" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
        <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Pengaturan</h1>
    </div>

    <!-- Settings Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- General Settings -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pengaturan Umum</h2>
                <form action="#" method="POST">
                    <div class="space-y-4">
                        <!-- Site Title -->
                        <div>
                            <label for="site-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Website</label>
                            <input type="text" id="site-title" name="site-title" value="Pusat Halal Salman ITB" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>

                        <!-- Site Description -->
                        <div>
                            <label for="site-description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Website</label>
                            <textarea id="site-description" name="site-description" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">Pusat Kajian Halal Salman ITB adalah lembaga yang bergerak dalam bidang sertifikasi halal dan edukasi halal di Indonesia.</textarea>
                        </div>

                        <!-- Timezone -->
                        <div>
                            <label for="timezone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zona Waktu</label>
                            <select id="timezone" name="timezone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="Asia/Jakarta">Asia/Jakarta (WIB)</option>
                                <option value="Asia/Makassar">Asia/Makassar (WITA)</option>
                                <option value="Asia/Jayapura">Asia/Jayapura (WIT)</option>
                            </select>
                        </div>

                        <!-- Date Format -->
                        <div>
                            <label for="date-format" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Format Tanggal</label>
                            <select id="date-format" name="date-format" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <option value="d/m/Y">DD/MM/YYYY</option>
                                <option value="Y-m-d">YYYY-MM-DD</option>
                                <option value="d F Y">DD Month YYYY</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Email Settings -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pengaturan Email</h2>
                <form action="#" method="POST">
                    <div class="space-y-4">
                        <!-- SMTP Host -->
                        <div>
                            <label for="smtp-host" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SMTP Host</label>
                            <input type="text" id="smtp-host" name="smtp-host" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="smtp.example.com">
                        </div>

                        <!-- SMTP Port -->
                        <div>
                            <label for="smtp-port" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SMTP Port</label>
                            <input type="number" id="smtp-port" name="smtp-port" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="587">
                        </div>

                        <!-- SMTP Username -->
                        <div>
                            <label for="smtp-username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SMTP Username</label>
                            <input type="text" id="smtp-username" name="smtp-username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="username@example.com">
                        </div>

                        <!-- SMTP Password -->
                        <div>
                            <label for="smtp-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SMTP Password</label>
                            <input type="password" id="smtp-password" name="smtp-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="••••••••">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Social Media Settings -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Media Sosial</h2>
                <form action="#" method="POST">
                    <div class="space-y-4">
                        <!-- Facebook -->
                        <div>
                            <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                            <input type="url" id="facebook" name="facebook" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://facebook.com/username">
                        </div>

                        <!-- Instagram -->
                        <div>
                            <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                            <input type="url" id="instagram" name="instagram" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://instagram.com/username">
                        </div>

                        <!-- Twitter -->
                        <div>
                            <label for="twitter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter</label>
                            <input type="url" id="twitter" name="twitter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://twitter.com/username">
                        </div>

                        <!-- YouTube -->
                        <div>
                            <label for="youtube" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">YouTube</label>
                            <input type="url" id="youtube" name="youtube" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://youtube.com/channel">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- API Settings -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pengaturan API</h2>
                <form action="#" method="POST">
                    <div class="space-y-4">
                        <!-- API Key -->
                        <div>
                            <label for="api-key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">API Key</label>
                            <div class="flex">
                                <input type="text" id="api-key" name="api-key" value="sk_test_51KjH2..." readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <button type="button" class="px-4 py-2.5 text-sm font-medium text-white bg-primer-600 rounded-r-lg border border-primer-600 hover:bg-primer-700 focus:ring-4 focus:outline-none focus:ring-primer-300 dark:bg-primer-600 dark:hover:bg-primer-700 dark:focus:ring-primer-800">
                                    Regenerate
                                </button>
                            </div>
                        </div>

                        <!-- Webhook URL -->
                        <div>
                            <label for="webhook-url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Webhook URL</label>
                            <input type="url" id="webhook-url" name="webhook-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="https://your-domain.com/webhook">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <div class="mt-6 flex justify-end">
        <button type="submit" class="text-white bg-primer-600 hover:bg-primer-700 focus:ring-4 focus:ring-primer-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primer-600 dark:hover:bg-primer-700 focus:outline-none dark:focus:ring-primer-800">
            Simpan Pengaturan
        </button>
    </div>
</div>

@endsection

@push('scripts')

@endpush
