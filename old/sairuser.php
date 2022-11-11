<?php
    session_start();   
    unset(
        $_SESSION['usuarioId'],
        $_SESSION['usuarioNome'],
        $_SESSION['usuarioEmail'],
        $_SESSION['usuarioSenha'],
        $_SESSION['usuarioNivel']
    );   
    $_SESSION['logindeslogado'] = "Deslogado com sucesso";
    
    header("Location: usuario.php");
?>