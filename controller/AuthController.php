<?php
require_once '../model/AuthModel.php';
require_once '../service/conexao.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $authModel = new AuthModel($conexao);
        $usuario = $authModel->login($_POST['email'], $_POST['password']);
        
        $_SESSION['usuario'] = $usuario;
        $_SESSION['msg_sucesso'] = "Login realizado!";
        header("Location: ../view/pagina_inicial.php");
        
    } catch (Exception $e) {
        $_SESSION['msg_erro'] = $e->getMessage();
        header("Location: ../view/index.php");
    }
    exit();
}
?>