<?php
	session_start();
	if(!isset($_SESSION['idUser'])){
		header('location: ../index.php');
	}
?>

<!DOCTYPE html>

	<html lang="pt-BR">
		<head><!--- Cabeçalho do Documento-->
			
			<meta charset="UTF-8">
			<meta name="description" content="Moda Masculina, Roupas Intimas, Camisas">
			<meta name="keywords" content="Lunicar, Vendas">
			<meta name="author" content="José Nilo">
			<meta name="viewport" content="width=device-width">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
			<link href="../CSS/fontawesome-free-5.5.0-web/css/all.css" rel="stylesheet"> <!--load all styles -->
			<link href="../CSS/luniVendasInicio.css" rel="stylesheet"> <!-- Layout Inicial -->
			<link rel="icon" href="../img/Lunicar20.png">
			<link href="https://fonts.googleapis.com/css?family=Alex+Brush|Cinzel|Cookie|Inknut+Antiqua|Josefin+Sans|Josefin+Slab|Libre+Baskerville|Limelight|Lobster|Lobster+Two|Monoton|Pacifico|Pinyon+Script|Shrikhand|Tangerine" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

			<title>Lunicar Vendas - Clientes</title>
			
		</head>
		
		<body> <!--- Corpo do Documento--->
		
			<header> <!--- CABEÇALHO DA PÁGINA -->
				<div name="logo" id="logo"><img src="../img/Lunicar.png"></img></div><!-- LOGO DA PAGINA-->
				<div name="title" id="title" class="title"><H3>Sistema de Vendas</H3></div> <!-- TEXTO QUE DEVE APARECER ENTRE O LOGO E O BOTÃO DE MENU-->
				<div name="btnMenu" id="btnMenu" class="btnMenu"><i class="fas fa-bars fa-2x"></i></div><!--- BOTÃO DE MENU-->
			</header>
			<br>
			
			<div name="menu" class="menu" id="menu" hidden ><!-- DESENVOLVIMENTO DO MENU-->
				<div name="btnClose" class="btnClose" id="btnClose"> <i class="far fa-times-circle fa-3x"></i></div><br>
				<div name="menuLista" class="menuLista" id="menuLista" type="none">
					
					<a href="#"><div class="menuItem"><i class="fas fa-book fa-3x"></i><br>Catálogo</div></a>					
					<a href="#"><div class="menuItem"><i class="fas fa-archive fa-3x"></i><br>Estoque</div></a>				
					<a href="#"><div class="menuItem"><i class="fas fa-shopping-cart fa-3x"></i><br>Vendas</div></a>
					<a href="#"><div class="menuItem"><i class="fas fa-sign-out-alt fa-3x"></i><br>Sair</div></a>
					
				</div>
			</div>
			
			
			
			<content> <!-- CONTEÚDO DA PÁGINA -->