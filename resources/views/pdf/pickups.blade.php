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
                    <th>Pickup ID</th>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                    <th>Pickup Date</th>
                    <th>Pickup Status</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data))
                    @foreach ($data as $pickup)
                        <tr>
                            @php
                                $customer = DB::table('customers')
                                    ->select('firstname', 'lastname', 'phone')
                                    ->where('id', $pickup['user_id'])
                                    ->first();
                            @endphp
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pickup['pickup_id'] ?? '' }}</td>
                            <td>{{ $customer->firstname . ' ' . $customer->lastname ?? '' }}</td>
                            <td>{{ $customer->phone ?? '' }}</td>
                            <td>{{ $pickup['pickup_date'] ?? '' }}</td>
                            <td>{{ $pickup['pickup_status'] ?? '' }}</td>
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
