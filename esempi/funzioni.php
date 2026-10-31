<?php
// per valore
function massimo($a, $b) {   // "max" esiste già in PHP: non si può ridefinire
    if ($a > $b) $b = $a;
    return $b;
}
echo "massimo(3, 8) = " . massimo(3, 8) . "<br>";

// valore di default
function saluta($nome = "studente") { return "Ciao $nome"; }
echo saluta() . " / " . saluta("Anna") . "<br>";

// per riferimento
function aggiungi_qualcosa(&$stringa) { $stringa .= " e qualche altra cosa."; }
$t = "Testo";
aggiungi_qualcosa($t);
echo $t . "<br>";

// valore vs riferimento a confronto
function raddoppiaCopia($n) { $n = $n * 2; }
function raddoppiaVero(&$n) { $n = $n * 2; }
$x = 5; raddoppiaCopia($x); echo "per valore: $x<br>";       // 5
$x = 5; raddoppiaVero($x);  echo "per riferimento: $x<br>";  // 10

// global
$variabile = "pippo";
function prova() { global $variabile; echo "global: $variabile<br>"; }
prova();

// funzione che restituisce un array
function statistiche($voti) {
    return array("media" => round(array_sum($voti) / count($voti), 2),
                 "max" => max($voti), "min" => min($voti));
}
echo "<pre>"; print_r(statistiche(array(6, 7, 8, 5, 9))); echo "</pre>";
?>
