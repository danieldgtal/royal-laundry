@extends('layouts.app')

@section('content')
    <style>
        .div-hover:hover {
            background-color: #d3d3d3
        }
    </style>
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
                    <!-- <div class="panel-heading">
                              <h4>Invoice</h4>
                          </div> -->
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="float-sm-left">
                                <h4 class="text-uppercase mt-0">
                                    Uplon
                                </h4>
                            </div>
                            <div class="float-sm-right mt-4 mt-sm-0">
                                <h5>
                                    Invoice # <br />
                                    <small>2016-04-23654789</small>
                                </h5>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-12">
                                <div class="float-sm-left mt-4">
                                    <address>
                                        <strong>Twitter,
                                            Inc.</strong><br />
                                        795 Folsom Ave, Suite
                                        600<br />
                                        San Francisco, CA
                                        94107<br />
                                        <abbr title="Phone">P:</abbr>
                                        (123) 456-7890
                                    </address>
                                </div>
                                <div class="mt-4 text-sm-right">
                                    <p>
                                        <strong>Order Date:
                                        </strong>
                                        Jan 17, 2016
                                    </p>
                                    <p>
                                        <strong>Order Status:
                                        </strong>
                                        <span class="badge badge-danger">Pending</span>
                                    </p>
                                    <p>
                                        <strong>Order ID:
                                        </strong>
                                        #123456
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
                                                <th>Item</th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    Quantity
                                                </th>
                                                <th>
                                                    Unit Cost
                                                </th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>LCD</td>
                                                <td>
                                                    If several
                                                    languages
                                                    coalesce.
                                                </td>
                                                <td>1</td>
                                                <td>$380</td>
                                                <td>$380</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Mobile</td>
                                                <td>
                                                    Their
                                                    separate
                                                    existence is
                                                    a myth.
                                                </td>
                                                <td>5</td>
                                                <td>$50</td>
                                                <td>$250</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>LED</td>
                                                <td>
                                                    Everyone
                                                    realizes why
                                                    a new
                                                    common.
                                                </td>
                                                <td>2</td>
                                                <td>$500</td>
                                                <td>$1000</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>LCD</td>
                                                <td>
                                                    It will be
                                                    as simple as
                                                    occidental.
                                                </td>
                                                <td>3</td>
                                                <td>$300</td>
                                                <td>$900</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Mobile</td>
                                                <td>
                                                    To achieve
                                                    this, it
                                                    would be
                                                    necessary.
                                                </td>
                                                <td>5</td>
                                                <td>$80</td>
                                                <td>$400</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix mt-5">
                                    <h5 class="small">
                                        <b>PAYMENT TERMS AND
                                            POLICIES</b>
                                    </h5>

                                    <small class="text-muted">
                                        All accounts are to be
                                        paid within 7 days from
                                        receipt of invoice. To
                                        be paid by cheque or
                                        credit card or direct
                                        payment online. If
                                        account is not paid
                                        within 7 days the
                                        credits details supplied
                                        as confirmation of work
                                        undertaken will be
                                        charged the agreed
                                        quoted fee noted above.
                                    </small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right mt-4">
                                    <p>
                                        <b>Sub-total:</b>
                                        2930.00
                                    </p>
                                    <p>Discout: 12.9%</p>
                                    <p>VAT: 12.9%</p>
                                    <hr />
                                    <h3>$ 2930.00 USD</h3>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="d-print-none">
                            <div class="float-right">
                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i
                                        class="fa fa-print"></i></a>
                                <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <!-- end row -->

    </div>
    <!-- end container-fluid -->
    <x-dashboard.datatablejs />
@endsection
