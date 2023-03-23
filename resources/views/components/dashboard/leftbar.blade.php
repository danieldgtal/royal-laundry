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

                @if (auth()->check() && auth()->user()->user_type === '0')
                    <li>
                        <a href="{{ route('user.dashboard') }}">
                            <i class="fas fa-table dashboard-icon"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.notification') }}">
                            <i class="fas fa-bell notification-icon"></i>
                            <span> Notification </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.schedule') }}">
                            <i class="fas fa-calendar-alt"></i>
                            <span> Schedule </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.orders') }}">
                            <i class="fas fa-shopping-cart"></i>
                            <span> Orders</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.transactions') }}">
                            <i class="fas fa-history"></i>
                            <span> Transaction History </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home.contact') }}">
                            <i class="fas fa-comment"></i>
                            <span> Feedback </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.profile') }}">
                            <i class="fas fa-user-circle"></i>
                            <span> Profile </span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <form action="{{ route('logout') }} " method="post">
                            <button type="submit">
                                @csrf
                                <i class="fas fa-sign-out-alt"></i>
                                <span> Logout </span>
                            </button>
                        </form>
                    </li>
                @endif
                @if (auth()->check() && auth()->user()->user_type === '1')
                    <li>
                        <a href="{{ route('staff.dashboard') }}">
                            <i class="mdi mdi-format-underline"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('staff.items') }}">
                            <i class="mdi mdi-package-variant-closed"></i>
                            <span>Manage Items </span>
                            {{-- <span class="menu-arrow"></span> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('staff.invoices') }}">
                            <i class="mdi mdi-format-underline"></i>
                            <span> Invoicing </span>
                            {{-- <span class="menu-arrow"></span> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('staff.inventories') }}">
                            <i class="mdi mdi-package-variant-closed"></i>
                            <span> Manage Inventory </span>
                            {{-- <span class="menu-arrow"></span> --}}
                        </a>

                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-puzzle-outline"></i>
                            <span> Manage Customers </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('staff.all-customers') }}">All Customer</a></li>
                            <li><a href="{{ route('staff.new-customer') }}">Create Customer</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-puzzle-outline"></i>
                            <span> Orders </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('staff.pickups') }}">Pickups</a></li>
                            <li><a href="{{ route('staff.orders') }}">Orders</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-file-document-box-check-outline"></i>
                            <span> Reports </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-table-settings"></i>
                            <span> Weight Bill </span>
                            {{-- <span class="menu-arrow"></span> --}}
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-poll"></i>
                            <span> Profile </span>
                            {{-- <span class="menu-arrow"></span> --}}
                        </a>
                    </li>
                    <li class="nav-link">
                        <form action="{{ route('logout') }} " method="post">
                            <button type="submit">
                                @csrf
                                <i class="fas fa-sign-out-alt"></i>
                                <span> Logout </span>
                            </button>
                        </form>
                    </li>
                @endif
                @if (auth()->check() && auth()->user()->user_type === '2')
                    <li class="menu-title mt-2">More</li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-share-variant"></i>
                            <span> Multi Level </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li>
                                <a href="javascript: void(0);">Level 1.1</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-third-level nav" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);">Level 2.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Level 2.2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
