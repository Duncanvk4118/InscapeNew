<html>
    <head>
        <link rel="stylesheet" href="style.css">
</head>
    <body>
    <form method="post">
      Gewicht in kg: <input type="number" name="Gewicht" />
      <br />
      Lengte in cm: <input type="number" name="Lengte" />
      <br />
      Geef door
      <input type="submit" class="slay"/>
    </form>

    <a href="../opdrselect.php">Return</a>
<?php

if (isset($_POST["Gewicht"]) && isset($_POST["Lengte"])) {
    $weight = $_POST["Gewicht"];
    $length = $_POST["Lengte"];

    $length = $length / 100;
$BMI = $weight / pow(2, $length);

$BMI = round($BMI,1);

echo "<p id=\"bmi\">" . "Uw BMI is: ". $BMI . "</p>";

$conc = "";

if ($BMI < 18.5) 
{
    $conc = "Je hebt ondergewicht";
    echo "<h2 id=\"warn\">" . $conc . "</h2>";
    
    
}
elseif ($BMI >= 18.5 && $BMI <= 25)
{
    $conc = "Je bent op gezond gewicht";
    echo "<h2 id=\"good\">" . $conc . "</h2>";
}
elseif($BMI > 25 && $BMI < 30)
{
    $conc = "Je hebt overgewicht";
    echo "<h2 id=\"warn\">" . $conc . "</h2>";
}
elseif ($BMI >= 30)
{
    $conc = "Je hebt ernstig overgewicht.";
    echo "<h2 id=\"swarn\">" . $conc . "</h2>";
} 
else
{
    $conc = "geen geldige BMI";
}
}
//$weight = readLine("What is your weight in kg? ");
//$length = readLine("What is your length in cm? ");


?>

    </body>
</html>