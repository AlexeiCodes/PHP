# 05 – Array

In PHP **un array può avere indici numerici o indici stringa** (associativo):
per PHP non c'è differenza, sono la stessa struttura. Le dimensioni sono
**dinamiche**: non serve dire quanto è grande.

## Creare un array
```php
// 1) per assegnazione
$a[0] = 1;
$a[1] = 2;
$b[] = 10;        // [] = "aggiungi in fondo" → indice 0
$b[] = 20;        // → indice 1

// 2) con array()  (oppure con le quadre [ ])
$numeri = array(1, 2, 3, 4, 5);     // echo $numeri[0];  → 1
$numeri = [1, 2, 3, 4, 5];          // stessa cosa

// 3) associativo: chiave => valore
$b = array("uno" => 1, "due" => 2, "tre" => 3);
echo $b["tre"];                     // 3
```
Output di `print_r` (come nella lezione ArrayIntroduzione.php):
```
Array ( [0] => 1 [1] => 2 )
Array ( [uno] => 1 [due] => 2 )
Array ( [0] => Ciao a tutti [1] => Come state? [2] => Spero bene )
```

## Cose che in C non puoi fare
```php
$v[rand(1, 1000)] = "x";  // indici "sparsi" a caso: lecito
$copia = $v;              // copia un array intero con =
$voti["Rossi"] = 7;       // indice stringa
```

## Scorrere un array
```php
for ($i = 0; $i < count($numeri); $i++) echo $numeri[$i];   // solo numerici consecutivi
foreach ($numeri as $n) echo $n;                             // funziona sempre
foreach ($b as $chiave => $valore) echo "$chiave = $valore<br>";
```

## Funzioni principali
| Funzione | Cosa fa |
|---|---|
| `count($a)` | numero di elementi |
| `print_r($a)` | stampa leggibile (debug) |
| `in_array($val, $a)` | true se il **valore** è nell'array |
| `array_key_exists($k, $a)` / `isset($a[$k])` | true se la **chiave** esiste |
| `array_search($val, $a)` | restituisce la chiave del valore |
| `array_push($a, $x)` | aggiunge in fondo (come `$a[] = $x`) |
| `array_sum($a)` | somma dei valori |
| `max($a)` / `min($a)` | massimo / minimo |
| `array_keys($a)` | array delle chiavi |
| `unset($a[$k])` | elimina un elemento |
| `range(1, 10)` | crea `[1,2,...,10]` |
| `shuffle($a)` | mescola |

## Ordinamento (domanda frequente!)
| Funzione | Ordina per | Chiavi |
|---|---|---|
| `sort($a)` | valore crescente | **rinumerate** 0,1,2… (perde le chiavi) |
| `rsort($a)` | valore decrescente | rinumerate |
| `asort($a)` | valore crescente | **mantiene** l'associazione chiave→valore |
| `arsort($a)` | valore decrescente | mantiene (es. **classifica**!) |
| `ksort($a)` | **chiave** crescente | mantiene |
| `krsort($a)` | chiave decrescente | mantiene |

```php
$punti = array("Inter" => 7, "Milan" => 9, "Roma" => 4);
arsort($punti);   // Milan 9, Inter 7, Roma 4  → classifica
ksort($punti);    // Inter, Milan, Roma        → ordine alfabetico
```

## Array a due dimensioni (matrici)
```php
$m[0][0] = 1;
$studenti = array(
    array("nome" => "Luca", "voto" => 7),
    array("nome" => "Anna", "voto" => 9),
);
echo $studenti[1]["nome"];   // Anna
```

## I dati dei form sono array
`$_GET`, `$_POST`, `$_REQUEST`, `$_SERVER` sono array associativi già pronti
(vedi capitolo 08). Per vedere cosa arriva:
```php
echo "<pre>"; print_r($_REQUEST); echo "</pre>";
```

## Da ricordare
- Indici numerici o stringa, dimensione dinamica, `$a[] = x` aggiunge in fondo.
- `count`, `in_array`, `isset($a[$k])`, `foreach`.
- `sort` perde le chiavi, `asort`/`arsort` le mantengono, `ksort` ordina per chiave.
