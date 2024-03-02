  <!-- end page title -->

  <div class="row">
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
              <h3 class="mb-4"><span data-plugin="counterup">{{ $pendingOrders }} </span></h3>

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
  </div>
  <!-- end row -->
  <div class="row">
      <div class="col-xl-12">
          <div class="card-box">
              <h4 class="header-title mb-3">Last 5 Order Summary</h4>

              <div class="table-responsive">
                  <table class="table table-bordered table-nowrap mb-0">
                      <thead>
                          <tr>
                              <th>Branch</th>
                              <th>Order Date</th>
                              <th>Order Status</th>
                              <th>Payment Status</th>
                          </tr>
                      </thead>
                      <tbody>

                          @if (count($orders) > 0)
                              @foreach ($orders as $order)
                                  <tr>
                                      <th class="text-muted">
                                          @if ($branch = App\Models\Branch::find($order->branch_id))
                                              {{ $branch->name }}
                                          @else
                                              Unknown Branch
                                          @endif
                                      </th>
                                      <td>{{ $order->order_date }}</td>
                                      <td>{{ $order->order_status }}</td>
                                      <td>
                                          @if ($order->payment_status === 'paid')
                                              <span class="badge badge-success">{{ $order->payment_status }}</span>
                                          @else
                                              <span class="badge badge-warning">{{ $order->payment_status }}</span>
                                          @endif
                                      </td>
                                  </tr>
                              @endforeach
                          @endif
                      </tbody>
                  </table>
              </div>
          </div>
      </div><!-- end col-->

  </div>
  <!-- end row -->
