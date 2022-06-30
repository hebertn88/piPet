<?php
    session_start();   
    unset(
        $_SESSION['gerenciadorId'],
        $_SESSION['gerenciadorNome'],
        $_SESSION['gerenciadorEmail'],
        $_SESSION['gerenciadorSenha'],
        $_SESSION['gerenciadorNivel']
    );   
    $_SESSION['logindeslogado'] = "Deslogado com sucesso";
    
    header("Location: admin.php");
?>