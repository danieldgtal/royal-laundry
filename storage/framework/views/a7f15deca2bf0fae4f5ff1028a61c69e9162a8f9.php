<?php
    $url = url()->current();
    $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">
                            <?php if(Auth::user()->user_type == '0'): ?>
                                <?php echo e('User'); ?>

                            <?php elseif(Auth::user()->user_type == '1'): ?>
                                <?php echo e('Staff'); ?>

                            <?php else: ?>
                                <?php echo e('Admin'); ?>

                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo e($page); ?></li>
                </ol>
            </div>
            <h4 class="page-title"><?php echo e($page); ?> </h4>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/components/dashboard/dashboard-header.blade.php ENDPATH**/ ?>