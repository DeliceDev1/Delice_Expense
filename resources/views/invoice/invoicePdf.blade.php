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
                    {{ $invoiceData->sender_name }} <br>
                    {{ $invoiceData->sender_designation }} <br>
                    {{ $invoiceData->sender_address }} <br>
                    {{ $invoiceData->sender_country }} <br>

                    Phone: {{ $invoiceData->sender_mobile }}

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
                    <span style="font-weight: bold;"> {{ $invoiceData->name }}</span>.<br>
                    {{ $invoiceData->company }}<br>
                    {{ $invoiceData->address }}<br>
                    {{ $invoiceData->country }}<br>
                    Mobile:{{ $invoiceData->mobile }}
                </address>
            </div>
            <div class="head-right" style="padding-right: 60px; margin-top: 5px;">
                <p><span style="font-weight: bold;">INVOICE NO: </span> {{ $invoiceData->id }}</p>
                <p><span style="font-weight: bold;">INVOICE TYPE:</span> {{ $invoiceData->invoice_type }}</p>
                <p><span style="font-weight: bold;">INVOICE DATE:</span> {{ $invoiceData->date }}</p>
                <p><span style="font-weight: bold;">PARTNER CODE:</span> {{ $invoiceData->partner_code }}</p>
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
                        <th>Activity</th>
                        <th>Qty</th>
                        <th>Rate</th>
                        <th>Amount</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="center">
                        <td>
                            {{ $invoiceData->activity_name }}
                        </td>
                        <td></td>
                        <td>
                            {{ $invoiceData->rate }}
                        </td>
                        <td>
                            {{ $invoiceData->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="font-size: 11px;" class="margin">
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
