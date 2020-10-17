<?php
 session_start();
 include('../chamado/conexao.php');

 $usuario = mysqli_real_escape_string($conecta, trim($_POST['usuario']));
 $email = mysqli_real_escape_string($conecta, trim($_POST['email']));
 $senha = mysqli_real_escape_string($conecta, trim(md5($_POST['senha'])));

 //$sql = "select count(*) as total from login where usuario = '$usuario'"; //1 dado pra validação
 $sql = "select count(*) as total from tb_login where usuario = '$usuario' or email = '$email'"; //2 dados pra validação(TESTE)
 $result = mysqli_query($conecta, $sql);
 $row = mysqli_fetch_assoc($result);

 //VERIFICA SE O CADASTRO JA EXISTE
 if($row['total'] == 1){
 	$_SESSION['usuario_existe'] = true;
	header('Location: dashboard.php');
	exit;	
 }

 $sql = "INSERT INTO tb_login (usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

 if($conecta->query($sql) === true){
 	$_SESSION['status_cadastro'] = true;
 }

 $conecta->close();

 header('Location: dashboard.php');
 exit;
?>