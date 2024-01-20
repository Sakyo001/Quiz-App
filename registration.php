<?php
include('config.php');

// Check if the form is submitted for registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Handle registration
    include('register.php');

    // Check if registration was successful
    if ($registration_successful) {
        echo '<script>showPopup();</script>';
    }
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
    <div class="register-container">
        <h2>Register</h2>
        <form method="post" action="">
            <label for="register_name">Name:</label>
            <input type="text" id="register_name" name="register_name" required>

            <label for="register_email">Email:</label>
            <input type="email" id="register_email" name="register_email" required>

            <label for="register_password">Password:</label>
            <input type="password" id="register_password" name="register_password" required>

            <button type="submit" name="register">Register</button>
            <span>Already have an account?<a href="index.php">click here</a></span>
        </form>
    </div>
</div>

<div id="signup-popup" class="popup-container">
    <div class="popup-content">
        <span class="close-popup" onclick="closePopup()">&times;</span>
        <p>Thank you for signing up!</p>
    </div>
</div>

<script>
    // Function to show the popup
    function showPopup() {
        document.getElementById("signup-popup").style.display = "block";
    }

    // Function to close the popup
    function closePopup() {
        document.getElementById("signup-popup").style.display = "none";
    }
</script>


</body>
</html>
  
  
  
