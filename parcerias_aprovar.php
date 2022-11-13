<?php

if (!isset($_SESSION)) session_start();
date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['gerenciadorId'])) {
     session_destroy();      
     header("Location: index.php");
     exit;
}

include_once"conexao.php";

if (!isset($_GET['id']) || $_GET['id'] == null || $_GET['id'] <= 0) {
    $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
    Parceria inválida ou não informada!</div>';
    header("Location: ../c_parcerias.php"); exit;
}

$id = $_GET['id'];

$query = "SELECT * FROM `contacts_msg` WHERE `id` = $id and aprovado = 0";
$select = $mysqli -> query($query);

if (mysqli_num_rows($select) == 0) {
    $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
    Parceria não encontrada ou já está aprovada!</div>';
    header("Location: ../c_parcerias.php"); exit;    
} 

$parceria = $select->fetch_array();

$query = "UPDATE `contacts_msg` SET `aprovado` = 1 WHERE `id` = " . $parceria['id'];
$update = $mysqli -> query($query);

if ($update){
    $_SESSION['msgContent'] = '<div class="alert alert-success" role="alert">
    Parceria aprovada com sucesso!</div>';
} else {
    $msg_erro = 'Query: <code>' . $query . '</code><br>Erro: <code>' . $mysqli->error . '</code>';

    $_SESSION['msgContent'] = '<div class="alert alert-danger" role="alert">
    Ocorreu um erro aprovar a Parceria. Por favor, tente novamente!<br>' .
    $msg_erro . '</div>';
}
header("Location: ../c_parcerias.php"); exit; 

