<?php
$servername = 'localhost';
$dataBase = 'top2000';
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dataBase", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $conn->prepare("DELETE FROM `artist` WHERE `id` = ?");
    $sth->bindParam(1, $_GET['id'], PDO::PARAM_STR);
    $sth->execute();
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

header("Location: index.php");
?>