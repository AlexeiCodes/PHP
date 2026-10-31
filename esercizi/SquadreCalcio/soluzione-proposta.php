<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Squadre di calcio</title></head>
<body>
<?php
/*  SIMULAZIONE VERIFICA - SquadreCalcio
    partite.txt contiene righe: casa,ospite,golCasa,golOspite
    1) classifica  2) più vittorie in casa / fuori  3) partite di una squadra
    4) più gol fatti / subiti  5) creare squadre.html con le squadre in ordine alfabetico
    (partite.txt qui è un esempio: sostituiscilo con quello del prof)            */

$righe = file("partite.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$punti = array(); $vintiCasa = array(); $vintiFuori = array();
$golFatti = array(); $golSubiti = array(); $partite = array();

foreach ($righe as $riga) {
    $c = explode(",", $riga);
    if (count($c) != 4 || !is_numeric(trim($c[2]))) continue;  // salta righe non valide
    $casa = trim($c[0]); $osp = trim($c[1]);
    $gc = (int) $c[2];   $go = (int) $c[3];

    // inizializzo le squadre la prima volta che le incontro
    foreach (array($casa, $osp) as $sq) {
        if (!isset($punti[$sq])) {
            $punti[$sq] = 0; $vintiCasa[$sq] = 0; $vintiFuori[$sq] = 0;
            $golFatti[$sq] = 0; $golSubiti[$sq] = 0;
        }
    }
    $partite[] = array($casa, $osp, $gc, $go);
    $golFatti[$casa] += $gc;  $golSubiti[$casa] += $go;
    $golFatti[$osp]  += $go;  $golSubiti[$osp]  += $gc;

    if ($gc > $go)      { $punti[$casa] += 3; $vintiCasa[$casa]++; }
    elseif ($gc < $go)  { $punti[$osp]  += 3; $vintiFuori[$osp]++; }
    else                { $punti[$casa] += 1; $punti[$osp] += 1; }
}

// funzione di supporto: restituisce le squadre con il valore massimo (possono essere più di una)
function migliori($arr) {
    $max = max($arr);
    return implode(", ", array_keys($arr, $max)) . " ($max)";
}

// 1) CLASSIFICA: arsort ordina per valore decrescente mantenendo le chiavi
$classifica = $punti;
arsort($classifica);
echo "<h2>1) Classifica</h2><table border='1' cellpadding='4'><tr><th>Pos</th><th>Squadra</th><th>Punti</th></tr>";
$pos = 1;
foreach ($classifica as $sq => $p) { echo "<tr><td>$pos</td><td>$sq</td><td>$p</td></tr>"; $pos++; }
echo "</table>";

// 2) più vittorie in casa / fuori
echo "<h2>2) Vittorie</h2>";
echo "Più vittorie in casa: " . migliori($vintiCasa) . "<br>";
echo "Più vittorie fuori casa: " . migliori($vintiFuori) . "<br>";

// 3) partite di una squadra scelta con un form (select generata dall'array)
echo "<h2>3) Partite di una squadra</h2><form method='get'><select name='sq'>";
$nomi = array_keys($punti);
sort($nomi);
foreach ($nomi as $n) echo "<option value='$n'>$n</option>";
echo "</select> <input type='submit' value='Mostra'></form>";
if (isset($_GET["sq"])) {
    $scelta = $_GET["sq"];
    echo "<p>Partite di <b>" . htmlspecialchars($scelta) . "</b>:</p><ul>";
    foreach ($partite as $pt) {
        if ($pt[0] == $scelta || $pt[1] == $scelta)
            echo "<li>$pt[0] - $pt[1] &nbsp; $pt[2]-$pt[3]</li>";
    }
    echo "</ul>";
}

// 4) gol
echo "<h2>4) Gol</h2>";
echo "Più gol segnati: " . migliori($golFatti) . "<br>";
echo "Più gol subiti: " . migliori($golSubiti) . "<br>";

// 5) creo il file squadre.html con le squadre in ordine alfabetico
$html = "<!DOCTYPE html>\n<html><head><meta charset='utf-8'><title>Squadre</title></head><body>\n<h1>Squadre</h1>\n<ol>\n";
foreach ($nomi as $n) $html .= "<li>$n</li>\n";
$html .= "</ol>\n</body></html>\n";
if (file_put_contents("squadre.html", $html) !== false)
    echo "<h2>5) File creato</h2><a href='squadre.html'>Apri squadre.html</a>";
else
    echo "<h2>5) Errore</h2>Impossibile scrivere squadre.html (permessi della cartella?)";
?>
</body></html>
