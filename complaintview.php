<!DOCTYPE html>
<html>
<head>
    <title>Complaints</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto; /* Center align the table */
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2; /* Light gray background for header */
        }
    </style>
</head>
<body>
<h1 style="text-align: center;">COMPLAINTS</h1>
    <table>
        <tr>
            <th>Si No</th>
            <th>Full Name</th>
            <th>Date of Incident</th>
            <th>Nature of Complaint</th>
            <th>Description of Incident</th>
            <th>Contact Information</th>
        </tr>
        <?php
        // Assuming you have established a database connection
        $conn = new mysqli('localhost','root','','OES');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from database
        $sql = "SELECT * FROM complaints";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $count = 1;
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['date_of_incident'] . "</td>";
                echo "<td>" . $row['nature_of_complaint'] . "</td>";
                echo "<td>" . $row['description_of_incident'] . "</td>";
                echo "<td>" . $row['contact_information'] . "</td>";
                echo "</tr>";
                $count++;
            }
        } else {
            echo "0 results";
        }
        $conn->close();
echo '<a href="adminhome.html">Back</a>';
        ?>
    </table>
</body>
</html>
