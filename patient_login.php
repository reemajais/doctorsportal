<!DOCTYPE html>
<html>
<head>
	<title>Patient Login</title>
	<style type="text/css">
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		form {
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 20px;
			max-width: 500px;
			margin: 0 auto;
		}
		h2 {
			text-align: center;
			margin-bottom: 30px;
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}
		input[type="text"], input[type="password"] {
			padding: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
			width: 100%;
			margin-bottom: 20px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
		.error {
			color: red;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<form method="post" action="patient_login_process.php">
		<h2>Patient Login</h2>
		<?php
			if(isset($_GET['error'])){
				echo '<div class="error">Invalid username or password!</div>';
			}
		?>
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>
		<input type="submit" value="Login">
	</form>
</body>
</html>
