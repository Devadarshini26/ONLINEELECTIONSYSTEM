<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Voting Results</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>

<h1 style="text-align: center;">VOTING RESULTS</h1>

<table>
  <tr>
    <th>Candidate Email</th>
    <th>Votes</th>
  </tr>

<!-- PHP code to retrieve data from database and display in HTML table -->

<?php
// Replace with your database credentials
$conn = new mysqli('localhost', 'root', '', 'OES');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT candidate_email, COUNT(*) AS votes FROM votes GROUP BY candidate_email";
$result = $conn->query($sql);

// Display data in HTML table
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["candidate_email"]. "</td><td>" . $row["votes"]. "</td></tr>";
  }
} else {
  echo "0 results";
}
$conn->close();

?>
<a href="index.html">Back</a>	 
</table>

</body>
</html>
