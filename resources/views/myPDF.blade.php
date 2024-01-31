<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h3>{{ $title }}</h3>
    <p>{{ $date }}</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Purpose</th>
            <th>Payment Mode</th>
            <th>Name</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>{{ $cashOutData->id }}</td>
            <td>{{ $cashOutData->category }}</td>
            <td>{{ $cashOutData->purpose }}</td>
            <td>{{ $cashOutData->payment_mode }}</td>
            <td>{{ $cashOutData->pbn }}</td>
            <td>{{ $cashOutData->amount }}</td>
        </tr>
    </table>

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
