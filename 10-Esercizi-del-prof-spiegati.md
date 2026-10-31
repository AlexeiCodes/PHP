# 10 – Gli esercizi del prof spiegati (codice ORIGINALE)

Il codice di ogni esercizio è nella cartella `esercizi/`, **copiato identico** dal sito del
prof (pulsanti "1)", "2)"… della pagina, che aprono `_cat.php`). Qui sotto c'è la
spiegazione dei punti importanti.

> Unica eccezione: `esercizi/SquadreCalcio/soluzione-proposta.php`. Il prof ha messo
> solo la traccia (`partite.txt`) senza soluzione, quindi quella è una mia proposta,
> segnalata come tale.

---

## 1. gettype.php
```php
$intero = 42;  $decimale = 3.14;  $doppio = 2.71828;
$booleano = true;  $testo = "ciao";  $vettore = [4,5,6];
echo "intero:  ".gettype($intero) . "<br>";   // integer
...
```
**Cosa insegna:** le variabili non si dichiarano, PHP decide il tipo da solo.
`gettype()` restituisce il nome del tipo: `integer`, `double` (sia 3.14 sia 2.71828:
in PHP float e double sono la stessa cosa), `boolean`, `string`, `array`.
Nota anche `[4,5,6]`: è la forma breve di `array(4,5,6)`.

---

## 2. spia.php
Legge informazioni dall'array **`$_SERVER`** e le stampa:

| Variabile | Contenuto |
|---|---|
| `$_SERVER['REMOTE_ADDR']` | IP del visitatore |
| `$_SERVER['HTTP_USER_AGENT']` | browser |
| `phpversion()` | versione di PHP |
| `PHP_OS` | sistema operativo del server (Linux) |
| `$_SERVER['SERVER_SOFTWARE']` | web server (Apache) |
| `$_SERVER['SCRIPT_NAME']` | file richiesto |
| `$_SERVER['REQUEST_METHOD']` | GET o POST |

Poi conta i parametri con `count($_GET)` / `count($_POST)` e li stampa con
`print_r` dentro `<pre>`. Il prof suggerisce di aggiungere all'URL
`?cognome=rossi&nome=luca&eta=20` → `$_GET` diventa
`Array ( [cognome] => rossi [nome] => luca [eta] => 20 )`.

Novità: `sprintf("Variabili GET ricevute: %d<br>", $num_get)` → come in C, `%d` viene
sostituito dal numero.

---

## 3. TabellinaInPhp

### tabellina.html → tabellina.php
```html
<form action=tabellina.php>
che tabellina vuoi?
<input type="text" name=tab>
</form>
```
Non c'è il pulsante submit: si invia premendo **Invio** nel campo. Senza `method` →
**GET**, quindi l'URL diventa `tabellina.php?tab=7`.

```php
$tab = $_GET["tab"];
printf("<table border=1>");
printf("<th colspan=5>TABELLINA DEL $tab</th>");
for($i = 0; $i<=10; $i++)
{
    printf("<tr><td>%d</td> <td>x</td> <td>%d</td> <td>=</td> <td>%d</td></tr>\n",
	$tab, $i, $tab * $i);
}
printf("</table>");
```
- Legge il dato con `$_GET["tab"]`.
- Usa **`printf`** (come in C) invece di `echo`: i `%d` vengono riempiti con
  `$tab`, `$i`, `$tab*$i` in ordine.
- Ogni giro del `for` (da 0 a 10) crea una riga `<tr>` con 5 celle `<td>`.

### tabellina2.html → tabellina2.php (l'immagine cliccabile)
```html
<input type=image src=tabelline2.jpg name=tab>
```
Un `input type=image` invia il form quando ci clicchi sopra e manda le **coordinate del
click**: `tab_x` e `tab_y` (nome del campo + `_x` / `_y`).

