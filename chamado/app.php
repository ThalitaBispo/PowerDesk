<?php

//classe dashboard
class Dashboard{

    public $status;
	public $data_inicio;
	public $data_fim;
	public $chamadosAbertos;
	public $chamadosAgendados;
	public $chamadosFechados;
	public $totalChamados;

	public function __get($atributo){
		return $this->$atributo;
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
		return $this;
	}
}

//classe de conexão
class Conexao{
	private $host = 'localhost';
	private $dbname = 'db_helpdesk';
	private $user = 'root';
	private $pass = '';

	public function conectar(){
		try{

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"
			);

			//
			$conexao->exec('set charset set utf8');

			return $conexao;

		} catch (PDOException $e){
			echo '<p>'.$e->getMessege().'</p>';
		}
	}
}

//classe (model)
class Bd{
	private $conexao;
	private $dashboard;

	public function __construct(Conexao $conexao, Dashboard $dashboard){
		$this->conexao = $conexao->conectar();
		$this->dashboard = $dashboard;
	}

	public function getChamadosAbertos(){
		$query = 'select count(*) as chamados_abertos from tb_chamado where ds_status <> :status and dt_abertura between :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':status', $this->dashboard->__get('status'));
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->chamados_abertos;
	}

	public function getChamadosAgendados(){
		$query = 'select count(*) as chamados_agendados from tb_chamado where ds_status <> :status and dt_agendamento between :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':status', $this->dashboard->__get('status'));
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->chamados_agendados;
	}

	public function getChamadosFechados(){
		$query = 'select count(*) as chamados_fechados from tb_chamado where ds_status = :status and dt_fechamento between :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':status', $this->dashboard->__get('status'));
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->chamados_fechados;
	}

	public function getTotalChamados(){
		$query = ' select count(*) as total_chamados from tb_chamado where dt_abertura between :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_chamados;
	}
}

//logica do script
$dashboard = new Dashboard();

$conexao = new Conexao();

$competencia = explode('-', $_GET['competencia']);
$ano = $competencia[0];
$mes = $competencia[1];

$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

$dashboard->__set('status', 'finalizado');
$dashboard->__set('data_inicio', $ano.'-'.$mes.'-01');
$dashboard->__set('data_fim', $ano.'-'.$mes.'-'.$dias_do_mes);

$bd = new Bd($conexao, $dashboard);

$dashboard->__set('chamadosAbertos', $bd->getChamadosAbertos());
$dashboard->__set('chamadosAgendados', $bd->getChamadosAgendados());
$dashboard->__set('chamadosFechados', $bd->getChamadosFechados());
$dashboard->__set('totalChamados', $bd->getTotalChamados());

echo json_encode($dashboard);

?>