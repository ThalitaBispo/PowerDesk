<?php

require "../chamado/empresa.model.php";
require "../chamado/empresa.service.php";
require "../chamado/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'salvar'){

$empresa = new Empresa();

//$empresa->bindValue('cd_empresa', $this->base->__get('cd_empresa'));
$empresa->__set('nm_empresa', $_POST['nome']);
$empresa->__set('cd_cnpj',$_POST['cnpj']);
// $empresa->bindValue('ds_observacao', $this->empresa->__get('ds_observacao'));
$empresa->__set('nm_endereco', $_POST['endereco']);
$empresa->__set('cd_cep', $_POST['cep']);
$empresa->__set('nm_complemento', $_POST['complemento']);
//$empresa->bindValue('cd_bairro', $this->base->__get('cd_bairro'));
$empresa->__set('nm_bairro', $_POST['bairro']);
//$empresa->bindValue('cd_cidade', $this->base->__get('cd_cidade'));
$empresa->__set('nm_cidade', $_POST['cidade']);
//$empresa->bindValue('cd_uf', $this->base->__get('cd_uf'));
$empresa->__set('nm_uf', $_POST['uf']);
//$empresa->bindValue('cd_endereco', $this->base->__get('cd_endereco'));

$conexao = new Conexao();

$empresaService = new EmpresaService($conexao, $empresa);

$empresaService->salvar();

header('Location: dashboard.php');
} 

else if ($acao == 'visualizar'){

	$empresa = new Empresa();
	$conexao = new Conexao();

	$empresaService = new EmpresaService($conexao, $empresa);
	$empresas = $empresaService->visualizar();

} 

else if ($acao == 'editar'){
	
	$empresa = new Empresa();

$empresa->__set('nm_empresa', $_POST['nome']);
$empresa->__set('cd_empresa', $_POST['codigo']);
$empresa->__set('cd_cnpj',$_POST['cnpj']);
$empresa->__set('cd_cep', $_POST['cep']);
$empresa->__set('nm_endereco', $_POST['endereco']);
$empresa->__set('cd_numero', $_POST['numero']);
$empresa->__set('nm_complemento', $_POST['complemento']);
$empresa->__set('nm_bairro', $_POST['bairro']);
$empresa->__set('nm_cidade', $_POST['cidade']);
$empresa->__set('nm_uf', $_POST['uf']);

	$conexao = new Conexao();

	$empresaService = new EmpresaService($conexao, $empresa);
    if ($empresaService->editar()) {
    	header('Location: dashboard.php');
    }
}

else if ($acao == 'apagar') {

	$empresa = new Empresa();
	$empresa ->__set('cd_empresa', $_GET['cd_empresa']);

	$conexao = new Conexao();

	$empresaService = new EmpresaService($conexao, $empresa);
	$empresaService->apagar();

	header('Location: dashboard.php');
}

?>