<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rihal - My Booking</title>
    <link rel="stylesheet" href="./check_booking.css">
    <link rel="stylesheet" href="../home/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- HEADER SECTION -->
    <?php
    include "../header/header.php";
    ?>

    <div class="searh_section">
        <div class="container">
            <h1>My Booking</h1>
            <form id="bookingForm" class="bookingForm">
                <input type="text" id="bookingId" name="bookingId" required placeholder="Enter Booking ID">

                <div class="buttons">
                    <button class="button" type="button" onclick="indexPage()"> Home</button>
                    <button class="button" type="button" onclick="checkBooking()">Check Booking</button>
                </div>
            </form>

        </div>
    </div>

    <section class="schedual_section section_margin">
        <div class="page_width">
            <div class="schedual_flex">
                <table class="table_list">

                </table>
            </div>
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <?php
    include "../footer/footer.php";
    ?>

    <script>
        function hideForm() {
            $('.schedual_section').hide();
        } // 10000 milliseconds = 10 seconds

        document.addEventListener("DOMContentLoaded", hideForm());

        function indexPage() {
            window.location.href = 'http://localhost/webProject/busBooking/index.php';
        }

        function checkBookingPage() {
            window.location.href = 'http://localhost/webProject/busBooking/check_booking/check_booking.php';
        }

        function checkBooking() {
            var bookingId = $('#bookingId').val();
            // Using jQuery for AJAX
            $.ajax({
                type: 'POST',
                url: 'check_booking_process.php',
                data: {
                    bookingId: bookingId
                },
                success: function(response) {
                    $('.table_list').html(response);
                }
            });
            $('.searh_section').hide();
            $('.schedual_section').show();
        }
        

        function deleteBooking() {
            var bookingId = $('#bookingId').val();

            // Using jQuery for AJAX
            $.ajax({
                type: 'POST',
                url: 'delete_booking_process.php',
                data: {
                    bookingId: bookingId
                },
                success: function(response) {
                    $('.table_list').html(response);
                }
            });
            $('#bookingForm').show();
            setTimeout(function() {
            window.location.href = 'http://localhost/webProject/busBooking/check_booking/check_booking.php';
        }, 5000);
        }
    </script>

</body>

</html>