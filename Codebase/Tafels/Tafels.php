<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tafels</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <h1>Tafel Selectie</h1>
        Welke Tafel? <input type="number" name="tafelsel" id="tafelsec">
        De tafel van <input type="number" name="tafelvan" id="tafelval">
        Tot <input type="number" name="tafeltot" id="tafeltol">
        <input type="submit">
    </form>

    <a href="../opdrselect.php">Return</a>
</body>
</html>

<?php


if (isset($_POST["tafelvan"]) && isset($_POST["tafelsec"]) && isset($_POST["tafeltot"])) {
    $s = $_POST['tafelsel'];
    $v = $_POST['tafelvan'];
    $t = $_POST['tafeltot'];

    for ($i=$v; $i <= $t ; $i++) { 
        echo "<p>" . $s . "*" . $i . "=" . $s*$i . "</p>";
    }
}
?>