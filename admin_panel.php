<?php
session_start();
if(!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
      /* Global styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 16px;
  line-height: 1.6;
  background-color: #f9f9f9;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Header styles */
header {
  background-color: #00587a;
  color: #fff;
  padding: 20px 0;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav-brand a {
  font-size: 24px;
  font-weight: bold;
  color: #fff;
  text-decoration: none;
}

.nav-items ul {
  display: flex;
  list-style: none;
}

.nav-items ul li {
  margin-left: 20px;
}

.nav-items ul li a {
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  font-size: 18px;
  padding: 10px;
  border-radius: 5px;
  transition: all 0.3s ease-in-out;
}

.nav-items ul li a:hover {
  background-color: #fff;
  color: #00587a;
}

/* Main styles */
main {
  padding: 50px 0;
  text-align: center;
}

h1 {
  font-size: 48px;
  font-weight: bold;
  margin-bottom: 20px;
}

p {
  font-size: 20px;
  color: #555;
}

/* Footer styles */
footer {
  background-color: #333;
  color: #fff;
  padding: 20px 0;
  text-align: center;
}

footer p {
  font-size: 16px;
}
  
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <div class="nav-brand">
                    <a href="index.php">Doctor's Portal</a>
                </div>
                <div class="nav-items">
                    <ul>
                        <li><a href="admin_panel.php">Admin Panel</a></li>
                        <li><a href="doctor_registration.php">Doctor Registration</a></li>
                        <li><a href="patient_registration.php">Patient Registration</a></li>
                        <li><a href="allot_doctor_to_patient.php">Allot doctor</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Welcome to Admin Panel</h1>
            <p>You can manage doctors and patients from here.</p>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2023 Doctor's Portal. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
