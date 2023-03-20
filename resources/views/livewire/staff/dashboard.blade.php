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
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-two">
                    <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
                    <h6 class="text-muted text-uppercase mt-0">All Orders</h6>
                    <h3 class="mb-4"><span data-plugin="counterup">300</span></h3>

                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-two">
                    <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
                    <h6 class="text-muted text-uppercase mt-0">Pending Orders</h6>
                    <h3 class="mb-4"><span data-plugin="counterup">22</span></h3>

                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-two">
                    <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
                    <h6 class="text-muted text-uppercase mt-0">Completed Orders</h6>
                    <h3 class="mb-4" data-plugin="counterup">74</h3>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-two">
                    <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
                    <h6 class="text-muted text-uppercase mt-0">Pending Pickups</h6>
                    <h3 class="mb-4" data-plugin="counterup">74</h3>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
