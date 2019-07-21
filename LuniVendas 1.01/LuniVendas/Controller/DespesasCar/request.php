<?php

    session_start();
	include_once "../../Model/Despesas/DespesasCar.php";

	$despesa = new DespesasCar(
		0,
		date('Y-m-d H:i:s'),
		$_POST['km'],
		$_POST['abastecido'],
		$_POST['combustivel'],
		$_SESSION['idUser']		
	);
	
	$despesa->Save();
	$saved = $despesa->buscaDespesa();
	
	$json = json_encode($saved->jsonSerialize());
	
	echo $json;

?>