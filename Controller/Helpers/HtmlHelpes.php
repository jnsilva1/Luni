<?php

namespace HtmlHelpers;

	class Html{
		
		private $Context;
		private $Tabs;
		private $NewTab;
		private $Tabsid;
		private $TabsContent;
		private $WholeContent;
		private $JavaScript;
		
		public function __construct(){
			//
			$this->Context = "";
			$this->Tabs = "";
			$this->NewTab = "";
			$this->Tabsid = array(); 
			$this->TabsContent = ""; 
			$this->WholeContent = ""; 
			$this->JavaScript = array(); 
		}
		
		public function Layout($layoutDir){
			
			return include_once $layoutDir;
			
		}
		
		public function Title($title){
			
			$this->Append($title, "title");
			
		}
		
		public function Append($Content, $DestinationSelector){
			if(isset($Content) && isset($DestinationSelector)){
				array_push($this->JavaScript,'$(\''.$DestinationSelector.'\').append(\''.$Content.'\');');
			}
		}
		
		//Usa um selector JQuery que deve ser passado no parametro [SelectorOrigem = '#Orgigem']
		public function AppendTo($SelectorFrom, $SelectorTo){
			if(isset($SelectorFrom) && isset($SelectorTo)){
				array_push($this->JavaScript,'$(\''.$SelectorFrom.'\').appendTo(\''.$SelectorTo.'\');');
			}
		}
		
		public function Body(){
			
			$ArgsLength = func_num_args();
			$Args = func_get_args();
			
			if($ArgsLength > 0){
				$this->WholeContent = $this->ArgumentsToString($Args);
			}else{
				$this->Append($this->WholeContent,"content");
				$Return = '';
				$max = count($this->JavaScript);
				for($i = $max - 1; $i >= 0; $i--){
					
					$Return .= $this->JavaScript[$i];
				}
				
				return '<script type="text/javascript">'.$Return.'$("#meutext").val($(window).width());</script>';
			}
		}
		
		//Prin
		public function CreateTab($context, $HtmlContent = ""){
			
			
			$context = isset($context) ? $context : "tab";
			
			$render = '';
			
			//Começo das abas
			$render .= '<div class="LuniTabs"><ul class="nav nav-tabs" id="nav-'.$context.'" role="tablist">';
			
			//Cria as abas de navegação.
			//$render .= $this->NewTab;
			
			array_push($this->Tabsid,$context);
			array_push($this->JavaScript,'$(\'li[class="nav-item"]:first a\').addClass(\'active show\').attr(\'aria-selected\', true);');
			array_push($this->JavaScript,'$($(\'li[class="nav-item"]:first a\').attr(\'href\')).addClass(\'active show\').attr(\'aria-selected\', true);');
			$this->Tabs  = $render;
			return $this;
			
			echo json_encode($this->Tabsid);
			
		}
		
		///Cria a lista de abas com base no id informado
		public function NewTab($id, $arguments){
			
			$caption = "";
			
			array_push($this->Tabsid,$id);
			
			if(is_array($arguments)){
				
				if(array_key_exists("caption", $arguments)){
					$caption = $arguments['caption'];
				}
				
			}
			
			$this->NewTab .= '<li class="nav-item"><a class="nav-item nav-link" id="nav-'.$id.'-tab" data-toggle="tab" href="#nav-'.$id.'" role="tab" aria-controls="nav-'.$id.'" aria-selected="false">'.$caption.'</a></li>';

			
			return $this;
		}
		
		public function CloseTabs(){
			
			
			
			return $this->Tabs.$this->NewTab.'</ul><div class="tab-content" id="nav-tabContent"></div></div>';
		}
		
		public function CreateContentTab($tabId = "0", $tabIndex = "index", $hasForm = false){
			
			$Argslength = func_num_args();
			$Args = func_get_args();
			$arguments = '';
			
			$render = '';
			$tabIndex = isset($tabIndex) ? $tabIndex : 'index';
			
			$arguments = isset($arguments) ? $arguments: "";
			
			$hasForm = isset($hasForm) ? $hasForm : false;
			
			$render.= '<div class="tab-pane fade" id="nav-'.$tabId.'" role="tabpanel" aria-labelledby="nav-'.$tabId.'-tab">';
			
			if($Argslength > 3){
				
				for($i = 3 ; $i < $Argslength ; $i++){
					
					$arguments .= $Args[$i];
					
				}
			}
			
			if($hasForm){
				$render .= '<form id="form_'.$tabId.'" action="'.$tabIndex.'">'.$arguments.'</form>';
			}else{
				$render .= $arguments;
			}
			
			$this->AppendTo('#nav-'.$tabId, '#nav-tabContent');
			
			return $render.'</div>';		
		}
		
		public function CreateRowBootstrap($id, $arguments){
			$render = '';
			
			$arguments = isset($arguments) ? $arguments : ""; 
			
			$ArgLenght = func_num_args();
			$Args = func_get_args();
			
			if($ArgLenght > 2){
				
				$arguments = $this->ArgumentsToString($Args,1);
				
			}
			
			if(isset($id)){
				
				$render .= '<div class="row" id="'.$id.'">';
			}else{
				$render .= '<div class="row">';
			}		
			
			return $render.$arguments.'</div>';
		}
		
		public function CreateColBootstrap($id, $sm, $md, $lg, $xl){
			
			$render = '';
			$auto = 'auto';
			$sm = isset($sm) ? $sm : $auto;
			$md = isset($md) ? $md : $auto;
			$lg = isset($lg) ? $lg : $auto;
			$xl = isset($xl) ? $xl : $auto;
			$arguments =  '';
			
			$ArgLenght = func_num_args();
			$Args = func_get_args();
			
			if($ArgLenght > 5){
				
				$arguments = $this->ArgumentsToString($Args,5);
				
			}
			
			if(isset($id)){
				$render .= '<div id="'.$id.'" class="col-12 col-sm-'.$sm.' col-md-'.$md.' col-lg-'.$lg.' col-xl-'.$xl.'">';
			}else{
				$render .='<div class="col-12 col-sm-'.$sm.' col-md-'.$md.' col-lg-'.$lg.' col-xl-'.$xl.'">';
			}
			
			return $render.$arguments.'</div>';			
			
		}
		
		public function CreateLabel($text){
			$render = '';
			
			$text = isset($text) ? $text : '';
			
			$render = '<label>'.$text;
			
			return $render.'</label>';
		}
		
		public function CreateLabelFor($id, $text){
			
			$render = '';
			
			$text = isset($text) ? $text : '';
			
			$render = '<label for="'.$id.'">'.$text;
			
			return $render.'</label>';			
		}
		
		public function CreateField($id = ""){
			
			$render = '';
			$arguments = '';

			$ArgLenght = func_num_args();
			$Args = func_get_args();
			
			if($ArgLenght > 1){
				
				$arguments = $this->ArgumentsToString($Args,1);
				
			}
			
			if($id != ''){				
				$render = '<div id="field_'.$id.'" class="form-group">';
			}else{
				$render = '<div>';
			}
			
			if($arguments != ''){
				$render .= $arguments;
			}
			
			return $render.'</div>';
		}
		
		public function TextBox($id = "", $arguments = ""){
			
			$render = '';
			$id = isset($id)?$id:'';
			$arguments = isset($arguments) ? $arguments : "";
			
			if(is_array($arguments)){
				
				$arryAtributes = array_keys($arguments);
				$arrayLength = count($arguments);
				$arrayAtributesContent = array();
				$atributos = '';
				
				
				for($i = 0; $i < $arrayLength; $i++){
					
					array_push($arrayAtributesContent, $arguments["".$arryAtributes[$i].""]);
					
				}
				
				for($i = 0; $i < $arrayLength; $i++){
					
					$atributos .= ''.$arryAtributes[$i].'="'.$arrayAtributesContent[$i].'" ';
					
				}
				
				$render .= '<input type="text" id="'.$id.'" '.$atributos.'/>';
			}else{
				$render .='<input type="text" id="'.$id.'" '.$arguments.'/>';
			}
		
			
			return $render;
		}
		
		public function ComboBox($id){
			/*
			<div class="form-group">
				<label for="exampleFormControlSelect1">Example select</label>
				<select class="form-control" id="exampleFormControlSelect1">
				  <option>1</option>
				  <option>2</option>
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				</select>
			  </div>
			*/
			
			//$arguments = $this->ArgumentsToString($arguments);
			
			$render = '';
			
			$arguments = func_get_args();
			$length = count($arguments);
			
			$id = isset($id) ? $id: "";
			
			$render .= '<select class="form-control" id="'.$id.'">';
			
			for($i =1 ; $i < $length; $i++){
			
				$render.= $arguments[$i];
			}
			
			
			return $render.'</select>';
		}
		
		public function AddOption($optionValue, $optionCaption){
			return '<option value="'.$optionValue.'">'.$optionCaption.'</option>';
		}
		
		//Transforma Agumentos que estão em Array em uma única String;
		private function ArgumentsToString($arguments, $start = 0){
			
			if(isset($arguments)){
			
				if(is_array($arguments)){
					
					//Cria um array contendo as chaves de acesso à $arguments
					$arryAtributes = array_keys($arguments);
					
					//Contem o temanho do $arguments
					$arrayLength = count($arguments);
					
					//Cria um novo array vazio
					$arrayAtributesContent = array();
					
					//Contem o retorno da função.
					$atributos = '';
					
					if(in_array(0, $arryAtributes, true)){
						
						for($i = $start; $i <  $arrayLength; $i++){
							$atributos .= $arguments[$i];
						}
						
					}else{
						
						for($i = $start; $i < $arrayLength; $i++){
							
							array_push($arrayAtributesContent, $arguments["".$arryAtributes[$i].""]);
							
						}
						
						for($i = $start; $i < $arrayLength; $i++){
							
							$atributos .= ''.$arryAtributes[$i].'="'.$arrayAtributesContent[$i].'" ';
							
						}
					}
					
					
					
					return $atributos;
				}
				
				return "";
			}
			
			return "";
		}
		
		//Primeiro sempre deve ser ID
		public function Checkbox($id = "",$val ="",$caption = "", $class = "" ){
			
			$render = '';
			$ArgsLength = func_num_args();
			$Args = func_get_args();			
			$arguments = "";
			
			if($ArgsLength > 4){
			
				$arguments = $this->ArgumentsToString($Args, 4);
			}
			
			$render .= '<div class="form-check form-check-inline">';
			$render .= '<input class="form-check-input '.$class.'" id="'.$id.'" type="checkbox" value="'.$val.'" '.$arguments.'>';
			$render .= '<label class="form-check-label" for="'.$id.'">'.$caption.'</label>';
			$render .= '</div>';
			
			return $render;
		}
		
		public function Radio(){
			$render = '';
			$ArgsLength = func_num_args();
			$Args = func_get_args();
			$argStart = 0;
			$class = '';
			$id = '';
			$caption = '';
			
			if((array_key_exists('class', $Args) || array_key_exists('Class', $Args))){
				$class = isset($Args['class']) ? $Args['class'] : $Args['Class'];
				unset($Args['Class']);
				unset($Args['class']);
			}
			
			if((array_key_exists('id', $Args) || array_key_exists('Id', $Args))){
				$id = isset($Args['id']) ? $Args['id'] : $Args['Id'];
				unset($Args['id']);
				unset($Args['Id']);
			}
			
			if((array_key_exists('caption', $Args) || array_key_exists('Caption', $Args))){
				$caption = isset($Args['caption']) ? $Args['caption'] : $Args['Caption'];
				unset($Args['caption']);
				unset($Args['Caption']);
			}
			
			if(count($Args) > 0){
				$arguments = $this->ArgumentsToString($Args, 0);
			}else{
				$arguments = '';
			}
			
			$render .= '<div class="form-check form-check-inline">';
			$render .= '<input class="form-check-input '.$class.'" id="'.$id.'" type="radio" '.$arguments.'>';
			$render .= '<label class="form-check-label" for="'.$id.'">'.$caption.'</label>';
			$render .= '</div>';
			
			return $render;
		}
		
		
	}


?>