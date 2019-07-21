function cpf_encode(cpf){
	var cpfencoded = cpf.substr(0,3)+"."+cpf.substr(3,3)+"."+cpf.substr(6,3)+"-"+cpf.substr(9,2);

	return cpfencoded;
}

function cpf_decode(cpf){
	var cpfdecoded = cpf.substr(0,3)+cpf.substr(4,3)+cpf.substr(8,3)+cpf.substr(12,2);

	return cpfdecoded;
}


function tel_encode(tel){

	var telEncoded = "("+tel.substr(0,2)+")"+" "+tel.substr(2,4)+"-"+tel.substr(6,4);

	return telEncoded;

}

function tel_decode(tel){
	var telDecoded = tel.substr(1,2)+tel.substr(5,4)+tel.substr(10,5);

	return telDecoded;
}


function cell_encode(cellphone){
	var cellEncoded = "(" + cellphone.substr(0,2) + ")" + " " + cellphone.substr(2,1) + "." + cellphone.substr(3,4) + "-" + cellphone.substr(7,4);

	return cellEncoded;
}

function cell_decode(cellphone){

	var cellDecoded = cellphone.substr(1,2)+cellphone.substr(5,1)+cellphone.substr(7,4)+cellphone.substr(12,5);

	return cellDecoded;
}

function celTel_decode(parametro){
	var tamanho = parametro.length;
	var resultado;

	if(tamanho == 16 && parametro.substr(6,1) == "."){
		resultado = cell_decode(parametro);
	}else if (tamanho == 14 && parametro.substr(9,1) == "-") {
		resultado = tel_decode(parametro);
	}else{
		resultado = parametro;
	}

	return resultado;

}

function cep_encode(cep){
	var cepEncoded = cep.substr(0,5)+"-"+cep.substr(5,3);
	return cepEncoded;
}

function cep_decode(cep){

	var cepDecoded = cep.substr(0,5)+cep.substr(6,3);
	return cepDecoded;

}

