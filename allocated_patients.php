<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctorsportal_db";
$conn = new mysqli("localhost", "root", "", "doctorsportal_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve list of allocated patients
$sql = "SELECT * FROM allot_doctor_to_patient";
$result = $conn->query($sql);

// Display data in table format
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Patient ID</th><th>Doctor ID</th><th>Treatment Status</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['patient_id']."</td>";
        echo "<td>".$row['doctor_id']."</td>";
        echo "<td>".$row['treatment_status']."</td>";
        echo "<td>";
        echo "<form method='POST' action=''>";
        echo "<input type='hidden' name='patient_id' value='".$row['patient_id']."'>";
        echo "<select name='action'>";
        echo "<option value='Treatment Completed'>Treatment Completed</option>";
        echo "<option value='Processing'>Processing</option>";
        echo "<option value='Pending' selected>Pending</option>";
        echo "<option value='Hold'>Hold</option>";
        echo "</select>";
        echo "<input type='submit' name='submit' value='Update'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No allocated patients found";
}

// Update treatment status
if (isset($_POST['submit'])) {
    $patient_id = $_POST['patient_id'];
    $action = $_POST['action'];
   $sql = "UPDATE allot_doctor_to_patient SET status=? WHERE patient_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $action, $patient_id);
    if ($stmt->execute()) {
        echo "Treatment status updated successfully";
    } else {
        echo "Error updating treatment status: " . $conn->error;
    }
}
$conn->close();
?>
