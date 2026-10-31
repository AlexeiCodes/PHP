# 03 – Operatori

## Aritmetici
| Op | Significato | Esempio | Risultato |
|---|---|---|---|
| `+` | somma | `7 + 2` | 9 |
| `-` | sottrazione | `7 - 2` | 5 |
| `*` | prodotto | `7 * 2` | 14 |
| `/` | divisione | `7 / 2` | **3.5** (non 3 come in C!) |
| `%` | resto (modulo) | `7 % 2` | 1 |
| `**` | potenza | `2 ** 3` | 8 (oppure `pow(2,3)`) |

Divisione intera: `intdiv(7, 2)` → 3.  Pari/dispari: `if ($n % 2 == 0)`.

## Assegnazione combinata
```php
$a = 3;  $a += 2;   // 5
$a -= 5;            // 0
$c = 3;  $c *= 3;   // 9
$s = "Ciao"; $s .= " a tutti";  // "Ciao a tutti"
```

## Incremento / decremento
- `$a++` (post): **prima usa** il valore, poi incrementa.
- `++$a` (pre): **prima incrementa**, poi usa.
```php
$a = 3;
$b = pow($a++, 2);  // usa 3 → $b = 9, poi $a = 4
$c = pow(++$a, 2);  // $a diventa 5 → $c = 25
```

## Confronto
| Op | Significato |
|---|---|
| `==` | uguale **dopo conversione** (`"5" == 5` → true) |
| `===` | **identico**: stesso valore E stesso tipo (`"5" === 5` → false) |
| `!=` / `<>` | diverso |
| `!==` | non identico |
| `<` `>` `<=` `>=` | minore, maggiore… |

> Domanda tipica da verifica: differenza tra `==` e `===`.

## Logici
| Op | Significato |
|---|---|
| `&&` (o `and`) | AND – veri entrambi |
| `\|\|` (o `or`) | OR – almeno uno vero |
| `!` | NOT |

```php
if ($voto >= 6 && $voto <= 10) echo "sufficiente";
```

## Stringhe: concatenazione con il punto `.`
```php
$nome = "Luca";
echo "Ciao " . $nome . "!";   // Ciao Luca!
echo "Ciao $nome!";           // con i doppi apici la variabile viene sostituita
echo 'Ciao $nome!';           // con apici singoli NO: stampa letteralmente $nome
```

## Da ricordare
- `/` dà risultato decimale; `%` è il resto.
- `==` confronta il valore, `===` anche il tipo.
- In PHP le stringhe si uniscono con **`.`**, non con `+`.
