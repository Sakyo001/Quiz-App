<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])){
    $name = $_POST['register_name'];
    $email = $_POST['register_email'];
    $password = $_POST['register_password'];

    $sql = "INSERT INTO users (name, email, password) VALUES('$name', '$email', '$password')";

    if($conn->query($sql) === TRUE){
        echo "Registration successful";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

?>