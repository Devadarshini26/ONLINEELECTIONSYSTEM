<?php
// Establish connection to MySQL database
$conn = new mysqli('localhost','root','','OES');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from candidates table
$sql = "SELECT fullname, email, party, age, gender, platform FROM candidates";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Candidates List</title>
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
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>CANDIDATES LIST</h2>

<table>
    <tr>
        <th>Si No</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Party</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Platform</th>
    </tr>

    <?php
    // Output data of each row
    $si_no = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $si_no++ . "</td>";
            echo "<td>" . $row["fullname"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["party"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["platform"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
	echo '<a href="index.html">Back</a>';
    ?>

</table>

</body>
</html>
