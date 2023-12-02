<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./signup.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page_width">
    <form action="./signup_process_form.php" method="post" class="login_form">
        <h2>Signup</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required onblur="checkUsernameAvailability()">
        <p id="usernameResult"></p>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required onkeyup="checkPasswordStrength()">
        <p id="passwordResult"></p>

        <input type="submit" value="Signup">
    </form>
    </div>
    
    
    <script>

        function checkUsernameAvailability() {
            var username = $('#username').val();

            $.ajax({
                type: 'POST',
                url: './check_username.php', // Replace with your server endpoint
                data: { username: username },
                success: function (response) {
                    $('#usernameResult').html(response);
                }
            });
        }

        function checkPasswordStrength() {
            var password = $('#password').val();

            $.ajax({
                type: 'POST',
                url: './check_password_strength.php', // Replace with your server endpoint
                data: { password: password },
                success: function (response) {
                    $('#passwordResult').html(response);
                }
            });
        }
    </script>
</body>

</html>
