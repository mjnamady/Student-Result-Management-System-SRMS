<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRMS | Student Result Management System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5; /* Light gray background color for the page */
        }
        .card-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff; /* White background color for the card */
            border-radius: 10px; /* Rounded corners for the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for the card */
        }
        .fit-content {
            width: 1%;
            white-space: nowrap;
        }
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        .card-header div {
            margin-bottom: 10px;
        }
        .page-header {
            text-align: center;
            padding: 10px 0px;
            margin-bottom: 10px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Student's Result</h1>
    </div>
    <div class="container mt-3">
        <div class="card card-container">
            <div class="card-header">
                <div><strong>Student Name:</strong> John Doe</div>
                <div><strong>Roll ID:</strong> 12345</div>
                <div><strong>Class:</strong> 10</div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="fit-content">#</th>
                            <th>Subjects</th>
                            <th>Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mathematics</td>
                            <td>85</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>English</td>
                            <td>78</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Science</td>
                            <td>92</td>
                        </tr>
                       
                        <tr>
                            <td colspan="2" class="text-right"><strong>Total Marks</strong></td>
                            <td>417</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right"><strong>Percentage</strong></td>
                            <td>83.4%</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center">
                                <a href="javascript:window.print()" class="btn btn-primary">Print Result</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
