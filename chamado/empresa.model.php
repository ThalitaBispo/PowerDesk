<?php

class Empresa{
	
	//private $cd_empresa;
	private $nm_empresa;
	private $cd_cnpj;
	private $cd_numero;
	//private $ds_observacao;

	//private $cd_endereco; 
	private $nm_endereco;
	private $cd_cep;
	private $nm_complemento;

	//private $cd_bairro;
	private $nm_bairro;

	//private $cd_cidade;
	private $nm_cidade;

	//private $cd_uf;
	private $nm_uf;

	public function __get($atributo){
		return $this->$atributo;
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
		return $this;
	}
}

?>