<?php
    echo '<link rel="stylesheet" href="css/index.css">';
	// inserire il proprio csss nella cartella css
    echo "\n";
    $risposte = $_POST["ris"];
    $soluzioni = $_POST["sol"];
    $esercizi = $_POST["esercizio"];
    $corrette = 0;
    echo "<div class='risposta'>";
    for ($i = 0; $i < count($risposte); $i++)
    {
        if ($risposte[$i] == $soluzioni[$i])
        {
            $corrette++;
            echo "<div class='corretta'>";
            echo ($i + 1). ") ".$esercizi[$i]." : ". "($risposte[$i])". " CORRETTA"."\n<br>";
            echo "</div>";
        }
        else 
        {
            echo "<div class='sbagliata'>";
            echo ($i + 1). ") ".$esercizi[$i]. ": ". "($risposte[$i])". " SBAGLIATA, la risposta corretta e' ".$soluzioni[$i]."\n<br>";
            echo "</div>";
        }
    }
    $risultato = ($corrette / count($soluzioni)) * 100;
	$risultato = round($risultato, 2);
    echo "<div class='punteggio'>";
    echo "Punteggio: ".$risultato."/"."100";
    echo "</div>";
    echo "</div>";
?>
