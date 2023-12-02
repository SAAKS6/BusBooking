<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./login.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page_width">
    <form action="./login_process_form.php" method="post" class="login_form">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <p id="usernameResult"></p>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <p id="passwordResult"></p>

        <input type="submit" value="Login">
    </form>
    </div>
</body>

</html>
