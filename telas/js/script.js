$(document).ready(() => {

	$('#suporte').on('click', () => {
		//$('#pagina').load('suporte.html')

		/*$.get('suporte.html', data => { 
			$('#pagina').html(data)
		})*/

		$.post('suporte.html', data => { 
			$('#pagina').html(data)
		})
	})

  // NOVO CHAMADO -------------
	$('#hardware').on('click', () => {

		$.post('chamado_hardware.php', data => { 
			$('#pagina').html(data)
		})
	})

	$('#software').on('click', () => {
		
		$.post('chamado_software.php', data => { 
			$('#pagina').html(data)
		})
	})

	$('#outros').on('click', () => {
		
		$.post('nova_tarefa.php', data => { 
			$('#pagina').html(data)
		})
	})

  // BASE DE CONHECIMENTOS
	$('#topicos').on('click', () => {
		
		$.post('base_tarefas.php', data => { 
			$('#pagina').html(data)
		})
	})

	$('#criarTopico').on('click', () => {
		
		$.post('base_tarefa.php', data => { 
			$('#pagina').html(data)
		})
	})

  // CADASTRO
	$('#empresa').on('click', () => {

		$.post('empresa_novo.php', data => { 
			$('#pagina').html(data)
		})
	})

	$('#todaempresa').on('click', () => {

		$.post('empresa_todos.php', data => { 
			$('#pagina').html(data)
		})
	})

	$('#tecnico').on('click', () => {
		
		$.post('cadastro_tecnico.php', data => { 
			$('#pagina').html(data)
		})
	})

	$('#atendente').on('click', () => {
		
		$.post('.php', data => { 
			$('#pagina').html(data)
		})
	})

	$('#login').on('click', () => {
		
		$.post('formulario_login.php', data => { 
			$('#pagina').html(data)
		})
	})	

	//ajax
	$('#competencia').on('change', e => {

		let competencia = $(e.target).val()

		$.ajax({
			type: 'GET',
			url: '../chamado/app.php',
			data: `competencia=${competencia}`, //x-www-form-urlencoded
			dataType: 'json',
			success: dados => {
			$('#chamadosAbertos').html(dados.chamadosAbertos)
			$('#chamadosAgendados').html(dados.chamadosAgendados)
			$('#chamadosFechados').html(dados.chamadosFechados) 
			$('#totalChamados').html(dados.totalChamados)  
			},
			error: erro => { console.log(erro) }
		})

		//metodo, url, dados, sucesso, erro
	})	
})

// FORMULARIO LOGIN //

function validacao(){
	
	/*if (document.form_login.usuario.value == "") {
		alert("Atenção, campo usuário vazio!");
		document.form_login.usuario.focus();
		return false;
	}
	if (document.form_login.email.value == "") {
		alert("Atenção, campo e-mail vazio!");
		document.form_login.email.focus();
		return false;
	}
	if (document.form_login.senha.value == "") {
		alert("Atenção, campo senha vazio!");
		document.form_login.senha.focus();
		return false;
	}
	if (document.form_login.conf_senha.value == "") {
		alert("Atenção, campo confirmar senha vazio!");
		document.form_login.conf_senha.focus();
		return false;
	}*
	/*if(document.form_login.senha != document.form_login.conf_senha){
		alert('Senhas diferentes');
 		document.form_login.senha.focus();
 		return false;
	}*/
	// NÃO ESTA FUNCIOANDO 
	/*if (document.form_login.senha.value.lenght < 6) {
		alert("Preencha o campo senha com no mínimo 6 caracteres!");
		document.form_login.senha.focus();
		return false;
	}
	if (document.form_login.conf_senha.value.lenght < 6) {
		alert("Preencha o campo senha com no mínimo 6 caracteres!");
		document.form_login.conf_senha.focus();
		return false;
	}*/
}

// BOTÃO VOLTAR AO TOPO
$(function(){
	$('.back-to-top').hide();

	$(window).scroll(function(){
		if ($(this).scrollTop() > 210) {
			$('.back-to-top').fadeIn();
		}else{
			$('.back-to-top').fadeOut();
		}
	});
	$('.back-to-top').click(function(){
		$('html, body').animate({
			scrollTop: 0
		}, 400);
	});
});

// ICONE MOSTRAR SENHA NO LOGIN
/*var $spnMostrarSenha = $('#spnMostrarSenha');
var $txtSenha = $('#txtSenha');

$spnMostrarSenha
  .on('mousedown mouseup', function() {
    var inputType = $txtSenha.attr('type') == 'password' ? 'text' : 'password';
    $txtSenha.attr('type', inputType);
  })
  .on('mouseout', function() {
    $txtSenha.attr('type', 'password');
  });*/
