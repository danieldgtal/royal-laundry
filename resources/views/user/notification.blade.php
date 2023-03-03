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

        <div class="row">

            <div class="card-box">

                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Order #1234</h5>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <small class="text-muted">Sent by Staff Member</small><br>
                            <small class="text-muted">March 2, 2023 at 10:30am</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula,
                        turpis vitae sagittis vulputate, quam nunc molestie mauris, quis rhoncus magna lacus ac est.
                        Phasellus mollis posuere ligula vel consectetur.</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Branch: My Branch Name</h6>
                            <p>Order Status: Pending</p>
                            <h6>Order Info</h6>
                            <p>Customer Name: Jane Smith<br>Delivery Date: March 5, 2023</p>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <h6>Staff Info</h6>
                            <p>Name: John Doe<br>Position: Staff Member</p>
                            <h6>Delivery Info</h6>
                            <p>Delivery Address: 123 Main St.<br>Delivery Time: 3:00pm</p>
                        </div>
                    </div>

                </div>

            </div>
            <nav aria-label="Message pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>
        <!-- end col -->
    </div>
    </div>
    <!-- end row -->

    <!-- end container-fluid -->
@endsection
