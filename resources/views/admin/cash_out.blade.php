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
                        <div>
                            <form action="">
                                <div>
                                    <p class="bg-purple-700 text-center p-1 text-2xl rounded-lg text-white mb-3">
                                        CASH-OUT-DETAILS
                                    </p>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label for="">Category</label>
                                            <select name="" id=""
                                                class="w-full border border-gray-300 rounded-xl">
                                                <option value="category-1">category-1</option>
                                                <option value="category-2">category-2</option>
                                                <option value="category-3">category-3</option>
                                                <option value="category-4">category-4</option>
                                                <option value="category-3">category-5</option>
                                                <option value="category-6">category-6</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="">Date</label>
                                            <input type="date" name="" id=""
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Amount</label>
                                            <input type="number" name="" id=""
                                                placeholder="Enter the amount"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Purpose</label>
                                            <input type="text" name="" id=""
                                                placeholder="Enter the purpose of cost"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Payment Mode</label>
                                            <select name="" id=""
                                                class="w-full border border-gray-300 rounded-xl">
                                                <option value="cash">Cash</option>
                                                <option value="bankt_ransfer">Bank Transfer</option>
                                                <option value="cash_book">Cash Book</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="">Payment By Name</label>
                                            <input type="text" name="" id=""
                                                placeholder="Enter the name"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Payment By Number</label>
                                            <input type="number" name="" id=""
                                                placeholder="Enter the number"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Tax</label>
                                            <input type="number" name="" id=""
                                                placeholder="Enter tax amount"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Agent</label>
                                            <input type="text" name="" id=""
                                                placeholder="Enter the agent name"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Images</label>
                                            <input type="file" name="" id=""
                                                class="w-full border border-gray-300 rounded-lg p-1 bg-white">
                                        </div>


                                    </div>
                                    <hr class="mt-3">
                                    <div class="mt-3">
                                        <button type="submit"
                                            class="bg-blue-600 px-4 py-1 text-white rounded block">Save</button>
                                    </div>
                                </div>
                            </form>
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
