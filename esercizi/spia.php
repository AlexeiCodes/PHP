<?php

//Indirizzo IP
$ip 		= $_SERVER['REMOTE_ADDR'];
$browser 	= $_SERVER['HTTP_USER_AGENT'];

//Server
$php 		= phpversion();
$sistema	= PHP_OS;
$server 	= $_SERVER['SERVER_SOFTWARE'];
$file 		= $_SERVER['SCRIPT_NAME'];
$metodo 	= $_SERVER['REQUEST_METHOD'];

//Variabili
$get 		= $_GET;
$post 		= $_POST;
$num_get 	= count($get);
$num_post 	= count($post);

//Output
echo "_____SPIA_____<br><br>";

echo "IP visitatore: "	. $ip . 	 "<br>";
echo "Browser: "		. $browser . "<br>";
echo "Tutti i browser moderni si fingono Mozilla, Chrome ecc. Affinche' i siti web piu vecchi (che non conoscono il browser corrente) continuino a funzionare." . "<br><br>";

echo "Versione PHP: " 	. $php 	   . "<br>";
echo "Sistema server alwaysdata: " . $sistema . "<br>";
echo "Software server alwaysdata: " . $server . "<br>";
echo "File richiesto: " . $file . "<br><br>";

echo "Metodo: " 	   . $metodo . "<br>";
echo sprintf("Variabili GET ricevute: %d<br>", $num_get);
echo sprintf("Variabili POST ricevute: %d<br>", $num_post);

echo "<br>--- contenuto GET ---<br>";
echo "<pre>";
print_r($get);
echo "</pre>";

echo "Provare ad aggiungere la seguente stringa dopo l'url: ?cognome=rossi&nome=luca&eta=20" . "<br><br>";

echo "--- contenuto POST ---<br>";
echo "<pre>";
print_r($post);
echo "</pre>";
?>
