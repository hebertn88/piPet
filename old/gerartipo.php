<?php 

include_once"conexao.php";

?>

<html>   

    <body>  
    <?php        

    $nome = $_POST["nome"]; 

    $tipo = "INSERT INTO cadastro_tipo (t_nome) VALUES ('$nome')";

    if (mysqli_query($mysqli,$tipo)) {
        echo "<script>alert('Cadastrado com sucesso!'); window.location = 'tipos.php';</script>";        
    }else{
        echo "Deu erro: " . $tipo . "<br>" . mysqli_error($tipo);
    }
    mysqli_close($tipo);  

    ?>
    
    </body>    
</html>