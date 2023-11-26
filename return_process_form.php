<?php
include "./TICKET-OBJECT.php";
$td = $_SESSION['TD'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selectedTripType is set in the POST data
    if (isset($_POST['selectedRSchedual'])) {

        $td->setRlist($_POST['selectedRSchedual']);

        echo("H3 RPF <br><br>");
        include('./passanger_info.php');
        
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: RPF:22";
    }
}
?>
