<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('User Management') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="fab fa-critical-role"></i>
                    <p>
                        {{ __('Roles') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('branches.index') }}" class="nav-link">
                    <i class="fa fa-code-branch"></i>
                    <p>
                        {{ __('Branches') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/dashboardposts" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        POST
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="/posts/create" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>+Add New</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboardposts" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Post</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->