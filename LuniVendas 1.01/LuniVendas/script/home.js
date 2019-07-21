$(document).ready(function(){
	console.log("Arquivo Carregado com Sucesso!");
	


	$("#btnSair").on('click',function(){
		$("#menuListaHome").slideToggle(1000);
		window.setTimeout(home, 1100);

		function home(){
			window.location.replace('index.php');
		}
		
	});

});

