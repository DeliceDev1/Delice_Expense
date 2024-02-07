<!DOCTYPE html>
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
                                        {{-- class="text-600 text-90">Date:</span> {{ $cashOutData->date }}</div> --}} </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        {{-- <div class="col-md-12 mt-5">
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
                </div> --}}

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
                    <div class="mr">
                        {{-- {{ $cashOutData->amount }} --}}
                    </div>
                </div>


                <div class="d-flex justify-content-between px-5" style="margin-top: 150px;">
                    <div class="border-bottom">Accountant Sign</div>
                    <div class="border-bottom">Authorized SIgn</div>
                    <div class="border-bottom">ClientcashOutData</div>
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

</html>
