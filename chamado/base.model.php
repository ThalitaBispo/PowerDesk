<?php

class Base{
	private $codigo;
	private $titulo;
	private $descricao;
	private $categoria;
	private $tipo;
	private $codigo_tecnico;
	private $tecnico;

	public function __get($atributo){
		return $this->$atributo;
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
		return $this;
	}
}

?>