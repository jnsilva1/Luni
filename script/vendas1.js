$(document).ready(function(){
	var idItem = 1;

	//Click  Abrir Formulário para Registrar Venda
	$('#btnRegVenda').click(function(){
		$('#menuVendas').slideUp(300);
		$('#RegistrarVendas').slideDown(300);
	});

	//Click para adicionar itens de venda
	$('#btnAddItem').on('click', function(){
		idItem++;
		var itemAdd = '<div name="produtosArea" class="produtosArea" id="produtosArea">';
						
		itemAdd +=	'<label name="lblCodProduto" id="lblCodProduto" class="lblCodProduto">Cód. Produto: </label>';
		itemAdd +=		'<label name="lblValorProduto" id="lblValorProduto" class="lblValorProduto">Valor: </label>';
		itemAdd += '<label name="lblQtProduto" id="lblQtProduto" class="lblQtProdutoProduto">Qtd.: </label><br>';
		itemAdd += '<input type="text" id="txtCodProduto'+idItem+'" name="txtCodProduto" class="txtCodProduto">';
		itemAdd += '<input type="text" id="txtValorProduto'+idItem+'" name="txtValorProduto" class="txtValorProduto" value="R$ 255,55" readOnly>';
		itemAdd += '<select form="frmVenda" id="txtQtProduto'+idItem+'" name="txtQtProduto" class="txtQtProduto">';
		itemAdd += '<option value="1" selected>1</option>';
		itemAdd += '<option value="2">2</option>';
		itemAdd += '<option value="3">3</option>';
		itemAdd += '<option value="4">4</option>';
		itemAdd += '<option value="5">5</option>';
		itemAdd += '</select><br><br>';
		itemAdd += '<label name="lblNmProduto" id="lblNmProduto" class="lblNmProduto">Item: </label><br>';
		itemAdd += '<input type="text" id="txtNmProduto'+idItem+'" name="txtNmProduto" class="txtNmProduto"><br><br>';
		itemAdd += '</div>';
		

		$('#produtosArea').append(itemAdd);

		
	});


	//Realizar a busca dos Itens através do Codigo do Produto!
	$('.txtCodProduto').blur(function(){
		var codProduto = $(this).attr('id');
		alert(codProduto);

	});

	$('#txtCodProduto-2').focus(function(){
		alert('Item set Focus!');
	});


	//Concluir o Registro de venda
	$('#btnRegistrarVenda').click(function(){
		alert(idItem);
	});

});