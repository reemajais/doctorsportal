<?php

?>
<!DOCTYPE html>
<html>
<head>
  <title>Doctor Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
 /* About Us section */
#about-us {
  padding: 80px 0;
  background-color: #f7f7f7;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
  margin-bottom: 50px;
}
#about-us h2 {
  font-size: 36px;
  font-weight: bold;
  color: #555;
  margin-bottom: 40px;
}
#about-us p {
  font-size: 18px;
  line-height: 28px;
  color: #777;
}

/* Footer */
footer {
  background-color: #f8f9fa;
  border-top: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
}
footer h3 {
  font-size: 24px;
  font-weight: bold;
  color: #555;
  margin-bottom: 20px;
}
footer p,
footer a {
  font-size: 14px;
  line-height: 24px;
  color: #777;
}
footer a {
  text-decoration: none;
}
footer a:hover {
  color: #333;
}

  </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Doctor Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="admin_login.php">Admin Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="doctor_login.php">Doctor Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="patient_login.php">Patient Login</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Banner -->
<div class="jumbotron jumbotron-fluid bg-secondary text-white">
  <div class="container">
    <h1>Welcome to Doctor Portal</h1>
    <p>Find the best doctors in your city</p>
    <form action="#" method="POST">
      <div class="form-row">
        <div class="col-md-4 mb-3">
          <input type="text" class="form-control" placeholder="Enter your location">
        </div>
        <div class="col-md-4 mb-3">
          <select class="form-control">
            <option>Select Speciality</option>
            <?php
            // PHP code to fetch specialities from database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "doctorsportal_db";

            // Create connection
            $conn = new mysqli("localhost", "root", "", "doctorsportal_db");

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // Fetch specialities from database
            $sql = "SELECT id, title FROM speciality WHERE status = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Output data of each row
              while($row =$result->fetch_assoc()) {
                     echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
    }
  } else {
    echo "<option>No specialities found</option>";
  }
  ?>
</select>
</div>
          
 <!-- About Us Section -->
<section id="about-us" class="container my-5">
  <h2>About Us</h2>
  <p>Welcome to Doctor Portal! Our mission is to connect patients with the best doctors in their city. We believe that access to quality healthcare is a fundamental right, and our platform aims to make it easier for patients to find the right doctor for their needs.</p>
  <br>
  <p>Our team is made up of healthcare professionals, software engineers, and designers who are passionate about improving the healthcare industry. We work tirelessly to ensure that our platform is user-friendly, secure, and up-to-date with the latest medical knowledge and technology.</p>
  <br>
  <p>At Doctor Portal, we believe in transparency and accountability. We only work with doctors who have the necessary qualifications and certifications, and we encourage patients to leave honest reviews and feedback about their experiences.</p>
  <br>
  <p>Thank you for choosing Doctor Portal for your healthcare needs. We're committed to providing you with the best possible service, and we welcome any feedback or suggestions you may have.</p>
</section> 
 
 <!-- Footer -->
<footer class="container-fluid bg-light py-3">
  <div class="row">
    <div class="col-sm-4">
      <h3>Contact Us</h3>
      <p>Address: 123 Main St, City, State ZIP</p>
      <p>Email: info@doctorsportal.com</p>
      <p>Phone: (123) 456-7890</p>
    </div>
       <div class="col-sm-4">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#about-us">About Us</a></li>
        <li><a href="#col-sm-4">Contact Us</a></li>
      </ul>
    </div>
      <div class="col-sm-4">
      <h3>Connect with Us</h3>
      <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Instagram</a></li>
      </ul>
    </div>
  </div>
</footer>
</body>
</html>
