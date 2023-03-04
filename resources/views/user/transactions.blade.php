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
            <div class="col-12">
                <div class="card-box">
                    <h2>Recent Transactions</h2>
                    <p>View and manage your recent laundry transactions here. You can track the status of your current
                        orders and view details of past orders.</p>

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="datatable_length"><label>Show <select
                                            name="datatable_length" aria-controls="datatable"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="datatable"
                                        class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th>Transaction ID</th>
                                                <th>Date and Time</th>
                                                <th>Service Requested</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                                <th>Payment Method</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td>12345</td>
                                                <td>2023-03-01 08:30:00</td>
                                                <td>Wash & Fold</td>
                                                <td>10 lbs</td>
                                                <td>$20.00</td>
                                                <td>Credit Card</td>
                                                <td>Completed</td>
                                            </tr>
                                            <tr>
                                                <td>12346</td>
                                                <td>2023-02-27 10:00:00</td>
                                                <td>Dry Cleaning</td>
                                                <td>3 items</td>
                                                <td>$30.00</td>
                                                <td>Online Payment</td>
                                                <td>In Progress</td>
                                            </tr>
                                            <tr>
                                                <td>12347</td>
                                                <td>2023-02-24 15:30:00</td>
                                                <td>Wash & Iron</td>
                                                <td>5 shirts</td>
                                                <td>$15.00</td>
                                                <td>Cash</td>
                                                <td>Cancelled</td>
                                            </tr>
                                            <tr>
                                                <td>12347</td>
                                                <td>2023-02-24 15:30:00</td>
                                                <td>Wash & Iron</td>
                                                <td>5 shirts</td>
                                                <td>$15.00</td>
                                                <td>Cash</td>
                                                <td>Cancelled</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Pagination buttons -->
                                <div class="row flex-wrap">
                                    <div class="col-xl-6 col-md-6 d-flex justify-content-start flex-fill">
                                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                                            Showing 1 to 10
                                            of 57 entries</div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 d-flex justify-content-end flex-fill">
                                        <nav>
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
