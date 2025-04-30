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
        header("Location: /Guilherme%20de%20Moura/GitHub/Logins/view/cadastro/cadastro.php");
        exit();
    }

    try {
        $cadastroModel = new CadastroModel($conexao);
        
        if ($cadastroModel->cadastrar($nome, $email, $senha)) {
            $_SESSION['msg_sucesso'] = "Cadastro realizado com sucesso!";
            header("Location: /Guilherme%20de%20Moura/GitHub/Logins/view/index.php");
        }
    } catch (Exception $e) {
        $_SESSION['msg_erro'] = "Erro ao cadastrar: " . $e->getMessage();
        header("Location: /Guilherme%20de%20Moura/GitHub/Logins/view/cadastro/cadastro.php");
    }
    exit();
}
?>