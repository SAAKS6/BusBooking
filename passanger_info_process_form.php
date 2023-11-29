<?php
include_once "./TICKET-OBJECT.php";

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

        $_SESSION['TD'] = $td;

        try {
            insertUser();
        } catch (mysqli_sql_exception $e) {
            // Handle the exception
            echo "Exception: " . $e->getMessage();
        }

        include('./verify_ticket.php');
    } else {
        // If selectedTripType is not set in the POST data, handle the error
        echo "Error: PIPF.PHP:40";
    }
}

function insertUser()
{
    include_once "./db.php";
    $td = $_SESSION['TD'];
    
    
    if($td->getType()==1){
        $sqlQuery = 'INSERT INTO user (Fname, Mname, Lname, Cnic, Gender, Tel, Dob, Email, Status, Dschedual)
    VALUES ("' . $td->getFname() . '", "' . $td->getMname() . '", "' . $td->getLname() . '", "' . $td->getIDnumber() . '", "' . $td->getGender() . '", "' . $td->getTel() . '", "' . $td->getDOB() . '", "' . $td->getEmail() . '", 0, "' . $td->getSlist() . '")';
    } else if ($td->getType()==2){
        $sqlQuery = 'INSERT INTO user (Fname, Mname, Lname, Cnic, Gender, Tel, Dob, Email, Status, Dschedual , Rschedual)
    VALUES ("' . $td->getFname() . '", "' . $td->getMname() . '", "' . $td->getLname() . '", "' . $td->getIDnumber() . '", "' . $td->getGender() . '", "' . $td->getTel() . '", "' . $td->getDOB() . '", "' . $td->getEmail() . '", 0, "' . $td->getSlist() . '", "' . $td->getRlist() . '")';
    }

    
    // Execute the SQL query and check if it was successful.
    if ($conn->query($sqlQuery) === true) {
        
        // If the query was successful, display a success message.
        echo "New record created successfully";
    } else {
        // If there was an error with the query, display an error message along with the details of the error.
        echo "Error: PIPF.PHP:52";
    }
    // Close the database connection.
    $conn->close();
}
