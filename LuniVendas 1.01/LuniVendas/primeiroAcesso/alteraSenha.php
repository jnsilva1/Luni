<?php
	include_once "crypt.php";
	include_once "../conexao.php";


	session_start();
	if(!isset($_SESSION['idUser'])){
		header('location: ../index.php');
	}

	$novasenha = $_POST['newPass'];
	$novasenha = passCrypt($novasenha);
	$acesso = 1;

	$alterSenha = $PDO->prepare("UPDATE funcionario SET senha = ?, firstAccess = ? WHERE codFuncional = ?");
	$alterSenha->bindParam(1,$novasenha);
	$alterSenha->bindParam(2,$acesso);
	$alterSenha->bindParam(3,$_SESSION['idUser']);
	$alterSenha->execute();

	$msg = 1;


	echo $msg;
	

?>