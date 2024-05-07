<?php
// Establish database connection
$conn = new mysqli('localhost','root','','OES');


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO complaints (full_name, date_of_incident, nature_of_complaint, description_of_incident, contact_information) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $full_name, $date_of_incident, $nature_of_complaint, $description_of_incident, $contact_information);

// Set parameters and execute
$full_name = $_POST["full_name"];
$date_of_incident = $_POST["date_of_incident"];
$nature_of_complaint = $_POST["nature_of_complaint"];
$description_of_incident = $_POST["description_of_incident"];
$contact_information = $_POST["contact_information"];

$stmt->execute();

echo "Complaint submitted successfully";

$stmt->close();
$conn->close();
?>