```php
$Xpixel=145;   // larghezza di una tabellina nell'immagine
$Ypixel=128;   // altezza della prima riga (tabelline 1-5)
$x = $_GET["tab_x"];
$y = $_GET["tab_y"];
$tab=$x/$Xpixel +1;        // es. x=300 → 300/145+1 = 3.06…
settype($tab,"integer");   // → 3   (toglie la parte decimale)
if ($y > $Ypixel) $tab+=5; // click nella riga sotto → tabelline 6-10
```
**"Che serve settype? Prova a toglierlo"** (domanda del prof): senza `settype`
`$tab` resta decimale (3.06…) e il titolo mostrerebbe "TABELLINA DEL 3.0689…"
(nelle celle no, perché `%d` di printf stampa comunque un intero). Con `settype`
diventa un intero vero.

L'immagine `tabelline2.jpg` è nella cartella del prof (non è un file di testo):
scaricala da lì e mettila accanto a `tabellina2.html`.

---

## 4. TestTabellina (tre form; la correzione va in `correggi.php`)

### TestTabellina.html
```html
5 X 6 =<input type=text name=ris[0]><br>
...
<input type=hidden name=sol[0] value="30">
```
- `name=ris[0]`, `ris[1]`… → in PHP arriva **un array** `$_GET["ris"]`.
- Le soluzioni sono nei campi **hidden** `sol[]` → arrivano anch'esse come array.
- `correggi.php` (non pubblicato dal prof) deve confrontare `ris[$i]` con `sol[$i]`.

### TestTabellineSelect.html
Uguale, ma le risposte si scelgono con `<select name="ris[0]">` e usa `method="post"`
→ in PHP si legge `$_POST["ris"]`. (Tutti i select hanno `id="tab"`: un id dovrebbe
essere unico, ma qui non dà problemi perché PHP usa il `name`.)

### TabellineMultipleTest.html
Dieci checkbox con nomi diversi `t1`…`t10` e il campo `numtest`. In PHP bisognerebbe
controllarle una per una:
```php
for ($k = 1; $k <= 10; $k++) if (isset($_GET["t$k"])) ...
```
La versione successiva (SoluzionetestTabelline) risolve meglio con `tab[]`.

**Attenzione:** le soluzioni nei campi hidden si leggono nel sorgente (Ctrl+U).

---

## 5. SoluzionetestTabelline ⭐ (pagina che si richiama da sola)

### TestTabelline.html
```html
<form action="TestTabelline.php" method="get">
<input type="number" name="num" min="1">
<input type="checkbox" name="tab[]" value="1">Tabellina dell'1 <br>
...
```
Tutte le checkbox si chiamano **`tab[]`** → PHP riceve un array con **solo** le spuntate,
es. `$_GET['tab'] = ["3", "7"]`.

### TestTabelline.php – due fasi nello stesso file
```php
if (isset($_GET['ris'])) {
    // FASE 2: sono arrivate le risposte → correggo
} else {
    // FASE 1: arrivo dal form HTML → genero gli esercizi
}
```
**Fase 1 (genera):**
```php
$numEsercizi = $_GET['num'];
$arraySelezione = $_GET['tab'];
echo '<form action="">';                       // action vuota = richiama questo stesso php
for($i = 0; $i < $numEsercizi; $i++){
    $num1 = $arraySelezione[array_rand($arraySelezione)]; // tabellina a caso tra le scelte
    $num2 = rand(1, 10);                                   // fattore a caso
    echo $num1." * ".$num2." = ";
    echo '<input type="number" name="ris[]">';                    // risposta utente
    echo '<input type="hidden" name="numb1[]" value="'.$num1.'">'; // mi ricordo i fattori
    echo '<input type="hidden" name="numb2[]" value="'.$num2.'">';
}
echo '<input type="hidden" name="num" value="'.$numEsercizi.'">';  // e quanti erano
```
- `array_rand($arr)` restituisce una **chiave** a caso dell'array → `$arr[chiave]` è il valore.
- Invece di salvare la soluzione, salva i **due fattori** (`numb1[]`, `numb2[]`) e la
  ricalcola dopo. Anche `num` viene passato hidden perché HTTP non ricorda nulla.

