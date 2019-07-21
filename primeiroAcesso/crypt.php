<?php
	$globalKey = base64_encode(md5("LunicarVendas"));

	//Criação de Função para criptografia e decriptografia
	function cryptEncode($string){

		//parâmetros para criação da chave de criptografia.
		$skey = "LunicarVendas";
		$sIV = "LunicarVendasIV";
		$string = utf8_encode($string);

		$encode = base64_encode($string);

		return $encode;


	}

	function cryptDecode($string){
		//parâmetros para criação da chave de criptografia.
		$skey = "LunicarVendas";
		$sIV = "LunicarVendasIV";

		$decode = base64_decode($string);


		return utf8_decode($decode);
	}

	function passCrypt($senha){
		$senha = md5($senha);

		return $senha;
	}


	#$paraCrypt = "Meu Nome é José Nilo";
	#$strencrypt  = cryptEncode($paraCrypt);
	#$strdecrypt = cryptDecode($strencrypt);

	#echo "Este é o texto à ser criptografado: ".$paraCrypt;
	#echo "<br>";
	#echo "Este é o texto criptografado: ".$strencrypt;
	#echo "<br>";
	#echo "este é o Texto depois da Decriptografia: ".$strdecrypt;
	#echo "<br>";
	#echo "A senha é : LunicarVendas";
	#echo "<br>";
	#echo "Cript Senha é: ".passCrypt("adm");
?>