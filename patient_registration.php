<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("Location: admin_login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Registration</title>
	<style>
	body {
			background-color: #f1f1f1;
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
			color: #333;
		}
		.container {
			margin: auto;
			width: 50%;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px #aaa;
		}
		form {
			display: flex;
			flex-direction: column;
		}
		label {
			font-weight: bold;
			margin-top: 20px;
			margin-bottom: 5px;
			color: #333;
		}
		input[type="text"], input[type="password"], input[type="tel"], textarea {
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			font-size: 16px;
			margin-bottom: 20px;
			color: #333;
			background-color: #f9f9f9;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			font-size: 18px;
			border-radius: 5px;
			padding: 10px;
			border: none;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}	
	</style>
</head>
<body>
	<h1>Patient Registration</h1>
	<div class="container">
		<form method="post">
       <label for="fullname">Full Name:</label>
		<input type="text" name="fullname" required>

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

		<label for="username">Username:</label>
		<input type="text" name="username" required>

		<label for="password">Password:</label>
		<input type="password" name="password" required>

		<input type="submit" value="Register">
    </form>
	</div>
</body>
</html>
