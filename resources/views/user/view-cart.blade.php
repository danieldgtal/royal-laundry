@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        @php
            $url = url()->current();
            $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
        @endphp
        <x-dashboard.dashboard-header url="{{ $page }}" />
        <livewire:view-cart />
    </div>
    <!-- row -->
    </div>
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
