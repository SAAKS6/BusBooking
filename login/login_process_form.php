<?php
session_start();
include_once('../DATABASE/db.php');

// $username = $_POST['username'];
$username = $_POST['username'];
$pass = $_POST['password'];

// Prepare and execute the SQL statement
$sql = "SELECT * FROM admin WHERE Name = '". $username ."' AND Pass = '". $pass ."'";

if ($conn->query($sql) == TRUE) {
    $_SESSION["uname"] = $username;
    $conn->close();
    header("Location: http://localhost/webProject/busBooking/home/home.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
}

?>