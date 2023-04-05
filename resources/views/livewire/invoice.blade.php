<div class="row">
    <div class="col-12">
        <div class="card-box">
            @if ($order)
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="float-sm-left">
                            <h4 class="text-uppercase mt-0">
                                DeRoyalChoice
                            </h4>
                        </div>
                        <div class="float-sm-right mt-4 mt-sm-0">
                            <h5>
                                {{ $order->order_id }}
                                <br />
                            </h5>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-12">
                            <div class="float-sm-left mt-4">
                                <address>
                                    <strong>
                                        @if ($customer->address)
                                            {{ $customer->address }}
                                        @else
                                            {{ 'No Address Found' }}
                                        @endif
                                    </strong>
                                    <br>
                                    <abbr title="Phone">Phone :</abbr>
                                    {{ $customer->phone }}
                                    <br>
                                    <strong>
                                        Branch: {{ $branch->name }}
                                    </strong>
                                    <br>
                                    <strong>
                                        Name: {{ $customer->firstname . ' ' . $customer->lastname }}
                                    </strong>
                                </address>

                                <div class="row ">

                                    <address class="col-6">
                                        <h4>Account Details</h4>
                                        <h6>Number: 1013164662</h6>
                                        <h6>Name: Deroyal Choice Drycleaner</h6>
                                        <h6>Bank: Zenith Bank</h6>
                                    </address>

                                    <address class="col-6 ">
                                        <h4>Account Details</h4>
                                        <h6>Number: 0049000828</h6>
                                        <h6>Name: Akande Buli</h6>
                                        <h6>Bank: Access Bank</h6>
                                    </address>

                                </div>
                            </div>
                            <div class="mt-4 text-sm-right">
                                <p>
                                    <strong>Order Date:
                                    </strong>
                                    {{ $order->order_date }}
                                </p>
                                @php
                                    $status = $order->order_status;
                                    // Map the status to a Bootstrap class
                                    switch ($status) {
                                        case 'pending':
                                            $class = 'badge-secondary';
                                            $text = 'Pending';
                                            break;
                                        case 'completed':
                                            $class = 'badge-success';
                                            $text = 'Completed';
                                            break;
                                        case 'processing':
                                            $class = 'badge-warning';
                                            $text = 'Processing';
                                            break;
                                        case 'cancelled':
                                            $class = 'badge-danger';
                                            $text = 'Cancelled';
                                            break;
                                        default:
                                            $class = 'badge-secondary';
                                            $text = 'Unknown';
                                    }
                                    
                                @endphp
                                <p>
                                    <strong>Order Status:
                                    </strong>
                                    <span class="badge {{ $class }}">{{ $order->order_status }}</span>
                                </p>
                                <p>
                                    <strong>Order ID:
                                    </strong>
                                    #{{ $order->order_id }}
                                </p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th>
                                                Package Unit
                                            </th>
                                            <th>
                                                Subtotal
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (json_decode($order->items) as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td>{{ $item->product->name }}</td>
                                                <td>&#8358;{{ $item->price }}</td>
                                                <td>
                                                    {{ $item->quantity }}
                                                </td>
                                                <td>{{ $item->product->package_unit }}</td>
                                                <td>&#8358;{{ $item->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix mt-5">
                                <h5 class="small">
                                    <b>PAYMENT TERMS AND
                                        POLICIES</b>
                                </h5>

                                <small class="text-muted">
                                    All orders are only validated upon receiving of
                                    payment by our staff. Submit order and proceed to make
                                    a transfer to the account above or contact any of our staff for more info.
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-right mt-4">
                                <p>
                                    <b>Sub-total:</b>
                                    {{ $order->total_cost }}
                                </p>
                                {{-- <p>Discout: 12.9%</p> --}}
                                <p>VAT: 0.00%</p>
                                <hr />
                                <h3>&#8358; {{ $order->total_cost }}</h3>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="d-print-none">
                        <div class="float-right">
                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i
                                    class="fa fa-print"></i></a>
                            <a wire:click="forgetSession({{ $order->order_id }})"
                                class="btn btn-primary waves-effect waves-light">Submit</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @else
                <div>Invoice is empty</div>
            @endif

        </div>
    </div>
</div>
