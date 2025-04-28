<?php
require '../model/CadastroModel.php';
require '../service/conexao.php';

session_start();

if($_POST){
    $fullName = $_POST['Nome'];
    $username = $_POST['Usuario']; // Seu formulário pede isso!
    $email = $_POST['Email'];
    $password = $_POST['Senha'];
    $repita = $_POST['repita'];

    // Verificar se as senhas são iguais
    if($password != $repita){
        $_SESSION['msg_erro'] = "As senhas não coincidem.";
        header("Location: ../view/Cadastro/cadastro.php");
        exit();
    }
    
    try {
        // Faz o hash da senha
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Cadastra usuário
        $result = register($fullName, $username, $email, $passwordHash);
        
        if($result){
            $_SESSION['msg_sucesso'] = "Cadastro realizado com sucesso!";
            header("Location: ../view/index.php"); // <-- aqui manda para o index.php
            exit();
        } else {
            $_SESSION['msg_erro'] = "Não foi possível realizar o cadastro.";
            header("Location: ../view/cadastro/cadastro.php");
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['msg_erro'] = "Erro: " . $e->getMessage();
        header("Location: ../view/cadastro/cadastro.php");
        exit();
    }
}
?>
