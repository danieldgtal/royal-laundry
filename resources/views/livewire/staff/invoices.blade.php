<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">All Invoice</h4>
            <p class="sub-header">
                This table contains all invoice for Staff and their particular Branch
            </p>

            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dt-buttons btn-group"><button class="btn btn-secondary buttons-copy buttons-html5"
                                tabindex="0" aria-controls="datatable-buttons"
                                type="button"><span>Copy</span></button> <button
                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                aria-controls="datatable-buttons" type="button"><span>Excel</span></button> <button
                                class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                aria-controls="datatable-buttons" type="button"><span>PDF</span></button> </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input type="search"
                                    class="form-control form-control-sm" placeholder=""
                                    aria-controls="datatable-buttons"></label></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="datatable-buttons"
                            class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed"
                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                            aria-describedby="datatable-buttons_info">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>Invoice Number</th>
                                    <th>Customer Name</th>
                                    <th>Total Cost</th>
                                    <th>Payment Method</th>
                                    <th>Date Issued</th>
                                    <th>Invoice Type</th>
                                    <th>Order Date</th>
                                    <th>Invoice Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($invoices->count() > 0)
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $invoice->invoice_id }}</td>
                                            <td>{{ $invoice->customer_name }}</td>
                                            <td>{{ $invoice->total_cost }}</td>
                                            <td>{{ $invoice->payment_method }}</td>
                                            <td>{{ $invoice->date_issued }}</td>
                                            <td>
                                                @if ($invoice->invoice_type === 1)
                                                    {{ 'Standard' }}
                                                @elseif ($invoice->invoice_type === 2)
                                                    {{ 'Prepaid Invoice' }}
                                                @elseif ($invoice->invoice_type === 3)
                                                    {{ 'Debit Invoice' }}
                                                @else
                                                    {{ 'Credit Invoice' }}
                                                @endif
                                            </td>
                                            <td>{{ $invoice->order_date }}</td>
                                            <td>
                                                @if ($invoice->invoice_status === 1)
                                                    {{ 'completed' }}
                                                @else
                                                    {{ 'cancelled' }}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-dark dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a type="button" class="btn"
                                                            wire:click.prevent="invoiceView({{ $invoice->invoice_id }})">view
                                                            invoice</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No Invoices Yet</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination buttons -->
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                            Showing {{ $invoices->firstItem() }} to {{ $invoices->lastItem() }} of
                            {{ $invoices->total() }}
                            entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="d-flex justiy-content-center flex-wrap">
                            {{ $invoices->links('vendor.livewire.bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
