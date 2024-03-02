<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">All Orders</h6>
            <h3 class="mb-4"><span data-plugin="counterup"><?php echo e($totalOrders); ?></span></h3>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Pending Orders</h6>
            <h3 class="mb-4"><span data-plugin="counterup "><span class="badge badge-warning">
                        <?php echo e($pendingOrders); ?></span> </span></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Processing Orders</h6>
            <h3 class="mb-4" data-plugin="counterup"><?php echo e($processingOrders); ?></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Cancelled Orders</h6>
            <h3 class="mb-4" data-plugin="counterup"><?php echo e($cancelledOrders); ?></h3>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Completed Orders</h6>
            <h3 class="mb-4" data-plugin="counterup"><?php echo e($completedOrders); ?></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Total Pickups</h6>
            <h3 class="mb-4" data-plugin="counterup"><?php echo e($totalPickups); ?></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Pending Pickups</h6>
            <h3 class="mb-4"><span class="badge badge-warning"> <?php echo e($pendingPickups); ?> </span>
            </h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Completed Pickups</h6>
            <h3 class="mb-4" data-plugin="counterup"><?php echo e($completedPickups); ?></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Cancelled Pickups</h6>
            <h3 class="mb-4" data-plugin="counterup"><?php echo e($cancelledPickups); ?></h3>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/livewire/staff/home.blade.php ENDPATH**/ ?>