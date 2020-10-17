<?php 

 session_start();
 include('../chamado/conexao.php');

 if(empty($_POST['usuario']) || empty($_POST['senha'])){
 	header('Location: dashboard.php');
 	exit();
 }
 
 $usuario = mysqli_real_escape_string($conecta, $_POST['usuario']);
 $senha = mysqli_real_escape_string($conecta, $_POST['senha']);

 $query = "select usuario from tb_login where usuario = '{$usuario}' and senha = md5('{$senha}')";

 $result = mysqli_query($conecta, $query);
 $row = mysqli_num_rows($result);

 if($row == 1){
	//$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['usuario'] = $usuario;
	header('Location: dashboard.php');
	exit();
 }else{
	$_SESSION['nao_autentico'] = true;
	header('Location: index.php');
	exit();
 }
?>