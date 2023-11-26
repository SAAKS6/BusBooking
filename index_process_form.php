<?php
    include_once "./TICKET-OBJECT.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selectedTripType is set in the POST data
    if (isset($_POST['selectedTripType'])) {
        

        if ($_POST['selectedTripType'] == 1) {
            echo "Hi1<br><br>";
            // CLEAR ALL THE ARRAYS
            $td->clearArrays();

            // CITIES
            $td->setDCity($_POST['departure_city']);
            $td->setACity($_POST['arrival_city']);

            // TRIP TYPE
            $td->setType($_POST['selectedTripType']);
            echo $td->getType();
            // DATES
            $td->setDDate($_POST['departure_Date']);
            $td->setRDate("");
        }
        else if ($_POST['selectedTripType'] == 2) {
            echo "Hi2<br><br>";
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

        // $td->showData();

        include('./schedual.php');
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: index_process_form.php.";
    }
}
?>
