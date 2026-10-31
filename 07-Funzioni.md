# 07 – Funzioni

## Definire e chiamare
```php
function somma($a, $b) {
    return $a + $b;
}
echo somma(3, 4);   // 7
```
- Parola chiave `function`, poi nome e parametri tra parentesi.
- Niente tipo di ritorno obbligatorio (a differenza del C).
- **Non puoi usare il nome di una funzione già esistente in PHP** (es. `max`,
  `count`): darebbe errore "Cannot redeclare". Nella lezione c'è l'esempio
  `function max(...)`: per provarlo rinominala, es. `massimo`.

```php
function massimo($a, $b) {
    if ($a > $b) $b = $a;
    return $b;
}
```

## Parametri con valore di default
```php
function saluta($nome = "studente") {
    return "Ciao $nome";
}
echo saluta();        // Ciao studente
echo saluta("Anna");  // Ciao Anna
```

## Passaggio per valore vs per riferimento
- **Per valore** (normale): la funzione lavora su una **copia**, l'originale non cambia.
- **Per riferimento** con **`&`**: la funzione modifica **la variabile originale**.

```php
function aggiungi_qualcosa(&$stringa) {
    $stringa .= " e qualche altra cosa.";
}
$s = "Testo";
aggiungi_qualcosa($s);
echo $s;   // Testo e qualche altra cosa.
```
Nella lezione delle carte: `riempimazzo(&$mazzo)` riempie l'array per riferimento,
mentre `vedimazzo($mazzo)` lo riceve per valore perché deve solo stamparlo.

## Visibilità (scope) e `global`
Una variabile creata **fuori** da una funzione **non si vede dentro** la funzione.
```php
$variabile = "pippo";
function prova() {
    global $variabile;   // senza questa riga $variabile sarebbe indefinita
    echo $variabile;
}
prova();   // pippo
```
Meglio comunque passare i valori come parametri invece di usare `global`.

## Funzioni predefinite utili
- Numeri: `rand(min,max)`, `pow`, `sqrt`, `abs`, `round`, `floor`, `ceil`, `max`, `min`
- Date: `date("d/m/Y H:i")`, `time()`
- Varie: `isset`, `empty`, `is_numeric`, `count`, `strlen`

## Da ricordare
- `function nome($p) { return ...; }`
- `&` davanti al parametro = modifica l'originale.
- Variabili esterne invisibili nella funzione, salvo `global`.
