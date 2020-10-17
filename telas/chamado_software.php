
<script type="text/javascript">
	function cadastro(){
		alert('Cadastrado com Sucesso');
	}
</script>

	<div class="container app">
		<div class="row">
			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Criar Chamado - Software</h4>
							<hr />
							<form method="post" action="chamado_controler.php?acao=salvar">
								
											<input type="checkbox" name="descricao" value="Atualuzação de software">
												<label>Atualização de software</label>
											
											<input type="checkbox" class="espaco" name="descricao" value="Atualuzação Java">
													<label>Atualização Java</label>
												
											<input type="checkbox" class="espaco" name="descricao" value="Atualuzar Navegador">
												<label>Atualizar Navegador</label>
											
											<input type="checkbox" class="espaco" name="descricao" value="Instalação de antivírus">
													<label>Instalação de Programas</label>
											<br>
											<input type="checkbox" class="espaco" name="descricao" value="Máquina com virus">
												<label>Máquina com vírus</label>
											
											<input type="checkbox" class="espaco" name="descricao" value="Instalação pacote Office">
												<label>Instalação pacote Office </label>
											
											<input type="checkbox" class="espaco" name="descricao" value="Máquina lenta">
												<label>Máquina Lenta</label>
											

								<div class="form-group">
								 <?
									if ($_POST && isset($_POST['descricao'])){
										$descricao = implode(",", $_POST['descricao']);
										
										foreach($descricao as $valor){
												$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
												$stmt = $conn->prepare('insert into tb_chamado(ds_problema)values($valor)');
	 											$stmt->execute();
										}									
									}
			 					 ?>
								</div>
								<div class="form-group">
					 			 <?
									if ($_POST && isset($_POST['descricao'])){
										$descricao = implode(",", $_POST['descricao']);

										foreach($descricao as $valor){
											$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
											$stmt = $conn->prepare('insert into tb_chamado(ds_problema)values($valor)');
											$stmt->execute();
										}									
									}

								 ?>
								</div>

								<div class="form-group">
									<label>Título</label>
									<input type="text" class="form-control" name ="titulo" placeholder="Ex: Máquina não Liga">
								</div>

								<div class="form-group">
									<label>Cliente:</label>

									<select name="cliente" class="form-control">
										<option value=""></option>
										<?
										$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
										$stmt = $conn->prepare('SELECT nm_empresa FROM tb_empresa');
										$stmt->execute();
										?>

										<? 
										while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
											echo '<option>' .$result['nm_empresa']. '</option>'. '<br>';	
										}
										?>
									</select>

								</div>

								<div class="form-group">
									<label>Acompanhamento por e-mail:</label>
									<select name="acompanhamento_cliente" class="form-control">
										<option value=""> </option>
										<option value="Sim">Sim</option>
										<option value="Não">Não</option>
									</select>
								</div>

								<div class="form-group">
									<label> Data Abertura: </label>
									<br>
									<?
									date_default_timezone_set('America/Sao_Paulo');
									?>
									<input type="text" name="data_abertura" class="form-control" value="<?=
									date('d/m/Y')
									?>">
								</div>

								<div class="form-group">
									<label> Data Agendamento: </label>
									<input type="text" class="form-control" name ="data_agendamento" placeholder="" id="calendario">
								</div>

								<div class="form-group">
									<label>Urgência:</label>
									<select name="acompanhamento_cliente" class="form-control">
										<option value=""> </option>
										<option value="Baixo">Baixo</option>
										<option value="Medio">Médio</option>
										<option value="Alto">Alto</option>
									</select>
								</div>

								<div class="form-group">
									<label>Status:</label>
									<select name="acompanhamento_cliente" class="form-control">
										<option value=""> </option>
										<option value="Em andamento">Em andamento</option>
										<option value="Aguardando retirada">Aguardando retirada</option>
										<option value="Aguarando peça">Aguarando peça</option>
										<option value="Finalizado">Finalizado</option>
									</select>
								</div>

								<div class="form-group">
									<label>Autor:</label>

									<select name="atendente" class="form-control">
										<option value=""></option>
										<?
										$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
										$stmt = $conn->prepare('SELECT nm_atendente FROM tb_atendente');
										$stmt->execute();
										?>

										<? 
										while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
											echo '<option>' .$result['nm_atendente']. '</option>'. '<br>';	
										}
										?>
									</select>

								</div>

								<div class="form-group">
									<label>Acompanhamento:</label>

									<select name="tecnico" class="form-control">
										<option value=""></option>
										<?
										$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
										$stmt = $conn->prepare('SELECT nm_tecnico FROM tb_tecnico');
										$stmt->execute();
										?>

										<? 
										while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
											echo '<option>' .$result['nm_tecnico']. '</option>'. '<br>';	
										}
										?>
									</select>

								</div>

								<div class="form-group">
									<label> Observação: </label>										
									<textarea class="form-control"></textarea>
								</div>

								<button class="btn btn-info" onclick="cadastro();">Salvar</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>