<?php
include 'connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$select = $conn->query("SELECT * FROM artist WHERE id=$id");
$row = $select->fetch();

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $country = $_POST['country'];
    $year = $_POST['year'];

    $query = "UPDATE artist SET `name` = '".$name."',
                            `country` = '".$country."',
                            `year` = '".$year."'
                            WHERE id=$id";

//    $query = "UPDATE artist SET `name` = ?, `country` = ?, `year` = ? WHERE `id` = ?";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" onkeyup="checkKey('name')" id="name"><br>
        <input type="text" name="country" value="<?php echo $row['country']; ?>" onkeyup="checkKey('country')" id="country"><br>
        <input type="text" name="year" value="<?php echo $row['year']; ?>" onkeyup="checkKey('year')" id="year"><br>
        <input type="submit" name="submit" value="Updaten" id="updateBtn" disabled><br>
    </form>
    <div id="errors"></div>
    <script src="valid.js"></script>
</body>
</html>