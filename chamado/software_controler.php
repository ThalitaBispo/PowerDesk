<?php  


require "../chamado/chamado.php";
require "../chamado/chamado_service.php";
require "../chamado/conexao.php";

if(isset($_POST['check'])){
    $checkbox = $_POST['check'];

    foreach ($checkbox as $check) {
        // echo $check;
        //aqui você salva no seu banco
    }
}


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

// echo $acao;

if ($acao =='salvar'){
$chamado  = new Chamado();
$chamado->__set('nm_titulo', $_POST['titulo']);
$chamado->__set('ds_problema',$_POST['descricao']);

$conexao = new Conexao();

$chamadoService = new ChamadoService($conexao, $chamado);
$chamadoService->salvar();

header('location: nova_tarefa.php?inclusao=1');

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
$chamado->__set('cd_protocolo', $_POST['cd_protocolo']);
$chamado->__set('ds_problema',$_POST['chamado']);

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