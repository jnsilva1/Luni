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
			<link href="../CSS/fontawesome-free-5.5.0-web/css/all.css" rel="stylesheet"> <!--load all styles -->
			<link href="../CSS/luniVendasInicio.css" rel="stylesheet"> <!-- Layout Inicial -->
			<link rel="icon" href="../img/Lunicar20.png">
			<link href="https://fonts.googleapis.com/css?family=Alex+Brush|Cinzel|Cookie|Inknut+Antiqua|Josefin+Sans|Josefin+Slab|Libre+Baskerville|Limelight|Lobster|Lobster+Two|Monoton|Pacifico|Pinyon+Script|Shrikhand|Tangerine" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<!--<script src="../script/index.js"></script>-->
			<title>Lunicar Vendas - Home </title>
			<script type="text/javascript" src="../script/block.js"></script>
			<script type="text/javascript" src="../script/novaSenha.js"></script>
			
		</head>
		
		<body> <!--- Corpo do Documento--->
		
			<header> <!--- CABEÇALHO DA PÁGINA -->
				<div name="logo" id="logo"><img src="../img/Lunicar.png"></img></div><!-- LOGO DA PAGINA-->
				<div name="title" id="title" class="title"><H3>Sistema de Vendas</H3></div> <!-- TEXTO QUE DEVE APARECER ENTRE O LOGO E O BOTÃO DE MENU-->
				<div name="btnMenu" id="btnMenu" class="btnMenu" hidden><i class="fas fa-bars fa-2x"></i></div><!--- BOTÃO DE MENU-->
			</header>
			<br>
			
			
			
			<content> <!-- CONTEÚDO DA PÁGINA -->
				<div name="controleClientes" id="controleClientes" class="controleClientes form" method="POST">
						<h2>Criação de Nova Senha</h2>
					<form name="cliente" class="cliente" id="cliente">
						<div class="success">Sucesso</div>
						<div class="failed">Falha</div>


						<label name="lblnome" id="lblnome" class="lblnome">Senha:</label><br>
						<input type="password" name="newPass" id="newPass" autocomplete="false"><br><br>

						<label name="lblnome" id="lblnome" class="lblnome">Confirme a Senha:</label><br>
						<input type="password" name="newPassConfirm" id="newPassConfirm" autocomplete="false"><br><br><br>

						<input type="button" id="btnEnviar" name="btnEnviar" value="Confirmar">


						<br><br>
						<br>
					</form>
				</div>
			</content>
			
			<footer> <!-- RODAPÉ DA PÁGINA -->
				&copy Lunicar  
				<?php 
					$data = date('Y');
					
					echo $data;
				?>
				<br><br>
				<a href="tel:+5511983076532"><i class="fab fa-whatsapp fa-2x"></i></a>
				<a href="mailto:atendimento@lunicar.com"><i class="fas fa-mail-bulk fa-2x"></i></a>
			</footer>
			
		
		<body>

		
	</html>

	