<?php
	include_once "../../conexao.php";
	

	class DespesasCar{
		///despesasCar_id
		private $codigo;
		
		///despesasCar_data 
		private $data;
		
		///depesasCar_km
		private $quilometragem;
		
		///depesasCar_valA
		private $abastecido;
		
		///despesasCar_valC
		private $combustivel;
		
		///depesasCar_userId
		private $usuario;
		
		
		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}
		
		public function getCodigo(){
			return $this->codigo;
		}
		
		public function setData($data){
			$this->data = isset($data) ? $data : date('Y-m-d H:i:s');
		}
		
		public function getData(){
			return $this->data;
		}
		
		public function setQuilometragem($quilometragem){
			$this->quilometragem = $quilometragem;
		}
		
		public function getQuilometragem(){
			return $this->quilometragem;
		}
		
		public function setAbastecido($abastecido){
			$this->abastecido = $abastecido;
		}
		
		public function getAbastecido(){
			return $this->abastecido;
		}
		
		public function setCombustivel($combustivel){
			$this->combustivel = $combustivel;
		}
		
		public function getCombustivel(){
			return $this->combustivel;
		}
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
		
		///Construtor
		public function __construct($id, $data, $km, $vA, $vC, $user){
			$this->codigo=$id;
			$this->data =  isset($data) ? $data : date('Y-m-d H:i:s');
			$this->quilometragem = $km;
			$this->abastecido = $vA;
			$this->combustivel = $vC;
			$this->usuario = $user;
			
		}
		
		public function buscaDespesa(){
			
			$returned = $this->buscaDespesaParam($this->data,$this->abastecido,$this->combustivel);
			
			return $returned;
		}
		
		public function buscaDespesaParam($data, $vA, $vC){
			try{
				
				$query = "SELECT * from despesaCar WHERE despesasCar_data <= ? and depesasCar_valA = ? and despesasCar_valC = ?";
				$result = Conexao::getInstance()->prepare($query);
				$result->bindParam(1,$data);
				$result->bindParam(2,$vA);
				$result->bindParam(3,$vC);
				$result->execute();
				$returned = $this->PopulaDespesasCar($result->fetch(PDO::FETCH_ASSOC));
				
				return $returned;
				
			}catch(Exception $e){
				throw $e;
			}
		}
		
		public static function buscaDespesaStatic(){
			
			$query = "SELECT * from despesaCar";
			$result = Conexao::getInstance()->query($query);
			
			$retorno = array();
			
			$despesas = new DespesasCar(
				0,
				date('Y-m-d H:i:s'),
				0,
				0,
				0,
				0		
			);
			
			while($row = $result->fetch(PDO::FETCH_ASSOC)){
				
				$retorno[] = $despesas->PopulaDespesasCar($row);
				
			}
			
			return $retorno;
			
		}
		
		///Salva o Objeto
		public function Save(){
			try{
				
				$query = "INSERT INTO despesaCar (despesasCar_id, despesasCar_data, depesasCar_km, depesasCar_valA, despesasCar_valC, depesasCar_userId)	VALUES (uuid(),?,?,?,?,?)";
				$save = Conexao::getInstance()->prepare($query);
				$save->bindParam(1, $this->data);
				$save->bindParam(2, $this->quilometragem);
				$save->bindParam(3, $this->abastecido);
				$save->bindParam(4, $this->combustivel);
				$save->bindParam(5, $this->usuario);
				
				$save->execute();
				
			}
			catch(Exception $e){
				throw $e;
			}		
			
		}
		
		public function jsonSerialize() {
			return get_object_vars($this);
		}
		
		private function PopulaDespesasCar($row){
			
			$date = date_create($row['despesasCar_data']);
			
			$pojo = new DespesasCar(
				$row['despesasCar_id'],				
				date_format($date,'d/m/Y H:i'),				
				$row['depesasCar_km'],				
				$row['depesasCar_valA'],				
				$row['despesasCar_valC'],				
				$row['depesasCar_userId']				
			);
			
			return $pojo;
		}
	}
	
	
	//echo "<pre>";
	// $var = DespesasCar::buscaDespesaStatic();
	// $array = array();
	// for($i = 0; $i < count($var); $i++){
		
		// $array[] = json_encode($var[$i]->jsonSerialize());
		
	// }
	
	// echo $array;
	//echo count($var);
	
	//print_r($var);
	
	//echo "</pre>";
?>