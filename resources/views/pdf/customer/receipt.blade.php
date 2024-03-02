<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <title>Royal Choice Laundry | Customers</title>
    <style>
        @media print {
            body {
                width: 80mm;
                margin: 0mm;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        @if ($invoice)
            <div style="font-size: 10px;">
                <div class="clearfix">
                    <div class="text-center">
                        <img src="{{ asset('dashboard/assets/images/logo.png') }}" alt="" class="mx-auto mb-1">
                        <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe.
                            344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos.</p>
                        <p><strong>Mobile:</strong>+234(818)529 8359, +234(810)978 7915, +234(704)552 9886
                        </p>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="float-sm-left">
                            <a href="https://deroyalchoiceng.com"
                                target="_blank"><strong>www.deroyalchoiceng.com</strong></a>
                        </div>
                        <div class="float-sm-right mt-4 mt-sm-0">
                            <h5>
                                {{ $invoice->invoice_id }}
                                <br />
                            </h5>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-12">
                            <div class="float-sm-left mt-4">
                                <address>
                                    <strong> Payment Status:</strong>
                                    @if ($invoice->balance_amount > 0)
                                        <p style="color:red;">Balance: {{ $invoice->balance_amount }}
                                        </p>
                                    @else
                                        <p style="color:green;">Full Payment Received</p>
                                    @endif
                                    <br>
                                    <strong>
                                        @php
                                            $branch = App\Models\Branch::find($invoice->branch_id);
                                        @endphp

                                        @if ($branch)
                                            Branch Name: {{ $branch->name }}
                                        @endif
                                    </strong>
                                    <br>
                                    <strong>
                                        Name:
                                        {{ isset($invoice->customer_name) ? $invoice->customer_name : '' }}
                                    </strong>
                                </address>
                            </div>
                            <div class="mt-4 text-sm-right">
                                <p>
                                    <strong>invoice Date:
                                    </strong>
                                    {{ $invoice->invoice_date }}
                                </p>
                                <p>
                                    <strong>invoice ID:
                                    </strong>
                                    #{{ $invoice->invoice_id }}
                                </p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                {{-- <th>Quantity</th>
                                <th>Package Unit</th> --}}
                                <th>Total Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($invoice->items) as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    {{-- <td>
                                        {{ $item->quantity }}
                                    </td>
                                    <td>{{ $item->product->package_unit }}</td> --}}
                                    <td>{{ $item->quantity * $item->product->package_unit }} </td>
                                    <td>₦{{ $item->subtotal }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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
                            {{-- <hr /> --}}
                            <h3>₦{{ $invoice->total_cost }}</h3>
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
            </div>
        @else
            <tr>
                <td>No Record</td>
            </tr>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
