<!-- start sidebar -->
<div id="sideBar"
    class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">

    <!-- sidebar content -->
    <div class="flex flex-col">

        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle text-red-500"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->

        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">Home</p>

        <a href="{{ route('front.index') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500"
            target="_blank">
            <i class="fad fa-home text-blue-500 text-xs mr-2"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.landing-page.edit') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-globe text-green-500 text-xs mr-2"></i>
            Landing Page
        </a>

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Contents</p>

        <a href="{{ route('admin.articles.index') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-newspaper text-yellow-500 text-xs mr-2"></i>
            Artikel
        </a>

        @role('superAdmin')
            <a href="{{ route('admin.videos.index') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-video text-pink-500 text-xs mr-2"></i>
                Video
            </a>

            <a href="{{ route('admin.regulations.index') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-file-alt text-red-500 text-xs mr-2"></i>
                Regulasi
            </a>

            <a href="{{ route('admin.abouts.index') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-info text-green-500 text-xs mr-2"></i>
                Tentang Kami
            </a>

            <a href="{{ route('admin.faqs.index') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-question-circle text-purple-500 text-xs mr-2"></i>
                FAQ
            </a>

            <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Program Layanan & Peserta</p>

            <a href="{{ route('admin.program-layanan.index') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-cogs text-blue-500 text-xs mr-2"></i>
                Program Layanan
            </a>

            <a href="{{ route('admin.participants.show') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-users text-green-500 text-xs mr-2"></i>
                Peserta Program
            </a>

            <a href="{{ route('admin.presensi.pilih') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-calendar-day text-red-500 text-xs mr-2"></i>
                Rekap Presensi Peserta
            </a>
        @endrole

        @hasanyrole('superAdmin|admin')
            <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Mitra dan Testimoni</p>

            <a href="{{ route('admin.partners.index') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-handshake text-orange-500 text-xs mr-2"></i>
                Mitra
            </a>
        @endhasanyrole

        @role('superAdmin')
            <a href="{{ route('admin.testimonials.index') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-comment-dots text-pink-500 text-xs mr-2"></i>
                Testimoni
            </a>

            <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">User Management</p>

            <a href="{{ route('admin.users.index') }}"
                class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
                <i class="fad fa-cog text-gray-500 text-xs mr-2"></i>
                User Management
            </a>
        @endrole

    </div>
    <!-- end sidebar content -->

</div>
<!-- end sidebar -->
