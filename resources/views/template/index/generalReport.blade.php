@extends('template.layouts.index')

@section('title')
    Dashboard - Admin Pusat Halal Salman ITB
@endsection

@section('content')
    @php
        $disableOverflowHidden = true;
    @endphp
    <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">

        <!-- Total Program Layanan -->
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-blue-500 fad fa-certificate"></div>
                    </div>
                    <div class="mt-8">
                        <h1 class="h5">{{ $stats['total_certifications'] }}</h1>
                        <p>Total Program Layanan</p>
                    </div>
                </div>
            </div>
            <div class="footer bg-teal-400 p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>

        <!-- Total Mitra -->
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-green-500 fad fa-users"></div>
                    </div>
                    <div class="mt-8">
                        <h1 class="h5">{{ $stats['total_clients'] }}</h1>
                        <p>Total Mitra</p>
                    </div>
                </div>
            </div>
            <div class="footer bg-teal-400 p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>

        <!-- Total Artikel -->
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-yellow-500 fad fa-newspaper"></div>
                    </div>
                    <div class="mt-8">
                        <h1 class="h5">{{ $stats['total_articles'] }}</h1>
                        <p>Total Artikel</p>
                    </div>
                </div>
            </div>
            <div class="footer bg-teal-400 p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>

        <!-- Total User -->
        <div class="report-card">
            <div class="card">
                <div class="card-body flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <div class="h6 text-teal-500 fad fa-user"></div>
                    </div>
                    <div class="mt-8">
                        <h1 class="h5">{{ $stats['total_users'] }}</h1>
                        <p>Total User</p>
                    </div>
                </div>
            </div>
            <div class="footer bg-teal-400 p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
        </div>
    </div>
    <!-- strat Analytics -->
    @include('template.index.analytics-1')
    <!-- end Analytics -->

    <!-- Sales Overview -->
    @include('template.index.salesOverview')
    <!-- end Sales Overview -->

    <!-- start numbers -->
    @include('template.index.numbers')
    <!-- end nmbers -->

    <!-- start quick Info -->
    @include('template.index.quickInfo')
    <!-- end quick Info -->
@endsection
