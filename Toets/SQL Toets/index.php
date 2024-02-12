<?php
$servername = 'localhost';
$dataBase = 'SQLTOETS';
$username = "root";
$password = "root";

// Connection Section
$conn = new mysqli($servername ,$username, $password, $dataBase);

if ($conn->connect_error) {
  die("Connection Error: " . $conn->connect_error);
}

// Database Querie Section

$sql = "SELECT `name`, `country` FROM artist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table>";
        echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Country</th>";
        echo "</tr>";
    foreach ($result as $baseData) {
        echo "<tr>";
        echo "<td>" . $baseData['name'] . "</td>";
        echo "<td>" . $baseData['country'] . "</td>";
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
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Toets</title>
</head>
    <body>
        <br>
        <p>Wilt u een artiest toevoegen?</p>
        <a href="insert.php">Klik Hier</a>
    </body>
</html>