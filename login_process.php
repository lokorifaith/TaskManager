<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "doctors_portal");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM log_reg WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row && password_verify($password, $row['password'])) {
    if (strlen($password) >= 8) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Login failed. Password should be at least 8 characters long. <a href='login.php'>Try again</a>";
    }
} else {
    echo "Login failed. <a href='login.php'>Try again</a>";
}

mysqli_close($conn);
?>
