<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'task_manager';

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];

    // Insert form data into the database
    $sql = "INSERT INTO tasks (task_name, task_description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $taskName, $taskDescription);
    $stmt->execute();
    $stmt->close();

    // Redirect to a success page or perform other actions
    header("Location: thank.php");
    exit();
}

$conn->close();
?>
