<?php
include 'connect.php';
$query = $conn->query("SELECT * FROM artist");

?>

<table>
    <tr>
        <th>Naam</th>
        <th>Taakomschrijving</th>
        <th>Deadline</th>
        <th>Update</th>
        <th>Verwijderen</th>
    </tr>

    <?php while ($row = $query->fetch()) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['country']; ?></td>
        <td><?php echo $row['year']; ?></td>
        <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
        <td><a href="delete.php?id=<?php echo $row['id']; ?>">Verwijderen</a></td>
    </tr>

    <?php } ?>
</table>