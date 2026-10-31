# 08 – Form HTML e PHP (il cuore di tutti gli esercizi)

Quasi tutti gli esercizi del prof hanno due file:
- una pagina **`.html`** con un `<form>` (l'utente inserisce i dati)
- una pagina **`.php`** indicata in `action` che riceve i dati e risponde.

## Il tag form
```html
<form action="tabellina.php" method="get">
   Che tabellina vuoi? <input type="text" name="tab">
   <input type="submit" value="Invia">
</form>
```
- **`action`**: il file che riceve i dati.
- **`method`**: `get` (default) o `post`.
- **`name`** di ogni campo = nome della chiave con cui il dato arriva a PHP.

## GET vs POST
| | GET | POST |
|---|---|---|
| Dove vanno i dati | nell'URL: `tabellina.php?tab=7` | nel corpo della richiesta (invisibili nell'URL) |
| Limite | dati brevi | anche tanti dati |
| Uso tipico | ricerche, link, prove | password, form lunghi, upload |
| In PHP | `$_GET["tab"]` | `$_POST["tab"]` |

`$_REQUEST` contiene sia GET sia POST (è quello usato spesso dal prof).

Puoi provare GET anche senza form, scrivendo nell'URL:
`spia.php?cognome=rossi&nome=luca&eta=20` → in PHP `$_GET["cognome"]` vale `"rossi"`.

## Leggere i dati in PHP
```php
<?php
if (isset($_REQUEST["tab"])) {          // il form è stato inviato?
    $tab = (int) $_REQUEST["tab"];      // arriva come stringa → converto
    for ($i = 1; $i <= 10; $i++)
        echo "$tab x $i = " . $tab*$i . "<br>";
} else {
    echo "Nessuna tabellina scelta";
}
?>
```
**Usa sempre `isset()`** prima di leggere un campo: se manca, eviti l'errore
"Undefined array key".

## Tipi di input (dalla guida ModuliFormHTML del prof)
| Tipo | HTML | Cosa arriva a PHP |
|---|---|---|
| testo | `<input type="text" name="nome">` | il testo scritto |
| password | `<input type="password" name="pwd" maxlength="8">` | il testo (nascosto solo a video) |
| numero | `<input type="number" name="num" min="1">` | il numero (come stringa) |
| radio | `<input type="radio" name="sesso" value="M">` | **un solo** valore del gruppo (stesso `name`) |
| checkbox | `<input type="checkbox" name="privacy" value="si">` | il value **solo se spuntata**, altrimenti niente → usa `isset` |
| select | `<select name="classe"><option value="5B">5B</option></select>` | il `value` scelto |
| textarea | `<textarea name="msg"></textarea>` | testo su più righe |
| hidden | `<input type="hidden" name="sol" value="30">` | valore fisso, l'utente non lo vede |
| image | `<input type="image" src="x.jpg" name="tab">` | invia il form + coordinate del click (`tab_x`, `tab_y`) |
| submit / reset | `<input type="submit">` / `<input type="reset">` | invia / svuota il form |

HTML5: `email`, `date`, `color`, `range`, `tel`, `url`… e attributi `required`,
`placeholder`, `pattern`, `min`, `max`.

Trucco del prof: `<select onchange="this.form.submit()">` invia appena scegli.

## Campi con le parentesi quadre → arrivano come ARRAY
Usato negli esercizi TestTabellina e TestTabelline:
```html
<input type="checkbox" name="tab[]" value="2"> Tabellina del 2
<input type="checkbox" name="tab[]" value="5"> Tabellina del 5
```
```php
// se spunto 2 e 5:  $_REQUEST["tab"] = array("2", "5")
foreach ($_REQUEST["tab"] as $t) echo "hai scelto la tabellina del $t<br>";
```
Anche con indici: `name="ris[0]"`, `name="ris[1]"` → `$_REQUEST["ris"][0]`, `[1]`…

## Campi hidden: "portarsi dietro" dati
HTTP **non ha memoria**: ogni richiesta è indipendente. Per passare dati da una
pagina all'altra (es. le soluzioni del test, il punteggio del 7 e mezzo, l'azione
da fare) si usano i campi `hidden`:
```php
echo "<input type='hidden' name='sol[]' value='" . ($a*$b) . "'>";
```
⚠️ Chiunque vede il valore guardando il sorgente della pagina (Ctrl+U):
in TestTabellina.html le soluzioni sono leggibili! Più sicuro: calcolarle di
nuovo in PHP oppure usare le sessioni (`$_SESSION`).

## Pagina che si richiama da sola (form + risultato nello stesso file)
Schema usato nella lezione delle carte:
```php
<?php
if (!isset($_REQUEST["n"])) {
    // primo accesso: mostro il form
    echo "<form method='post'>Quante carte? <input name='n'><input type='submit'></form>";
} else {
    // form inviato: elaboro
    $n = (int) $_REQUEST["n"];
    echo "Hai chiesto $n carte";
}
?>
```
(Senza `action` il form richiama la stessa pagina.)

## $_SERVER (esercizio spia.php)
```php
$_SERVER["REMOTE_ADDR"]      // IP del visitatore
$_SERVER["HTTP_USER_AGENT"]  // browser
$_SERVER["REQUEST_METHOD"]   // GET o POST
$_SERVER["PHP_SELF"]         // nome dello script
$_SERVER["SERVER_SOFTWARE"]  // es. Apache
phpversion()                 // versione PHP
```

## Sicurezza minima
Prima di stampare un dato dell'utente: `htmlspecialchars($_REQUEST["nome"])`
(evita che qualcuno inserisca codice HTML/JavaScript nella pagina).

## Da ricordare
- `name` del campo = chiave in `$_GET` / `$_POST` / `$_REQUEST`.
- `isset()` prima di leggere; i valori arrivano come stringhe.
- `name="x[]"` → array. Checkbox non spuntata = non arriva.
- `hidden` per passare dati tra pagine (ma è visibile nel sorgente).
