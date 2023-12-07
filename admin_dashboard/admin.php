<?php
session_start();

//Check if the Admin is not logged in
if (!isset($_SESSION['ANAME'])) {
    // Redirect to the login page
    header("Location: ../login/login.php");
    exit(); // Stop further execution of the script
}

require "../ARRAYS/booking_form/form_location_data.php";
?>
<!-- Functionality - Creating Admin -->
<?php

$createAdminResponse = ''; // Initialize an empty message variable

include('../DATABASE/db.php');

// Check if the create post form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['pin'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $password = $_POST['password'];
    $pin = $_POST['pin'];

    if ($pin === '1980') {
        $sql = "INSERT INTO admin (Name, Pass) VALUES ('$name', '$password')";

        if ($conn->query($sql) === true) {
            $createAdminResponse = 'Admin created successfully!';
        } else {
            $createAdminResponse = 'Error creating admin: ' . $conn->error;
        }
    } else {
        $createAdminResponse = 'Error creating admin: ' . 'Ivalid Pin!';
    }
}
?>

<!-- Functionality - Deleting Admin -->
<?php

$deleteAdminResponse = ''; // Initialize an empty message variable

// Include your database connection file
include('../DATABASE/db.php');

// Check if the delete form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_admin_id'])) {
    // Retrieve the post ID to be deleted
    $deleteAdminId = $_POST['delete_admin_id'];

    // Construct the SQL delete statement
    $sql = "DELETE FROM admin WHERE Id = '$deleteAdminId'";

    // Execute the SQL query
    if ($conn->query($sql) === true) {
        $deleteAdminResponse = "Admin deleted successfully!";
    } else {
        $deleteAdminResponse = "Error deleting admin: " . $conn->error;
    }
}
?>

<!-- Functionality - Updateing Admin -->

<?php

$updateAdminResponse = ''; // Initialize an empty message variable

// Include your database connection file
include('../DATABASE/db.php'); // Assuming your database connection file is in the DATABASE directory

// Check if the update form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_admin_id']) && isset($_POST['update_admin_name']) && isset($_POST['update_admin_password'])) {
    // Retrieve form data
    $updateAdminId = $_POST['update_admin_id'];
    $newName = $_POST['update_admin_name'];
    $newPassword = $_POST['update_admin_password'];

    // Construct the SQL update statement
    $sql = "UPDATE admin SET Name = '" . $newName . "', Pass = '" . $newPassword . "' WHERE Id = '$updateAdminId'";

    // Execute the SQL query
    if ($conn->query($sql) === true) {
        $updateAdminResponse = "Admin updated successfully!";
    } else {
        $updateAdminResponse = "Error updating admin: " . $conn->error;
        $conn->close();
    }
}
?>
<!-- ******************************************************************************************************************* -->

<!-- Functionality - Creating Schedual-->
<?php
// Include your database connection file
include('../DATABASE/db.php');

$createScheduleResponse = ''; // Initialize an empty message variable

// Check if the create schedule form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['scheduleDate']) && isset($_POST['departure_city']) && isset($_POST['arrival_city']) && isset($_POST['departureTime']) && isset($_POST['arrivalTime']) && isset($_POST['price'])) {
    // Retrieve the schedule ID to be deleted
    $deleteScheduleId = $_POST['delete_schedule_id'];

    // Execute SQL delete statement
    $sql = "DELETE FROM schedual WHERE Id = $deleteScheduleId";

    if ($conn->query($sql) === true) {
        $deleteScheduleResponse = "Schedule deleted successfully!";
    } else {
        $deleteScheduleResponse = "Error deleting schedule: " . $conn->error;
    }
}

function calculateTripTime($departureTime, $arrivalTime)
{
    $departureDateTime = new DateTime($departureTime);
    $arrivalDateTime = new DateTime($arrivalTime);

    // Calculate the difference between departure and arrival
    $difference = $departureDateTime->diff($arrivalDateTime);

    // %h: Hours with leading zeros (00 to 99)
    // %I: Minutes with leading zeros (00 to 59)
    // %p: Lowercase AM or PM
    // So, for example, if the difference in hours is 5, minutes is 30, 
    // and it's in the afternoon, the formatted result would be 05:30 PM. 
    // This format is commonly used to represent time differences in a 
    // human-readable format with 12-hour time and AM/PM indicator.

    // Format the difference in HH:MM format (12-hour format)
    $tripTime = $difference->format('%h:%I %p');

    return $tripTime;
}
?>


