<?php
session_start();

include 'database.php';
$conn = connect();

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if (isset($_GET['logout'])) {
  if($_GET['logout'] == true) {
    header('Location: index.php');
    session_destroy();
  }
}

if (isset($_POST['action'])) {
  $action = $_POST['action'];
  // echo $action;
  if($action == "login") {
    if (isset($_POST['mail']) && isset($_POST['passwords'])) {
  
  
        //$sql = "SELECT * FROM users WHERE Email ='" . $_POST['mail'] . "'";
        //$result = $conn->query($sql);
    
        $password = md5($_POST['passwords']);
        $sth = $conn->prepare("SELECT * FROM `users` WHERE `Email` = ? AND `Password` = ?");
        $sth->bindParam(1, $_POST['mail'], PDO::PARAM_STR);
        $sth->bindParam(2, $password, PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result != null) {
            $_SESSION['is-loggedin'] = true;
            $_SESSION['is-admin'] = $result['IsAdmin'];
            $_SESSION['name'] = $result['Name'];
            $_SESSION['id'] = $result['ID'];
            header('Location: main.php');
        } else {
            echo "<p class=\"already\">Incorrect Data</p>";
        }
    }
  } elseif ($action == "register") {
    if (isset($_POST['mail']) && isset($_POST['passwords']) && isset($_POST['name']) && isset($_POST['checked'])) {
  
  
        //$sql = "SELECT * FROM users WHERE Email ='" . $_POST['mail'] . "'";
        //$result = $conn->query($sql);
  
        $sth = $conn->prepare("SELECT * FROM `users` WHERE `Email` = ?");
        $sth->bindParam(1, $_POST['mail'], PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result != null) {
            echo "<p class=\"already\">This Email already exists!</p>";
        } else {
            $password = md5($_POST['passwords']);
            $sth = $conn->prepare("INSERT INTO `users` (`Email`, `Password`, `Name`, `IsAdmin`) VALUES (?, ?, ?, 0)");
            $sth->bindParam(1, $_POST['mail'], PDO::PARAM_STR);
            $sth->bindParam(2, $password, PDO::PARAM_STR); // deze moet gehashed worden
            $sth->bindParam(3, $_POST['name'], PDO::PARAM_STR);
            $sth->execute();
            // echo "Added Data!";
            echo "<p class=\"success\">Your account has been added!</p>";
        }
    }
  }
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Personalize | Inscape</title>
  </head>
  <body>
    <header>
      <h2>Inscape</h2>
    </header>
    <div class="wrapper">
      <div class="form-box login">
        <h2>Login</h2>
        <form method="post">
          <input type="hidden" name="action" value="login">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email" name="mail" id="" required />
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="key"></ion-icon></span>
            <input type="password" name="passwords" id="passlog" onkeyup="fLengthPass();" required />
            <label>Password</label>
            <div id="test"></div>
          </div>
          <div class="remember-forgot">
            <!-- <label><input type="checkbox" /> Remember Me</label> -->
            <a href="forgot.php">Forgot Password?</a>
          </div>
          <button type="submit" class="btn">Login</button>
          <div class="login-register">
            <p>
              Don't have an account?
              <a href="#" class="register-link">Register</a>
            </p>
          </div>
        </form>
      </div>

      <div class="form-box register">
        <h2>Registration</h2>
        <form method="post">
          <input type="hidden" name="action" value="register">
          <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="name" name="name" id="" required />
            <label>Name</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email" name="mail" id="" required />
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="key"></ion-icon></span>
            <input type="password" name="passwords" id="" onkeyup="fLengthPass();" required />
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label
              ><input type="checkbox" name="checked" required/> I agree to the
              <a href="#">Terms & Conditions</a>
            </label>
          </div>
          <button type="submit" class="btn">Register</button>
          <div class="login-register">
            <p>
              Already have an account.
              <a href="#" class="login-link">Login</a>
            </p>
          </div>
        </form>
      </div>
    </div>

    <script src="index.js"></script>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>