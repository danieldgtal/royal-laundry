<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-paypal float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">SUPPOSED TOTAL</h6>
            <h3 class="my-3"> &#8358;<span data-plugin="counterup">{{ $total_cost }}</span></h3>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-paypal float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">ACTUAL TOTAL</h6>
            <h3 class="my-3"> &#8358;<span data-plugin="counterup">{{ $totalStandardCost }}</span></h3>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-paypal float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">BALANCE</h6>
            <h3 class="my-3"> &#8358;<span data-plugin="counterup">{{ $debitTotalCost }}</span></h3>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-paypal float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">CREDIT</h6>
            <h3 class="my-3"> &#8358;<span data-plugin="counterup">{{ $creditTotalCost }}</span></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">All Orders</h6>
            <h3 class="mb-4"><span data-plugin="counterup">{{ $totalOrders }}</span></h3>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Pending Orders</h6>
            <h3 class="mb-4"><span class="badge badge-warning">{{ $pendingOrders }}</span></h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Processing Orders</h6>
            <h3 class="mb-4" data-plugin="counterup">{{ $processingOrders }}</h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Cancelled Orders</h6>
            <h3 class="mb-4" data-plugin="counterup">{{ $cancelledOrders }}</h3>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Completed Orders</h6>
            <h3 class="mb-4" data-plugin="counterup">{{ $completedOrders }}</h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Total Pickups</h6>
            <h3 class="mb-4" data-plugin="counterup">{{ $totalPickups }}</h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Pending Pickups</h6>
            <h3 class="mb-4"><span class="badge badge-warning">{{ $pendingPickups }}</span> </h3>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card-box tilebox-two">
            <a href="#" class="btn btn-sm btn-primary waves-effect waves-light float-right">View</a>
            <h6 class="text-muted text-uppercase mt-0">Completed Pickups</h6>
            <h3 class="mb-4" data-plugin="counterup">{{ $completedPickups }}</h3>
        </div>
    </div>
</div>
