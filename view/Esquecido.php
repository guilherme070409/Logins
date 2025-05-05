<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="forget.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Recuperação de Senha</title>
</head>
<body>
    <?php if(isset($_SESSION['msg_recuperacao'])): ?>
        <div class="alert alert-<?= strpos($_SESSION['msg_recuperacao'], 'sucesso') !== false ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['msg_recuperacao'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['msg_recuperacao']); ?>
    <?php endif; ?>

    <div class="login-container">
        <form method="post" action="../controller/EsqueciSenhaController.php">
            <input type="hidden" name="action" value="recuperarSenha">
            
            <h1>Recuperador de senha</h1>

            <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="loginPassword">Coloque seu E-MAIL para redefinir sua senha</label>
            </div>
     
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="loginName" name="email" class="form-control" required />
                <label class="form-label" for="loginName">E-MAIL</label>
            </div>
      
            <button type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>

            <div class="text-center">
                <p><a href="cadastro.php">Não cadastrado? cadastro</a></p>
                <p><a href="index.php">você lembrou? login</a></p>
                <p><a href="veru.php">Coloque o Codigo nessa pagina</a></p>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>