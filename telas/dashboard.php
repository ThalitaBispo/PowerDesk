<?php
 session_start();
 //include('verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Power Desk</title>

		<!-- estilos -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="img/logo_powerdesk2.png" >

		<!-- script -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
		<script src="js/script.js"></script>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<script type="text/javascript" src="js/cep.js"></script>

	</head>
	<body>
		<!-- MENU -->
		<div class="nav-side-menu">
		    <div class="brand">
		    	<img src="img/logo_powerdesk2.png" width="40" height="40" class="logo" alt="">
		    	<p>Power Desk</p>
		    	<hr>
		    </div>
		    <div class="logo-user">
		    	<img src="img\user-b.png" width="30" height="30" margin="50" class="" alt="">
		    	<h5><?=$_SESSION["usuario"];?></h5>
		    </div>
		    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
		        <div class="menu-list">
		            <ul id="menu-content" class="menu-content collapse out">
		                <li>
		                  <a href="dashboard.php"><i class="material-icons sidebar-icon">dashboard</i> Dashboard</a>
		                </li>
		                
		                <li  data-toggle="collapse" data-target="#novoChamado" class="collapsed">
		                    <a href="#"><i class="material-icons sidebar-icon">library_add</i> Novo chamado <span class="arrow"><i class="fa fa-angle-down"></i></spam></a>
		                </li>
			                <ul class="sub-menu collapse" id="novoChamado">
			                    <li><a href="#" id="hardware"><i class="fa fa-angle-right"></i> Hardware</a></li>
			                    <li><a href="#" id="software"><i class="fa fa-angle-right"></i> Software <small><i class="fa fa-external-link"></i></small></a></li>
			                    <li><a href="#" id="outros"><i class="fa fa-angle-right"></i> Outros</a></li>
			                </ul>

		                <li  data-toggle="collapse" data-target="#baseDeConhecimentos" class="collapsed">
		                    <a href="#"><i class="material-icons sidebar-icon">assignment</i> Base de conhecimentos<span class="arrow"><i class="fa fa-angle-down"></i></spam></a>
		                </li>
			                <ul class="sub-menu collapse" id="baseDeConhecimentos">
			                    <li><a href="#" id="topicos"><i class="fa fa-angle-right"></i> Tópicos</a></li>
			                    <li><a href="#" id="criarTopico"><i class="fa fa-angle-right"></i> Criar tópico</a></li>
			                </ul>

			            <li  data-toggle="collapse" data-target="#cadastro" class="collapsed">
		                    <a href="#"><i class="material-icons sidebar-icon" style="font-size:27px">group_add</i> Cadastro<span class="arrow"><i class="fa fa-angle-down"></i></spam></a>
		                </li>
			                <ul class="sub-menu collapse" id="cadastro">

			                    <li><a href="#" id="empresa"><i class="fa fa-angle-right"></i> Cadastrar empresa</a></li>

			                    <li><a href="#" id="todaempresa"><i class="fa fa-angle-right"></i> Empresas cadastradas</a></li>
			                
			                    <li><a href="#" id="login"><i class="fa fa-angle-right"></i> Cadastrar login</a></li>
			                </ul>

			            <li>
		                  <a href="logout.php"><i class="material-icons sidebar-icon">exit_to_app</i> Sair</a>
		                </li>
		                
		            </ul>
		     </div>
		</div>

		<!-- paginas -->
		<div class="main" id="pagina">		    
		    <div class="container">
		    	<div class="row">
		    		<div class="col">					
						<form>
							<div class="form-group row">
								<label class="col-sm-9 col-form-label">DASHBOARD:</label>
								<div class="col-sm-3">
									<select class="form-control-plaintext" id="competencia">
										<option value="">-- Selecione </option>
										<option value="2019-08">Maio / 2019</option>
										<option value="2019-09">Junho / 2019</option>
										<option value="2019-10">Julho / 2019</option>
									</select>
								</div>
							</div>
						</form>
						<hr/>

						<label class="col-sm-9 col-form-label">CHAMADO:</label>

		    		</div>
		    	</div>

		    	<div class="row mb-3" id="chamado">
		    		<div class="col-md-3">
		    			<div class="card text-center" style="background-color: #232F5A" style="width: 50px;">
							<div class="card-body">
								<p class="h5 text-white"> Abertos </p>
								<p class="card-text text-white card-title" id="chamadosAbertos">?</p>
								<a href="dashboard.php?id=1" class="btn btn-dark bg-primary" >Visualizar</a>
							</div>
						</div>
					</div>

					<div class="col-md-3">
		    			<div class="card text-center" style="background-color: #232F5A" style="width: rem;">
							<div class="card-body">
								<p class="h5 text-white"> Agendados </p>
								<p class="card-text text-white" id="chamadosAgendados">?</p>
								<a href="dashboard.php?cd=2" class="btn btn-dark bg-warning">Visualizar</a>
							</div>
						</div>
					</div>

					<div class="col-md-3">
		    			<div class="card text-center" style="background-color: #232F5A" style="width: rem;">
							<div class="card-body">
								<p class="h5 text-white"> Finalizados </p>
								<p class="card-text text-white" id="chamadosFechados">?</p>
								<a href="dashboard.php?cod=3" class="btn btn-dark bg-success">Visualizar</a>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="card text-center" style="background-color: #232F5A" style="width: rem;">
							<div class="card-body">
								<p class="h5 text-white"> Todos </p>
							    <p class="card-text text-white" id="totalChamados">?</p>
							    <a href="dashboard.php?codg=4" class="btn btn-dark bg-info">Visualizar</a>
							</div>
						</div>
					</div>
				</div>

				<div class="row mb-3">

		    	</div>
		    	<br>
		    	<br>

			   <?php
				if(isset($_GET['id'])==1){
					echo "<table class='table table-striped table-primary'>
						<thead class=' text-white' style='background-color: #232F5A'>
							<tr>
								<th scope='col'>#</th>
								<th scope='col'>Título</th>
								<th scope='col'>Autor</th>
								<th scope='col'>Acompanhamento</th>
								<th scope='col'>Cliente</th>
								<th scope='col'>Status</th>
								<th scope='col'></th>
								<th scope='col'></th>
							</tr>
						</thead>";
					$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
					$stmt = $conn->prepare("select cd_protocolo, nm_titulo, nm_autor, nm_acompanhamento, nm_cliente, ds_status from tb_chamado where ds_status <> 'finalizado' ");
					$stmt->execute();

					while($result = $stmt-> fetch(PDO::FETCH_ASSOC)){
						echo '<tr><th scope="row">' . $result['cd_protocolo'] . '</th>';
						echo '<td>' . $result['nm_titulo'] . '</td>';
						echo '<td>' . $result['nm_autor'] . '</td>';
						echo '<td>' . $result['nm_acompanhamento'] . '</td>';
						echo '<td>' . $result['nm_cliente'] . '</td>';
						echo '<td>' . $result['ds_status'] . '</td>';
						echo '<td>' ."<a href='edita_chamado.php?id=". $result['cd_protocolo']. "'>Editar</a>" . '</td>';
						echo '<td>' ."<a href='edita_chamado.php?id=". $result['cd_protocolo']. "'>Imprimir</a>" . '</td></tr>';
					}
				}

				if(isset($_GET['cd'])==2){
					echo "<table class='table table-striped table-warning'>
						<thead class=' text-white' style='background-color: #232F5A'>
							<tr>
								<th scope='col'>#</th>
								<th scope='col'>Título</th>
								<th scope='col'>Autor</th>
								<th scope='col'>Acompanhamento</th>
								<th scope='col'>Cliente</th>
								<th scope='col'>Status</th>
								<th scope='col'></th>
							</tr>
						</thead>";

					$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
					$stmt = $conn->prepare("select cd_protocolo, nm_titulo, nm_autor, nm_acompanhamento, nm_cliente, ds_status from tb_chamado where dt_agendamento <> '0000-00-00' ");
					$stmt->execute();

					while($result = $stmt-> fetch(PDO::FETCH_ASSOC)){
						echo '<tr><th scope="row">' . $result['cd_protocolo'] . '</th>';
						echo '<td>' . $result['nm_titulo'] . '</td>';
						echo '<td>' . $result['nm_autor'] . '</td>';
						echo '<td>' . $result['nm_acompanhamento'] . '</td>';
						echo '<td>' . $result['nm_cliente'] . '</td>';
						echo '<td>' . $result['ds_status'] . '</td></tr>';	
						echo '<td>' ."<a href='edita_chamado.php?id=". $result['cd_protocolo']. "'>Editar</a>" . '</td></tr>';
					}
				}

				if(isset($_GET['cod'])==3){
					echo "<table class='table table-striped table-success'>
						<thead class=' text-white' style='background-color: #232F5A'>
							<tr>
								<th scope='col'>#</th>
								<th scope='col'>Título</th>
								<th scope='col'>Autor</th>
								<th scope='col'>Acompanhamento</th>
								<th scope='col'>Cliente</th>
								<th scope='col'>Status</th>
								<th scope='col'></th>
							</tr>
						</thead>";

					$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
					$stmt = $conn->prepare(" select cd_protocolo, nm_titulo, nm_autor, nm_acompanhamento, nm_cliente, ds_status from tb_chamado where ds_status = 'finalizado'");
					$stmt->execute();

					while($result = $stmt-> fetch(PDO::FETCH_ASSOC)){
						echo '<tr><th scope="row">' . $result['cd_protocolo'] . '</th>';
						echo '<td>' . $result['nm_titulo'] . '</td>';
						echo '<td>' . $result['nm_autor'] . '</td>';
						echo '<td>' . $result['nm_acompanhamento'] . '</td>';
						echo '<td>' . $result['nm_cliente'] . '</td>';
						echo '<td>' . $result['ds_status'] . '</td>';	
						echo '<td>' ."<a href='edita_chamado.php?id=". $result['cd_protocolo']. "'>Editar</a>" . '</td></tr>';
					}
				}
					/*echo "<table class='table table-striped table-dark' style='background-color: #232F5A' >
						<thead>
							<tr class='bg-success text-white'>*/
				if(isset($_GET['codg'])==4){
					echo "<table class='table table-striped table-info'>
						<thead class=' text-white' style='background-color: #232F5A'>
							<tr>
								<th scope='col'>#</th>
								<th scope='col'>Título</th>
								<th scope='col'>Autor</th>
								<th scope='col'>Acompanhamento</th>
								<th scope='col'>Cliente</th>
								<th scope='col'>Status</th>
								<th scope='col'></th>
								<th scope='col'></th>
							</tr>
						</thead>";

					$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
					$stmt = $conn->prepare(" select cd_protocolo, nm_titulo, nm_autor, nm_acompanhamento, nm_cliente, ds_status from tb_chamado");
					$stmt->execute();

					while($result = $stmt-> fetch(PDO::FETCH_ASSOC)){
						 echo '<tr><th scope="row">' . $result['cd_protocolo'] . '</th>';
						 echo '<td>' . $result['nm_titulo'] .'</a>'.'</td>';
						 echo '<td>' . $result['nm_autor'] . '</td>';
						 echo '<td>' . $result['nm_acompanhamento'] . '</td>';
						 echo '<td>' . $result['nm_cliente'] . '</td>';
						 echo '<td>' . $result['ds_status'] .'</td>';	
						 echo '<td>' ."<a href='edita_chamado.php?id=". $result['cd_protocolo']. "'>Editar</a>" . '</td>';
						 echo '<td>' ."<a href='gerar_pdf.php?id=". $result['cd_protocolo']. "'>Imprimir</a>" . '</td></tr>';
					}
				}
				?>
				</tbody>
				</table>
			</div>
		</div>
		<span class="back-to-top">
			<img src="img/back-to-top.png" width="60" height="60" class="" alt="">

		</span>
	</body>
</html>