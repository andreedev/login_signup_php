<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'login_php_mysql';

//permite no solo efectuar la conexión a la DB sino también capturar los errores y mostrarlos en pantalla(solo para fines de depuración)
try {
    $conn = mysqli_connect($host, $username, $password, $database);
} catch (mysqli_error $e) {
    die('Connection failed: '.$e->getMessage());
}

function clear($var){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'login_php_mysql';
    $conn = mysqli_connect($host, $username, $password, $database);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}
