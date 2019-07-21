<?php

include_once('../conexao.php');
include_once('../primeiroAcesso/crypt.php');

		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];
		$senha = md5($senha);

		$login = $PDO->prepare("SELECT * FROM funcionario WHERE usuario = ?");
		$login->execute(array($usuario));
		
		$log = $login->fetchAll(PDO::FETCH_ASSOC);

		$linhasLogin = $login->rowCount();

		if($linhasLogin > 0){
			foreach ($log as $loged) {
				$senhaDB = $loged['senha'];
			}

			if ($senha == $senhaDB) {

				session_start();
				$_SESSION['idUser'] = $loged['codFuncional'];
				$_SESSION['nmFuncional'] = $loged['nome'];
				$_SESSION['logged'] = 1;
				$_SESSION['acesso'] = $loged['firstAccess'];

				if($_SESSION['acesso'] == 0){
					$msg = 3;
				}else{
					$msg = 1;
				}

				

			}else{
				$msg = 2;
			}


		}else{
			$msg = 0;
		}

		

		echo $msg;

?>