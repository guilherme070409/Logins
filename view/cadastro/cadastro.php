<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <?php
    // Mostrar mensagens de sucesso ou erro
    if(isset($_SESSION['msg_sucesso'])) {
        echo "<div class='alert alert-success' role='alert'>".$_SESSION['msg_sucesso']."</div>";
        unset($_SESSION['msg_sucesso']);
    }
    if(isset($_SESSION['msg_erro'])) {
        echo "<div class='alert alert-danger' role='alert'>".$_SESSION['msg_erro']."</div>";
        unset($_SESSION['msg_erro']);
    }
    ?>

    <h2 class="mb-4">Cadastro de Usuário</h2>

    <form action="../../controller/cadastro.php" method="post">
        <div class="mb-3">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="Nome" name="Nome" required>
        </div>

        <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
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

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <div class="mt-3">
        <a href="../../index.php" class="btn btn-link">Já tem cadastro? Faça login</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
