<?php
include_once('../DATABASE/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $bookingId = $_POST['bookingId'];
    
    // Retrieve the value of bookingId from the AJAX request
    $receivedBookingId = isset($_POST['bookingId']) ? $_POST['bookingId'] : '';

    $sql = "SELECT * FROM user WHERE Id = ". $bookingId;
    $result = $conn->query($sql);
    if ( $row = $result->fetch_assoc()) {
        $result = '<h2>Booking Found! '.$row['Fname'].' '.$row['Lname'].'</h2>
        <div class="container container2">
        <button class="button" type="button" onclick="indexPage()"> Back</button>
        <button class="button" type="button" onclick="deleteBooking()">Delete</button>
        </div>';
    } else {
        $result = 'No Booking Found.';
    }

    // Send a response back to the client
    echo $result;
} else {
    // Handle non-POST requests if necessary
    echo 'Invalid request method.';
}
?>