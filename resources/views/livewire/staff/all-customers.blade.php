@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        @php
            $url = url()->current();
            $page = Str::ucfirst(parse_url($url, PHP_URL_PATH));
            
        @endphp
        <x-dashboard.dashboard-header url="{{ $page }}" />
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                //working on session for added user and listing all customers

            </div><!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
