@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        @php
            $url = url()->current();
            $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
        @endphp
        <x-dashboard.dashboard-header url="{{ $page }}" />
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    @if ($invoice)
                        <div class="clearfix">
                            <div class="text-center">
                                <h4>DEROYALCHOICELAUNDRY</h4>
                                <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe.
                                    344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos.</p>
                                <p><strong>Mobile:</strong>+234(702) 610 5981, +234(818) 529 8359</p>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="float-sm-left">
                                    <h4 class="text-uppercase mt-0">
                                        DeRoyalChoice
                                    </h4>
                                </div>
                                <div class="float-sm-right mt-4 mt-sm-0">
                                    <h5>
                                        {{ $invoice->invoice_id }}
                                        <br />
                                    </h5>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-sm-left mt-4">
                                        <address>
                                            <br>
                                            <abbr title="Phone"><strong> Phone:</strong></abbr>
                                            {{ isset($customer->phone) ? $customer->phone : '' }}

                                            <br>
                                            <strong>
                                                Branch:
                                                {{ $branch->name }}

                                            </strong>
                                            <br>
                                            <strong>
                                                Name:
                                                {{ isset($invoice->customer_name) ? $invoice->customer_name : '' }}
                                            </strong>
                                        </address>
                                    </div>
                                    <div class="mt-4 text-sm-right">
                                        <p>
                                            <strong>invoice Date:
                                            </strong>
                                            {{ $invoice->invoice_date }}
                                        </p>
                                        <p>
                                            <strong>invoice ID:
                                            </strong>
                                            #{{ $invoice->invoice_id }}
                                        </p>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>
                                                        Quantity
                                                    </th>
                                                    <th>
                                                        Package Unit
                                                    </th>
                                                    <th>
                                                        Subtotal
                                                    </th>
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
                                                        <td></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="clearfix mt-5">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-right mt-4">
                                        <p>
                                            <b>Sub-total:</b>
                                            {{ $invoice->total_cost }}
                                        </p>
                                        {{-- <p>Discout: 12.9%</p> --}}
                                        <p>VAT: 0.00%</p>
                                        <hr />
                                        <h3>&#8358; {{ $invoice->total_cost }}</h3>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="d-print-none">
                                <div class="float-right">
                                    <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i
                                            class="fa fa-print"></i></a>
                                    <a wire:click="forgetSession({{ $invoice->invoice_id }})"
                                        class="btn btn-primary waves-effect waves-light">Submit</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @else
                        <div>Invoice is empty</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
