<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback Data</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<h1>FEEDBACK FORM </H1>
<table>
    <thead>
        <tr>
            <th>Si No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Feedback</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Establishing connection to the database
        $conn = new mysqli('localhost', 'root', '', 'OES');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieving data from the database
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row with serial number
            $serial_number = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$serial_number."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['feedback']."</td>";
                echo "</tr>";
                $serial_number++;
            }
        } else {
            echo "<tr><td colspan='4'>No feedback found</td></tr>";
        }

        // Closing the database connection
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
