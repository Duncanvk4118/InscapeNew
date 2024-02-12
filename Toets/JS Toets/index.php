<?php
$servername = 'localhost';
$dataBase = 'top2000';
$username = "root";
$password = "root";

// Connection Section
$conn = new mysqli($servername ,$username, $password, $dataBase);

if ($conn->connect_error) {
  die("Connection Error: " . $conn->connect_error);
}

// Database Querie Section

$sql = "SELECT `name`, `country`, `id`, `year` FROM artist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Country</th>";
            echo "<th>Year</th>";
            echo "<th>Options</th>";
            // echo "<th>Delete</th>";
        echo "</tr>";
    foreach ($result as $baseData) {
        echo "<tr>";
        echo "<td>" . $baseData['name'] . "</td>";
        echo "<td>" . $baseData['country'] . "</td>";
        echo "<td>" . $baseData['year'] . "</td>";
        echo "<td><a href=\"update.php?id={$baseData['id']}\">Update</a></td>";
        echo "<td><a href=\"remove.php?id={$baseData['id']}\">Remove</a></td>";
        echo "<tr/>";
    }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>