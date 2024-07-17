<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href={{ route('home') }} class="brand-link">
        <img src={{ asset("images/logo.jpg") }} alt="Metheor Logo" class="brand-image " style="opacity: .8">
        <span class="brand-text font-weight-light">Metheor Team</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">OPTIONS</li>
                <li class="nav-item">
                    <a href={{ route('home') }} class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ route('concept') }} class="nav-link {{ Request::is('concept') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-lightbulb"></i>
                        <p>
                            Concept Details
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ route('history') }} class="nav-link {{ Request::is('history*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-history"></i>
                        <p>
                            Logs History
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href={{ route('users') }} class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Users
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>