# 06 – Stringhe

- Tra **doppi apici** `"..."` le variabili vengono sostituite: `"Ciao $nome"`.
- Tra **apici singoli** `'...'` no: il testo resta così com'è.
- Unione con il punto: `$a . $b`.
- Accesso a un carattere: `$s[0]` (primo carattere). Le posizioni partono da **0**.

## Funzioni principali (con gli esempi della lezione)
| Funzione | Esempio | Risultato |
|---|---|---|
| `strlen` | `strlen('abcd')` | `4` |
| `strtolower` | `strtolower('IERI')` | `ieri` |
| `strtoupper` | `strtoupper('ciao')` | `CIAO` |
| `ucfirst` | `ucfirst('buongiorno')` | `Buongiorno` |
| `ucwords` | `ucwords('buongiorno a tutti')` | `Buongiorno A Tutti` |
| `trim` | `trim('  Buongiorno  ')` | `Buongiorno` (toglie spazi/a capo ai lati) |
| `substr` | `substr('Buongiorno a tutti', 4)` | `giorno a tutti` |
| `substr` | `substr('Buongiorno a tutti', 4, 6)` | `giorno` (6 caratteri dalla pos. 4) |
| `substr` | `substr('Buongiorno a tutti', -4)` | `utti` (ultimi 4) |
| `substr` | `substr('Buongiorno a tutti', 4, -2)` | `giorno a tut` |
| `str_replace` | `str_replace('Buongiorno','Ciao','Buongiorno a tutti')` | `Ciao a tutti` |
| `str_ireplace` | come sopra ma **ignora maiuscole/minuscole** | |
| `strpos` | `strpos('Domani è domenica','m')` | `2` (prima posizione, `false` se non c'è) |
| `strstr` | `strstr('Domani è domenica','m')` | `mani è domenica` |
| `strcmp` | `strcmp('a','b')` | `<0` (confronto alfabetico, come in C) |
| `str_repeat` | `str_repeat('-', 5)` | `-----` |
| `strrev` | `strrev('ciao')` | `oaic` |
| `sprintf`/`printf` | `printf("%.2f", 3.14159)` | `3.14` |
| `number_format` | `number_format(1234.5, 2, ',', '.')` | `1.234,50` |

> ⚠️ `strpos` può restituire `0` (trovato all'inizio): controlla con `!== false`
> ```php
> if (strpos($frase, "ciao") !== false) echo "trovato";
> ```

## explode e implode (fondamentali per i file di testo!)
```php
$riga = "Inter,Milan,2,1";
$campi = explode(",", $riga);      // ["Inter","Milan","2","1"]
echo $campi[0];                    // Inter

explode(",", "A,B,C", 2);          // ["A", "B,C"]  (massimo 2 pezzi)

$parti = array("lastname", "email", "phone");
echo implode(",", $parti);         // lastname,email,phone
```
- `explode("\n", $testo)` divide per righe (serve `"\n"` con i **doppi** apici).

## Da ricordare
- Posizioni da 0; `strlen` lunghezza; `substr(s, inizio, lunghezza)`.
- `explode` stringa → array, `implode` array → stringa.
- `strpos` restituisce `false` se non trova: confronta con `!== false`.
