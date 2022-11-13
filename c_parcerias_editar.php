<?php

  if (!isset($_SESSION)) session_start();

  include_once"conexao.php";

  if (!isset($_SESSION['gerenciadorId'])) {
       session_destroy();      
       header("Location: admin.php"); exit;
  }
  $id = $_GET['id'];

  $query = "SELECT * FROM `contacts_msg` WHERE `id` = $id";
  $select = $mysqli -> query($query);

  if (mysqli_num_rows($select) == 0) {
      $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
      Parceria não encontrada!</div>';
      header("Location: ../c_parcerias.php"); exit;    
  } 

  $parceria = $select->fetch_array();
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
          <?php include "menuadmin.php"; ?>           
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

          <?php
            if (isset($_SESSION['msgContent'])) {
              echo '<div class="container p-3">' . $_SESSION['msgContent'] . '</div>';
            }
            unset($_SESSION['msgContent']);
          ?>

          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Editar Parceria</h1>           
          </div>
          <form action="parcerias_editar.php?id=<?php echo $parceria['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $parceria['nome']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $parceria['email']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $parceria['telefone']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="titulo" class="form-label">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $parceria['titulo']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="msg" class="form-label">Descrição</label>
              <input type="text" class="form-control" id="msg" name="descricao" value="<?php echo $parceria['msg']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="contatoOrganizacao" class="form-label">Contato da Organização</label>
              <input type="text" class="form-control" id="contatoOrganizacao" name="contatoOrganizacao" value="<?php echo $parceria['contato_organizacao']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="imagem" class="form-label">Logo</label>
              <input class="form-control" type="file" accept=".png, .jpg, .jpeg" id="imagem" name="imagem">
            </div>
            <div class="mb-3">
              <label for="situacao" class="form-label">Situação</label>
              <select class="form-control form-select" aria-label="Situação" id="situacao" name="situacao">
                <option value="0">Pendente</option>
                <option value="1" <?php if ($parceria['aprovado']) echo 'selected'; ?>>Aprovado</option>
              </select>
            </div>
            <div class="d-flex flex-row gap-3 mb-3">
              <div>
                <button type="reset" class="btn btn-warning">Desfazer Alterações</button>
              </div>
              <div class="ms-auto me-0" style="margin-left: 3em;">
                <button type="submit" class="btn btn-primary ms-3">Enviar</button>

                <!-- TODO: fazer logica de edicao parcerias_editar.php -->
              </div>
            </div>
          </form>
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
