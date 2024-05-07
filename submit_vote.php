<?php
// Connect to the database
$conn = new mysqli('localhost','root','','OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if candidate is selected
if(isset($_POST['candidate'])) {
    // Get selected candidate's email
    $candidate_email = $_POST['candidate'];

    // Insert vote into the votes table
    $sql = "INSERT INTO votes (candidate_email) VALUES ('$candidate_email')";

    if ($conn->query($sql) === TRUE) {
        echo "Vote submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No candidate selected";
}
echo '<a href="voterhome.html">Back</a>';
// Close database connection
$conn->close();
?>
