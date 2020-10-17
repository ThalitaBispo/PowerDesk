<?php  

class Chamado{

	private $cd_protocolo;
	private $ds_problema;
	private $nm_titulo;
	private $nm_cliente;
	private $ds_acompanhamento_email;
	private $dt_abertura;
	private $ds_status;
	private $ds_urgencia;
	private $dt_agendamento;
	private $nm_autor;
	private $nm_acompanhamento;
	private $ds_observacao;
	private $dt_fechamento;
	private $ds_acompanhamento;

	public function __get($atributo){

		return $this->$atributo;
	}

	public function __set($atributo, $valor){
		$this-> $atributo = $valor;

	}

}




?>