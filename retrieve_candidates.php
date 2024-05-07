<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user has already voted
session_start();
if (isset($_SESSION['passcode'])) {
    $passcode = $_SESSION['passcode'];
    $check_voted_sql = "SELECT passcode FROM users WHERE passcode = '$passcode'";
    $check_result = $conn->query($check_voted_sql);

    if ($check_result->num_rows > 0) {
        echo "You have already voted.";
        $conn->close();
        exit(); // Stop further execution
    }
}

// Retrieve data from the candidates table
$sql = "SELECT fullname, email, party, age, gender, platform FROM candidates";
$result = $conn->query($sql);

// Output candidate options
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<input type='radio' name='candidate' value='" . $row["email"] . "'> " . $row["fullname"] . " (" . $row["party"] . ")<br>";
    }
} else {
    echo "No candidates available.";
}

// Close database connection
$conn->close();
?>
