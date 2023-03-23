<?php
// Check if admin is logged in
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

// Retrieve data from POST array
$fullname = $_POST['fullname'];
$email_id = $_POST['email_id'];
$primary_contact_number = $_POST['primary_contact_number'];
$secondary_contact_number = $_POST['secondary_contact_number'];
$address = $_POST['address'];
$adharcard_number = $_POST['adharcard_number'];
$pancard_number = $_POST['pancard_number'];
$joining_date = $_POST['joining_date'];
$speciality_id = $_POST['speciality_id'];
$visit_time_from = $_POST['visit_time_from'];
$visit_time_to = $_POST['visit_time_to'];
$created_date = date('Y-m-d H:i:s'); // current date and time
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];

// Input validation
$errors = array();

if (empty($fullname)) {
    $errors[] = 'Full name is required.';
}

if (empty($email_id)) {
    $errors[] = 'Email is required.';
} else if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format.';
}

if (empty($primary_contact_number)) {
    $errors[] = 'Primary contact number is required.';
} else if (!preg_match('/^[0-9]{10}$/', $primary_contact_number)) {
    $errors[] = 'Invalid primary contact number format.';
}

if (!empty($secondary_contact_number) && !preg_match('/^[0-9]{10}$/', $secondary_contact_number)) {
    $errors[] = 'Invalid secondary contact number format.';
}

if (empty($address)) {
    $errors[] = 'Address is required.';
}

if (empty($adharcard_number)) {
    $errors[] = 'Adhar card number is required.';
} else if (!preg_match('/^[0-9]{12}$/', $adharcard_number)) {
    $errors[] = 'Invalid Adhar card number format.';
}

if (empty($pancard_number)) {
    $errors[] = 'PAN card number is required.';
} else if (!preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $pancard_number)) {
    $errors[] = 'Invalid PAN card number format.';
}

if (empty($joining_date)) {
    $errors[] = 'Joining date is required.';
}

if (empty($speciality_id)) {
    $errors[] = 'Speciality is required.';
}

if (empty($visit_time_from)) {
    $errors[] = 'Visit time from is required.';
}

if (empty($visit_time_to)) {
    $errors[] = 'Visit time to is required.';
}

if (empty($username)) {
    $errors[] = 'Username is required.';
}

if (empty($password)) {
    $errors[] = 'Password is required.';
}
// If there are errors, display them and redirect back to the form
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: doctor_registration.php');
    exit();
}

// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'doctorsportal_db';

$conn = mysqli_connect('localhost', 'root', '', 'doctorsportal_db');

if (!$conn) {
    die('Could not connect to the database: ' . mysqli_connect_error());
}

// Insert data into database
$sql = "INSERT INTO doctor (fullname, email_id, primary_contact_number, secondary_contact_number, address, adharcard_number, pancard_number, joining_date, speciality_id, visit_time_from, visit_time_to, created_date, username, password, status) VALUES ('$fullname', '$email_id', '$primary_contact_number', '$secondary_contact_number', '$address', '$adharcard_number', '$pancard_number', '$joining_date', '$speciality_id', '$visit_time_from', '$visit_time_to', NOW(), '$username', '$password', 1)";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Redirect to admin panel or display success message
    header('Location: admin_panel.php');
    exit();
} else {
    // Display error message
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
