<?php
// Establish connection to MySQL
$conn = new mysqli('localhost', 'root', '', 'OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Retrieve password from the database based on name and email
    $stmt = $conn->prepare("SELECT passcode FROM users WHERE name = ? AND email = ?");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $stmt->bind_result($password);
    $stmt->fetch();
    $stmt->close();

    // Display password for 10 seconds in an HTML table
    if ($password) {
        echo "<table border='1'>";
        echo "<tr><th>Password</th></tr>";
        echo "<tr><td id='password'>$password</td></tr>";
        echo "</table>";
        echo "<script>
                setTimeout(function(){
                    document.getElementById('password').innerHTML = '';
                }, 10000);
              </script>";
    } else {
        echo "Invalid name or email. Please try again.";
    }
	echo '<a href="index.html">Back</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Retrieval</title>
</head>
<body>
    <h2>Retrieve Password</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Retrieve Password">
    </form>
</body>
</html>
