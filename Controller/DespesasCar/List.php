<?php

	include_once "../../Model/Despesas/DespesasCar.php";
	
	$var = DespesasCar::buscaDespesaStatic();
	$array = array();
	for($i = 0; $i < count($var); $i++){
		
		$array[] = $var[$i]->jsonSerialize();
		
	}
	
	echo json_encode($array);

?>