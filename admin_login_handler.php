<?php
session_start();
//connect to database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'doctorsportal_db';
$conn = mysqli_connect('localhost', 'root', '', 'doctorsportal_db');


// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are correct
    if ($username === "admin" && $password === "admin") {
        // Set session variables
        $_SESSION['admin_username'] = $username;

        // Redirect to admin panel
        header("Location: admin_panel.php");
        exit();
    } else {
        // Invalid credentials
        $error = "Invalid username or password";
    }
}
?>


