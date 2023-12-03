<?php
include_once('../COMPONENTS/ticket/ticket_details.php');
include_once "../DATABASE//db.php";
session_start();
$td = $_SESSION['TD'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the selectedTripType is set in the POST data
    if (isset($_POST['fname'])) {
        // NAMES
        $td->setfname($_POST['fname']);
        $td->setmname($_POST['mname']);
        $td->setlname($_POST['lname']);

        // CNIC / ID NUMBER
        $td->setIDnumber($_POST['idnum']);

        // GENDER
        $td->setGender($_POST['gender']);

        // TEL NUMBER
        $td->setTel($_POST['tel']);

        // DATE OF BIRTH
        $td->setDOB($_POST['dob']);

        // EMAIL
        $td->setEmail($_POST['email']);

        // TIMESTAMP
        $timestamp = time();
        // Format the date and time using the date function
        $formattedDateTime = date('Y-m-d H:i:s', $timestamp);
        $td->setTimestamp($formattedDateTime);
        // echo $td->getTimestamp().'<br>';

        // PRICE
        DPrice($td);
        // echo $td->getPricee()."<br>";
        // echo $td->getTotalprice();

        $_SESSION['TD'] = $td;
        try {
            insertUser($td);
        } catch (mysqli_sql_exception $e) {
            // Handle the exception
            echo "Exception: " . $e->getMessage();
        }
        // include('./verify_ticket.php');
        header("Location: ../ticket/verify_ticket.php");
        exit;
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: PIPF.PHP:55";
    }
}

function insertUser($td)
{
    global $conn;
    if ($td->getType() == 1) {
        $sqlQuery = 'INSERT INTO user (Fname, Mname, Lname, Cnic, Gender, Tel, Dob, Email, TimeStamp, Dschedual)
    VALUES ("' . $td->getFname() . '", "' . $td->getMname() . '", "' . $td->getLname() . '", "' . $td->getIDnumber() . '", "' . $td->getGender() . '", "' . $td->getTel() . '", "' . $td->getDOB() . '", "' . $td->getEmail() . '", "' . $td->getTimestamp() . '", "' . $td->getSlist() . '")';
    } else if ($td->getType() == 2) {
        $sqlQuery = 'INSERT INTO user (Fname, Mname, Lname, Cnic, Gender, Tel, Dob, Email, TimeStamp, Dschedual , Rschedual)
    VALUES ("' . $td->getFname() . '", "' . $td->getMname() . '", "' . $td->getLname() . '", "' . $td->getIDnumber() . '", "' . $td->getGender() . '", "' . $td->getTel() . '", "' . $td->getDOB() . '", "' . $td->getEmail() . '", "' . $td->getTimestamp() . '", "' . $td->getSlist() . '", "' . $td->getRlist() . '")';
    }


    // Execute the SQL query and check if it was successful.
    if ($conn->query($sqlQuery) === true) {

        // If the query was successful, display a success message.
        // echo "New record created successfully";
    } else {
        // If there was an error with the query, display an error message along with the details of the error.
        echo "Error: PIPF.PHP:52";
    }
    // Close the database connection.
    $conn->close();
}

function DPrice($td)
{
    global $conn;
    if ($td->getType() == 1) {
        $sqlQuery = 'SELECT s.Price
        FROM schedual s ' .
            'WHERE s.Id = ' . $td->getSlist() . ';';

        $result = $conn->query($sqlQuery);

        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $td->setPrice($row['Price']);
            }
        } else {
            echo "Error: PIPF.PHP:98";
        }

    } else if ($td->getType() == 2) {
        $sqlQuery = 'SELECT s.Price
        FROM schedual s ' .
            'WHERE s.Id = ' . $td->getSlist() . ';';
        $sqlQuery2 = 'SELECT s.Price
        FROM schedual s ' .
            'WHERE s.Id = ' . $td->getRlist() . ';';

        $result = $conn->query($sqlQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // echo "SQL1: ".$row['Price'].'<br><br>';
                $td->setPrice($row['Price']);
            }
        } else {
            echo "Error: PIPF.PHP:116";
        }

        $result = $conn->query($sqlQuery2);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // echo "SQL2: ".$row['Price'].'<br><br>';
                $td->setPrice($row['Price']);
            }
        } else {
            echo "Error: PIPF.PHP:130";
        }
    }
}
