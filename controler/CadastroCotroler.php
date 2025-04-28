<?php
require '../model/CadastroModel.php';
require '../service/conexao.php';

// Inicia sessão para guardar mensagens
session_start();

if($_POST){
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        // Cadastra usuário
        $result = register($fullName, $email, $password);
        
        if($result){
            $_SESSION['msg_sucesso'] = "Cadastro realizado com sucesso!";
            header("Location: ../view/index/login.php"); // Redireciona para login
            exit();
        } else {
            $_SESSION['msg_erro'] = "Não foi possível realizar o cadastro.";
            header("Location: ../view/Cadastro/cadastro.php"); // Volta para cadastro
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['msg_erro'] = "Erro: " . $e->getMessage();
        header("Location: ../view/Cadastro/cadastro.php");
        exit();
    }
}
?>