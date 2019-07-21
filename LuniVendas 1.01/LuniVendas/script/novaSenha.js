$(document).ready(function(){

	$('#newPassConfirm').blur(function(){
		var senha1, senha2;
		senha1 = $('#newPass').val();
		senha2 = $('#newPassConfirm').val();
		if(senha1 == senha2 && senha1 == ''){
			$('.failed').text('Informe uma Senha Válida!').slideDown(300).delay(2000).slideUp(300);
			$('#newPass').focus();
		}else if(!validaSenha()){
			$('.failed').text('Senhas estão diferentes!').slideDown(300).delay(2000).slideUp(300);
			$('#newPass').focus();
		}
	});

	$('#btnEnviar').click(function(){
		if(validaSenha()){
			blockScreen();
			var senha;
			senha = $('#newPass').val();
			$.ajax({
				type: 'POST',
				//dataType: 'html',
				url: 'alteraSenha.php',
				data: 'newPass='+senha ,
				success:function(msg){
					unblockScreen();
					window.location.replace('../home');
					console.log(msg);
				}
			});
		}else{
			$('.failed').text('Verifique as Senhas!').slideDown(300).delay(2000).slideUp(300);
			$('#newPass').focus();
		}
	});

	function validaSenha(){
		var senha1, senha2, retorno;
		senha1 = $('#newPass').val();
		senha2 = $('#newPassConfirm').val();

		if(senha1 == '' && senha2 == ''){
			$('.failed').text('Informe uma Senha Válida!').slideDown(300).delay(2000).slideUp(300);
			$('#newPass').focus();
			retorno =  false;
		}else{
			if(senha1 != senha2){
				retorno =  false;
			}else{
				retorno =  true;
			}
		}

		return retorno;
	}


});
					

					

					
