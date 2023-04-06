<div class="row">
    <!-- Modal -->
    <div class="modal fade" id="orderNote" tabindex="-1" role="dialog" aria-labelledby="newOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newOrderModalLabel">Order Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="">Order Note</label>
                            <textarea class="form-control" cols="30" rows="10" wire:model="order_note" disabled></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="datatable_length">
                    <label>Show
                        <select wire:model="per_page" name="datatable_length" aria-controls="datatable"
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
                <a type="button" href="{{ route('user.booking') }}" class="btn btn-secondary">New Order</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Branch</th>
                                <th>Order Date</th>
                                <th>Delivery Date</th>
                                <th>Pickup Date</th>
                                <th>Total Cost</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->count() > 0)
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->order_id }}</td>
                                        <td>
                                            @if ($branch = App\Models\Branch::find($order->branch_id))
                                                {{ $branch->name }}
                                            @else
                                                Unknown Branch
                                            @endif
                                        </td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>
                                            @if ($order->delivery_date == null)
                                                Pending
                                            @else
                                                {{ $order->delivery_date }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->pickup_date == null)
                                                Pending
                                            @else
                                                {{ $order->pickup_date }}
                                            @endif
                                        </td>
                                        <td>{{ $order->total_cost }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>
                                            <button type="button" wire:click="orderInfo({{ $order->order_id }})"> <i
                                                    class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11" style="text-align: center">
                                        No Item Found
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
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
@push('scripts')
    <script>
        window.addEventListener('show-order-info', event => {
            $('#orderNote').modal('show');
        });
    </script>
@endpush
