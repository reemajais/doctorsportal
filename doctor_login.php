<?php
session_start();
if(isset($_SESSION['doctor_id'])){
  header("Location: doctor_panel.php");
  exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Sanitize input
  $username = filter_var($username, FILTER_SANITIZE_STRING);
  $password = filter_var($password, FILTER_SANITIZE_STRING);

  // Connect to database
  $servername = "localhost";
  $db_username = "root";
  $db_password = "";
  $dbname = "doctorsportal_db";
  $conn = mysqli_connect("localhost", "root", "", "doctorsportal_db");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Fetch doctor from database
  $sql = "SELECT * FROM doctor WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['doctor_id'] = $row['id'];
    header("Location: doctor_panel.php");
    exit();
  } else {
    $error = "Invalid credentials";
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Doctor Login</title>
  <style>
      form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f2f2f2;
}

form label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
}

form input[type="text"],
form input[type="password"] {
  width: 95%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

form button[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

form button[type="submit"]:hover {
  background-color: #45a049;
}

  </style>
</head>
<body>
  <form class="login-form" action="doctor_login.php" method="post">
  <h1>Doctor Login</h1>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>

    
  <?php
  if(isset($error)){
    echo $error;
  }
  ?>
</body>
</html>
