<?php
include ("../chamado/conexao.php");
?>
<html>
<head>
<title>Alterar Cadastro PHP</title>
</head>
<body>
<form name="alterar" method="post" action="">
	Selecione um nome:
	<select name="selecao" size="1" id="selecao">
		<?

   $conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
  $stmt = $conn->prepare('SELECT nm_empresa FROM tb_empresa');
  $stmt->execute();

?>
 
<?// primeira forma 
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
echo '<option>' .$result['nm_empresa']. '</option>'. '<br>';	
}
		?>

	</select>
</form>
</body>
</html>