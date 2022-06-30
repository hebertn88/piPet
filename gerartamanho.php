<?php 

include_once"conexao.php";

?>

<html>   

    <body>  
    <?php        

    $nome = $_POST["nome"]; 

    $tamanhos = "INSERT INTO cadastro_tamanho (t_nome) VALUES ('$nome')";

    if (mysqli_query($mysqli,$tamanhos)) {
        echo "<script>alert('Cadastrado com sucesso!'); window.location = 'tamanho.php';</script>";        
    }else{
        echo "Deu erro: " . $tamanhos . "<br>" . mysqli_error($tamanhos);
    }
    mysqli_close($tamanhos);  

    ?>
    
    </body>    
</html>