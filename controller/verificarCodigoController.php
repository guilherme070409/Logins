<?php
session_start();
require_once '../service/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = trim($_POST['codigo']);

    $sql = "SELECT usuario_id FROM code WHERE code = ?";
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $codigo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $resultado->num_rows === 1) {
            $dados = $resultado->fetch_assoc();
            $_SESSION['usuario_id'] = $dados['usuario_id']; // Armazena para usar na troca de senha
            header("Location: trocarSenha.php");
            exit();
        } else {
            $_SESSION['erro'] = "Código inválido ou expirado.";
            header("Location: verificarCodigo.php");
            exit();
        }
    } else {
        die("Erro na preparação da consulta.");
    }
}
?>
