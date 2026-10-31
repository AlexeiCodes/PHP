# Appunti PHP – 5B (Prof. Sacco)

Appunti di base costruiti sugli esercizi della cartella **5B/PHP** e sulle **Lezioni**
del sito del prof (https://ssacco.alwaysdata.net → Sito Itis Prof. Fabrizio Sacco → 5B).

## Come studiare
Leggi i capitoli in ordine (teoria + esempi). Il **codice originale del prof** è in
`esercizi/` (stessa struttura delle cartelle del sito) e `lezioni/`; il capitolo 10 lo
spiega. In `esempi/` ci sono piccoli script di ripasso per i capitoli di teoria.

| # | File | Argomento |
|---|------|-----------|
| 01 | `01-Come-funziona-PHP.md` | Client/server, dove gira PHP, primo script, echo |
| 02 | `02-Variabili-tipi-conversioni.md` | `$variabili`, tipi, `gettype`, `settype`, cast |
| 03 | `03-Operatori.md` | Aritmetici, confronto (`==` vs `===`), logici, `.`, `++` |
| 04 | `04-Strutture-di-controllo.md` | `if`, `switch`, `for`, `while`, `do…while`, `foreach` |
| 05 | `05-Array.md` | Array numerici e associativi, `count`, `sort`, `print_r` |
| 06 | `06-Stringhe.md` | `strlen`, `substr`, `explode`, `implode`, `str_replace`… |
| 07 | `07-Funzioni.md` | `function`, valore vs riferimento (`&`), `global` |
| 08 | `08-Form-HTML-e-PHP.md` | `<form>`, GET/POST, `$_GET` `$_POST` `$_REQUEST`, `isset`, `name[]`, hidden |
| 09 | `09-File-di-testo.md` | `file()`, `explode` sulle righe, scrivere file |
| 10 | `10-Esercizi-del-prof-spiegati.md` | **Il codice vero del prof spiegato** |
| 11 | `11-Cheat-sheet.md` | Riassunto da una pagina per la verifica |

## Codice del prof (copiato identico dal sito, 5B/PHP e 5B/Lezioni)
```
esercizi/
  gettype.php
  spia.php
  TabellinaInPhp/         tabellina.html/.php, tabellina2.html/.php (immagine cliccabile)
  TestTabellina/          TestTabellina.html, TestTabellineSelect.html, TabellineMultipleTest.html
  SoluzionetestTabelline/ TestTabelline.html + TestTabelline.php (genera e corregge)
  TestVeroFalso/
    Soluzione1/           traccia + TestDomande.html/.php/.txt + CorrezioneTestDomande.php
    SoluzioneComune/      GetDomande.php + valuta.php + test.txt
  SquadreCalcio/          partite.txt (traccia) + soluzione-proposta.php (NON del prof)
  CompilerOnLine/         compilatore.html, compilatore.php.txt, prova.c, test.c
  system/                 spazio.php
lezioni/
  ArrayIntroduzione.php
```
Non copiati (non sono testo): le immagini `tabelline.jpg`/`tabelline2.jpg`/`Modello.jpg`, il
file eseguibile `prova`, e i PDF/ODT/ZIP delle lezioni (il loro contenuto è riassunto nei
capitoli 02–08). Si scaricano dal sito del prof.

## Come provare i file
1. Installa **PHP portable** (link "ScaricaPHPportable" nella cartella 5B del prof)
   oppure XAMPP.
2. Apri il terminale nella cartella del file e lancia il server integrato:
   ```
   php -S localhost:8000
   ```
3. Apri il browser su `http://localhost:8000/nomefile.html` (o `.php`).

> ⚠️ Un file `.php` aperto con doppio clic NON funziona: deve passare da un server
> che lo esegue (vedi capitolo 01).
