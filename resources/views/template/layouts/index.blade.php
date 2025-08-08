<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/template/style.css', 'resources/js/template/scripts.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>@yield('title')</title>
    @stack('styles')
    <style>
        .datatable-pagination {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
        }

        .datatable-pagination-list {
            display: flex;
            align-items: center;
            font-size: 0.875rem;
            height: 2rem;
            margin-left: -1px;
        }

        .datatable-pagination-list-item {
            display: flex;
        }

        .datatable-pagination-list-item-link {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 0.75rem;
            padding-right: 0.75rem;
            height: 2rem;
            line-height: 2rem;
            color: #6B7280;
            /* text-gray-500 */
            background-color: white;
            border: 1px solid #D1D5DB;
            /* border-gray-300 */
        }

        .datatable-pagination-list-item-link:hover {
            background-color: #F3F4F6;
            /* bg-gray-100 */
            color: #374151;
            /* text-gray-700 */
        }

        .datatable-pagination-list-item.datatable-active .datatable-pagination-list-item-link {
            z-index: 10;
            color: #2563EB;
            /* text-blue-600 */
            border-color: #93C5FD;
            /* border-blue-300 */
            background-color: #EFF6FF;
            /* bg-blue-50 */
        }

        .datatable-pagination-list-item:first-child .datatable-pagination-list-item-link {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .datatable-pagination-list-item:last-child .datatable-pagination-list-item-link {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        .datatable-pagination-list-item.datatable-disabled .datatable-pagination-list-item-link {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    @include('template.base.navbar')

    <!-- strat wrapper -->
    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md">
            @include('template.base.sidebar')
        </div>

        <!-- Main Content (scrollable only this part) -->
        <div class="flex-1 overflow-y-auto p-6 bg-gray-100">
            @yield('content')
        </div>
    </div>
    <!-- end wrapper -->

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    @stack('scripts')
</body>

</html>
