
		<script type="text/javascript">
		function cadastro(){
			alert('Cadastrado com Sucesso');
		}
	</script>


	<div class="col-md-9">
		<div class="container pagina">
			<div class="row">
				<div class="col">
					<h4>Criar Chamado</h4>
					<hr />
					<form method="post" action="chamado_controler.php?acao=salvar">
						<div class="form-group">
							<label>Título</label>
							<input type="text" class="form-control" name ="titulo" placeholder="Ex: Máquina não Liga">
						</div>
						<div class="form-group">
							<label>Descrição do Chamado:</label>
							<br>
							<textarea name="descricao" rows="4" cols="107" class="form-control"></textarea>
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
							<label>Acompanhamento por e-mail: </label>
							<select name="acompanhamento_cliente" class="form-control">
								<option></option>
								<option>Sim</option>
								<option>Não</option>
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
							<label>Tipo: </label>
							<select class="form-control">
								<option></option>
								<option>Rede</option>
								<option>Hospedagem</option>
								<option>Outro</option>
							</select>
						</div>
						<div class="form-group">
							<label> Urgência: </label>
							<select class="form-control">
								<option></option>
								<option>Alta</option>
								<option>Média</option>
								<option>Baixa</option>
							</select>
						</div>
						<div class="form-group">
							<label> Data Abertura: </label>
							<br>
							<?
							date_default_timezone_set('America/Sao_Paulo');
							?>
							<input  name="data_abertura" type="text" class="form-control" value="<?=date('d/m/Y')?>">
						</div>
						<div class="form-group">
							<label> Data Agendamento: </label>
							<input type="text" class="form-control" name ="data_agendamento" placeholder="" id="calendario">
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
</body>
</html>