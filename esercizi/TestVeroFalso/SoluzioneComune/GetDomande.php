<form action="valuta.php" method="GET">


<?php
$righe = file('test.txt'); //carica nel vettore righe tutto il file, linea per linea

//shuffle($righe); //mischia il vettore righe

$i = 0;
for($i=0; $i<count($righe);$i++)
{
	$parti = explode('.', $righe[$i]);
	echo ($parti[0]);
	echo ("<input type=radio name=scelta[".$i."] value=VERO>VERO");
	echo ("<input type=radio name=scelta[".$i."] value=FALSO>FALSO<br>\n");
}
?>

<input type="submit" value="invio">
