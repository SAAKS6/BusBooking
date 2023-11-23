<?php
include_once "./TICKET-OBJECT.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selectedTripType is set in the POST data
    if (isset($_POST['fname'])) {
        // NAMES
        $td->setfname($_POST['fname']);
        $td->setmname($_POST['mname']);
        $td->setlname($_POST['lname']);

        // CNIC / ID NUMBER
        $td->setIDnumber($_POST['idnum']);

        // GENDER
        $td->setGender($_POST['gender']);

        // TEL NUMBER
        $td->setTel($_POST['tel']);

        // DATE OF BIRTH
        $td->setDOB($_POST['dob']);

        // EMAIL
        $td->setEmail($_POST['email']);

        $_SESSION['TD'] = $td;

        include('./verify_ticket.php');
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: Trip type not selected.";
    }
}
