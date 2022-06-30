<?php
    session_start(); 
       
    include_once("conexao.php");

    if((isset($_POST['u_email'])) && (isset($_POST['u_senha']))){
        $usuario = mysqli_real_escape_string($mysqli, $_POST['u_email']); 
        $senha = mysqli_real_escape_string($mysqli, $_POST['u_senha']);
        $senha = md5($senha);
            
        $result_admin = "SELECT * FROM cadastro_usuario WHERE u_email = '$usuario' && u_senha = '$senha' LIMIT 1";
        $resultado_gerencia = mysqli_query($mysqli, $result_admin);
        $resultado = mysqli_fetch_assoc($resultado_gerencia);     
        
        
        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['u_id'];
            $_SESSION['usuarioEmail'] = $resultado['u_email'];
            $_SESSION['usuarioNome'] = $resultado['u_nomecompleto'];
            $_SESSION['usuarioSenha'] = $resultado['u_senha'];
            $_SESSION['usuarioTelefone'] = $resultado['u_telefone'];
            $_SESSION['usuarioEndereco'] = $resultado['u_endereco'];
            header("Location: user.php");
                    
        }else{    
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: usuario.php");
        }
            
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: usuario.php");
    }
    
?>