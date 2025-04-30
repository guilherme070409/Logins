<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-cadastro {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card card-cadastro">
            <h2 class="text-center mb-4">Cadastre-se</h2>

            <?php if (isset($_SESSION['msg_erro'])): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?= $_SESSION['msg_erro'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['msg_erro']); ?>
            <?php endif; ?>
            <form action="/Guilherme%20de%20Moura/GitHub/Logins/controller/CadastroController.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Nome Completo</label>
                    <input type="text" name="Nome" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="Email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="Senha" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Repita a Senha</label>
                    <input type="password" name="repita" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <a href="../../view/index.php">Já tem conta? Faça login</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>