<?php

$kleur = $_POST["kleur"];
$tr;

if ($kleur == "red") {
    $tr = "rood";
} elseif ($kleur == "blue") {
    $tr = "blauw";
} elseif ($kleur == "yellow") {
    $tr = "posey";
} elseif ($kleur == "green") {
    $tr = "groen";
} elseif ($kleur == "orange") {
    $tr = "oranje";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleur</title>
    <?php 
    echo "<style> @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Permanent+Marker&display=swap'); </style>";
    echo "<style> html {background-color:" . $kleur . ";} h1 {color:black; font-family: Montserrat, sans-serif;} </style>";
    ?>
</head>
<body>
    
    <?php
    echo "<h1> Mooi " . $tr . " is niet lelijk. </h1>";
    ?>

    <a href="./index.php">Return</a>
</body>
</html>
