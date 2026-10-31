<pre>
<?php
$a[0] = 1; // array scalare
$a[1] = 2;
$b[0] = 1;
$b[] = 2; // $b[1] = 2;
$b[] = 3; // $b[2] = 3;
$c["uno"] = 1; // array associativo
$c["due"] = 2;

print_r($a);
print_r($b);
print_r($c);

$s = "Ciao a tutti.Come state?.Spero bene";
$v = explode('.', $s);
print_r($v);

?>
</pre>
