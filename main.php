<?php
session_start();

if(!isset($_SESSION['is-loggedin'])) {
  header('Location: index.php');
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>" />
    <link rel="icon" type="image/x-icon" href="Images/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | Inscape</title>
  </head>
  <body>
    <header>
      <a href="#" class="logo">Inscape</a>
      <ul>
        <li><a href="#" class="active">Home</a></li>
        <li><a href="Pages/Assignments/index.html">Assignements</a></li>
        <?php 
        if ($_SESSION['is-admin'] == 1) {
          echo "<li><a href=\"Pages/Progression/index.html\">Progression</a></li>";
        } else {
          echo "<li><a href=\"Pages/Progression/pageconstruct.html\">Progression</a></li>";
        }
        ?>
        <li>
          <div class="acc">
            <p>Welcome, <b><?php echo $name; ?></b></p>
            <div class="account">
              <a href="index.php?logout=true" id="logout">Logout</a>
              <a href="Pages/idsearch.php" id="logout">ID view</a>
            </div>
          </div>
        </li>
      </ul>
    </header>
    <section>
      <img src="Images/MainPage/stars.png" id="stars" />
      <img src="Images/MainPage/moon.png" id="moon" />
      <img src="Images/MainPage/mountains_behind.png" id="mountains_behind" />
      <h2 id="text">Go to</h2>
      <a href="Pages/Assignments/index.html" id="btn">Assignments</a>
      <img src="Images/MainPage/mountains_front.png" id="mountains_front" />
    </section>

    <!-- Footer Section -->
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

    <!-- Java Script -->
    <script>
      let stars = document.getElementById("stars");
      let moon = document.getElementById("moon");
      let mountains_behind = document.getElementById("mountains_behind");
      let btn = document.getElementById("btn");
      let text = document.getElementById("text");
      let mountains_front = document.getElementById("mountains_front");
      let header = document.querySelector("header");

      window.onscroll = function () {
        let value = window.scrollY;
        stars.style.left = value * 0.25 + "px";
        moon.style.top = value * 1.05 + "px";
        mountains_behind.style.top = value * 0.5 + "px";
        mountains_front.style.top = value * 0 + "px";
        header.style.top = value * 0.5 + "px";
      };
    </script>

    <script src="https://kit.fontawesome.com/d8fab7c14e.js"></script>
  </body>
</html>
