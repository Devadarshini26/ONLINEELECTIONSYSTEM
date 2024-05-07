<?php
// Database connection parameters
$conn = new mysqli('localhost','root','','OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fullname = $_POST['fullname'];
$voterid = $_POST['voterid'];
$reason = $_POST['reason'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Prepare SQL statement to insert data into database table
$sql = "INSERT INTO absentee_ballot_requests (fullname, voterid, reason, address, email, phone)
        VALUES ('$fullname', '$voterid', '$reason', '$address', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
