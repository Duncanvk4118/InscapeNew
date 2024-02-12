<?php
$i = readline("Wat is je leeftijd: ");
$a = array($i);
// Onder 18
$o = 0;
// Boven 18
$b = 0;

$gem = 0;

for ($x=0; $x < 4; $x++) { 
    $i = readline("Wat is je leeftijd: ");
    array_push($a,$i);
}

foreach($a as $number) {
    if ($number < 18) {
        $o++;
    } else {
        $b++;
    }
    $gem += $number;
}

$gem /= count($a);

echo "Er zijn " . $b . " personen boven de 18.\n";
echo "Er zijn " . $o . " personen onder de 18.\n";
echo "gemiddelde leeftijd: " . $gem;

?>