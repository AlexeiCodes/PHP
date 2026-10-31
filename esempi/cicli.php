<?php
// if / for / while / do-while / foreach / tavola pitagorica
$voto = 7;
if ($voto >= 9) echo "Ottimo<br>";
elseif ($voto >= 6) echo "Sufficiente<br>";
else echo "Insufficiente<br>";

echo "<h3>Numeri pari da 2 a 20 (for)</h3>";
for ($i = 2; $i <= 20; $i += 2) echo "$i ";

echo "<h3>Potenze di 2 sotto 1000 (while)</h3>";
$n = 1;
while ($n < 1000) { echo "$n "; $n *= 2; }

echo "<h3>Lancio un dado finché esce 6 (do-while)</h3>";
$lanci = 0;
do { $d = rand(1, 6); $lanci++; echo "$d "; } while ($d != 6);
echo "<br>Lanci: $lanci";

echo "<h3>foreach</h3>";
$capitali = array("Italia" => "Roma", "Francia" => "Parigi", "Spagna" => "Madrid");
foreach ($capitali as $stato => $cap) echo "La capitale di $stato è $cap<br>";

echo "<h3>Tavola pitagorica</h3><table border='1' cellpadding='4'>";
for ($r = 1; $r <= 10; $r++) {
    echo "<tr>";
    for ($c = 1; $c <= 10; $c++) echo "<td>" . ($r * $c) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
