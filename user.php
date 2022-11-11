<?php

  if (!isset($_SESSION)) session_start();

  include_once"conexao.php";

  if (!isset($_SESSION['usuarioId'])) {
       session_destroy();      
       header("Location: usuario.php"); exit;
  }
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>KD meu PET?</title>
        
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="assets/img/navbar-logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                 <?php include "topo.php"; ?> 
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">             
            </div>
        </header>        

        <!-- Área de usuário -->
        <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">                
            <?php include "menuuser.php"; ?> 
            </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Área do usuário</h1>           
            </div>
   

            <div class="table-responsive">   
                
                <div class="table-responsive">
                <table class="table table-striped table-sm">
                <?php 
                    $consulta = "SELECT * FROM cadastro_animal WHERE c_usuario = '". $_SESSION['usuarioId']."' ORDER BY c_id ASC";
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
                    <th>Ações</th>
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
                    <td>
                    <a style="text-decoration:none" href="javascript: if(confirm('Tem certeza que deseja FINALIZAR?'))
                    location.href='re_finalizar.php?p=editar&c_id=<?php echo $dado['c_id']; ?>';">
                    <img src="img/check.png" height="20" width="20">
                    </a>
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
       <!-- FIM Área de usuário -->

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

    
        <!-- Footer-->
        <footer class="footer2 py-4">
            <div class="container">
                <div class="row align-items-center">
                   <!-- <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2022</div>-->
                    <div class="col-lg-4 my-3 my-lg-0">
                        <!-- <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>-->
                        <!--<a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>-->
                        <!--<a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>-->
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <!--<a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>-->
                        <!--<a class="link-dark text-decoration-none" href="#!">Terms of Use</a>-->
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->
        <script src="js/scripts.js"></script> 
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        
    </body>
</html>