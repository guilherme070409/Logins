<?php
require '../model/CadastroModel.php';
require '../service/conexao.php';

session_start();

if($_POST){
    $fullName = $_POST['Nome'];
    $email = $_POST['Email'];
    $password = $_POST['Senha'];
    $repita = $_POST['repita'];

    if($password != $repita){
        $_SESSION['msg_erro'] = "As senhas não coincidem.";
        header("Location: ../view/cadastro/cadastro.php");
        exit();
    }
    
    try {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $result = register($fullName, $email, $passwordHash);
        
        if($result){
            $_SESSION['msg_sucesso'] = "cadastro realizado com sucesso!";
            header("Location: ../view/index.php");
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
