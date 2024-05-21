{{-- <!DOCTYPE html>
<html>

<head>
    <title>Delice Placement International</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <style>
        body {
            margin-top: 20px;
            color: #484b51;
        }

        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 140% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(121, 169, 197, .92) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #68a3d5 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }

        .mr {
            margin-right: 45px !important;
        }
    </style>
</head>

<body>
    <div class="page-content  container">

        <div class=" px-0">
            <div class="row mt-3">
                <div class="col-12 col-lg-12">
                    <div class="row mt-4 mb-4 d-flex align-items-center justify-content-center">
                        <div class="mx-auto text-center">
                            <div class="mx-auto">
                                <img alt="logo" src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                    style="width: 71px; border-radius: 43px;">
                            </div>
                            <div class="mx-auto">
                                <span class="text-600 text-110 text-blue">Delice Placement International.</span>
                            </div>
                        </div>
                    </div <div class="row">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div>
                                <span class=" text-blue align-middle">Delice Placement International.</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    16 Gulshan Avenue,
                                </div>
                                <div class="my-1">
                                    Dhaka, Bangladesh
                                </div>
                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                        class="text-600">111-111-111</b></div>
                            </div>
                            <div class="mt-3">
                                <h6>Agent Name: Emran Hossain</h6>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div>
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice: 2313
                                </div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">ID:</span> #111-222</div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Date:</span> {{ $cashOutData->date }}</div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="col-md-12 mt-5">
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category</th>
                                <th>Purpose</th>
                                <th>Payment mode</th>
                                <th>Name</th>
                                <th>Amount</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $cashOutData->category }}</td>
                                <td>{{ $cashOutData->purpose }}</td>
                                <td>{{ $cashOutData->payment_mode }}</td>
                                <td>{{ $cashOutData->pbn }}</td>
                                <td>{{ $cashOutData->amount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- <div class="d-flex justify-content-around"">
      <div>Accountant sign</div>
      <div> Authorized Sign</div>
      <div>Client Sign</div>
     </div> -->


            </div>
        </div>

        <hr class="mt-5">

        <div class="d-flex justify-content-between">
            <div>
                <h5>Total</h5>
            </div>
            <div>
                {{ $cashOutData->amount }}
            </div>
        </div>


        <div class="d-flex justify-content-between px-5" style="margin-top: 120px; display:block; ">
            <div class="border-bottom">Accountant Sign</div>
            <div class="border-bottom">Authorized SIgn</div>
            <div class="border-bottom">Receiver sign</div>
        </div>
    </div>

    </div>
    </div>

    <script>
        // Wait for the document to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Trigger the back navigation after a delay (adjust the delay as needed)
            setTimeout(function() {
                window.history.back(); // Go back to the previous page
            }, 3000); // Adjust the delay (in milliseconds) based on your needs
        });
    </script>

</body>

</html> --}}


<!DOCTYPE html>
<html>

<head>
    <title>Delice Placement International</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .container {
            margin-top: 30px;
            width: 960px;
            height: 100vh;
            background-color: burlywood;
        }

        .first-div {
            overflow: auto;
            padding: 30px;
        }

        .head-left {
            float: left;


        }

        .head-right {
            float: right;

        }

        .head-right p {
            line-height: 1;
            /* Adjust this value to reduce the line height */
        }

        .parent {
            /* background: gray; */
            height: 200px;
            width: 300px;
            position: relative;
        }

        .child {
            /* background-color: orange; */
            position: absolute;
            top: 25%;
            left: 70%;
            border: none;
            border-radius: 10px;
            transform: translate(-50%, -50%);
        }

        .margin {
            margin-top: 130px;
        }

        .margin p {
            line-height: 1;
        }

        table {
            width: 100%;

            /* padding: 20px; */
        }

        table,
        th,
        td {
            border: none;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <div class="first-div">
            <div class="head-left">
                <h4 style="color:brown;">Delice Placement Private Limited</h4>
                <address style="font-size: 11px">
                    B-3/87, VIVEK KHAND GOMTI NAGAR, <br>
                    Gomtinagar, Lucknow, <br>
                    Lucknow- 226010, Uttar Pradesh, <br>
                    India. <br>

                </address>
            </div>
            <div class="head-right parent">
                <img class="child" style="width: 300px; height: 170px; margin-top: 5px;" src="admin/image/main_logo.png"
                    alt="logo">
            </div>
        </div>
        <h4 style="padding-left: 30px; color:brown;">INVOICE</h4>
        <div class="first-div" style="font-size: 11px; margin-top: 30px;">
            <div class="head-left">
                <p style="font-weight: bold;">INVOICE TO</p>
                <address>
                    <span style="font-weight: bold;"> {{ $cashOutData->pbn }}</span>.<br>
                 
                    Mobile:{{ $cashOutData->pbm }}
                </address>
            </div>
          
        </div>
        <div class="margin">
            <p style="text-align: center; color:brown; font-weight: bold;">Amount Received</p>
            <hr style="border: 2px solid;">
        </div>

        <div>

            <table>
                <thead style="background-color: rgb(175, 118, 118); padding: 10px; text-align:center;">
                    <tr>
                        <th>Sl</th>
                        <th>Category</th>
                        <th>Purpose</th>
                        <th>Payment mode</th>
                        <th>Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="center">
                        <td>1</td>
                        <td>{{ $cashOutData->category }}</td>
                        <td>{{ $cashOutData->purpose }}</td>
                        <td>{{ $cashOutData->payment_mode }}</td>
                        <td>{{ $cashOutData->pbn }}</td>
                        <td>{{ $cashOutData->amount }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- <div style="font-size: 11px;" class="margin">
            <h5 style="margin-bottom: 15px;">Payment by Bank Transfer to:</h5>
            <p><span style="font-weight: bold;">Account Name:</span>{{ $invoiceData->account_name }}</p>
            <p><span style="font-weight: bold;">Account No:</span>{{ $invoiceData->account_no }}</p>
            <p><span style="font-weight: bold;">Bank Name:</span>{{ $invoiceData->bank_name }}</p>
            <p><span style="font-weight: bold;">Transaction Date:</span>{{ $invoiceData->transaction_date }}</p>
            <p><span style="font-weight: bold;">Reference Code:</span>{{ $invoiceData->reference_code }}</p>
            <p><span style="font-weight: bold;">Initiator:</span>{{ $invoiceData->initiator }}</p>
            <p><span style="font-weight: bold;">Total:</span>7{{ $invoiceData->total }}</p>
            <p><span style="font-weight: bold;">vat:</span>{{ $invoiceData->vat }}</p>
            <p><span style="font-weight: bold;">Subtotal:</span>{{ $invoiceData->subtotal }}</p>
        </div> --}}

    </div>

    <script>
        // Wait for the document to be ready
        document.addEventListener('DOMContentLoaded', function() {
            // Trigger the back navigation after a delay (adjust the delay as needed)
            setTimeout(function() {
                window.history.back(); // Go back to the previous page
            }, 3000); // Adjust the delay (in milliseconds) based on your needs
        });
    </script>

</body>

</html>
