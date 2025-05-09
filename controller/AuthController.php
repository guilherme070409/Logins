<?php// AuthController.php
require_once '../model/AuthModel.php';
require_once '../service/conexao.php';
session_start();

$action = $_POST['action'] ?? '';

if ($action === 'recuperarSenha') {
    $email = $_POST['email'] ?? '';

    // Verifica se o e-mail existe
    $stmt = $conexao->prepare("SELECT Nome FROM LOGINS.pessoa WHERE `E-MAIL` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $usuario = $res->fetch_assoc()['Nome'];

        // Gerar código aleatório (ex: 6 letras/números)
        $codigo = strtoupper(bin2hex(random_bytes(3)));

        // Salvar código na tabela 'code'
        $insert = $conexao->prepare("INSERT INTO code (usuario, code, lido) VALUES (?, ?, 0)");
        $insert->bind_param("ss", $usuario, $codigo);
        $insert->execute();

        $_SESSION['msg_recuperacao'] = "Código de recuperação enviado com sucesso!";
    } else {
        $_SESSION['msg_recuperacao'] = "Erro: E-mail não encontrado.";
    }

    header("Location: ../view/esqueci/recuperar_senha.php");
    exit();
}
?>
