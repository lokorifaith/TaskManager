<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_manager";

$conn = new mysqli("localhost", "root", "", "task_manager");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
