<?php
$i = ReadLine("Wat is uw leeftijd? ");
$a = array($i); 
// Onder 18
$o = 0;
// Boven 18
$b = 0;
// Gemiddelde
$gem = 0;

// Vraagt alle informatie op
for($x = 0; $x<4;$x++) {
    $i = ReadLine("Wat is uw leeftijd? ");
    array_push($a, $i);
}

// Zoekt door de array
foreach ($a as $key => $m) {
    // Kijkt naar de leeftijd
    if($m < 18) {
        $o++;
    } elseif ($m >= 18) {
        $b++;
    }
    $gem += $m;
}

$gem /= count($a);

echo "Er zijn " . $b . " personen 18 jaar of ouder.\n";
echo "Er is " . $o . " persoon onder de 18 jaar.\n";
echo "De gemiddelde leeftijd is " . $gem . " jaar.";

?>