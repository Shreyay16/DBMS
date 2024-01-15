<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css">
</head>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'appointment', 4306);

session_start();
$username = $_SESSION['username'];
$date = date('Y-m-d');

$sql = "SELECT * FROM booking WHERE username = '$username' AND status NOT LIKE 'Cancelled by Patient' AND DOV >= '$date'";
$results = $conn->query($sql);
?>

<body style="background-image: url(Images/Pic6.jpg);">
    <div class="header">
        <ul>
            <li style="float: left; border-right: none;"><a href="Login.php" class="logo"><img src="Images/Pic9.png" width="70px" height="60px"> <strong> BookWell </strong> Online Appointment System </a></li>
            <li> <a href="Login.php">BACK</a></li>
        </ul>
    </div>

    <form action="CancelBooking.php" method="POST">
        <div class="sucontainer">
            <label style="font-size: 30px">Select your Appointment to Cancel:</label><br>
            <select name="Appointment" id="Appointment-list" class="demoInputBox" style="width: 100%; height: 50px; border-radius: 10px;">
                <option value="">Select My Appointment</option>
                <?php
                    while ($rs = $results->fetch_assoc()) {
                        $sql2 = "SELECT * FROM doctor WHERE DID = " . $rs["DID"];
                        $results2 = $conn->query($sql2);

                        while ($rs2 = $results2->fetch_assoc()) {
                            $sql3 = "SELECT * FROM clinic WHERE CID = " . $rs["CID"];
                            $results3 = $conn->query($sql3);

                            while ($rs3 = $results3->fetch_assoc()) {
                                echo '<option value="' . $rs["Timestamp"] . '">Patient: ' . $rs["Fname"] . ' Date: ' . $rs["DOV"] . ' -Dr.' . $rs2["name"] . ' -Clinic: ' . $rs3["name"] . ' -Town: ' . $rs3["town"] . ' - Booked on: ' . $rs["Timestamp"] . '</option>';
                            }
                        }
                    }
                ?>
            </select>
            <button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
        </div>
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $timestamp = $_POST['Appointment'];
            $updatequery = "UPDATE booking SET Status='Cancelled by Patient' WHERE username = '$username' AND Timestamp = '$timestamp'";

            if (mysqli_query($conn, $updatequery)) {
                echo "Appointment Cancelled successfully..!!<br>";
                header("Refresh:2; url=Login.php");
            } else {
                echo "Error: " . $updatequery . "<br>" . mysqli_error($conn);
            }
        }
    ?>
</body>
</html>
