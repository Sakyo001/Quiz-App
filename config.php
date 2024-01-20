<?php
session_start();

// database 
$host = "localhost";
$username = "root";
$password = "";
$database  = "quizapp";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
