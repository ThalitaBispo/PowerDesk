<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Power Desk</title>

		<!-- estilos -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="shortcut icon" href="img/power.png" >

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
								<label class="col-sm-9 col-form-label">EDIÇÃO DE CHAMADO:</label>
								<div class="col-sm-3">
								</div>
							</div>
						</form>
						<hr/>

										<?php		    
		    		if(isset($_GET['id']))	{
		    			$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		    			$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
		    			$stmt = $conn->prepare(" select ce.cd_protocolo, ce.cd_empresa, chamado.ds_problema, chamado.nm_acompanhamento,
chamado.ds_acompanhamento, chamado.ds_observacao, chamado.nm_titulo, chamado.nm_cliente,
chamado.ds_acompanhamento_email, chamado.ds_tipo, chamado.ds_status, chamado.nm_autor,
chamado.dt_abertura, chamado.dt_agendamento, chamado.dt_fechamento, chamado.ds_urgencia,
empresa.nm_empresa
from tb_chamado as chamado
join chamado_empresa as ce
on ce.cd_protocolo = chamado.cd_protocolo
join tb_empresa as empresa
on ce.cd_empresa = empresa.cd_empresa
where chamado.cd_protocolo = '$id' ");
		    			$stmt->execute();
		    			$result = $stmt-> fetch(PDO::FETCH_ASSOC);
		    		}

		    		?>

		    		<center>

		    		<h4>Titulo: <?php echo $result['nm_titulo'];?></h4>
		    		<h4>ID: <?php echo $result['cd_protocolo'];?></h4>

		    		</center>

		    		</div>
		    	</div>

		<!-- paginas -->

		<div class="container app">
		<div class="row">
			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Chamado</h4>
							<hr />

							<form method="post" action="chamado_hardware_controller.php?acao=atualizar">


		    		<div class="form-group">
					<label>Código:</label>
					<input type="text" class="form-control" name ="codigo" value="<?php echo $result['cd_protocolo'];?>" readonly=“true”>
				</div>

		    	<div class="form-group">
					<label>Título:</label>
					<input type="text" class="form-control" name ="titulo" value="<?php echo $result['nm_titulo'];?>" placeholder="Ex: Máquina não Liga">
				</div>

				<div class="form-group">
					<label>Cliente:</label>
						<select name="cliente" class="form-control">
							<option value="<?php echo $result['nm_empresa'];?>"><?php echo $result['nm_empresa'];?></option>
							<?php 
								//while($result = $stmt-> fetch(PDO::FETCH_ASSOC)){
									echo '<option>' .$result['nm_empresa']. '</option>'. '<br>';	
								// }
							?>
						</select>
				</div>

		    	<div class="form-group">
					<label>Problema:</label>
					<input type="text" class="form-control" name ="descricao" value="<?php echo $result['ds_problema'];?>" placeholder="Ex: Máquina não Liga">
				</div>

				<div class="form-group">
					<label>Descrição do Acompanhamento: </label>
					<textarea class="form-control" name="acompanhamento" value="<?php echo $result['ds_acompanhamento']?>" rows="5"><?php echo $result['ds_acompanhamento']?></textarea>									
				</div>

				<div class="form-group">
					<label>Status:</label>
						<select name="status" class="form-control">
							<option value="<?php echo $result['ds_status']?>"><?php echo $result['ds_status']?></option>
							<option value="Em andamento">Em andamento</option>
							<option value="Aguardando retirada">Aguardando retirada</option>
							<option value="Aguarando peça">Aguarando peça</option>
							<option value="Finalizado">Finalizado</option>
						</select>
				</div>

				<div class="form-group">
					<label>Prioridade:</label>
						<select name="prioridade" class="form-control">
							<option value="<?php echo $result['ds_urgencia']?>"><?php echo $result['ds_urgencia']?></option>
							<option value="Baixo">Baixo</option>
							<option value="Médio">Médio</option>
							<option value="Alto">Alto</option>
						</select>
				</div>

				<div class="form-group">
					<label>Acompanhamento por e-mail:</label>
						<select name="acompanhamento_cliente" class="form-control">
							<option value="<?php echo $result['ds_acompanhamento_email']?>"><?php echo $result['ds_acompanhamento_email']?></option>
							<option value="Sim">Sim</option>
							<option value="Nao">Não</option>
						</select>
				</div>

				<div class="form-group">
					<label> Data Abertura: </label>
				<br>
					<input type="text" name="data_abertura" class="form-control" value="<?php echo $result['dt_abertura']?>">
				</div>

				<div class="form-group">
					<label> Data Agendamento: </label>
						<input type="text" class="form-control" name ="data_agendamento" id="calendario" value="<?php echo $result['dt_agendamento']?>">
				</div>

				<div class="form-group">
					<label> Data Fechamento: </label>
						<input type="text" class="form-control" name ="data_fechamento" value="<?php echo $result['dt_fechamento']?>">
				</div>

				<div class="form-group">
					<label>Autor:</label>
						<select name="atendente" class="form-control">
							<option value="<?php echo $result['nm_autor']?>"><?php echo $result['nm_autor']?></option>
				<?php
					$conn2 = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
						$stmt2 = $conn2->prepare('SELECT nm_atendente FROM tb_atendente');
						$stmt2->execute();
				?>

				<?php
					while($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
						echo '<option>' .$result2['nm_atendente']. '</option>'. '<br>';	
					}
				?>
						</select>

				</div>

				<div class="form-group">
					<label>Acompanhamento:</label>
						<select name="tecnico" class="form-control">
							<option value="<?php echo $result['nm_acompanhamento']?>"><?php echo $result['nm_acompanhamento']?></option>
					<?
						$conn3 = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
						$stmt3 = $conn3->prepare('SELECT nm_tecnico FROM tb_tecnico');
						$stmt3->execute();
					?>

					<? 
    					while($result3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							echo '<option>' .$result3['nm_tecnico']. '</option>'. '<br>';	
	     				}
					?>
						</select>
							
				</div>

				<div class="form-group">
					<label> Observação: </label>
					<textarea class="form-control" name="observacao" value="<?php echo $result['ds_observacao']?>"><?php echo $result['ds_observacao']?></textarea>									
				</div>

							<button class="btn btn-info">Salvar</button>
								</form>
						
						</div>
					</div>
			</div>
		</div>
	</div>

 </div>		

</body>

</html>