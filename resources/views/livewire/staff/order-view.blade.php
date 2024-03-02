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
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="text-center">
                                <h4>DEROYALCHOICELAUNDRY</h4>
                                <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe.
                                    344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos.</p>
                                <p><strong>Mobile:</strong>+234(818)529 8359, +234(810)978 7915, +234(704)552 9886</p>
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
                                                {{ '' }}
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
                                                    <td></td>
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
                </div>
            </div>
        </div>

    </div>
@endsection
