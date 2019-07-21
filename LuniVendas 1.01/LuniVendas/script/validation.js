function validaCpf(cpf){

	//Declaração das Variáveis
	var cpfArray = [];
	var rest1, rest2, retorno;

	//Atribuição de valores
	cpfArray[0] = cpf.substr(0,1);
	cpfArray[1] = cpf.substr(1,1);
	cpfArray[2] = cpf.substr(2,1);
	cpfArray[3] = cpf.substr(3,1);
	cpfArray[4] = cpf.substr(4,1);
	cpfArray[5] = cpf.substr(5,1);
	cpfArray[6] = cpf.substr(6,1);
	cpfArray[7] = cpf.substr(7,1);
	cpfArray[8] = cpf.substr(8,1);
	cpfArray[9] = cpf.substr(9,1);
	cpfArray[10] = cpf.substr(10,1);

	//calculo primário para validação do cpf inicial
	rest1 = (cpfArray[0]*10) + (cpfArray[1]*9) + (cpfArray[2]*8) + (cpfArray[3]*7) + (cpfArray[4]*6) + (cpfArray[5]*5) + (cpfArray[6]*4) + (cpfArray[7]*3) + (cpfArray[8]*2);

	//calculo secundário para validação do cpf secundária
	rest2 = (cpfArray[0]*11) + (cpfArray[1]*10) + (cpfArray[2]*9) + (cpfArray[3]*8) + (cpfArray[4]*7) + (cpfArray[5]*6) + (cpfArray[6]*5) + (cpfArray[7]*4) + (cpfArray[8]*3) + (cpfArray[9]*2);

	//Obtém o resto da divisão para confirmar a validação
	rest1 = rest1 * 10 % 11;
	if((rest1 == 10) || (rest1 == 11)){
		rest1 = 0;
	}
	rest2 = rest2 * 10 % 11;
	if ((rest2 == 10) || (rest2 == 11)) {
		rest2 = 0;
	}

	var cpfRep = cpfArray[1] == cpfArray[0] && cpfArray[2] == cpfArray[0] && cpfArray[3] == cpfArray[0] && cpfArray[4] == cpfArray[0] && cpfArray[5] == cpfArray[0] && cpfArray[6] == cpfArray[0] && cpfArray[7] == cpfArray[0] && cpfArray[8] == cpfArray[0]  && cpfArray[9] == cpfArray[0] && cpfArray[10] == cpfArray[0];

	if(cpfRep){
		retorno = false;
	}else{
		if(rest1 == cpfArray[9] && rest2 == cpfArray[10]){
			retorno = true;
		}else{
			retorno = false;
		}
	}

	

	return retorno;



}