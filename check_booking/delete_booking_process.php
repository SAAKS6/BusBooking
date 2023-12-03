<?php
include_once('../DATABASE/db.php');
include_once('../COMPONENTS/ticket/ticket_details.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $td = $_SESSION['TD'];
    // Retrieve the value of bookingId from the AJAX request
    $receivedBookingId = isset($_POST['bookingId']) ? $_POST['bookingId'] : '';
    
    

    $sql = "SELECT * FROM user WHERE Id = " . $receivedBookingId;
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        if($td->getType()==1){//ONE WAY
            $sql = "UPDATE schedual s
            SET Seats = Seats + 1
            WHERE ". $receivedBookingId ." IN (SELECT Dschedual FROM user)";
            $result = $conn->query($sql);
        }else{
            $sql = "UPDATE schedual s
            SET Seats = Seats + 1
            WHERE ". $receivedBookingId ." IN (SELECT Dschedual FROM user)";
            $result = $conn->query($sql);
    
            $sql = "UPDATE schedual s
            SET Seats = Seats + 1
            WHERE". $receivedBookingId ." IN (SELECT Rschedual FROM user)";
            $result = $conn->query($sql);
        }
        // Booking found, proceed with deletion
        $deleteSql = "DELETE FROM user WHERE Id = " . $receivedBookingId;
        if ($conn->query($deleteSql) === TRUE) {
            echo '<h1 style="text-align: center; margin-top: 50px;">Booking Deleted Successfully</h1>';
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