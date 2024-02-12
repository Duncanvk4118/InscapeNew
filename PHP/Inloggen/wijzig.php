<?php
include '../../database.php';
$conn = connect();

$sth = $conn->prepare("SELECT `Punten` FROM `toetsen` WHERE `toets_id` = ?");
$sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
$sth->execute();
$result2 = $sth->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['punten'])) {

    $punten = $_POST['punten'];

    $score = $punten / $result2['Punten'] * 10;
    $score = round($score, 1, PHP_ROUND_HALF_UP);

    // echo $score;

    $sth = $conn->prepare("UPDATE `resultaten` SET `cijfer` = ? WHERE `student_id` = ? AND `toets_id` = ?");
    $sth->bindParam(1, $score, PDO::PARAM_STR);
    $sth->bindParam(2, $_GET['cijfer'], PDO::PARAM_STR);
    $sth->bindParam(3, $_GET['toets'], PDO::PARAM_STR);
    $sth->execute();

    header("Location: cijfer.php?toets={$_GET['toets']}");
}

function maxPunten() {
    $conn = connect();
    $sth = $conn->prepare("SELECT `Punten` FROM `toetsen` WHERE `toets_id` = ?");
    $sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    echo "<p>Je kunt maximaal <b>" . $result['Punten'] . "</b> punten scoren op deze toets!</p>" ;
}



// header("Location: cijfer.php?toets={$_GET['toets']}");
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
        <input type="number" name="punten" placeholder="Nieuwe punten" required>
        <?php maxPunten(); ?>
        <button type="submit">Wijzigen</button>
    </form>
</body>
</html>