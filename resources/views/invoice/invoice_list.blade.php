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
                        <div class="col-lg-10 mx-auto bg-gray-100 shadow-xl rounded py-3">
                            @if (Session::has('msg'))
                                <!-- Include SweetAlert JS -->
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                <!-- Display SweetAlert -->
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: '{{ Session::get('msg') }}',
                                    });
                                </script>
                            @endif
                            <div>


                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <div class="text-center">
                                        <p
                                            class="bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 inline-block text-transparent bg-clip-text  text-3xl font-bold">
                                            Invoice List</p>
                                    </div>
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 text-center rounded ">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Invoice No
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Activity Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Mobile
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Partner Code
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Amount
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Download
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoiceData as $data)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $data->id }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $data->name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $data->activity_name }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $data->mobile }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $data->partner_code }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $data->amount }}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        <a href="{{ route('edit.invoice', ['id' => $data->id, 'branch_id' => $branch_id]) }}"
                                                            class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2">Edit</a>
                                                        <a href="{{ route('delete.invoice', ['id' => $data->id, 'branch_id' => $branch_id]) }}"
                                                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2">Delete</a>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="{{ route('download.invoice', ['id' => $data->id, 'branch_id' => $branch_id]) }}"
                                                            class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Download</a>
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

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
