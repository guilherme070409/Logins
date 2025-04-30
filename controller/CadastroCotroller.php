<?php
require_once '../model/CadastroModel.php';
require_once '../service/conexao.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $senha = $_POST['Senha'];
    $repita = $_POST['repita'];

    // Validação básica
    if ($senha != $repita) {
        $_SESSION['msg_erro'] = "As senhas não coincidem!";
        header("Location: ../view/cadastro/cadastro.php");
        exit();
    }

    $cadastroModel = new CadastroModel($conexao);
    
    if ($cadastroModel->cadastrar($nome, $email, $senha)) {
        $_SESSION['msg_sucesso'] = "Cadastro realizado! Faça login.";
        header("Location: ../view/index.php");
    } else {
        $_SESSION['msg_erro'] = "Erro ao cadastrar. Tente outro email!";
        header("Location: ../view/cadastro/cadastro.php");
    }
    exit();
}
?>