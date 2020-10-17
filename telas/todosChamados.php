<?php
$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
$stmt = $conn->prepare('select cd_protocolo, nm_titulo, nm_autor, nm_cliente, ds_status from tb_chamado');
$stmt->execute();
?>

<?
while($result = $stmt-> fetch(PDO::FETCH_ASSOC)){
		echo '<tr><th scope="row">' . $result['cd_protocolo'] . '</th>';
		echo '<td>' . $result['nm_titulo'] . '</td>';
		echo '<td>' . $result['nm_autor'] . '</td>';
		echo '<td>' . $result['nm_cliente'] . '</td>';
		echo '<td>' . $result['ds_status'] . '</td></tr>';	
	}

?>