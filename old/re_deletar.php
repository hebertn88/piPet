<?php 
    include_once"conexao.php"; 

    $g_id = intval($_GET['g_id']); 

    $sql = "DELETE FROM cadastro_gerenciador WHERE g_id = '$g_id'";    
    $sql_query = $mysqli->query($sql) or die($mysqli->error);

    if($sql_query)
    echo "<script> location.href='gerenciamento.php';</script>";
    else
    echo "<script> alert('Não foi possível remover'); location.href='gerenciamento.php';</script>";
?>