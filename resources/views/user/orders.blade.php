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

        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="datatable_length">
                            <label>Show
                                <select name="datatable_length" aria-controls="datatable"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries
                            </label>
                        </div>

                    </div>

                </div>
                <div class="card">


                    <h5 class="card-header">Order Table</h5>

                    <div class="card-body">
                        <button type="button" class="btn btn-primary waves-effect waves-light float-right">+ New
                            Order</button>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer ID</th>
                                        <th>Order Date</th>
                                        <th>Pickup Date</th>
                                        <th>Delivery Date</th>
                                        <th>Items in Order</th>
                                        <th>Quantity</th>
                                        <th>Total Cost</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>001</td>
                                        <td>101</td>
                                        <td>2023-02-28</td>
                                        <td>2023-03-01</td>
                                        <td>2023-03-02</td>
                                        <td>Shirts, Pants, Sheets</td>
                                        <td>5, 3, 2</td>
                                        <td>$50.00</td>
                                        <td>Paid</td>
                                        <td>Completed</td>
                                    </tr>
                                    <tr>
                                        <td>002</td>
                                        <td>102</td>
                                        <td>2023-03-01</td>
                                        <td>2023-03-03</td>
                                        <td>2023-03-05</td>
                                        <td>Shirts, Jackets, Towels</td>
                                        <td>4, 2, 6</td>
                                        <td>$75.00</td>
                                        <td>Pending</td>
                                        <td>In Progress</td>
                                    </tr>
                                    <tr>
                                        <td>003</td>
                                        <td>103</td>
                                        <td>2023-03-02</td>
                                        <td>2023-03-04</td>
                                        <td></td>
                                        <td>Pants, Dresses, Blouses</td>
                                        <td>3, 2, 4</td>
                                        <td>$60.00</td>
                                        <td>Unpaid</td>
                                        <td>Pending</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="selection-datatable_info" role="status" aria-live="polite">Showing
                            1
                            to 10 of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="selection-datatable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="selection-datatable_previous"><a
                                        href="#" aria-controls="selection-datatable" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#"
                                        aria-controls="selection-datatable" data-dt-idx="1" tabindex="0"
                                        class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable"
                                        data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable"
                                        data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable"
                                        data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable"
                                        data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable"
                                        data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="selection-datatable_next"><a href="#"
                                        aria-controls="selection-datatable" data-dt-idx="7" tabindex="0"
                                        class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
    <!-- end container-fluid -->
@endsection
