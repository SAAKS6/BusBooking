<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus Ticket Booking System Admin Dashboard</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #FFFFFF;
      color: black;
      display: flex;
      min-height: 100vh;
    }

    #sidebar {
      width: 200px;
      background-color: #058B8C;
      color: #FFFFFF;
      padding: 20px;
    }

    #content {
      flex-grow: 1;
      padding: 20px;
    }

    .form-container {
      background-color: #FFFFFF;
      padding: 20px;
      border: 1px solid #058B8C;
      display: none;
    }

    button {
      background-color: #058B8C;
      color: #FFFFFF;
      padding: 10px;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #045C5D;
    }
  </style>
</head>
<body>

  <div id="sidebar">
    <label for="selectOption">Select Option:</label>
    <select id="selectOption">
      <option value="admin">Admin</option>
      <option value="schedule">Schedule</option>
      <option value="user">User</option>
    </select>

    <label for="selectOperation">Select Operation:</label>
    <select id="selectOperation">
      <option value="create">Create</option>
      <option value="update">Update</option>
      <option value="delete">Delete</option>
    </select>
  </div>

  <div id="content">
    <div id="adminForm" class="form-container">
      <h2>Admin Form</h2>
      <label for="adminName">Admin Name:</label>
      <input type="text" id="adminName" name="adminName" required>

      <label for="adminEmail">Admin Email:</label>
      <input type="email" id="adminEmail" name="adminEmail" required>

      <button onclick="submitForm('admin')">Submit</button>
    </div>

    <div id="scheduleForm" class="form-container">
      <h2>Schedule Form</h2>
      <!-- Add schedule form fields here -->
      <button onclick="submitForm('schedule')">Submit</button>
    </div>

    <div id="userForm" class="form-container">
      <h2>User Form</h2>
      <!-- Add user form fields here -->
      <button onclick="submitForm('user')">Submit</button>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#selectOption, #selectOperation').change(function() {
        var selectedOption = $('#selectOption').val();
        var selectedOperation = $('#selectOperation').val();

        // Hide all form containers
        $('.form-container').hide();

        // Show the selected form container based on the option
        $('#' + selectedOption + 'Form').show();
      });
    });

    function submitForm(type) {
      // Add your form submission logic here
      alert(type + ' Form submitted!');
    }
  </script>
</body>
</html>



<!-- IMP IMP IMP -->

                
                
                <!-- Functionality - Create Ticker -->
                <div class="createTicker-container" style="display: none;">
                    <div class="right-form">
                        <form action="./admin.php" method="POST" id="createTicker" enctype="multipart/form-data" onsubmit="validate(event);">
                            <p>Create a Ticker!</p>

                            <label id="label" for="tickerTitle">Ticker Title:</label>
                            <div class="inputField">
                                <input type="text" name="tickerTitle" placeholder="Enter the content of Ticker!" required />
                            </div>

                            <?php
                            if (isset($createMsg)) {
                                echo '<p>' . $createTickerMsg . '</p>';
                            }
                            ?>

                            <div class="form-buttons">
                                <button type="submit">Upload Ticker!</button>

                            </div>

                        </form>
                    </div>
                </div>

                <!-- //Functionality - Delete Tciker  -->
                <div class="deleteTicker-container" style="display: none;">
                    <div class="right-form">
                        <div class="delete-table">
                            <table>
                                <thead>
                                    <th>Ticker Content</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    include('./database/db.php');

                                    // Get the author's name from the session
                                    $query = "SELECT * FROM tickers";
                                    $result = $conn->query($query);

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $row['ticker_content'] . '</td>';
                                            echo '<td>';
                                            echo '<form method="POST">';
                                            echo '<input type="hidden" name="delete_ticker_id" value="' . $row['ticker_id'] . '">';
                                            echo '<button type="submit">Delete</button>';
                                            echo '</form>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="2">No tickers available.</td></tr>';
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


            <?php
