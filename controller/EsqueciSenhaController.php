<?php
session_start();
require_once '../service/conexao.php'; // Arquivo de conexão com o banco

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'recuperarSenha') {
    $email = $_POST['email'] ?? '';

    // Verifica se o e-mail existe na tabela usuario
    $stmt = $conexao->prepare("SELECT ID FROM usuario WHERE `E-MAIL` = ?");
    if (!$stmt) {
        die("Erro no prepare (select): " . $conexao->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        $usuario_id = $usuario['ID'];

        // Gera um código aleatório (ex: 6 letras/números)
        $codigo = strtoupper(bin2hex(random_bytes(3))); // ex: "A1B2C3"

        // Insere o código na tabela `code`
        $insert = $conexao->prepare("INSERT INTO code (code, usuario_id) VALUES (?, ?)");
        if (!$insert) {
            die("Erro no prepare (insert): " . $conexao->error);
        }

        $insert->bind_param("si", $codigo, $usuario_id);
        $insert->execute();

        // Mensagem simulando envio do código
        $_SESSION['msg_recuperacao'] = "Um código foi enviado para o e-mail: $email";
    } else {
        $_SESSION['msg_recuperacao'] = "E-mail não encontrado.";
    }

    header("Location: ../view/Esquecido.php");
    exit();
}
?>
