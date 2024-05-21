<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-red-950" {{-- style="background: linear-gradient(to right, #ec008c, #fc6767); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ --}} ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        {{-- <img src="admin/image/mainLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> --}}
        <span class="brand-text font-weight-bold text-white-900 ml-4">DELICE PLACEMENT</span>
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


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item menu-open mb-2" style=" background: linear-gradient(to right, #1a2980, #26d0ce);">
                    <a href="{{ route('dashboard', $branch_id) }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item rounded-lg bg-gradient-to-r from-blue-800 to-indigo-900 mb-2 ">
                    <div class="nav-link">
                        <i class=" fas fa-solid fa-sack-dollar mr-2 text-white"></i>
                        <p class="text-white">
                            CASH_IN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </div>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('cash_in', $branch_id) }}" class="nav-link">
                                <i class="fa-solid fa-coins mr-2"></i>
                                <p>Cash-In form</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('display_in', $branch_id) }}" class="nav-link">
                                <i class="fa-regular fa-rectangle-list mr-2"></i>
                                <p>Cash-in Records</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category-in', $branch_id) }}" class="nav-link">
                                <i class="fa-solid fa-plus-minus mr-2"></i>
                                <p>Add category</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item bg-gradient-to-r from-blue-800 to-indigo-900 rounded-lg mb-2">
                    <div class="nav-link">
                        <i class="fa-solid fa-sack-xmark mr-2 text-white"></i>
                        <p class="text-white">
                            CASH_OUT
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </div>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('cash_out', $branch_id) }}" class="nav-link">
                                <i class="fa-solid fa-money-bill-transfer mr-2"></i>
                                <p>Cash-Out form</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('cash_out_details', $branch_id) }}" class="nav-link">
                                <i class="fa-regular fa-rectangle-list mr-2"></i>
                                <p>Cash-Out Records</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category-out', $branch_id) }}" class="nav-link">
                                <i class="fa-solid fa-plus-minus mr-2"></i>
                                <p>Add category</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item bg-gradient-to-r from-blue-800 to-indigo-900 rounded-lg mb-2">

                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-shekel-sign mr-2"></i>
                        <p class="text-white">
                            CATEGORIES
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('cat-in-list', $branch_id) }}" class="nav-link">
                                <i class="fa-solid fa-paperclip mr-2"></i>
                                <p>Cash-In Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cat-out-list', $branch_id) }}" class="nav-link">
                                <i class="fa-solid fa-paperclip mr-2"></i>
                                <p>Cash-Out Categories</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item bg-gradient-to-r from-blue-800 to-indigo-900 rounded-lg mb-2">
                    <div class="nav-link">
                        <i class="fa-solid fa-money-bills mr-2 text-white"></i>
                        <p class="text-white">
                            INVOICE
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </div>
                    {{-- <a href="{{ route('invoice.form') }}" class="nav-link ">
                        <i class="fa-solid fa-money-bills mr-2"></i>
                        <p class="text-white">
                            INVOICE
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a> --}}
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('invoice.form', $branch_id) }}" class="nav-link">
                                <i class="fa-regular fa-keyboard"></i>
                                <p>Invoice Form</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('invoice.list', $branch_id) }}" class="nav-link">
                                <i class="fa-regular fa-rectangle-list mr-2"></i>
                                <p>Invoice List</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
