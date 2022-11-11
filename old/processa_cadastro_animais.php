<?php

  if (!isset($_SESSION)) session_start();
  date_default_timezone_set('America/Sao_Paulo');

  include_once"conexao.php";

  if (!isset($_SESSION['usuarioId'])) {
       session_destroy();      
       header("Location: index.php"); exit;
  }

  if ($_FILES['foto']['name'] != ""){
    $anexo = pathinfo($_FILES['foto']['name']);
    $extensao = strtolower($anexo['extension']);

    $ext_validas = array("jpeg", "jpg", "png");
    if (!in_array($extensao, $ext_validas)) { //se extensao nao for valida retorna
        $_SESSION["cadastro_animais"] = -3;   //a tela de cadastro animais com alerta erro
        header('Location: cadastro_animais.php'); exit;
    }

    $novo_nome = md5(time()) . "." . $extensao;
    $diretorio = "upload/";
  }

  $nome = $_POST['nome'];
  $foto = $novo_nome ?? Null;
  $descricao = $_POST['descricao'];
  $usuario = $_SESSION['usuarioId']; 
  $raca = $_POST['raca'];
  $tamanho = $_POST['tamanho'];
  $cor = $_POST['cor'];
  $situacao = $_POST['situacao'];
  $data = date('Y-m-d H:i:s');
  $finalizado = 0;
  $endereco = $_POST['endereco'] ?? Null;
  $contato = $_POST['contato'] ?? Null;

  if ($_FILES['foto']['name'] != ""){
    if (!move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome)) {
      $_SESSION['cadastro_animais'] = -2; //erro ao mover arquivo
      header('Location: cadastro_animais.php'); exit;
    }
  }

  $query = "INSERT INTO `cadastro_animal` (`c_nomeanimal`, `c_foto`, `c_descricao`, `c_usuario`, `c_raca`, `c_tamanho`, `c_data`, `c_finalizado`, `id_cor`, `c_situacao`, `c_endereco`, `c_contato`) VALUES ('$nome' , '$foto' , '$descricao' , $usuario , $raca , $tamanho , '$data' , $finalizado , $cor , $situacao, '$endereco', '$contato')";
  $insert = $mysqli -> query($query);

  if ($insert){
      $_SESSION['cadastro_animais'] = 1; //arquivo e registro banco executado com sucesso
  } else {
      $_SESSION['cadastro_animais'] = -1; // erro ao inserir registro
      $_SESSION['msg'] = 'Query: <code>' . $query . '</code><br>Erro: <code>' . $mysqli->error . '</code>';
      unlink($diretorio.$novo_nome);
  }

header('Location: cadastro_animais.php');
