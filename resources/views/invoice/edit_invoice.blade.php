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
                        <div class="col-lg-8 mx-auto bg-gray-100 shadow-md rounded py-3">
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
                            <form action="{{ route('update.invoice', ['id' => $findItem->id, 'branch_id' => $branch_id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <p
                                        class="bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90% text-white rounded-xl py-2.5 text-center m-3">
                                        EDIT INVOICE
                                    </p>
                                    <div class="grid grid-cols-1 gap-4">
                                        <div class="px-4 py-2">
                                            <p class="text-purple-800 font-bold">Invoice to:</p>
                                            <div>
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $findItem->name }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="company"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company
                                                    Name</label>
                                                <input type="text" name="company" id="company"
                                                    value="{{ $findItem->company }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="mobile"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile</label>
                                                <input type="text" name="mobile" id="mobile"
                                                    value="{{ $findItem->mobile }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="address"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                                <textarea name="address" id="address" cols="30" rows="2" value="{{ $findItem->address }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                            </div>
                                            <div>
                                                <label for="partner_code"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Partner
                                                    Code</label>
                                                <input type="text" name="partner_code" id="partner_code"
                                                    value="{{ $findItem->partner_code }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="small"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Invoice
                                                    Type</label>
                                                <select id="invoice_type" name="invoice_type"
                                                    value="{{ $findItem->invoice_type }}"
                                                    class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-xl bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Choose an option</option>
                                                    <option value="received">Received</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="FR">France</option>
                                                    <option value="DE">Germany</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="invoice_date"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Invoice
                                                    date</label>
                                                <input type="date" name="date" id="date"
                                                    value="{{ $findItem->date }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <p class="text-purple-800 font-bold">Payment information</p>
                                            <div>
                                                <label for="activity"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activity</label>
                                                <input type="text" name="activity_name" id="activity_name"
                                                    value="{{ $findItem->activity_name }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="quantity"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                                <input type="number" name="quantity" id="quantity"
                                                    value="{{ $findItem->quantity }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="rate"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate</label>
                                                <input type="number" name="rate" id="rate"
                                                    value="{{ $findItem->rate }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="amount"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                                <input type="number" name="amount" id="amount"
                                                    value="{{ $findItem->amount }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <p class="text-purple-800 font-bold">Bank Inforamtion</p>
                                            <div>
                                                <label for="acount_name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account
                                                    Name</label>
                                                <input type="text" name="account_name" id="acount_name"
                                                    value="{{ $findItem->account_name }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="acount_no"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account
                                                    Number</label>
                                                <input type="number" name="account_no" id="acount_no"
                                                    value="{{ $findItem->account_no }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="bank_name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank
                                                    Name</label>
                                                <input type="text" name="bank_name" id="bank_name"
                                                    value="{{ $findItem->account_no }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="transaction_date"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction
                                                    Date</label>
                                                <input type="date" name="transaction_date" id="transaction_date"
                                                    value="{{ $findItem->transaction_date }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="reference_code"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reference
                                                    Code</label>
                                                <input type="text" name="reference_code" id="reference_code"
                                                    value="{{ $findItem->reference_code }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="initiator"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Initiator</label>
                                                <input type="text" name="initiator" id="initiator"
                                                    value="{{ $findItem->initiator }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="subtotal"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subtotal</label>
                                                <input type="number" name="subtotal" id="subtotal"
                                                    value="{{ $findItem->subtotal }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="vat"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vat</label>
                                                <input type="number" name="vat" id="vat"
                                                    value="{{ $findItem->vat }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <div>
                                                <label for="total"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                                                <input type="number" name="total" id="total"
                                                    value="{{ $findItem->total }}"
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-xl bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>

                                        </div>
                                    </div>

                                    <hr class="mt-3">
                                    <div class="mt-3 ml-3">
                                        <button type="submit"
                                            class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500 py-2 px-5 rounded-xl text-white">submit</button>
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
