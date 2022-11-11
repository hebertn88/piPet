<?php 

include_once"conexao.php";

?>

<html>   

    <body>  
    <?php        

    $nome = $_POST["nome"]; 
    $tipo = $_REQUEST['tipo']; 

    $raca = "INSERT INTO cadastro_raca (r_nome, r_tipos) VALUES ('$nome', '$tipo')";

    if (mysqli_query($mysqli,$raca)) {
        echo "<script>alert('Cadastrado com sucesso!'); window.location = 'racas.php';</script>";        
    }else{
        echo "Deu erro: " . $raca . "<br>" . mysqli_error($raca);
    }
    mysqli_close($raca);  

    ?>
    
    </body>    
</html>