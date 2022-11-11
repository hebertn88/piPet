<?php

//$mysqli = mysqli_connect('kdmeupet.mysql.dbaas.com.br','kdmeupet','K@d#mpe!20','kdmeupet');
$mysqli = mysqli_connect('localhost','kdmeupet','K@d#mpe!20','kdmeupet');

// Para mysqli
mysqli_set_charset($mysqli,"utf8");

if (!$mysqli){
    die("Conexão falhou: " . mysqli_connect_error());
}
?>