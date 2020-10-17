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

		/*function selectAllLogin(){
			$banco = conectar();
			$sql = "SELECT * FROM tb_login ORDER BY usuario";
			$resultado = $banco -> query($sql);
			$banco -> close();
			while ($row = mysqli_fetch_array($resultado)) {
				$grupo[] = $row;
			}
			return $grupo;
		}*/

		
	}
?>

<?php
	/*define('HOST', 'localhost');
	define('USUARIO', 'root');
	define('SENHA', '');
	define('DB', 'db_helpdesk');

	$conecta = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');*/

	/*function selectAllLogin(){
		$banco = $conecta;
		$sql = "SELECT * FROM tb_login ORDER BY DECRESCENT";
		$result = $banco -> query($sql);
		$banco -> close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}*/

	/*function con(){
			$bank = new mysqli("localhost","root","","db_helpdesk");
			return $bank;
		}*/
	function con(){
		define('HOST', 'localhost');
		define('USUARIO', 'root');
		define('SENHA', '');
		define('DB', 'db_helpdesk');

		$conecta = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
		return $conecta;
		}	

	function selectAllLogin(){
		$banco = con();
		$sql = "SELECT * FROM tb_login ORDER BY usuario";
		$resultado = $banco -> query($sql);
		$banco -> close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}


?>