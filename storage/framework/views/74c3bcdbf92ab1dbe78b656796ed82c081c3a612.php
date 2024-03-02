
<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <!-- start page title -->
        <?php
            $url = url()->current();
            $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
        ?>
        <?php if (isset($component)) { $__componentOriginal062657d254d0017cd73d2239b8c04d3d5f51928a = $component; } ?>
<?php $component = App\View\Components\Dashboard\DashboardHeader::resolve(['url' => ''.e($page).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.dashboard-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\DashboardHeader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal062657d254d0017cd73d2239b8c04d3d5f51928a)): ?>
<?php $component = $__componentOriginal062657d254d0017cd73d2239b8c04d3d5f51928a; ?>
<?php unset($__componentOriginal062657d254d0017cd73d2239b8c04d3d5f51928a); ?>
<?php endif; ?>
        <!-- end page title -->
        <div class="row" id="print-area">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-12 print-out">
                            <?php if($invoice): ?>
                                <div class="clearfix">
                                    <div class="text-center">
                                        <img src="<?php echo e(asset('dashboard/assets/images/logo.png')); ?>" alt=""
                                            class="mx-auto mb-1">
                                        <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe.</p>

                                        <p>344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos.</p>

                                        <p>
                                            <strong>Mobile:</strong>+234(818)529 8359, +234(810)978 7915, +234(704)552 9886
                                        </p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="clearfix">
                                        <div class="text-center">
                                            <a href="https://deroyalchoiceng.com" target="_blank" class="text-dark"><strong>
                                                    www.deroyalchoiceng.com</strong></a>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-sm-left mt-4">
                                                <address>
                                                    <strong>Payment Status:</strong>
                                                    <?php if($invoice->balance_amount > 0): ?>
                                                        <p style="color:red;">Balance: <?php echo e($invoice->balance_amount); ?>

                                                        </p>
                                                    <?php else: ?>
                                                        <p style="color:green;">Full Payment Received</p>
                                                    <?php endif; ?>
                                                    <br>
                                                    <strong>
                                                        Branch:
                                                        <?php echo e($branch->name); ?>


                                                    </strong>
                                                    <br>
                                                    <strong>
                                                        Customer Name:
                                                        <?php echo e(isset($invoice->customer_name) ? $invoice->customer_name : ''); ?>

                                                    </strong>
                                                </address>
                                            </div>
                                            <div class="mt-4 text-sm-right">
                                                <p>
                                                    <strong>invoice Date:
                                                        <?php echo e($invoice->invoice_date); ?>

                                                    </strong>
                                                </p>
                                                <p>
                                                    <strong>invoice ID:

                                                        #<?php echo e($invoice->invoice_id); ?>

                                                    </strong>
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
                                                            <th>Name</th>
                                                            <th>
                                                                Total Qty
                                                            </th>
                                                            <th>
                                                                Subtotal
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = json_decode($invoice->items); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($item->product->name); ?></td>

                                                                <td><?php echo e($item->quantity * $item->product->package_unit); ?>

                                                                </td>
                                                                <td>&#8358;<?php echo e($item->subtotal); ?></td>

                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                            <div class="text-right mt-4 mr-4">
                                                <p>
                                                    <b>Sub-total:</b>
                                                    <strong> <?php echo e($invoice->total_cost); ?></strong>
                                                </p>
                                                <?php
                                                    $items = json_decode($invoice->items, true);
                                                    $total_quantity = 0;
                                                    foreach ($items as $item) {
                                                        $quantity = $item['quantity'] * $item['package_unit'];
                                                        $total_quantity += $quantity;
                                                    }
                                                ?>
                                                <p><strong>Total Qty: <?php echo e($total_quantity); ?> pc(s)</strong></p>
                                                <p><strong> VAT: 0.00%</strong></p>
                                                <hr />
                                                <h3>&#8358; <?php echo e($invoice->total_cost); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <p>Thank You very much! Pls come again!!! <br>
                                            ---Business Hour--- <br>
                                            Mon-Fri 8:00am - 6pm <br>
                                            Sat 8:00am - 5pm <br>
                                        </p>
                                    </div>
                                    <hr />
                                    <div class="table-responsive mt-4 pt-3 exclude-me">
                                        <table class="table table-bordered">
                                            <thead class="d-print-none">
                                                <tr>
                                                    <th>Item count & Id</th>
                                                    <th>Invoice Date</th>
                                                    <th>Invoice & Customer Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $items = json_decode($invoice->items, true);
                                                    $total_quantity = 0;
                                                    foreach ($items as $item) {
                                                        $quantity = $item['quantity'] * $item['package_unit'];
                                                        $total_quantity += $quantity;
                                                    }
                                                ?>
                                                <?php if($total_quantity > 0): ?>
                                                    <?php $__currentLoopData = range(1, $total_quantity); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($invoice->invoice_id); ?> <br>
                                                                <?php echo e($count); ?> of <?php echo e($total_quantity); ?>

                                                            </td>
                                                            <td><?php echo e($invoice->order_date); ?></td>
                                                            <td>
                                                                <?php echo e($invoice->invoice_id); ?> <br>
                                                                <?php echo e($invoice->customer_name); ?>

                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php echo e(''); ?>

                                                <?php endif; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-left">
                                        <?php if($invoice->side_note): ?>
                                            <p>
                                                <strong>
                                                    <?php echo e($invoice->side_note); ?>

                                                </strong>
                                            </p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="<?php echo e(route('staff_receipt')); ?>" target="_blank"
                                                class="btn btn-dark waves-effect waves-light"><i
                                                    class="fa fa-print"></i></a>
                                            <?php
                                                session(['sessionData' => $invoice]);
                                            ?>
                                            <a href="<?php echo e(route('customer_receipt')); ?>" target="_blank"
                                                class="btn btn-primary waves-effect waves-light">
                                                Customer
                                                Copy</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div>Invoice is empty</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        function printPage() {
            window.print();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/livewire/staff/invoice-view.blade.php ENDPATH**/ ?>