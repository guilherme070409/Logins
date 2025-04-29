<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Cadastro de Usuário</h2>

    <?php if(isset($_SESSION['msg_erro'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php 
                echo $_SESSION['msg_erro']; 
                unset($_SESSION['msg_erro']);
            ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['msg_sucesso'])): ?>
        <div class="alert alert-success" role="alert">
            <?php 
                echo $_SESSION['msg_sucesso']; 
                unset($_SESSION['msg_sucesso']);
            ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="../../controller/CadastroController.php">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="nome" name="Nome" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="Email" required>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="Senha" required>
        </div>

        <div class="mb-3">
            <label for="repita" class="form-label">Repita a senha</label>
            <input type="password" class="form-control" id="repita" name="repita" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
</body>
</html>
```
