<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("DBconnect.php");

if(isset($_POST["CID"])) {
    $query ="SELECT distinct DID FROM doctor_available WHERE CID = '" . $_POST["CID"] . "'";
    $results = $conn->query($query);

    if($results) {
        echo '<option value="">Select Doctor</option>';
        while($rs = $results->fetch_assoc()) {
            $query1 = "Select distinct name from doctor where DID=" . $rs["DID"];
            $result1 = $conn->query($query1);
            if ($result1) {
                while ($rs1 = $result1->fetch_assoc()) {
                    echo '<option value="' . $rs["DID"] . '">' . $rs["DID"] . ':' . $rs1["name"] . '</option>';
                }
            }
        }
    } else {
        echo "No results found.";
    }
} else {
    echo "CID is not set.";
}
?>
</body>
</html>
