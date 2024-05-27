<?php
include_once('../DATABASE/db.php');
include_once('../COMPONENTS/ticket/ticket_details.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // global $conn;
    // Retrieve the value of bookingId from the AJAX request
    $bookingId = $_POST['bookingId'];
    $tripType = 0;

    $sql = "SELECT Rschedual FROM user WHERE Id = " . $bookingId;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tripType = $row["Rschedual"];
    }

    // Define the SQL query to select data from the 'user' table.
    //$sqlQuery = "SELECT * FROM schedual
    if ($tripType > 0) { //MEANS RETURN TYPE
        $sqlQuery1 = 'SELECT u.Id, u.Fname, u.Mname, u.Lname, u.Cnic, u.Tel, u.Email, u.Dob, u.TimeStamp,
        s.Date, s.FromCity, s.ToCity, s.Departure, s.TripTime, s.Arrival, s.Price, s.Seats
        FROM user u
        INNER JOIN schedual s ON u.Dschedual = s.id WHERE u.Id = ' . $bookingId;
        $sqlQuery2 = 'SELECT u.Id, u.Fname, u.Mname, u.Lname, u.Cnic, u.Tel, u.Email, u.Dob, u.TimeStamp,
        s.Date, s.FromCity, s.ToCity, s.Departure, s.TripTime, s.Arrival, s.Price, s.Seats
        FROM user u
        INNER JOIN schedual s ON u.Rschedual = s.id WHERE u.Id = ' . $bookingId;
        // Execute the SQL query and store the result in the variable $result.
        try {
            $result = $conn->query($sqlQuery1);
        } catch (mysqli_sql_exception $e) {
            // Handle the exception
            echo "Exception: " . $e->getMessage() . "<br><br>";
        }
        // Check if there are rows returned from the query.
        if ($result->num_rows > 0) {
            // Loop through each row of the result set and display the data.
            while ($row = $result->fetch_assoc()) {
                $print = '
            <form action="../index.php" method="post">
            <tr>
            <td><h3>Depature Ticket No: <span style="color: #058B8C;"
            >' . $row['Id'] . '</span> </h3></td>
            </tr>
                    <tr>
                        <td>First Name: ' . $row['Fname'] . '</td>
                        <td>Middle Name: ' . $row['Mname'] . '</td>
                        <td>Last Name ' . $row['Lname'] . '</td>
                        <td>CNIC: ' . $row['Cnic'] . '</td>
                    </tr>

                    <tr>
                        <td>D.O.B: ' . $row['Dob'] . '</td>
                        <td>Tel: ' . $row['Tel'] . '</td> 
                        <td>Email: ' . $row["Email"] . '</td>
                        <td>Seat: ' . $row["Seats"] . '</td>
                    </tr>

                    <tr>
                        <td>Type: Return</td>
                        <td>From: ' . $row['FromCity'] . '</td>
                        <td>To: ' . $row['ToCity'] . '</td>
                        <td>Date: ' . $row['Date'] . '</td>
                    </tr>

                    <tr>
                        <td>Departure Time: ' . $row['Departure'] . '</td>
                        <td>Arrival Time: ' . $row['Arrival'] . '</td>
                        <td>Total Time: ' . $row['TripTime'] . '</td>
                        <td>Price: ' . $row['Price'] . '</td>
                    </tr>
            </form>';

                echo $print;
            }
        } else {
            // If there are no results, display a message indicating that.
            echo '<tr>
            <td><h3><span style="color: #058B8C;"
            >NO BOOKING</span> FOUND! </h3></td>
            </tr>';
        }

        $result = $conn->query($sqlQuery2);

        // Check if there are rows returned from the query.
        if ($result->num_rows > 0) {
            // Loop through each row of the result set and display the data.
            while ($row = $result->fetch_assoc()) {
                $print = '<form action="../index.php" method="post">
                    <tr>
                    <td><h3>Return Ticket No: <span style="color: #058B8C;"
                    >' . $row['Id'] . '</span> </h3></td>
                    </tr>
                    <tr>
                        <td>First Name: ' . $row['Fname'] . '</td>
                        <td>Middle Name: ' . $row['Mname'] . '</td>
                        <td>Last Name ' . $row['Lname'] . '</td>
                        <td>CNIC: ' . $row['Cnic'] . '</td>
                    </tr>

                    <tr>
                        <td>D.O.B: ' . $row['Dob'] . '</td>
                        <td>Tel: ' . $row['Tel'] . '</td> 
                        <td>Email: ' . $row["Email"] . '</td>
                        <td>Seat: ' . $row["Seats"] . '</td>
                    </tr>

                    <tr>
                        <td>Type: Return</td>
                        <td>From: ' . $row['FromCity'] . '</td>
                        <td>To: ' . $row['ToCity'] . '</td>
                        <td>Date: ' . $row['Date'] . '</td>
                    </tr>

                    <tr>
                        <td>Departure Time: ' . $row['Departure'] . '</td>
                        <td>Arrival Time: ' . $row['Arrival'] . '</td>
                        <td>Total Time: ' . $row['TripTime'] . '</td>
                        <td>Price: ' . $row['Price'] . '</td>
                    </tr>
                    
                    <tr id="button_row" class="container container2">
                    <td colspan="4">
                        <button class="button" type="button" onclick="checkBookingPage()">Back</button>
                        <button class="button" type="button" onclick="printTable(\'print_table\')">Print Booking</button>
                        <button class="button" type="button" onclick="deleteBooking()" style="color: red;">DELETE</button>
                    </td>
                </tr>
            </form>';

                echo $print;
                exit();
            }
        } else {
            // If there are no results, display a message indicating that.
            echo '<tr>
            <td><h3><span style="color: #058B8C;"
            >NO BOOKING</span> FOUND! </h3></td>
            </tr>';
        }
    } elseif ($tripType == 0) { //FOR SELECT TYPE = ONE WAY
        $sqlQuery = 'SELECT u.Id, u.Fname, u.Mname, u.Lname, u.Cnic, u.Tel, u.Email, u.Dob, u.TimeStamp,
        s.Date, s.FromCity, s.ToCity, s.Departure, s.TripTime, s.Arrival, s.Price, s.Seats
        FROM user u
        INNER JOIN schedual s ON u.Dschedual = s.id ' .
            'WHERE u.Id = "' . $bookingId . '";';

        // Execute the SQL query and store the result in the variable $result.
        $result = $conn->query($sqlQuery);

        // Check if there are rows returned from the query.
        if ($result->num_rows > 0) {
            // Loop through each row of the result set and display the data.
            while ($row = $result->fetch_assoc()) {
                $print = '
                    <form action="../index.php" method="post">
                    <tr>
                    <td><h3>Depature Ticket No: <span style="color: #058B8C;"
                    >' . $row['Id'] . '</span> </h3></td>
                    </tr>
                    
                            <tr>
                                <td>First Name: ' . $row['Fname'] . '</td>
                                <td>Middle Name: ' . $row['Mname'] . '</td>
                                <td>Last Name ' . $row['Lname'] . '</td>
                                <td>CNIC: ' . $row['Cnic'] . '</td>
                            </tr>

                            <tr>
                                <td>D.O.B: ' . $row['Dob'] . '</td>
                                <td>Tel: ' . $row['Tel'] . '</td> 
                                <td>Email: ' . $row["Email"] . '</td>
                                <td>Seat: ' . $row["Seats"] . '</td>
                            </tr>

                            <tr>
                                <td>Type: One Way</td>
                                <td>From: ' . $row['FromCity'] . '</td>
                                <td>To: ' . $row['ToCity'] . '</td>
                                <td>Date: ' . $row['Date'] . '</td>
                            </tr>

                            <tr>
                                <td>Departure Time: ' . $row['Departure'] . '</td>
                                <td>Arrival Time: ' . $row['Arrival'] . '</td>
                                <td>Total Time: ' . $row['TripTime'] . '</td>
                                <td>Price: ' . $row['Price'] . '</td>
   

                            <tr id="button_row" class="container container2">
                                <td colspan="4">
                                    <button class="button" type="button" onclick="checkBookingPage()">Back</button>
                                    <button class="button" type="button" onclick="printTable(\'print_table\')">Print Booking</button>
                                    <button class="button" type="button" onclick="deleteBooking()" style="color: red;">DELETE</button>
                                </td>
                            </tr>
                    </form>
                    ';


                echo $print;
                exit();
            }
        } else {
            // If there are no results, display a message indicating that.
            echo '<tr>
            <td><h3><span style="color: #058B8C;"
            >NO BOOKING</span> FOUND! </h3></td>
            </tr>';
        }
        // Send a response back to the client
        echo $result;
    }
    // Close the database connection.
    $conn->close();
    // ENDNDENDENDNED
} else {
    // Handle non-POST requests if necessary
    echo 'Invalid request method.';
}
