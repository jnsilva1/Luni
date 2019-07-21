<?php
	
	include_once "../conexao.php";

	session_start();
	$codFuncional = $_SESSION['idUser'];

	$cpf = $_POST['cpf'];
	$nmCliente = $_POST['nmCliente'];
	$genero = $_POST['genero'];
	$dtNascimento = $_POST['dtNascimento'];
	$telCliente = $_POST['telCliente'];
	$emailCliente = $_POST['emailCliente'];
	$cep = $_POST['cep'];
	$numResidencia = $_POST['numResidencia'];
	$complemento = $_POST['complemento'];


	$logradouro = $_POST['logradouro'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];

	//verifica se cadastro já existe

	$verificaCadastro = $PDO->prepare("SELECT * FROM cliente WHERE cpf = ?");
	$verificaCadastro->execute(array($cpf));

	$verCad = $verificaCadastro->rowCount();

	if($verCad > 0){

		$msg = 2;
	}else{

		$cliente = $PDO->prepare("INSERT INTO cliente (codCliente, cpf, nmCliente, genero, dtNascimento, telCliente, emailCliente, cep, numResidencia, complemento, codFuncional) VALUES (NULL, ?, ?, ?, ?, ?,?, ?, ?,?, ?)");
		$cliente->bindParam(1,$cpf);
		$cliente->bindParam(2,$nmCliente);
		$cliente->bindParam(3,$genero);
		$cliente->bindParam(4,$dtNascimento);
		$cliente->bindParam(5,$telCliente);
		$cliente->bindParam(6,$emailCliente);
		$cliente->bindParam(7,$cep);
		$cliente->bindParam(8,$numResidencia);
		$cliente->bindParam(9,$complemento);
		$cliente->bindParam(10,$codFuncional);
		$cliente->execute();

		$msg = 1;

	}


	

	echo $msg;
	


?>