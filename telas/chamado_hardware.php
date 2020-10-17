	
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

								<h4>Criar Chamado - Hardware</h4>
								<hr />

					<form method="post" action="chamado_hardware_controller.php?acao=salvar">

									<input type="checkbox" name="descricao" value="Máquina nao liga">
									<label>Máquina não liga</label>
								
									<input type="checkbox" class="espaco" name="descricao" value="Liga mas não transmite sinal de video">
									<label>Liga mas não transmite sinal de vídeo</label>

									<input type="checkbox" name="descricao" class="espaco" value="Fonte queimada">
									<label>Fonte queimada</label>

									<br>
								
									<input type="checkbox" name="descricao" value="Máquina bipando">
									<label>Máquina bipando</label>

									<input type="checkbox" name="descricao" class="espaco" value="HD danificado">
									<label>HD danificado</label>

									<input type="checkbox" name="descricao" class="espaco" value="Placa mãe com problema">
									<label>Placa mãe com problema</label>

									<input type="checkbox" name="descricao" class="espaco" value="USB não funciona">
									<label>USB não funciona</label>

									<br>

									<input type="checkbox" name="descricao" value="Máquina super aquecendo">
									<label>Máquina super aquecendo</label>

									<input type="checkbox" name="descricao" class="espaco" value="Teclado / mouse não funciona">
									<label>Teclado / mouse não funciona</label>

									<div class="form-group">
										<?php
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
												<?php
												$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
												$stmt = $conn->prepare('SELECT nm_empresa FROM tb_empresa');
												$stmt->execute();
												?>

												<?php 
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
										<?php
										date_default_timezone_set('America/Sao_Paulo');
										?>
										<input type="text" name="data_abertura" class="form-control" value="<?= date('d/m/Y') ?>">
									</div>

									<div class="form-group">
										<label> Data Agendamento: </label>
										<input type="text" class="form-control" name ="data_agendamento" placeholder="" id="calendario">
									</div>

									<div class="form-group">
										<label>Prioridade:</label>
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
												<?php
												$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
												$stmt = $conn->prepare('SELECT nm_atendente FROM tb_atendente');
												$stmt->execute();
												?>

												<?php
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
										<textarea class="form-control" name="observacao"></textarea>
									</div>

									<button class="btn btn-info" onclick="cadastro();">Salvar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>