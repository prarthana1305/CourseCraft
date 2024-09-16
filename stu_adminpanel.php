<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "course_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "CALL GetStudentList()"; // Call the stored procedure
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: black;
            color: white;
            padding: 15px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .display {
            margin: 0;
            padding: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .first-row {
            background-color: #894456;
            color: white;
        }

        .card-details {
            padding: 20px;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
        }

        td button {
            padding: 5px 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        td button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="display">STUDENT LIST</h2>
            </div>
            <div class="card-details">
                <table class="table">
                    <thead>
                        <tr class="first-row">
                            <th>Student ID</th>
                            <th>Student Name</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Student_id"] . "</td>";
                                echo "<td>" . $row["Student_name"] . "</td>";
                              
                            }
                        } else {
                            echo "<tr><td colspan='3'>0 results</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
