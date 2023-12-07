<?php
// Password strength function (modify as needed)
function checkSkeyMatch($Skey) {
    include_once("./DATABASE/db.php");
    // Example: Check if Skey matches
    $sql = 'Select SecurityKey FROM admin where SecurityKey = '.$Skey;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
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