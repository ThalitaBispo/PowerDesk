
<?php  
	$acao = 'recuperar';
	require 'chamado_controler.php';
	

	// echo '<pre>';
	// print_r($chamados);
	// echo '</pre>';

?>


<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PowerDesk</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<script>
		function editar(cd_protocolo,txt_chamado){
			let form = document.createElement('form')
			form.action = 'chamado_controler.php?acao=atualizar'
			form.method = 'post'
			form.className = 'row'

			// let form2 = document.createElement('form2')
			// form2.action = '#'
			// form2.method = 'post'
			// form2.className = 'row'


			let inputChamado = document.createElement('input')
			inputChamado.type = 'text'
			inputChamado.name = 'chamado'
			inputChamado.className = 'col-9 form-control'
			inputChamado.value = txt_chamado

			let inputId = document.createElement('input')
			inputId.type = 'hidden'
			inputId.name = 'cd_protocolo'
			inputId.value = cd_protocolo

			let button = document.createElement('button')
			button.type = 'submit'
			button.className = 'col-3 btn btn info'
			button.innerHTML = 'Atualizar'

			form.appendChild(inputChamado)
			//form2.appendChild(inputChamado)

			form.appendChild(inputId)

			form.appendChild(button)
			//form2.appendChild(button)

			// console.log(form)
			// alert(cd_protocolo)

			 let chamado = document.getElementById('chamado_'+ cd_protocolo)
			chamado.innerHTML =''

			chamado.insertBefore(form, chamado[0])

			//alert(txt_chamado)



		}

		function apagar(cd_protocolo){
			location.href ='todas_tarefas.php?acao=apagar&cd_protocolo='+ cd_protocolo;
		}
		
		
	</script>


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

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="home.php">Home </a></li>
						<li class="list-group-item"><a href="nova_tarefa_menu.php">Novo Chamado</a></li>
						<li class="list-group-item active"><a href="todas_tarefas.php">Todas tarefas</a></li>
						<li class="list-group-item"><a href="empresa_novo.php">Cadastro</a></li>
						<li class="list-group-item"><a href="base_tarefa.php">Base de Conhecimento</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todos Chamados</h4>
								<hr />

								<?php foreach($chamados as $indice => $chamado) { ?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										
										<div class="col-sm-9"id="chamado_<?= $chamado->cd_protocolo?>">
											<?=$chamado->cd_protocolo ?> | <?= $chamado->nm_titulo ?></br><?= $chamado->ds_problema ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger"onclick= "apagar(<?= $chamado->cd_protocolo ?>)"></i>
										<i class="fas fa-edit fa-lg text-info"onclick = "editar(<?=$chamado->cd_protocolo ?>,'<?=$chamado->ds_problema ?>')"></i>
										<!-- <i class="fas fa-check-square fa-lg text-success"></i> -->
									</div>
								</div>

								<?php } ?>
															
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>