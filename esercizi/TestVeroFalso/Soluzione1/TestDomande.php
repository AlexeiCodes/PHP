<?php
    $numtest = $_POST["numtest"];
    echo '<link rel="stylesheet" href="..\index.css">';
    $quiz = file("TestDomande.txt");  //Ricava le righe del file e le mette nell'array $quiz
    if($numtest > count($quiz))
    {
        echo "Domande insufficienti per il quiz";
        return;
    }
    $domande = array();
    for( $i = 0; $i < count($quiz); $i++ )
    {
        $parti = explode(".", $quiz[$i]);  //Mette in $parti[9] la domanda, e nel $parti[1] vero o falso
		$dom = $parti[0]; //domanda		
		$ris = $parti[1]; //risposta
        $domande[$dom] = $ris;   //Associa a ogni domanda la soluzione
    }
    echo "<form action='CorrezioneTestDomande.php' method='post'>\n";
    echo "<pre>";
    for($i = 0; $i < $numtest; $i++)
    {
        $domanda_random = array_rand($domande);  //Prende una domanda a caso dall'array domande
        $soluzione = $domande[$domanda_random];  //Ricava la soluzione di quella domanda
        unset($domande[$domanda_random]);        //Rimuove la domanda dall'array affinché non venga ripescata di nuovo   
        $esercizio = ($i + 1).") ".$domanda_random."? \n";
        echo $esercizio;

        echo "<input type=radio name=ris[$i] value='Vero' required> VERO  \n";
        echo "<input type=radio name=ris[$i] value='Falso' required> FALSO  \n<br>";
        echo "<input type=hidden name=sol[$i] value=$soluzione>\n";
        echo "<input type='hidden' name='esercizio[$i]' value=\"" . htmlspecialchars($domanda_random) . "\">\n"; //Andava in conflitto l'apostrofo quindi ho chiesto a chatgpt come sistemare
    }
    echo "<input type=submit value='Invia'>";
    echo "</form>";
    echo "</pre>";
?>
