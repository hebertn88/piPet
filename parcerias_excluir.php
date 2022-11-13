<?php

if (!isset($_SESSION)) session_start();
date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['gerenciadorId'])) {
     session_destroy();      
     header("Location: index.php");
     exit;
}

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

// exclui parceria
$query = "DELETE FROM `contacts_msg` WHERE `id` = " . $parceria['id'];
$delete = $mysqli -> query($query);

if ($delete){
    $_SESSION['msgContent'] = '<div class="alert alert-success" role="alert">
    Parceria excluída com sucesso!</div>';
    unlink('upload/parcerias/' . $parceria['imagem']);
} else {
    $msg_erro = 'Query: <code>' . $query . '</code><br>Erro: <code>' . $mysqli->error . '</code>';

    $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
    Ocorreu um erro excluir a Parceria. Por favor, tente novamente!<br>' .
    $msg_erro . '</div>';
}
header("Location: ../c_parcerias.php"); exit; 

