
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
							<h4>Base de Conhecimento</h4>
							<hr />

							<form method="post" action="base_controller.php?acao=inserir">

								<div class="form-group">
									<label>Nome do Técnico:</label>
									<select name="tecnico" class="form-control">
												<option value=""></option>
												<?
												$conn = new PDO('mysql:host=localhost;dbname=db_helpdesk', $username='root', $password='');
												$stmt = $conn->prepare('SELECT cd_tecnico, nm_tecnico FROM tb_tecnico');
												$stmt->execute();
												?>

												<? 
												while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
													echo '<option>'. $result['cd_tecnico']. " ". $result['nm_tecnico']. '</option>'. '<br>';	
												}
												?>
										</select>
								</div>

								<div class="form-group">
									<label>Título:</label>
									<input type="text" class="form-control" name="titulo" placeholder="Ex:Titulo do tópico">
								</div>

								<div class="form-group">
					                <label>Descrição:</label>
					                <textarea class="form-control" name="descricao" rows="5"></textarea>									
				                </div>

								<div class="form-group">
									<label>Categoria:</label>
									<input type="text" class="form-control" name="categoria" placeholder="Ex: Solução, contato, Dica">
								</div>

								<div class="form-group">
									<label>Tipo:</label>
									<input type="text" class="form-control" name="tipo" placeholder="Ex:software, Hardware, Windows, linux">
								</div>

							<button class="btn btn-info" onclick="cadastro();">Salvar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>