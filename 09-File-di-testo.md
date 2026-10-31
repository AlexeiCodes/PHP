# 09 – Leggere e scrivere file di testo

Serve per l'esercizio **SquadreCalcio** (simulazione di verifica), dove i dati
sono in `partite.txt` con righe del tipo:
```
Inter,Milan,2,1
```
(squadra in casa, squadra ospite, gol casa, gol ospite)

## Leggere tutto il file in un array di righe: `file()`
```php
$righe = file("partite.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($righe as $riga) {
    $campi = explode(",", $riga);
    if (count($campi) != 4) continue;     // salta intestazioni/righe strane
    $casa = trim($campi[0]);
    $ospite = trim($campi[1]);
    $gc = (int) $campi[2];
    $go = (int) $campi[3];
    echo "$casa - $ospite  $gc-$go<br>";
}
```

## Leggere riga per riga: fopen / fgets / feof / fclose
(simile al C)
```php
$f = fopen("partite.txt", "r");       // r = lettura
while (!feof($f)) {
    $riga = trim(fgets($f));
    if ($riga == "") continue;
    $campi = explode(",", $riga);
    // ...
}
fclose($f);
```

## Leggere / scrivere tutto in un colpo
```php
$testo = file_get_contents("dati.txt");          // stringa con tutto il file
file_put_contents("squadre.html", $html);        // crea/sovrascrive
file_put_contents("log.txt", "riga\n", FILE_APPEND); // aggiunge in fondo
```

## Scrivere con fopen
```php
$f = fopen("squadre.html", "w");   // w = scrittura (sovrascrive), a = aggiunge
fwrite($f, "<html><body><ul>\n");
fwrite($f, "<li>Inter</li>\n");
fwrite($f, "</ul></body></html>");
fclose($f);
```

## Controlli utili
```php
if (!file_exists("partite.txt")) die("File non trovato");
```
⚠️ Sul server la cartella deve avere i permessi di scrittura per creare file.

## Da ricordare
- `file()` → array di righe; `explode(",", $riga)` → campi.
- `trim()` per togliere `\n` e spazi.
- `file_put_contents` / `fopen("w")` + `fwrite` per scrivere.
