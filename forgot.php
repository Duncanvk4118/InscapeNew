<?php 
include 'database.php';
$conn = connect();

if (isset($_POST['mail']) && isset($_POST['passwords']) && isset($_POST['password']) && isset($_POST['id'])) {
    $pass = $_POST['passwords'];
    if (strlen($pass) >= 8) {
        $sth = $conn->prepare("SELECT * FROM `users` WHERE `Email` = ?");
        $sth->bindParam(1, $_POST['mail'], PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result != null) {
            if ($_POST['id'] == $result['ID']) {
                if ($_POST['passwords'] == $_POST['password']) {
                    $password = md5($_POST['passwords']);
                    $sql = "UPDATE `users` SET password='{$password}' WHERE email='{$_POST['mail']}'";
                    $stmt = $conn->prepare($sql);
                    // echo $sql;
                    $stmt->execute();
                    echo "<p class=\"success\">Data Changed</p>";
                } else {
                    echo "<p class=\"already\">Passwords doesn't match</p>";
                }
            } else {
                echo "<p class=\"already\">You didn't enter the correct ID!</p>";
            } 
        } else {
            echo "<p class=\"already\">Email was not found in the Database!</p>";
        }  
    } else {
        echo "<p class=\"already\">Your password needs atleast 8 chars.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="forgotten.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Inscape</title>
</head>
<body>
    <header>
      <h2>Inscape</h2>
    </header>
    <div class="container">
        <form method="post">
            <img src="Images/icon.png">
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="mail" id="" required />
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="key"></ion-icon></span>
                <input type="password" name="passwords" id="" required />
                <label>Password</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="key"></ion-icon></span>
                <input type="password" name="password" id="" required />
                <label>Password Confirmation</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="key"></ion-icon></span>
                <input type="number" name="id" id="" required />
                <label>ID Confirmation</label>
            </div>
            <button type="submit" class="btn">Change Password</button>
        </form>
        <a href="index.php">Return</a>
    </div>
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