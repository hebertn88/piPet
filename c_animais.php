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
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Animais</h1>           
          </div>

          <div class="table-responsive">   
                
                <div class="table-responsive">
                <table class="table table-striped table-sm">
                <?php 
                    $consulta = "SELECT * FROM cadastro_animal ORDER BY c_data DESC";
                    $sql = $mysqli->query($consulta) or die($mysqli->error);
                    $conta = mysqli_num_rows($sql);

                    if($conta > 0)
                    {
                ?>
                <thead>
                    <tr>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Situação</th>
                    <th>Raça</th> 
                    <th>Descrição</th>
                    <th>Tamanho</th>
                    <th>Cor</th>                    
                    <th>Endereço</th>
                    <th>Contato</th> 
                    </tr>
                </thead>
                <tbody>                
                    <?php                 
                    while($dado = $sql->fetch_array())    
                    {              
                    ?>
                    <tr>
                    <td><?php echo date('d/m/Y H:i', strtotime($dado["c_data"])); ?></td>
                    <td><?php echo $dado["c_nomeanimal"]; ?></td>
                    <td>
                    <?php if ($dado["c_finalizado"] == 0)
                         { echo 'Em aberto'; } 
                         else { echo 'Finalizado';}                                        
                    ?>
                    </td>
                    <td>
                    <?php if ($dado["c_situacao"] == 1)
                         { echo 'Achado'; } 
                         else { echo 'Perdido';}                                        
                    ?>  
                    </td>  
                    <td>                
                    <?php 
                       $racas = "SELECT  * from cadastro_raca r";
                       $tabela = $mysqli->query($racas) or die($mysqli->error);
                       while($row = $tabela->fetch_array())
                       {          
                        if ($dado["c_raca"] == $row['r_id'])         
                          {                     
                            echo $row['r_nome'];                                           
                    } }?>                
                    </td>
                    <td><?php echo $dado["c_descricao"]; ?></td>
                    <td>
                    <?php 
                       $tamanho = "SELECT  * from cadastro_tamanho t";
                       $tabela = $mysqli->query($tamanho) or die($mysqli->error);
                       while($tam = $tabela->fetch_array())
                       {          
                        if ($dado["c_tamanho"] == $tam['t_id'])         
                          {                     
                            echo $tam['t_nome'];                                           
                    } }?> 
                    </td>    
                    <td>
                    <?php 
                       $cor = "SELECT  * from cadastro_cor c";
                       $tabela = $mysqli->query($cor) or die($mysqli->error);
                       while($cores = $tabela->fetch_array())
                       {          
                        if ($dado["id_cor"] == $cores['c_id'])         
                          {                     
                            echo $cores['c_cor'];                                           
                    } }?>     
                    </td>  
                    <td><?php echo $dado["c_endereco"]; ?></td>
                    <td><?php echo $dado["c_contato"]; ?> </td>     
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

    <!-- Ícones -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    

  </body>
</html>
