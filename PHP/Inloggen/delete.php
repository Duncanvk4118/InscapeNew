<?php
include '../../database.php';
$conn = connect();

$sth = $conn->prepare("DELETE FROM `toetsen` WHERE `toetsen`.`toets_id` = ?");
$sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
$sth->execute();

$sth = $conn->prepare("DELETE FROM `resultaten` WHERE `resultaten`.`toets_id` = ?");
$sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
$sth->execute();

header("Location: toetsen.php");
?>