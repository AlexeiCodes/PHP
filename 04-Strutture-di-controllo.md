# 04 – Strutture di controllo

La sintassi è quasi identica al C/C++ (con `$` davanti alle variabili).

## if / elseif / else
```php
$voto = 7;
if ($voto >= 9) {
    echo "Ottimo";
} elseif ($voto >= 6) {
    echo "Sufficiente";
} else {
    echo "Insufficiente";
}
```
Operatore ternario: `echo ($voto >= 6) ? "promosso" : "bocciato";`

## switch
```php
switch ($giorno) {
    case "sab":
    case "dom": echo "weekend"; break;
    default:    echo "scuola";
}
```

## for – quando sai quante volte ripetere
Esempio tabellina (come nell'esercizio TabellinaInPhp):
```php
$tab = 7;
for ($i = 1; $i <= 10; $i++) {
    echo "$tab x $i = " . ($tab * $i) . "<br>";
}
```

## while – ripeti finché la condizione è vera
```php
$n = 1;
while ($n <= 100) {
    $n = $n * 2;
}
```

## do … while – almeno una volta
Usato nella lezione delle carte per estrarre finché non si trova una carta nuova:
```php
do {
    $carta = rand(0, 39);
} while (in_array($carta, $uscite));   // ripeti se è già uscita
```

## foreach – per scorrere gli array (il più usato in PHP)
```php
$colori = array("rosso", "verde", "blu");
foreach ($colori as $colore) {
    echo $colore . "<br>";
}

$film = array("titolo" => "Matrix", "anno" => 1999);
foreach ($film as $chiave => $valore) {
    echo "$chiave: $valore<br>";
}
```

## break e continue
- `break` esce dal ciclo.
- `continue` salta al giro successivo.

## Generare tabelle HTML con i cicli (molto usato negli esercizi)
```php
echo "<table border=1>";
for ($r = 1; $r <= 10; $r++) {
    echo "<tr>";
    for ($c = 1; $c <= 10; $c++) {
        echo "<td>" . ($r * $c) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
```
→ tavola pitagorica completa. Esempio in `esempi/cicli.php`.

## Da ricordare
- `for` = numero di giri noto, `while` = finché…, `do…while` = almeno una volta.
- `foreach ($arr as $k => $v)` per scorrere gli array.
- Con `echo` dentro i cicli puoi costruire tabelle e liste HTML.
