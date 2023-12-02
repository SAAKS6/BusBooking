<?php
require_once('../COMPONENTS/ticket/ticket_details.php');
session_start();
$td = new TicketDetails();
$_SESSION['TD'] = $td;
echo '#DDDDDDDD';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selectedTripType is set in the POST data
    if (isset($_POST['selectedTripType'])) {


        if ($_POST['selectedTripType'] == 1) {
            // CLEAR ALL THE ARRAYS
            $td->clearArrays();

            // CITIES
            $td->setDCity($_POST['departure_city']);
            $td->setACity($_POST['arrival_city']);

            // TRIP TYPE
            $td->setType($_POST['selectedTripType']);
            // DATES
            $td->setDDate($_POST['departure_Date']);
            $td->setRDate("");
        } else if ($_POST['selectedTripType'] == 2) {
            // CLEAR ALL THE ARRAYS
            $td->clearArrays();

            // CITIES
            $td->setDCity($_POST['departure_city']);
            $td->setACity($_POST['arrival_city']);

            // TRIP TYPE
            $td->setType($_POST['selectedTripType']);

            // DATES
            $td->setDDate($_POST['departure_Date']);
            $td->setRDate($_POST['return_date']);
        }

        $_SESSION['TD'] = $td;
        $_SESSION['TRIPTYPE'] = $_POST['selectedTripType'];
        // include('./schedual.php');
        
        header("Location: /webProject/busBooking/schedual/schedual.php");
        exit();
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: index_process_form.php.";
    }
}
