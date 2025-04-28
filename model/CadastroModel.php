<?php
require '../service/conexao.php';

function register($fullname, $email, $senha) {
    $conn = new usePDO;
    $instance = $conn->getInstance();
    
   
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (NOME_DE_USUARIO, SENHA, `E-MAIL`) 
            VALUES (?, ?, ?)";
    
    $stmt = $instance->prepare($sql);
    return $stmt->execute([$fullname, $hashed_password, $email]);
}
?>