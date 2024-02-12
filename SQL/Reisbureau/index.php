<?php
session_start();

if (isset($_GET['Tabel']) && isset($_GET['Naam'])) {
    $naam = $_GET['Naam'];
    $tabel = $_GET['Tabel'];
}

$servername = 'localhost';
try {
    $conn = new PDO("mysql:host=$servername;dbname=MijnSite", "root", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

$sth = $conn->prepare("SELECT * FROM `users`");
$sth->execute();

$result = $sth->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL | Inscape</title>
</head>
<body>
    <form method="get">
        <input type="text" name="Tabel" placeholder="Tabel">
        <input type="text" name="Naam" placeholder="Naam">
        <button type="submit">Verzenden</button>
    </form>
    <table>
        <th>
            <td><?php echo $result['']; ?></td>
        </th>
    </table>
</body>
</html>