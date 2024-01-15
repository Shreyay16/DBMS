<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="main.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(Images/Pic6.jpg);
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            margin-top: 20px;
            margin-left: 50px; /* Adjust the left margin as needed */
            background-color: transparent; /* Set background color to transparent */
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .header {
            z-index: 1;
            position: relative;
            text-align: center;
        }

        .sucontainer {
            background-color:white; /* Set background color to transparent */
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <ul>
            <li style="float: left; border-right: none;"><a href="Login.php" class="logo"><img src="Images/Pic9.png" width="70px" height="60px"> <strong> BookWell </strong> Online Appointment System </a></li>
            <li> <a href="AdminPage.php">BACK</a></li>
        </ul>
    </div>

    <div class="sucontainer">
        <h2>Available Doctors</h2>
        <table>
            <tr>
                <th>Doctor ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Experience (years)</th>
                <th>Specialization</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Region</th>
            </tr>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'appointment', 4306);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT * FROM doctor";
            $results = mysqli_query($conn, $query);

            if (mysqli_num_rows($results) > 0) {
                while ($row = mysqli_fetch_assoc($results)) {
                    echo "<tr>";
                    echo "<td>" . $row['DID'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['dob'] . "</td>";
                    echo "<td>" . $row['experience'] . "</td>";
                    echo "<td>" . $row['specialisation'] . "</td>";
                    echo "<td>" . $row['contact'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['region'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No doctors found</td></tr>";
            }
        ?>
        </table>
    </div>
</body>

</html>
