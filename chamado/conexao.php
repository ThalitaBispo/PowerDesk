<?php

	class Conexao{

		private $host = 'localhost';
		private $dbname = 'db_helpdesk';
		private $user = 'root';
		private $senha = '';

		public function conectar(){
			try{
				$conexao = new PDO(
					"mysql:host=$this->host;dbname=$this->dbname",
					"$this->user",
					"$this->senha"
				);
				return $conexao;
			} catch (PDOException $e){
				echo '<p>'.$e->getMessege().'</p>';
			}
		}
	}
?>

<?php
	define('HOST', 'localhost');
	define('USUARIO', 'root');
	define('SENHA', '');
	define('DB', 'db_helpdesk');

	$conecta = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
?>