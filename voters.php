<?php
// Database connection
$conn = new mysqli('localhost','root','','OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
echo "VOTERS DETAILS";
// HTML table to display data
echo '<center>'; // Centering the table
echo '<table border="1" style="border-collapse: collapse;">'; // Adding borders with collapse
echo '<tr>'; // Table row for headers
echo '<th>Si No</th>'; // Serial number
echo '<th>Name</th>';
echo '<th>Aadhaar Number</th>';
echo '<th>Voter ID</th>';
echo '<th>Phone Number</th>';
echo '<th>Address</th>';
echo '<th>Age</th>';
echo '<th>Gender</th>';
echo '<th>National ID</th>';
echo '<th>Passcode</th>';
echo '<th>Email</th>';
echo '<th>Ward Number</th>';
echo '</tr>'; // End of header row

// Counter for serial number
$si_no = 1;

// Fetching data from the database and displaying it in the table
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>'; // Table row for data
        echo '<td>' . $si_no++ . '</td>'; // Serial number increment
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['aadhaar_number'] . '</td>';
        echo '<td>' . $row['voter_id'] . '</td>';
        echo '<td>' . $row['phone_number'] . '</td>';
        echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['age'] . '</td>';
        echo '<td>' . $row['gender'] . '</td>';
        echo '<td>' . $row['national_id'] . '</td>';
        echo '<td>' . $row['passcode'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['ward_number'] . '</td>';
        echo '</tr>'; // End of data row
    }
} else {
    echo '<tr><td colspan="12">No data found</td></tr>'; // If no data is found
}

echo '</table>'; // End of table

echo '</center>'; // End of centering
$conn->close(); // Closing database connection
echo '<a href="index.html">Home</a>';
?>
