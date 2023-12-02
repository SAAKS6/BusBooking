<?php
include_once('../DATABASE/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Retrieve the value of bookingId from the AJAX request
    $receivedBookingId = isset($_POST['bookingId']) ? $_POST['bookingId'] : '';

    // Check if the bookingId exists in the 'user' table
    $sql = "SELECT * FROM user WHERE Id = " . $receivedBookingId;
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        // Booking found, proceed with deletion
        $deleteSql = "DELETE FROM user WHERE Id = " . $receivedBookingId;
        if ($conn->query($deleteSql) === TRUE) {
            echo 'Booking Deleted Successfully.';
        } else {
            echo 'Error deleting booking: ' . $conn->error;
        }
    } else {
        echo 'No Booking Found.';
    }
} else {
    // Handle non-POST requests if necessary
    echo 'Invalid request method.';
}
?>
