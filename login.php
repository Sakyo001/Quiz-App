<?php

if($_SERVER["REQUEST_METHOD"] == TRUE && isset($_POST['login'])){
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0 ){
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        header("Location: dashboard.php");
        exit();
    } else{
        echo "Invalid email or password";
    }

}

?>