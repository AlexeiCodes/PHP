# 01 – Come funziona PHP

## Client e server
- Il **client** è il browser: sa leggere solo HTML, CSS, JavaScript.
- Il **server** (es. Apache su alwaysdata) riceve la richiesta HTTP.
- Se il file richiesto è `.php`, il server lo passa all'**interprete PHP**, che
  esegue il codice e **produce HTML**. Al browser arriva solo il risultato.

```
Browser ──(richiesta HTTP GET/POST)──▶ Server Apache ──▶ interprete PHP ──▶ (eventuale DB SQL)
Browser ◀──────────── pagina HTML generata ◀──────────────┘
```

Conseguenza importante: **chi visita la pagina non vede mai il codice PHP**,
vede solo quello che stampi con `echo`. (Per questo sul sito del prof il
"Codice" dei file `.php` non è visibile, mentre quello dei `.html` sì.)

## Struttura di un file PHP
Il codice PHP sta dentro `<?php ... ?>` e può essere mescolato con l'HTML.

```php
<html>
<body>
  <h1>Prima pagina</h1>
  <?php
    echo "Ciao mondo!<br>";      // stampa testo (anche tag HTML)
    echo "Oggi è " . date("d/m/Y");
  ?>
</body>
</html>
```

- Ogni istruzione finisce con **`;`**
- Commenti: `// una riga`, `# una riga`, `/* più righe */`
- `echo` (o `print`) manda testo al browser. Per andare a capo nella pagina
  serve `<br>`, non `\n` (il `\n` va a capo solo nel sorgente HTML).

## Debug rapido
```php
print_r($variabile);   // stampa leggibile di array
var_dump($variabile);  // tipo + valore (più dettagliato)
phpinfo();             // tutta la configurazione PHP del server
```
Consiglio: metti `echo "<pre>"; print_r($arr); echo "</pre>";` così l'array si legge bene.

## Da ricordare
- PHP gira **sul server**, il browser riceve solo HTML.
- `<?php ... ?>`, `;` alla fine, `echo` per stampare.
- Per provare in locale: `php -S localhost:8000` nella cartella del file.
