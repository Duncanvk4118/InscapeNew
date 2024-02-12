<?php 

include '../../database.php';
$conn = connect();

if (isset($_POST['toetsnaam'])) {
    $conn = connect();

    $sth = $conn->prepare("SELECT * FROM `toetsen` WHERE `toetsnaam` = ? AND `Vaknaam` = ?");
    $sth->bindParam(1, $_POST['toetsnaam'], PDO::PARAM_STR);
    $sth->bindParam(2, $_POST['vaknaam'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($result != null) {
        echo "Toets bestaat al!";
    } else {
        $sth = $conn->prepare("INSERT INTO `toetsen` (`Vaknaam`,`toetsnaam`,`weging`, `Punten`) VALUES (?,?,?,?)");
        $sth->bindParam(1, $_POST['vaknaam'], PDO::PARAM_STR);
        $sth->bindParam(2, $_POST['toetsnaam'], PDO::PARAM_STR);
        $sth->bindParam(3, $_POST['weging'], PDO::PARAM_STR);
        $sth->bindParam(4, $_POST['punten'], PDO::PARAM_STR);
        $sth->execute();
        // echo "Toets gemaakt!";
        header("Location: toetsen.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="vaknaam" id="vaknaam" placeholder="vak naam" required>
        <input type="text" name="toetsnaam" id="naam" placeholder="toets naam" required>
        <input type="text" name="weging" id="weging" placeholder="toets wegingen" required>
        <input type="number" name="punten" id="punten" placeholder="toets punten totaal" required>
        <button type="submit" onclick="valid()">Maak aan</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
