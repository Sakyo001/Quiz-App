<?php
include('config.php');

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Handle login
    include('login.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="title-div">
    <h2>
        Quiz App Project
    </h2>
</div>


<div class="container">
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" action="">
            <label for="login_email">Email:</label>
            <input type="email" id="login_email" name="login_email" required>

            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="login_password" required>

            <button type="submit" name="login">Login</button>
            <span>Don't have an account yet?<a href="registration.php">Sign Up</a></span>

        </form>
</div>


</body>
</html>
