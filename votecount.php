<!DOCTYPE html>
<html>
<head>
    <title>Retrieve and Display Votes</title>
    <style>
        /* Add CSS for colorful borders */
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto; /* Centering the table */
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Light gray background for table header */
        }
    </style>
</head>
<body>

<?php
// Database connection parameters
$conn = new mysqli('localhost','root','','OES');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from the "votes" table using candidate_email
$sql = "SELECT * FROM votes ORDER BY candidate_email";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<table>";
    echo "<tr><th>Si No</th><th>Candidate Email</th></tr>";
    $si_no = 1;
    // Output each row of data
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td style='border: 2px solid red;'>$si_no</td><td style='border: 2px solid blue;'>".$row["candidate_email"]."</td></tr>";
        $si_no++;
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
echo '<a href="adminhome.html">Back</a>';
?>

</body>
</html>
