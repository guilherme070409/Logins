<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: /Guilherme%20de%20Moura/GitHub/Logins/view/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <?php if (isset($_SESSION['msg_sucesso'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['msg_sucesso'] ?>
            </div>
            <?php unset($_SESSION['msg_sucesso']); ?>
        <?php endif; ?>
        
        <h1>Olá mundo!</h1>
        <p>Bem-vindo, <?= $_SESSION['usuario']['nome'] ?? 'Visitante' ?>!</p>
        
        <a href="?action=logout" class="btn btn-danger">Sair</a>
    </div>
</body>
</html>