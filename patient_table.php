<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Full Name</th>
      <th>Primary Contact Number</th>
      <th>Secondary Contact Number</th>
      <th>Address</th>
      <th>Aadharcard Number</th>
      <th>Pancard Number</th>
      <th>Username</th>
      <th>Password</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // PHP code to fetch patients from database
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

    // Fetch patients from database
    $sql = "SELECT * FROM patient";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>".$row["id"]."</td>";
echo "<td>".$row["fullname"]."</td>";
echo "<td>".$row["primary_contact_number"]."</td>";
echo "<td>".$row["secondary_contact_number"]."</td>";
echo "<td>".$row["address"]."</td>";
echo "<td>".$row["adharcard_number"]."</td>";
echo "<td>".$row["pancard_numer"]."</td>";
echo "<td>".$row["username"]."</td>";
echo "<td>".$row["password"]."</td>";
echo "<td>".$row["status"]."</td>";
echo "</tr>";
}
} else {
echo "<tr><td colspan='10'>No patients found</td></tr>";
}
?>
</tbody>
</table>

</body>
</html>
