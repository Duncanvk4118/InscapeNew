<?php
$servername = "localhost";
$dbname = "top2000";
$username = "root";
$password = "root";
try {
  // PDO object aanmaken en parameters met gegevens over database erin verwerken
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Stel error reporting in. De waarde maakt gebruik van exceptions als er SQL errors zijn
  // en het script stopt met draaien.
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Catch de PDOException om de error te zien als de connectie met de database misgaat
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>