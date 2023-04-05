<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="container">
                <div class="row">
                    <a href="{{ url('/staff/gen-invoice') }}">
                        <i class="fas fa-arrow-left mb-3"></i> Back
                    </a>
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        @if ($errors->any())
                            <div class="alert alert-danger text-center" id="error-message">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            <h5>{{ $error }}</h5>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (count($cartItems) > 0)
                            @if (session()->has('message'))
                                <div class="alert alert-success text-center" id="alert">{{ session('message') }}
                                </div>
                            @endif

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Package Unit</div>
                                        </th>
                                        <th class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Sub Total</div>
                                        </th>
                                        <th class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data['items'] as $item)
                                        <tr>
                                            <th scope="row">
                                                <div class="p-2">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="#"
                                                                class="text-dark d-inline-block">{{ $item['product']->name }}</a>
                                                        </h5><span
                                                            class="text-muted font-weight-normal font-italic">Category:
                                                            {{ $item['category_name'] }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="align-middle"><strong>{{ $item['price'] }}</strong></td>
                                            <td class="align-middle"><strong>{{ $item['quantity'] }}</strong></td>
                                            <td class="align-middle"><strong>{{ $item['package_unit'] }}</strong></td>
                                            <td class="align-middle">
                                                <strong>&#8358;{{ $item['subtotal'] }}</strong>
                                            </td>
                                            <td class="align-middle"><button type="button" class="text-dark"
                                                    wire:click="removeFromCart({{ $item['item_id'] }})"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4 class="alert alert-warning text-center">Invoice List is Empty</h4>
                        @endif
                    </div>
                    <!-- End -->
                </div>
            </div>

            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-xl-4"></div>
                <div class="col-xl-8">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order
                        summary </div>
                    <div class="p-4">

                        <div class="text-right mt-4">
                            <p>
                                <b>Shipping: 0.00</b>
                            </p>
                            <p>VAT: 0.00</p>
                            <hr>
                            <h3>Total: &#8358;{{ $data['total'] }}</h3>
                        </div>


                        <ul class="list-unstyled mb-4">
                            <form wire:submit.prevent="invoiceRequest">
                                <div class="row px-3">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Customer Name</label>
                                            <input type="text" name="customer_name" class="form-control"
                                                wire:model="customer_name" value="{{ old('customer_name') }}" required>
                                            @error('customer_name')
                                                <span class="text-danger"
                                                    style="font-size: 11.5px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="customer_email" class="form-control"
                                                wire:model="customer_email">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Invoice Type</label>
                                            <select class="form-control" wire:model="invoice_type">
                                                <option value="">--Invoice Type--</option>
                                                <option value="1">Standard Invoice</option>
                                                <option value="2">Credit Invoice</option>
                                                <option value="3">Debit Invoice</option>
                                            </select>
                                        </div>
                                        @error('invoice_type')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Payment</label>
                                            <select wire:model="payment_method" class="form-control">
                                                <option value="">--Payment Method--</option>
                                                <option value="cash">Cash</option>
                                                <option value="transfer">Transfer</option>
                                                <option value="card">Card</option>
                                            </select>
                                        </div>
                                        @error('payment_method')
                                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block">Create
                        Invoice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        setTimeout(function() {
            $('#alert').fadeOut('fast');
        }, 3000); // 👈️ time in milliseconds
    </script>
    <script>
        window.addEventListener('submit-order-success', () => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Invoice has created submitted',
                showConfirmButton: false,
                timer: 3000
            }).then(() => {
                window.location.href = "{{ route('staff.all-invoices') }}";
            });
        });

        window.addEventListener('submit-invoice-request', event => {
            Swal.fire({
                title: 'Do you want to save this invoice?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('submitOrder')

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
            window.addEventListener('invoiceSaved', event => {
                Swal.fire(
                    'Submited',
                    'Invoice has been Created',
                    'success',
                    window.location.href = "{{ route('staff.all-invoices') }}"
                )
            })
        })
    </script>
@endpush
