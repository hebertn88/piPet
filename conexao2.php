<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mydb";

try {
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
} catch (\Throwable $th) {
    echo "Erro: Conexão com banco de dados não realizada";
}

?>