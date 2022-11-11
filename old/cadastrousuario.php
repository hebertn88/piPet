<?php 
    session_start(); 
    include("conexao.php");
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
               <!--  <div class="masthead-subheading"></div>-->
               <!-- <div class="masthead-heading text-uppercase"></div> -->               
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Cadastro de Usuário</h2>
                </div>
                <div class="row text-center">
                   
               <!-- Editando os cadastros -->
               <form action="gerarnovouser.php" method="post" enctype="multipart/form-data">
               <div class="p-3 mb-2 bg-light text-dark container">  
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome completo:</label>
                    <input type="text" class="form-control" required name="nome">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" required name="email">
                </div>

                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" required name="endereco">
                </div>

                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" required name="telefone">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" required name="senha">
                </div>  
                
                <div align="center"> 
                    <button type="submit" class="btn btn-secondary">Cadastrar</button>
                </div>
            </div>
            </form> 
            <!-- FIM Editando os cadastros --> 
                
            </div>
        </section>
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
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
