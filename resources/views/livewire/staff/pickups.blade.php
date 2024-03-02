<div class="row">
    <!-- View Pickup Modal -->
    <div wire:ignore.self class="modal fade" id="pickupModal" tabindex="-1" role="dialog"
        aria-labelledby="newOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pickupModal">Pickup Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updatePickupStatus">
                        <div class="text-center">
                            <label for="">Pickup Status</label>
                            <h5>
                                <span wire:model="pickup_status"
                                    class="badge {{ $pickup_status == 'pending' ? 'bg-warning' : ($pickup_status == 'completed' ? 'bg-success' : ($pickup_status == 'cancelled' ? 'bg-danger' : 'bg-secondary')) }}">
                                    {{ $pickup_status == 'pending' ? 'pending' : ($pickup_status == 'completed' ? 'completed' : ($pickup_status == 'cancelled' ? 'cancelled' : 'unknown')) }}
                                </span>
                            </h5>

                        </div>
                        <div class="form-group row">

                            <div class="col-6">

                                <label for="customerName">Customer Firstname:</label>
                                <input type="text" wire:model="customer_firstname" class="form-control" disabled>
                            </div>
                            <div class="col-6">
                                <label for="customerName">Customer LastName:</label>
                                <input type="text" id="" wire:model="customer_lastname" class="form-control"
                                    disabled>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="customerEmail">Phone:</label>
                                <input type="text" class="form-control" wire:model="customer_phone" disabled>
                            </div>
                            <div class="col-6">
                                <label for="customerEmail">City:</label>
                                <input type="text" class="form-control" id="" wire:model="customer_city"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="serviceType">Pickup Date</label>
                            <input type="text" class="form-control" value="" wire:model="pickup_date" disabled>
                        </div>
                        <div class="form-group row">
                            <div class="div col-6">
                                <label for="quantity">Address</label>
                                <textarea rows="3" class="form-control" wire:model="customer_address" disabled></textarea>
                            </div>
                            <div class="div col-6">
                                <label for="quantity">Pickup Note</label>
                                <textarea rows="3" class="form-control" wire:model="pickup_note" disabled></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="laundryItems">Pickup Status</label>
                                <select class="form-control" wire:model="u_pickup_status">
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" wire:click="updatePickupStatus">Update
                            Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">Pickup/Drops Management</h4>
            <p class="sub-header">
                Staff Members can view the details of each and every pickup
                request, such as customers name, address, requested pickup time.
                Staffs can update the status of pickups as they are completed.
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
                            session(['pickupData' => $pickupData]);
                        @endphp
                        <div class="dt-buttons btn-group">
                            <a href="{{ route('export_pickup_pdf') }}" target="_blank" type="button"
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
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="datatable-buttons"
                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                            style="
                                  border-collapse: collapse;
                                  border-spacing: 0px;
                                  width: 100%;
                              "
                            role="grid" aria-describedby="datatable-buttons_info">
                            <thead>
                                <tr role="row">
                                    <th>
                                        Pickup ID
                                    </th>
                                    <th>
                                        Customer FName
                                    </th>
                                    <th>
                                        Customer LName
                                    </th>
                                    <th>
                                        Pickup Date
                                    </th>
                                    <th>
                                        Pickup Status
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($items->count() > 0)
                                    @foreach ($items as $item)
                                        <tr role="row">
                                            <td tabindex="0">
                                                {{ $item->pickup_id }}
                                            </td>
                                            <td>
                                                @php
                                                    $customer = DB::table('customers')
                                                        ->select('firstname', 'lastname')
                                                        ->where('customer_id', $item->user_id)
                                                        ->first();
                                                @endphp
                                                {{ $customer->firstname }}
                                            </td>
                                            <td>{{ $customer->lastname }}</td>
                                            <td>{{ $item->pickup_date }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->pickup_status == 'pending' ? 'bg-warning' : ($item->pickup_status == 'completed' ? 'bg-success' : ($item->pickup_status == 'cancelled' ? 'bg-danger' : 'bg-secondary')) }}">
                                                    {{ $item->pickup_status }}
                                                </span>
                                            </td>
                                            <td>
                                                <button class="btn btn-light waves-effect"
                                                    wire:click.prevent="viewPickUpModal({{ $item->id }})"><i
                                                        class="fa fa-eye"></i></button>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center">
                                            No Item Found
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                            Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }}
                            entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="d-flex justiy-content-center flex-wrap">
                            {{ $items->links('vendor.livewire.bootstrap') }}
                        </div>
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
            $('#pickupModal').modal('hide');
        })
        window.addEventListener('show-view-order-modal', event => {
            $('#pickupModal').modal('show');
        })
    </script>
@endpush
