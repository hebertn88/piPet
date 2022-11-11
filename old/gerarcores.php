<?php 

include_once"conexao.php";

?>

<html>   

    <body>  
    <?php        

    $nome = $_POST["nome"]; 

    $cor = "INSERT INTO cadastro_cor (c_cor) VALUES ('$nome')";

    if (mysqli_query($mysqli,$cor)) {
        echo "<script>alert('Cadastrado com sucesso!'); window.location = 'cores.php';</script>";        
    }else{
        echo "Deu erro: " . $cor . "<br>" . mysqli_error($cor);
    }
    mysqli_close($cor);  

    ?>
    
    </body>    
</html>