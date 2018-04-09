<?php
/**
 * I funkcija min_kupiuriu_sk nusiunciama pinigu suma
 * ir grazinamas masyvas kuriame nurodytos kupiuros, kad butu minimalus kupiuru skaicius
 */
function min_kupiuriu_sk($pinigu_sk){
	$kupiuros = array(500, 100, 50, 20, 10, 5, 1); //galimos kupiuros
	$kupiuru_masyvas = array(); //kuiuru masyvas i kuri dedamos kupiuros
	$suma = 0;
	$i=0;
	$k_elementai =$kupiuros['0'];//kupiuru masyvo elementai

	/**
	* Vykdo cikla kol kupiuru bendra suma nelygi duotai keitimui pinigu sumai
	*/
	while ($suma != $pinigu_sk){
		$suma = $suma +$k_elementai;
		if($suma > $pinigu_sk) {
			$suma = $suma - $k_elementai;
			$i++;
			$k_elementai = $kupiuros[$i];
			continue;
		}
		$kupiuru_masyvas[] = $k_elementai;
	}
	return $kupiuru_masyvas;
}

/**
 * Testavimas
*/
$sk=135; //paduodama pinigu suma
testavimas($sk); //pinigu suma siunciama i testavimo funkcija

/**
 * Testavimo funkcija
*/
function testavimas($sk){
	$testo_nr = 1;//testo numeris
	
	/**
	* Vykdo cikla kol siunciama keitimui suma ne mazesne uz 0
	*/
	while($sk > 0){
		$kupiuru_masyvas = min_kupiuriu_sk($sk);//keitimo pinigu suma siunciama i funkcija min_kupiuriu_sk
		
		//atvaizdavimas
		echo 'Testo numeris: '.$testo_nr.' Duota pinigu suma keitimui: '. $sk.' Grazintas masyvas: 	';
		print_r($kupiuru_masyvas);
		echo '</br></br>';
		
		$testo_nr++;//testo numerio pliusinimas
		$sk= $sk-10;//paduodama pinigu suma sumazinama
	}
}


?>