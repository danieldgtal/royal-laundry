<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Royal Choice Laundry')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('/css/app.css')); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('dashboard/assets/images/favicon.ico')); ?>">
    <!-- Table datatable css -->
    <link href="<?php echo e(asset('dashboard/assets/libs/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" />

    <link href="<?php echo e(asset('dashboard/assets/libs/datatables/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('dashboard/assets/libs/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('dashboard/assets/libs/datatables/select.bootstrap4.min.css')); ?>" rel="stylesheet" />
    <!-- App css -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css">
    <link href="<?php echo e(asset('dashboard/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>"
        rel="stylesheet" />
    <link href="<?php echo e(asset('dashboard/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')); ?>"
        rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')); ?>"
        rel="stylesheet" />
    <link href="<?php echo e(asset('dashboard/assets/libs/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/assets/libs/clockpicker/bootstrap-clockpicker.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('dashboard/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="<?php echo e(asset('dashboard/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('dashboard/assets/css/app.min.css')); ?>" rel="stylesheet" type="text/css"
        id="app-stylesheet" />
    <script src="<?php echo e(mix('/js/app.js')); ?>" defer></script>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <style>
        @media print {
            body {
                width: 80mm;
                margin: 0mm;
            }
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php if (isset($component)) { $__componentOriginal576b9d76355a664d3802df757d2ba675fa1cbbf8 = $component; } ?>
<?php $component = App\View\Components\Dashboard\Topbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.topbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\Topbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal576b9d76355a664d3802df757d2ba675fa1cbbf8)): ?>
<?php $component = $__componentOriginal576b9d76355a664d3802df757d2ba675fa1cbbf8; ?>
<?php unset($__componentOriginal576b9d76355a664d3802df757d2ba675fa1cbbf8); ?>
<?php endif; ?>

        <!-- Leftbar -->
        <?php if (isset($component)) { $__componentOriginal77d1400198221b9153ab6b14416829284b4f2e14 = $component; } ?>
<?php $component = App\View\Components\Dashboard\Leftbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.leftbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\Leftbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77d1400198221b9153ab6b14416829284b4f2e14)): ?>
<?php $component = $__componentOriginal77d1400198221b9153ab6b14416829284b4f2e14; ?>
<?php unset($__componentOriginal77d1400198221b9153ab6b14416829284b4f2e14); ?>
<?php endif; ?>

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->

            <!-- Footer Start -->
            <?php if (isset($component)) { $__componentOriginal72d7129e366ddf7974bb5b3c69851978623afdcb = $component; } ?>
<?php $component = App\View\Components\Dashboard\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\Footer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72d7129e366ddf7974bb5b3c69851978623afdcb)): ?>
<?php $component = $__componentOriginal72d7129e366ddf7974bb5b3c69851978623afdcb; ?>
<?php unset($__componentOriginal72d7129e366ddf7974bb5b3c69851978623afdcb); ?>
<?php endif; ?>
            <!-- end Footer -->

        </div>

    </div>
    <!-- END wrapper -->


    <!-- Vendor js -->
    <script src="<?php echo e(asset('dashboard/assets/js/vendor.min.js')); ?>"></script>
    <!-- plugins -->
    <script src="<?php echo e(asset('dashboard/assets/libs/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')); ?> "></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?> "></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/bootstrap-daterangepicker/daterangepicker.js')); ?> "></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/clockpicker/bootstrap-clockpicker.min.js')); ?>"></script>
    <!-- Init js-->
    <script src="<?php echo e(asset('dashboard/assets/js/pages/form-pickers.init.js')); ?>"></script>
    <!--Morris Chart-->
    <script src="<?php echo e(asset('dashboard/assets/libs/morris-js/morris.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/raphael/raphael.min.js')); ?>"></script>
    <!-- Dashboard init js-->
    <script src="<?php echo e(asset('dashboard/assets/js/pages/dashboard.init.js')); ?>"></script>
    <!-- App js -->
    <script src="<?php echo e(asset('dashboard/assets/js/app.min.js')); ?>"></script>
    <!-- Sweet alert init js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/layouts/app.blade.php ENDPATH**/ ?>