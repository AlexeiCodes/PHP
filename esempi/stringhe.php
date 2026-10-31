<?php
echo "<pre>";
$s = "Buongiorno a tutti";
echo strlen('abcd') . "\n";                 // 4
echo strtoupper('ciao') . "\n";             // CIAO
echo strtolower('IERI') . "\n";             // ieri
echo "[" . trim('  Buongiorno  ') . "]\n";  // [Buongiorno]
echo substr($s, 4) . "\n";                  // giorno a tutti
echo substr($s, 4, 6) . "\n";               // giorno
echo substr($s, -4) . "\n";                 // utti
echo substr($s, 4, -2) . "\n";              // giorno a tut
echo str_replace('Buongiorno', 'Ciao', $s) . "\n";   // Ciao a tutti
echo str_ireplace('dom', 'x', 'Domani è domenica') . "\n";
echo strpos('Domani è domenica', 'm') . "\n";        // 2
echo strstr('Domani è domenica', 'm') . "\n";        // mani è domenica
echo ucfirst('buongiorno') . "\n";
echo ucwords('buongiorno a tutti') . "\n";
print_r(explode(',', 'A,B,C'));
print_r(explode(',', 'A,B,C', 2));
echo implode(",", array("lastname", "email", "phone")) . "\n";
$nome = "Luca";
echo "Doppi apici: Ciao $nome\n";
echo 'Singoli apici: Ciao $nome' . "\n";
printf("Pi greco: %.2f\n", M_PI);
echo "</pre>";
?>