**Fase 2 (corregge):**
```php
for($i = 0; $i < $numEsercizi; $i++){
    printf("\n%2d * %2d = %3d", $numb1[$i], $numb2[$i], $numb1[$i]*$numb2[$i]);
    if(($numb1[$i]*$numb2[$i]) != $ris[$i]) {
        echo '<font color=red>';  echo ' ( Hai risposto: '.$ris[$i].' )';  echo '</font>';
    } else
        echo ' ( Hai risposto: '.$ris[$i].' )';
    if($ris[$i] == ($numb1[$i]*$numb2[$i])) $punteggio += 1;
}
echo 'Punteggio finale: '.(($punteggio/$numEsercizi)*100)."/100";
```
- `%2d` / `%3d` = numero allineato su 2/3 caratteri (si vede bene perché tutto è in `<pre>`).
- Risposta sbagliata → scritta in rosso. Punteggio in centesimi.

---

## 6. TestVeroFalso ⭐ (domande lette da un file di testo)

**Traccia** (`Soluzione1/TestVeroFalso.txt`): file con righe `domanda.vero/falso`; creare il
test e dare il punteggio in centesimi. Facoltativo: correzione, numero di domande scelto,
ordine casuale.

### Soluzione comune (fatta in classe): GetDomande.php + valuta.php + test.txt
**GetDomande.php**
```php
$righe = file('test.txt');          // ogni riga del file → un elemento dell'array
//shuffle($righe);                  // (mescolerebbe le domande)
for($i=0; $i<count($righe);$i++) {
    $parti = explode('.', $righe[$i]);      // "Domanda.FALSO" → ["Domanda", "FALSO\n"]
    echo ($parti[0]);
    echo ("<input type=radio name=scelta[".$i."] value=VERO>VERO");
    echo ("<input type=radio name=scelta[".$i."] value=FALSO>FALSO<br>\n");
}
```
- Radio con lo stesso `name=scelta[$i]` → una sola risposta per domanda.

**valuta.php**
```php
$righe = file('test.txt');
$scelta = $_GET['scelta'];
for($i=0;$i<count($righe);$i++) {
    $parti = explode('.', $righe[$i]);
    if($parti[1] == $scelta[$i]."\n")   // la riga del file finisce con "\n"!
        $punteggio++;
}
echo("Hai preso: ".($punteggio/count($scelta) *100)." punti");
```
- Rilegge il file (la pagina non ricorda nulla) e confronta la risposta con la soluzione.
- `."\n"`: `file()` lascia l'a capo in fondo a ogni riga, quindi `$parti[1]` è `"FALSO\n"`.

**Osservazioni utili (possibili domande):**
1. La riga *"Un chilometro è composto da 10.000 metri.FALSO"* contiene un altro punto:
   `explode('.')` la spezza in 3 pezzi e `$parti[1]` diventa `"000 metri"` → quella domanda
   non viene mai valutata giusta. Rimedio: dividere sull'**ultimo** punto:
   `$pos = strrpos($riga, '.'); $dom = substr($riga, 0, $pos); $ris = trim(substr($riga, $pos+1));`
2. Se il file è salvato su Windows le righe finiscono con `"\r\n"` e il confronto con `"\n"`
   fallisce: più sicuro `trim($parti[1]) == $scelta[$i]`.
3. Si divide per `count($scelta)` (domande a cui hai risposto), non per il totale.
4. Se non rispondi a una domanda, `$scelta[$i]` non esiste → warning "Undefined array key".

### Soluzione1 (versione completa, con le parti facoltative)
**TestDomande.html** → chiede quante domande (`numtest`), metodo POST.

