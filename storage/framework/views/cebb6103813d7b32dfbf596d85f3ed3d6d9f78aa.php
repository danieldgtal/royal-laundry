<!doctype html>
<html lang="en">

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 80mm;
        }

        @page {
            /* size: 2.8in 11in; */
            margin-left: 0.5cm;
            margin-right: 0.5cm;
        }

        .text-center {
            text-align: center;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }

        .total {
            text-align: right;
        }

        .invoice-id-one {
            text-align: right;
        }


        thead {
            background: gray;
        }

        table {
            width: 100%;
            text-align: left;
        }

        tr {
            width: 100%;
        }

        td {
            padding-bottom: 10px;
        }

        @media print {
            body {
                width: 100%;
                height: auto;
            }

            thead {
                background: gray;
            }

            .d-print-none {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container" id="content">
        <?php if($invoice): ?>
            <div style="font-size: 10px;">
                <div class="clearfix">
                    <div class="text-center" style="font-size: 12px;">
                        <img src="<?php echo e(asset('dashboard/assets/images/logo.png')); ?>" alt="" class="mx-auto mb-1">
                        <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe.
                            344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos.</p>
                        <p><strong>Mobile:</strong>+234(818)529 8359, +234(810)978 7915, +234(704)552 9886
                        </p>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="text-center" style="font-size: 12px;">
                            <a href="https://deroyalchoiceng.com" style="text-decoration: none;"
                                target="_blank"><strong>www.deroyalchoiceng.com</strong></a>
                        </div>
                        <h5 class="invoice-id-one" style="font-size: 13px;">
                            <?php echo e($invoice->invoice_id); ?>

                            <br />
                        </h5>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="balance">
                                <address>
                                    <strong style="font-size: 13px;"> Payment Status:
                                        <?php if($invoice->balance_amount > 0): ?>
                                            <span style="color:red; text-align:right;">Balance:
                                                <?php echo e($invoice->balance_amount); ?>

                                            </span>
                                        <?php else: ?>
                                            <p style="color:green;">Full Payment Received</p>
                                        <?php endif; ?>
                                    </strong>
                                </address>
                                <br>
                                <strong style="font-size: 14px;">
                                    <?php
                                        $branch = App\Models\Branch::find($invoice->branch_id);
                                    ?>

                                    <?php if($branch): ?>
                                        Branch: <span class="branch-name"><?php echo e($branch->name); ?></span>
                                    <?php endif; ?>
                                </strong>
                                <br>
                                <strong style="font-size: 16px;">
                                    Name:
                                    <?php echo e(isset($invoice->customer_name) ? $invoice->customer_name : ''); ?>

                                </strong>

                            </div>
                            <div>
                                <p class="date" style="font-size: 13px;">
                                    <strong>Invoice Date:
                                    </strong>
                                    <?php echo e($invoice->invoice_date); ?>

                                </p>
                                <p class="invoice-id" style="font-size: 13px;">
                                    <strong>Invoice ID:
                                    </strong>
                                    #<?php echo e($invoice->invoice_id); ?>

                                </p>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                </div>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr style="font-size: 13px;">
                                <th>NAME</th>
                                <th>QUANTITY</th>
                                <th>SUBTOTAL</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = json_decode($invoice->items); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr style="font-size: 13px;">
                                    <td><?php echo e($item->product->name); ?></td>
                                    <td><?php echo e($item->quantity * $item->product->package_unit); ?> </td>
                                    <td>₦<?php echo e($item->subtotal); ?></td>
                                    
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="total">
                            <p style="font-size: 12.5px;">
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
                            <div style="font-size: 13px;">
                                <p><strong>Total Qty: <?php echo e($total_quantity); ?> pc(s)</strong></p>
                                <p><strong> VAT: 0.00%</strong></p>
                                <p style="font-size: 13.5px;"><strong>₦<?php echo e($invoice->total_cost); ?></strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <p style="font-size: 13px;">Thank You very much! Pls come again!!! <br>
                        ---Business Hour--- <br>
                        Mon-Fri 8:00am - 6pm <br>
                        Sat 8:00am - 5pm <br>
                    </p>
                </div>
                <hr style="margin-bottom: 15px; margin-top: 15px;" />
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
                                        <td>
                                            <h3><?php echo e($invoice->invoice_id); ?> <br>
                                                <?php echo e($count); ?> of <?php echo e($total_quantity); ?>

                                            </h3>
                                        </td>
                                        <td>
                                            <h3><?php echo e($invoice->order_date); ?></h3>
                                        </td>
                                        <td>
                                            <h3>
                                                <?php echo e($invoice->invoice_id); ?> <br>
                                                <span style="font-size: 16px;">
                                                    <?php echo e($invoice->customer_name); ?>

                                                </span>
                                            </h3>
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
                <div class="d-print-none text-center">
                    <button onclick="printPage()" class="btn btn-dark float-right">Download/print</button>
                </div>
            </div>
        <?php else: ?>
            <tr>
                <td>No Record</td>
            </tr>
        <?php endif; ?>
    </div>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/pdf/staff/receipt.blade.php ENDPATH**/ ?>