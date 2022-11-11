<?php 
    include_once"conexao.php"; 

    $re_id = intval($_GET['c_id']);

    $sql = "UPDATE cadastro_animal SET c_finalizado = 1 WHERE c_id='$re_id'";
    $sql_query = $mysqli->query($sql) or die($mysqli->error);

    if($sql_query)
    echo "<script> location.href='user.php';</script>";
    else
    echo "<script> alert('Não foi possível finalizar'); location.href='user.php';</script>";
    
?>