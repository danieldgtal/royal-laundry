<style>
    .nav-link {
        display: block;
        padding: 13px 25px;
        position: relative;
        transition: all 0.4s;
        font-size: 15.5px;
    }

    .nav-link.active {
        background-color: #f5f8fb;
        color: #64b0f2;
    }
</style>
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <?php if(auth()->check() && auth()->user()->user_type === '0'): ?>
                    <li>
                        <a href="<?php echo e(route('user.dashboard')); ?>">
                            <i class="fas fa-table dashboard-icon"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('user.schedule')); ?>">
                            <i class="fas fa-calendar-alt"></i>
                            <span> PickUp </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('user.orders')); ?>">
                            <i class="fas fa-shopping-cart"></i>
                            <span> Orders</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('user.transactions')); ?>">
                            <i class="fas fa-history"></i>
                            <span> Transaction History </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('home.contact')); ?>">
                            <i class="fas fa-comment"></i>
                            <span> Feedback </span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('user.profile')); ?>">
                            <i class="fas fa-user-circle"></i>
                            <span> Profile </span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <form action="<?php echo e(route('logout')); ?> " method="post">
                            <button type="submit">
                                <?php echo csrf_field(); ?>
                                <i class="fas fa-sign-out-alt"></i>
                                <span> Logout </span>
                            </button>
                        </form>
                    </li>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->user_type === '1'): ?>
                    <li>
                        <a href="<?php echo e(route('staff.dashboard')); ?>">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa fa-list"></i>
                            <span>Items & Categories</span>
                            <span class="menu-arrow"></span>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?php echo e(route('staff.categories')); ?>">Categories</a></li>
                                <li><a href="<?php echo e(route('staff.items')); ?>">Items</a></li>
                            </ul>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa fa-file"></i>
                            <span>Invoicing</span>
                            <span class="menu-arrow"></span>

                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?php echo e(route('staff.all-invoices')); ?>">All Invoices</a></li>
                                <li><a href="<?php echo e(route('staff.gen-invoice')); ?>">Generate Invoice</a></li>
                                <li><a href="<?php echo e(route('staff.search-invoice')); ?>">Search Invoice</a></li>
                            </ul>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('staff.customers')); ?>">
                            <i class="fa fa-users"></i>
                            <span> Manage Customers </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa fa-truck"></i>
                            <span> Orders </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo e(route('staff.pickups')); ?>">Pickups</a></li>
                            <li><a href="<?php echo e(route('staff.orders')); ?>">Orders</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo e(route('staff.feedbacks')); ?>">
                            <i class="fas fa-chart-bar"></i>
                            <span> Feedback </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('staff.profile')); ?>">
                            <i class="fa fa-user"></i>
                            <span> Profile </span>
                            
                        </a>
                    </li>
                    <li class="nav-link">
                        <form action="<?php echo e(route('logout')); ?> " method="post">
                            <button type="submit">
                                <?php echo csrf_field(); ?>
                                <i class="fas fa-sign-out-alt"></i>
                                <span> Logout </span>
                            </button>
                        </form>
                    </li>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->user_type === '2'): ?>
                    <li>
                        <a href="<?php echo e(route('admin.home')); ?>">
                            <i class="fa fa-home"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fa fa-list"></i>
                            <span>Items & Categories</span>
                            <span class="menu-arrow"></span>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?php echo e(route('admin.categories')); ?>">Categories</a></li>
                                <li><a href="<?php echo e(route('admin.items')); ?>">Items</a></li>
                            </ul>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.staffs')); ?>">
                            <i class="fa fa-users"></i>
                            <span> Staffs</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.orders')); ?>">
                            <i class="fa fa-truck"></i>
                            <span> Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.invoices')); ?>">
                            <i class="fa fa-file"></i>
                            <span>Invoices </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.feedbacks')); ?>">
                            <i class="fas fa-chart-bar"></i>
                            <span> Feedback </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.profile')); ?>">
                            <i class="fa fa-user"></i>
                            <span> Profile </span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <form action="<?php echo e(route('logout')); ?> " method="post">
                            <button type="submit">
                                <?php echo csrf_field(); ?>
                                <i class="fas fa-sign-out-alt"></i>
                                <span> Logout </span>
                            </button>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/components/dashboard/leftbar.blade.php ENDPATH**/ ?>