<table>
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
