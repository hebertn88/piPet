<?php

    if (!isset($_SESSION)) session_start();

    include_once"conexao.php";

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>KD meu PET?</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>    
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />        
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    </head>
    <body id="page-top">

        <!-- Menu topo-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                 <?php include "topo.php"; ?>
                </div>
            </div>
        </nav>
        <!-- FIM Menu topo-->

        <!-- Banner -->
        <header class="masthead">
            <div class="container">                             
            </div>
        </header>    
        <!-- FIM Banner -->                  
        
        <?php
            if (isset($_SESSION['msgContent'])) {
            echo '<div class="container p-3">' . $_SESSION['msgContent'] . '</div>';
            }
            unset($_SESSION['msgContent']);
        ?>

                <!-- Parcerias -->
                <?php
        // busca parcerias
            $query = "SELECT * FROM `contacts_msg` WHERE `aprovado` = 1 ORDER BY RAND()";
            $select = $mysqli -> query($query);
        ?>
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Parcerias</h2>
                    <?php
                        if (mysqli_num_rows($select) > 0) {
                    ?>
                        <h3 class="section-subheading text-muted">Aqui estão listados alguns de nossos parceiros.</h3>
                    <?php } ?>
                </div>
                <?php
                    if (mysqli_num_rows($select) > 0) {
                        echo '<ul class="timeline">';
                        $num_linha = 1;
                        while ($parceria = $select->fetch_array()) {
                ?>
                        <li <?php if ($num_linha % 2 == 0) echo 'class="timeline-inverted"'?> >
                            <div class="timeline-image ratio ratio-1x1">
                                <img class="rounded-circle" style="object-fit: cover;" src="upload/parcerias/<?php echo $parceria['imagem']; ?>" alt="Logo <?php echo $parceria['titulo']; ?>" />
                            </div>
                            <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $parceria['titulo']; ?></h4>
                                <h5 class="subheading"><?php echo $parceria['contato_organizacao']; ?></h5>
                            </div>
                            <div class="timeline-body"><p class="text-muted"><?php echo $parceria['msg']; ?></p></div>
                        </div>
                        </li>
                    <?php
                        $num_linha++; 
                        }
                    echo '</ul>';
                    }
                    ?>      
            </div>
        </section>
        <!-- FIM Parcerias -->

        <!-- Contato -->
        <?php include "contato.php"; ?>
        <!-- FIM Contato -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    </body>
</html>