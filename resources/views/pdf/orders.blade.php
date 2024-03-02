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
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Branch</th>
                    <th>Customer Name</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data))
                    @foreach ($data as $order)
                        <tr>
                            @php
                                $branch = \App\Models\Branch::find($order['branch_id']);
                            @endphp
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order['order_id'] ?? '' }}</td>
                            <td>{{ $order['order_date'] ?? '' }}</td>
                            <td>
                                {{ $branch->name }}
                            </td>
                            <td>{{ $order['customer_name'] ?? '' }}</td>
                            <td>{{ $order['payment_status'] ?? '' }}</td>
                            <td>{{ $order['order_status'] ?? '' }}</td>
                            <td>{{ $order['total_cost'] ?? '' }}</td>
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
