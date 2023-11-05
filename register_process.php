<?php
$conn = mysqli_connect("localhost", "root", "", "task_manager");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];

if (strlen($password) < 8) {
    echo "Password should be at least 8 characters long. Please try again.";
} else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO log_reg (username, password, name) VALUES ('$username', '$hashedPassword', '$name')";

    if (mysqli_query($conn, $query)) {
        echo "Registration successful. <a href='login.php'>Login</a>";

        // Redirect to dashboard.php after two minutes
        header("Refresh: 2; URL=dashboard.php");
        exit; // Terminate the script after redirect
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
