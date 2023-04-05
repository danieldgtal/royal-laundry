@extends('layouts.app')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        @php
            $url = url()->current();
            $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
        @endphp
        <x-dashboard.dashboard-header url="{{ $page }}" />
        <!-- end page title -->

        <livewire:notification />
        <!-- end col -->
    </div>
    </div>
    <!-- end row -->

    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
