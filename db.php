<?php
// Define the server name (usually 'localhost' for local development).
$servername = "localhost";

// Specify the name of the database you want to connect to.
// This should match the database name you've created in PHPMyAdmin.
$dbname = "busBooking";

// Provide the MySQL database username (commonly 'root' for local development).
$username = "root";

// Set the password for the database user (typically empty for local setups).
$password = "";

// Attempt to establish a connection to the MySQL database using the provided credentials.
global $conn;
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful.
if (!$conn) {
    // If the connection fails, display an error message and terminate the script.
    die("Connection failed: " . mysqli_connect_error());
}

// If the connection is successful, display a success message.
// echo "Connected successfully<br>";
// session_start();

// include_once "./TICKET-OBJECT.php";
// $td = $_SESSION['TD'];


// $sqlQuery = 'INSERT INTO user (Fname, Mname, Lname, Cnic, Gender, Tel, Dob, Email, Status, Dschedual , Rschedual)
//     VALUES ("'. $td->getFname() .'", "'. $td->getMname() .'", "'. $td->getLname() .'", "'. $td->getIDnumber() .'", "'. $td->getGender() .'", "'. $td->getTel() .'", "'. $td->getDOB() .'", "'. $td->getEmail() .'", 0, "'. $td->getSlist().'", "'. $td->getRlist() .'")';

//     // Execute the SQL query and check if it was successful.
//     if ($conn->query($sqlQuery) === true) {
//         // If the query was successful, display a success message.
//         echo "New record created successfully";
//     } else {
//         // If there was an error with the query, display an error message along with the details of the error.
//         echo "Error: ABC" ;
//     }

// // Close the database connection.
// $conn->close();
?>

