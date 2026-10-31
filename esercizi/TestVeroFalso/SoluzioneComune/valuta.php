<?php
$righe = file('test.txt');
$scelta = $_GET['scelta'];
echo ("<pre>");
//print_r($scelta);

$i=0;
$punteggio=0;
for($i=0;$i<count($righe);$i++)
{
	$parti = explode('.', $righe[$i]);
	if($parti[1] == $scelta[$i]."\n")
		$punteggio++;
	//echo("parti: ".$parti[1]." scelta: ".$scelta[$i]."<br>\n");
	
}

echo("Hai preso: ".($punteggio/count($scelta) *100)." punti");
?>
