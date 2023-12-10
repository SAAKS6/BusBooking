<?php

include('../COMPONENTS/ticket/ticket_details.php');
session_start();
$td = $_SESSION['TD'];


include_once "../DATABASE/db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Define the SQL query to select data from the 'user' table.
    $sqlQuery = "UPDATE schedual SET Seats = Seats - 1 WHERE id =" . $td->getSlist() . ";";
    // Execute the SQL query and check if it was successful.
    if ($conn->query($sqlQuery) === true) {
        // If the query was successful, display a success message.
        // echo "seat update successfully";
    } else {
        // If there was an error with the query, display an error message along with the details of the error.
        echo "Error: GT.PHP:18";
    }

    // Define the SQL query to select data from the 'user' table.

    $sqlQuery = "UPDATE schedual SET Seats = Seats - 1 WHERE id =" . $td->getRlist() . ";";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rihal - Booking</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
    <link rel="stylesheet" href="../home/style.css">

    <!-- INCLUDING PHP FILE -->
    <?php
    include('../COMPONENTS/ticket/generate_ticket.php');
    ?>
</head>

<body>
    <?php
    include_once('../header/header.php');
    ?>

    <!-- COMPLETE BOOKING SECTION -->
    <section class="verify_ticket_section section_margin">
        <div class="page_width">
            <div class="schedual_flex" style="border-bottom: 2px dashed #058B8C;">
                <h1 style="text-align: center; color: #058B8C; text-decoration: underline;
                ">BOOKING PROCESS SUCCESSFULL</h1>
                <hr>
                <table class="table_list">
                    <?php
                    try {
                        generateBookedTicket();
                    } catch (mysqli_sql_exception $e) {
                        echo "QUERRY EXECUTION / FUNTION CALL ERROR (generateTicket.php:60)<br>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>

    <?php
    include_once('../footer/footer.php');
    ?>
</body>

</html>
<script>
    setTimeout(function() {
        window.location.href = "http://localhost/webProject/busBooking/index.php";
    }, 10000); // 10000 milliseconds = 10 seconds

    document.addEventListener("DOMContentLoaded", setTimeout()); 
</script>

<?php

// header("Location: http://localhost/webProject/busBooking/login/login.php");
// }
?>