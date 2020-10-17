<?php  


require "../chamado/chamado.php";
require "../chamado/chamado_service.php";
require "../chamado/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

// echo $acao;

if ($acao =='salvar'){
$chamado  = new Chamado();
$chamado->__set('nm_titulo', $_POST['titulo']);
$chamado->__set('ds_problema',$_POST['descricao']);
$chamado->__set('nm_cliente', $_POST['cliente']);
$chamado->__set('ds_acompanhamento_email',$_POST['acompanhamento_cliente']);
$chamado->__set('dt_abertura',$_POST['data_abertura']);
$chamado->__set('nm_autor',$_POST['atendente']);
$chamado->__set('ds_acompanhamento',$_POST['tecnico']);
$chamado->__set('dt_agendamento',$_POST['data_agendamento']);

$conexao = new Conexao();

$chamadoService = new ChamadoService($conexao, $chamado);
$chamadoService->salvar();

header('location: dashboard.php');

}else if ($acao == 'recuperar') {
	$chamado = new Chamado();
	$conexao = new Conexao();

	$chamadoService = new ChamadoService($conexao, $chamado);
	$chamados = $chamadoService ->visualizar();

}else if($acao == 'atualizar'){

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$chamado  = new Chamado();
$chamado->__set('cd_protocolo', $_POST['codigo']);
$chamado->__set('nm_titulo', $_POST['titulo']);
$chamado->__set('ds_problema',$_POST['descricao']);
$chamado->__set('ds_status',$_POST['status']);
$chamado->__set('ds_acompanhamento_email',$_POST['acompanhamento_cliente']);

$conexao = new Conexao();
$chamadoService = new ChamadoService($conexao, $chamado);
if($chamadoService -> editar()){
	header('location:todas_tarefas.php');

}
}else if($acao == 'apagar'){
	// echo 'bora meu filho';

	$chamado = new Chamado();
	$chamado->__set('cd_protocolo',$_GET['cd_protocolo']);

	$conexao = new Conexao();

	$chamadoService = new ChamadoService($conexao, $chamado);
	$chamadoService->apagar();

	header('location:todas_tarefas.php');


}


?>