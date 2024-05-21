{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .text-600 {
            font-weight: bold;
        }

        .text-blue {
            color: blue;
        }

        .text-grey-m2 {
            color: #888;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-center {
            justify-content: center;
        }

        .mx-auto {
            margin: auto;
        }

        .mt-3 {
            margin-top: 3px;
        }

        .mb-4 {
            margin-bottom: 4px;
        }

        .px-4 {
            padding-left: 4px;
            padding-right: 4px;
        }

        .col-sm-6 {
            width: 50%;
        }

        .text-95 {
            font-size: 0.95em;
        }

        .col-md-12 {
            width: 100%;
        }

        img {
            width: 71px;
            border-radius: 43px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        hr {
            border: 1px solid #ddd;
            margin-top: 15px;
        }

        h5 {
            margin: 0;
        }

        .border-bottom {
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">
                    <div class="row mt-4 mb-4 d-flex align-items-center justify-content-center">
                        <div class="mx-auto text-center">
                            <div class="mx-auto">
                                <img alt="logo" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                            </div>
                            <div class="mx-auto">
                                <span class="text-600 text-110 text-blue">Delice Placement International.</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="col-sm-6">
                                <div>
                                    <span class="text-blue align-middle">Delice Placement International.</span>
                                </div>
                                <div class="text-grey-m2">
                                    <div class="my-1">
                                        16 Gulshan Avenue,
                                    </div>
                                    <div class="my-1">
                                        Dhaka, Bangladesh
                                    </div>
                                    <div class="my-1">
                                        <i class="fa fa-phone fa-flip-horizontal text-secondary"></i>
                                        <b class="text-600">111-111-111</b>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6>Agent Name: {{ $clientDetail->agent }}</h6>
                                </div>
                            </div>

                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Invoice: 2313
                                    </div>
                                    <div class="my-2">
                                        <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                        <span class="text-600 text-90">ID:</span> #111-222
                                    </div>
                                    <div class="my-2">
                                        <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                        <span class="text-600 text-90">Date:</span> Oct 12, 2019
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-5">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Payment mode</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ $clientDetail->category }}</td>
                                    <td>{{ $clientDetail->date }}</td>
                                    <td>{{ $clientDetail->received }}</td>
                                    <td>{{ $clientDetail->cpn }}</td>
                                    <td>{{ $clientDetail->amount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr class="mt-5">

                    <div style="width: 100%; overflow: hidden;">
                        <div style="float: left;">
                            <h5 style="margin: 0;">Total</h5>
                        </div>
                        <div style="float: right; margin-right: 40px;">
                            2000000
                        </div>
                    </div>

                    <div class="d-flex justify-content-between px-5" style="margin-top: 100px;">
                        <div class="border-bottom">Accountant Sign</div>
                        <div class="border-bottom">Authorized SIgn</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        <div class="first-div" style="font-size: 11px">
            <div class="head-left">
                <p style="font-weight: bold;">INVOICE TO</p>
                <address>
                    <span style="font-weight: bold;"> {{ $clientDetail->cpn }}</span>.<br>
                    Mobile:{{ $clientDetail->cpm }}
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
                        <th>Date</th>
                        <th>Payment mode</th>
                        <th>Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="center">
                        <td>1</td>
                        <td>{{ $clientDetail->category }}</td>
                        <td>{{ $clientDetail->date }}</td>
                        <td>{{ $clientDetail->received }}</td>
                        <td>{{ $clientDetail->cpn }}</td>
                        <td>{{ $clientDetail->amount }}</td>
                    </tr>
                </tbody>
            </table>
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

</html>
