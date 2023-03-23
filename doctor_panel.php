<?php
session_start();
if(!isset($_SESSION['doctor_id'])){
  header("Location: doctor_login.php");
  exit();
}

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

// Fetch allocated patients from database
$doctor_id = $_SESSION['doctor_id'];
$sql = "SELECT * FROM patient WHERE doctor_id='$doctor_id'";
$result = mysqli_query($conn, $sql);
if (!$result) {
  // Handle query execution error
  die("Query failed: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Doctor Panel</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      text-align: left;
      padding: 8px;
    }
    
    th {
      background-color: #4CAF50;
      color: white;
    }
    
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    
    .status-active {
      color: green;
      font-weight: bold;
    }
    
    .status-inactive {
      color: red;
      font-weight: bold;
    }
    
    .no-patients {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h1>Allocated Patients</h1>
  <?php
  if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Full Name</th>";
    echo "<th>Primary Contact Number</th>";
    echo "<th>Secondary Contact Number</th>";
    echo "<th>Address</th>";
    echo "<th>Aadhaar Card Number</th>";
    echo "<th>PAN Card Number</th>";
    echo "<th>Username</th>";
    echo "<th>Status</th>";
    echo "</tr>";
    
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['fullname'] . "</td>";
      echo "<td>" . $row['primary_contact_number'] . "</td>";
      echo "<td>" . $row['secondary_contact_number'] . "</td>";
      echo "<td>" . $row['address'] . "</td>";
      echo "<td>" . $row['adharcard_number'] . "</td>";
      echo "<td>" . $row['pancard_number'] . "</td>";
      echo "<td>" . $row['username'] . "</td>";
      
      if($row['status'] == 1){
            echo "<td class='status-active'>Active</td>";
          } else {
            echo "<td class='status-inactive'>Inactive</td>";
          }
          echo "</tr>";
        }
        echo "</table>";
      } else {
           echo  "<p>No patients found.</p>";
      }
        mysqli_close($conn);
?>

  </table>
</div>
</body>
</html>
      
