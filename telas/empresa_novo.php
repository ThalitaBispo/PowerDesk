
<script type="text/javascript">
		function cadastro(){
			alert('Cadastrado com Sucesso');
		}
	</script>

			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Cadastro empresa</h4>
							<hr />

							<form method="post" action="empresa_controller.php?acao=salvar">

								<div class="form-group">
									<label>Nome:</label>
									<input type="text" class="form-control" name="nome" placeholder="Ex: Nome empresa Ltda.">
								</div>

								<div class="form-group">
									<label>CNPJ:</label>
									<input type="text" class="form-control" name="cnpj" placeholder="00.000.000/0000-00">
								</div>

								<div class="form-group">
									<label>Cep:</label>
									<input type="text" placeholder="CEP do Cliente" id="cep" name="cep" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
									<br>
									<input type="button" name="buscaCep" value="Buscar" class="btn btn-info" onclick="pesquisacep(cep.value);">
								</div>

								<div class="form-group">
									<label>Rua:</label>
									<input type="text" name="rua" class="form-control" id="rua">
								</div>

								<div class="form-group">
								    <label>Bairro:</label>
								    <input type="text" name="bairro"  class="form-control" id="bairro">
								</div>

								<div class="form-group">
								<label>Cidade:</label>
								<input type="text" name="cidade" id="cidade" class="form-control">
								</div>

								<div class="form-group">
								<label>Estado:</label>
								<input type="text" name="uf" id="uf" class="form-control">
								</div>

								<div class="form-group">
								<label>Complemento:</label>
								<input type="text" name="complemento" class="form-control">
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