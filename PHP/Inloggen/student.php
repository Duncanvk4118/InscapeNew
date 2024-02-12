<?php
session_start();
include '../../database.php';
$conn = connect();

// $name = $_SESSION['id'];

function show() {
  $conn = connect();
  $servername = 'localhost';
  $dataBase = 'MijnSite';
  $username = "root";
  $password = "root";
  $total = array();
  $totalweg = array();

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dataBase", "root", "root");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected";

      $stmt = $conn->prepare("SELECT cijfer, toets_id FROM resultaten WHERE student_id = '{$_SESSION['id']}'");
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $v) {
        $stmt2 = $conn->prepare("SELECT Vaknaam, toetsnaam, weging FROM toetsen WHERE toets_id = '{$v['toets_id']}'"); 
        $stmt2->execute();
        $result = $stmt2->setFetchMode(PDO::FETCH_ASSOC); 
        foreach(new RecursiveArrayIterator($stmt2->fetchAll()) as $a) {
        echo "<tr>";
          echo "<td>" . $a['Vaknaam'] . "</td>";
          echo "<td>" . $a['toetsnaam'] . "</td>";
          if ($v['cijfer'] <= 5.4) {
            echo "<td><p style=\"color:red\"><b>" . $v['cijfer'] . "</b></p></td>";
          } else {
          echo "<td><b>" . $v['cijfer'] . "</b></td>";
          }
          echo "<td>" . $a['weging'] . "*</td>";
          $gem = $v['cijfer'] * $a['weging'];
          $total[] = $gem;
          $totalweg[] = $a['weging'];
        echo "</tr>";
        }
      }
      if ($total != null) {
      $gem2 = array_sum($total) / array_sum($totalweg);
      $gemiddelde = round($gem2, 1, PHP_ROUND_HALF_UP);
      // $gemiddelde =  array_sum($total);
      echo "<tr>";
      echo "<td></td>";
      echo "<td><b>Gemiddelde Cijfer</b></td>";
      if ($gemiddelde <= 5.4) {
        echo "<td><p style=\"color:red\"><b>" . $gemiddelde . "</b></p></td>";
      } else {
      echo "<td><b>" . $gemiddelde . "</b></td>";
      }
      echo "<td></td>";
      echo "</td>";
      } else {
        echo "Je hebt nog geen cijfers!";
      }
      
      
      // $stmt = $conn->prepare("SELECT toetsnaam, Vaknaam FROM toetsen"); 
      // $stmt->execute();
      // foreach (new RecursiveArrayIterator($stmt->fetchAll()) as $v) {
      //       echo "<td><b>" . $v['cijfer'] . "</b></td>";
      //     echo "</tr>";
      // }
  } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      die();
  }
}
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT cijfer, toets_id FROM resultaten WHERE student_id='$name'";
// $result = mysqli_query($conn, $sql);

// // Begin cijferlijst
// echo "<h1>Jouw behaalde cijfers</h1>";
// if ($result->num_rows > 0) {
//   echo "<table>";
//     echo "<tr>";
//       echo "<th>Cijfer</th>";
//       echo "<th>Vak</th>";
//     echo "</tr>";
//     foreach ($result as $data) {
//     echo "<tr>";
//       echo "<td>" . $data['cijfer'] . "</td>";
//       echo "<td>" . $data['toets_id'] . "</td>";
//     echo "</tr>";
//     }
//     // foreach ($result2 as $data2) {
//     //   echo "<tr>";
//     //     echo "<td>" . $data['toets_id'] . "</td>";
//     //   echo "</tr>";
//     //   }
//   echo "</table>";
// } else {
//   echo "Nog geen cijfers";
// }
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <link rel="stylesheet" href="stijlen/student.css?v= <?php echo time(); ?> ">
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Cijferlijst</title>
  </head>
  <body>
    <table>
      <tr>
        <th>Vak</th>
        <th>Omschrijving</th>
        <th>Cijfer</th>
        <th>Weging</th>
      </tr>
      <?php show(); ?>
    </table>
  </body>
</html>