<?php

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data
  $doctor_id = $_POST['doctor_id'];
  $patient_id = $_POST['patient_id'];
  $disease_name = $_POST['disease_name'];
  $appointment_datetime = $_POST['appointment_datetime'];
  $last_appointment_datetime = $_POST['last_appointment_datetime'];
  $status = $_POST['status'];

  // Validate form data
  if (empty($doctor_id) || empty($patient_id) || empty($disease_name) || empty($appointment_datetime) || empty($last_appointment_datetime) || empty($status)) {
    $error = "All fields are required.";
  } else {
    // Connect to database
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "doctorsportal_db";

    $conn = mysqli_connect("localhost", "root", "", "doctorsportal_db");

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Insert data into database
    $sql = "INSERT INTO allot_doctor_to_patient (doctor_id, patient_id, disease_name, appointment_datetime, last_appointment_datetime, status) VALUES ('$doctor_id', '$patient_id', '$disease_name', '$appointment_datetime', '$last_appointment_datetime', '$status')";

    if (mysqli_query($conn, $sql)) {
      $success = "Doctor has been allotted to patient.";
    } else {
      $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
  }
} else {
  // Redirect user to form page if form was not submitted
  header("Location: allot_doctor_to_patient.php");
  exit();
}

?>
