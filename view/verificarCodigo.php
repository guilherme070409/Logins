<?php
// Incluir arquivos de conexão
require_once '../service/conexao.php';

// Verificar se o código foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigoInserido = $_POST['codigo'];

    // Verificar se o código existe no banco
    $sql = "SELECT * FROM codigo WHERE codigo = ?"; // Tabela 'codigo' e campo 'codigo' no banco
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $codigoInserido);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado && $resultado->num_rows > 0) {
        // Código encontrado, pegar o ID do usuário associado
        $codigoValido = $resultado->fetch_assoc();
        $usuario_id = $codigoValido['usuario_id']; // Supondo que 'usuario_id' seja o campo relacionado com o usuário

        // Redireciona para a página de troca de senha
        header("Location: trocarSenha.php?usuario_id=" . $usuario_id);
        exit;
    } else {
        $erro = "Código inválido ou expirado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Código</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Verifique seu Código de Acesso</h2>
        <form action="verificarCodigo.php" method="POST">
            <div class="mb-3">
                <label for="codigo" class="form-label">Código de Acesso</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $erro; ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Verificar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
