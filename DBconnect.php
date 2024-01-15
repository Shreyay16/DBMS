<?php
$conn = mysqli_connect('localhost','root','','appointment',4306);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>