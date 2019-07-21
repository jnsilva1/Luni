<?php 
	
		date_default_timezone_set('America/Sao_Paulo');

		try{
			$PDO = new PDO("mysql:host=sql158.main-hosting.eu; dbname=u425114095_lsell", "u425114095_lunic", "lunicar@2019"); //Objeto de Conexão

			//set the PDO error mode to exception
			$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			

		}
		catch(PDOException $e){
			echo "Conexão Falhou: ". $e->getMessage();
		}
	

	

	//Funcão POST do Ajax
	/*
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url: 'pagina php com a função a ser exibida',
			beforeSend: function(){
				$('#LocalAReceberOsDadosDaTransacao').html("retorno");
			},
			data: {variaveldoDB : valor},
			success: function(msg){
				$(#LocalAReceberOsDadosDaTransacao).html(msg);
			}
		});


	*/
	
	class Conexao{
		
		public static $instance;
		
		private function __construct(){
			//
		}		
		
		public static function getInstance(){
			
			if(!isset(self::$instance)){
				
				self::$instance = new PDO("mysql:host=sql158.main-hosting.eu; dbname=u425114095_lsell", "u425114095_lunic", "lunicar@2019");
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

				
			}
			
			return self::$instance;
			
		}
	}

?>