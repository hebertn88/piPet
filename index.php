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
        alteracao de teste
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
        
        <!-- Achados -->
        <section class="page-section bg-light" id="portfolio">
            <div class="container" id="achados">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Achados</h2>
                    <h3 class="section-subheading text-muted">Últimos animais achados publicados em nosso site.</h3>
                </div>
                <?php
                    $query_achados = "SELECT a.*,
                                             t.t_nome,
                                             r.r_nome,
                                             c.c_cor,
                                             u.u_nomecompleto,
                                             tp.t_nome
                                        FROM `cadastro_animal` a,
                                             `cadastro_tamanho` t,
                                             `cadastro_raca` r,
                                             `cadastro_cor` c,
                                             `cadastro_usuario` u,
                                             `cadastro_tipo` tp
                                       WHERE a.c_tamanho = t.t_id
                                         AND a.c_raca = r.r_id
                                         AND a.id_cor = c.c_id
                                         AND a.c_usuario = u.u_id
                                         AND r.r_tipos = tp.t_id
                                         AND a.c_situacao = 1
                                         AND a.c_finalizado = 0
                                    ORDER BY a.c_data DESC
                                       LIMIT 6";
                    $achados = $mysqli->query($query_achados)->fetch_all(MYSQLI_ASSOC);
                ?>
                <div class="row">
                    <?php
                        $item = 1;
                        foreach ($achados as $animal) {              
                    ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#achadosModal<?php echo $item; ?>">
                                <div class="portfolio-hover" style="z-index:1;">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <div class="ratio ratio-1x1"><img style="object-fit: cover;"
                                <?php
                                    if ($animal['c_foto'] != ""){
                                        echo 'src="upload/'. $animal['c_foto'] .'"'; 
                                    } else {
                                        echo 'src="assets/img/sem_imagem.png"';
                                    }
                                ?>
                                    alt="..." /></div>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $animal['c_nomeanimal']; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if ($item == 5) {
                            break;
                        }
                        $item++;
                        }
                        if (count($achados) > 5) {
                    ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- VER MAIS -->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/mais_resultados.png" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Ver Mais...</div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- FIM Achados -->

        <!-- Perdidos -->
        <section class="page-section bg-light" id="portfolio">
            <div class="container" id="perdidos">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Perdidos</h2>
                    <h3 class="section-subheading text-muted">Últimos animais perdidos publicados em nosso site.</h3>
                </div>
                <?php
                    $query_perdidos = "SELECT a.*,
                                             t.t_nome,
                                             r.r_nome,
                                             c.c_cor,
                                             u.u_nomecompleto,
                                             tp.t_nome
                                        FROM `cadastro_animal` a,
                                             `cadastro_tamanho` t,
                                             `cadastro_raca` r,
                                             `cadastro_cor` c,
                                             `cadastro_usuario` u,
                                             `cadastro_tipo` tp
                                       WHERE a.c_tamanho = t.t_id
                                         AND a.c_raca = r.r_id
                                         AND a.id_cor = c.c_id
                                         AND a.c_usuario = u.u_id
                                         AND r.r_tipos = tp.t_id
                                         AND a.c_situacao = 2
                                         AND a.c_finalizado = 0
                                    ORDER BY a.c_data DESC
                                       LIMIT 6";
                    $perdidos = $mysqli->query($query_perdidos)->fetch_all(MYSQLI_ASSOC);
                ?>
                <div class="row">
                    <?php
                        $item = 1;
                        foreach ($perdidos as $animal) {              
                    ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#perdidosModal<?php echo $item; ?>">
                                <div class="portfolio-hover" style="z-index:1;">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <div class="ratio ratio-1x1"><img style="object-fit: cover;"
                                <?php
                                    if ($animal['c_foto'] != ""){
                                        echo 'src="upload/'. $animal['c_foto'] .'"'; 
                                    } else {
                                        echo 'src="assets/img/sem_imagem.png"';
                                    }
                                ?>
                                    alt="..." /></div>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $animal['c_nomeanimal']; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if ($item == 5) {
                            break;
                        }
                        $item++;
                        }
                        if (count($perdidos) > 5) {
                    ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- VER MAIS -->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/mais_resultados.png" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Ver Mais...</div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- FIM Perdidos -->


        <!-- Parcerias -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Parcerias & Doações</h2>
                    <h3 class="section-subheading text-muted">Aqui estão listados alguns de nossos parceiros e doações</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/parceriasedoacoes/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Desde Janeiro de 2022</h4>
                                <h4 class="subheading">APAP Penápolis</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Nossa parceira APAP é uma instituição sem fins lucrativos, fundada em 28 de agosto de 1995, visando proteção dos animais, cuidados com o meio ambiente e qualidade da saúde pública.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/parceriasedoacoes/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Doado em Março de 2022</h4>
                                <h4 class="subheading">Doação de rações</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Foram doados 08 sacos de ração de 20 kg, que ajudará os nossos pets por 2 meses.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/parceriasedoacoes/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Desde Abril de 2022</h4>
                                <h4 class="subheading">PetMed</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">A PetMed é nossa parceira e nos auxiliar em atendimentos de pets acolhidos em situações críticas de abandono.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/parceriasedoacoes/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Desde Maio de 2022</h4>
                                <h4 class="subheading">Caninos Petshop</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">A Caninos Petshop também é nossa parceira e nos da suporte para manter a vacinação dos nossos pets em dia.</p></div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- FIM Parcerias -->       
        
        <!-- Contato -->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contato para Parcerias</h2>
                </div>
                
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Nome -->
                                <input class="form-control" id="name" type="text" placeholder="Seu nome" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">Nome é obrigatório.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email-->
                                <input class="form-control" id="email" type="email" placeholder="Seu e-mail" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">E-mail é obrigatório.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">E-mail não é válido.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Seu telefone" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Telefone é obrigatório.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Mensagem-->
                                <textarea class="form-control" id="message" placeholder="Insira sua mensagem" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Mensagem é obrigatória.</div>
                            </div>
                        </div>
                    </div> 
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Mensagem enviada com sucesso!</div>
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Erro ao enviar a mensagem!</div></div>
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Enviar</button></div>
                </form>
            </div>
        </section>
        <!-- FIM Contato -->

        <!-- Rodapé -->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 my-3 my-lg-0">
                    </div>
                    <div class="col-lg-4 text-lg-end">
                    </div>
                </div>
            </div>
        </footer>
        <!-- FIM Rodapé -->

        <!-- ACHADOS Modals-->
        <?php
            $item = 1;
            foreach ($achados as $animal) {
        ?>
        <div class="portfolio-modal modal fade" id="achadosModal<?php echo $item; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase"><?php echo $animal['c_nomeanimal']; ?></h2>
                                    <p class="item-intro text-muted"><strong>Enviado por:</strong> <?php echo $animal['u_nomecompleto']; ?>
                                    <br><strong>Em:</strong> <?php echo date("d/m/Y H:i:s", strtotime($animal['c_data'])); ?></p>
                                    <img class="img-fluid d-block mx-auto"
                                        <?php
                                            if ($animal['c_foto'] != ""){
                                                echo 'src="upload/'. $animal['c_foto'] .'"'; 
                                            } else {
                                                echo 'src="assets/img/sem_imagem.png"';
                                            }
                                        ?>
                                        alt="..." />
                                    <p><?php echo $animal['c_descricao']; ?></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Tamanho:</strong>
                                            <?php echo $animal['t_nome']; ?>
                                        </li>
                                        <li>
                                            <strong>Raça:</strong>
                                            <?php echo $animal['r_nome']; ?>
                                        </li>
                                        <li>
                                            <strong>Cor:</strong>
                                            <?php echo $animal['c_cor']; ?>
                                        </li>
                                        <li>
                                            <?php
                                                if ($animal['c_endereco'] != ""){ ?>
                                            <strong>Localização:</strong>
                                            <?php echo $animal['c_endereco'];
                                            } ?>
                                        </li>
                                        <li>
                                            <?php
                                                if ($animal['c_contato'] != ""){ ?>
                                            <strong>Contato:</strong>
                                            <?php echo $animal['c_contato'];
                                            } ?>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        voltar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($item == 5) {
                break;
            }
            $item ++;
            }
        ?>
        <!-- FIM ACHADOS Modals-->

        <!-- PERDIDOS Modals-->
        <?php
            $item = 1;
            foreach ($perdidos as $animal) {
        ?>
        <div class="portfolio-modal modal fade" id="perdidosModal<?php echo $item; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase"><?php echo $animal['c_nomeanimal']; ?></h2>
                                    <p class="item-intro text-muted"><strong>Enviado por:</strong> <?php echo $animal['u_nomecompleto']; ?>
                                    <br><strong>Em:</strong> <?php echo date("d/m/Y H:i:s", strtotime($animal['c_data'])); ?></p>
                                    <img class="img-fluid d-block mx-auto"
                                        <?php
                                            if ($animal['c_foto'] != ""){
                                                echo 'src="upload/'. $animal['c_foto'] .'"'; 
                                            } else {
                                                echo 'src="assets/img/sem_imagem.png"';
                                            }
                                        ?>
                                        alt="..." />
                                    <p><?php echo $animal['c_descricao']; ?></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Tamanho:</strong>
                                            <?php echo $animal['t_nome']; ?>
                                        </li>
                                        <li>
                                            <strong>Raça:</strong>
                                            <?php echo $animal['r_nome']; ?>
                                        </li>
                                        <li>
                                            <strong>Cor:</strong>
                                            <?php echo $animal['c_cor']; ?>
                                        </li>
                                        <li>
                                            <?php
                                                if ($animal['c_endereco'] != ""){ ?>
                                            <strong>Localização:</strong>
                                            <?php echo $animal['c_endereco'];
                                            } ?>
                                        </li>
                                        <li>
                                            <?php
                                                if ($animal['c_contato'] != ""){ ?>
                                            <strong>Contato:</strong>
                                            <?php echo $animal['c_contato'];
                                            } ?>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Voltar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if ($item == 5) {
                break;
            }
            $item ++;
            }
        ?>
        <!-- FIM PERDIDOS Modals-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    </body>
</html>