<?php

    if (!isset($_SESSION)) session_start();

    include_once"conexao2.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require './lib/vendor/autoload.php';
    include_once './conexao2.php';
    
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($data['SendAddMsg'])) {
      $query_msg = "INSERT INTO contacts_msg (nome, email, msg, created, telefone) VALUES (:nome, :email, :msg, NOW(), :telefone)";
      $add_msg = $conn->prepare($query_msg);
    
      $add_msg->bindParam(':nome', $data['nome'], PDO::PARAM_STR);
      $add_msg->bindParam(':email', $data['email'], PDO::PARAM_STR);
      $add_msg->bindParam(':msg', $data['msg'], PDO::PARAM_STR);
      $add_msg->bindParam(':telefone', $data['telefone'], PDO::PARAM_STR);
    
      $add_msg->execute();
      if ($add_msg->rowCount()) {
        $mail = new PHPMailer(true);
        try {
          $mail->CharSet = 'UTF-8';
          $mail->isSMTP();
          $mail->Host = 'smtp.mailtrap.io';
          $mail->SMTPAuth = true;
          $mail->Username = '7828e9d691f1fc';
          $mail->Password = '2f49b95e7b251f';
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = 2525;
    
          //Enviar e-mail para a pessoa contactante
          $mail->setFrom('atendimento@kdpet.com.br', 'Atendimento');
          $mail->addAddress($data['email'], $data['nome']);
    
          $mail->isHTML(true);
          $mail->Subject = 'Recebi a mensagem de contato';
          $mail->Body = "Prezado(a) " . $data['nome'] . "<br><br>Recebi o seu e-mail.<br>Será lido o mais rápido possível.<br>Em breve será respondido.<br><br>Conteúdo: " . $data['msg'];
          $mail->AltBody = "Prezado(a) " . $data['nome'] . "\n\nRecebi o seu e-mail.\nSerá lido o mais rápido possível.\nEm breve será respondido.\n\nConteúdo: " . $data['msg'];
    
          $mail->send();
    
          $mail->clearAddresses();
    
          //Enviar e-mail para o colaborador da empresa - Substituir e-mail
          $mail->setFrom('atendimento@kdpet.com.br', 'Atendimento');
          $mail->addAddress('igor@kdpet.com.br', 'Igor');
    
          $mail->isHTML(true);
          $mail->Body = "Nome: " . $data['nome'] . "<br>E-mail: " . $data['email'] . "<br>Conteúdo: " . $data['msg'];
          $mail->AltBody = "Nome: " . $data['nome'] . "\nE-mail: " . $data['email'] . "\nConteúdo: " . $data['msg'];
    
          $mail->send();
          unset($data);                    
        } catch (Exception $e) {
          echo "Erro: Mensagem de contato não enviada com sucesso!<br>";
        }
      }
    }
    ?>

        <!-- Contato -->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contato para Parcerias</h2>
                </div>
                
                <form class="add_msg form" method="POST" action="" id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Nome -->
                                <input class="form-control" name="nome" id="name" type="text" placeholder="Seu nome" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">Nome é obrigatório.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email-->
                                <input class="form-control" id="email" name="email" type="email" placeholder="Seu e-mail" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">E-mail é obrigatório.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">E-mail não é válido.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="telefone" name="telefone" type="tel" placeholder="Seu telefone" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Telefone é obrigatório.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Mensagem-->
                                <textarea class="form-control" id="message" name="msg" placeholder="Insira sua mensagem" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Mensagem é obrigatória.</div>
                            </div>
                        </div>
                    </div> 
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Mensagem enviada com sucesso!</div>
                            <br />
                        </div>
                    </div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Erro ao enviar a mensagem!</div></div>
                    <div class="text-center">
                    <input class="btn btn-primary field botao" type="submit" value="Enviar" name="SendAddMsg" />
                   
                </form>
            </div>
        </section>
        <!-- FIM Contato -->