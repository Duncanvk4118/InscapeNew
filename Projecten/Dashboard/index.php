<?php
session_start();
include "../../database.php";

$sth = $conn->prepare("SELECT * FROM `users`");
$sth->execute();

$result = $sth->fetch(PDO::FETCH_ASSOC);

if ($_SESSION['is-admin'] === 0) {
    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Inscape</title>
</head>
<body>
    <section class="Sidebar">
        <button>Log out</button>
        <button onclick="activate(slurp)">slurp</button>
        <button onclick="activate(posay)">posay</button>
    </section>
    <script src="script.js"></script>
</body>
</html>