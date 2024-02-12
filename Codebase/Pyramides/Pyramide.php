<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pyramides</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="halve_section">
         <h2>Halve Pyramide</h2>
         <form method="post">
            <input type="number" name="hantal" placeholder="Vul de aantal stapels in:">
            <input type="submit" value="Send">
        </form>
        <div class="hpyra">
            <br>
            <br>
            <br>
        <?php
if (isset($_POST['hantal'])) {

    $num = $_POST['hantal'];

    for ($i = 0; $i<=$num; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br/>";
    }
}
?>
        </div>
    </div>
    <br />
    <div class="hele_section">
        <h2>Echte Pyramide</h2>
        <form method="post">
            <input type="number" name="aantal" placeholder="Vul de aantal stapels in:">
            <input type="submit" value="Send">
        </form>
        <div class="eprya">

        </div>
    </div>

    <a href="../opdrselect.php">Return</a>
</body>
</html>