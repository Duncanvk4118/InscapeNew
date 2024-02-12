<?php
include '../../database.php';

$res .= "<table>";
    $res .= "<th>Name</th>";
    while ($row == $conn) {
        echo "<tr>";
        echo "<td>" . $result['user'] . "</td>";
        echo "<td>" . $result['user'] . "</td>";
        echo "<td>" . $result['user'] . "</td>";
        echo "</tr>";
    }

// for ($i = 1; $i <= 100; $i++) {
//     echo pow($i, $i) . "\n";
// }
?>