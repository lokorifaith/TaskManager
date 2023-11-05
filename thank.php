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

// Function to retrieve tasks from the database
function getTasks($conn) {
    $tasks = array();
    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
    }
    return $tasks;
}

$tasks = getTasks($conn);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Manager List</title>
    <style>
        /* Your CSS styles for the table can go here */
         table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            margin-right: 10px;
        }

        .button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>TASK LIST MANAGER</h1>
    <!-- Your table and task list display code can go here -->
    <table>
    <tr>
        <th>Task Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($tasks as $task) : ?>
        <tr>
            <td><?php echo $task['task_name']; ?></td>
            <td><?php echo $task['task_description']; ?></td>
            <td>
                <button class="button" onclick="location.href='edit_task.php?task_id=<?php echo $task['id']; ?>'">Edit</button>
                <button class="button" onclick="location.href='mark_complete.php?task_id=<?php echo $task['id']; ?>'">Mark Complete</button>
                <button class="button" onclick="location.href='delete_task.php?task_id=<?php echo $task['id']; ?>'">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
