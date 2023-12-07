<?php
include_once('../DATABASE/db.php');
include_once('../COMPONENTS/ticket/ticket_details.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookingId'])) {
    session_start();
    $td = $_SESSION['TD'];
    // Retrieve the value of bookingId from the AJAX request
    // $BookingId = $_POST['bookingId'];   

    // // $sql = "SELECT Rschedual FROM user WHERE Id = " . $BookingId;
    // // $result = $conn->query($sql);

    $bookingId = $_POST['bookingId'];
    $tripType = 0;

    $sql = "SELECT Dschedual, Rschedual FROM user WHERE Id = " . $bookingId;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $tripType = $row["Rschedual"];
            if ($tripType == 0) { //ONE WAY
                $sql = "UPDATE schedual s "
                    . "SET s.Seats = (Seats + 1)"
                    . " WHERE s.Id = (SELECT Dschedual FROM user WHERE Id = " . $bookingId . ");";
                $result = $conn->query($sql);
            } elseif ($tripType > 0) { //Return
                $sql = "UPDATE schedual s "
                    . "SET s.Seats = (Seats + 1)"
                    . " WHERE s.Id = (SELECT Dschedual FROM user WHERE Id = " . $bookingId . ");";
                $result = $conn->query($sql);

                $sql = "UPDATE schedual s "
                    . "SET s.Seats = (Seats + 1)"
                    . " WHERE s.Id = (SELECT Rschedual FROM user WHERE Id = " . $bookingId . ");";
                $result = $conn->query($sql);
            }
            // Booking found, proceed with deletion
            $deleteSql = "DELETE FROM user WHERE Id = " . $bookingId;
            if ($conn->query($deleteSql) === TRUE) {
                echo '<h1 style="text-align: center; margin-top: 50px;">Booking Deleted Successfully</h1>';
            } else {
                echo 'Error deleting booking: ' . $conn->error;
            }
        } else {
            echo 'No Booking Found.';
        }
    }
} else {
    // Handle non-POST requests if necessary
    echo 'Invalid request method.';
}
