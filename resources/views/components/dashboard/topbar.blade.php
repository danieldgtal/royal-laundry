<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                href="#" role="button" aria-haspopup="false" aria-expanded="false">

                <span class="d-none d-sm-inline-block ml-1 font-weight-medium">{{ Auth::user()->name }}</span>
                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow text-white m-0">{{ Auth::user()->name }}</h6>
                </div>

                <!-- item-->
                @if (auth()->user()->user_type == 0)
                    <a href="{{ route('user.profile') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-outline"></i>
                        <span>Profile</span>
                    </a>
                @elseif (auth()->user()->user_type == 1)
                    <a href="{{ route('staff.profile') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-outline"></i>
                        <span>Profile</span>
                    </a>
                @else
                    <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-outline"></i>
                        <span>Profile</span>
                    </a>
                @endif
                <div class="dropdown-divider"></div>
                <!-- item-->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout-variant"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </li>
    </ul>
    <!-- LOGO -->
    <div class="logo-box">
        <a href="#" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo.png') }} " alt="" height="22">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm.png') }} " alt="" height="24">
            </span>
        </a>
        <a href="#" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{ asset('dashboard/assets/images/logo-light.png') }}" alt="" height="22">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('dashboard/assets/images/logo-sm-light.png') }}" alt="" height="24">
            </span>
        </a>
    </div>
    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>
</div>
