<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">Order Management</h4>
            <p class="sub-header">
                View all orders activities from either or all branches
            </p>

            @if (session()->has('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="datatable_length">
                            <label>Show
                                <select aria-controls="datatable" wire:model="per_page"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries</label>
                            @error('per_page')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label class="ml-3">Branch
                                <select aria-controls="datatable" wire:model="selectedBranch"
                                    class="custom-select custom-select-sm">
                                    <option value="all">All Branch</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach

                                </select>
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex">
                        @php
                            session(['ordersData' => $ordersData]);
                        @endphp
                        <a href="{{ route('orders_export_pdf') }}" target="_blank" type="button"
                            class="btn btn-secondary mb-1" tabindex="0" type="button">
                            <span>PDF</span>
                        </a>

                        <div id="datatable-buttons_filter" class="dataTables_filter ml-auto">
                            <label>Search:
                                <input type="search" wire:model="search" class="form-control form-control-sm"
                                    placeholder="" aria-controls="datatable-buttons">
                            </label>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Order Date</th>
                                    <th>Pickup Date</th>
                                    <th>Delivery Date</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Total Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($orders->count() > 0)
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->order_date }}</td>
                                            <td>{{ $order->pickup_date }}</td>
                                            <td>{{ $order->delivery_date }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <td>{{ $order->order_status }}</td>
                                            <td>&#8358;{{ $order->total_cost }}</td>
                                            <td>
                                                <button type="button" class="btn btn-dark btn-sm"
                                                    wire:click="orderView({{ $order->order_id }})">
                                                    view</button>
                                                <button class="btn btn-danger btn-sm"
                                                    wire:click="orderDelete({{ $order->order_id }})">delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">No order found</td>
                                    </tr>
                                @endif
                                <!-- more rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination buttons -->
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                            Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }}
                            entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="d-flex justiy-content-center flex-wrap">
                            {{ $orders->links('vendor.livewire.bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('show-delete-alert', event => {
            $('#sa-warning').modal('show');
        });
    </script>
    <!--Sweet alert delete script -->
    <script>
        window.addEventListener('show-delete-alert', event => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteItemData')
                } else {
                    // Swal.close();
                }
            })
        })

        window.addEventListener('itemDeleted', event => {
            Swal.fire(
                'Deleted',
                'Order has been deleted',
                'success',
            )
        })
    </script>
@endpush
