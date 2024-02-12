<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleuren kiezer</title>
</head>
<body>
    <form action="kleur.php" method="post">
        <select name="kleur" id="kleuren">
            <option value="yellow">Geel</option>
            <option value="orange">Oranje</option>
            <option value="red">Rood</option>
            <option value="green">Groen</option>
            <option value="blue">Blauw</option>
        </select>
        <input type="submit" value="kiezen" />
    </form>

    <a href="../opdrselect.php">Return</a>
</body>
</html>