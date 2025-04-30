<?php
session_start();
require_once '../service/conexao.php';
require_once '../model/CadastroModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $senha = $_POST['Senha'];
    
    // Validações básicas
    if ($_POST['Senha'] != $_POST['repita']) {
        $_SESSION['msg_erro'] = "As senhas não coincidem!";
        header("Location: /seu_projeto/view/cadastro/cadastro.php");
        exit();
    }

    // Conexão e cadastro (exemplo simplificado)
    $conexao = new mysqli("localhost", "root", "", "logins");
    $sql = "INSERT INTO usuario (NOME_DE_USUARIO, `E-MAIL`, SENHA) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);
    
    if ($stmt->execute()) {
        $_SESSION['msg_sucesso'] = "Cadastro realizado com sucesso!";
        header("Location: /seu_projeto/view/index.php");
    } else {
        $_SESSION['msg_erro'] = "Erro ao cadastrar: " . $conexao->error;
        header("Location: /seu_projeto/view/cadastro/cadastro.php");
    }
    exit();
}
?>