<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('tmp/logo.jpg') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('tmp/logo.jpg') }}" alt="" height="60">

            </span>
        </a>

        <a href="#" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset('tmp/asset/logo.png') }}" alt="" height="22">

            </span>
            <span class="logo-sm">
                <img src="{{ asset('tmp/asset/logo.png') }}" alt="" height="22">

            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- <li class="menu-title" data-key="t-dashboards">Dashboards</li> --}}

                {{-- <li>
                    <a href="#">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Sales</span>
                        <span class="badge rounded-pill badge-secondary-subtle">5+</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span class="menu-item" data-key="t-analytics">Dashboard</span>
                    </a>
                </li>
                @if (Auth::check() && Auth::user()->role()->first()?->name == 'admin')
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            <span class="menu-item" data-key="t-analytics">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('managers.index') }}">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            <span class="menu-item" data-key="t-analytics">Managers</span>
                        </a>
                    </li>
                @endif
                @if (Auth::check() && in_array(Auth::user()?->role()?->first()?->name, ['admin', 'staff', 'client']))
                    <li>
                        <a href="{{ route('buildings.index') }}">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <span class="menu-item" data-key="t-analytics">Buildings</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('call-logs.index') }}">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span class="menu-item" data-key="t-analytics">Call Logs</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contractors.index') }}">
                            <i class="fa fa-male" aria-hidden="true"></i>
                            <span class="menu-item" data-key="t-analytics">Contractors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reports.index') }}">
                            <i class="fa fa-male" aria-hidden="true"></i>
                            <span class="menu-item" data-key="t-analytics">Reports</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
