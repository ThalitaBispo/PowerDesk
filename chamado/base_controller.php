<?php

require "../chamado/base.model.php";
require "../chamado/base.service.php";
require "../chamado/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'inserir'){

$base = new Base();

$base->__set('codigo', $_POST['codigo']);
$base->__set('titulo', $_POST['titulo']);
$base->__set('descricao', $_POST['descricao']);
$base->__set('categoria', $_POST['categoria']);
$base->__set('tipo', $_POST['tipo']);
$base->__set('tecnico', $_POST['tecnico']);

$conexao = new Conexao();

$baseService = new BaseService($conexao, $base);

$baseService->inserir();

header('Location: dashboard.php');
} 

else if ($acao == 'recuperar'){
	$base = new Base();
	$conexao = new Conexao();

	$baseService = new BaseService($conexao, $base);
	$bases = $baseService->recuperar();

} 

else if ($acao == 'atualizar'){
	
$base = new Base();
$base->__set('codigo', $_POST['codigo']);
$base->__set('titulo', $_POST['titulo']);
$base->__set('descricao', $_POST['descricao']);
$base->__set('categoria', $_POST['categoria']);
$base->__set('tipo', $_POST['tipo']);
$base->__set('tecnico', $_POST['tecnico']);

	$conexao = new Conexao();

	$baseService = new BaseService($conexao, $base);
    if ($baseService->atualizar()) {
    	header('Location: dashboard.php');
    }
}

else if ($acao == 'remover') {

	$base = new Base();
	$base ->__set('codigo', $_GET['cd_base_conhecimento']);

	$conexao = new Conexao();

	$baseService = new BaseService($conexao, $base);
	$baseService->remover();

	header('Location: dashboard.php');
}

?>