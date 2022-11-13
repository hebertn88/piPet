<?php
/*
  if (!isset($_SESSION['usuarioId'])) {
       session_destroy();      
       header("Location: index.php");
       exit;
  }
*/
  if (!isset($_SESSION)) session_start();
  date_default_timezone_set('America/Sao_Paulo');

  include_once"conexao.php";

  // verifica se ID passado é válido
  if (!isset($_GET['id']) || $_GET['id'] == null || $_GET['id'] <= 0) {
    $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
    Parceria inválida ou não informada!</div>';
    header("Location: ../c_parcerias.php"); exit;
  }

  $id = $_GET['id'];

  // verifica se parceria existe
  $query = "SELECT * FROM `contacts_msg` WHERE `id` = $id";
  $select = $mysqli -> query($query);

  if (mysqli_num_rows($select) == 0) {
    $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
    Parceria não encontrada!</div>';
    header("Location: ../c_parcerias.php"); exit;    
  } 

  $parceria = $select->fetch_array();

  //verifica se foi enviado imagem logo
  if ($_FILES['imagem']['name'] != ""){
     $anexo = pathinfo($_FILES['imagem']['name']);
     $extensao = strtolower($anexo['extension']);
 
     $ext_validas = array("jpeg", "jpg", "png");
     if (!in_array($extensao, $ext_validas)) { //se extensao nao for valida retorna
         $_SESSION["msgContent"] = '<div class="alert alert-danger" role="alert">
         Formato de Arquivo não suportado. Por favor, tente novamente!
         '. $extensao . '</div>';   // conteudo da mensagem
         header('Location: index.php'); exit;
     }
 
     $novo_nome = md5(time()) . "." . $extensao;
     $diretorio = "upload/parcerias/";
   }

    if ($_FILES['imagem']['name'] != ""){
      if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome)) {
        $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
        Erro ao Salvar Arquivo. Por favor, tente novamente!
        </div>'; // conteudo da mensagem
        header('Location: index.php'); exit;
      }

      $imagem_old = $parceria['imagem'];
      $imagem = $novo_nome;

      $query = "UPDATE `contacts_msg` SET `imagem` = '$imagem' WHERE `id` = " .$parceria['id'];
      $update = $mysqli -> query($query);

      if (!$update) {
        $msg_erro = 'Query: <code>' . $query . '</code><br>Erro: <code>' . $mysqli->error . '</code>';

        $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
        Ocorreu um erro ao atualizar a logo. Por favor, tente novamente!<br>' .
        $msg_erro . '</div>'; // conteudo da mensagem
        
        unlink($diretorio.$novo_nome);
        header('Location: c_parcerias.php'); exit;
      } else {
        unlink($diretorio.$imagem_old);
      }
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $titulo = $_POST['titulo'];
    $msg = $_POST['descricao'];
    $contato_organizacao = $_POST['contatoOrganizacao'];
    $aprovado = $_POST['situacao'];

    $query = "UPDATE `contacts_msg` SET `nome` = '$nome', `email` = '$email', `telefone` = '$telefone', `titulo` = '$titulo', `msg` = '$msg', `contato_organizacao` = '$contato_organizacao', `aprovado` = $aprovado WHERE `id` = " . $parceria['id'];
    $update = $mysqli -> query($query);

    if ($update){
      $_SESSION['msgContent'] = '<div class="alert alert-success" role="alert">
      Parceria atualizada com Sucesso!
      </div>'; // conteudo da mensagem
    } else {
      $msg_erro = 'Query: <code>' . $query . '</code><br>Erro: <code>' . $mysqli->error . '</code>';

      $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
      Ocorreu um erro ao atualizar parceria. Por favor, tente novamente!<br>' .
      $msg_erro . '</div>'; // conteudo da mensagem
      
      unlink($diretorio.$novo_nome);
    }

    header('Location: c_parcerias.php'); exit;