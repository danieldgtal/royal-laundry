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
        <div class="row" id="print-area">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-12 print-out">
                            @if ($invoice)
                                <div class="clearfix">
                                    <div class="text-center">
                                        <img src="{{ asset('dashboard/assets/images/logo.png') }}" alt=""
                                            class="mx-auto mb-1">
                                        <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe.</p>

                                        <p>344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos.</p>

                                        <p>
                                            <strong>Mobile:</strong>+234(818)529 8359, +234(810)978 7915, +234(704)552 9886
                                        </p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="clearfix">
                                        <div class="text-center">
                                            <a href="https://deroyalchoiceng.com" target="_blank" class="text-dark"><strong>
                                                    www.deroyalchoiceng.com</strong></a>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-sm-left mt-4">
                                                <address>
                                                    <strong>Payment Status:</strong>
                                                    @if ($invoice->balance_amount > 0)
                                                        <p style="color:red;">Balance: {{ $invoice->balance_amount }}
                                                        </p>
                                                    @else
                                                        <p style="color:green;">Full Payment Received</p>
                                                    @endif
                                                    <br>
                                                    <strong>
                                                        Branch:
                                                        {{ $branch->name }}

                                                    </strong>
                                                    <br>
                                                    <strong>
                                                        Customer Name:
                                                        {{ isset($invoice->customer_name) ? $invoice->customer_name : '' }}
                                                    </strong>
                                                </address>
                                            </div>
                                            <div class="mt-4 text-sm-right">
                                                <p>
                                                    <strong>invoice Date:
                                                        {{ $invoice->invoice_date }}
                                                    </strong>
                                                </p>
                                                <p>
                                                    <strong>invoice ID:

                                                        #{{ $invoice->invoice_id }}
                                                    </strong>
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
                                                            <th>Name</th>
                                                            <th>
                                                                Total Qty
                                                            </th>
                                                            <th>
                                                                Subtotal
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (json_decode($invoice->items) as $item)
                                                            <tr>
                                                                <td>{{ $item->product->name }}</td>

                                                                <td>{{ $item->quantity * $item->product->package_unit }}
                                                                </td>
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
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-right mt-4 mr-4">
                                                <p>
                                                    <b>Sub-total:</b>
                                                    <strong> {{ $invoice->total_cost }}</strong>
                                                </p>
                                                @php
                                                    $items = json_decode($invoice->items, true);
                                                    $total_quantity = 0;
                                                    foreach ($items as $item) {
                                                        $quantity = $item['quantity'] * $item['package_unit'];
                                                        $total_quantity += $quantity;
                                                    }
                                                @endphp
                                                <p><strong>Total Qty: {{ $total_quantity }} pc(s)</strong></p>
                                                <p><strong> VAT: 0.00%</strong></p>
                                                <hr />
                                                <h3>&#8358; {{ $invoice->total_cost }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <p>Thank You very much! Pls come again!!! <br>
                                            ---Business Hour--- <br>
                                            Mon-Fri 8:00am - 6pm <br>
                                            Sat 8:00am - 5pm <br>
                                        </p>
                                    </div>
                                    <hr />
                                    <div class="table-responsive mt-4 pt-3 exclude-me">
                                        <table class="table table-bordered">
                                            <thead class="d-print-none">
                                                <tr>
                                                    <th>Item count & Id</th>
                                                    <th>Invoice Date</th>
                                                    <th>Invoice & Customer Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $items = json_decode($invoice->items, true);
                                                    $total_quantity = 0;
                                                    foreach ($items as $item) {
                                                        $quantity = $item['quantity'] * $item['package_unit'];
                                                        $total_quantity += $quantity;
                                                    }
                                                @endphp
                                                @if ($total_quantity > 0)
                                                    @foreach (range(1, $total_quantity) as $count)
                                                        <tr>
                                                            <td>{{ $invoice->invoice_id }} <br>
                                                                {{ $count }} of {{ $total_quantity }}
                                                            </td>
                                                            <td>{{ $invoice->order_date }}</td>
                                                            <td>
                                                                {{ $invoice->invoice_id }} <br>
                                                                {{ $invoice->customer_name }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    {{ '' }}
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-left">
                                        @if ($invoice->side_note)
                                            <p>
                                                <strong>
                                                    {{ $invoice->side_note }}
                                                </strong>
                                            </p>
                                        @endif
                                    </div>

                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="{{ route('staff_receipt') }}" target="_blank"
                                                class="btn btn-dark waves-effect waves-light"><i
                                                    class="fa fa-print"></i></a>
                                            @php
                                                session(['sessionData' => $invoice]);
                                            @endphp
                                            <a href="{{ route('customer_receipt') }}" target="_blank"
                                                class="btn btn-primary waves-effect waves-light">
                                                Customer
                                                Copy</a>
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
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function printPage() {
            window.print();
        }
    </script>
@endpush
