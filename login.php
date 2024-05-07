
<?php
// Establish connection to MySQL
$conn = new mysqli('localhost','root','','OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the user is already logged in
$stmt = $conn->prepare("SELECT * FROM logged_in_users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Voter voted successfully";
    exit;
}

// Prepare SQL statement to retrieve user data from the database
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND passcode = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows == 1) {
    // Store login details in logged_in_users table
    $insertStmt = $conn->prepare("INSERT INTO logged_in_users (email) VALUES (?)");
    $insertStmt->bind_param("s", $email);
    $insertStmt->execute();

header("Location: voting.php");
    exit; // Ensure that script stops execution after redirection
} else {
    echo "Login failed";
}
echo '<a href="voterhome.html">Back</a>';
// Close the connection
$stmt->close();
$conn->close();
?>).