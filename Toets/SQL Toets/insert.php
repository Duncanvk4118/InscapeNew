<?php
$servername = 'localhost';
$dataBase = 'SQLTOETS';
$username = "root";
$password = "root";

$conn = new mysqli($servername ,$username, $password, $dataBase);
// echo "connected";
if(isset($_POST['name']) && isset($_POST['country'])) {

// Krijgt Data van Inputs
    $naam = $_POST['name'];
    $land = $_POST['country'];

    // Connection Section
    $sql = "INSERT INTO artist (`name`, country) VALUES ('$naam','$land')";
    // $sql = "INSERT INTO artist (`name`, country)
    // VALUES $naam,$land";
    if ($conn->query($sql) === TRUE) {
        echo "Artiest toegevoegd!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}   

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Toets Invoegen</title>
</head>
<body>
    <form action="insert.php" method="post">
        <input type="text" name="name" id="name" placeholder="Artiest Naam" required>
        <input type="text" name="country" id="country" placeholder="Land Naam" required>
        <button type="submit">Voeg Toe</button>
        <br>
        <p>Wilt u de Artietsen Lijst zien?</p>
        <a href="index.php">Klik hier</a>
    </form>
</body>
</html>