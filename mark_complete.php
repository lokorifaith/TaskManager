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

    // Mark the task as complete in the database
    $sql = "UPDATE tasks SET is_completed = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $taskId);
    
    if ($stmt->execute()) {
        // Task marked as complete successfully
        header("Location: thank.php"); // Redirect to a success page or task list
        exit();
    } else {
        // Handle database error
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
