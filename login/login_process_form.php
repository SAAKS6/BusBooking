<?php
session_start();
include_once('../DATABASE/db.php');

// $username = $_POST['username'];
$username = $_POST['username'];
$pass = $_POST['password'];

// Prepare and execute the SQL statement
$sql = "SELECT "."*"." FROM admin WHERE Name"." = "."'". $username ."' AND Pass = '". $pass ."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
        $_SESSION["ANAME"] = $username;
        $_SESSION["SKEY"] = isset($row['SecurityKey'])?$row['SecurityKey']:NULL;
        $conn->close();
        header("Location: http://localhost/webProject/busBooking/index.php");
    }
    exit();
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    echo "Invalid Details " . "<br>";
    $conn->close();
}

?>