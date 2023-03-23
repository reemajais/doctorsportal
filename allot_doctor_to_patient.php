<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allot doctor</title>
    <style>
        /* Set the overall style of the page */
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}
.header-container {
  background-color: #fff;
  padding: 20px;
  text-align: center;
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin-bottom: 20px;
}

/* Style the heading */
.header-container h1 {
  font-size: 28px;
  margin: 0;
}

/* Style the text */
.header-container p {
  font-size: 18px;
  margin: 10px 0 0 0;
  color: #666;
}
/* Style the form container */
form {
  width: 80%;
  margin: auto;
  background-color: #fff;
  padding: 20px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

/* Style the form fields */
label {
  display: block;
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"], select {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 20px;
  font-size: 16px;
}

input[type="datetime-local"] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-bottom: 20px;
  font-size: 16px;
}

/* Style the dropdown menu */
select {
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%23ccc' d='M14.4 4.7L8 11.1 1.6 4.7C1.2 4.3 0.6 4.3 0.2 4.7 0.1 4.8 0 5 0 5.3c0 0.3 0.1 0.5 0.2 0.6l7.8 7.8c0.2 0.2 0.4 0.2 0.6 0l7.8-7.8c0.4-0.4 0.4-1 0-1.4z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 8px center;
  background-size: 16px 16px;
}

/* Style the submit button */
input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  padding: 12px 20px;
  font-size: 16px;
  cursor: pointer;
  float: right;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

/* Style the success and error messages */
.success-message {
  color: #4CAF50;
  margin-top: 10px;
  font-weight: bold;
}

.error-message {
  color: #f44336;
  margin-top: 10px;
  font-weight: bold;
}

    </style>
</head>
<body>
    <div class="header-container">
  <h1>Allot Doctor to Patient</h1>
  <p>Use the form below to allot a doctor to a patient.</p>
</div>
    <form action="process_allot_doctor_to_patient.php" method="post">
  <label for="doctor_id">Doctor ID:</label>
  <input type="text" name="doctor_id" id="doctor_id" required>
  
  <label for="patient_id">Patient ID:</label>
  <input type="text" name="patient_id" id="patient_id" required>
  
  <label for="disease_name">Disease Name:</label>
  <select name="disease_name" id="disease_name" required>
    <option value="cancer">Cancer</option>
    <option value="heart disease">Heart Disease</option>
    <option value="diabetes">Diabetes</option>
    <option value="asthma">Asthma</option>
  </select>
  
  <label for="appointment_datetime">Appointment Datetime:</label>
  <input type="datetime-local" name="appointment_datetime" id="appointment_datetime" required>
  
  <label for="last_appointment_datetime">Last Appointment Datetime:</label>
  <input type="datetime-local" name="last_appointment_datetime" id="last_appointment_datetime" required>
  
  <label for="status">Status:</label>
  <select name="status" id="status" required>
    <option value="0">Pending</option>
    <option value="1">Treatment Completed</option>
    <option value="2">Processing</option>
    <option value="3">Hold</option>
  </select>
  
  <input type="submit" value="Submit">
</form>
</body>
</html>