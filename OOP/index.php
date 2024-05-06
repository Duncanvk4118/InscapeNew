<?php
require_once 'Classes/Car.php';

$car02 = new Cars("BMW", "Blue");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    <?php
        echo $car02->useItems();
    ?>
    </h1>
</body>
</html>