<?php

$acao = 'visualizar';
require 'empresa_controller.php';


// echo '<pre>';
// print_r($empresas);
// echo '</pre>';


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
	
	function remover (cd_empresa) {
		location.href = 'empresa_todos.php?acao=remover&cd_empresa='+cd_empresa;
	}

		function editar(cd_empresa){
			location.href='edita_empresa.php?id=' + cd_empresa;
		}

</script>

</head>

<body>
			<div class="container app">
		<div class="row">
			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							
							<h4>Empresas cadastradas</h4>
							<hr />

							<? foreach ($empresas as $indice => $empresa){ ?>

								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="empresa_<?= $empresa->cd_empresa?>">
										<?=$empresa->nm_empresa ?> (<?=$empresa->cd_empresa ?>) 
									</div>
                                    
                                    <div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $empresa->cd_empresa ?>)"></i>

										<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $empresa->cd_empresa ?>, '<?= $empresa->nm_empresa ?>')"></i>
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