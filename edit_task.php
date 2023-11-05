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
    $taskId = $_POST['task_id'];
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];

    // Update the task in the database
    $sql = "UPDATE tasks SET task_name = ?, task_description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $taskName, $taskDescription, $taskId);
    
    if ($stmt->execute()) {
        // Task updated successfully
        header("Location: thank.php");
        exit();
    } else {
        // Handle database error
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
