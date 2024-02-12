<?php

$servername = 'localhost';
$dataBase = 'top2000';
$username = "root";
$password = "root";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dataBase", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $conn->prepare("SELECT * FROM `artist` WHERE `id` = ?");
    $sth->bindParam(1, $_GET['id'], PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['submit'])) {
        $conn2 = new PDO("mysql:host=$servername;dbname=$dataBase", $username, $password);
        // set the PDO error mode to exception
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $sth2 = $conn2->prepare("UPDATE `artist` SET (`name`, `country` , `year`) VALUES (?,?,?) WHERE id=?");
        $sth2 = $conn2->prepare("UPDATE `artist` SET `name` =?, `country` =?, `year`=? WHERE id=?");
        $sth2->bindParam(1, $_POST['name'], PDO::PARAM_STR);
        $sth2->bindParam(2, $_POST['country'], PDO::PARAM_STR);
        $sth2->bindParam(3, $_POST['years'], PDO::PARAM_STR);
        $sth2->bindParam(4, $_GET['id'], PDO::PARAM_STR);
        $sth2->execute();
        $result2 = $sth2->fetch(PDO::FETCH_ASSOC);
        // echo "sumbitted";
        header("Location: index.php");
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <!-- echo $result['name']; ?>  echo $result['country'];?> echo $result['year'] ?>-->
    <form method="post">
        <input type="text" name="name" id="name" value="<?php echo $result['name']; ?>" onkeyup="checkKey('name')" placeholder="Name">
        <input type="text" name="country" id="country" value="<?php echo $result['country']; ?>" placeholder="Country">
        <input type="text" name="years" id="years" value="<?php echo $result['year']; ?>">
        <!-- <button type="submit" onclick="returnMain()" id="updateBtn">Update</button> -->
        <input type="submit" name="submit" value="Updaten" id="updateBtn"><br>
    </form>
    <a href="index.php">Return</a>

    <script src="script.js"></script>
</body>
</html>