<?php

include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $year = $_POST['year'];

    $query = "INSERT INTO artist (`name`, `country`, `year`) VALUES ('$name', '$country', '$year')";
    $conn->exec($query);

    header("location: index.php");
}

?>