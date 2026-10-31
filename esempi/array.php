<?php
echo "<pre>";
$a = array(1, 2);          print_r($a);
$b[] = 1; $b[] = 2; $b[] = 3;  print_r($b);
$c = array("uno" => 1, "due" => 2);  print_r($c);
$frasi = ["Ciao a tutti", "Come state?", "Spero bene"];  print_r($frasi);

// array dinamico con valori casuali
for ($i = 0; $i < 5; $i++) $casuali[$i] = rand(1, 100);
echo "Casuali: " . implode(", ", $casuali) . "\n";
echo "Elementi: " . count($casuali) . ", somma: " . array_sum($casuali)
   . ", max: " . max($casuali) . "\n";
echo in_array(50, $casuali) ? "c'è il 50\n" : "il 50 non c'è\n";

// ordinamenti
$cognomi = array("c" => "Verdi", "a" => "Rossi", "b" => "Bianchi");
$x = $cognomi; sort($x);  echo "sort (perde le chiavi):\n";  print_r($x);
$x = $cognomi; asort($x); echo "asort (tiene le chiavi):\n"; print_r($x);
$x = $cognomi; ksort($x); echo "ksort (per chiave):\n";      print_r($x);

// matrice
$studenti = array(array("nome" => "Luca", "voto" => 7), array("nome" => "Anna", "voto" => 9));
foreach ($studenti as $s) echo $s["nome"] . " ha preso " . $s["voto"] . "\n";
echo "</pre>";
?>
