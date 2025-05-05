<?php
// Incluir arquivos de conexão e funções
require_once '../service/conexao.php';
require_once '../service/funcoes.php';

// Inicializar variáveis
$erro = '';
$sucesso = '';

// Verificar se o código foi enviado
if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    // Verificar se o código existe no banco
    $codigoBanco = buscarCodigo($conexao, $codigo);

    if ($codigoBanco) {
        // Redirecionar para a página de troca de senha
        header("Location: trocarSenha.php?codigo=" . $codigo);
        exit();
    } else {
        $erro = "Código inválido!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Código</title>
</head>
<body>

<h2>Verifique o Código de Recuperação</h2>

<?php if ($erro): ?>
    <div style="color: red;"><?php echo $erro; ?></div>
<?php endif; ?>

<form method="POST">
    <label for="codigo">Código de Recuperação:</label>
    <input type="text" name="codigo" id="codigo" required>
    <button type="submit">Verificar Código</button>
</form>

</body>
</html>
