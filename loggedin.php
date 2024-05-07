<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logged In Users</title>
<style>
    table {
        border-collapse: collapse;
        width: 50%;
        margin: 0 auto; /* Center the table */
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2; /* Light gray background for header */
    }
    .colorful-border {
        border: 2px solid;
        border-image: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
        border-image-slice: 1;
    }
</style>
</head>
<body>

<?php
// Assuming you have already established a database connection
$conn = new mysqli('localhost','root','','OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM logged_in_users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='colorful-border'>
            <tr>
                <th>Si No</th>
                <th>Email</th>
            </tr>";
    $si_no = 1;
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$si_no</td>
                <td>".$row["email"]."</td>
            </tr>";
        $si_no++;
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo '<a href="adminhome.html">Back</a>';
$conn->close();
?>

</body>
</html>
