<?php
include '../../database.php';
$conn = connect();

$sth = $conn->prepare("DELETE FROM `resultaten` WHERE `resultaten`.`toets_id` = ? AND `resultaten`.`student_id` = ?");
$sth->bindParam(1, $_GET['toets'], PDO::PARAM_STR);
$sth->bindParam(2, $_GET['cijfer'], PDO::PARAM_STR);
$sth->execute();

header("Location: cijfer.php?toets={$_GET['toets']}");
?>