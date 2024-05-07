<?php
// Database connection parameters
$conn = new mysqli('localhost','root','','OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$party = $_POST['party'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$platform = $_POST['platform'];

// Check for duplicate entry
$sql_check_duplicate = "SELECT * FROM candidates WHERE fullname = '$fullname' AND email = '$email' AND party = '$party' AND age = '$age' AND gender = '$gender' AND platform = '$platform'";
$result = $conn->query($sql_check_duplicate);

if ($result->num_rows > 0) {
    echo "Duplicate entry found. Please check your details.";
} else {
    // Insert candidate data into the database
    $sql_insert_candidate = "INSERT INTO candidates (fullname, email, party, age, gender, platform) VALUES ('$fullname', '$email', '$party', '$age', '$gender', '$platform')";

    if ($conn->query($sql_insert_candidate) === TRUE) {
        echo "Candidate registered successfully!";
		echo '<a href="index.html">Back</a>';
    } else {
        echo "Error: " . $sql_insert_candidate . "<br>" . $conn->error;
		echo '<a href="index.html">Back</a>';
    }
}

// Close database connection
$conn->close();
?>
