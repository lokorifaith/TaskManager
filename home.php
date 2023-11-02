<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <!-- Add your menu here -->
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </nav>
    </header>
    <div class="hero">
        <h1>Welcome to the TO DO LIST</h1>
    </div>

    <div class="container">
        <h1>Task Manager</h1>
       <form method="post" action="task_process.php" id="task-form">
  <label for="task-name">Task Name:</label> 
  <input type="text" id="task-name" name="task_name" required> 
  <label for="task-description">Description:</label>
  <textarea id="task-description" name="task_description" required></textarea>
 <button type="submit">Add Task</button>
</form>

        <ul id="task-list"></ul>
    </div>

    <script src="script.js"></script>
</body>
</html>
