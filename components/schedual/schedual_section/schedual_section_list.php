<?php

include_once "./TICKET-OBJECT.php";
$from =$td->getDCity(0);
$to =$td->getACity(0);

function generateDepatureList()
{
    include_once "./db.php";
    $td = $_SESSION['TD'];

    // Define the SQL query to select data from the 'user' table.
    $sqlQuery = "SELECT * FROM schedual
WHERE FromCity = '" . $td->getDCity(0) . "' AND Date = '" . $td->getDDate(0) . "' AND ToCity = '" . $td->getACity(0) . "'";


    // Execute the SQL query and store the result in the variable $result.
    $result = $conn->query($sqlQuery);

    // Check if there are rows returned from the query.
    if ($result->num_rows > 0) {
        // Loop through each row of the result set and display the data.
        while ($row = $result->fetch_assoc()) {

            $print = '
                <form action="./schedual_process_form.php" method="post">
                <input type="hidden" name="selectedSchedual" value="' . $row['Id'] . '">
                    <tr>
                        <td>' . $row['Id'] . '</td>
                        <td>' . $row['Date'] . '</td>
                        <td>' . $row['Departure'] . '</td>
                        <td>' . $row['TripTime'] . '</td>
                        <td>' . $row['Arrival'] . '</td>
                        <td>' . $row['Price'] . '</td>
                        <td>' . $row['Seats'] . '</td>
                        <td>
                            <div class="progress_book_now">
                                <input type="submit" value="Book Now" name="book_now">
                            </div>
                        </td>
                    </tr>
                </form>';

            echo $print;
        }
    } else {
        // If there are no results, display a message indicating that.
        echo "0 results - SSL.php:48";
    }

    // Close the database connection.
    $conn->close();
}

function generateReturnList()
{

    include_once "./db.php";

    // Define the SQL query to select data from the 'user' table.
    /*$sqlQuery = "SELECT * FROM schedual
    WHERE FromCity = '" . $to . "' AND ToCity = '" . $from . "'";*///THIS IS TECHNICALLY CORRECT
    $sqlQuery = 'SELECT * FROM schedual WHERE FromCity = "Islamabad"';

    // Execute the SQL query and store the result in the variable $result.
    $result = $conn->query($sqlQuery);

    // Check if there are rows returned from the query.
    if ($result->num_rows > 0) {
        // Loop through each row of the result set and display the data.
        while ($row = $result->fetch_assoc()) {

            $print = '
                <form action="./return_process_form.php" method="post">
                <input type="hidden" name="selectedRSchedual" value="' . $row['Id'] . '">
                    <tr>
                        <td>' . $row['Id'] . '</td>
                        <td>' . $row['Date'] . '</td>
                        <td>' . $row['Departure'] . '</td>
                        <td>' . $row['TripTime'] . '</td>
                        <td>' . $row['Arrival'] . '</td>
                        <td>' . $row['Price'] . '</td>
                        <td>' . $row['Seats'] . '</td>
                        <td>
                            <div class="progress_book_now">
                                <input type="submit" value="Book Now" name="book_now">
                            </div>
                        </td>
                    </tr>
                </form>';

            echo $print;
        }
    } else {
        // If there are no results, display a message indicating that.
        echo "0 results - SSL.php:96";
    }

    // Close the database connection.
    $conn->close();
}
