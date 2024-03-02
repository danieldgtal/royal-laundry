<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <title>Royal Choice Laundry | Customers</title>
    <style>
        @media {
            @print {}
        }
    </style>
</head>

<body>
    <div style="font-size: 10px;">
        <div class="table-responsive">
            <table class="table table-nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Package Unit</th>
                        <th>Total Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($invoices))
                        @foreach (json_decode($invoices->items) as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    {{ $item->quantity }}
                                </td>
                                <td>{{ $item->product->package_unit }}</td>
                                <td>{{ $item->quantity * $item->product->package_unit }}
                                </td>
                                <td>&#8358;{{ $item->subtotal }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No Record</td>
                        </tr>
                    @endif
                </tbody>
            </table>
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
    <div class="table-responsive mt-4 pt-3">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
