<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rihal - My Booking</title>
        <link rel="stylesheet" href="check_booking.css">
        <link rel="stylesheet" href="../home//style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1>My Booking</h1>
    <form id="bookingForm">
        <label for="bookingId">Enter Booking ID:</label>
        <input type="text" id="bookingId" name="bookingId" required>
        
        <button class="button" type="button" onclick="indexPage()"> Back</button>
        <button class="button" type="button" onclick="checkBooking()">Check Booking</button>
    </form>

    <div id="result">
    
    </div>
</div>

<script>
    function indexPage() {
        window.location.href = 'http://localhost/webProject/busBooking/index.php';
    }

    function checkBooking() {
        var bookingId = $('#bookingId').val();

        // Using jQuery for AJAX
        $.ajax({
            type: 'POST',
            url: 'check_booking_process.php',
            data: { bookingId: bookingId },
            success: function(response) {
                $('#result').html(response);
            }
        });
        $('#bookingForm').hide();
    }
    
    function deleteBooking() {
        var bookingId = $('#bookingId').val();

        // Using jQuery for AJAX
        $.ajax({
            type: 'POST',
            url: 'delete_booking_process.php',
            data: { bookingId: bookingId },
            success: function(response) {
                $('#result').html(response);
            }
        });
        $('#bookingForm').show();
    }
</script>

</body>
</html>
