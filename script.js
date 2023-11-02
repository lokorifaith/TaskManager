 // Function to add a new task
 function addTask(event) {
  event.preventDefault(); // Prevent form submission

  // Get task name and description from the form
  const taskNameInput = document.getElementById('task-name');
  const taskDescriptionInput = document.getElementById('task-description');
  const taskName = taskNameInput.value;
  const taskDescription = taskDescriptionInput.value;

  // Validate inputs
  if (taskName.trim() === '' || taskDescription.trim() === '') {
      alert('Please enter a task name and description');
      return;
  }

  // Create a new task object
  const task = {
      name: taskName,
      description: taskDescription,
      completed: false
  };

  // Add the task to the task list
  tasks.push(task);
  displayTasks();

  // Clear the form inputs
  taskNameInput.value = '';
  taskDescriptionInput.value = '';
}

// Function to display the task list
function displayTasks() {
  const taskList = document.getElementById('task-list');
  taskList.innerHTML = '';

  tasks.forEach((task, index) => {
      const listItem = document.createElement('li');
      if (task.completed) {
          listItem.classList.add('completed');
      }

      listItem.innerHTML = `
          <span>${task.name}</span>
          <span>${task.description}</span>
          <div>
              <button onclick="markTaskCompleted(${index})">Mark Completed</button>
              <button onclick="editTask(${index})">Edit</button>
              <button onclick="deleteTask(${index})">Delete</button>
          </div>
      `;

      taskList.appendChild(listItem);
  });
}

// Function to mark a task as completed
function markTaskCompleted(index) {
  tasks[index].completed = true;
  displayTasks();
}

// Function to edit a task
function editTask(index) {
  const newName = prompt('Enter the new task name');
  if (newName && newName.trim() !== '') {
      tasks[index].name = newName;
  }

  const newDescription = prompt('Enter the new task description');
  if (newDescription && newDescription.trim() !== '') {
      tasks[index].description = newDescription;
  }

  displayTasks();
}

// Function to delete a task
function deleteTask(index) {
  tasks.splice(index, 1);
  displayTasks();
}

// Event listener for form submission
const taskForm = document.getElementById('task-form');
taskForm.addEventListener('submit', addTask);

// Initial tasks array
let tasks = [];

// Display any existing tasks on page load
displayTasks();