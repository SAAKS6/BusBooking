<?php
// Password strength function (modify as needed)
function checkSkeyMatch($Skey) {
    // Example: Check if Skey matches
    if ($Skey == 1980) {
        return "Accepted";
    } else {
        return "Error!";
    }
}

// Get Skey from AJAX request
$Skey = $_POST['SKey'];

// Check Skey strength
$result = checkSkeyMatch($Skey);

echo $result;
?>