<?php
session_start();
include_once('../DATABASE/db.php');

// $username = $_POST['username'];
$username = $_POST['username'];
$pass = $_POST['password'];

// Prepare and execute the SQL statement
$sql = "INSERT INTO admin (Name, Pass) VALUES ('".$username."', '".$pass."')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
    $conn->close();
    header("Location: http://localhost/webProject/busBooking/login/login.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
}
?>