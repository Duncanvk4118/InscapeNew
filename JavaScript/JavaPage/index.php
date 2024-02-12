<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Java Page</title>
  </head>
  <body>
    <h1>Java Tets Page</h1>
    <form method="post" onsubmit="return false">
      Voornaam:
      <input type="text" id="vn" value="" placeholder="voornaam" /> Achternaam:
      <input type="text" id="an" value="" placeholder="achternaam" /> Leeftijd:
      <input type="number" id="lt" value="" placeholder="leeftijd" /> Over:
      <input type="number" id="al" value="" placeholder="x" /> jaar...
      <button onclick="kopie()">Plaats Tekst</button>
    </form>
    <div id="output">-</div>

    <button onclick="returnPage()">return</button>
    <script src="index.js"></script>
  </body>
</html>
