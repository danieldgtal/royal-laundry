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

            <!-- Item drop off modal -->
            <div class="modal fade" id="itemDropOffModal" tabindex="-1" role="dialog" aria-labelledby="itemDropOffModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="itemDropOffModalLabel">Item Drop Off</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="customerName">Customer Name</label>
                                    <input type="text" class="form-control" id="customerName"
                                        placeholder="Enter customer name">
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Contact Number</label>
                                    <input type="text" class="form-control" id="contactNumber"
                                        placeholder="Enter contact number">
                                </div>
                                <div class="form-group">
                                    <label for="laundryItems">Laundry Items</label>
                                    <textarea class="form-control" id="laundryItems" rows="3"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item pick up table -->
            <div class="card">
                <h5 class="card-header">Item Pick Up</h5>
                <!-- Button trigger modal for item drop off -->

                <div class="card-body">
                    <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                        data-target="#itemDropOffModal">
                        + Item Drop Off
                    </button>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>OrderId</th>
                                    <th>Drop Off Date/Time</th>
                                    <th>Customer Name</th>
                                    <th>Items</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>#845983</td>
                                    <td>2023-03-03 08:00 AM</td>
                                    <td>John Doe</td>
                                    <td>3 shirts, 2 pants</td>
                                    <td>Awaiting Pickup</td>
                                    <td><button class="btn btn-primary">Pickup</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>#845983</td>
                                    <td>2023-03-03 08:00 AM</td>
                                    <td>Jane Doe</td>
                                    <td>2 dresses</td>
                                    <td>Completed</td>
                                    <td>N/A</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>#845983</td>
                                    <td>2023-03-04 09:00 AM</td>
                                    <td>Mike Smith</td>
                                    <td>1 suit, 3 shirts, 2 pants</td>
                                    <td>Drop Off Today</td>
                                    <td>N/A</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination buttons -->
                    <div class="row flex-wrap">
                        <div class="col-xl-6 col-md-6 d-flex justify-content-start flex-fill">
                            <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to
                                10
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
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
