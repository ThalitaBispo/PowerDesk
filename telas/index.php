<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Power Desk</title>

   <link rel="shortcut icon" href="img/logo_powerdesk2.png" >
   <link rel="stylesheet" type="text/css" href="css/estilo_css.css">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
   <div class="sidenav">
      <div class="login-main-text">
         <img src="img/logo_powerdesk2.png" width="100" height="100" class="logo" alt="">
         <h1>Power Desk<br></h1>
         <h6>Sistema Help Desk!</h6>
      </div>
   </div>
   <div class="main">
      <div class="col-md-6 col-sm-12">         
         <div class="login-form">
            <form method="post" action="valida_login.php">
               <div class="form-group">
                  <label>Usuário</label>
                  <input name="usuario" type="text" class="form-control" placeholder="Usuário">
               </div>
               <div class="form-group">
                  <label>Senha</label>
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
               </div>
               <?php
                if(isset($_SESSION['nao_autentico'])):
               ?>
               <div class="alert alert-danger" role="alert">
                <img src="img\icone_alert.png" width="16" height="16" class="" alt="">
                  Usuário ou senha inválido(s).
               </div>
               <?php
                endif;
                unset($_SESSION['nao_autentico']);
               ?>
               <button type="submit" class="btn btn-black">Entrar</button>
               <!-- <button type="submit" class="btn btn-secondary">Registrar</button> -->
            </form>
         </div>
      </div>
   </div>
</body>
</html>