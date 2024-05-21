{{-- <!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    @vite('resources/css/app.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   
    <!-- Navbar -->
    @include('admin.navbar')
    <!-- /.navbar -->
    <div>
        <div class="container">
            <h1 class=" text-purple text-center text-3xl py-3 mb-32"> Select Branch</h1>

            <div class="grid grid-cols-4 gap-4 h-36">
                <div class="bg-purple-600 w-full flex justify-center items-center">
                    <a href="{{ route('dashboard', 1) }}" class="text-4xl font-bold text-white">Dhaka</a>
                </div>
                <div class="bg-purple-600 w-full flex justify-center items-center">
                    <a href="{{ route('dashboard', 2) }}" class="text-4xl font-bold text-white">Delhi</a>
                </div>
                <div class="bg-purple-600 w-full flex justify-center items-center">
                    <a href="{{ route('dashboard', 3) }}" class="text-4xl font-bold text-white">Lucknow</a>
                </div>
                <div class="bg-purple-600 w-full flex justify-center items-center">
                    <a href="{{ route('dashboard', 4) }}" class="text-4xl font-bold text-white">Nepal</a>
                </div>
            </div>

        </div>

    </div>
  
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- jQuery -->
    @include('admin.js')
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    @vite('resources/css/app.css')

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('admin/image/expense_back.jpg');
            /* Replace 'path/to/your/image.jpg' with the path to your image */
            background-size: cover;

            background-position: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Navbar -->
    {{-- @include('admin.navbar') --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light"
        style="background-color: transparent; border:none;">
        <!-- Left navbar links -->


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <x-app-layout></x-app-layout>
            </li>

        </ul>
    </nav>

    <!-- /.navbar -->
    <div>
        <div class="container">
            <div class="flex justify-center  mt-5">
                <img src="admin/image/main_logo.png" alt="" style="width: 370px; height: 200px; padding: 5px">
            </div>
            <h1 class="text-purple text-center text-medium py-3 mt-2 mb-2"> Select Branch</h1>

            <div class="grid grid-cols-4 gap-4 h-36">
                <div class="bg-red-950 bg-opacity-50 w-full flex justify-center items-center">
                    <a href="{{ route('dashboard', 1) }}" class="text-3xl font-bold text-white">Dhaka</a>
                </div>
                <div class="bg-red-950 bg-opacity-50 w-full flex justify-center items-center">
                    <a href="{{ route('dashboard', 2) }}" class="text-3xl font-bold text-white">Delhi</a>
                </div>
                <div class="bg-red-950 bg-opacity-50 w-full flex justify-center items-center">
                    <a href="{{ route('dashboard', 3) }}" class="text-3xl font-bold text-white">Lucknow</a>
                </div>
                <div class="bg-red-950 bg-opacity-50 w-full flex justify-center items-center">
                    <a href="{{ route('dashboard', 4) }}" class="text-3xl font-bold text-white">Nepal</a>
                </div>
            </div>

        </div>

    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- jQuery -->
    @include('admin.js')
</body>

</html>
