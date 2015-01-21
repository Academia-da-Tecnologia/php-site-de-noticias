<?php

namespace app\classes;

class validation{

	public static $errors=array();

	public function validar($data,$validacoes){
		$valido=true;
		foreach($validacoes as $key=>$value){
			$explodeBarra=explode('|', $value);
			foreach($explodeBarra as $metodo){
				$post=isset($data[$key]) ? $data[$key] : NULL;
				if(!$this->$metodo($post,$key)){
					$valido=false;
				}
			}
		}
		return $valido;
	}

	public function obrigatorio($post,$fieldName){
		$valido=true;
		if(empty($post)){
			$valido=false;
			self::$errors[]='O campo '.$fieldName.' não pode ficar em branco';
		}
		return $valido;
	}

	public function email($post,$fieldName){
		$valido=true;
		if(!filter_var($post,FILTER_VALIDATE_EMAIL)){
			self::$errors[]='Digite um e-mail válido no campo '.$fieldName;
			$valido=false;
		}
		return $valido;
	}

	public static function mostrarErros(){
		$erros=self::$errors;
		echo '<ul id="listar-erros">';
		foreach ($erros as $erro) {
			echo '<li class="erro">'.$erro.'</li>';
		}
		echo '</ul>';
	}


}