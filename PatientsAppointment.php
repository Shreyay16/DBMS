<?php
session_start(); // Start the session
require_once("includes.html"); // Include necessary files

// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'appointment', 4306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch appointments for the logged-in user
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM booking WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Appointments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h2>Your Appointments</h2>
    <table>
        <tr>
            <th>Appointment ID</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Clinic ID</th>
            <th>Doctor ID</th>
            <th>Date of Visit</th>
            <th>Timestamp</th>
            <th>Status</th>
        </tr>

        <?php
        // Fetch and display appointments
        if (isset($result) && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['Fname'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['CID'] . "</td>";
                echo "<td>" . $row['DID'] . "</td>";
                echo "<td>" . $row['DOV'] . "</td>";
                echo "<td>" . $row['Timestamp'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No appointments found</td></tr>";
        }
        ?>

    </table>
</body>
</html>