<!-- Functionality - Deleting Schedual -->
<?php
// Include your database connection file
include('../DATABASE/db.php');

$deleteScheduleResponse = ''; // Initialize an empty message variable

// Check if the delete schedule form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_schedule_id'])) {
    // Retrieve the schedule ID to be deleted
    $deleteScheduleId = $_POST['delete_schedule_id'];

    // Prepare and execute SQL delete statement
    $sql = "DELETE FROM schedual WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $deleteScheduleId);

    if ($stmt->execute()) {
        $deleteScheduleResponse = "Schedule deleted successfully!";
    } else {
        $deleteScheduleResponse = "Error deleting schedule: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
}
?>

<!-- Functionality - Update Schedual -->
<?php
// Include your database connection file
include('../DATABASE/db.php');

$updateScheduleResponse = ''; // Initialize an empty message variable

// Check if the update schedule form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_schedule_id'])) {
    // Initialize the SQL update statement
    $sql = "UPDATE schedual SET";
    // Retrieve form data
    $updateScheduleId = $_POST['update_schedule_id'];

    if (!empty($_POST['update_schedule_date'])) {
        $updateScheduleDate =  $_POST['update_schedule_date'];
        $sql .= " Date = '$updateScheduleDate',";
    }
    if (!empty($_POST["update_departure_city"])) {
        $updateDepartureCity = $_POST['update_departure_city'];
        $sql .= " FromCity = '$updateDepartureCity',";
    }
    if (!empty($_POST["update_arrival_city"])) {
        $updateArrivalCity = $_POST['update_arrival_city'];
        $sql .= " ToCity = '$updateArrivalCity',";
    }
    if (!empty($_POST["update_departure_time"])) {
        $updateDepartureTime = $_POST['update_departure_time'];
        $sql .= " Departure = '$updateDepartureTime',";
    }
    if (!empty($_POST["update_arrival_time"])) {
        $updateArrivalTime = $_POST['update_arrival_time'];
        $sql .= " Arrival = '$updateArrivalTime',";
    }
    if (!empty($_POST["update_arrival_time"]) && !empty($_POST["update_departure_time"])) {
        $updateTripTime = calculateTripTime($updateDepartureTime, $updateArrivalTime);
        $sql .= " TripTime = '$updateTripTime',";
    }
    if (!empty($_POST["update_price"])) {
        $updatePrice = $_POST['update_price'];
        $sql .= " Price = $updatePrice,";
    }

    $updateSeats = 30;
    $sql .= " Seats = $updateSeats,";

    // Remove the trailing comma and complete the SQL statement
    $sql = rtrim($sql, ",");
    $sql .= " WHERE Id = $updateScheduleId";

    // Execute SQL update statement
    if ($conn->query($sql) === true) {
        $updateScheduleResponse = 'Schedule updated successfully!';
    } else {
        echo '<br>' . $sql . '<br>';
        $updateScheduleResponse = 'Error updating schedule: ' . $conn->error;
    }
}
?>

<!-- Functionality - Deleting User -->
<?php
// Include your database connection file
include('../DATABASE/db.php');

$deleteUserResponse = ''; // Initialize an empty message variable

// Check if the delete schedule form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user_id']) && isset($_POST['delete_user_type'])) {
    // Retrieve the schedule ID to be deleted
    $deleteUserId = $_POST['delete_user_id'];
    $deleteUserType = $_POST['delete_user_type'];

    if ($deleteUserType == 'Dschedual') {
        // Prepare and execute SQL delete statement
        $sql = "DELETE FROM user WHERE Id = " . $deleteUserId;
        if ($conn->query($sql) === true) {
            $deleteUserResponse = "User return booking deleted successfully!";
        } else {
            $deleteUserResponse = "Error deleting user return booking: " . $conn->error;
        }
    } else if ($deleteUserType == 'Rschedual') {
        $sql = "UPDATE user SET Rschedual = 0 WHERE Id = " . $deleteUserId;
        if ($conn->query($sql) === true) {
            $deleteUserResponse = "User booking deleted successfully!";
        } else {
            $deleteUserResponse = "Error deleting user booking: " . $conn->error;
        }
    }
}
?>

