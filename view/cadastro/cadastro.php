<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style/page.css">
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Cadastro</h2>

        <!-- Mensagens -->
        <?php if(isset($_SESSION['msg_sucesso'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['msg_sucesso']; unset($_SESSION['msg_sucesso']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['msg_erro'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['msg_erro']; unset($_SESSION['msg_erro']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="../../controller/CadastroController.php">
            <div class="mb-3">
                <label for="Nome" class="form-label">Nome completo</label>
                <input type="text" class="form-control" id="Nome" name="Nome" required>
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="Email" name="Email" required>
            </div>
            <div class="mb-3">
                <label for="Senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="Senha" name="Senha" required>
            </div>
            <div class="mb-3">
                <label for="repita" class="form-label">Repita a Senha</label>
                <input type="password" class="form-control" id="repita" name="repita" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
        </form>

        <div class="mt-3 text-center">
            <a href="../../index.php">Já tem conta? Entrar</a>
        </div>
    </div>
</body>
</html>
