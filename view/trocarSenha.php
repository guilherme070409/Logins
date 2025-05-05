<?php
// Incluir a conexão com o banco de dados
require_once '../conexao.php';

// Verificar se o código foi passado pela URL
if (isset($_GET['code'])) {
    $codigo = $_GET['code'];

    // Aqui você pode verificar se o código existe na tabela 'code' antes de permitir a troca de senha.
    $sql = "SELECT * FROM code WHERE code = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $codigo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 0) {
        echo "Código inválido!";
        exit;
    }
} else {
    echo "Código não fornecido!";
    exit;
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $senha1 = $_POST['senha1'];
    $senha2 = $_POST['senha2'];

    // Verificar se as senhas são iguais
    if ($senha1 === $senha2) {
        // Atualizar a senha no banco
        $sql = "UPDATE usuario SET SENHA = ? WHERE email = (SELECT email FROM code WHERE code = ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $senha1, $codigo);

        if ($stmt->execute()) {
            echo "Senha alterada com sucesso!";
        } else {
            echo "Erro ao atualizar a senha.";
        }
    } else {
        echo "As senhas não coincidem!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trocar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Trocar Senha</h2>

        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="senha1" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="senha1" name="senha1" required>
            </div>
            <div class="mb-3">
                <label for="senha2" class="form-label">Repita a Nova Senha</label>
                <input type="password" class="form-control" id="senha2" name="senha2" required>
            </div>
            <button type="submit" class="btn btn-primary">Alterar Senha</button>
        </form>
    </div>
</body>
</html>
