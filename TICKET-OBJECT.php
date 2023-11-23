    <!-- TICKET DETAILS CLASS  -->
    <?php
    include_once "./components/ticket/ticket_details.php";
    session_start();
    // Check if the common object is set in the session
    if (!isset($_SESSION['TD'])) {
        // If not set, create a new instance and store it in the session
        $td = new TicketDetails(); // Replace YourClass with the actual class name
        $_SESSION['TD'] = $td;
    } else {
        // If already set, retrieve it from the session
        $td = $_SESSION['TD'];
    }
    ?>