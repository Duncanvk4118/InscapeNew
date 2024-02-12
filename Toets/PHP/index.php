<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>CRUD JS toets</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

    <form method="post" action="create.php">
        <input type="text" placeholder="Name" name="name" id="name" onkeyup="checkKey('name')"><br>
        <input type="text" placeholder="Country" name="country" id="country" onkeyup="checkKey('country')"><br>
        <input type="text" placeholder="Year" name="year" id="year" onkeyup="checkKey('year')"><br>
        <input type="submit" name="submit" value="Verzenden" id="updateBtn" disabled><br>
    </form><br>
    <div id="errors"></div>

    <?php include 'read.php'; ?>
    <script src="valid.js"></script>
</body>
</html>