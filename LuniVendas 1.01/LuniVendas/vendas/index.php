<?php
	session_start();
	if(!isset($_SESSION['idUser'])){
		header('location: ../index.php');
	}
	
?>

<!DOCTYPE html>

	<html lang="pt-BR">
		<head><!--- Cabeçalho do Documento-->
			
			<meta charset="ISO-8859">
			<meta name="description" content="Moda Masculina, Roupas Intimas, Camisas">
			<meta name="keywords" content="Lunicar, Vendas">
			<meta name="author" content="José Nilo">
			<meta name="viewport" content="width=device-width">
			<link href="../CSS/fontawesome-free-5.5.0-web/css/all.css" rel="stylesheet"> <!--load all styles -->
			<link href="../CSS/luniVendasInicio.css" rel="stylesheet"> <!-- Layout Inicial -->
			<link rel="icon" href="../img/Lunicar20.png">
			<link href="https://fonts.googleapis.com/css?family=Alex+Brush|Cinzel|Cookie|Inknut+Antiqua|Josefin+Sans|Josefin+Slab|Libre+Baskerville|Limelight|Lobster|Lobster+Two|Monoton|Pacifico|Pinyon+Script|Shrikhand|Tangerine" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="../script/vendas1.js"></script>
			<script src="../script/decodesString.js"></script>
			<title>Lunicar Vendas - Controle de Vendas</title>
			
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
					<a href="#"><div class="menuItem"><i class="fas fa-address-card fa-3x"></i><br>Clientes</div></a>
					<a href="#"><div class="menuItem"><i class="fas fa-archive fa-3x"></i><br>Estoque</div></a>	
					<a href="#"><div class="menuItem"><i class="fas fa-sign-out-alt fa-3x"></i><br>Sair</div></a>
					
				</div>
			</div>
			
			
			
			<content> <!-- CONTEÚDO DA PÁGINA -->
			
				<h2 id="TitleVendas">Controle de Vendas</h2>
				
				<!-- BOTÕES DE ACESSO PARA OS FORMULÁRIOS DE VENDAS -->
				<div name="menuVendas" id="menuVendas" class="menuVendas" >
					<button class="btnMenuVendas" id="btnRegVenda">Registrar Venda</button> 
					<button class="btnMenuVendas" id="btnConsVenda">Consultar Venda</button>
					<button class="btnMenuVendas" id="btnListVendas">Listar Vendas</button>
				</div>
				
				<!-- FORMULÁRIO PARA REGISTRAR VENDAS  -->
				<div name="RegistrarVendas" id="RegistrarVendas" class="RegistrarVendas" hidden>
					
					<br><br><input type="button" name="btnFecharRegistroVendas" class="btnFecharRegistroVendas" id="btnFecharRegistroVendas" value="Fechar">
					<form name="frmVenda" class="frmVenda" id="frmVenda" method="GET" action="index.php">
						<h3 id="titleFrmVendas">Registrar Venda</h3>
				
						<label name="lblCodVenda" id="lblCodVenda" class="lblCodVenda">Cod. Venda: </label>
						<label name="lblValorTotal" id="lblValorTotal" class="lblValorTotal">Valor Total: </label><br>
						
						<input type="text" id="txtCodVenda" class="txtCodVenda" name="txtCodVenda" readOnly>
						<input type="text" id="txtValorTotal" name="txtValorTotal" value="R$ 255,55" readOnly><br><br>


						<div name="produtosArea" class="produtosArea" id="produtosArea">
						
							<label name="lblCodProduto" id="lblCodProduto" class="lblCodProduto">Cód. Produto: </label>
							<label name="lblValorProduto" id="lblValorProduto" class="lblValorProduto">Valor: </label>
							<label name="lblQtProduto" id="lblQtProduto" class="lblQtProdutoProduto">Qtd.: </label><br>
							
							<input type="text" id="txtCodProduto1" name="txtCodProduto1" class="txtCodProduto">
							<input type="text" id="txtValorProduto1" name="txtValorProduto1" class="txtValorProduto" value="R$ 255,55" readOnly>
							<select form="frmVenda" id="txtQtProduto1" name="txtQtProduto1" class="txtQtProduto">
								<option value="1" selected>1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select><br><br>
							
							
							<label name="lblNmProduto" id="lblNmProduto" class="lblNmProduto">Item: </label><br>
							<input type="text" id="txtNmProduto1" name="txtNmProduto1" class="txtNmProduto"><br><br>

						</div>

						<input type="button" name="btnAddItem" class="btnAddItem" id="btnAddItem" value="+ Adicionar Item">
						<br>
						
												
						<label name="lblCPFV" id="lblCPFV" class="lblCPFV">CPF: </label>
						<label name="lblMtPagamento" id="lblMtPagamento" class="lblMtPagamento">Forma de Pagamento:</label><br>
						
						<input type="text" id="txtCPFV" name="txtCPFV">						
						<select form="frmVenda" id="txtMtPagamento" name="txtMtPagamento" >
							<option value="0" selected>[Selecione]</option>
							<option value="1">Dinheiro</option>
							<option value="2">Fiado</option>
						</select><br><br>
						
						<div name="pgFiado" class="pgFiado" id="pgFiado">
						<label name="lblDtPagamento" id="lblDtPagamento" class="lblDtPagamento" >Previsão de Pagamento: </label><br>
						<input type="text" id="txtDtPagamento" name="txtDtPagamento" value="<?php
							$hoje = date('d-m-Y');
							echo date('d/m/Y', strtotime('+30 days', strtotime($hoje)));
						?>" disabled ><br><br></div>
						
						<br><input type="submit" id="btnRegistrarVenda" value="Concluir"><br><br>
				
					</form>
				
				</div>
				
				
				<!-- FORMULÁRIO DE CONSULTA DE VENDA-->
				<div name="ConsultarVendas" id="ConsultarVendas" class="ConsultarVendas" hidden>
					
					<br><br><input type="button" name="btnFecharConsultaVendas" class="btnFecharConsultaVendas" id="btnFecharConsultaVendas" value="Fechar">
					<form name="frmConsVenda" class="frmConsVenda" id="frmConsVenda">
						<h3 id="titleFrmVendas">Consultar Venda</h3>
				
						<label name="lblCodVenda" id="lblCodVenda" class="lblCodVenda">Cod. Venda: </label>
						<label name="lblValorTotal" id="lblValorTotal" class="lblValorTotal">Valor Total: </label><br>
						
						<input type="text" id="txtCodVenda" name="txtCodVenda" placeholder="Digite o Código">
						<input type="text" id="txtValorTotal" name="txtValorTotal" value="R$ 255,55" readOnly><br><br>
						
						<label name="lblCodProduto" id="lblCodProduto" class="lblCodProduto">Cód. Produto: </label>
						<label name="lblValorProduto" id="lblValorProduto" class="lblValorProduto">Valor: </label>
						<label name="lblQtProduto" id="lblQtProduto" class="lblQtProdutoProduto">Qtd.: </label><br>
						
						<input type="text" id="txtCodProduto" name="txtCodProduto" readOnly>
						<input type="text" id="txtValorProduto" name="txtValorProduto" value="R$ 255,55" readOnly>
						<input type="text" id="txtQtProduto" name="txtQtProduto" readOnly><br><br>
						
						
						<label name="lblNmProduto" id="lblNmProduto" class="lblNmProduto">Item: </label><br>
						<input type="text" id="txtNmProduto" name="txtNmProduto" readOnly><br><br>
						
												
						<label name="lblCPFV" id="lblCPFV" class="lblCPFV">CPF: </label>
						<label name="lblMtPagamento" id="lblMtPagamento" class="lblMtPagamento">Forma de Pagamento:</label><br>
						
						<input type="text" id="txtCPFV" name="txtCPFV">						
						<input type="text" id="txtMtPagamento" name="txtMtPagamento" readOnly><br><br>
						
						<div name="pgFiado" class="pgFiado" id="pgFiado">
						<label name="lblDtPagamento" id="lblDtPagamento" class="lblDtPagamento" >Previsão de Pagamento: </label><br>
						<input type="text" id="txtDtPagamento" name="txtDtPagamento" value="<?php
							$hoje = date('d-m-Y');
							echo date('d/m/Y', strtotime('+30 days', strtotime($hoje)));
						?>" disabled ><br><br></div>
						
						<br><input type="submit" id="btnConfirarPagamento" value="Confirmar Pagamento"><br><br>
				
					</form>
				
				</div>

			<!-- FILTRO A SER APLICADO ANTES DE LISTAR AS VENDAS REALIZADAS-->	
			<div class="filtroListaVendas" name="filtroListaVendas" id="filtroListaVendas" hidden>
				<form name="frmFiltroVendas" class="frmFiltroVendas" id="frmFiltroVendas">
					<h3 id="titleFrmVendas">Filtro de Listagem</h3>

					<label class="lblSelFiltro" >Selecione o Filtro:</label><br>
					<select form="frmFiltroVendas" name="opcaoListagem" id="opcaoListagem">
						<option value="0" selected>Tudo</option>
						<option value="1">Cliente</option>
						<option value="2">Data</option>
						<option value="3">Pendentes de Pagamento</option>						
					</select>
					<br><br>

					<input type="text" name="CPFLista" class="CPFLista" id="CPFLista" placeholder="Digite o CPF do Cliente" hidden=""><br><br>
					<input type="date" name="dataLista" class="dataLista" id="dataLista" hidden=""><br><br>

					<input type="submit" id="btnFiltroListagem" value="Listar">

				</form>
			</div>




			<!-- LISTAGEM DE VENDAS REALIZADAS 50 POR PÁGINA-->	
			<div id="listagemVendas" class="listagemVendas" name="listagemVendas" hidden>
				<br><br><input type="button" name="btnFecharListaVendas" class="btnFecharListaVendas" id="btnFecharListaVendas" value="Fechar">

				<table name="listaVendas" class="listaVendas" id="listaVendas">
					<thead id="listaVendasThead">
						<caption class="listaVendasTheadCaption">
							Listagem de Vendas
						</caption>
						<tr class="listaVendasCaptionItems" id="listaVendasCaptionItems">
							<th>Cod. Venda</th>
							<th>Cliente</th>
							<th>Valor Total</th>
						</tr>
						
					</thead>
					<tbody>
						<tr>	
							<td><a href="#"> 010.565</a></td>
							<td>José Silva de Alcantara</td>
							<td>R$ 150,00</td>
							
						</tr>

						<tr>
						
							<td><a href="#"> 010.557</a></td>
							<td>Raphael de Souza</td>
							<td>R$ 100,00</td>
							
						</tr>
						

						<tr>
							
							<td><a href="#"> 010.256 <!-- Aqui Vem o Codigo PHO do Item--></a></td>
							<td>Alice Maria</td>
							<td>R$ 30,00</td>
							
						</tr>
						
						<tr>
							<td class="ListaVendasTotalCaption">Total:</td>
							<td class="ListaVendasTotalValor" colspan="2">R$ 280,00</td>
						</tr>
					</tbody>
					
				</table>
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
	



<? php 
	
?>