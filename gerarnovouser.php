<?php 

include_once"conexao.php";

?>

<html>   

    <body>  
    <?php        

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];

    $usuario = "INSERT INTO cadastro_usuario (u_nomecompleto, u_email, u_senha, u_endereco, u_telefone) VALUES 
    ('$nome', '$email', '$senha', '$endereco', '$telefone')";

    if (mysqli_query($mysqli,$usuario)) {
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location = 'usuario.php';</script>";        
    }else{
        echo "Deu erro: " . $usuario . "<br>" . mysqli_error($usuario);
    }
    mysqli_close($usuario);  

    ?>
    
    </body>    
</html>