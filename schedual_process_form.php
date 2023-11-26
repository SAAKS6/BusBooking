<?php
// session_start();
include "./TICKET-OBJECT.php";
$td = $_SESSION['TD'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selectedTripType is set in the POST data
    if (isset($_POST['selectedSchedual'])) {
        // DEPATURE CITY
        $s = $_POST['selectedSchedual'];

        $td->setSlist($_POST['selectedSchedual']);

        if ($td->getType() == 1) {
            # code...
            echo("H1 SPF <br><br>");
            // include('./passanger_info.php');
        } else {
            include('./return.php');
        }
        
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: SPF.php:25";
    }
}
?>
