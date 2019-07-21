$(document).ready(function(){

	//$('html').keyup(function(e){if(e.keyCode == 8)alert('backspace trapped')}) 


	//Visualização do CPF
	$('#txtCPF').blur(function(){
		var cpfLeg = $('#txtCPF').val().length;
		var cpf = $('#txtCPF').val();
		var isCPF = validaCpf(cpf);
	
		//REALIZA A VALIDAÇÃO DO CPF
		if(isCPF){

			//SE VÁLIDO, REALIZA A FORMATAÇÃO

			if(!(cpfLeg == 14 && cpfLeg.substr(3,1) == ".")){

				if(cpfLeg < 11 || cpfLeg > 11){
					//Caso a quantidade de caracteres seja maior
					$('.failed').text('Informe um CPF válido: 12345678901').slideDown(300).delay(2000).slideUp(300);
					$('#txtCPF').focus();

				}else{

					var cpfView = cpf.substr(0,3)+"."+cpf.substr(3,3)+"."+cpf.substr(6,3)+"-"+cpf.substr(9,2);
					$('#txtCPF').val(cpfView);
					var cpf2 = $('#txtCPF').val();
				

				}

			}

			

		}else{
			$('.failed').text('Informe um CPF Válido!').slideDown(300).delay(2000).slideUp(300).click(function(){$(this).hide();});
			$('#txtCPF').focus();
		}


		

		
	});


	//Array de Estados UF
	var estado = [];
	estado["AC"] = 1;
	estado["AL"] = 2;
	estado["AM"] = 3;
	estado["AP"] = 4;
	estado["BA"] = 5;
	estado["CE"] = 6;
	estado["DF"] = 7;
	estado["ES"] = 8;
	estado["GO"] = 9;
	estado["MA"] = 10;
	estado["MG"] = 11;
	estado["MS"] = 12;
	estado["MT"] = 13;
	estado["PA"] = 14;
	estado["PB"] = 15;
	estado["PE"] = 16;
	estado["PI"] = 17;
	estado["PR"] = 18;
	estado["RJ"] = 19;
	estado["RN"] = 20;
	estado["RO"] = 21;
	estado["RR"] = 22;
	estado["RS"] = 23;
	estado["SC"] = 24;
	estado["SE"] = 25;
	estado["SP"] = 26;
	estado["TO"] = 27;



	//Visualização do Telefone
	$('#txtTelefone').blur(function(){

		var tel = $('#txtTelefone').val();

		if(tel.substr(6,1) == '.' && tel.length == 15){
			$('#txtTelefone').val(tel_encode(cell_decode(tel)));
		}else if(tel.substr(9,1) == "-" && tel.length == 15){
			var atr14 = tel.substr(14,1);
			$('#txtTelefone').val(cell_encode(tel_decode(tel)));
		}else if(tel.substr(6,1) == '.' && tel.length == 16 || tel.substr(9,1) == "-" && tel.length == 14){

		}else{

			if(tel.length < 10 || tel.length > 11){
				$('.failed').text('Informe um Telefone válido!').slideDown(300).delay(2000).slideUp(300);

				$('#txtTelefone').focus();
			}else if(tel.length < 11){
				$('#txtTelefone').val(tel_encode(tel));
			}else{
				$('#txtTelefone').val(cell_encode(tel));
			}

		}
		
	});


	//Codifica o CEP para que possa realizar buscas
	$('#txtCEP').keyup(function(e){
		if(e.keyCode == 8){
			if ($('#txtCEP').val().substr(5,1) == "-") {
				var CEP = $('#txtCEP').val();
				$('#txtCEP').val(cep_decode(CEP));
			}
		}else if($('#txtCEP').val().length == 8){
			var CEP = $('#txtCEP').val();
			$('#txtCEP').val(cep_encode(CEP));
		}
	});


	//Inserção de endereço através do CEP
	$('#txtCEP').blur(function(){
		var CEP = $('#txtCEP').val();
		blockScreen();

		$.get("http://apps.widenet.com.br/busca-cep/api/cep/cep.json",{code : CEP}, function(endereco){

			if( endereco.status!=1){
				alert(endereco.message || "Houve um erro inesperado!");
				return;
			}
			$('#txtEndereco').val(endereco.address);
			$('#txtBairro').val(endereco.district);
			$('#txtCidade').val(endereco.city);
			$('#UF').val(estado[endereco.state]);

			console.log(endereco.state);
			console.log(endereco.city);
			console.log(endereco.district);
			console.log(endereco.address);
		}).done(function(){
			unblockScreen();
		});

		
	});




	//Abertura da função de Cadastro de Cliente
	$('#btnInserirCliente').click(function(){

		//Enviar Cadastro do Cliente
		var cpf, nmCliente, genero, dtNascimento, telCliente, emailCliente, cep, numResidencia, complemento;
		cpf = $('#txtCPF').val();
		cpf = cpf_decode(cpf);
		nmCliente = $('#txtNome').val();
		genero = $('#genero').val();
		dtNascimento = $('#txtDtNascimento').val();
		telCliente = $('#txtTelefone').val();
		telCliente = celTel_decode(telCliente);
		emailCliente = $('#txtEmail').val();
		cep = $('#txtCEP').val();
		cep = cep_decode(cep);
		numResidencia = $('#txtNumero').val();
		complemento = $('#txtComplemento').val();

		//Enviar Endereco do Cliente
		var logradouro, bairro, cidade, uf;

		logradouro = $('#txtEndereco').val();
		bairro = $('#txtBairro').val();
		cidade = $('#txtCidade').val();
		uf = $('#UF').val();

		//desenvolvimento

		if(nmCliente == ""){

			$('.failed').text('Informe o Nome do Cliente!').slideDown(300).delay(2000).slideUp(300);
			$('#txtNome').focus();

		}else if(isEmpty(cpf)){
			$('.failed').text('Informe o CPF do Cliente!').slideDown(300).delay(2000).slideUp(300);
			$('#txtCPF').focus();
		}else if(isEmpty(dtNascimento)){
			$('.failed').text('Informe a Data de Nascimento').slideDown(300).delay(2000).slideUp(300);
			$('#txtDtNascimento').focus();
		}else if(genero == "sel"){
			$('.failed').text('Informe o Sexo!').slideDown(300).delay(2000).slideUp(300);
			$('#genero').focus();
		}else if(isEmpty(telCliente)){
			$('.failed').text('Informe o Telefone ou Celular').slideDown(300).delay(2000).slideUp(300);
			$('#txtTelefone').focus();
		}else if(isEmpty(emailCliente)){
			$('.failed').text('Informe o E-mail').slideDown(300).delay(2000).slideUp(300);
			$('#txtEmail').focus();
		}else if(!srtSearchBool(emailCliente, "@") && !srtSearchBool(emailCliente, ".")){
			$('.failed').text('Informe um E-mail Válido').slideDown(300).delay(2000).slideUp(300);
			$('#txtEmail').focus();
		}else{

			$.ajax({
				type: 'POST',
				dataType: 'html',
				url: 'controleCliente.php',
				data:{
					cpf: cpf,
					nmCliente: nmCliente,
					genero: genero,
					dtNascimento: dtNascimento,
					telCliente: telCliente,
					emailCliente: emailCliente,
					cep: cep,
					numResidencia: numResidencia,
					complemento: complemento,
					logradouro: logradouro,
					bairro: bairro,
					cidade: cidade,
					uf: uf
				},
				success: function(msg){
					if (msg == 1) {
						$('.success').text('Cliente Cadastrado com Sucesso!').slideDown(300).delay(1500).slideUp(300);
						setTimeout(function(){window.location.replace('index.php');}, 2000);
					}else if( msg == 2){
						$('.failed').text('CPF já Cadastrado!').slideDown(300).delay(2000).slideUp(300);
					}else{
						$('.failed').text('Ocorreu um Erro!').slideDown(300).delay(2000).slideUp(300);
					}
				}
			});

		}

			

	});

	


	

});

function isEmpty(parametro){
	if(parametro == "" || parametro == " "){
		return true;
	}else{
		return false;
	}
}


// Retorna TRUE se Localizar a String
function srtSearchBool(OndeBuscar, oQueBuscar){
	var resultado = OndeBuscar.indexOf(oQueBuscar) > -1;

	return resultado;
}


// Retorna a posição do primeiro caracter a ser localizado!
function srtSearchPosition(OndeBuscar, oQueBuscar){
	var resultado = OndeBuscar.indexOf(oQueBuscar);

	return resultado;
}



