<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    @vite('resources/css/app.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        @include('admin.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div id="app" class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="mb-2">
                        <div class="col-md-4 mx-auto">
                            <h4 class="text-center mb-2">ADD CASH-IN CATEGORY </h4>
                            <div>
                                <form action="" method="post">
                                    <input type="text" name="" id=""
                                        class="bg-gray-300 rounded-md w-full mb-1">
                                    <button type="submit"
                                        class="bg-red-600 rounded-md text-white px-4 py-2">add</button>
                                </form>

                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


        </div>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('admin.js')

    @vite('resources/js/app.js')





</body>

</html>
