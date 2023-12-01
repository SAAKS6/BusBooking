<?php
require_once('./components/ticket/ticket_details.php');
session_start();
$td = $_SESSION['TD'];


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selectedTripType is set in the POST data
    if (isset($_POST['selectedRSchedual'])) {

        $td->setRlist($_POST['selectedRSchedual']);

        // include('./passanger_info.php');
        header("Location: ./passanger_info.php");
        exit;
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: RPF:22";
    }
}
