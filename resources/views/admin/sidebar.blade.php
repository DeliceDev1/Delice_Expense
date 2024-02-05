<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">DELICE PLACEMENT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">DELICE Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                <li class="nav-item">
                    <a href="{{ url('cash_in') }}" class="nav-link">
                        <p>
                            Cash-In
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('cash_out') }}" class="nav-link">
                        <p>
                            Cash-Out
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('cash_out_details') }}" class="nav-link">
                        <p>
                            Cash-Out-Details
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('display_in') }}" class="nav-link">
                        <p>
                            Cash-in Details
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category-in') }}" class="nav-link">
                        <p>
                            Add Cash-In Catetory
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category-out') }}" class="nav-link">
                        <p>
                            Add Cash-Out Catetory
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            To-Do
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
