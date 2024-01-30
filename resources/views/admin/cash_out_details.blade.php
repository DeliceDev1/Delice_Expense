<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-purple-100">
                            <div class="p-4 bg-purple-300 dark:bg-gray-900">
                                <div class="flex items-center justify-end text-white">
                                    <!-- Date Range Picker -->
                                    <div class="flex items-center space-x-4">
                                        <form action="{{ route('filter') }}" class="flex flex-normal space-x-4">
                                            <div class="flex flex-col">
                                                <label for="searchByName"
                                                    class="block text-sm font-medium text-gray-600">Search_By_Agent</label>
                                                <input type="text" id="agent" name="agent"
                                                    placeholder="Enter agent name"
                                                    class="w-full h-10 text-black px-15 border border-purple-600 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="searchByName"
                                                    class="block text-sm font-medium text-gray-600">Search_By_Name</label>
                                                <input type="text" id="pbn" name="pbn"
                                                    placeholder="Enter name"
                                                    class="w-full h-10 text-black px-15 border border-purple-600 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="searchByName"
                                                    class="block text-sm font-medium text-gray-600">Search_By_Number</label>
                                                <input type="number" id="pbm" name="pbm"
                                                    placeholder="Enter mobile number"
                                                    class="w-full h-10 text-black px-15 border border-purple-600 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="startDate"
                                                    class="block text-sm font-medium text-gray-600">Start
                                                    Date</label>
                                                <input type="date" id="startDate" name="start_date"
                                                    class="w-full h-10 text-black px-15 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                            </div>

                                            <div class="flex flex-col">
                                                <label for="endDate"
                                                    class="block text-sm font-medium text-gray-600">End
                                                    Date</label>
                                                <input type="date" id="endDate" name="end_date"
                                                    class="w-full h-10 text-black px-15 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                            </div>


                                            <!-- Other Filters (Add your own as needed) -->
                                            <div class="flex flex-col">
                                                <label for="category"
                                                    class="block text-sm font-medium text-gray-600">Category</label>
                                                <select id="category" name="category"
                                                    class="w-full h-10 text-black px-15 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                                    <option value="">__select an option__</option>
                                                    <option value="category-1">category-1</option>
                                                    <option value="category-2">category-2</option>
                                                    <option value="category-3">category-3</option>
                                                    <option value="category-4">category-4</option>
                                                    <option value="category-3">category-5</option>
                                                    <option value="category-6">category-6</option>
                                                </select>
                                            </div>
                                            <div class="flex flex-col">
                                                <label for="category"
                                                    class="block text-sm font-medium text-gray-600">Payment Mode</label>
                                                <select id="category" name="payment_mode"
                                                    class="w-full h-10 text-black px-15 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                                                    <option value="">__select an option__</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="bank_transfer">Bank Transfer</option>
                                                    <option value="cash_book">Cash Book</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                            <div class="flex flex-col mt-4 ml-3">

                                                <button type="submit"
                                                    class="bg-purple-600 px-3 py-2 text-white border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">Filter
                                                </button>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                            <div class="p-4 responsive">
                                <table
                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                                    <thead class="text-xs uppercase bg-purple-600 text-white rounded-lg">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                No
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Category
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Amount
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Purpose
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Payment Mode
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Payment By Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Payment By Number
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tax
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Agent
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                File
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Actions
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Invoice
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $data)
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-md">

                                                <td class="w-4 p-4">
                                                    {{ $key + 1 }}
                                                </td>

                                                <td class="w-4 p-4">
                                                    {{ $data->category }}
                                                </td>

                                                <td class="w-4 p-4">
                                                    {{ $data->amount }}
                                                </td>

                                                <td class="px-6 py-4">
                                                    {{ $data->date }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $data->purpose }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $data->payment_mode }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $data->pbn }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $data->pbm }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $data->tax }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $data->agent }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{-- <img src="{{ asset('images/' . $data->image_path) }}"
                                                        alt="image---"> --}}
                                                    <img src="{{ asset('images/' . $data->image_path) }}"
                                                        alt="image">
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex">
                                                        <div class="mr-2">
                                                            <a href="{{ route('edit_out', $data->id) }}"
                                                                class="items-center justify-center text-blue rounded-lg text-lg p-1 hover:bg-blue-200">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            {{-- <button
                                                                class=" items-center justify-center text-red text-lg rounded-lg p-1 hover:bg-red-200">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button> --}}
                                                            <a href="{{ route('delete_out', $data->id) }}"
                                                                class=" items-center justify-center text-red text-lg rounded-lg p-1 hover:bg-red-200"><i
                                                                    class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a
                                                        class="bg-purple-600 cursor-pointer hover:bg-blue-500 text-white rounded px-3 py-1 ">pdf</a>
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

        </div>
    </div>
    @include('admin.js')


</body>

</html>
