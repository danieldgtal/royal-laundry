<div class="card">
    <div class="card-body">
        <div class="d-print-none">
            <form wire:submit.prevent="searchInvoice">
                <div class="row d-flex justify-content-between">
                    <div class="col-sm-12 col-md-9">
                        <input type="number" wire:model="invoiceNumber" class="form-control"
                            placeholder="Enter Invoice or Order Number Here" required />
                        <br />
                        @error('invoiceNumber')
                            <span class="text-danger" style="font-size: 11.5px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <button type="submit" class="btn btn-info waves-effect waves-light float-right">
                            <span>Search Invoice <i class="fa fa-search"></i></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @if ($searchPerformed && $invoiceAvailable)
            <div class="text-center">
                <h4>DEROYALCHOICELAUNDRY</h4>
                <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe.
                    344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos.</p>
                <p><strong>Mobile:</strong>+234(702) 610 5981, +234(818) 529 8359</p>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <p style="color: #7e8d9f; font-size: 20px">
                        <strong> Invoice ID: {{ $invoice->invoice_id }}</strong>
                    </p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <p class="h5">Invoice</p>
                    <ul class="list-unstyled">
                        <li class="text-muted">
                            <i class="fas fa-circle" style="color: #84b0ca"></i>
                            <span class="fw-bold">ID:</span>{{ $invoice->invoice_id }}
                        </li>
                        <li class="text-muted">
                            <i class="fas fa-circle" style="color: #84b0ca"></i>
                            <span class="fw-bold">Creation Date: </span>{{ $invoice->invoice_date }}
                        </li>
                        <li class="text-muted d-print-none">
                            <i class="fas fa-circle" style="color: #84b0ca"></i>
                            <span class="me-1 fw-bold">Invoice Type:</span>
                            {{ $invoice->invoice_type }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                    <thead style="background-color: #84b0ca" class="text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Package Unit</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (json_decode($invoice->items) as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->product->name }}</td>
                                <td>&#8358;{{ $item->price }}</td>
                                <td>
                                    {{ $item->quantity }}
                                </td>
                                <td>{{ $item->product->package_unit }}</td>
                                <td>&#8358;{{ $item->subtotal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <p class="ms-3">Add additional notes and payment information</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <ul class="list-unstyled">
                        <li class="text-muted ms-3">
                            <span class="text-black me-4"><strong> SubTotal</strong></span>
                        </li>
                        <li class="text-muted ms-3 mt-2">
                            <span class="text-black me-4"><strong> Tax (0%)</strong></span>
                        </li>
                    </ul>
                    <p class="text-black float-start">
                        <span class="text-black me-3"><strong>Total Amount</strong></span><span style="font-size: 25px">
                            &#8358;{{ $invoice->total_cost }}</span>
                    </p>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-xl-10">
                    <p>Thank you for your purchase</p>
                </div>
                <div class="col-xl-2">
                    <a type="button" href="javascript:window.print()"
                        class="btn btn-primary text-capitalize d-print-none" style="background-color: #60bdf3">
                        Print Invoice
                    </a>
                </div>
            </div>
    </div>
@elseif ($searchPerformed)
    <div class="alert alert-danger">
        <p>Invoice not found</p>
    </div>
    @endif
</div>
