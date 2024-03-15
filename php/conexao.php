<?php 
    $hostname = "localhost";
    $bancodedados = "form-egefaz";
    $usuario = "root";
    $senha = "";

    $conn = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if($conn->connect_errno){
        die("Conexão falhou: " . $conn->connect_error);
    }
?>