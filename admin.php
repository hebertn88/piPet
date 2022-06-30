<?php 
    session_start(); 
    include("conexao.php");
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KD meu PET</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap-4.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">

    <!-- Login e senha do gerenciador -->
    <form method="POST" action="validagerenciador.php" class="form-signin">
      <h1 class="h3 mb-3 font-weight-normal">Área de gerenciamento</h1>
      <label for="inputEmail" class="sr-only">Endereço de email</label>
      <input type="email" name="g_email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="g_senha" id="inputPassword" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">        
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button> 
      <?php 
                        if(isset($_SESSION['loginErro'])){
                            echo $_SESSION['loginErro'];
                            unset($_SESSION['loginErro']);
                        }                         
                        if(isset($_SESSION['logindeslogado'])){
                                echo $_SESSION['logindeslogado'];
                                unset($_SESSION['logindeslogado']);
                        }
        ?>    
    </form>
    <!-- FIM Login e senha do gerenciador -->
  </body>
</html>
