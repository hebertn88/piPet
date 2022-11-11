<?php
    session_start(); 
       
    include_once("conexao.php");

    if((isset($_POST['g_email'])) && (isset($_POST['g_senha']))){
        $usuario = mysqli_real_escape_string($mysqli, $_POST['g_email']); 
        $senha = mysqli_real_escape_string($mysqli, $_POST['g_senha']);
        $senha = md5($senha);
            
        $result_gerenciador = "SELECT * FROM cadastro_gerenciador WHERE g_email = '$usuario' && g_senha = '$senha' LIMIT 1";
        $resultado_gerencia = mysqli_query($mysqli, $result_gerenciador);
        $resultado = mysqli_fetch_assoc($resultado_gerencia);     
        
        
        if(isset($resultado)){
            $_SESSION['gerenciadorId'] = $resultado['g_id'];
            $_SESSION['gerenciadorNome'] = $resultado['g_nome'];
            $_SESSION['gerenciadorEmail'] = $resultado['g_email'];
            header("Location: gerenciamento.php");
                    
        }else{    
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: admin.php");
        }
            
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: admin.php");
    }
    
?>