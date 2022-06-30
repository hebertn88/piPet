<?php 

include_once"conexao.php";

?>

<html>   

    <body>  
    <?php        

    $g_id = intval($_GET['g_id']); 

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $nivel = $_POST["nivel"];    

    $usuario = "UPDATE cadastro_gerenciador SET g_email = '$email', g_senha = '$senha', g_nivel = '$nivel', g_nome = '$nome' WHERE g_id = '$g_id'";
    $sql_query = $mysqli->query($usuario) or die($mysqli->error);

    if($sql_query)
    echo "<script> location.href='gerenciamento.php';</script>";
    else
    echo "<script> alert('Não foi possível editar o usuário'); location.href='gerenciamento.php';</script>";
    ?>
    
    </body>    
</html>