<?php 

include_once"conexao.php";

?>

<html>   

    <body>  
    <?php        

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $nivel = $_POST["nivel"];    

    $usuario = "INSERT INTO cadastro_gerenciador (g_email, g_senha, g_nivel, g_nome) VALUES ('$email', '$senha', '$nivel', '$nome')";

    if (mysqli_query($mysqli,$usuario)) {
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location = 'gerenciamento.php';</script>";        
    }else{
        echo "Deu erro: " . $usuario . "<br>" . mysqli_error($usuario);
    }
    mysqli_close($usuario);  

    ?>
    
    </body>    
</html>