<?php

//kijkt of de waardes zijn ingesteld
if (isset($_POST['lengte']) && isset($_POST['breed']) && isset($_POST['select']) && !isset($_POST['rond'])) {
    $length = $_POST['lengte'];
    $width = $_POST['breed'];
    $sw = $_POST['select'];

    //berekend de prijd en formaat.
    $length = $length / 100;
    $width = $width / 100;
    $m = $length * $width;
    $pr = $m * $sw;
} elseif (isset($_POST['rond']) && isset($_POST['dia']) && isset($_POST['select'])) {
    $dia = $_POST['dia'];
    $sw = $_POST['select'];

    //berkend de prijs
    $dia = $dia / 100;
    $str = $dia / 2;
    $opp = pow($str, 2) * pi();
    $pr = $opp * $sw;
    // $pr = round($prs, 2);
}   
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Hout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Keuzemenu voor hout -->
    <div class="selector">
        <form method="post" >
            <div class="woodselector">
                <img src="./Images/berken.jpg">
                Berken - €9,50 p/m2 <input type="radio" name="select" value="9.50"> 
                <img src="./Images/grenen.jpg" alt="">
                Grenen - €8,50 p/m2 <input type="radio" name="select" value="8.50"> 
                <img src="./Images/hardhout.jpg" alt="">
                Hardhout - €11,50 p/m2 <input type="radio" name="select" value="11.50"> 
            </div>
            <div class="infon">
                Breedte in mm: <input type="number" name="breed" id="width">
                Lengte in mm: <input type="number" name="lengte" id="length">
            </div>
            <div class="round">
                <input type="checkbox" name="rond" id="circle"> Ik wil een ronde tafel. 
                <br />
                Diameter in mm: <input type="number" name="dia" value="diameter">
            </div>
            <button type="submit">Berekenen!</button>
            <?php
            if (isset($pr)) {
            echo "Uw bedrag is:";
            echo "<p> €" . round($pr,2) . "</p>";
            } else {
                echo "<p> U heeft een of meerdere opties niet ingevuld!</p>";
            }
            ?>
        </form>
        <a href="../opdrselect.php">Return</a>
    </div>
</body>
</html>