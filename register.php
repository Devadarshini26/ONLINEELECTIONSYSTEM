<?php
// Establish connection to MySQL
$conn = new mysqli('localhost','root','','OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to insert user data into the database
$stmt = $conn->prepare("INSERT INTO users (name, aadhaar_number, voter_id, phone_number, address, age, gender, national_id, passcode, email, ward_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $name, $aadhaar_number, $voter_id, $phone_number, $address, $age, $gender, $national_id, $passcode, $email, $ward_number);

// Get data from the form
$name = $_POST['name'];
$aadhaar_number = $_POST['aadhaar_number'];
$voter_id = $_POST['voter_id'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$national_id = $_POST['national_id'];
$passcode = $_POST['passcode'];
$email = $_POST['email'];
$ward_number = $_POST['ward_number'];

// Execute the SQL statement
if ($stmt->execute() === TRUE) {
    echo "Registration successful";
	echo '<a href="voterhome.html">Back</a>';
} else {
    echo "Error: " . $conn->error;
	echo '<a href="voterhome.html">Back</a>';
}

// Close the connection
$stmt->close();
$conn->close();
?>
