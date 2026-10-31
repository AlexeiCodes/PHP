<?php
echo "<h2>Dati ricevuti con " . $_SERVER["REQUEST_METHOD"] . "</h2>";
echo "<pre>"; print_r($_REQUEST); echo "</pre>";

$nome = isset($_REQUEST["nome"]) ? htmlspecialchars($_REQUEST["nome"]) : "anonimo";
echo "Ciao <b>$nome</b><br>";

if (isset($_REQUEST["hobby"]))     // array perché name="hobby[]"
    echo "I tuoi hobby: " . implode(", ", $_REQUEST["hobby"]) . "<br>";
else
    echo "Nessun hobby selezionato<br>";

// la checkbox non spuntata NON arriva: si controlla con isset
echo isset($_REQUEST["privacy"]) ? "Privacy accettata<br>" : "Privacy NON accettata<br>";
echo "Azione (campo hidden): " . ($_REQUEST["azione"] ?? "-") . "<br>";
?>
<a href="form-demo.html">Torna al form</a>
