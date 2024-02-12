<?php

include '../../database.php';
$conn = connect();

function lijst() {
    $conn = connect();
    $sth = $conn->prepare("SELECT `student_id`,`cijfer` FROM `resultaten` WHERE `toets_id` = ?");
    $sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

    echo "<table>";
        echo "<tr>";
            echo "<th>Student</th>";
            echo "<th>Cijfer</th>";
            echo "<th>Opties</th>";
        echo "</tr>";
    // foreach (new RecursiveArrayIterator($sth->fetchAll()) as $v) {
        foreach ($result as $v) {
        echo "<tr>";
            echo "<td>" . $v['student_id'] . "</td>";
            echo "<td>" . $v['cijfer'] . "</td>";
            echo "<td>" . "<a href=\"wijzig.php?cijfer={$v['student_id']}&toets={$_GET['toets']}\"><i class=\"fa-solid fa-pencil\"></i></a>" . "</td>";
            echo "<td>" . "<a href=\"deletecijfer.php?cijfer={$v['student_id']}&toets={$_GET['toets']}\"><i class=\"fa-solid fa-trash\"></i></a>" . "</td>";
        echo "</tr>";
        // $arrayy = array($v['student_id']);
    }
    echo "</table>";
    // print_r($arrayy);
}

if (isset($_POST['punten']) && isset($_POST['student'])) {
    $punten = $_POST['punten'];
    $id = $_POST['student'];

    $sth = $conn->prepare("SELECT * FROM `users` WHERE `ID` = ?");
    $sth->bindParam(1, $_POST['student'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($result == null) {

        echo "Student bestaat niet!";

    } else {

        $sth = $conn->prepare("SELECT `Punten` FROM `toetsen` WHERE `toets_id` = ?");
        $sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
        $sth->execute();
        $result2 = $sth->fetch(PDO::FETCH_ASSOC);
        $score = $punten / $result2['Punten'] * 10;
        $score = round($score, 1, PHP_ROUND_HALF_UP);

        $sth = $conn->prepare("SELECT * FROM `resultaten` WHERE (`toets_id`,`student_id`) = (?,?)");
        $sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
        $sth->bindParam(2, $id, PDO::PARAM_STR);
        $sth->execute();
        $result3 = $sth->fetch(PDO::FETCH_ASSOC);

        if ($result3 != null) {
            echo "Deze student heeft deze toets al gemaakt!";
        } else {
            $sth = $conn->prepare("INSERT INTO `resultaten` (`student_id`,`toets_id`,`cijfer`) VALUES (?,?,?)");
            $sth->bindParam(1, $_POST['student'], PDO::PARAM_STR);
            $sth->bindParam(2, $_GET['toets'], PDO::PARAM_STR);
            $sth->bindParam(3, $score, PDO::PARAM_STR);
            $sth->execute();
            echo "Cijfer gegeven!";
            // header("Location: toetsen.php");
        }
    // print_r($arrayy);
    } 
}

function maxScore() {
    $conn = connect();
    $sth = $conn->prepare("SELECT `Punten` FROM `toetsen` WHERE `toets_id` = ?");
    $sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    echo "Je kunt maximaal <b>" . $result['Punten'] . "</b> punten scoren op deze toets!" ;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cijfer</title>
</head>
<body>
    <form action="cijfer.php?toets=<?php echo $_GET['toets']?>" method="post">
        <input type="text" name="student" id="student" placeholder="Studenten Code" require>
        <input type="number" name="punten" id="punten" placeholder="Gescoorde Punten" require>
        <p><?php maxScore(); ?></p>
        <button type="submit">Geef Cijfer</button>
    </form>
    <br>
    <hr>
    <br>
    <?php lijst(); ?>
    <a href="toetsen.php?">Return</a>
    <script src="https://kit.fontawesome.com/d8fab7c14e.js" crossorigin="anonymous"></script>
</body>
</html>