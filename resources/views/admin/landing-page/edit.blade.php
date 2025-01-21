@extends('admin.layouts.app')

@section('title')
    <title>Edit Landing Page - Admin Pusat Halal Salman ITB</title>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="p-4 md:ml-64">
        <!-- Top Bar -->
        <div class="flex items-center justify-between mb-4">
            <button @click="sidebarOpen = !sidebarOpen"
                class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Landing Page</h1>
        </div>

        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
                <button type="button" class="float-right" onclick="this.parentElement.remove()">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif

        <form action="{{ route('admin.landing-page.update') }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            @csrf
            @method('PUT')

            <!-- Hero Section -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Hero Section</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="hero_title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hero Title</label>
                            <input type="text" id="hero_title" name="hero_title"
                                value="{{ old('hero_title', $landingPage->hero_title) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('hero_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="hero_subtitle"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hero Subtitle</label>
                            <textarea id="hero_subtitle" name="hero_subtitle" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('hero_subtitle', $landingPage->hero_subtitle) }}</textarea>
                            @error('hero_subtitle')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="hero_image"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hero Image</label>
                            @if ($landingPage->hero_image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($landingPage->hero_image) }}" alt="Current Hero Image"
                                        class="w-full max-h-48 object-cover rounded-lg">
                                </div>
                            @endif
                            <input type="file" id="hero_image" name="hero_image"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            @error('hero_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Statistics -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Statistics</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="stats_clients"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lulusan Kuliah
                                    Halal</label>
                                <input type="number" id="stats_clients" name="stats_clients"
                                    value="{{ old('stats_clients', $landingPage->stats_clients) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                @error('stats_clients')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="stats_projects"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peserta
                                    JULEHA</label>
                                <input type="number" id="stats_projects" name="stats_projects"
                                    value="{{ old('stats_projects', $landingPage->stats_projects) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                @error('stats_projects')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="stats_partners"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UMKM
                                    Tersertifikasi</label>
                                <input type="number" id="stats_partners" name="stats_partners"
                                    value="{{ old('stats_partners', $landingPage->stats_partners) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                @error('stats_partners')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>


                    </div>


                </div>
            </div>

            <!-- About Section -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">About Section</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="about_title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About Title</label>
                            <input type="text" id="about_title" name="about_title"
                                value="{{ old('about_title', $landingPage->about_title) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('about_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="about_content"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About Content</label>
                            <textarea id="about_content" name="about_content" rows="6"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('about_content', $landingPage->about_content) }}</textarea>
                            @error('about_content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision & Mission -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Vision & Mission</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="vision_title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vision Title</label>
                            <input type="text" id="vision_title" name="vision_title"
                                value="{{ old('vision_title', $landingPage->vision_title) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('vision_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="vision_content"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vision Content</label>
                            <textarea id="vision_content" name="vision_content" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('vision_content', $landingPage->vision_content) }}</textarea>
                            @error('vision_content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="mission_title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mission Title</label>
                            <input type="text" id="mission_title" name="mission_title"
                                value="{{ old('mission_title', $landingPage->mission_title) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('mission_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="mission_content"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mission
                                Content</label>
                            <textarea id="mission_content" name="mission_content" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('mission_content', $landingPage->mission_content) }}</textarea>
                            @error('mission_content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>



            <!-- Contact Information -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Contact Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="contact_address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <textarea id="contact_address" name="contact_address" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('contact_address', $landingPage->contact_address ?? '') }}</textarea>
                            @error('contact_address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_phone"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                Number</label>
                            <input type="tel" id="contact_phone" name="contact_phone"
                                value="{{ old('contact_phone', $landingPage->contact_phone ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('contact_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="contact_email" name="contact_email"
                                value="{{ old('contact_email', $landingPage->contact_email ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('contact_email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_whatsapp"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WhatsApp
                                Number</label>
                            <input type="tel" id="contact_whatsapp" name="contact_whatsapp"
                                value="{{ old('contact_whatsapp', $landingPage->contact_whatsapp ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('contact_whatsapp')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Social Media</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="social_facebook"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook
                                URL</label>
                            <input type="url" id="social_facebook" name="social_facebook"
                                value="{{ old('social_facebook', $landingPage->social_facebook ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="https://facebook.com/yourusername">
                            @error('social_facebook')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="social_twitter"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter
                                URL</label>
                            <input type="url" id="social_twitter" name="social_twitter"
                                value="{{ old('social_twitter', $landingPage->social_twitter ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="https://twitter.com/yourusername">
                            @error('social_twitter')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="social_instagram"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram
                                URL</label>
                            <input type="url" id="social_instagram" name="social_instagram"
                                value="{{ old('social_instagram', $landingPage->social_instagram ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="https://instagram.com/yourusername">
                            @error('social_instagram')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="social_linkedin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Linkedin
                                URL</label>
                            <input type="url" id="social_linkedin" name="social_linkedin"
                                value="{{ old('social_linkedin', $landingPage->social_linkedin ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="https://youtube.com/yourchannel">
                            @error('social_linkedin')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer & SEO -->
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Footer & SEO</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="footer_description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Footer
                                Text</label>
                            <textarea id="footer_description" name="footer_description" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('footer_description', $landingPage->footer_description ?? '') }}</textarea>
                            @error('footer_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title"
                                value="{{ old('meta_title', $landingPage->meta_title ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @error('meta_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                                Description</label>
                            <textarea id="meta_description" name="meta_description" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">{{ old('meta_description', $landingPage->meta_description ?? '') }}</textarea>
                            @error('meta_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_keywords"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                                Keywords</label>
                            <input type="text" id="meta_keywords" name="meta_keywords"
                                value="{{ old('meta_keywords', $landingPage->meta_keywords ?? '') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primer-500 focus:border-primer-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="keyword1, keyword2, keyword3">
                            @error('meta_keywords')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Changes Button -->
            <div class="col-span-1 lg:col-span-2">
                <button type="submit"
                    class="w-full px-4 py-2 text-sm font-medium text-white bg-primer-600 rounded-lg hover:bg-primer-700 focus:ring-4 focus:ring-primer-300">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        /* Dark mode styles */
        .dark .prose {
            color: #e5e7eb;
        }

        .dark .prose h1,
        .dark .prose h2,
        .dark .prose h3,
        .dark .prose h4 {
            color: #f3f4f6;
        }
    </style>
@endpush
