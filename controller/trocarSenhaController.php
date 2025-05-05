<?php
session_start();
require_once '../service/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: verificarCodigo.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova = $_POST['nova_senha'];
    $confirma = $_POST['confirmar_senha'];

    if ($nova !== $confirma) {
        $_SESSION['msg'] = "As senhas não coincidem.";
        header("Location: trocarSenha.php");
        exit();
    }

    $senhaHash = password_hash($nova, PASSWORD_DEFAULT);
    $usuario_id = $_SESSION['usuario_id'];

    $sql = "UPDATE usuario SET SENHA = ? WHERE ID = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("si", $senhaHash, $usuario_id);
        $stmt->execute();

        unset($_SESSION['usuario_id']); // Segurança: Limpa a sessão
        $_SESSION['msg_recuperacao'] = "Senha atualizada com sucesso!";
        header("Location: ../view/Esquecido.php");
        exit();
    } else {
        $_SESSION['msg'] = "Erro ao atualizar a senha.";
        header("Location: trocarSenha.php");
        exit();
    }
}
?>
