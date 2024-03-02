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
