<?php
    include_once "./TICKET-OBJECT.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selectedTripType is set in the POST data
    if (isset($_POST['selectedTripType'])) {
        // CITIES
        $td->setDCity($_POST['depature_city']);
        $td->setACity($_POST['arrival_city']);

        // TRIP TYPE
        $td->setType($_POST['selectedTripType']);

        // DATES
        $td->setDDate($_POST['depature_Date']);
        $td->setRDate($_POST['return_date']);
        
        $_SESSION['TD'] = $td;

        include('./schedual.php');
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: Trip type not selected.";
    }
}
?>
