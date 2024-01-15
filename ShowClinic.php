<!DOCTYPE html>
<html>
<head>
    <title>Show Clinics</title>
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
    <h2>Available Clinics</h2>
    <table>
        <tr>
            <th>Clinic ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Town</th>
            <th>City</th>
            <th>Contact</th>
        </tr>

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'appointment', 4306);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM clinic";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['CID'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['town'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No clinics found</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
