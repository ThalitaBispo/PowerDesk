<?php
 session_start();
 //include('verifica_login.php');

  	
?>

	<script type="text/javascript">
		function validacao(){
			if (document.form_login.senha.value == "" || document.form_login.senha.value.length < 6) {
			alert("Preencha o campo senha com no mínimo 6 caracteres!");
			document.form_login.senha.focus();
			return false;
			}
			if (document.form_login.conf_senha.value == "" || document.form_login.conf_senha.value.length < 6) {
				alert("Preencha o campo confirmar senha com no mínimo 6 caracteres!");
				document.form_login.conf_senha.focus();
				return false;
			}
			if(document.form_login.senha.value != document.form_login.conf_senha.value){
				alert('Senhas diferentes');
				document.form_login.senha.focus()
				return false;
			}

			if ($_SESSION['status_cadastro']){
				alert('Cadastrado com Sucesso');

			}
			unset($_SESSION['status_cadastro']);
			
			if($_SESSION['usuario_existe']){
				alert('O usuário ou e-mail já existe. Informe outro e tente novamente');
				return false;
			}
	 		unset($_SESSION['usuario_existe']);
			
		}

		/*function cadastro()/*validar(){
		 	var senha = form_login.senha.value;
		 	var conf_senha = form_login.conf_senha.value;

		 	if(senha == "" || senha.lenght <= 5){
		 		alert('Preencha o campo senha com no mínimo 6 caracteres');
		 		form_login.senha.focus();
		 		return false;
		 	}

		 	if(conf_senha == "" || conf_senha.lenght <= 5){
		 		alert('Preencha o campo senha com no mínimo 6 caracteres');
		 		form_login.conf_senha.focus();
		 		return false;
		 	}

		 	if(senha != conf_senha){
		 		alert('Senhas diferentes');
		 		form_login.senha.focus();
		 		return false;
		 	}

		 	if ($_SESSION['status_cadastro'] ){
				alert('Cadastrado com Sucesso');
			}
			unset( $_SESSION['status_cadastro']);
			
			if($_SESSION['usuario_existe']){
				alert('O usuário ou e-mail já existe. Informe outro e tente novamente');
			}
	 		unset(php $_SESSION['usuario_existe']);
		}
	 /*

	<script type="text/javascript">
		function cadastro(){
			alert('Cadastrado com Sucesso');
	}

	/* <script type="text/javascript">*/
		/*function cadastro(){
			
			if ($_SESSION['status_cadastro']){
				alert('Cadastrado com Sucesso');

			}
			unset($_SESSION['status_cadastro']);
			
			if($_SESSION['usuario_existe']){
				alert('O usuário ou e-mail já existe. Informe outro e tente novamente');
				return false;
			}
	 		unset($_SESSION['usuario_existe']);
		}*/
	</script> 

	<div class="container app">
		<div class="row">
			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Criar Cadastro - LOGIN</h4>
							<hr/>
							<form name= form_login method="POST" action="cadastro_login.php" onsubmit="return validacao();">
								<div class="form-group">
									<label>Usuário:</label>
									<input type="text" class="form-control" name ="usuario" required>
								</div>
								<div class="form-group">
									<label>Email:</label>
									<input type="email" class="form-control" name ="email"required>
								</div>
								<div class="form-group">
									<label>Senha:</label>
									<input type="password" class="form-control" name ="senha">
								</div>
								<div class="form-group">
									<label>Confirmação de senha:</label>
									<input type="password" class="form-control" name ="conf_senha">
								</div>
							 <button class="btn btn-info" onclick="cadastro();">Salvar</button>	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
