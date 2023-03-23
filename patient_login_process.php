<?php
// Start the session
session_start();


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

// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database for the user
$query = "SELECT * FROM patient WHERE username='$username' AND password='$password' AND status=1";
$result = mysqli_query($conn, $query);


if($result === false){
	// Print an error message and exit
	echo "Query failed: " . mysqli_error($conn);
	exit();
}

if(mysqli_num_rows($result) == 1){
	// Set the session variables
	$_SESSION['username'] = $username;
	
	// Redirect to the patient dashboard
	exit();
}
else{
	// Redirect back to the login page with an error message
	header('Location: patient_login.php?error=1');
	exit();
}
?>
