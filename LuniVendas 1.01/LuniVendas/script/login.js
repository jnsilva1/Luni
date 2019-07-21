$(document).ready(function(){
	console.log("Arquivo Carregado com Sucesso!");
	
	$('#btnLoginEnviar').on('click', function(event){
		event.preventDefault();
		console.log('Formulário Enviado!');

		verificaLogin();
	});

});

function verificaLogin(){
	var login, senha;
	login = $('#txtLogin').val();
	senha = $('#txtSenha').val();

	if(login == ""){

		var msg = "Login Inválido!";
		$('#logMsg').html(msg);
		$('#logMsg').slideDown('slow').delay(1500).slideUp(300);

		$('#txtLogin').focus();
	}else if(senha == ""){
		var msg = "Informe uma Senha Válida!";
		$('#logMsg').html(msg);
		$('#logMsg').slideDown('slow').delay(1500).slideUp(300);

		$('#txtSenha').focus();
	}else{
		$.ajax({
			type:'POST',
			dataType: 'html',
			url: 'Controller/login.php',
			data: {usuario: login, senha: senha},
			success:function(msg){
				console.log(msg);

				if(msg == 0){

					$('#logMsg').html('Usuário Não Localizado!');
					$('#logMsg').slideDown('slow').delay(1500).slideUp(300);

					$('#txtLogin').focus();


				}else if(msg == 1){
					window.location.replace('home/index.php').delay(2500);
					
				}else if(msg == 3){
					window.location.replace('primeiroAcesso/index.php').delay(2500);
				}else if(msg == 2){
					$('#logMsg').html('Senha Incorreta!');
					$('#logMsg').slideDown('slow').delay(1500).slideUp(300);

					$('#txtSenha').focus();
				}
				
			}
		});
	}

}