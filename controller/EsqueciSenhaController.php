<?php
require_once '../service/conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    $stmt = $conexao->prepare("SELECT ID FROM LOGINS.usuario WHERE `E-MAIL` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $usuario_id = $res->fetch_assoc()['ID'];
        $codigo = strtoupper(bin2hex(random_bytes(3)));

        $insert = $conexao->prepare("INSERT INTO LOGINS.code (code, usuario_id) VALUES (?, ?)");
        $insert->bind_param("si", $codigo, $usuario_id);
        $insert->execute();

        $_SESSION['msg_recuperacao'] = "Código de recuperação enviado com sucesso!";
    } else {
        $_SESSION['msg_recuperacao'] = "Erro: E-mail não encontrado.";
    }

    header("Location: ../view/esqueci/recuperar_senha.php");
    exit();
}
?>
