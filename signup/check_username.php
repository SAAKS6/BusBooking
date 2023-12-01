<?php
include_once('../db.php');
// Get username from AJAX request
// $username = $_POST['username'];
$username = $_POST['username'];

// Check if username is available
$sql = "SELECT * FROM admin WHERE Name = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username not available";
} else {
    echo "Username available";
}

$conn->close();
?>