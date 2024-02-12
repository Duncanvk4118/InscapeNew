<?php
include '../../database.php';
$conn = connect();

if (isset($_POST['punten']) && isset($_POST['weging'])) {

    $sth = $conn->prepare("UPDATE `toetsen` SET `Punten` = ?, `weging` = ? WHERE `toets_id` = ?");
    $sth->bindParam(1, $_POST['punten'], PDO::PARAM_STR);
    $sth->bindParam(2, $_POST['weging'], PDO::PARAM_STR);
    $sth->bindParam(3, $_GET['toets'], PDO::PARAM_STR);
    $sth->execute();

    header("Location: toetsen.php?");
}

function oudeWeergave() {
    $conn = connect();

    $sth = $conn->prepare("SELECT `Punten`,`weging` FROM `toetsen` WHERE `toets_id` = ?");
    $sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    echo "<p>De orginele Totaal Punten waren: <b>" . $result['Punten'] . "</b></p>";
    echo "<p>De orginele weging was: <b>" . $result['weging'] . "</b></p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Stijlen/wijzigen.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="number" name="punten" placeholder="Nieuwe totaal punten">
        <input type="number" name="weging" placeholder="Nieuwe weging">
        <?php oudeWeergave(); ?>
        <button type="submit">Wijzigen</button>
    </form>
</body>
</html>