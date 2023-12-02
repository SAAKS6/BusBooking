<?php
require_once('../COMPONENTS/ticket/ticket_details.php');
session_start();
$td = $_SESSION['TD'];
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selectedTripType is set in the POST data
    if (isset($_POST['selectedSchedual'])) {
        $td->showData();
        $td->setSlist($_POST['selectedSchedual']);

        if ($td->getType() == 1) {
            header("Location: ../passanger_info/passanger_info.php");
            exit;
        } else {
            header("Location: ../return/return.php");
            exit;
        }
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: SPF.php:25";
    }
}
