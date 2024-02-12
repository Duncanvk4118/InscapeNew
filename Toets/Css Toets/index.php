<?php
if(isset($_POST['fnamein']) && isset($_POST['lnamein']) && isset($_POST['mail'])) {
  $loged = true;
} else {
  $loged = false;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CSS Toets</title>
  </head>
  <body>
    <header>
      <div class="upper">
        <img src="Img/Snowflake.png" />
        <h1>Christmas Greetings</h1>
        <img src="Img/Boom.png" />
      </div>
      <nav>
        <ul>
          <li><a href="../../main.php">Home</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Company</a></li>
          <li><a href="#" id="lasta">Blog</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="container">
        <div class="information">
          <div class="left">
            <h2>Lorem ipsum</h2>
            <br />
            <h5>Lorem ipsum</h5>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            <br />
            <br />
            <h5>Lorem ipsum</h5>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            <br />
            <br />
            <h5>Lorem ipsum</h5>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            <br />
            <br />
            <h5>Lorem ipsum</h5>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            <br />
            <br />
          </div>
          <div class="right">
            <h2>Lorem ipsum dolor sit amet</h2>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque
            praesentium impedit sit, eligendi maxime delectus quo. Nulla ad
            repellat iusto? Eos sapiente dolorum eaque autem. Mollitia omnis
            minus quisquam illum. Possimus saepe sit exercitationem officiis
            delectus optio inventore.
            <br />
            <br />
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur,
            itaque magnam repellendus repudiandae alias error laboriosam eaque
            suscipit quam libero ipsa delectus natus commodi. Fugiat adipisci
            nobis fuga aspernatur quo illum necessitatibus.
            <br />
            <br />
            <button>Learn More</button>
          </div>
        </div>
        <div class="formulier">
          <h2>Newsletter Sign Up</h2>
          <form action="index.php" method="post">
            <span id="headtext">Name</span>
            <br />
            <div class="name">
              <div class="fname">
                <input type="text" name="fnamein" id="" />
                <p>First Name</p>
              </div>
              <div class="lname">
                <input type="text" name="lnamein" id="" />
                <p>Last Name</p>
              </div>
            </div>
            <br />
            <span id="headtext">Email</span>
            <br />
            <input type="email" name="mail" id="" />
            <br />

            <h4>How can we help?</h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
              odio autem dicta nisi explicabo sint?
            </p>
            <br />
            <textarea name="area" id="" cols="" rows="8"></textarea>
            <br />
            <br />
            <button type="submit">Action Button</button>\
            <br>
            <?php if (isset($_POST['fnamein']) && $loged = true) {
              echo "<br />";
              echo "<p id=\"welcoming\">Dankjewel voor je aanmelding " . "<b>" . $_POST['fnamein'] . "</b>" . "</p>";
              }
            ?>
          </form>
        </div>
      </div>
    </main>
    <footer></footer>
  </body>
</html>
