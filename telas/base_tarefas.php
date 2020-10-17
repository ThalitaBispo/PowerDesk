<?php

$acao = 'recuperar';
require 'base_controller.php';
?>

<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Base de Conhecimento</title>

	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<script>
		function editar(cd_base_conhecimento, txt_titulo){
		//criar um form de edição
		let form = document.createElement('form')
		form.action = 'base_controller.php?acao=atualizar'
		form.method = 'post'
		form.className ='row'

		//criar um input para entrada do texto
		let inputBase = document.createElement('input')
		inputBase.type = 'text'
		inputBase.name = 'titulo'
		inputBase.className = 'col-9 form-control'
		inputBase.value = txt_titulo

		//criar um input hidden para guardar o cd_base_conhecimento do titulo
		let inputCD = document.createElement('input')
		inputCD.type = 'hidden'
		inputCD.name = 'codigo'
		inputCD.value = cd_base_conhecimento

		//criar um button para envio do form
		let button = document.createElement('button')
		button.type = 'submit'
		button.className = 'col-3 btn btn-info'
		button.innerHTML = 'Atualizar'

		//incluir inpuBase no form
		form.appendChild(inputBase)

		//incluir inputCD no form
		form.appendChild(inputCD)

		//incluir button no form
		form.appendChild(button)

		//teste
		//console.log(form)

		//selecionar a div base
		let base = document.getElementById('base_'+cd_base_conhecimento)

		//limpar o texto da tarefa para inclusão do form
		base.innerHTML = ''

		//incluir form na página
		base.insertBefore(form, base[0])
		}

		function remover (cd_base_conhecimento) {
			location.href = 'base_tarefas.php?acao=remover&cd_base_conhecimento='+cd_base_conhecimento;
		}

		function edição(cd_base_conhecimento){
			//location.href = 'edita_base.php?cd_base_conhecimento';
			location.href='edita_base.php?id=' + cd_base_conhecimento;
		}

		function visualizar(cd_base_conhecimento){
			//location.href = 'edita_base.php?cd_base_conhecimento';
			location.href='consulta_base.php?id=' + cd_base_conhecimento;
		}

	</script>
</head>

<body>
	<div class="container app">
		<div class="row">
			<div class="col-sm-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Base de Conhecimento</h4>
							<hr />

							<? foreach ($bases as $indice => $base){ ?>

								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="base_<?= $base->cd_base_conhecimento ?>">
										<?= $base->nm_titulo ?> (<?= $base->cd_base_conhecimento ?>) 
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $base->cd_base_conhecimento ?>)"></i>

										<i class="fa fa-eye fa-lg" onclick="visualizar(<?= $base->cd_base_conhecimento ?>);"></i>
										
										<i class="fas fa-edit fa-lg text-info" onclick="edição(<?= $base->cd_base_conhecimento ?>);"></i>
										<!-- <i class="fas fa-check-square fa-lg text-success"></i> -->
									</div>
								</div>
							<? } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>