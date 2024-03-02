<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="container">
                <div class="row">
                    <a href="{{ url('/user/booking') }}">
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
                                                <strong>&#8358;{{ $item['subtotal'] . '.00' }}</strong>
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
                            <h4 class="alert alert-warning text-center">Your Cart is empty</h4>
                        @endif
                    </div>
                    <!-- End -->
                </div>
            </div>

            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="p-4">

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order
                        summary </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Shipping and additional costs are calculated based
                            on values you have entered.</p>
                        <ul class="list-unstyled mb-4">
                            <form wire:submit.prevent="orderRequest">
                                <li class="d-flex justify-content-between py-3 border-bottom">
                                    <select name="" id="" class="form-control" required
                                        wire:model="branch">
                                        <option value="">--Select Branch--</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('branch')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </li>


                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Tax</strong><strong>&#8358;.00</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold">&#8358; {{ $data['total'] . '.00' }}</h5>
                                </li>
                        </ul>
                    </div>
                    <button type="submit" wire:submit.prevent="orderRequest"
                        class="btn btn-dark rounded-pill py-2 btn-block">Confirm
                        Order</button>
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
                title: 'Your Order has been submitted',
                showConfirmButton: false,
                timer: 3000
            }).then(() => {
                window.location.href = "{{ route('user.orders') }}";
            });
        });
        window.addEventListener('submit-order-request', event => {
            Swal.fire({
                title: 'Do you want to submit this order?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('submitOrder')
                }
            })
        })
    </script>
@endpush
