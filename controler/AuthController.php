<?php
require '../model/CadastroModel.php';
require '../service/conexao.php';

session_start();

if ($_POST) {
    $fullName = $_POST['Nome'];
    $usuario = $_POST['Usuario'];
    $email = $_POST['Email'];
    $password = $_POST['Senha'];
    $repita = $_POST['repita'];

    // Verificar se as senhas são iguais
    if ($password != $repita) {
        $_SESSION['msg_erro'] = "As senhas não coincidem!";
        header("Location: ../cadastro/cadastro.php");
        exit();
    }

    try {
        // Aqui chama a função de cadastro
        $result = register($fullName, $usuario, $email, $password);

        if ($result) {
            $_SESSION['msg_sucesso'] = "Cadastro realizado com sucesso!";
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['msg_erro'] = "Erro ao realizar cadastro.";
            header("Location: ../cadastro/cadastro.php");
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['msg_erro'] = "Erro: " . $e->getMessage();
        header("Location: ../cadastro/cadastro.php");
        exit();
    }
}
?>
