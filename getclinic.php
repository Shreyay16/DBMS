<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("DBconnect.php"); // Assuming DBconnect.php contains the database connection code

if(isset($_POST["city"])){
    $city = $_POST["city"];
    $query = "SELECT * FROM clinic WHERE City = '$city'";
    $results = $conn->query($query);

    if ($results->num_rows > 0) {
        echo '<option value="">Select Clinic</option>';
        while($rs = $results->fetch_assoc()) {
            echo '<option value="' . $rs["CID"] . '">' . $rs["name"] . '-' . $rs["town"] . '(CID-' . $rs["CID"] . ')</option>';
        }
    } else {
        echo '<option value="">No clinics found</option>';
    }
}
else{
    echo '<option value="">Select a city first</option>';
}
?>
</body>
</html>
