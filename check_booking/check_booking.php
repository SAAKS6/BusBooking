<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rihal - My Booking</title>
    <link rel="stylesheet" href="./check_booking.css">
    <link rel="stylesheet" href="../home/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
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
                <table class="table_list" id="print_table">

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

        function printTable(tableId) {
            const table = document.getElementById(tableId);
            const buttonRow = document.getElementById('button_row');
            buttonRow.style.display = 'none'; // Hide the button row

            const width = 900;
            const height = 800;
            const left = (screen.width / 2) - (width / 2);
            

            const newWindow = window.open('', '', `width=${width}, height=${height}, '', left=${left}`);
            
            newWindow.document.write('<html><head><title>Booking</title>');
            newWindow.document.write('</head><body>');
            newWindow.document.write(table.outerHTML);
            newWindow.document.write('</body></html>');
            newWindow.document.close();
            newWindow.print();

            buttonRow.style.display = ''; // Show the button row again
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