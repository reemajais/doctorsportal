<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the admin login page
    header("Location: admin_login.php");
    exit();
}

// Fetch the list of doctors from the database
// Here, assuming you have a function named getDoctors() to retrieve the data
$doctors = getDoctors();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor List</title>
    <link rel="stylesheet" type="text/css" href="doctor_list.css">
</head>
<body>
    <!-- include your header and navigation menu code here -->

    <!-- main content of the doctor list page -->
    <h1>Doctor List</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Speciality</th>
                <th>Visit Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctors as $doctor): ?>
            <tr>
                <td><?php echo $doctor['id']; ?></td>
                <td><?php echo $doctor['fullname']; ?></td>
                <td><?php echo $doctor['email_id']; ?></td>
                <td><?php echo $doctor['primary_contact_number']; ?></td>
                <td><?php echo $doctor['address']; ?></td>
                <td><?php echo $doctor['speciality']; ?></td>
                <td><?php echo $doctor['visit_time_from'] . ' - ' . $doctor['visit_time_to']; ?></td>
                <td><?php echo $doctor['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
