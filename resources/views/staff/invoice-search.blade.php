@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        @php
            $url = url()->current();
            $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
        @endphp
        <x-dashboard.dashboard-header url="{{ $page }}" />
        <!-- end page title -->

        {{-- livewire staff component   --}}
        <livewire:staff.invoice-search />
    </div>
@endsection
