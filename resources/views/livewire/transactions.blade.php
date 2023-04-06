<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h2>Recent Transactions</h2>
            <p>View and manage your recent laundry transactions here. You can track the status of your current
                orders and view details of past orders.</p>
            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length"
                                    wire:model="per_page" aria-controls="datatable"
                                    class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="datatable"
                                class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                aria-describedby="datatable_info">
                                <thead>
                                    <tr role="row">
                                        <th>Transaction ID</th>
                                        <th>Date Issued</th>
                                        <th>Payment Method</th>
                                        <th>Total Cost</th>
                                        <th>Order Date</th>
                                        <th>Branch</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($invoices->count() > 0)
                                        @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->invoice_id }}</td>
                                                <td>{{ $invoice->date_issued }}</td>
                                                <td>{{ $invoice->payment_method }}</td>
                                                <td>{{ $invoice->total_cost }}</td>
                                                <td>{{ $invoice->order_date }}</td>
                                                <td>
                                                    @if ($branch = App\Models\Branch::find($invoice->branch_id))
                                                        {{ $branch->name }}
                                                    @else
                                                        Unknown Branch
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-dark"
                                                        wire:click="invoicePreview({{ $invoice->invoice_id }})">
                                                        <i class="fa fa-eye">View</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination buttons -->
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="datatable-buttons_info" role="status"
                                    aria-live="polite">
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
    </div>
</div>
