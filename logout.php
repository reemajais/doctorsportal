<?php
session_start();
if(isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<style>
            .container {
			margin: 100px auto;
			width: 50%;
			text-align: center;
		}
		body {
			background-color: #f1f1f1;
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
			color: #333;
		}
		p {
			text-align: center;
			margin-top: 20px;
			color: #666;
			font-size: 18px;
		}
		a {
			display: block;
			margin-top: 30px;
			text-align: center;
			color: #333;
			text-decoration: none;
			font-size: 18px;
		}
		a:hover {
			color: #666;
		}
	</style>
</head>
<body>
    <div class="container">
	<h1>Logout Successful</h1>
	<p>You have been successfully logged out.</p>
	<a href="admin_login.php">Login Again</a>
        </div>
</body>
</html>
