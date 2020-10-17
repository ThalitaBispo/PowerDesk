<?php

//CRUD
class EmpresaService{

	private $conexao;
	private $empresa;

	public function __construct(Conexao $conexao, Empresa $empresa){
		$this->conexao = $conexao->conectar();
		$this->empresa = $empresa;
	}

	public function salvar() { //create
		
		$query = 'insert into tb_empresa (nm_empresa, cd_cnpj, nm_endereco, cd_cep, nm_complemento, nm_bairro, nm_cidade, nm_uf) values (:nm_empresa, :cd_cnpj, :nm_endereco, :cd_cep, :nm_complemento, :nm_bairro, :nm_cidade, :nm_uf)';

		//'call sp_EmpresaEndereco (cd_empresa, nm_empresa, cd_cnpj, nm_endereco, cd_cep, nm_complemento, cd_bairro, cd_cidade, nm_bairro, cd_uf, nm_cidade, nm_uf, cd_endereco)'; 
		
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(':cd_empresa', $this->empresa->__get('default'));
		$stmt->bindValue(':nm_empresa', $this->empresa->__get('nm_empresa'));
		$stmt->bindValue(':cd_cnpj', $this->empresa->__get('cd_cnpj'));
		//$stmt->bindValue(':ds_observacao', $this->empresa->__get('ds_observacao'));
		$stmt->bindValue(':nm_endereco', $this->empresa->__get('nm_endereco'));
		$stmt->bindValue(':cd_cep', $this->empresa->__get('cd_cep'));
		$stmt->bindValue(':nm_complemento', $this->empresa->__get('nm_complemento'));
		//$stmt->bindValue(':cd_bairro', $this->empresa->__get('default'));
		$stmt->bindValue(':nm_bairro', $this->empresa->__get('nm_bairro'));
		//$stmt->bindValue(':cd_cidade', $this->empresa->__get('default'));
		$stmt->bindValue(':nm_cidade', $this->empresa->__get('nm_cidade'));
		//$stmt->bindValue(':cd_uf', $this->empresa->__get('default'));
		$stmt->bindValue(':nm_uf', $this->empresa->__get('nm_uf'));
		//$stmt->bindValue(':cd_endereco', $this->empresa->__get('default'));
		$stmt->execute();

	}

	public function visualizar() { //read

		$query = '
		select 
		cd_empresa,nm_empresa,cd_cnpj 
		from 
		tb_empresa
		';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nm_empresa', $this->empresa->__get('nm_empresa'));
		$stmt->bindValue(':cd_cnpj', $this->empresa->__get('cd_cnpj'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);

	}

	public function editar() { //update

		//print_r($this->base);

		$query = "update tb_empresa set nm_empresa = :nm_empresa, cd_cnpj = :cd_cnpj, cd_cep = :cd_cep, nm_endereco = :nm_endereco, cd_numero = :cd_numero, nm_complemento = :nm_complemento, nm_bairro = :nm_bairro, nm_cidade = :nm_cidade, nm_uf = :nm_uf where cd_empresa = :cd_empresa";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nm_empresa', $this->empresa->__get('nm_empresa'));
		$stmt->bindValue(':cd_empresa', $this->empresa->__get('cd_empresa'));
		$stmt->bindValue(':cd_cnpj', $this->empresa->__get('cd_cnpj'));
		$stmt->bindValue(':cd_cep', $this->empresa->__get('cd_cep'));
		$stmt->bindValue(':nm_endereco', $this->empresa->__get('nm_endereco'));	
		$stmt->bindValue(':cd_numero', $this->empresa->__get('cd_numero'));
		$stmt->bindValue(':nm_complemento', $this->empresa->__get('nm_complemento'));
		$stmt->bindValue(':nm_bairro', $this->empresa->__get('nm_bairro'));
		$stmt->bindValue(':nm_cidade', $this->empresa->__get('nm_cidade'));
		$stmt->bindValue(':nm_uf', $this->empresa->__get('nm_uf'));
		return $stmt->execute();

	}

	public function apagar() { //delete

		$query = 'delete from tb_empresa where cd_empresa = :cd_empresa';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':cd_empresa', $this->empresa->__get('cd_empresa'));
		$stmt->execute();

	}
}

?>