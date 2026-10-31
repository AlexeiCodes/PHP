# 02 – Variabili, tipi e conversioni

## Variabili
- Iniziano sempre con **`$`**: `$nome`, `$eta`, `$somma`.
- **Non si dichiarano** (a differenza del C): si assegnano e basta.
- Il **tipo lo decide PHP** in base al valore (tipizzazione dinamica) e può cambiare.
- Sono **case sensitive**: `$Nome` e `$nome` sono diverse.

```php
$nome = "Luca";   // string
$eta  = 17;       // integer
$media = 7.5;     // double/float
$promosso = true; // boolean
$voti = array(6, 7, 8); // array
```

## Tipi principali
| Tipo PHP | Italiano | Esempio |
|---|---|---|
| `integer` | intero | `5`, `-12` |
| `double` / `float` | numero con virgola | `3.14` |
| `string` | stringa / testo | `"ciao"` |
| `boolean` | vero/falso | `true`, `false` |
| `array` | vettore | `array(1,2,3)` |
| `NULL` | nessun valore | `null` |

## Il tipo cambia da solo
Esempio della lezione:
```php
$var = "0";          // stringa "0"
$var++;              // stringa numerica incrementata → "1"
$var += 1;           // ora è intero 2
$var = $var + 1.3;   // ora è float 3.3
echo $var;           // 3.3
settype($var, "integer");
echo $var;           // 3  (la parte decimale viene tagliata)
```

## Sapere il tipo: `gettype()`
```php
$a = 10;
echo gettype($a);    // integer
echo gettype(2.5);   // double
echo gettype("ok");  // string
```
Esercizio del prof (gettype.php): tradurre il tipo in italiano con un array associativo:
```php
$tipi = array("integer" => "intero", "double" => "numero double",
              "string" => "stringa", "boolean" => "booleano",
              "array" => "vettore");
$x = 3.7;
echo "La variabile è di tipo " . $tipi[gettype($x)];  // numero double
```
→ codice originale del prof in `esercizi/gettype.php`

## Convertire il tipo
**1) `settype($var, "tipo")`** – modifica direttamente la variabile:
```php
$n = "42";
settype($n, "integer");   // ora $n è l'intero 42
```
**2) Cast `(tipo)`** – crea un valore convertito, la variabile originale non cambia:
```php
$a = 10;
$b = (double) $a;   // 10.0  → gettype($b) = double
$c = (string) 1;    // "1"
$d = (int) "15abc"; // 15
$e = (int) 7.9;     // 7  (tronca, non arrotonda)
```
Cast possibili: `(int)` `(integer)` `(float)` `(double)` `(string)` `(bool)` `(array)`

## Funzioni utili
```php
is_numeric("12")   // true  → utile per controllare l'input di un form
is_int(5)          // true
is_string("a")     // true
isset($x)          // true se $x esiste e non è null
empty($x)          // true se $x è vuota ("" , 0, "0", null, array vuoto)
intval("12")       // 12
round(3.456, 2)    // 3.46
```

## Da ricordare
- `$` davanti, niente dichiarazione, tipo dinamico.
- `gettype()` per vedere il tipo, `settype()` o `(cast)` per cambiarlo.
- I dati che arrivano da un form sono **sempre stringhe**: converti con `(int)` se servono numeri.
