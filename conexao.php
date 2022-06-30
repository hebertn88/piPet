<?php

$host = "localhost";
$usuario = "user_pi";
$senha = "piUnivesp*";
$bd = "mydb";

$mysqli = new mysqli($host,$usuario,$senha,$bd);

if ($mysqli -> connect_errno){
    echo "Conexão falhou: " . $mysqli -> connect_error;
    exit();
}

?>