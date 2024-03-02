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
    <link rel="shortcut icon" href="<?php echo e(asset('dashboard/assets/css/favicon.png')); ?>">

    <!-- App css -->
    <link href="<?php echo e(asset('dashboard/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <link href="<?php echo e(asset('dashboard/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('dashboard/assets/css/app.min.css')); ?>" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="<?php echo e(asset('dashboard/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')); ?>"
        rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('dashboard/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('dashboard/assets/libs/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/assets/libs/clockpicker/bootstrap-clockpicker.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <script src="<?php echo e(mix('/js/app.js')); ?>"></script>
</head>

<body class="authentication-bg">

    <div class="account-pages pt-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="account-card-box">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <!-- plugins -->
    <script src="<?php echo e(asset('dashboard/assets/libs/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/assets/libs/clockpicker/bootstrap-clockpicker.min.js')); ?>"></script>

    <!-- Init js-->
    <script src="<?php echo e(asset('dashboard/assets/js/pages/form-pickers.init.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/layouts/guest.blade.php ENDPATH**/ ?>