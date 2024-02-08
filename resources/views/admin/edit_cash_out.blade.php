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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="mb-2">

                        <div>
                            @if (Session::has('msg'))
                                <div class="bg-green-200 border border-red-400 text-red-700 px-4 py-3 mb-2 rounded relative"
                                    role="alert">
                                    <strong class="font-bold">Hurrahhh!</strong>
                                    <span class="block sm:inline">{{ Session::get('msg') }}</span>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <title>Close</title>
                                            <path
                                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                        </svg>
                                    </span>
                                </div>
                            @endif
                            <form action="{{ route('update_out', $edit_data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <p class="bg-purple-700 text-center px-4 py-2 text-2xl rounded-lg text-white mb-3">
                                        EDit_CASH-OUT-DATA
                                    </p>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label for="">Category</label>

                                            <select name="category" id=""
                                                class="w-full border border-gray-300 rounded-xl">
                                                <option value="">--select an option--</option>
                                                <option value="category-1"
                                                    {{ $edit_data->category === 'category-1' ? 'selected' : '' }}>
                                                    category-1</option>
                                                <option value="category-2"
                                                    {{ $edit_data->category === 'category-2' ? 'selected' : '' }}>
                                                    category-2</option>
                                                <option value="category-3"
                                                    {{ $edit_data->category === 'category-3' ? 'selected' : '' }}>
                                                    category-3</option>
                                                <option value="category-4"
                                                    {{ $edit_data->category === 'category-4' ? 'selected' : '' }}>
                                                    category-4</option>
                                                <option value="category-5"
                                                    {{ $edit_data->category === 'category-5' ? 'selected' : '' }}>
                                                    category-5</option>
                                                <option value="category-6"
                                                    {{ $edit_data->category === 'category-6' ? 'selected' : '' }}>
                                                    category-6</option>
                                            </select>

                                        </div>

                                        <div>
                                            <label for="">Date</label>
                                            <input type="date" name="date" id=""
                                                value="{{ $edit_data->date }}"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Amount</label>
                                            <input type="number" name="amount" id=""
                                                placeholder="Enter the amount" value="{{ $edit_data->amount }}"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Purpose</label>
                                            <input type="text" name="purpose" id=""
                                                placeholder="Enter the purpose of cost"
                                                value="{{ $edit_data->purpose }}"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Payment Mode</label>
                                            <select name="payment_mode" id=""
                                                class="w-full border border-gray-300 rounded-xl">
                                                <option value="">--select an option--</option>
                                                <option value="cash"
                                                    {{ $edit_data->payment_mode === 'cash' ? 'selected' : '' }}>Cash
                                                </option>
                                                <option value="bank_transfer"
                                                    {{ $edit_data->payment_mode === 'bank_transfer' ? 'selected' : '' }}>
                                                    Bank Transfer</option>
                                                <option value="cash_book"
                                                    {{ $edit_data->payment_mode === 'cash_book' ? 'selected' : '' }}>
                                                    Cash Book</option>
                                                <option value="others"
                                                    {{ $edit_data->payment_mode === 'others' ? 'selected' : '' }}>
                                                    Others</option>
                                            </select>

                                        </div>

                                        <div>
                                            <label for="">Payment By Name</label>
                                            <input type="text" name="pbn" id=""
                                                placeholder="Enter the name" value="{{ $edit_data->pbn }}"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Payment By Number</label>
                                            <input type="number" name="pbm" id=""
                                                placeholder="Enter the number" value="{{ $edit_data->pbm }}"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Tax</label>
                                            <input type="number" name="tax" id=""
                                                placeholder="Enter tax amount" value="{{ $edit_data->tax }}"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Agent</label>
                                            <input type="text" name="agent" id=""
                                                placeholder="Enter the agent name" value="{{ $edit_data->agent }}"
                                                class="w-full border border-gray-300 rounded-xl">
                                        </div>

                                        <div>
                                            <label for="">Images</label>
                                            @php
                                                $baseUrl = URL::to('/');
                                            @endphp
                                            <img class="w-40 h-25" src="{{ $edit_data->image_path }}" alt="image">
                                            <input type="file" name="image_path" id=""
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

        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('admin.js')


</body>

</html>
