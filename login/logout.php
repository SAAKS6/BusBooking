<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you want after logout

header("Location: http://localhost/webProject/busBooking/index.php");
exit();
?>