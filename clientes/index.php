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
				
			<div name="controleClientes" id="controleClientes" class="controleClientes form" method="POST">
				<h2>Cadastro de Cliente</h2>
				<form name="cliente" class="cliente" id="cliente">
					<div class="success">Sucesso</div>
					<div class="failed">Falha</div>
				
					<label name="lblnome" id="lblnome" class="lblnome">Nome: </label><br>
					<input type="text" id="txtNome" name="txtNome" autocomplete="nome, name"><br><br>
					
					<label name="lblCPF" id="lblCPF" class="lblCPF">CPF: </label><br>
					<input type="text" id="txtCPF" name="txtCPF" autocomplete="CPF, cpf" required><br><br>
					
					<label name="lblDtNascimento" id="lblDtNascimento" class="lblDtNascimento" >Data de Nascimento: </label>
					
					<label name="lblGenero" id="lblGenero" class="lblGenero">Sexo: </label><br>
					<input type="date" id="txtDtNascimento" name="txtDtNascimento" min="1920-01-01" max="2004-12-31" autocomplete="birth">		
					
					<select name="genero" id="genero"  form="cliente" autocomplete="sexo">
						<option value="sel" selected>[Selecione]</option>
						<option value="0">Feminino</option>
						<option value="1">Masculino</option>
					</select>
					
					<br><br>
					
					<label name="lblTelefone" id="lblTelefone" class="lblTelefone">Telefone: </label><br>
					<input type="tel" id="txtTelefone" name="txtTelefone" placeholder="(**) x.xxxx-xxxx" autocomplete="tel"><br><br>
					
					<label name="lblEmail" id="lblEmail" class="lblEmail">E-mail: </label><br>
					<input type="email" id="txtEmail" name="txtEmail" placeholder="seuemail@provedor" autocomplete="email"><br><br>

					<label name="lblCEP" id="lblCEP" class="lblCEP">CEP: </label><br>
					<input type="text" id="txtCEP" name="txtCEP" autocomplete="cep, CEP"><br><br>
					
					<label name="lblEndereco" id="lblEndereco" class="lblEndereco">Endereço: </label><br>					
					<input type="text" id="txtEndereco" name="txtEndereco" autocomplete="endereco, address">	<br><br>
					
					
					<label name="lblNumero" id="lblNumero" class="lblNumero">Nº.: </label>
					<label name="lblComplemento" id="lblComplemento" class="lblComplemento">Complemento: </label><br>
					<input type="text" id="txtNumero" name="txtNumero" autocomplete="num, number">
					<input type="text" id="txtComplemento" name="txtComplemento" autocomplete="complemento, else"><br><br>
					
					
					<label name="lblBairro" id="lblBairro" class="lblBairro">Bairro: </label>
					<br>
					
					<input type="text" id="txtBairro" name="txtBairro" autocomplete="neighborhood">
					<br><br>
					
					<label name="lblCidade" id="lblCidade" class="lblCidade">Cidade: </label>
					<label name="lblUf" id="lblUf" class="lblUf">UF: </label><br>
					
					
					<input type="text" id="txtCidade" name="txtCidade" autocomplete="city">				
					<select name="UF" id="UF" form="cliente" caption="Selecione" autocomplete="UF">
						<option value="0" selected>[Selecione]</option>
						<option value="1">AC</option>
						<option value="2">AL</option>
						<option value="3">AM</option>
						<option value="4">AP</option>
						<option value="5">BA</option>
						<option value="6">CE</option>
						<option value="7">DF</option>
						<option value="8">ES</option>
						<option value="9">GO</option>
						<option value="10">MA</option>
						<option value="11">MG</option>
						<option value="12">MS</option>
						<option value="13">MT</option>
						<option value="14">PA</option>
						<option value="15">PB</option>
						<option value="16">PE</option>
						<option value="17">PI</option>
						<option value="18">PR</option>
						<option value="19">RJ</option>
						<option value="20">RN</option>
						<option value="21">RO</option>
						<option value="22">RR</option>
						<option value="23">RS</option>
						<option value="24">SC</option>
						<option value="25">SE</option>
						<option value="26">SP</option>
						<option value="27">TO</option>
					</select>
					
					<br><br><br>
					
					<input type="button" name="btnInserirCliente" id="btnInserirCliente" Action="" value="Inserir"><BR>
					<input type="button" name="btnPesquisarCliente" id="btnPesquisarCliente" Action="" value="Pesquisar"><BR>
					<input type="button" name="btnListarCliente" id="btnListarCliente" Action="" value="Listar"><BR>
					
					<br><br>
				
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

				<script type="text/javascript" src="cliente.js"></script>
				<script type="text/javascript" src="../script/decodesString.js"></script>
				<script type="text/javascript" src="../script/validation.js"></script>
				<script type="text/javascript" src="../script/block.js"></script>
			</footer>
			
		
		<body>
		
	</html>
	



