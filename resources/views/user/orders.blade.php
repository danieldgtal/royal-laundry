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

            <!-- Modal -->
            <div class="modal fade" id="newOrderModal" tabindex="-1" role="dialog" aria-labelledby="newOrderModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newOrderModalLabel">New Order Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="customerName">Customer Name</label>
                                    <input type="text" class="form-control" id="customerName"
                                        placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label for="customerEmail">Email address</label>
                                    <input type="email" class="form-control" id="customerEmail" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="serviceType">Service Type</label>
                                    <select class="form-control" id="serviceType">
                                        <option>Regular Washing</option>
                                        <option>Dry Cleaning</option>
                                        <option>Ironing</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="laundryItems">Laundry Items</label>
                                    <textarea class="form-control" id="laundryItems" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" id="quantity">
                                </div>
                                <div class="form-group">
                                    <label for="specialInstructions">Special Instructions</label>
                                    <textarea class="form-control" id="specialInstructions" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="pickupDate">Pick-up Date</label>
                                    <input type="date" class="form-control" id="pickupDate">
                                </div>
                                <div class="form-group">
                                    <label for="deliveryDate">Delivery Date</label>
                                    <input type="date" class="form-control" id="deliveryDate">
                                </div>
                                <div class="form-group">
                                    <label for="paymentAmount">Amount to be Paid</label>
                                    <input type="number" class="form-control" id="paymentAmount">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit Order</button>
                        </div>
                    </div>
                </div>
            </div>

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

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="">Order Table</h5>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newOrderModal">+
                            New
                            Order</button>
                    </div>
                    <div class="card-body">
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
                <!-- Pagination buttons -->
                <div class="row flex-wrap">
                    <div class="col-xl-6 col-md-6 d-flex justify-content-start flex-fill">
                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10
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
    <!-- Button to trigger modal -->



    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
