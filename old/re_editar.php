<?php

  if (!isset($_SESSION)) session_start();

  include_once"conexao.php";

  if (!isset($_SESSION['gerenciadorId'])) {
       session_destroy();      
       header("Location: admin.php"); exit;
  }

$g_id = intval($_GET['g_id']); 

$consulta = "SELECT * FROM cadastro_gerenciador where g_id = '$g_id'";
$sql = $mysqli->query($consulta) or die($mysqli->error);
$dado = $sql->fetch_array();  

?>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KD meu PET</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap-4.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Estilos customizados para esse template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">KD meu PET?</a>

      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="sairgerenciador.php">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              
              <li class="nav-item">
                <a class="nav-link" href="tipos.php">
                  <span data-feather="file"></span>
                  Tipos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cores.php">
                  <span data-feather="layers"></span>
                  Cores
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="racas.php">
                  <i class="bi bi-bookmark-heart"></i>
                  Raças
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tamanho.php">
                  <i class="bi bi-bar-chart-steps"></i>
                  Tamanhos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="bi bi-heart-fill"></i>
                  Animais
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="bi bi-building"></i>               
                  Parcerias
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="bi bi-emoji-heart-eyes"></i>                  
                  Usuários
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="gerenciamento.php">
                  <span data-feather="users"></span>
                  Gerenciadores
                </a>
              </li>
            </ul>            
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gerenciadores</h1>           
          </div>

          <div class="table-responsive">
                     

            <!-- Editando novos cadastros -->
            <form action="editarusuario.php?p=editar&g_id=<?php echo $dado['g_id']; ?>" method="post" enctype="multipart/form-data">
            <div class="p-3 mb-2 bg-light text-dark container">  
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome completo:</label>
                    <input type="text" class="form-control" required name="nome" value="<?php echo $dado['g_nome']; ?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" required name="email" value="<?php echo $dado['g_email']; ?>">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" required name="senha" value="<?php echo md5($dado['g_senha']); ?>">
                </div>  
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nível:</label>
                    <input type="text" class="form-control" required name="nivel" value="<?php echo $dado['g_nivel']; ?>">
                </div>
                
                <div align="center"> 
                    <button type="submit" class="btn btn-secondary">Editar o cadastro</button>
                </div>
            </div>
            </form> 
            <!-- FIM Editando novos cadastros --> 


          </div>
        </main>
      </div>
    </div>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="css/bootstrap-4.1.3/assets/js/vendor/popper.min.js"></script>
    <script src="css/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>

    <!-- Ícones -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    

  </body>
</html>
