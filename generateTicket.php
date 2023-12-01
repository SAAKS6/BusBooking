<?php

include('./components/ticket/ticket_details.php');
session_start();
$td = $_SESSION['TD'];


    include_once "./db.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Define the SQL query to select data from the 'user' table.
        $sqlQuery = "UPDATE schedual SET Seats = Seats - 1 WHERE id =". $td->getSlist().";";
        // Execute the SQL query and check if it was successful.
        if ($conn->query($sqlQuery) === true) {
            // If the query was successful, display a success message.
            // echo "seat update successfully";
        } else {
            // If there was an error with the query, display an error message along with the details of the error.
            echo "Error: GT.PHP:18";
        }

        // Define the SQL query to select data from the 'user' table.

        $sqlQuery = "UPDATE schedual SET Seats = Seats - 1 WHERE id =". $td->getRlist().";";
        // Execute the SQL query and check if it was successful.
        if ($conn->query($sqlQuery) === true) {
            // If the query was successful, display a success message.
            // echo "seat update successfully";
        } else {
            // If there was an error with the query, display an error message along with the details of the error.
            echo "Error: GT.PHP:30";
        }

        // Close the database connection.
        $conn->close();
    }
?>

<script>

    alert("Your Ticket has been \n bokked SuccessFully");
    window.location.href = "http://localhost/webProject/busBooking/index.php";

</script>

<?php
        
    // header("Location: http://localhost/webProject/busBooking/login/login.php");
    // }
?>

