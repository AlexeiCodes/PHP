 <pre>
 <?php
    if (isset($_GET['ris'])) {
        $numEsercizi = $_GET['num'];
        $numb1 = $_GET['numb1'];
        $numb2 = $_GET['numb2'];
        $ris = $_GET['ris'];
	    $punteggio = 0;

        for($i = 0; $i < $numEsercizi; $i++){
            //echo $numb1[$i]." * ".$numb2[$i]." = ".($numb1[$i]*$numb2[$i]);
			printf("\n%2d * %2d = %3d", $numb1[$i], $numb2[$i], $numb1[$i]*$numb2[$i]);
			if(($numb1[$i]*$numb2[$i]) != $ris[$i]){
				echo '<font color=red>';
				echo ' ( Hai risposto: '.$ris[$i].' )';
				echo '</font>';
			}
			else {
				echo ' ( Hai risposto: '.$ris[$i].' )';
			}
            echo '<br>';
	    if($ris[$i] == ($numb1[$i]*$numb2[$i])){
		    $punteggio += 1;
	    }
        }
	echo '<br>';
	echo 'Punteggio finale: '.(($punteggio/$numEsercizi)*100)."/100";
    } else {
        $numEsercizi = $_GET['num'];
        $arraySelezione = $_GET['tab'];

        echo '<form action="">'; // richiama il php corrente
        for($i = 0; $i < $numEsercizi; $i++){
            $num1 = $arraySelezione[array_rand($arraySelezione)];
            $num2 = rand(1, 10);

            echo $num1." * ".$num2." = ";
            echo '<input type="number" name="ris[]">';
            echo '<input type="hidden" name="numb1[]" value="'.$num1.'">';
            echo '<input type="hidden" name="numb2[]" value="'.$num2.'">';
            echo '<br>';
        }

        echo '<input type="hidden" name="num" value="'.$numEsercizi.'">';
        echo '<button>Calcola</button>';
        echo '</form>';
    }
?>
</pre>
