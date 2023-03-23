<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['admin_id'])) {
    header('Location: admin_panel.php');
    exit();
}

// Check if the login form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'doctorsportal_db');

    // Prepare the SQL query to fetch the admin data
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' AND status = 1";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query returned a single row
    if (mysqli_num_rows($result) === 1) {
        // Fetch the admin data from the row
        $admin = mysqli_fetch_assoc($result);

        // Store the admin ID in the session
        $_SESSION['admin_id'] = $admin['id'];

        // Redirect the user to the admin panel
        header('Location: admin_panel.php');
        exit();
    } else {
        // Invalid credentials, show an error message
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
  font-family: Arial, sans-serif;
}

h1 {
  text-align: center;
}

form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f7f7f7;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 3px;
  box-sizing: border-box;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}

    </style>
</head>
<body>
    <h1>Admin Login</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
