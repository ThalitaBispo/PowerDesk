<?php  
/**
 * 
 */
class ChamadoService{

	private $conexao;
	private $chamado;

	public function __construct(Conexao $conexao, Chamado $chamado){
		$this->conexao = $conexao->conectar();
		$this->chamado = $chamado;

	}	

	
	public  function salvar (){
		
		$query = 'insert into tb_chamado(nm_titulo,ds_problema, nm_cliente, ds_acompanhamento_email, dt_abertura, ds_status, nm_autor, nm_acompanhamento, dt_agendamento, ds_urgencia, ds_observacao)values(:nm_titulo,:ds_problema, :nm_cliente, :ds_acompanhamento_email, :dt_abertura, :ds_status, :nm_autor, :nm_acompanhamento, :dt_agendamento, :ds_urgencia, :ds_observacao)';
		$stmt = $this->conexao->prepare($query);
		$stmt ->bindValue(':nm_titulo', $this->chamado->__get('nm_titulo'));
		$stmt ->bindValue(':ds_problema', $this->chamado->__get('ds_problema'));
		$stmt ->bindValue(':nm_cliente', $this->chamado->__get('nm_cliente'));
		$stmt ->bindValue(':dt_abertura', $this->chamado->__get('dt_abertura'));
		$stmt ->bindValue(':ds_status', $this->chamado->__get('ds_status'));
		$stmt ->bindValue(':ds_acompanhamento_email', $this->chamado->__get('ds_acompanhamento_email'));
		$stmt ->bindValue(':nm_autor', $this->chamado->__get('nm_autor'));
		$stmt ->bindValue(':nm_acompanhamento', $this->chamado->__get('nm_acompanhamento'));
		$stmt ->bindValue(':dt_agendamento', $this->chamado->__get('dt_agendamento'));
		$stmt ->bindValue(':ds_urgencia', $this->chamado->__get('ds_urgencia'));
		$stmt ->bindValue(':ds_observacao', $this->chamado->__get('ds_observacao'));
		$stmt ->execute();

	}

	public function visualizar (){
		$query = 'select cd_protocolo, nm_titulo, ds_problema, nm_cliente
					 from tb_chamado';

					 
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);


	}
	public function editar(){
		// print_r($this->chamado);
		$query = 'update tb_chamado set cd_protocolo = :cd_protocolo, nm_titulo = :nm_titulo, ds_problema = :ds_problema,  ds_status = :ds_status, ds_urgencia = :ds_urgencia, ds_acompanhamento_email = :ds_acompanhamento_email, dt_abertura = :dt_abertura, dt_agendamento = :dt_agendamento, nm_autor = :nm_autor, nm_acompanhamento = :nm_acompanhamento, ds_observacao = :ds_observacao, nm_cliente = :nm_cliente, dt_fechamento = :dt_fechamento, ds_acompanhamento = :ds_acompanhamento where cd_protocolo = :cd_protocolo';
		
		$stmt = $this->conexao->prepare($query);
		$stmt ->bindValue(':cd_protocolo', $this->chamado->__get('cd_protocolo'));
		$stmt ->bindValue(':nm_titulo', $this->chamado->__get('nm_titulo'));
		$stmt ->bindValue(':ds_problema', $this->chamado->__get('ds_problema'));
		$stmt ->bindValue(':ds_status', $this->chamado->__get('ds_status'));
		$stmt ->bindValue(':ds_urgencia', $this->chamado->__get('ds_urgencia'));
		$stmt ->bindValue(':ds_acompanhamento_email', $this->chamado->__get('ds_acompanhamento_email'));
		$stmt ->bindValue(':dt_abertura', $this->chamado->__get('dt_abertura'));
		$stmt ->bindValue(':dt_agendamento', $this->chamado->__get('dt_agendamento'));
		$stmt ->bindValue(':nm_autor', $this->chamado->__get('nm_autor'));
		$stmt ->bindValue(':nm_acompanhamento', $this->chamado->__get('nm_acompanhamento'));
		$stmt ->bindValue(':ds_observacao', $this->chamado->__get('ds_observacao'));
		$stmt ->bindValue(':nm_cliente', $this->chamado->__get('nm_cliente'));
		$stmt ->bindValue(':dt_fechamento', $this->chamado->__get('dt_fechamento'));
		$stmt ->bindValue(':ds_acompanhamento', $this->chamado->__get('ds_acompanhamento'));
		return $stmt -> execute();
	
	}
	public function apagar(){
		$query ='delete from tb_chamado where cd_protocolo = :cd_protocolo';
		$stmt = $this->conexao->prepare($query) ;
		$stmt->bindValue(':cd_protocolo',$this->chamado->__get('cd_protocolo'));
		$stmt->execute();



	}



}



?>