<?php
// Password strength function (modify as needed)
function checkPasswordStrength($password) {
    // Example: Check if password length is at least 8 characters
    if (strlen($password) >= 2) {
        return "Password strength: Strong";
    } else {
        return "Password strength: Weak (minimum 2 characters)";
    }
}

// Get password from AJAX request
$password = $_POST['password'];

// Check password strength
$result = checkPasswordStrength($password);

echo $result;
?>