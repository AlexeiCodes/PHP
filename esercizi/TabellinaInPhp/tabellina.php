<?php
$tab = $_GET["tab"];
printf("<table border=1>");
printf("<th colspan=5>TABELLINA DEL $tab</th>");
for($i = 0; $i<=10; $i++)
{
    printf("<tr><td>%d</td> <td>x</td> <td>%d</td> <td>=</td> <td>%d</td></tr>\n",
	$tab, $i, $tab * $i); 
}
printf("</table>");
?>
