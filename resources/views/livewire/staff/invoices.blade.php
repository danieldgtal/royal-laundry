<div class="row">
    <!--Edit Item Modal-->
    <div wire:ignore.self class="modal fade" id="editInvoice" tabindex="-1" data-backdrop="static" role="dialog"
        data-keyboard="false" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submitEditedInvoice">
                        <div class="form-group">
                            <label for="item-name">Invoice Type</label>
                            <div>
                                <select class="form-control" wire:model="invoice_type">
                                    <option value="">--Select Type--</option>
                                    <option value="standard">Standard</option>
                                    <option value="credit">Credit</option>
                                    <option value="debit">Debit</option>
                                </select>
                                @error('invoice_type')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="balance">Balance</label>
                                <input type="number" class="form-control" disabled wire:model="balance_amount">
                            </div>
                            <div class="col-6">
                                <label for="balance">Total Cost</label>
                                <input type="number" class="form-control" disabled wire:model="total_cost">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Paid Amount</label>
                                <input type="text" disabled class="form-control" wire:model="paid_amount">
                            </div>
                            <div class="form-group col-6">
                                <label for="item-name">Update Paid Amount</label>
                                <div>
                                    <input type="number" class="form-control" wire:model="updated_amount">
                                    @error('updated_amount')
                                        <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="side-note">Side Note</label>
                                <input type="text" name="" class="form-control" wire:model="side_note">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click="submitEditedInvoice">Submit
                        Invoice</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">All Invoice</h4>
            <p class="sub-header">
                This table contains all invoice for Staff and their particular Branch
            </p>

            @if (session()->has('message'))
                <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="dataTables_length" id="datatable_length">
                            <label>Show
                                <select aria-controls="datatable" wire:model="per_page"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries</label>
                            @error('per_page')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        @php
                            session(['invoicesData' => $invoicesData]);
                        @endphp
                        <div class="dt-buttons btn-group">
                            <a href="{{ route('export_invoices_pdf') }}" target="_blank" type="button"
                                class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                type="button"><span>PDF</span>
                            </a>
                            <a href="{{ route('export_invoices_excel') }}" target="_blank" type="button"
                                class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                type="button"><span>EXCEL</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div id="datatable-buttons_filter" class="dataTables_filter">
                            <label>Search:<input type="search" wire:model="search"
                                    class="form-control form-control-sm" placeholder=""
                                    aria-controls="datatable-buttons"></label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="form-group">
                        <div class="input-group date" id="fromDatepicker" data-target-input="nearest">
                            <label for="fromDate" class="pr-2">From: </label>
                            <input type="date" class="form-control datetimepicker-input"
                                data-target="#fromDatepicker" required wire:model="fromDate" />
                        </div>
                    </div>
                    <div class="form-group pr-2">
                        <div class="input-group date" id="toDatepicker" data-target-input="nearest">
                            <label for="fromDate" class="pl-2 pr-2">To: </label>
                            <input type="date" class="form-control datetimepicker-input"
                                data-target="#toDatepicker" name="toDate" required wire:model="toDate" />
                        </div>
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
                                    <th>Oustanding Debt</th>
                                    <th>Paid Amount</th>
                                    <th>Total Cost</th>
                                    <th>Payment Method</th>
                                    <th>Date Issued</th>
                                    <th>Invoice Type</th>
                                    <th>Order Date</th>
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
                                            <td>{{ $invoice->balance_amount }}</td>
                                            <td>{{ $invoice->paid_amount }}</td>
                                            <td>{{ $invoice->total_cost }}</td>
                                            <td>{{ $invoice->payment_method }}</td>
                                            <td>{{ $invoice->date_issued }}</td>
                                            <td>
                                                {{ $invoice->invoice_type }}
                                            </td>
                                            <td>{{ $invoice->order_date }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-dark dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#"
                                                            wire:click.prevent="invoiceView({{ $invoice->invoice_id }})">Print
                                                            Invoice</a>
                                                        <a class="dropdown-item" href="#"
                                                            wire:click.prevent="editInvoice({{ $invoice->invoice_id }})">Edit
                                                            Invoice</a>
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

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#editInvoice').modal('hide');
        });
        window.addEventListener('show-edit-invoice-modal', event => {
            $('#editInvoice').modal('show');
        });
    </script>
@endpush
