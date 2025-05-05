<?php
// Incluir arquivos de conexão e funções
require_once '../service/conexao.php';
require_once '../service/funcoes.php';

// Inicializar variáveis
$erro = '';
$sucesso = '';

// Verificar se o código foi enviado via GET
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Verificar se o código existe no banco
    $codigoBanco = buscarCodigo($conexao, $codigo);

    if ($codigoBanco) {
        // Processar a troca de senha
        if (isset($_POST['nova_senha']) && isset($_POST['confirmar_senha'])) {
            $novaSenha = $_POST['nova_senha'];
            $confirmarSenha = $_POST['confirmar_senha'];

            if ($novaSenha === $confirmarSenha) {
                // Atualizar a senha no banco
                if (atualizarSenha($conexao, $codigo, $novaSenha)) {
                    $sucesso = "Senha atualizada com sucesso!";
                } else {
                    $erro = "Erro ao atualizar a senha!";
                }
            } else {
                $erro = "As senhas não coincidem!";
            }
        }
    } else {
        $erro = "Código inválido!";
    }
} else {
    header("Location: verificarCodigo.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trocar Senha</title>
</head>
<body>

<h2>Trocar Senha</h2>

<?php if ($erro): ?>
    <div style="color: red;"><?php echo $erro; ?></div>
<?php endif; ?>

<?php if ($sucesso): ?>
    <div style="color: green;"><?php echo $sucesso; ?></div>
<?php endif; ?>

<form method="POST">
    <label for="nova_senha">Nova Senha:</label>
    <input type="password" name="nova_senha" id="nova_senha" required>
    <br>

    <label for="confirmar_senha">Confirmar Senha:</label>
    <input type="password" name="confirmar_senha" id="confirmar_senha" required>
    <br>

    <button type="submit">Trocar Senha</button>
</form>

</body>
</html>
