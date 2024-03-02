<!doctype html>
<html lang="en">

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 80mm;
        }

        @page {
            /* size: 2.8in 11in; */
            margin-left: 0.5cm;
            margin-right: 0.5cm;
        }

        .text-center {
            text-align: center;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }

        .total {
            text-align: right;
        }

        .invoice-id-one {
            text-align: right;
        }


        thead {
            background: gray;
        }

        table {
            width: 100%;
            text-align: left;
        }

        tr {
            width: 100%;
        }

        @media print {
            body {
                width: 100%;
                height: auto;
            }

            thead {
                background: gray;
            }

            .d-print-none {
                display: none;
            }

        }
    </style>
</head>

<body>
    <div class="container" id="content">
        @if ($invoice)
            <div style="font-size: 10px;">
                <div class="clearfix">
                    <div class="text-center" style="font-size: 12px;">
                        <img src="{{ asset('dashboard/assets/images/logo.png') }}" alt="" class="mx-auto mb-1">
                        <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe.
                            344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos.</p>
                        <p><strong>Mobile:</strong>+234(818)529 8359, +234(810)978 7915, +234(704)552 9886
                        </p>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="text-center" style="font-size: 12px;">
                            <a href="https://deroyalchoiceng.com" style="text-decoration: none;"
                                target="_blank"><strong>www.deroyalchoiceng.com</strong></a>
                        </div>
                        <h5 class="invoice-id-one" style="font-size: 13px;">
                            {{ $invoice->invoice_id }}
                            <br />
                        </h5>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="balance">
                                <address>
                                    <strong style="font-size: 13px;"> Payment Status:
                                        @if ($invoice->balance_amount > 0)
                                            <span style="color:red; text-align:right;">Balance:
                                                {{ $invoice->balance_amount }}
                                            </span>
                                        @else
                                            <p style="color:green;">Full Payment Received</p>
                                        @endif
                                    </strong>
                                </address>
                                <br>
                                <strong style="font-size: 14px;">
                                    @php
                                        $branch = App\Models\Branch::find($invoice->branch_id);
                                    @endphp

                                    @if ($branch)
                                        Branch: <span class="branch-name">{{ $branch->name }}</span>
                                    @endif
                                </strong>
                                <br>
                                <strong style="font-size: 16px;">
                                    Name:
                                    {{ isset($invoice->customer_name) ? $invoice->customer_name : '' }}
                                </strong>

                            </div>
                            <div>
                                <p class="date" style="font-size: 13px;">
                                    <strong>Invoice Date:
                                    </strong>
                                    {{ $invoice->invoice_date }}
                                </p>
                                <p class="invoice-id" style="font-size: 13px;">
                                    <strong>Invoice ID:
                                    </strong>
                                    #{{ $invoice->invoice_id }}
                                </p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                </div>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr style="font-size: 13px;">
                                <th>NAME</th>
                                <th>QUANTITY</th>
                                <th>SUBTOTAL</th>
                                {{-- <th>Quantity</th>
                                <th>Package Unit</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (json_decode($invoice->items) as $item)
                                <tr style="font-size: 13px;">
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity * $item->product->package_unit }} </td>
                                    <td>₦{{ $item->subtotal }}</td>
                                    {{-- <td>
                                        {{ $item->quantity }}
                                    </td>
                                    <td>{{ $item->product->package_unit }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="total">
                            <p style="font-size: 12.5px;">
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
                            <div style="font-size: 13px;">
                                <p><strong>Total Qty: {{ $total_quantity }} pc(s)</strong></p>
                                <p><strong> VAT: 0.00%</strong></p>
                                {{-- <hr /> --}}
                                <p style="font-size: 13.5px;"><strong>₦{{ $invoice->total_cost }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <p style="font-size: 13px;">Thank You very much! Pls come again!!! <br>
                        ---Business Hour--- <br>
                        Mon-Fri 8:00am - 6pm <br>
                        Sat 8:00am - 5pm <br>
                    </p>
                </div>
                <div class="d-print-none text-center">
                    <button onclick="printPage()" class="btn btn-dark float-right">Download/print</button>
                </div>
            </div>
        @else
            <tr>
                <td>No Record</td>
            </tr>
        @endif
    </div>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>

</html>
