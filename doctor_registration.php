<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the admin login page
    header("Location: admin_login.php");
    exit();
}

// Continue with the doctor registration page if the admin is logged in
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Registration</title>
      <link rel="stylesheet" type="text/css" href="doctor_registration.css">
  
</head>
<body>
    <!-- include your header and navigation menu code here -->
    
    <!-- main content of the doctor registration page -->
    <h1>Doctor Registration</h1>
    <p>Please fill in the form below to register a new doctor:</p>
    
    <form method="post" action="doctor_registration_handler.php">
       <label for="fullname">Full Name:</label>
		<input type="text" name="fullname" required>

		<label for="email_id">Email:</label>
		<input type="email_id" name="email_id" required>

		<label for="primary_contact_number">Primary Contact Number:</label>
		<input type="tel" name="primary_contact_number" required>

		<label for="secondary_contact_number">Secondary Contact Number:</label>
		<input type="tel" name="secondary_contact_number">

		<label for="address">Address:</label>
		<textarea name="address" required></textarea>

		<label for="adharcard_number">Adhar Card Number:</label>
		<input type="text" name="adharcard_number" required>

		<label for="pancard_number">PAN Card Number:</label>
		<input type="text" name="pancard_number" required>

		<label for="joining_date">Joining Date:</label>
		<input type="date" name="joining_date" required>

		<label for="speciality_id">Speciality:</label>
		<select name="speciality_id" required>
			<option value="">Select Speciality</option>
			<option value="1">Cardiology</option>
			<option value="2">Dermatology</option>
			<option value="3">Neurology</option>
			<option value="4">Orthopaedics</option>
			<option value="5">Pediatrics</option>
		</select>

		<label for="visit_time_from">Visit Time From:</label>
		<input type="time" name="visit_time_from" required>

		<label for="visit_time_to">Visit Time To:</label>
		<input type="time" name="visit_time_to" required>

		<label for="username">Username:</label>
		<input type="text" name="username" required>

		<label for="password">Password:</label>
		<input type="password" name="password" required>

		<input type="submit" value="Register">
    </form>
</body>
</html>
