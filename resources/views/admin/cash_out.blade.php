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
                        <div
                            class=" bg-gradient-to-l from-gray-200 via-fuchsia-200 to-stone-100 p-4 rounded-lg shadow-xl">

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



                            <form action="{{ route('form_out', $branch_id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <p class="bg-red-950 text-center text-white py-2.5 rounded m-3">
                                        CASH-OUT-DETAILS

                                    </p>

                                    <div class="grid grid-cols-2 gap-2 p-3">
                                        <div>
                                            <label for="">Category</label>
                                            <select name="category" id=""
                                                class="w-full border border-gray-300 rounded-xl">

                                                <option value="">--select a category--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category }}">{{ $category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div>
                                            <label for="">Branch</Select></label>
                                            <select id="branch" name="branch"
                                                class="w-full border border-gray-300 rounded-xl">
                                                <option value="">--choose a branch--</option>
                                                <option value="dhaka">Dhaka</option>
                                                <option value="delhi">Delhi</option>
                                                <option value="lucknow">Lucknow</option>
                                                <option value="nepal">Neapl</option>
                                            </select>
                                        </div> --}}

                                        <div>
                                            <label for="date">Date</label>
                                            <input type="date" name="date" id=""
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="amount">Amount</label>
                                            <input type="number" name="amount" id=""
                                                placeholder="Enter the amount"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="purpose">Purpose</label>
                                            <input type="text" name="purpose" id=""
                                                placeholder="Enter the purpose of cost"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="payment_mode">Payment Mode</label>
                                            <select name="payment_mode" id=""
                                                class="w-full border border-gray-300 rounded-xl">
                                                <option value="">--select an option--</option>
                                                <option value="cash">Cash</option>
                                                <option value="bank_transfer">Bank Transfer</option>
                                                <option value="cash_book">Cash Book</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="pbn">Payment By Name</label>
                                            <input type="text" name="pbn" id=""
                                                placeholder="Enter the name"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="pbm">Payment By Number</label>
                                            <input type="number" name="pbm" id=""
                                                placeholder="Enter the number"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="tax">Tax</label>
                                            <input type="number" name="tax" id=""
                                                placeholder="Enter tax amount"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="agent">Agent</label>
                                            <input type="text" name="agent" id=""
                                                placeholder="Enter the agent name"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="agent">Images</label>
                                            <input type="file" name="image_path" id=""
                                                class="w-full border border-gray-300 rounded-xl p-1 bg-white">
                                        </div>




                                    </div>
                                    <hr class="mt-3">
                                    <div class="mt-3">
                                        <button type="submit"
                                            class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 py-2 px-4 text-white rounded-xl ml-3">
                                            Save</button>
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
