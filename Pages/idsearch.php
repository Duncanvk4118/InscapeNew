<?php 
session_start();

$name = $_SESSION['name'];

include '../database.php';
$conn = connect();

if(!isset($_SESSION['is-loggedin'])) {
  header('Location: ../index.php');
}

$sth = $conn->prepare("SELECT * FROM `users` WHERE `Name` = '{$name}'");
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);

$ID = $result['ID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../general.css?v=<?php echo time(); ?>">>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID searcher | Inscape</title>
</head>
<body>
    <header>
      <a href="#" class="logo">Inscape</a>
      <ul>
        <li><a href="../main.php">Home</a></li>
        <li><a href="Assignments/index.html">Assignements</a></li>
        <li><a href="Progression/pageconstruct.html">Progression</a></li>
        <li>
          <div class="acc">
            <p>Welcome, <b><?php echo $name; ?></b></p>
            <a href="../index.php?logout=true" id="logout">Logout</a>
          </div>
        </li>
      </ul>
    </header>
    <section>
        <h1>ID searcher</h1>
        <p>Your ID is: </p> <h3><?php echo $ID; ?></h3>
        <br>
        <p>Save the ID, when you are logged out you can <b>NOT</b> review your ID.</p>
        <p>This is for security reasons, so no one else can change your account details.</p>
        <br>
        <p><i>You need your id for password reset.</i></p>
    </section>
    <footer>
      <div class="sec">
        <h2>Inscape</h2>
        <p>
          This site is for personal projects (school) Still has copyright
          though...
        </p>
        <ul class="socials">
          <li>
            <a href="#"><i class="fa fa-facebook"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-twitter"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-google-plus"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-youtube"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-linkedin-square"></i></a>
          </li>
        </ul>
      </div>
      <div class="footer-bottom">
        <p>copyright &copy;2023 Inscape. designed by <span>Inscape</span></p>
      </div>
    </footer>
</body>
</html>