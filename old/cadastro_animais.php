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
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Achados</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Perdidos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Parcerias/Doações</a></li>                        
                        <li class="nav-item"><a class="nav-link" href="usuario.php">Usuários</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contato</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php" target="_blank"><i class="bi bi-person"></i></a></li>
                    </ul>
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
                <ul class="nav flex-column">
                    
                <li class="nav-item">
                    <a class="nav-link" href="user.php">
                    <i class="bi bi-heart-fill"></i>
                    Animais
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro_animais.php">
                    <span data-feather="users"></span>
                    Cadastrar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usereditar.php">
                    <i class="bi bi-emoji-heart-eyes"></i> 
                    Dados cadastrais
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sairuser.php">
                    <span data-feather="users"></span>
                    Sair
                    </a>
                </li>
                </ul>            
            </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Área do usuário</h1>           
            </div>
   
            <!-- MENSAGEM RESULTADO DO CADASTRO: SUCESSO OU ERRO -->
            <?php
                if (isset($_SESSION["cadastro_animais"])){
                    if ($_SESSION["cadastro_animais"] == 1){
                        echo '<div class="alert alert-success" role="alert">
                            Animal cadastrado com Sucesso!
                            </div>';
                    } elseif ($_SESSION["cadastro_animais"] == -1){
                        echo '<div class="alert alert-danger" role="alert">
                            Ocorreu um erro ao cadastrar o animal. Por favor, tente novamente!<br>' . 
			                $_SESSION['msg'] . '
                            </div>';
                    } elseif ($_SESSION["cadastro_animais"] == -2){
                        echo '<div class="alert alert-danger" role="alert">
                            Erro ao Salvar Arquivo. Por favor, tente novamente!
                            </div>';
                    } elseif ($_SESSION["cadastro_animais"] == -3){
                        echo '<div class="alert alert-danger" role="alert">
                            Formato de Arquivo não suportado. Por favor, tente novamente!
                            </div>';
                    }
                }
            ?>

            <form action="processa_cadastro_animais.php" method="post" enctype="multipart/form-data">

                <!-- SITUACAO DO ANIMAL -->
                <div class="mb-3">
                    <p>Qual a situação você deseja publicar?</p>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="encontrado" name="situacao" value="1">
                        <label for="encontrado" class="form-check-label">Encontrei um animal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="perdido" name="situacao" value="2">
                        <label for="perdido" class="form-check-label">Meu animal está perdido</label>
                    </div>
                </div>

                <!-- NOME DO ANIMAL -->
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Animal:</label>
                    <input type="text" class="form-control" maxlength="250" id="nome" name="nome" required>
                </div>

                <!-- FOTO DO ANIMAL -->
                <div class="mb-3">
                    <label for="foto" class="form-label">Envie uma foto:</label>
                    <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="foto" name="foto">
                </div>

                <!-- DESCRICAO DO ANIMAL -->
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea rows="5" class="form-control" id="descricao" name="descricao" required placeholder="Descreva o animal, suas condições ou dê qualquer informação que julgue importante. Cada detalhe pode ser importante!"></textarea>
                </div>

                <!-- TIPO DO ANIMAL -->
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo do Animal: </label>
                    <select class="form-select" id="tipo" name="tipo">
                        <option disabled selected value="">Selecione uma Opção</option>
                        <?php 
                            $query = "SELECT * FROM cadastro_tipo ORDER BY t_nome ASC";
                            $sql = $mysqli->query($query) or die($mysqli->error);
                            while ($tp = $sql->fetch_array()){              
                        ?> 
                        <option value="<?php echo $tp["t_id"]; ?>">
                            <?php echo $tp["t_nome"]; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- RACA DO ANIMAL -->
                <div class="mb-3">
                    <label for="raca" class="form-label">Raça: </label>
                    <select class="form-select" id="raca" name="raca">
                        <option disabled selected value="">Selecione uma Opção</option>';
                    </select>
                </div>
                
                <!-- TAMANHO DO ANIMAL -->
                <div class="mb-3">
                    <label for="tamanho" class="form-label">Tamanho: </label>
                    <select class="form-select" id="tamanho" name="tamanho">
                        <option disabled selected value="">Selecione uma Opção</option>
                        <?php 
                            $query = "SELECT * FROM cadastro_tamanho ORDER BY t_nome ASC";
                            $sql = $mysqli->query($query) or die($mysqli->error);
                            while ($tm = $sql->fetch_array()){              
                        ?> 
                        <option value="<?php echo $tm["t_id"]; ?>">
                            <?php echo $tm["t_nome"]; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>                

                <!-- COR DO ANIMAL -->
                <div class="mb-3">
                    <label for="cor" class="form-label">Cor: </label>
                    <select class="form-select" id="cor" name="cor">
                        <option disabled selected value="">Selecione uma Opção</option>
                        <?php 
                            $query = "SELECT * FROM cadastro_cor ORDER BY c_cor ASC";
                            $sql = $mysqli->query($query) or die($mysqli->error);
                            while ($cr = $sql->fetch_array()){              
                        ?> 
                        <option value="<?php echo $cr["c_id"]; ?>">
                            <?php echo $cr["c_cor"]; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- ENDERECO DO ANIMAL -->
                <div class="mb-3">
                    <label for="endereco" class="form-label">Localização:</label>
                    <input type="text" class="form-control" maxlength="200" id="endereco" name="endereco" placeholder="Informe onde encontrou ou viu o animal pela última vez.">
                </div>

                <!-- CONTATO -->
                <div class="mb-3">
                    <label for="contato" class="form-label">Contato:</label>
                    <input type="text" class="form-control" maxlength="200" id="contato" name="contato" placeholder="Infome como as pessoas podrão entrar em contato.">
                </div>

                <!-- BOTAO ENVIA -->
                <input type="submit" class="btn btn-primary" value="Enviar">
            </form>
                       
            </div>
            </main>
        </div>
        </div>
       <!-- FIM Área de usuário -->   

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <!-- BUSCA RACAS AO ALTERAR TIPO DO ANIMAL -->
        <script>
            $(document).ready(function() {
                $('#tipo').on('change', function() {
                    var tipo_id = this.value;
                    $.ajax({
                        url: "busca_racas.php",
                        type: "POST",
                        data: {
                            tipo_id: tipo_id
                        },
                        cache: false,
                        success: function(result) {
                            $("#raca").html(result);
                        }
                    });
                });
            });
      </script>

    </body>
</html>

<?php
    unset($_SESSION["cadastro_animais"]);
?>