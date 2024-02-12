<?php
include '../../database.php';
$conn = connect();

$conn = connect();
$sth = $conn->prepare("SELECT * FROM resultaten");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

$JSON = json_encode($result);

// echo $JSON;

print_r($JSON);

?>