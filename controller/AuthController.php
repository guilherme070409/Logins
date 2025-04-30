<?php
require_once '../model/AuthModel.php';
require_once '../service/conexao.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $authModel = new AuthModel($conexao);
    
    if ($authModel->login($email, $senha)) {
        $_SESSION['msg_sucesso'] = "Login feito!";
        header("Location: ../index2.php");
    } else {
        $_SESSION['msg_erro'] = "Email ou senha errados!";
        header("Location: ../view/index.php");
    }
    exit();
}
?>