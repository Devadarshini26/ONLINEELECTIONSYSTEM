<!DOCTYPE html>
<html>
<head>
    <title>Absentee Ballot Requests</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }
        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: lightgray;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
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

// SQL query to retrieve data
$sql = "SELECT fullname, voterid, reason, address, email, phone FROM absentee_ballot_requests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Si No</th><th>Fullname</th><th>Voter ID</th><th>Reason</th><th>Address</th><th>Email</th><th>Phone</th></tr>";
    $si_no = 1;
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $si_no . "</td>";
        echo "<td>" . $row["fullname"]. "</td>";
        echo "<td>" . $row["voterid"]. "</td>";
        echo "<td>" . $row["reason"]. "</td>";
        echo "<td>" . $row["address"]. "</td>";
        echo "<td>" . $row["email"]. "</td>";
        echo "<td>" . $row["phone"]. "</td>";
        echo "</tr>";
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
