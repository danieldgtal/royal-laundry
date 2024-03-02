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
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data))
                    @foreach ($data as $customer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $customer['firstname'] ?? '' }}</td>
                            <td>{{ $customer['lastname'] ?? '' }}</td>
                            <td>{{ $customer['phone'] ?? '' }}</td>
                            <td>{{ $customer['dob'] ?? '' }}</td>
                            <td>{{ $customer['address'] ?? '' }}</td>
                            <td>{{ $customer['gender'] ?? '' }}</td>
                            <td>{{ $customer['email'] ?? '' }}</td>
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
