<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title">All Invoice</h4>
            <p class="sub-header">
                This table contains all invoice for Staff and their particular Branch
            </p>

            <?php if(session()->has('message')): ?>
                <div class="alert alert-success text-center"><?php echo e(session('message')); ?></div>
            <?php endif; ?>
            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
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
                            <?php $__errorArgs = ['per_page'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <label class="ml-3">Branch
                                <select aria-controls="datatable" wire:model="selectedBranch"
                                    class="custom-select custom-select-sm">
                                    <option value="all">All Branch</option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex">
                        <?php
                            session(['invoicesData' => $invoicesData]);
                        ?>
                        <a href="<?php echo e(route('invoices_export_pdf')); ?>" target="_blank" type="button"
                            class="btn btn-secondary mb-1 mr-1" tabindex="0" type="button">
                            <span>PDF</span>
                        </a>

                        <a href="<?php echo e(route('invoices_export_excel')); ?>" target="_blank" type="button"
                            class="btn btn-secondary mb-1" tabindex="0" type="button">
                            <span>EXCEL</span>
                        </a>

                        <div id="datatable-buttons_filter" class="dataTables_filter ml-auto">
                            <label>Search:
                                <input type="search" wire:model="search" class="form-control form-control-sm"
                                    placeholder="" aria-controls="datatable-buttons">
                            </label>
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
                            <input type="date" class="form-control datetimepicker-input" data-target="#toDatepicker"
                                name="toDate" required wire:model="toDate" />
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
                                <?php if($invoices->count() > 0): ?>
                                    <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($invoice->invoice_id); ?></td>
                                            <td><?php echo e($invoice->customer_name); ?></td>
                                            <td><?php echo e($invoice->balance_amount); ?></td>
                                            <td><?php echo e($invoice->paid_amount); ?></td>
                                            <td><?php echo e($invoice->total_cost); ?></td>
                                            <td><?php echo e($invoice->payment_method); ?></td>
                                            <td><?php echo e($invoice->date_issued); ?></td>
                                            <td>
                                                <?php echo e($invoice->invoice_type); ?>

                                            </td>
                                            <td><?php echo e($invoice->order_date); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-dark btn-sm"
                                                    wire:click="invoiceView(<?php echo e($invoice->invoice_id); ?>)">
                                                    view</button>
                                                <button class="btn btn-danger btn-sm"
                                                    wire:click="invoiceDelete(<?php echo e($invoice->invoice_id); ?>)">delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No Invoices Yet</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination buttons -->
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                            Showing <?php echo e($invoices->firstItem()); ?> to <?php echo e($invoices->lastItem()); ?> of
                            <?php echo e($invoices->total()); ?>

                            entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="d-flex justiy-content-center flex-wrap">
                            <?php echo e($invoices->links('vendor.livewire.bootstrap')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        window.addEventListener('show-delete-alert', event => {
            $('#sa-warning').modal('show');
        });
    </script>
    <!--Sweet alert delete script -->
    <script>
        window.addEventListener('show-delete-alert', event => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteItemData')
                } else {
                    // Swal.close();
                }
            })
        })

        window.addEventListener('itemDeleted', event => {
            Swal.fire(
                'Deleted',
                'Invoice has been deleted',
                'success',
            )
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/livewire/admin/invoices.blade.php ENDPATH**/ ?>