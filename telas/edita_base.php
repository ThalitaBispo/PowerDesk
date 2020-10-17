<?php

//$acao = 'recuperar';
//require 'base_controller.php';

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
								<label class="col-sm-9 col-form-label">BASE DE CONHECIMENTO:</label>
								<div class="col-sm-3">
								</div>
							</div>
						</form>
						<hr/>
		    		</div>
		    	</div>

		<!-- paginas -->

		<div class="container app">
		<div class="row">
			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Base de Conhecimento</h4>
							<hr />

							<form method="post" action="base_controller.php?acao=atualizar">

								<?php		    
		    		if(isset($_GET['id']))	{
		    			$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		    			$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
		    			$stmt = $conn->prepare(" select tb_base_conhecimento.cd_base_conhecimento,tb_base_conhecimento.nm_titulo,tb_base_conhecimento.ds_descricao,tb_base_conhecimento.nm_categoria,tb_base_conhecimento.nm_tipo,tb_tecnico.cd_tecnico, tb_tecnico.nm_tecnico from tb_base_conhecimento join tb_tecnico on tb_base_conhecimento.cd_tecnico = tb_tecnico.cd_tecnico where cd_base_conhecimento = '$id' ");
		    			$stmt->execute();
		    			$result = $stmt-> fetch(PDO::FETCH_ASSOC);
		    		}
	
		    		?>

		    		<div class="form-group">
							<label>Código:</label>
								<input type="text" class="form-control" name="codigo" value="<?php echo $result['cd_base_conhecimento'];?>" readonly=“true”>
								</div>

		    		<div class="form-group">
									<label>Nome do Técnico:</label>
									<select name="tecnico" class="form-control">
												<option><? echo $result['cd_tecnico']. " ". $result['nm_tecnico'];
												?>	</option>
												<?
												$con = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
												$stm = $con->prepare('SELECT cd_tecnico, nm_tecnico FROM tb_tecnico');
												$stm->execute();
												?>

												<? 
												while($resul = $stm->fetch(PDO::FETCH_ASSOC)){
													echo '<option>'. $resul['cd_tecnico']. " ". $resul['nm_tecnico']. '</option>'. '<br>';	
												}
												?>
										</select>
								</div>


						<div class="form-group">
							<label>Título:</label>
								<input type="text" class="form-control" name="titulo" value="<?php echo $result['nm_titulo'];?>">
								</div>

		    	        <div class="form-group">
					        <label>Descrição:</label>
					            <textarea class="form-control" name="descricao" rows="5" value="<?php echo $result['ds_descricao'];?>"><?php echo $result['ds_descricao'];?></textarea>									
				         </div>


								<div class="form-group">
									<label>Categoria:</label>
									<input type="text" class="form-control" name="categoria" value="<?php echo $result['nm_categoria'];?>">
								</div>

								<div class="form-group">
									<label>Tipo:</label>
									<input type="text" class="form-control" name="tipo" value="<?php echo $result['nm_tipo'];?>">
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