**TestDomande.php**
```php
$quiz = file("TestDomande.txt");
if($numtest > count($quiz)) { echo "Domande insufficienti per il quiz"; return; }
for( $i = 0; $i < count($quiz); $i++ ) {
    $parti = explode(".", $quiz[$i]);
    $domande[$parti[0]] = $parti[1];   // array associativo: domanda => Vero/Falso
}
for($i = 0; $i < $numtest; $i++) {
    $domanda_random = array_rand($domande);   // chiave casuale = una domanda
    $soluzione = $domande[$domanda_random];
    unset($domande[$domanda_random]);         // la tolgo così non esce due volte
    echo ($i + 1).") ".$domanda_random."? \n";
    echo "<input type=radio name=ris[$i] value='Vero' required> VERO  \n";
    echo "<input type=radio name=ris[$i] value='Falso' required> FALSO  \n<br>";
    echo "<input type=hidden name=sol[$i] value=$soluzione>\n";
    echo "<input type='hidden' name='esercizio[$i]' value=\"" . htmlspecialchars($domanda_random) . "\">\n";
}
```
- Usa un **array associativo** domanda → risposta.
- **Ordine casuale senza ripetizioni**: `array_rand` + `unset`.
- `required` sui radio: il browser non invia se non hai risposto.
- `htmlspecialchars` serve perché le domande con l'apostrofo (`L'acqua…`) romperebbero
  l'attributo `value='...'`.
- Passa via hidden sia le soluzioni (`sol[]`) sia il testo delle domande (`esercizio[]`).

**CorrezioneTestDomande.php**
```php
$risposte = $_POST["ris"];  $soluzioni = $_POST["sol"];  $esercizi = $_POST["esercizio"];
for ($i = 0; $i < count($risposte); $i++) {
    if ($risposte[$i] == $soluzioni[$i]) { $corrette++; echo "... CORRETTA"; }
    else echo "... SBAGLIATA, la risposta corretta e' ".$soluzioni[$i];
}
$risultato = round(($corrette / count($soluzioni)) * 100, 2);
echo "Punteggio: ".$risultato."/100";
```
- Le risposte sono messe in `<div class='corretta'>` / `<div class='sbagliata'>` così con
  un CSS si colorano (il prof dice di inserire il proprio CSS nella cartella `css`).
- `round(x, 2)` = due decimali.

---

## 7. SquadreCalcio – simulazione verifica
`partite.txt` contiene la **traccia + 25 partite** nel formato `casa,ospite,golCasa,golOspite`.
Richieste: 1) classifica, 2) squadre con più vittorie in casa/fuori, 3) partite di una
squadra, 4) più gol fatti/subiti, 5) `squadre.html` con le squadre in ordine alfabetico.

Il prof non ha pubblicato una soluzione. In `soluzione-proposta.php` (mia, non del prof)
trovi una soluzione che usa solo cose viste negli esercizi sopra: `file()`, `explode`,
array associativi con il nome della squadra come chiave, `arsort`, `sort`, `max`,
`file_put_contents`. Le righe di testo della traccia vengono saltate automaticamente.
Con i dati veri: Inter prima con 16 punti, poi Napoli e Lazio 10, Milan 9…

---

## 8. CompilerOnLine (compilatore C via web)
**compilatore.html**: `textarea name="codice"` con un programma C, inviato in POST.

**compilatore.php** (il prof lo pubblica come `.php.txt` così non viene eseguito):
```php
file_put_contents("prova.c", $_REQUEST["codice"]);   // salva il codice in un file
system("g++ prova.c -o prova 2> errori.txt");         // compila, errori in errori.txt
system("cat errori.txt");                             // mostra gli errori
system("./prova");                                    // esegue il programma
```
- `file_put_contents` scrive un file sul server.
- `system("comando")` esegue un comando Linux e ne stampa l'output.
- `2> errori.txt` redirige gli errori del compilatore in un file.
- Pericoloso: chiunque potrebbe far eseguire qualsiasi codice al server → per questo
  nella versione `ColoraCodice.html` c'è un campo password.
- `test.c` stampa `<hr>` tra i numeri: l'output del programma C diventa HTML nella pagina!

## 9. system/spazio.php
```php
<pre><?php system("ls -la"); ?></pre>
```
Mostra i file della cartella sul server (come `dir` su Windows). `<pre>` mantiene gli a capo.

## 10. Lezioni/ArrayIntroduzione.php
```php
$a[0] = 1; $a[1] = 2;            // array scalare
$b[0] = 1; $b[] = 2; $b[] = 3;   // [] aggiunge in fondo → indici 1 e 2
$c["uno"] = 1; $c["due"] = 2;    // array associativo
print_r($a); print_r($b); print_r($c);
$s = "Ciao a tutti.Come state?.Spero bene";
$v = explode('.', $s);           // ["Ciao a tutti", "Come state?", "Spero bene"]
```
→ `lezioni/ArrayIntroduzione.php`
