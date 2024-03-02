<div class="row">
    <!-- Order Modal -->
    <div wire:ignore.self class="modal fade" id="editOrderModal" tabindex="-1" role="dialog"
        aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Order Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateOrder">
                        <div class="form-group">
                            <label for="order-id">Order ID</label>
                            <input type="text" class="form-control" wire:model="order_id" disabled>
                        </div>
                        <div class="form-group">
                            <label for="customer-name">Customer Name</label>
                            <input type="text" class="form-control" wire:model="customer_name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="order-date">Order Date</label>
                            <input type="date" class="form-control" placeholder="mm/dd/yyyy"
                                data-date-autoclose="true" wire:model="order_date" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pickup-date">Pickup Date</label>
                            <input type="date" class="form-control" wire:model="pickup_date" placeholder="mm/dd/yyyy"
                                onchange="this.dispatchEvent(new InputEvent('input'))">
                            @error('pickup_date')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="delivery-date">Delivery Date</label>
                            <input type="date" class="form-control" placeholder="mm/dd/yyyy"
                                data-date-autoclose="true" onchange="this.dispatchEvent(new InputEvent('input'))"
                                wire:model="delivery_date">
                            @error('delivery_date')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="payment-status">Payment Status</label>
                            <select class="form-control" id="payment-status" wire:model="payment_status">
                                <option value="unpaid">unpaid</option>
                                <option value="paid">paid</option>
                            </select>
                            @error('payment_status')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="order-status">Order Status</label>
                            <select class="form-control" id="order-status" wire:model="order_status">
                                <option value="pending">pending</option>
                                <option value="processing">processing</option>
                                <option value="completed">completed</option>
                                <option value="cancelled">cancelled</option>
                            </select>
                            @error('order_status')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total-cost">Total Cost</label>
                            <input type="text" class="form-control" wire:model="total_cost" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Order Note</label>
                            <textarea rows="3" style="resize: none; width: 100%; height: 100px;" class="form-control" wire:model="order_note"></textarea>
                        </div>
                        @error('order_note')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                        @enderror
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="updateOrder">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Item Modal -->
    <div wire:ignore.self class="modal fade" id="addToInvoice" tabindex="-1" data-backdrop="static" role="dialog"
        data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addToInvoice">
                        <div class="formgroup">
                            <label for="invoiceId">Invoice ID: </label>
                            <input type="text" class="form-control" wire:model="invoice_id" disabled>
                            @error('invoice_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="item-category">Payment Method</label>
                                <select id="" class="form-control" wire:model="payment_method">
                                    <option value="">--Payment Method--</option>
                                    <option value="card">Card</option>
                                    <option value="cash">Cash</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                                @error('payment_method')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click="addToInvoice">Add Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">Order Management</h4>
            <p class="sub-header">
                Staff members can view and manage laundry orders placed by customers. This page typically displays a
                list of all active orders,including the OrderID customer name, order date and all other order
                information.
                This is a very critical section of the laundry management as it enables staff members to efficiently
                manage laundry orders, reduce errors, and provide a high level of service to customers.
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
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        @php
                            session(['ordersData' => $ordersData]);
                        @endphp
                        <div class="dt-buttons btn-group">
                            <a href="{{ route('export_orders_pdf') }}" target="_blank" type="button"
                                class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                type="button"><span>PDF</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="datatable-buttons_filter" class="dataTables_filter">
                            <label>Search:<input type="search" wire:model="search"
                                    class="form-control form-control-sm" placeholder=""
                                    aria-controls="datatable-buttons"></label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="form-group">
                        <div class="input-group date" id="fromDatepicker" data-target-input="nearest">
                            <label for="fromDate" class="pr-2">From: </label>
                            <input type="date" class="form-control datetimepicker-input"
                                data-target="#fromDatepicker" required wire:model="fromDate" />
                        </div>
                    </div>
                    <div class="form-group pr-2">
                        <div class="input-group date" id="toDatepicker" data-target-input="nearest">
                            <label for="fromDate" class="pl-2 pr-2">To: </label>
                            <input type="date" class="form-control datetimepicker-input"
                                data-target="#toDatepicker" name="toDate" required wire:model="toDate" />
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
                                                <button data-toggle="modal" data-target="#editOrderModal"
                                                    wire:click.prevent="editOrder({{ $order->order_id }})"><i
                                                        class="fa fa-edit"
                                                        style="font-size: 25px; margin-bottom: 4px;"></i>
                                                </button>

                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-dark dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a type="button" class="btn btn-dark dropdown-item"
                                                            wire:click="editInvoice({{ $order->order_id }})">
                                                            Issue Invoice
                                                        </a>
                                                        <a type="button" class="btn btn-dark dropdown-item"
                                                            wire:click="orderView({{ $order->order_id }})">
                                                            view Order
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No order Found</td>
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
        window.addEventListener('close-modal', event => {
            $('#editOrderModal').modal('hide');
            $('#addToInvoice').modal('hide');
        });
        window.addEventListener('show-edit-invoice-modal', event => {
            $('#addToInvoice').modal('show');
        })

        const script = @this.get('eventData');
        eval(script);
    </script>
@endpush
