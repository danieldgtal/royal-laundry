<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <title>Royal Choice Laundry | Customers</title>
</head>

<body>
    <div style="font-size: 10px;">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice ID</th>
                    <th>Branch</th>
                    <th>Customer Name</th>
                    <th>Invoice Type</th>
                    <th>Invoice Date</th>
                    <th>Total Cost</th>
                    <th>Payment Method</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data))
                    @foreach ($data as $invoice)
                        <tr>
                            @php
                                $branch = DB::table('branches')
                                    ->select('name')
                                    ->where('id', $invoice['branch_id'])
                                    ->first();
                            @endphp
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $invoice['invoice_id'] ?? '' }}</td>
                            <td>{{ $branch->name }}</td>
                            <td>{{ $invoice['customer_name'] ?? '' }}</td>
                            <td>{{ $invoice['invoice_type'] ?? '' }}</td>
                            <td>{{ $invoice['invoice_date'] ?? '' }}</td>
                            <td>{{ $invoice['total_cost'] ?? '' }}</td>
                            <td>{{ $invoice['payment_method'] ?? '' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No Customer Record</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
