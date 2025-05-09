<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        .alert {
            margin: 15px;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?php if (isset($_SESSION['msg_erro'])): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <?= $_SESSION['msg_erro'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['msg_erro']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['msg_sucesso'])): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= $_SESSION['msg_sucesso'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php unset($_SESSION['msg_sucesso']); ?>
<?php endif; ?>

<form action="../controller/AuthController.php" method="post">
    <div class="login-container">
        <ul class="nav nav-pills nav-justified mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cadastro.php">Cadastro</a>
            </li>
        </ul>

        <input type="hidden" name="action" value="login">

        <div class="form-outline mb-4">
            <input type="email" id="loginName" name="email" class="form-control" required />
            <label class="form-label" for="loginName">E-MAIL</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="loginPassword" name="password" class="form-control" required />
            <label class="form-label" for="loginPassword">Senha</label>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="loginCheck" checked />
                    <label class="form-check-label" for="loginCheck"> Lembrar-me </label>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <a href="Esquecido.php">Esqueceu a senha?</a>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4">Logar</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
