<?php
$Xpixel=145; // separazione pixel in orizzontale fra una tabellina e l'altra
$Ypixel=128; // separazione pixel in verticale fra le tabelline da 1 a 5 e da 6 a 10
$x = $_GET["tab_x"];   // (x,y) coordinate ricevute del click del mouse su immagine
$y = $_GET["tab_y"];

$tab=$x/$Xpixel +1;  // Calcolo tabellina
settype($tab,"integer"); // Che serve? Prova a toglierlo
if ($y > $Ypixel) $tab+=5; // passo alla riga sotto se y > Ypixel

// Vecchio codice tabellana invariato qui sotto
printf("<table border=1>");

printf("<th colspan=5>TABELLINA DEL $tab</th>\n");
for($i = 0; $i<=10; $i++)
{
    printf("<tr><td>%d</td> <td>x</td> <td>%d</td> <td>=</td> <td>%d</td></tr>\n",
	$tab, $i, $tab * $i); 
}
printf("</table>");
?>
