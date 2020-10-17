<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PowerDesk</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					PowerDesk
				</a>
			</div>
		</nav>
		<? if(isset($_GET['inclusao'])&& $_GET['inclusao'] == 1) { ?>
		<div class="bg-info pt-2 text-white d-flex justify-content-center ">
			<h5>Chamado criado com sucesso!</h5>
		</div>
	<? } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
												
						<li class="list-group-item"><a href="todas_tarefas.php">Todos chamados</a></li>

						<li class="list-group-item active"><a href="#">Novo Chamado</a></li>

						<li class="list-group-item "><a href="base_tarefas.php">Base de conhecimento</a></li>
						<li class="list-group-item "><a href="todas_tarefas.php">Consulta</a></li>

						<li class="list-group-item "><a href="todas_tarefas.php">Cadastro</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Cadastro</h4>
								<hr />

									<div class="form-group">
										
										<a class="btn btn-outline-primary btn-lg btn-block" href="empresa_novo.php" role="button">Empresa</a>
										<a class="btn btn-outline-dark btn-lg btn-block" href="#" role="button">Técnico</a>
										<a class="btn btn-outline-secondary btn-lg btn-block" href="#.php" role="button">Atendente</a>
										<a class="btn btn-outline-secondary btn-lg btn-block" href="cadastro_login.php" role="button">Login</a>
																	
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>