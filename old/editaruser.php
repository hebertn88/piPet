<?php 

include_once"conexao.php";

?>

<html>   

    <body>  
    <?php       

    $u_id = intval($_GET['u_id']); 

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];

    $usuario = "UPDATE cadastro_usuario SET u_email = '$email', u_nomecompleto = '$nome', u_senha = '$senha', 
    u_endereco = '$endereco', u_telefone = '$telefone' WHERE u_id = '$u_id'";
    $sql_query = $mysqli->query($usuario) or die($mysqli->error);

    if($sql_query)
    echo "<script> location.href='sairuser.php';</script>";
    else
    echo "<script> alert('Não foi possível editar o usuário'); location.href='sairuser.php';</script>";
    ?>
    
    </body>    
</html>