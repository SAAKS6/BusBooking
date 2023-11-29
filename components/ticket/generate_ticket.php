<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "./TICKET-OBJECT.php";
function generateTicket()
{
    global $conn;
    include "./db.php";
    $td = $_SESSION['TD'];

    // Define the SQL query to select data from the 'user' table.
    //$sqlQuery = "SELECT * FROM schedual
    if ($td->getType() == 2) {
        $sqlQuery1 = 'SELECT u.Fname, u.Mname, u.Lname, u.Cnic, u.Tel, u.Email, u.Dob,
        s.Date, s.FromCity, s.ToCity, s.Departure, s.TripTime, s.Arrival, s.Price, s.Seats
        FROM user u
        INNER JOIN schedual s ON u.Dschedual = s.id';
        $sqlQuery2 = 'SELECT u.Fname, u.Mname, u.Lname, u.Cnic, u.Tel, u.Email, u.Dob,
        s.Date, s.FromCity, s.ToCity, s.Departure, s.TripTime, s.Arrival, s.Price, s.Seats
        FROM user u
        INNER JOIN schedual s ON u.Rschedual = s.id';

        // Execute the SQL query and store the result in the variable $result.
        $i = 1; //FOR Ticket NUMBER e.g., ticket 1, ticket 2
        $result = $conn->query($sqlQuery1);
        
        // Check if there are rows returned from the query.
        if ($result->num_rows > 0) {
            // Loop through each row of the result set and display the data.
            while ($row = $result->fetch_assoc()) {
                $print = '
            <form action="./payment.php" method="post">
                    <tr>
                    <td><h3>Ticket: ' . $i++ . '</h3></td>
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
            echo "0 results - GT.php:71";
        }

        $result = $conn->query($sqlQuery2);

        // Check if there are rows returned from the query.
        if ($result->num_rows > 0) {
            // Loop through each row of the result set and display the data.
            while ($row = $result->fetch_assoc()) {
                $print = '
            <form action="./payment.php" method="post">
                    <tr>
                    <td><h3>Ticket: ' . $i++ . '</h3></td>
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

                    <tr style="border-bottom: none;">
                    <td class="previous_flex">
                        
                            ' . '<a href="./passanger_info.php" class="previous_btn" onclick=' . $td->setProgressBar(4) . '>< Previous</a>' . '
                        ' . '
                    </td>
                    
                    <td>
                    <div class="progress_book_now">
                        <input type="submit" value="Pay >" class="next_btn">
                    </div>
                    </td>
                </tr>
            </form>';
                // echo "<a href="./passanger_info.php" class="previous_btn" onclick="' . $td->setProgressBar(3) . '">< Previous</a>";

                echo $print;
            }
        } else {
            // If there are no results, display a message indicating that.
            echo "0 results - GT.php:119";
        }
    } else {//FOR SELECT TYPE = ONE WAY

        $sqlQuery = 'SELECT u.Fname, u.Mname, u.Lname, u.Cnic, u.Tel, u.Email, u.Dob,
        s.Date, s.FromCity, s.ToCity, s.Departure, s.TripTime, s.Arrival, s.Price, s.Seats
        FROM user u
        INNER JOIN schedual s ON u.Dschedual = s.id';


        // Execute the SQL query and store the result in the variable $result.
        $result = $conn->query($sqlQuery);

        // Check if there are rows returned from the query.
        if ($result->num_rows > 0) {
            // Loop through each row of the result set and display the data.
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                $print = '
                    <form action="./payment.php" method="post">
                    <tr>
                    <td><h3>Ticket: ' . $i++ . '</h3></td>
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
                            </tr>

                            <tr style="border-bottom: none;">
                            <td class="previous_flex">
                                
                                    ' . '<a href="./passanger_info.php" class="previous_btn" onclick=' . $td->setProgressBar(3) . '>< Previous</a>' . '
                                ' . '
                            </td>
                            
                            <td>
                            <div class="progress_book_now" >
                                <input type="submit" value="Pay >" class="next_btn">
                            </div>
                            </td>
                        </tr>
                    </form>';


                echo $print;
            }
        } else {
            // If there are no results, display a message indicating that.
            echo "0 results - GT.php:181";
        }
    }




    // Close the database connection.
    $conn->close();
}
