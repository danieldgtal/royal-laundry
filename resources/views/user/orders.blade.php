@extends('layouts.app')

@section('content')
    <style>
        .div-hover:hover {
            background-color: #d3d3d3
        }
    </style>
    <div class="container-fluid">

        <!-- start page title -->
        @php
            $url = url()->current();
            $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
        @endphp
        <x-dashboard.dashboard-header url="{{ $page }}" />

        <!-- end page title -->
        <livewire:user-orders />
    </div>


    <!-- Button to trigger modal -->
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
