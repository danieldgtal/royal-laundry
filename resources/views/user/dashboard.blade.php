@extends('layouts.app')

@section('content')
    <style>
        .div-hover:hover {
            background-color: #f2f0f0
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

            {{-- <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-two">
                    <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
                    <h6 class="text-muted text-uppercase mt-0">Revenue</h6>
                    <h3 class="mb-4"><span data-plugin="counterup">459</span></h3>

                </div>
            </div> --}}

        </div>

        <!-- end row -->


        <div class="row">
            <div class="col-xl-6">
                <div class="card-box">
                    <h4 class="header-title mb-3">Inbox</h4>

                    <div class="inbox-widget slimscroll" style="max-height: 324px;">
                        <a href="#">
                            <div class="inbox-item div-hover">
                                <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg"
                                        class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Chadengle</p>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <p class="inbox-item-date">13:40 PM</p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item div-hover">
                                <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg"
                                        class="rounded-circle" alt=""></div>
                                <p class="inbox-item-author">Tomaslau</p>
                                <p class="inbox-item-text text-truncate">Welcome to Royalchoice Laundry...</p>
                                <p class="inbox-item-date">13:34 PM</p>
                            </div>
                        </a>

                    </div>

                </div>
            </div><!-- end col-->

            <div class="col-xl-6">
                <div class="card-box">

                    <h4 class="header-title mb-3">Last 5 Order Summary</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Branch</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-muted">Amuwo Odofin</th>
                                    <td>20/02/2014</td>
                                    <td>19/02/2020</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Lekki.</th>
                                    <td>20/02/2014</td>
                                    <td>19/02/2020</td>
                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Amuwo Odofin.</th>
                                    <td>20/02/2014</td>
                                    <td>19/02/2020</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Lekki</th>
                                    <td>20/02/2014</td>
                                    <td>19/02/2020</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Lekki</th>
                                    <td>20/02/2014</td>
                                    <td>19/02/2020</td>
                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end col-->

        </div>
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
