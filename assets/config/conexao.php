<?php

$dbpdo = "mysql:dbname=bd_comentario;localhost=127.0.0.1";
$dbuser = "root";
$dbpass = "";

try{
    $conectPDO = new PDO($dbpdo,$dbuser,$dbpass);
//    echo 'conectado com sucesso';
} catch (Exception $e) {
    echo 'erro ao conectar!'.$e ->getMessage();
    exit();
}


