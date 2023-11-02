<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #808080;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        button[type="submit"] {
            background-color: #4CAF50; /* Green color */
            color: black;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        /* Disable the button by default */
        button[type="submit"]:disabled {
            background-color: #ccc; /* Light gray when disabled */
            cursor: not-allowed;
        }
    </style>
 <script>
    function validatePassword() {
      var passwordInput = document.getElementById('password');
      var registerButton = document.getElementById('register-button');
      
      if (passwordInput.value.length < 8) {
        registerButton.disabled = true;
      } else {
        registerButton.disabled = false;
      }
    }
  </script>
</head>
<body>
  <h1>Registration Form</h1>
  <form method="post" action="register_process.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required onkeyup="validatePassword()">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit" id="register-button" disabled>Register</button>
  </form>
</body>
</html>
