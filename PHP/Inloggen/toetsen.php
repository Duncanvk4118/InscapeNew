<?php 

include '../../database.php';
$conn = connect();

function toetsen() {
    $conn = connect();
    $servername = 'localhost';
    $dataBase = 'MijnSite';
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dataBase", "root", "root");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected";
        $stmt = $conn->prepare("SELECT toets_id, Vaknaam, toetsnaam, weging, Punten FROM toetsen"); 
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $v) { 
            echo "<tr>";
                echo "<td>" . $v['toets_id'] . "</td>";
                echo "<td><b>" . $v['Vaknaam'] . "</b></td>";
                echo "<td>" . $v['toetsnaam'] . "</td>";
                echo "<td>" . $v['Punten'] . "</td>";
                echo "<td>" . $v['weging'] . "</td>";
                echo "<td> <a href=\"wijzigtoets.php?toets={$v['toets_id']}\" id=\"wijzigen\"><i class=\"fa-solid fa-pencil\"></i></a> <br /> <a href=\"delete.php?toets={$v['toets_id']}\" id=\"verwijderen\"><i class=\"fa-solid fa-trash\"></i></a></td>";
                echo "<td> <a href=\"cijfer.php?toets={$v['toets_id']}\" id=\"cijferen\">Geef Cijfers</a> </td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
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
    <h1>Pas toetsen aan</h1>
    <table>
        <tr>
            <th>Toets Id</th>
            <th>Vak Naam</th>
            <th>Toets Naam</th>
            <th>Punten</th>
            <th>Weging</th>
            <th>Opties</th>
            <th><a href="add.php" id="toevoegen">Maak nieuwe toets</a></th>
        </tr>
    <?php toetsen(); ?>
    </table>
    <script src="https://kit.fontawesome.com/d8fab7c14e.js" crossorigin="anonymous"></script>
</body>
</html>