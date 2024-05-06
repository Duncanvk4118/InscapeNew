<?php
include 'Classes/database.php';

$db = new DatabaseMysqli();

$sql = "SELECT * FROM artist";
$db->requestSQL($sql);
?>