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
								<label class="col-sm-9 col-form-label">EMPRESA:</label>
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
							<h4>Empresa</h4>
							<hr />

							<form method="post" action="empresa_controller.php?acao=editar">

								<?php		    
		    		if(isset($_GET['id']))	{
		    			$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		    			$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
		    			$stmt = $conn->prepare(" select * from tb_empresa where cd_empresa = '$id' ");
		    			$stmt->execute();
		    			$result = $stmt-> fetch(PDO::FETCH_ASSOC);
		    		}
	
		    		?>

		    		<div class="form-group">
						<label>Código:</label>
							<input type="text" class="form-control" name="codigo" value="<?php echo $result['cd_empresa'];?>" placeholder="Ex: Nome empresa Ltda." readonly=“true”>
					</div>

		    		<div class="form-group">
						<label>Nome:</label>
							<input type="text" class="form-control" name="nome" value="<?php echo $result['nm_empresa'];?>" placeholder="Ex: Nome empresa Ltda.">
					</div>

					<div class="form-group">
						<label>CNPJ:</label>
						<input type="text" class="form-control" name="cnpj"  value="<?php echo $result['cd_cnpj'];?>"  placeholder="00.000.000/0000-00">
					</div>

					<div class="form-group">
						<label>Cep:</label>
							<input type="text" placeholder="CEP do Cliente" id="cep" name="cep" value="<?php echo $result['cd_cep'];?>" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
						<br>
							<input type="button" name="buscaCep" value="Buscar" class="btn btn-info" onclick="pesquisacep(cep.value);">
					</div>

					<div class="form-group">
						<label>Rua:</label>
						    <input type="text" name="endereco" value="<?php echo $result['nm_endereco'];?>"  class="form-control" id="rua">
					</div>

					<div class="form-group">
						    <label>N°:</label>
						    <input type="text" name="numero" value="<?php echo $result['cd_numero'];?>"  class="form-control" id="rua">
					</div>

					<div class="form-group">
					    <label>Bairro:</label>
						    <input type="text" name="bairro" value="<?php echo $result['nm_bairro'];?>" class="form-control" id="bairro">
					</div>

					<div class="form-group">
						<label>Cidade:</label>
				     		<input type="text" name="cidade" value="<?php echo $result['nm_cidade'];?>" id="cidade" class="form-control">
					</div>

					<div class="form-group">
						<label>Estado:</label>
				    		<input type="text" name="uf" id="uf" value="<?php echo $result['nm_uf'];?>" class="form-control">
					</div>

					<div class="form-group">
						<label>Complemento:</label>
							<input type="text" name="complemento" value="<?php echo $result['nm_complemento'];?>" class="form-control">
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