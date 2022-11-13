<?php

  if (!isset($_SESSION)) session_start();

  include_once"conexao.php";

  if (!isset($_SESSION['gerenciadorId'])) {
       session_destroy();      
       header("Location: admin.php"); exit;
  }
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
            <h1 class="h2">Parcerias</h1>           
          </div>

          <div class="table-responsive">   
                
                <div class="table-responsive">
                <table class="table table-striped table-sm">
                <?php 
                    $consulta = "SELECT * FROM contacts_msg ORDER BY created DESC";
                    $sql = $mysqli->query($consulta) or die($mysqli->error);
                    $conta = mysqli_num_rows($sql);

                    if($conta > 0)
                    {
                ?>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Mensagem</th>
                    <th>Data</th> 
                    <th>Telefone</th>
                    <th>Situação</th>
                    <th>Ações</th>
                    </tr>
                </thead>
                <tbody>                
                    <?php                 
                    while($dado = $sql->fetch_array())    
                    {              
                    ?>
                    <tr>
                    <td><?php echo $dado["id"]; ?></td>
                    <td><?php echo $dado["nome"]; ?></td>
                    <td><?php echo $dado["email"]; ?></td>
                    <td><?php echo $dado["msg"]; ?></td>
                    <td><?php echo date('d/m/Y H:i', strtotime($dado["created"])); ?></td>
                    <td><?php echo $dado["telefone"]; ?></td>
                    <td>
                      <?php
                        if ($dado['aprovado'] == 0) {
                          echo 'Pendente';
                        } else {
                          echo 'Aprovado';
                        }
                      ?>
                    </td>
                    <td class="text-nowrap actionGroup">
                      <?php
                        if ($dado['aprovado'] == 0) {
                          echo '<a href="parcerias_aprovar.php?id=' . $dado['id'] . '" class="btn btn-success btn-sm text-light" role="button">Aprovar</a>';
                        } else {
                          echo '<a class="btn btn-secondary btn-sm text-light disabled" aria-disabled="true" role="button">Aprovar</a>';

                        }
                      ?>
                      <a href="c_parcerias_editar.php?id=<?php echo $dado['id']; ?>" class="btn btn-primary btn-sm text-light" role="button">Editar</a>
                      <a href="parcerias_excluir.php?id=<?php echo $dado['id']; ?>" class="btn btn-danger btn-sm text-light btn-excluir" role="button">Excluir</a>
                    </td>

                    </tr> 
                    <?php } ?> 
                </tbody>
                <?php } ?> 
                </table>
            </div>
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
    
    <script src="c_parcerias.js"></script>

    <!-- Ícones -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    

  </body>
</html>
