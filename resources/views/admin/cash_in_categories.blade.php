<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
                            <h4 class="text-center font-medium text-3xl  mb-2"> CASH-IN CATEGORES
                            </h4>
                            <div>
                                <table class="table">
                                    <thead class="bg-red-950">
                                        {{-- class= " bg-gradient-to-r from-amber-500 to-pink-500" --}}
                                        <tr class="text-white">
                                            <th>
                                                name
                                            </th>
                                            <th class="mr-2" style="text-align: end">
                                                actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $show)
                                            <tr>
                                                <td>
                                                    {{ $show->category }}
                                                </td>
                                                <td>
                                                    <div class="flex justify-end">
                                                        <div class="mr-2">
                                                            <a href="{{ route('edit.cashin.categories', ['id' => $show->id, 'branch_id' => $branch_id]) }}"
                                                                class="items-center justify-center text-blue rounded-lg text-lg p-1 hover:bg-blue-200">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                        {{-- <div>
                                                            <a href=""
                                                                class=" items-center justify-center text-red text-lg rounded-lg p-1 hover:bg-red-200"><i
                                                                    class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </div> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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
