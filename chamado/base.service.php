<?php

//CRUD
class BaseService{

	private $conexao;
	private $base;

	public function __construct(Conexao $conexao, Base $base){
		$this->conexao = $conexao->conectar();
		$this->base = $base;
	}

	public function inserir() { //create
		$query = 'insert into tb_base_conhecimento(nm_titulo,ds_descricao,nm_categoria,nm_tipo, cd_tecnico)values(:titulo,:descricao,:categoria,:tipo,:tecnico)';
		$stmt = $this->conexao->prepare($query);
		// $stmt->bindValue(':codigo', $this->base->__get('codigo'));
		$stmt->bindValue(':titulo', $this->base->__get('titulo'));
		$stmt->bindValue(':descricao', $this->base->__get('descricao'));
		$stmt->bindValue(':categoria', $this->base->__get('categoria'));
		$stmt->bindValue(':tipo', $this->base->__get('tipo'));
		$stmt->bindValue(':tecnico', $this->base->__get('tecnico'));
		$stmt->execute();

	}

	public function recuperar() { //read
		// $query = 'call sp_Base_conhecimento(:titulo, :descricao,:categoria,:tipo)';

		$query = '
		select 
		cd_base_conhecimento, nm_titulo, ds_descricao, nm_categoria, nm_tipo 
		from 
		tb_base_conhecimento
		';
		
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':titulo', $this->base->__get('titulo'));
		$stmt->bindValue(':descricao', $this->base->__get('descricao'));
		$stmt->bindValue(':categoria', $this->base->__get('categoria'));
		$stmt->bindValue(':titulo', $this->base->__get('titulo'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

	}

	public function atualizar() { //update

		//print_r($this->base);

		$query = "update tb_base_conhecimento set nm_titulo = :titulo, ds_descricao = :descricao, nm_categoria = :categoria, nm_tipo = :tipo, cd_tecnico = :tecnico where cd_base_conhecimento = :codigo";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':titulo', $this->base->__get('titulo'));
		$stmt->bindValue(':codigo', $this->base->__get('codigo'));
		$stmt->bindValue(':descricao', $this->base->__get('descricao'));
		$stmt->bindValue(':categoria', $this->base->__get('categoria'));
		$stmt->bindValue(':tipo', $this->base->__get('tipo'));
		$stmt->bindValue(':tecnico', $this->base->__get('tecnico'));
		return $stmt->execute();

	}

	public function remover() { //delete

		$query = 'delete from tb_base_conhecimento where cd_base_conhecimento = :codigo';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':codigo', $this->base->__get('codigo'));
		$stmt->execute();

	}
}

?>