<!-- Functionality - Update User -->
<?php
// Include your database connection file
include('../DATABASE/db.php');

$updateUserResponse = ''; // Initialize an empty message variable

// Check if the update user form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user_id'])) {
    // Retrieve form data
    $updateUserId = $_POST['update_user_id'];

    // Initialize the SQL update statement
    $sql = "UPDATE user SET";

    if (!empty($_POST['update_fname'])) {
        $updateFname = $_POST['update_fname'];
        $sql .= " Fname = '$updateFname',";
    }

    if (!empty($_POST['update_mname'])) {
        $updateMname = $_POST['update_mname'];
        $sql .= " Mname = '$updateMname',";
    }

    if (!empty($_POST['update_lname'])) {
        $updateLname = $_POST['update_lname'];
        $sql .= " Lname = '$updateLname',";
    }

    if (!empty($_POST['update_cnic'])) {
        $updateCnic = $_POST['update_cnic'];
        $sql .= " Cnic = '$updateCnic',";
    }

    if (!empty($_POST['update_gender'])) {
        $updateGender = $_POST['update_gender'];
        $sql .= " Gender = '$updateGender',";
    }

    if (!empty($_POST['update_tel'])) {
        $updateTel = $_POST['update_tel'];
        $sql .= " Tel = '$updateTel',";
    }

    if (!empty($_POST['update_dob'])) {
        $updateDob = $_POST['update_dob'];
        $sql .= " Dob = '$updateDob',";
    }

    if (!empty($_POST['update_email'])) {
        $updateEmail = $_POST['update_email'];
        $sql .= " Email = '$updateEmail',";
    }

    // Remove the trailing comma and complete the SQL statement
    $sql = rtrim($sql, ",");
    $sql .= " WHERE Id = $updateUserId";

    // Execute SQL update statement
    if ($conn->query($sql) === true) {
        $updateUserResponse = 'User information updated successfully!';
    } else {
        $updateUserResponse = 'Error updating user information: ' . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIHAL - ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="./admin-style.css">
    <link rel="stylesheet" href="../home/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- HEADER SECTION -->
    <?php
    include "../header/header.php";
    ?>
    <!-- <section class="userStatusSection">
        <div class="page_width">
            <div class="showLoggedIn">
                <div class="left">
                    <p><?php
                        // if (isset($_SESSION["fullname"])) {
                        //     echo '<p>Hello! ' . $_SESSION["fullname"] . '</p>';
                        // }
                        ?>
                    </p>
                </div>

                <div class="right">
                    <?php
                    // if (isset($_SESSION["fullname"])) {
                    //     echo '<a href="./">Go to Homepage</a>';
                    //     echo ' | ';
                    //     echo '<a href="./logout.php">(Log Out)</a>';
                    // }
                    ?>

                </div>
            </div>
        </div>
    </section> -->

    <section class="section_margin">
        <div class="admin-container">
            <div class="left">
                <div class="option-box">
                    <select id="selectOption">
                        <option value="" disabled selected>Select Option<span>*</span></option>
                        <?php
                        // echo $session_id(); // This should be replaced with the following line
                        if ($_SESSION["SKEY"] == 1980) {
                            echo '<option value="admin">Admin</option>';
                        }
                        ?>
                        
                        <option value="schedule">Schedule</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <!-- FOR ADMIN OPERATIONS -->
                <div class="options_for_admin">
                    <div class="option-box" id="createAdminOption">
                        <p>CreateA</p>
                    </div>
                    <div class="option-box" id="deleteAdminOption">
                        <p>DeleteA</p>
                    </div>
                    <div class="option-box" id="updateAdminOption">
                        <p>UpdateA</p>
                    </div>
                </div>

                <!-- FOR SCHEDUAL OPERATIONS -->
                <div class="options_for_schedual">
                    <div class="option-box" id="createSchedualOption">
                        <p>CreateS</p>
                    </div>
                    <div class="option-box" id="deleteSchedualOption">
                        <p>DeleteS</p>
                    </div>
                    <div class="option-box" id="updateSchedualOption">
                        <p>UpdateS</p>
                    </div>
                </div>
                <!-- FOR USER OPERATIONS -->
                <div class="options_for_user">
                    <div class="option-box" id="deleteUserOption">
                        <p>DeleteU</p>
                    </div>
                    <div class="option-box" id="updateUserOption">
                        <p>UpdateU</p>
                    </div>
                </div>
                <a href="../index.php">
                    <div class="option-box" id="backOption">
                        <p>Back</p>
                    </div>
                </a>
            </div>
            <!--  -->
            <div class="right">
<!-- ***************************************************************************************************************** -->
                <!-- //ADMIN-DASHBOARD - WELCOME PAGE -->
                <div class="welcome_container" style="display: block;">
                    <div class="right_form">
                        <h3>WELCOME TO ADMIN DASHBOARD</h3>
                    </div>
                </div>
                <!--  -->
<!-- ***************************************************************************************************************** -->
<!-- ***************************************************************************************************************** -->
                <!-- ADMIN FUNCTIONALTIES -->
                <!-- //Functionality - Create ADMIN -->
                <div class="createAdmin_container" style="display: none;">
                    <div class="right_form">
                        <form action="./admin.php" method="POST" id="createAdmin" onsubmit="validate(event);">
                            <p>Create an Admin!</p>

                            <label for="name">Name:</label>
                            <div class="inputField">
                                <input type="text" name="name" placeholder="Enter the name" required />
                            </div>

                            <label for="password">Password:</label>
                            <div class="inputField">
                                <input type="password" name="password" placeholder="Enter the password" required />
                            </div>

                            <label for="pin">Pin:</label>
                            <div class="inputField">
                                <input type="password" name="pin" placeholder="Enter the pin" required />
                            </div>

                            <?php
                            if (isset($createAdminResponse)) {
                                echo '<p>' . $createAdminResponse . '</p>';
                            }
                            ?>

                            <div class="form-buttons">
                                <button type="submit">Create Admin</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!--  -->

                <!-- Functionality - Delete ADMIN -->
                <div class="deleteAdmin_container" style="display: none;">
                    <div class="right-form">
                        <div class="delete_table">
                            <table>
                                <thead>
                                    <th>Admin Name</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to retrieve admins
                                    $query = "SELECT * FROM admin";
                                    $result = $conn->query($query);

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row['Name'] . '</td>';
                                            echo '<td>';
                                            echo '<form action="./admin.php" method="POST">';
                                            echo '<input type="hidden" name="delete_admin_id" value="' . $row['Id'] . '">';
                                            echo '<button type="submit">Delete</button>';
                                            echo '</form>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        echo '<tr><td colspan="2">' . $deleteAdminResponse . '</td></tr>';
                                    } else {
                                        echo '<tr><td colspan="2">No admins available.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  -->

                <!-- //Functionality - Update ADMIN -->
                <div class="updateAdmin_container" style="display: none;">
                    <div class="right_form">
                        <p>Create an Admin!</p>
                        <form action="./admin.php" method="POST">
                            <label for="update_admin_id">Admin ID:</label>
                            <div class="inputField">
                                <input type="text" id="update_admin_id" name="update_admin_id" required>
                            </div>
                            <label for="update_admin_name">New Name:</label>
                            <div class="inputField">
                                <input type="text" id="update_admin_name" name="update_admin_name" required>
                            </div>

                            <label for="update_admin_password">New Password:</label>
                            <div class="inputField">
                                <input type="password" id="update_admin_password" name="update_admin_password" required>
                            </div>

                            <?php
                            if (isset($deleteAdminResponse)) {
                                echo '<p>' . $updateAdminResponse . '</p>';
                            }
                            ?>
                            <div class="form-buttons">
                                <button type="submit">Update Admin</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--  -->
<!-- ***************************************************************************************************************** -->
<!-- ***************************************************************************************************************** -->
                <!-- SCHEDUAL FUNCTIONALTIES -->
                <!-- Functionality - Create Schedule -->
                <div class="createSchedule_container" style="display: none;">
                    <div class="right_form">
                        <form action="./admin.php" method="POST" id="createSchedule" onsubmit="validate(event);">
                            <p>Create a Schedule!</p>

                            <label for="scheduleDate">Schedule Date:</label>
                            <div class="inputField">
                                <input type="date" name="scheduleDate" required />
                            </div>

                            <label for="fromCity">From City:</label>
                            <div class="inputField">
                                <select name="departure_city" id="from" required>
                                    <option value="" disabled selected>From<span>*</span></option>
                                </select>
                            </div>

                            <label for="toCity">To City:</label>
                            <div class="inputField">
                                <select name="arrival_city" id="to" required>
                                    <option value="" disabled selected>To<span>*</span></option>
                                </select>
                            </div>

                            <label for="departureTime">Departure Time:</label>
                            <div class="inputField">
                                <input type="time" name="departureTime" required />
                            </div>

                            <label for="arrivalTime">Arrival Time:</label>
                            <div class="inputField">
                                <input type="time" name="arrivalTime" required />
                            </div>

                            <label for="price">Price:</label>
                            <div class="inputField">
                                <input type="number" name="price" placeholder="Enter the price" step="0.01" required />
                            </div>

                            <?php
                            if (isset($createScheduleResponse)) {
                                echo '<p>' . $createScheduleResponse . '</p>';
                            }
                            ?>

                            <div class="form-buttons">
                                <button type="submit">Create Schedule</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--  -->

                <!-- Functionality - Delete Schedule -->
                <div class="deleteSchedule_container" style="display: none;">
                    <div class="right-form">
                        <div class="delete_table">
                            <table>
                                <thead>
                                    <th>Schedule Date</th>
                                    <th>From City</th>
                                    <th>To City</th>
                                    <th>Departure Time</th>
                                    <th>Trip Time</th>
                                    <th>Arrival Time</th>
                                    <th>Price</th>
                                    <th>Seats</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to retrieve schedules
                                    $query = "SELECT * FROM schedual";
                                    $result = $conn->query($query);

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row['Date'] . '</td>';
                                            echo '<td>' . $row['FromCity'] . '</td>';
                                            echo '<td>' . $row['ToCity'] . '</td>';
                                            echo '<td>' . $row['Departure'] . '</td>';
                                            echo '<td>' . $row['TripTime'] . '</td>';
                                            echo '<td>' . $row['Arrival'] . '</td>';
                                            echo '<td>' . $row['Price'] . '</td>';
                                            echo '<td>' . $row['Seats'] . '</td>';
                                            echo '<td>';
                                            echo '<form action="./admin.php" method="POST">';
                                            echo '<input type="hidden" name="delete_schedule_id" value="' . $row['Id'] . '">';
                                            echo '<button type="submit">Delete</button>';
                                            echo '</form>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        echo '<tr><td colspan="9" style="text-align: center;">' . $deleteScheduleResponse . '</td></tr>';
                                    } else {
                                        echo '<tr><td colspan="9">No schedules available.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  -->

                <!-- //Functionality - Update Schedule -->
                <div class="updateSchedule_container" style="display: none;">
                    <div class="right_form">
                        <p>Update Schedule!</p>
                        <form action="./admin.php" method="POST">
                            <label for="update_schedule_id">Schedule ID:</label>
                            <div class="inputField">
                                <input type="text" id="update_schedule_id" name="update_schedule_id">
                            </div>

                            <label for="update_schedule_date">New Schedule Date:</label>
                            <div class="inputField">
                                <input type="date" id="update_schedule_date" name="update_schedule_date">
                            </div>

                            <label for="update_departure_city">New Departure City:</label>
                            <div class="inputField">
                                <input type="text" id="update_departure_city" name="update_departure_city">
                            </div>

                            <label for="update_arrival_city">New Arrival City:</label>
                            <div class="inputField">
                                <input type="text" id="update_arrival_city" name="update_arrival_city">
                            </div>

                            <label for="update_departure_time">New Departure Time:</label>
                            <div class="inputField">
                                <input type="time" id="update_departure_time" name="update_departure_time">
                            </div>

                            <label for="update_arrival_time">New Arrival Time:</label>
                            <div class="inputField">
                                <input type="time" id="update_arrival_time" name="update_arrival_time">
                            </div>

                            <label for="update_price">New Price:</label>
                            <div class="inputField">
                                <input type="number" id="update_price" name="update_price">
                            </div>

                            <?php
                            if (isset($updateScheduleResponse)) {
                                echo '<p>' . $updateScheduleResponse . '</p>';
                            }
                            ?>
                            <div class="form-buttons">
                                <button type="submit">Update Schedule</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--  -->
<!-- ***************************************************************************************************************** -->
<!-- ***************************************************************************************************************** -->
                <!-- USER FUNCTIONALTIES -->
                <!-- Functionality - Delete USER -->
                <div class="deleteUser_container" style="display: none;">
                    <div class="right-form">
                        <div class="delete_table">
                            <table>
                                <thead>
                                    <th>User ID</th>
                                    <th>Full Name</th>
                                    <th>CNIC</th>
                                    <th>Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>D.O.B</th>
                                    <th>Email</th>
                                    <th>Booking Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to retrieve user data based on Rschedual condition
                                    $query = "SELECT user.*, schedual.FromCity, schedual.ToCity, schedual.Date AS BookingDate
                                    FROM user
                                    LEFT JOIN schedual ON user.Dschedual = schedual.Id";
                                    $result = $conn->query($query);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            if ($row['Rschedual'] == 0) {
                                                echo '<tr>';
                                                echo '<td>' . $row['Id'] . '</td>';
                                                echo '<td>' . $row['Fname'] . ' ' . $row['Mname'] . ' ' . $row['Lname'] . '</td>';
                                                echo '<td>' . $row['Cnic'] . '</td>';
                                                echo '<td>' . 'One-way' . '</td>'; // Assuming one-way for Dschedual
                                                echo '<td>' . $row['FromCity'] . '</td>';
                                                echo '<td>' . $row['ToCity'] . '</td>';
                                                if ($row['Gender'] == 1) {
                                                    echo '<td> Male </td>';
                                                } else {
                                                    echo '<td> Female </td>';
                                                }
                                                echo '<td>' . $row['Tel'] . '</td>';
                                                echo '<td>' . $row['Dob'] . '</td>';
                                                echo '<td>' . $row['Email'] . '</td>';
                                                echo '<td>' . date('d-m-Y', strtotime($row['BookingDate'])) . '</td>';
                                                echo '<td>';
                                                echo '<form method="post" action="./admin.php">';
                                                echo '<input type="hidden" name="delete_user_id" value="' . $row['Id'] . '">';
                                                echo '<input type="hidden" name="delete_user_type" value="Dschedual">';
                                                echo '<button type="submit" class="delete-button">Delete</button>';
                                                echo '</form>';
                                                echo '</td>';
                                                echo '</tr>';
                                            } else if ($row['Rschedual'] > 0) {
                                                // BASED ON DSCHEDUAL
                                                echo '<tr>';
                                                echo '<td>' . $row['Id'] . '</td>';
                                                echo '<td>' . $row['Fname'] . ' ' . $row['Mname'] . ' ' . $row['Lname'] . '</td>';
                                                echo '<td>' . $row['Cnic'] . '</td>';
                                                echo '<td>' . 'Return' . '</td>'; // Assuming one-way for Dschedual
                                                echo '<td>' . $row['FromCity'] . '</td>';
                                                echo '<td>' . $row['ToCity'] . '</td>';
                                                if ($row['Gender'] == 1) {
                                                    echo '<td> Male </td>';
                                                } else {
                                                    echo '<td> Female </td>';
                                                }
                                                echo '<td>' . $row['Tel'] . '</td>';
                                                echo '<td>' . $row['Dob'] . '</td>';
                                                echo '<td>' . $row['Email'] . '</td>';
                                                echo '<td>' . date('d-m-Y', strtotime($row['BookingDate'])) . '</td>';
                                                echo '<td>';
                                                echo '<form method="post" action="./admin.php">';
                                                echo '<input type="hidden" name="delete_user_id" value="' . $row['Id'] . '">';
                                                echo '<input type="hidden" name="delete_user_type" value="Dschedual">';
                                                echo '<button type="submit" class="delete-button">Delete</button>';
                                                echo '</form>';
                                                echo '</td>';
                                                echo '</tr>';

                                                // BASED ON RSCHDEUAL
                                                $query = "SELECT user.*, schedual.FromCity, schedual.ToCity, schedual.Date AS BookingDate
                                                FROM user  
                                                LEFT JOIN schedual ON user.Rschedual = schedual.Id
                                                where user.Id = " . $row['Id'];
                                                $returnResult = $conn->query($query);
                                                if ($returnResult->num_rows > 0) {
                                                    $Rrow = $returnResult->fetch_assoc();
                                                    echo '<tr>';
                                                    echo '<td>' . $Rrow['Id'] . '</td>';
                                                    echo '<td>' . $Rrow['Fname'] . ' ' . $Rrow['Mname'] . ' ' . $Rrow['Lname'] . '</td>';
                                                    echo '<td>' . $Rrow['Cnic'] . '</td>';
                                                    echo '<td>' . 'Return' . '</td>'; // Assuming one-way for Dschedual
                                                    echo '<td>' . $Rrow['FromCity'] . '</td>';
                                                    echo '<td>' . $Rrow['ToCity'] . '</td>';
                                                    if ($row['Gender'] == 1) {
                                                        echo '<td> Male </td>';
                                                    } else {
                                                        echo '<td> Female </td>';
                                                    }
                                                    echo '<td>' . $Rrow['Tel'] . '</td>';
                                                    echo '<td>' . $Rrow['Dob'] . '</td>';
                                                    echo '<td>' . $Rrow['Email'] . '</td>';
                                                    echo '<td>' . date('d-m-Y', strtotime($Rrow['BookingDate'])) . '</td>';
                                                    echo '<td>';
                                                    echo '<form method="post" action="./admin.php">';
                                                    echo '<input type="hidden" name="delete_user_id" value="' . $Rrow['Id'] . '">';
                                                    echo '<input type="hidden" name="delete_user_type" value="Rschedual">';
                                                    echo '<button type="submit" class="delete-button">Delete</button>';
                                                    echo '</form>';
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                                // 
                                            }
                                        }
                                        echo '<tr><td colspan="12" style="text-align: center;">' . $deleteUserResponse . '</td></tr>';
                                    } else {
                                        echo '<tr><td colspan="12">No User available.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  -->

                <!-- //Functionality - Update USER -->
                <!-- Functionality - Updating User -->
                <div class="updateUser_container" style="display: block;">
                    <div class="right_form">
                        <p>Update User Information</p>
                        <form action="./admin.php" method="POST">
                            <label for="update_user_id">User ID:</label>
                            <div class="inputField">
                                <input type="text" id="update_user_id" name="update_user_id">
                            </div>

                            <label for="update_fname">New First Name:</label>
                            <div class="inputField">
                                <input type="text" id="update_fname" name="update_fname">
                            </div>

                            <label for="update_mname">New Middle Name:</label>
                            <div class="inputField">
                                <input type="text" id="update_mname" name="update_mname">
                            </div>

                            <label for="update_lname">New Last Name:</label>
                            <div class="inputField">
                                <input type="text" id="update_lname" name="update_lname">
                            </div>

                            <label for="update_cnic">New CNIC:</label>
                            <div class="inputField">
                                <input type="text" id="update_cnic" name="update_cnic">
                            </div>

                            <label for="update_gender">New Gender:</label>
                            <div class="inputField">
                                <input type="text" id="update_gender" name="update_gender">
                            </div>

                            <label for="update_tel">New Phone:</label>
                            <div class="inputField">
                                <input type="text" id="update_tel" name="update_tel">
                            </div>

                            <label for="update_dob">New Date of Birth:</label>
                            <div class="inputField">
                                <input type="date" id="update_dob" name="update_dob">
                            </div>

                            <label for="update_email">New Email:</label>
                            <div class="inputField">
                                <input type="text" id="update_email" name="update_email">
                            </div>

                            <?php
                            if (isset($updateUserResponse)) {
                                echo '<p>' . $updateUserResponse . '</p>';
                            }
                            ?>
                            <div class="form-buttons">
                                <button type="submit">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--  -->
<!-- ***************************************************************************************************************** -->
            </div>
    </section>

    <!-- FOOTER SECTION -->
    <?php
    include "../footer/footer.php";
    ?>

<!-- JS STARTS HERE -->
    <script>
        var formLocationDataArray = <?php echo json_encode($form_location_data_array); ?>;
    </script>

    <script src="./admin.js"></script>

    <script>
        $(document).ready(function() {
            // Call the function to populate the "From" dropdown
            populateDropdown('from', 'to', formLocationDataArray);

            // Add change event listener to "From" dropdown
            $('#from').change(function() {
                populateToDropdown(this.value, 'to', formLocationDataArray);
            });
        });
    </script>
</body>

</html>