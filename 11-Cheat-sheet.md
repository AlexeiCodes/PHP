# 11 – Cheat sheet PHP (ripasso veloce)

```php
<?php  ...  ?>                 // blocco PHP, ; a fine istruzione
echo "testo<br>";              // stampa
// commento   /* commento */

$x = 5;  $s = "ciao";  $f = 2.5;  $b = true;   // niente dichiarazioni
gettype($x)   settype($x,"string")   (int)$s   is_numeric($s)

.  concatena     "Ciao $nome" sostituisce     'Ciao $nome' no
+ - * / %        ==  (valore)  ===  (valore+tipo)   && || !
$a++ (usa poi incrementa)    ++$a (incrementa poi usa)

if (...) { } elseif (...) { } else { }
for ($i=0; $i<10; $i++) { }
while (...) { }      do { } while (...);
foreach ($arr as $v) { }     foreach ($arr as $k => $v) { }

$a = array(1,2,3);   $a[] = 4;   $a = [1,2,3];
$m = array("uno"=>1, "due"=>2);   $m["tre"] = 3;
count  print_r  in_array  isset($a[$k])  array_key_exists  array_sum  max  min
sort/rsort (perde chiavi)  asort/arsort (tiene chiavi)  ksort (per chiave)

strlen  strtoupper  strtolower  ucfirst  ucwords  trim
substr($s, inizio, lung)  strpos (!== false)  str_replace  strstr
explode(",", $s) → array        implode(",", $arr) → stringa

function f($a, $b = 0) { return $a + $b; }
function g(&$x) { $x++; }      // per riferimento
global $var;                   // vedere una variabile esterna

<form action="pagina.php" method="get|post">
  <input type="text" name="nome">      → $_REQUEST["nome"]
  <input type="checkbox" name="t[]">   → $_REQUEST["t"] è un array
  <input type="hidden" name="sol" value="30">
  <input type="submit">
</form>
isset($_REQUEST["nome"])    $_GET   $_POST   $_SERVER["REMOTE_ADDR"]
htmlspecialchars($input)    // prima di stampare dati dell'utente

file("f.txt", FILE_IGNORE_NEW_LINES)   file_get_contents   file_put_contents
fopen("f.txt","r|w|a")  fgets  fwrite  feof  fclose

rand(1,10)   round($x,2)   pow(2,3)   date("d/m/Y")
```

## Domande tipiche
- **Dove viene eseguito PHP?** Sul server; il browser riceve solo HTML.
- **GET vs POST?** GET mette i dati nell'URL, POST nel corpo della richiesta.
- **`==` vs `===`?** `===` controlla anche il tipo.
- **Come arrivano i dati di un form?** Negli array `$_GET` / `$_POST` / `$_REQUEST`, con chiave = `name`.
- **Checkbox non spuntata?** Non viene inviata → `isset`.
- **A cosa servono i campi hidden?** Passare dati tra pagine (HTTP non ricorda nulla), ma sono visibili nel sorgente.
- **`sort` vs `asort`?** `sort` rinumera le chiavi, `asort` le mantiene.
- **Passaggio per riferimento?** `&` davanti al parametro: la funzione modifica l'originale.
